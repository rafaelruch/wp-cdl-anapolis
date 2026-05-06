<?php
/**
 * Custom Post Type: Notícias (slug interno mantido como "informativo"
 * para não quebrar URLs já indexadas e meta keys existentes).
 */

function cdl_register_informativo_cpt() {
    register_post_type('informativo', [
        'labels' => [
            'name'               => 'Notícias',
            'singular_name'      => 'Notícia',
            'add_new'            => 'Nova Notícia',
            'add_new_item'       => 'Adicionar Nova Notícia',
            'edit_item'          => 'Editar Notícia',
            'view_item'          => 'Ver Notícia',
            'all_items'          => 'Todas as Notícias',
            'search_items'       => 'Buscar Notícias',
            'not_found'          => 'Nenhuma notícia encontrada',
            'not_found_in_trash' => 'Nenhuma notícia na lixeira',
            'menu_name'          => 'Notícias',
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
