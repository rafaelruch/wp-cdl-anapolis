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
 * Endpoint AJAX (público, com nonce).
 */
function cdl_check_associado_ajax() {
    check_ajax_referer('cdl_check_associado', '_wpnonce');

    $cnpj_raw = isset($_POST['cnpj']) ? sanitize_text_field(wp_unslash($_POST['cnpj'])) : '';
    $cnpj     = cdl_cnpj_only_digits($cnpj_raw);

    if (!cdl_cnpj_is_valid($cnpj)) {
        wp_send_json_error([
            'code'    => 'invalid_cnpj',
            'message' => 'CNPJ inválido. Confira o número e tente novamente.',
        ], 400);
    }

    if (cdl_is_cnpj_associado($cnpj)) {
        wp_send_json_success([
            'is_associado' => true,
            'message'      => 'Você é associado da CDL Anápolis e tem direito a 1 Certificado Digital A1 gratuitamente. Fale com nossa equipe pelo WhatsApp para agendar sua emissão.',
        ]);
    } else {
        wp_send_json_success([
            'is_associado' => false,
            'redirect_url' => CDL_CERTIFICADO_COMPRA_URL,
        ]);
    }
}
add_action('wp_ajax_cdl_check_associado',        'cdl_check_associado_ajax');
add_action('wp_ajax_nopriv_cdl_check_associado', 'cdl_check_associado_ajax');
