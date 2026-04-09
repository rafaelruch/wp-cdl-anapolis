<?php
/**
 * Seed: Criar categorias de associados e associados de exemplo
 * Acesse: /wp-admin/admin.php?page=cdl-seed-associados
 * DELETAR ESTE ARQUIVO APÓS EXECUÇÃO
 */

add_action('admin_menu', function () {
    add_submenu_page(
        'tools.php',
        'Seed Associados',
        'Seed Associados',
        'manage_options',
        'cdl-seed-associados',
        'cdl_seed_associados_page'
    );
});

function cdl_seed_associados_page() {
    if (isset($_GET['run']) && $_GET['run'] === '1') {
        cdl_run_seed_associados();
        echo '<div class="notice notice-success"><p>Associados criados com sucesso!</p></div>';
    }
    echo '<div class="wrap"><h1>Seed Associados</h1>';
    echo '<p>Cria categorias e associados de exemplo para teste.</p>';
    echo '<a href="?page=cdl-seed-associados&run=1" class="button button-primary">Executar Seed</a>';
    echo '</div>';
}

function cdl_run_seed_associados() {
    // Criar categorias
    $categorias = [
        'farmacias'    => 'Farmácias',
        'lojas'        => 'Lojas',
        'restaurantes' => 'Restaurantes',
        'servicos'     => 'Serviços',
        'saude'        => 'Saúde',
        'educacao'     => 'Educação',
    ];

    foreach ($categorias as $slug => $name) {
        if (!term_exists($slug, 'categoria_associado')) {
            wp_insert_term($name, 'categoria_associado', ['slug' => $slug]);
        }
    }

    // Associados de exemplo com coordenadas reais de Anápolis
    $associados = [
        [
            'nome'     => 'Farmácia Preço Bom',
            'cat'      => 'farmacias',
            'cnpj'     => '12.345.678/0001-90',
            'endereco' => 'R. Manoel D\'Abadia, 245',
            'bairro'   => 'Centro',
            'cep'      => '75020-010',
            'telefone' => '(62) 3328-1234',
            'lat'      => '-16.3268',
            'lng'      => '-48.9530',
        ],
        [
            'nome'     => 'Drogaria Mais Saúde',
            'cat'      => 'farmacias',
            'cnpj'     => '23.456.789/0001-01',
            'endereco' => 'Av. Brasil, 1050',
            'bairro'   => 'Centro',
            'cep'      => '75023-000',
            'telefone' => '(62) 3328-5678',
            'lat'      => '-16.3305',
            'lng'      => '-48.9512',
        ],
        [
            'nome'     => 'Magazine Center Lar',
            'cat'      => 'lojas',
            'cnpj'     => '34.567.890/0001-12',
            'endereco' => 'Av. Brasil Sul, 320',
            'bairro'   => 'Jundiaí',
            'cep'      => '75110-640',
            'telefone' => '(62) 3098-2222',
            'lat'      => '-16.3350',
            'lng'      => '-48.9545',
        ],
        [
            'nome'     => 'Ótica Visão Perfeita',
            'cat'      => 'lojas',
            'cnpj'     => '45.678.901/0001-23',
            'endereco' => 'R. 15 de Dezembro, 87',
            'bairro'   => 'Centro',
            'cep'      => '75024-250',
            'telefone' => '(62) 3098-3333',
            'lat'      => '-16.3282',
            'lng'      => '-48.9557',
        ],
        [
            'nome'     => 'Moda Feminina Bella',
            'cat'      => 'lojas',
            'cnpj'     => '56.789.012/0001-34',
            'endereco' => 'R. Engenheiro Portela, 150',
            'bairro'   => 'Centro',
            'cep'      => '75025-010',
            'telefone' => '(62) 3098-4444',
            'lat'      => '-16.3275',
            'lng'      => '-48.9500',
        ],
        [
            'nome'     => 'Restaurante Sabor Goiano',
            'cat'      => 'restaurantes',
            'cnpj'     => '67.890.123/0001-45',
            'endereco' => 'Av. Goiás, 780',
            'bairro'   => 'Jundiaí',
            'cep'      => '75113-400',
            'telefone' => '(62) 3098-5555',
            'lat'      => '-16.3320',
            'lng'      => '-48.9480',
        ],
        [
            'nome'     => 'Churrascaria Fogo de Chão',
            'cat'      => 'restaurantes',
            'cnpj'     => '78.901.234/0001-56',
            'endereco' => 'Av. JK, 1200',
            'bairro'   => 'Cidade Jardim',
            'cep'      => '75080-210',
            'telefone' => '(62) 3098-6666',
            'lat'      => '-16.3200',
            'lng'      => '-48.9600',
        ],
        [
            'nome'     => 'Auto Elétrica Raio',
            'cat'      => 'servicos',
            'cnpj'     => '89.012.345/0001-67',
            'endereco' => 'Av. São Francisco, 321',
            'bairro'   => 'Vila Jaiara',
            'cep'      => '75064-050',
            'telefone' => '(62) 3098-7777',
            'lat'      => '-16.3230',
            'lng'      => '-48.9430',
        ],
        [
            'nome'     => 'Escritório Contábil Precisão',
            'cat'      => 'servicos',
            'cnpj'     => '90.123.456/0001-78',
            'endereco' => 'R. Conde Afonso Celso, 50',
            'bairro'   => 'Centro',
            'cep'      => '75025-030',
            'telefone' => '(62) 3098-8888',
            'lat'      => '-16.3290',
            'lng'      => '-48.9535',
        ],
        [
            'nome'     => 'Clínica Odontológica Sorriso',
            'cat'      => 'saude',
            'cnpj'     => '01.234.567/0001-89',
            'endereco' => 'R. Engenheiro Portela, 55',
            'bairro'   => 'Centro',
            'cep'      => '75025-010',
            'telefone' => '(62) 3098-9999',
            'lat'      => '-16.3260',
            'lng'      => '-48.9520',
        ],
        [
            'nome'     => 'Laboratório Exame+',
            'cat'      => 'saude',
            'cnpj'     => '11.222.333/0001-44',
            'endereco' => 'Av. Brasil Norte, 500',
            'bairro'   => 'Cidade Jardim',
            'cep'      => '75083-600',
            'telefone' => '(62) 3328-0101',
            'lat'      => '-16.3180',
            'lng'      => '-48.9560',
        ],
        [
            'nome'     => 'Colégio Futuro Brilhante',
            'cat'      => 'educacao',
            'cnpj'     => '22.333.444/0001-55',
            'endereco' => 'R. 7 de Setembro, 200',
            'bairro'   => 'Centro',
            'cep'      => '75020-180',
            'telefone' => '(62) 3328-0202',
            'lat'      => '-16.3310',
            'lng'      => '-48.9490',
        ],
    ];

    foreach ($associados as $a) {
        // Verificar se já existe
        $existing = get_posts([
            'post_type'  => 'associado',
            'title'      => $a['nome'],
            'numberposts' => 1,
        ]);
        if ($existing) continue;

        $post_id = wp_insert_post([
            'post_type'   => 'associado',
            'post_title'  => $a['nome'],
            'post_status' => 'publish',
        ]);

        if (is_wp_error($post_id)) continue;

        // ACF fields
        update_field('associado_cnpj', $a['cnpj'], $post_id);
        update_field('associado_endereco', $a['endereco'], $post_id);
        update_field('associado_bairro', $a['bairro'], $post_id);
        update_field('associado_cep', $a['cep'], $post_id);
        update_field('associado_cidade', 'Anápolis', $post_id);
        update_field('associado_estado', 'GO', $post_id);
        update_field('associado_telefone', $a['telefone'], $post_id);
        update_field('associado_latitude', $a['lat'], $post_id);
        update_field('associado_longitude', $a['lng'], $post_id);

        // Categoria
        wp_set_object_terms($post_id, $a['cat'], 'categoria_associado');
    }
}
