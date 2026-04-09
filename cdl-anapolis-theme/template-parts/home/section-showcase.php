<?php
/**
 * Showcase - Split image + numbered list
 * ACF fields on options page
 */

$image       = get_field('showcase_image', 'option');
$tag         = get_field('showcase_tag', 'option') ?: 'Por que a CDL';
$title       = get_field('showcase_title', 'option') ?: 'Mais do que uma<br>entidade, uma comunidade';
$description = get_field('showcase_description', 'option') ?: 'Há mais de 60 anos conectando empreendedores e fortalecendo o comércio de Anápolis com serviços e relacionamentos que fazem a diferença.';
$items       = get_field('showcase_items', 'option');

$image_url = $image ? esc_url($image['url']) : 'https://images.unsplash.com/photo-1556761175-b413da4baf72?w=640&h=480&fit=crop';

// Fallback items
if (!$items) {
    $items = [
        [
            'item_title'       => '2.000+ Empreendedores',
            'item_description' => 'A maior comunidade de lojistas da região',
        ],
        [
            'item_title'       => '7 Serviços Exclusivos',
            'item_description' => 'Do crédito à saúde, tudo para o seu negócio',
        ],
        [
            'item_title'       => '60+ Anos de História',
            'item_description' => 'Tradição e inovação caminhando juntas',
        ],
    ];
}
?>

<section class="sec showcase" style="background:var(--light)" aria-label="<?php echo esc_attr($tag); ?>">
    <div class="wrap">
        <div class="showcase-img ao">
            <img src="<?php echo $image_url; ?>" alt="Equipe CDL trabalhando" loading="lazy" style="border-radius:var(--radius-xl)">
        </div>
        <div>
            <div class="sec-tag ao"><?php echo esc_html($tag); ?></div>
            <h2 class="sec-title ao"><?php echo wp_kses_post($title); ?></h2>
            <p class="sec-desc ao"><?php echo esc_html($description); ?></p>
            <div class="showcase-list">
                <?php foreach ($items as $i => $item):
                    $num = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
                    $delay_class = $i > 0 ? ' ao-d' . $i : ' ao-d1';
                ?>
                <div class="showcase-item ao<?php echo $delay_class; ?>">
                    <div class="dot"><?php echo $num; ?></div>
                    <div>
                        <h4><?php echo esc_html($item['item_title']); ?></h4>
                        <p><?php echo esc_html($item['item_description']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
