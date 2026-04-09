<?php
/**
 * ACF Options Pages and Field Configuration
 */

// ACF JSON save/load paths
add_filter('acf/settings/save_json', function() {
    return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function($paths) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Configuracoes do Site',
        'menu_title' => 'CDL Config',
        'menu_slug'  => 'cdl-config',
        'capability' => 'edit_posts',
        'icon_url'   => 'dashicons-admin-settings',
        'redirect'   => true,
    ]);

    acf_add_options_sub_page([
        'page_title'  => 'Header & Footer',
        'menu_title'  => 'Header & Footer',
        'menu_slug'   => 'cdl-config-header-footer',
        'parent_slug' => 'cdl-config',
    ]);

    acf_add_options_sub_page([
        'page_title'  => 'Homepage',
        'menu_title'  => 'Homepage',
        'menu_slug'   => 'cdl-config-homepage',
        'parent_slug' => 'cdl-config',
    ]);

    acf_add_options_sub_page([
        'page_title'  => 'Integracoes',
        'menu_title'  => 'Integracoes',
        'parent_slug' => 'cdl-config',
    ]);
}
