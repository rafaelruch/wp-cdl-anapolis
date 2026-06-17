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
require_once CDL_THEME_DIR . '/inc/cdl-acf-seeds.php';
require_once CDL_THEME_DIR . '/inc/enqueue.php';

// Custom Post Types
require_once CDL_THEME_DIR . '/inc/cpt-informativo.php';
require_once CDL_THEME_DIR . '/inc/cpt-depoimentos.php';
require_once CDL_THEME_DIR . '/inc/cpt-associados.php';

// Contadores (Impostômetro + Gastômetro) — código original dos plugins
// "Impostômetro CDL Anápolis" e "Gastômetro CDL Anápolis" do Matheus
// Rezende, embarcado no tema pra dispensar instalação manual de plugin.
// Disponibiliza os shortcodes [impostometro_cdl] e [gastometro_cdl].
require_once CDL_THEME_DIR . '/inc/contadores/impostometro.php';
require_once CDL_THEME_DIR . '/inc/contadores/gastometro.php';

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
 * Garante que /sobre-nos/ exista e tenha o template page-sobre-nos.php
 * selecionado. Sem isso, o field group ACF "Página - Sobre Nós" (com
 * location `page_template == page-sobre-nos.php`) não aparece no admin,
 * o cliente edita o Gutenberg achando que vai aparecer no frontend, mas
 * o template não chama the_content() — tudo vem de ACF. Sem ACF, sem
 * edição possível.
 */
add_action('init', function() {
    if (get_option('cdl_fix_sobre_nos_v1')) return;

    $page = get_page_by_path('sobre-nos');
    if (!$page) {
        wp_insert_post([
            'post_type'     => 'page',
            'post_title'    => 'Sobre Nós',
            'post_name'     => 'sobre-nos',
            'post_status'   => 'publish',
            'page_template' => 'page-sobre-nos.php',
        ]);
    } else {
        // Força o template correto mesmo se a página já existia com outro.
        update_post_meta($page->ID, '_wp_page_template', 'page-sobre-nos.php');
    }

    flush_rewrite_rules(true);
    update_option('cdl_fix_sobre_nos_v1', true);
}, 5);

/**
 * Garante que /spc/ exista com o template page-servico.php.
 * O hook `cdl_pages_created_v4` deveria criar essa página, mas em sites
 * onde a flag v4 já estava marcada (deploy passado), o WP pulou a
 * criação. Esse hook dedicado força a criação independente da flag
 * anterior. Após o attachment com slug `spc` ter sido renomeado por
 * `cdl_fix_service_slugs_v1`, o slug agora está livre para a page.
 */
add_action('init', function() {
    if (get_option('cdl_fix_spc_page_v1')) return;

    $page = get_page_by_path('spc');
    if (!$page) {
        wp_insert_post([
            'post_type'     => 'page',
            'post_title'    => 'SPC Brasil',
            'post_name'     => 'spc',
            'post_status'   => 'publish',
            'page_template' => 'page-servico.php',
        ]);
    } else {
        update_post_meta($page->ID, '_wp_page_template', 'page-servico.php');
    }

    flush_rewrite_rules(true);
    update_option('cdl_fix_spc_page_v1', true);
}, 6); // depois do fix dos slugs (prioridade 5)

/**
 * Mesmo problema de slug conflitando com attachment, mas para os
 * demais serviços do mega-menu (spc.png, cdl-celular.png, etc.). O WP
 * por padrão prioriza o attachment quando os dois existem, fazendo a
 * URL /spc/ abrir a imagem em vez da página. Renomeamos o attachment
 * para liberar o slug — a página propriamente dita é criada pelo hook
 * `cdl_pages_created_v4` mais adiante.
 *
 * Bumpe o número (`cdl_fix_service_slugs_vN`) sempre que adicionar
 * novos slugs aqui para que execute em sites já atualizados.
 */
add_action('init', function() {
    if (get_option('cdl_fix_service_slugs_v2')) return;

    $slugs = ['spc', 'cdl-celular', 'central-de-cobrancas', 'nfe-nfce', 'tempo-saude', 'cdl-locacoes', 'balcao-do-mei'];
    foreach ($slugs as $slug) {
        $att = get_posts(['post_type' => 'attachment', 'name' => $slug, 'numberposts' => 1, 'post_status' => 'inherit']);
        if ($att) {
            wp_update_post(['ID' => $att[0]->ID, 'post_name' => $slug . '-img']);
        }
    }

    flush_rewrite_rules(true);
    update_option('cdl_fix_service_slugs_v2', true);
}, 5);

