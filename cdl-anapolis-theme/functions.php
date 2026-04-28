<?php
/**
 * CDL Anapolis Theme Functions
 */

define('CDL_THEME_VERSION', '1.0.0');
define('CDL_THEME_DIR', get_template_directory());
define('CDL_THEME_URI', get_template_directory_uri());

// ACF fallback - prevents fatal errors when ACF is not installed
if (!function_exists('get_field')) {
    function get_field($field, $post_id = false) {
        return null;
    }
}

// Theme setup
require_once CDL_THEME_DIR . '/inc/theme-setup.php';
require_once CDL_THEME_DIR . '/inc/perf-helpers.php';
require_once CDL_THEME_DIR . '/inc/enqueue.php';

// Custom Post Types
require_once CDL_THEME_DIR . '/inc/cpt-informativo.php';
require_once CDL_THEME_DIR . '/inc/cpt-depoimentos.php';
require_once CDL_THEME_DIR . '/inc/cpt-associados.php';

// ACF Configuration
require_once CDL_THEME_DIR . '/inc/acf-fields.php';

// Contact form handler (fallback when CF7 is not active)
if (!shortcode_exists('contact-form-7')) {
    add_action('admin_post_cdl_contact_form', 'cdl_handle_contact_form');
    add_action('admin_post_nopriv_cdl_contact_form', 'cdl_handle_contact_form');
    add_action('admin_post_cdl_associe_form', 'cdl_handle_associe_form');
    add_action('admin_post_nopriv_cdl_associe_form', 'cdl_handle_associe_form');
}

function cdl_handle_contact_form() {
    if (!isset($_POST['_cdl_nonce']) || !wp_verify_nonce($_POST['_cdl_nonce'], 'cdl_contact_nonce')) {
        wp_die('Requisição inválida.');
    }
    $to      = get_field('top_bar_email', 'option') ?: 'contato@cdlanapolis.com.br';
    $nome    = sanitize_text_field($_POST['nome'] ?? '');
    $email   = sanitize_email($_POST['email'] ?? '');
    $tel     = sanitize_text_field($_POST['telefone'] ?? '');
    $assunto = sanitize_text_field($_POST['assunto'] ?? 'Contato pelo site');
    $msg     = sanitize_textarea_field($_POST['mensagem'] ?? '');

    $body  = '<div style="font-family:Arial,sans-serif;max-width:600px;margin:0 auto;color:#03428e">';
    $body .= '<h2 style="color:#03428e;border-bottom:2px solid #ffd600;padding-bottom:10px">Nova mensagem pelo site</h2>';
    $body .= '<table style="width:100%;border-collapse:collapse;margin-top:16px">';
    $body .= '<tr><td style="padding:8px;background:#f5f5f7;font-weight:600;width:140px">Nome</td><td style="padding:8px">' . esc_html($nome) . '</td></tr>';
    $body .= '<tr><td style="padding:8px;background:#f5f5f7;font-weight:600">E-mail</td><td style="padding:8px">' . esc_html($email) . '</td></tr>';
    $body .= '<tr><td style="padding:8px;background:#f5f5f7;font-weight:600">Telefone</td><td style="padding:8px">' . esc_html($tel) . '</td></tr>';
    $body .= '<tr><td style="padding:8px;background:#f5f5f7;font-weight:600">Assunto</td><td style="padding:8px">' . esc_html($assunto) . '</td></tr>';
    $body .= '</table>';
    $body .= '<h3 style="color:#03428e;margin-top:24px">Mensagem:</h3>';
    $body .= '<div style="padding:16px;background:#f5f5f7;border-left:4px solid #03428e;white-space:pre-wrap">' . esc_html($msg) . '</div>';
    $body .= '</div>';

    $from_name  = $nome ?: 'Contato Site CDL';
    $from_email = $email ?: $to;

    $headers = [
        'From: ' . $from_name . ' <' . $from_email . '>',
        'Reply-To: ' . $from_name . ' <' . $from_email . '>',
        'Content-Type: text/html; charset=UTF-8',
    ];
    wp_mail($to, "[CDL Site] {$assunto}", $body, $headers);
    wp_safe_redirect(home_url('/fale-conosco/?contato=enviado'));
    exit;
}

