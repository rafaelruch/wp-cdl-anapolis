<?php
/**
 * Handler AJAX da verificação de CNPJ na página de Certificado Digital.
 *
 * Fluxo:
 *   1. Visitante digita o CNPJ na página /certificado-digital-cdl/
 *   2. JS chama admin-ajax.php com action=cdl_check_associado
 *   3. Esta função normaliza o CNPJ, consulta o CPT `associado` (via
 *      cache transient já existente em cdl_get_associados_data)
 *   4. Retorna:
 *      - is_associado=true  → front mostra mensagem do A1 gratuito
 *      - is_associado=false → front redireciona p/ certificadocdlanapolis.com.br/V1
 */

if (!defined('ABSPATH')) exit;

const CDL_CERTIFICADO_COMPRA_URL = 'https://www.certificadocdlanapolis.com.br/V1';

/**
 * Normaliza CNPJ removendo todo caractere não numérico.
 */
function cdl_cnpj_only_digits($value) {
    return preg_replace('/\D/', '', (string) $value);
}

/**
 * Valida estruturalmente um CNPJ (14 dígitos + dígitos verificadores).
 * Não aceita sequências repetidas (00000000000000, 11111111111111, etc.).
 */
function cdl_cnpj_is_valid($cnpj) {
    $cnpj = cdl_cnpj_only_digits($cnpj);
    if (strlen($cnpj) !== 14) return false;
    if (preg_match('/^(\d)\1{13}$/', $cnpj)) return false;

    $calc = function ($base, $weights) {
        $sum = 0;
        for ($i = 0, $n = strlen($base); $i < $n; $i++) {
            $sum += intval($base[$i]) * $weights[$i];
        }
        $rest = $sum % 11;
        return $rest < 2 ? 0 : 11 - $rest;
    };

    $w1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    $w2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    $d1 = $calc(substr($cnpj, 0, 12), $w1);
    $d2 = $calc(substr($cnpj, 0, 12) . $d1, $w2);

    return intval($cnpj[12]) === $d1 && intval($cnpj[13]) === $d2;
}

/**
 * Procura um CNPJ entre os associados cadastrados.
 * Reutiliza o cache transient da seção /quem-faz-parte/.
 */
function cdl_is_cnpj_associado($cnpj) {
    $cnpj = cdl_cnpj_only_digits($cnpj);
    if (strlen($cnpj) !== 14) return false;

    if (!function_exists('cdl_get_associados_data')) return false;

    $payload = cdl_get_associados_data();
    if (empty($payload['data'])) return false;

    foreach ($payload['data'] as $a) {
        $stored = cdl_cnpj_only_digits($a['cnpj'] ?? '');
        if ($stored !== '' && $stored === $cnpj) {
            return true;
        }
    }
    return false;
}

/**
 * Rate limit simples por IP — 10 requisições por minuto.
 * Suficiente pra evitar abuso de força bruta sem prejudicar uso legítimo.
 */
function cdl_check_associado_rate_limited() {
    $ip = isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field($_SERVER['REMOTE_ADDR']) : 'unknown';
    $key   = 'cdl_chk_rate_' . md5($ip);
    $count = (int) get_transient($key);
    if ($count >= 10) {
        return true;
    }
    set_transient($key, $count + 1, MINUTE_IN_SECONDS);
    return false;
}

/**
 * Endpoint REST público — registrado em rest_api_init.
 *
 * Não usa nonce porque o site fica atrás de plugin de cache de página
 * (LiteSpeed/WP Rocket) que serve HTML cacheado com nonces expirados,
 * o que faz check_ajax_referer falhar mesmo com chamadas legítimas.
 *
 * A resposta é binária (is_associado true/false) sem dados pessoais —
 * não há risco em deixar público. Rate limit cobre abuso.
 */
function cdl_check_associado_rest($request) {
    if (cdl_check_associado_rate_limited()) {
        return new WP_REST_Response([
            'code'    => 'rate_limited',
            'message' => 'Muitas tentativas. Aguarde um instante e tente novamente.',
        ], 429);
    }

    $cnpj_raw = $request->get_param('cnpj');
    $cnpj     = cdl_cnpj_only_digits($cnpj_raw);

    if (!cdl_cnpj_is_valid($cnpj)) {
        return new WP_REST_Response([
            'code'    => 'invalid_cnpj',
            'message' => 'CNPJ inválido. Confira o número e tente novamente.',
        ], 400);
    }

    if (cdl_is_cnpj_associado($cnpj)) {
        return new WP_REST_Response([
            'is_associado' => true,
            'message'      => 'Você é associado da CDL Anápolis e tem direito a 1 Certificado Digital A1 gratuitamente. Fale com nossa equipe pelo WhatsApp para agendar sua emissão.',
        ], 200);
    }

    return new WP_REST_Response([
        'is_associado' => false,
        'redirect_url' => CDL_CERTIFICADO_COMPRA_URL,
    ], 200);
}

add_action('rest_api_init', function () {
    register_rest_route('cdl/v1', '/check-associado', [
        'methods'             => 'POST',
        'callback'            => 'cdl_check_associado_rest',
        'permission_callback' => '__return_true',
        'args'                => [
            'cnpj' => [
                'required'          => true,
                'type'              => 'string',
                'sanitize_callback' => 'sanitize_text_field',
            ],
        ],
    ]);
});
