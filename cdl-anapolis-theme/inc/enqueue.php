<?php
/**
 * Enqueue CSS and JS assets
 *
 * Estratégia:
 * - Fontes locais (Inter + Sora) via fonts.css com font-display: swap
 * - CSS global (sempre carrega): variables, base, header, footer, whatsapp, fonts
 * - CSS de home (só na home): hero, features-band, marquee, benefits, informativo,
 *   showcase, cta, services, steps, quick-access, economy, testimonials
 * - CSS de páginas internas (não-home): pages.css
 * - CSS específico por slug: planos, impostometro, associados
 */

function cdl_enqueue_assets() {
    // -----------------------------------------------------------------
    // CSS GLOBAL — carrega em toda página
    // -----------------------------------------------------------------
    $global_css = [
        'fonts',      // @font-face Inter + Sora (self-hosted)
        'variables',  // design tokens
        'base',       // reset, .sec, .btn
        'header',     // nav, mega-menu
        'footer',     // footer grid
        'whatsapp',   // FAB widget
        'cta',        // .cta-gold + .cta-dark — usados em 12 templates (home + internas)
    ];

    foreach ($global_css as $file) {
        wp_enqueue_style(
            "cdl-{$file}",
            CDL_THEME_URI . "/assets/css/{$file}.css",
            [],
            CDL_THEME_VERSION
        );
    }

    // -----------------------------------------------------------------
    // CSS DA HOMEPAGE — só carrega no front-page
    // -----------------------------------------------------------------
    if (is_front_page()) {
        $home_css = [
            'hero',
            'features-band',
            'marquee',
            'benefits',
            'informativo',
            'showcase',
            'services',
            'steps',
            'quick-access',
            'economy',
            'testimonials',
        ];
        foreach ($home_css as $file) {
            wp_enqueue_style(
                "cdl-{$file}",
                CDL_THEME_URI . "/assets/css/{$file}.css",
                [],
                CDL_THEME_VERSION
            );
        }
    } else {
        // Páginas internas / arquivos / singles
        wp_enqueue_style(
            'cdl-pages',
            CDL_THEME_URI . '/assets/css/pages.css',
            [],
            CDL_THEME_VERSION
        );

        // Notícias (informativo) usa o card de informativo
        if (is_singular('informativo') || is_post_type_archive('informativo')) {
            wp_enqueue_style('cdl-informativo', CDL_THEME_URI . '/assets/css/informativo.css', [], CDL_THEME_VERSION);
        }
    }

    // -----------------------------------------------------------------
    // CSS POR SLUG ESPECÍFICO
    // -----------------------------------------------------------------
    if (is_page('associe-se')) {
        wp_enqueue_style('cdl-planos', CDL_THEME_URI . '/assets/css/planos.css', [], CDL_THEME_VERSION);
        wp_enqueue_script(
            'cdl-associe-se',
            CDL_THEME_URI . '/assets/js/associe-se.js',
            [],
            CDL_THEME_VERSION,
            true
        );
    }

    if (is_page('impostometro')) {
        wp_enqueue_style('cdl-impostometro', CDL_THEME_URI . '/assets/css/impostometro.css', [], CDL_THEME_VERSION);
    }

    if (is_page('quem-faz-parte')) {
        wp_enqueue_style('cdl-associados', CDL_THEME_URI . '/assets/css/associados.css', [], CDL_THEME_VERSION);
    }

    // -----------------------------------------------------------------
    // JS GLOBAL
    // -----------------------------------------------------------------
    wp_enqueue_script(
        'cdl-main',
        CDL_THEME_URI . '/assets/js/main.js',
        [],
        CDL_THEME_VERSION,
        true
    );

    // -----------------------------------------------------------------
    // SWIPER (CDN) + carousel.js — só na home (depoimentos + benefícios)
    // -----------------------------------------------------------------
    if (is_front_page()) {
        wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11');
        wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], '11', true);
        wp_enqueue_script(
            'cdl-carousel',
            CDL_THEME_URI . '/assets/js/carousel.js',
            ['swiper'],
            CDL_THEME_VERSION,
            true
        );
    }

    // -----------------------------------------------------------------
    // JS POR SLUG
    // -----------------------------------------------------------------
    if (is_page('quem-faz-parte')) {
        wp_enqueue_script(
            'cdl-associados',
            CDL_THEME_URI . '/assets/js/associados.js',
            [],
            CDL_THEME_VERSION,
            true
        );

        // Dados dos associados (movidos do <script> inline do template).
        // Usa o mesmo nome global `cdlAssociados` que associados.js já espera.
        $assoc_payload = cdl_get_associados_data();
        wp_add_inline_script(
            'cdl-associados',
            'var cdlAssociados = ' . wp_json_encode($assoc_payload['data']) . ';',
            'before'
        );

        $gmaps_key = function_exists('get_field') ? (get_field('google_maps_api_key', 'option') ?: '') : '';
        if ($gmaps_key) {
            wp_enqueue_script(
                'google-maps',
                'https://maps.googleapis.com/maps/api/js?key=' . esc_attr($gmaps_key) . '&callback=initAssociadosMap',
                ['cdl-associados'],
                null,
                true
            );
        }
    }
}
add_action('wp_enqueue_scripts', 'cdl_enqueue_assets');

/**
 * Preconnect/preload helpers no <head> para performance.
 * - Preload das fontes mais usadas (Inter regular + 600, Sora 600 + 700)
 *   acelera FCP/LCP.
 */
function cdl_resource_hints() {
    $fonts_to_preload = [
        'inter/inter-v20-latin-regular.woff2',
        'inter/inter-v20-latin-600.woff2',
        'sora/sora-v17-latin-600.woff2',
        'sora/sora-v17-latin-700.woff2',
    ];
    foreach ($fonts_to_preload as $font) {
        printf(
            '<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
            esc_url(CDL_THEME_URI . '/assets/fonts/' . $font)
        );
    }
}
add_action('wp_head', 'cdl_resource_hints', 1);
