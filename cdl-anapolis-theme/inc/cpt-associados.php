<?php
/**
 * Custom Post Type: Associados CDL
 */

function cdl_register_associado_cpt() {
    register_post_type('associado', [
        'labels' => [
            'name'               => 'Associados',
            'singular_name'      => 'Associado',
            'add_new'            => 'Novo Associado',
            'add_new_item'       => 'Novo Associado',
            'edit_item'          => 'Editar Associado',
            'view_item'          => 'Ver Associado',
            'all_items'          => 'Todos os Associados',
            'search_items'       => 'Buscar Associados',
            'not_found'          => 'Nenhum associado encontrado',
            'not_found_in_trash' => 'Nenhum associado na lixeira',
        ],
        'public'       => true,
        'has_archive'  => false,
        'menu_icon'    => 'dashicons-store',
        'supports'     => ['title', 'thumbnail'],
        'rewrite'      => ['slug' => 'associado'],
        'show_in_rest' => true,
    ]);

    register_taxonomy('categoria_associado', 'associado', [
        'labels' => [
            'name'          => 'Categorias de Associados',
            'singular_name' => 'Categoria',
            'search_items'  => 'Buscar Categorias',
            'all_items'     => 'Todas as Categorias',
            'edit_item'     => 'Editar Categoria',
            'add_new_item'  => 'Nova Categoria',
        ],
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => ['slug' => 'tipo-associado'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'cdl_register_associado_cpt');
