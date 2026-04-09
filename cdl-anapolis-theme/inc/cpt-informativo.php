<?php
/**
 * Custom Post Type: Informativo CDL
 */

function cdl_register_informativo_cpt() {
    register_post_type('informativo', [
        'labels' => [
            'name'               => 'Informativo CDL',
            'singular_name'      => 'Publicacao',
            'add_new'            => 'Nova Publicacao',
            'add_new_item'       => 'Nova Publicacao',
            'edit_item'          => 'Editar Publicacao',
            'view_item'          => 'Ver Publicacao',
            'all_items'          => 'Todas as Publicacoes',
            'search_items'       => 'Buscar Publicacoes',
            'not_found'          => 'Nenhuma publicacao encontrada',
            'not_found_in_trash' => 'Nenhuma publicacao na lixeira',
        ],
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-megaphone',
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite'      => ['slug' => 'informativo'],
        'show_in_rest' => true,
    ]);

    register_taxonomy('categoria_informativo', 'informativo', [
        'labels' => [
            'name'          => 'Categorias',
            'singular_name' => 'Categoria',
            'search_items'  => 'Buscar Categorias',
            'all_items'     => 'Todas as Categorias',
            'edit_item'     => 'Editar Categoria',
            'add_new_item'  => 'Nova Categoria',
        ],
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => ['slug' => 'categoria'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'cdl_register_informativo_cpt');