function cdl_handle_associe_form() {
    if (!isset($_POST['_cdl_nonce']) || !wp_verify_nonce($_POST['_cdl_nonce'], 'cdl_associe_nonce')) {
        wp_die('Requisição inválida.');
    }
    $to     = get_field('top_bar_email', 'option') ?: 'contato@cdlanapolis.com.br';
    $razao  = sanitize_text_field($_POST['razao_social'] ?? '');
    $cnpj   = sanitize_text_field($_POST['cnpj'] ?? '');
    $nome   = sanitize_text_field($_POST['nome_responsavel'] ?? '');
    $cpf    = sanitize_text_field($_POST['cpf_responsavel'] ?? '');
    $tel    = sanitize_text_field($_POST['telefone'] ?? '');
    $email  = sanitize_email($_POST['email'] ?? '');

    $body  = '<div style="font-family:Arial,sans-serif;max-width:600px;margin:0 auto;color:#03428e">';
    $body .= '<h2 style="color:#03428e;border-bottom:2px solid #ffd600;padding-bottom:10px">Nova solicitação de associação</h2>';
    $body .= '<p style="color:#79797b">Um empreendedor quer fazer parte da CDL Anápolis.</p>';
    $body .= '<table style="width:100%;border-collapse:collapse;margin-top:16px">';
    $body .= '<tr><td style="padding:8px;background:#f5f5f7;font-weight:600;width:160px">Razão Social</td><td style="padding:8px">' . esc_html($razao) . '</td></tr>';
    $body .= '<tr><td style="padding:8px;background:#f5f5f7;font-weight:600">CNPJ</td><td style="padding:8px">' . esc_html($cnpj) . '</td></tr>';
    $body .= '<tr><td style="padding:8px;background:#f5f5f7;font-weight:600">Responsável</td><td style="padding:8px">' . esc_html($nome) . '</td></tr>';
    $body .= '<tr><td style="padding:8px;background:#f5f5f7;font-weight:600">CPF</td><td style="padding:8px">' . esc_html($cpf) . '</td></tr>';
    $body .= '<tr><td style="padding:8px;background:#f5f5f7;font-weight:600">Telefone/WhatsApp</td><td style="padding:8px">' . esc_html($tel) . '</td></tr>';
    $body .= '<tr><td style="padding:8px;background:#f5f5f7;font-weight:600">E-mail</td><td style="padding:8px">' . esc_html($email) . '</td></tr>';
    $body .= '</table>';
    $body .= '</div>';

    $from_name  = $nome ?: ($razao ?: 'Contato Site CDL');
    $from_email = $email ?: $to;

    $headers = [
        'From: ' . $from_name . ' <' . $from_email . '>',
        'Reply-To: ' . $from_name . ' <' . $from_email . '>',
        'Content-Type: text/html; charset=UTF-8',
    ];
    wp_mail($to, "[CDL Site] Quero fazer parte — {$razao}", $body, $headers);
    wp_safe_redirect(home_url('/associe-se/?associe=enviado'));
    exit;
}

/**
 * Fix: Resolve conflito de slug "certificado-digital" entre attachment e página.
 * Roda uma vez e marca como feito via option.
 */
add_action('init', function() {
    if (get_option('cdl_fix_certificado_slug')) return;

    // Renomeia attachment que ocupa o slug
    $att = get_posts(['post_type' => 'attachment', 'name' => 'certificado-digital', 'numberposts' => 1]);
    if ($att) {
        wp_update_post(['ID' => $att[0]->ID, 'post_name' => 'certificado-digital-img']);
    }

    // Cria a página se não existir
    $page = get_page_by_path('certificado-digital');
    if (!$page) {
        $id = wp_insert_post([
            'post_type'     => 'page',
            'post_title'    => 'Certificado Digital',
            'post_name'     => 'certificado-digital',
            'post_content'  => '',
            'post_excerpt'  => 'Certificação digital com economia e agilidade para pessoa física e jurídica.',
            'post_status'   => 'publish',
            'page_template' => 'page-servico.php',
        ]);
    } else {
        // Garante o template correto
        update_post_meta($page->ID, '_wp_page_template', 'page-servico.php');
    }

    flush_rewrite_rules(true);
    update_option('cdl_fix_certificado_slug', true);
}, 5);

