<?php
/**
 * Enqueue CSS and JS assets
 */

function cdl_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'cdl-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sora:wght@400;500;600;700;800&display=swap',
        [],
        null
    );

    // Theme CSS
    $css_files = [
        'variables',
        'base',
        'header',
        'hero',
        'features-band',
        'marquee',
        'benefits',
        'informativo',
        'showcase',
        'cta',
        'services',
        'steps',
        'quick-access',
        'economy',
        'whatsapp',
        'footer',
        'pages',
    ];

    foreach ($css_files as $file) {
        wp_enqueue_style(
            "cdl-{$file}",
            CDL_THEME_URI . "/assets/css/{$file}.css",
            [],
            CDL_THEME_VERSION
        );
    }

    // Associados CSS (only on quem-faz-parte page)
    if (is_page('quem-faz-parte')) {
        wp_enqueue_style(
            'cdl-associados',
            CDL_THEME_URI . '/assets/css/associados.css',
            [],
            CDL_THEME_VERSION
        );
    }

    // Theme JS
    wp_enqueue_script(
        'cdl-main',
        CDL_THEME_URI . '/assets/js/main.js',
        [],
        CDL_THEME_VERSION,
        true
    );

    // Associados JS + Google Maps (only on quem-faz-parte page)
    if (is_page('quem-faz-parte')) {
        wp_enqueue_script(
            'cdl-associados',
            CDL_THEME_URI . '/assets/js/associados.js',
            [],
            CDL_THEME_VERSION,
            true
        );
        $gmaps_key = get_field('google_maps_api_key', 'option') ?: '';
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
