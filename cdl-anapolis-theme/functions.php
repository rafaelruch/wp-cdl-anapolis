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
require_once CDL_THEME_DIR . '/inc/enqueue.php';

// Custom Post Types
require_once CDL_THEME_DIR . '/inc/cpt-informativo.php';
require_once CDL_THEME_DIR . '/inc/cpt-depoimentos.php';
require_once CDL_THEME_DIR . '/inc/cpt-associados.php';

// ACF Configuration
require_once CDL_THEME_DIR . '/inc/acf-fields.php';

// Seed Associados (DELETAR APÓS EXECUÇÃO)
if (file_exists(CDL_THEME_DIR . '/seed-associados.php')) {
    require_once CDL_THEME_DIR . '/seed-associados.php';
}

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

    $body  = "Nome: {$nome}\n";
    $body .= "E-mail: {$email}\n";
    $body .= "Telefone: {$tel}\n";
    $body .= "Assunto: {$assunto}\n\n";
    $body .= "Mensagem:\n{$msg}";

    $headers = ['Reply-To: ' . $nome . ' <' . $email . '>'];
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

    $body  = "=== Nova solicitação para fazer parte ===\n\n";
    $body .= "Razão Social: {$razao}\n";
    $body .= "CNPJ: {$cnpj}\n";
    $body .= "Responsável: {$nome}\n";
    $body .= "CPF: {$cpf}\n";
    $body .= "Telefone/WhatsApp: {$tel}\n";
    $body .= "E-mail: {$email}\n";

    wp_mail($to, "[CDL Site] Quero fazer parte — {$razao}", $body);
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
 * Cria páginas obrigatórias do tema se não existirem.
 */
add_action('init', function() {
    if (get_option('cdl_pages_created')) return;

    $pages = [
        'impostometro' => [
            'post_title'    => 'Impostômetro',
            'page_template' => 'page-impostometro.php',
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

    update_option('cdl_pages_created', true);
}, 20);

// ACF JSON save/load path
add_filter('acf/settings/save_json', function () {
    return CDL_THEME_DIR . '/acf-json';
});

add_filter('acf/settings/load_json', function ($paths) {
    $paths[] = CDL_THEME_DIR . '/acf-json';
    return $paths;
});
