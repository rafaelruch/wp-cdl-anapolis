<?php
/**
 * Custom Post Type: Depoimentos
 */

function cdl_register_depoimentos_cpt() {
    register_post_type('depoimento', [
        'labels' => [
            'name'               => 'Depoimentos',
            'singular_name'      => 'Depoimento',
            'add_new'            => 'Novo Depoimento',
            'add_new_item'       => 'Novo Depoimento',
            'edit_item'          => 'Editar Depoimento',
            'all_items'          => 'Todos os Depoimentos',
            'search_items'       => 'Buscar Depoimentos',
            'not_found'          => 'Nenhum depoimento encontrado',
            'not_found_in_trash' => 'Nenhum depoimento na lixeira',
        ],
        'public'       => false,
        'show_ui'      => true,
        'has_archive'  => false,
        'menu_icon'    => 'dashicons-format-quote',
        'supports'     => ['title', 'page-attributes'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'cdl_register_depoimentos_cpt');
