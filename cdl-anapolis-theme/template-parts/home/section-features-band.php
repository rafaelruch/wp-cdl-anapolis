<?php
/**
 * Features Band - Dark section with feature cards
 * ACF fields on options page
 */

$title    = get_field('features_band_title', 'option') ?: 'Todas as vantagens, <em>em um só lugar</em>';
$subtitle = get_field('features_band_subtitle', 'option') ?: 'Serviços essenciais para quem empreende — do crédito à assessoria jurídica, tudo pensado para você focar no que importa.';
$items    = get_field('features_band_items', 'option');

// Fallback items
if (!$items) {
    $items = [
        [
            'item_icon'        => null,
            'item_title'       => 'Proteção ao Crédito',
            'item_description' => 'Consultas SPC, negativação e recuperação de crédito para proteger o seu negócio contra inadimplência.',
        ],
        [
            'item_icon'        => null,
            'item_title'       => 'Assessoria Jurídica',
            'item_description' => 'Orientação jurídica especializada para questões empresariais, trabalhistas e tributárias.',
        ],
        [
            'item_icon'        => null,
            'item_title'       => 'CDL Saúde',
            'item_description' => 'Planos de saúde com condições exclusivas para quem faz parte e seus colaboradores.',
        ],
    ];
}

// Icon SVGs by index (used when no ACF image is set)
$default_icons = [
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>',
    '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>',
];
?>

<section class="features-band" aria-label="Principais vantagens">
    <div class="wrap">
        <h2 class="features-headline ao"><?php echo wp_kses_post($title); ?></h2>
        <p class="features-sub ao ao-d1"><?php echo esc_html($subtitle); ?></p>
        <div class="features-grid">
            <?php foreach ($items as $i => $item):
                $delay_class = $i > 0 ? ' ao-d' . $i : '';
            ?>
            <div class="feature-card ao<?php echo $delay_class; ?>">
                <div class="feature-ico">
                    <?php if (!empty($item['item_icon'])): ?>
                        <img src="<?php echo esc_url($item['item_icon']['url']); ?>" alt="" width="22" height="22" loading="lazy">
                    <?php else: ?>
                        <?php echo $default_icons[$i % count($default_icons)]; ?>
                    <?php endif; ?>
                </div>
                <h3><?php echo esc_html($item['item_title']); ?></h3>
                <p><?php echo esc_html($item['item_description']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