/**
 * Remove páginas descontinuadas (rodará uma vez via option flag).
 * Bumpe o número da option (`cdl_removed_pages_vN`) sempre que adicionar
 * novos slugs para que o hook execute em sites já atualizados.
 */
add_action('init', function() {
    if (get_option('cdl_removed_pages_v4')) return;

    $removed_slugs = ['cdl-agencia', 'cdl-mais-voce', 'impostometro', 'quem-faz-parte'];
    foreach ($removed_slugs as $slug) {
        $page = get_page_by_path($slug);
        if ($page) {
            wp_delete_post($page->ID, true);
        }
    }

    update_option('cdl_removed_pages_v4', true);
    flush_rewrite_rules(true);
}, 15);

/**
 * Cria páginas obrigatórias do tema se não existirem.
 */
add_action('init', function() {
    if (get_option('cdl_pages_created_v5')) return;

    $pages = [
        'area-associado' => [
            'post_title'    => 'Área do Associado',
            'page_template' => 'page-area-associado.php',
        ],
        'balcao-do-mei' => [
            'post_title'    => 'Balcão do MEI',
            'page_template' => 'page-balcao-do-mei.php',
        ],
        // Serviços (template page-servico.php) — slugs pareados com o
        // mega-menu de Serviços do header. certificado-digital-cdl já
        // é criado por outro hook (cdl_fix_certificado_slug).
        'spc' => [
            'post_title'    => 'SPC Brasil',
            'page_template' => 'page-servico.php',
        ],
        'cdl-celular' => [
            'post_title'    => 'CDL Celular',
            'page_template' => 'page-servico.php',
        ],
        'central-de-cobrancas' => [
            'post_title'    => 'Central de Cobranças',
            'page_template' => 'page-servico.php',
        ],
        'nfe-nfce' => [
            'post_title'    => 'NF-e / NFC-e',
            'page_template' => 'page-servico.php',
        ],
        'tempo-saude' => [
            'post_title'    => 'Tempo & Saúde',
            'page_template' => 'page-servico.php',
        ],
        'cdl-locacoes' => [
            'post_title'    => 'CDL Locações',
            'page_template' => 'page-servico.php',
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

    update_option('cdl_pages_created_v5', true);
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

/**
 * Popula o repeater `features_band_items` no ACF Options com os 6 serviços
 * do mega-menu (sobrescreve qualquer conteúdo antigo). Roda uma vez por
 * versão da flag `cdl_seed_features_band_vN` — bumpe o número quando
 * quiser repropagar.
 *
 * Usa hook `acf/init` para garantir que ACF esteja pronto antes de
 * chamar update_field.
 */
add_action('acf/init', function () {
    if (!function_exists('update_field')) return;
    if (get_option('cdl_seed_features_band_v1')) return;

    $items = [
        [
            'item_title'       => 'CDL Celular',
            'item_link'        => '/cdl-celular/',
            'item_description' => 'Consultas e proteção mobile para o seu negócio.',
            'item_icon'        => false,
        ],
        [
            'item_title'       => 'Central de Cobranças',
            'item_link'        => '/central-de-cobrancas/',
            'item_description' => 'Recuperação de crédito profissional e segura.',
            'item_icon'        => false,
        ],
        [
            'item_title'       => 'Certificado Digital',
            'item_link'        => '/certificado-digital-cdl/',
            'item_description' => 'e-CPF e e-CNPJ nos formatos A1 e A3, com agendamento facilitado.',
            'item_icon'        => false,
        ],
        [
            'item_title'       => 'NF-e / NFC-e',
            'item_link'        => '/nfe-nfce/',
            'item_description' => 'Emissão de notas fiscais eletrônicas sem complicação.',
            'item_icon'        => false,
        ],
        [
            'item_title'       => 'SPC Brasil',
            'item_link'        => '/spc/',
            'item_description' => 'Consultas e proteção ao crédito com a maior base do país.',
            'item_icon'        => false,
        ],
        [
            'item_title'       => 'Tempo & Saúde',
            'item_link'        => '/tempo-saude/',
            'item_description' => 'Saúde ocupacional e segurança do trabalho para sua equipe.',
            'item_icon'        => false,
        ],
    ];

    update_field('features_band_items', $items, 'option');
    update_option('cdl_seed_features_band_v1', true);
});

/**
 * Seed dos 5 planos de associação na página /associe-se/.
 * Roda uma vez por versão (`cdl_seed_associe_planos_vN`) — bumpe quando
 * quiser repropagar o default. Cliente edita normalmente pelo admin
 * depois disso, sem que o seed sobrescreva o que ele já preencheu.
 */
add_action('acf/init', function () {
    if (!function_exists('update_field')) return;
    if (get_option('cdl_seed_associe_planos_v4')) return;

    $page = get_page_by_path('associe-se');
    if (!$page) return;

    $planos = [
        [
            'plano_key'      => 'bronze',
            'plano_name'     => 'BRONZE',
            'plano_desc'     => 'Para associados<br><strong>MEI</strong>',
            'plano_features' => "CDL Saúde\nBalcão do MEI",
        ],
        [
            'plano_key'      => 'essencial',
            'plano_name'     => 'ESSENCIAL',
            'plano_desc'     => 'Para associados com até<br><strong>10 funcionários</strong>',
            'plano_features' => "CDL Saúde\nAssessoria Jurídica\nAssessoria Contábil\nAssessoria de Apoio Estratégico\nRede de descontos\nCertificado digital A1 PJ\nEventos corporativos\nParticipação dos Núcleos\nRecrutamento e Seleção\nExames Admissionais e Demissionais\nGestão de E-SOCIAL",
        ],
        [
            'plano_key'       => 'prata',
            'plano_name'      => 'PRATA',
            'plano_desc'      => 'Para associados com até<br><strong>30 funcionários</strong>',
            'plano_highlight' => true,
            'plano_features'  => "CDL Saúde\nAssessoria Jurídica\nAssessoria Contábil\nAssessoria de Apoio Estratégico\nTreinamentos e Consultorias\nRede de descontos\nCertificado digital A1 PJ\nEventos corporativos (1)\nParticipação dos Núcleos\nRecrutamento e Seleção\nExames Admissionais e Demissionais\nGestão de E-SOCIAL\nEspaços Corporativos (1)\nMídia sites e redes sociais (1)\nEspaço de lazer e eventos (1)",
        ],
        [
            'plano_key'      => 'ouro',
            'plano_name'     => 'OURO',
            'plano_desc'     => 'Para associados com até<br><strong>50 funcionários</strong>',
            'plano_features' => "CDL Saúde\nAssessoria Jurídica\nAssessoria Contábil\nAssessoria de Apoio Estratégico\nTreinamentos e Consultorias\nRede de descontos\nCertificado digital A1 PJ\nEventos corporativos (2)\nParticipação dos Núcleos\nRecrutamento e Seleção\nExames Admissionais e Demissionais\nGestão de E-SOCIAL\nEspaços Corporativos (2)\nMídia sites e redes sociais (2)\nEspaço de lazer e eventos (2)",
        ],
        [
            'plano_key'      => 'diamante',
            'plano_name'     => 'DIAMANTE',
            'plano_desc'     => 'Para associados com<br><strong>mais de 50 funcionários</strong>',
            'plano_features' => "CDL Saúde\nAssessoria Jurídica\nAssessoria Contábil\nAssessoria de Apoio Estratégico\nTreinamentos e Consultorias\nRede de descontos\nCertificado digital A1 PJ\nEventos corporativos\nParticipação dos Núcleos\nRecrutamento e Seleção\nExames Admissionais e Demissionais\nGestão de E-SOCIAL\nEspaços Corporativos\nMídia sites e redes sociais\nEspaço de lazer e eventos",
        ],
    ];

    update_field('planos', $planos, $page->ID);
    update_option('cdl_seed_associe_planos_v4', true);
});

/**
 * Migração one-time dos campos renomeados em group_header_footer.json.
 * O ACF Options grava cada field em wp_options como `options_{name}`.
 * Quando renomeamos `phone → top_bar_phone` (e similares) os dados que
 * o cliente já preencheu ficariam órfãos na chave antiga, e os
 * templates que leem o nome novo encontrariam vazio.
 *
 * Este hook copia, uma única vez, o valor antigo para a nova chave
 * se ela ainda estiver vazia, preservando a configuração existente.
 * Bumpe a flag (`cdl_migrate_hf_options_vN`) sempre que precisar
 * repetir a operação em sites já atualizados.
 */
add_action('init', function () {
    if (get_option('cdl_migrate_hf_options_v1')) return;

    $map = [
        'options_phone'   => 'options_top_bar_phone',
        'options__phone'  => 'options__top_bar_phone',   // ACF reference key
        'options_email'   => 'options_top_bar_email',
        'options__email'  => 'options__top_bar_email',
        'options_address' => 'options_footer_address',
        'options__address'=> 'options__footer_address',
    ];

    foreach ($map as $old => $new) {
        $old_val = get_option($old);
        if ($old_val !== false && $old_val !== '' && get_option($new) === false) {
            update_option($new, $old_val);
        }
    }

    update_option('cdl_migrate_hf_options_v1', true);
}, 8);
