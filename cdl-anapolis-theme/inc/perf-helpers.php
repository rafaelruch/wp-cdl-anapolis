<?php
/**
 * Performance helpers — queries cacheadas via transient.
 *
 * Cada helper:
 *  - retorna cache se existir
 *  - executa WP_Query com flags de performance (no_found_rows, etc)
 *  - grava transient com TTL
 *
 * Invalidação automática nos hooks save_post / delete_post.
 */

if (!defined('ABSPATH')) exit;

// =====================================================================
// Associados (CPT `associado`) — usado em /quem-faz-parte/
// =====================================================================
function cdl_get_associados_data() {
    $cache_key = 'cdl_associados_data_v1';
    $cached    = get_transient($cache_key);
    if ($cached !== false) {
        return $cached;
    }

    $query = new WP_Query([
        'post_type'              => 'associado',
        'posts_per_page'         => 500,           // cap defensivo
        'orderby'                => 'title',
        'order'                  => 'ASC',
        'no_found_rows'          => true,          // não usa paginação
        'update_post_meta_cache' => true,          // ACF lê meta — aproveita o batch
        'update_post_term_cache' => true,          // get_the_terms() abaixo
        'ignore_sticky_posts'    => true,
    ]);

    $data       = [];
    $categorias = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $id       = get_the_ID();
            $cats     = get_the_terms($id, 'categoria_associado');
            $cat_slug = '';
            $cat_name = '';
            if ($cats && !is_wp_error($cats)) {
                $cat_slug = $cats[0]->slug;
                $cat_name = $cats[0]->name;
                $categorias[$cat_slug] = $cat_name;
            }

            $lat = get_field('associado_latitude', $id);
            $lng = get_field('associado_longitude', $id);

            $data[] = [
                'id'             => $id,
                'nome'           => get_the_title(),
                'cnpj'           => get_field('associado_cnpj', $id) ?: '',
                'endereco'       => get_field('associado_endereco', $id) ?: '',
                'bairro'         => get_field('associado_bairro', $id) ?: '',
                'cep'            => get_field('associado_cep', $id) ?: '',
                'cidade'         => get_field('associado_cidade', $id) ?: 'Anápolis',
                'estado'         => get_field('associado_estado', $id) ?: 'GO',
                'telefone'       => get_field('associado_telefone', $id) ?: '',
                'lat'            => $lat ? floatval($lat) : null,
                'lng'            => $lng ? floatval($lng) : null,
                'categoria'      => $cat_slug,
                'categoria_nome' => $cat_name,
                'inicial'        => mb_strtoupper(mb_substr(get_the_title(), 0, 1)),
            ];
        }
        wp_reset_postdata();
    }

    $payload = [
        'data'       => $data,
        'categorias' => $categorias,
    ];

    set_transient($cache_key, $payload, 6 * HOUR_IN_SECONDS);
    return $payload;
}

// Invalidar cache quando associado mudar
add_action('save_post_associado', function () {
    delete_transient('cdl_associados_data_v1');
});
add_action('before_delete_post', function ($post_id) {
    if (get_post_type($post_id) === 'associado') {
        delete_transient('cdl_associados_data_v1');
    }
});
add_action('edited_categoria_associado', function () {
    delete_transient('cdl_associados_data_v1');
});

// =====================================================================
// Informativos (CPT `informativo`) — usado em section-informativo (home)
// =====================================================================
function cdl_get_home_informativos($limit = 4) {
    $cache_key = 'cdl_home_informativos_v2_' . intval($limit);
    $post_ids  = get_transient($cache_key);

    if ($post_ids === false) {
        // Query leve só para IDs — não busca campos completos do post.
        $id_q = new WP_Query([
            'post_type'              => 'informativo',
            'posts_per_page'         => intval($limit),
            'orderby'                => 'date',
            'order'                  => 'DESC',
            'fields'                 => 'ids',
            'no_found_rows'          => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
            'ignore_sticky_posts'    => true,
        ]);
        $post_ids = $id_q->posts;
        set_transient($cache_key, $post_ids, HOUR_IN_SECONDS);
    }

    // Reconstrói o WP_Query "fresco" a cada request.
    // Não cacheamos o WP_Query inteiro porque a serialização perde estado
    // interno e quebra get_the_date() / setup_postdata() no loop.
    if (empty($post_ids)) {
        return new WP_Query(['post__in' => [0]]); // query vazia
    }

    return new WP_Query([
        'post_type'           => 'informativo',
        'post__in'            => $post_ids,
        'posts_per_page'      => count($post_ids),
        'orderby'             => 'post__in',
        'no_found_rows'       => true,
        'ignore_sticky_posts' => true,
    ]);
}

add_action('save_post_informativo', function () {
    // Limpa todas variantes (4 e qualquer outro limite)
    global $wpdb;
    $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_cdl_home_informativos_%' OR option_name LIKE '_transient_timeout_cdl_home_informativos_%'");
});
add_action('before_delete_post', function ($post_id) {
    if (get_post_type($post_id) === 'informativo') {
        global $wpdb;
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_cdl_home_informativos_%' OR option_name LIKE '_transient_timeout_cdl_home_informativos_%'");
    }
});

// =====================================================================
// Depoimentos (CPT `depoimento`) — usado em section-testimonials (home)
// =====================================================================
function cdl_get_home_depoimentos($limit = 10) {
    $cache_key = 'cdl_home_depoimentos_v2_' . intval($limit);
    $post_ids  = get_transient($cache_key);

    if ($post_ids === false) {
        $id_q = new WP_Query([
            'post_type'              => 'depoimento',
            'posts_per_page'         => intval($limit),
            'orderby'                => 'menu_order',
            'order'                  => 'ASC',
            'fields'                 => 'ids',
            'no_found_rows'          => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
            'ignore_sticky_posts'    => true,
        ]);
        $post_ids = $id_q->posts;
        set_transient($cache_key, $post_ids, 6 * HOUR_IN_SECONDS);
    }

    if (empty($post_ids)) {
        return new WP_Query(['post__in' => [0]]);
    }

    return new WP_Query([
        'post_type'           => 'depoimento',
        'post__in'            => $post_ids,
        'posts_per_page'      => count($post_ids),
        'orderby'             => 'post__in',
        'no_found_rows'       => true,
        'ignore_sticky_posts' => true,
    ]);
}

add_action('save_post_depoimento', function () {
    global $wpdb;
    $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_cdl_home_depoimentos_%' OR option_name LIKE '_transient_timeout_cdl_home_depoimentos_%'");
});
add_action('before_delete_post', function ($post_id) {
    if (get_post_type($post_id) === 'depoimento') {
        global $wpdb;
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_cdl_home_depoimentos_%' OR option_name LIKE '_transient_timeout_cdl_home_depoimentos_%'");
    }
});