/**
 * Remove páginas descontinuadas (rodará uma vez via option flag).
 * Bumpe o número da option (`cdl_removed_pages_vN`) sempre que adicionar
 * novos slugs para que o hook execute em sites já atualizados.
 */
add_action('init', function() {
    if (get_option('cdl_removed_pages_v2')) return;

    $removed_slugs = ['cdl-agencia', 'cdl-mais-voce'];
    foreach ($removed_slugs as $slug) {
        $page = get_page_by_path($slug);
        if ($page) {
            wp_delete_post($page->ID, true);
        }
    }

    update_option('cdl_removed_pages_v2', true);
    flush_rewrite_rules(true);
}, 15);

/**
 * Cria páginas obrigatórias do tema se não existirem.
 */
add_action('init', function() {
    if (get_option('cdl_pages_created_v2')) return;

    $pages = [
        'impostometro' => [
            'post_title'    => 'Impostômetro',
            'page_template' => 'page-impostometro.php',
        ],
        // Novos benefícios (template page-beneficio.php)
        'planejamento-estrategico' => [
            'post_title'    => 'Planejamento Estratégico',
            'page_template' => 'page-beneficio.php',
        ],
        'assessoria-contabil' => [
            'post_title'    => 'Assessoria Contábil',
            'page_template' => 'page-beneficio.php',
        ],
        'apoio-mei' => [
            'post_title'    => 'Apoio ao MEI',
            'page_template' => 'page-beneficio.php',
        ],
        'rede-de-descontos' => [
            'post_title'    => 'Rede de Descontos',
            'page_template' => 'page-beneficio.php',
        ],
        'espacos-corporativos' => [
            'post_title'    => 'Espaços Corporativos',
            'page_template' => 'page-beneficio.php',
        ],
        'eventos-corporativos' => [
            'post_title'    => 'Eventos Corporativos',
            'page_template' => 'page-beneficio.php',
        ],
        'nucleos-empresariais' => [
            'post_title'    => 'Núcleos Empresariais',
            'page_template' => 'page-beneficio.php',
        ],
        'treinamentos' => [
            'post_title'    => 'Treinamentos',
            'page_template' => 'page-beneficio.php',
        ],
        'midia-divulgacao' => [
            'post_title'    => 'Mídia e Divulgação',
            'page_template' => 'page-beneficio.php',
        ],
        'recrutamento' => [
            'post_title'    => 'Recrutamento',
            'page_template' => 'page-beneficio.php',
        ],
        'exames-admissionais' => [
            'post_title'    => 'Exames Admissionais',
            'page_template' => 'page-beneficio.php',
        ],
        'gestao-esocial' => [
            'post_title'    => 'Gestão E-social',
            'page_template' => 'page-beneficio.php',
        ],
    ];

    foreach ($pages as $slug => $data) {
        if (!get_page_by_path($slug)) {
            wp_insert_post([
                'post_type'     => 'page',
                'post_name'     => $slug,
                'post_status'   => 'publish',
                'post_content'  => '',
                'post_title'    => $data['post_title'],
                'page_template' => $data['page_template'],
            ]);
        }
    }

    update_option('cdl_pages_created_v2', true);
    flush_rewrite_rules(true);
}, 20);

// ACF JSON save/load path
add_filter('acf/settings/save_json', function () {
    return CDL_THEME_DIR . '/acf-json';
});

add_filter('acf/settings/load_json', function ($paths) {
    $paths[] = CDL_THEME_DIR . '/acf-json';
    return $paths;
});
