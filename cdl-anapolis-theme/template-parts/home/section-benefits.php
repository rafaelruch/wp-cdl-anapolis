<?php
/**
 * Benefits Bento Grid Section
 */
$tag      = get_field('benefits_tag', 'option') ?: 'Para quem faz parte';
$title    = get_field('benefits_title', 'option') ?: 'Benefícios que fazem a diferença';
$subtitle = get_field('benefits_subtitle', 'option') ?: 'Vantagens reais que impulsionam o crescimento do seu negócio todos os dias.';
$benefits = get_field('benefits', 'option');

if (!$benefits) {
    $benefits = [
        ['icon' => null, 'title' => 'Assessoria Jurídica', 'description' => 'Orientação jurídica especializada para questões empresariais e trabalhistas do seu negócio.', 'link' => '/cdl-assessoria-juridica/'],
        ['icon' => null, 'title' => 'CDL Mais Você', 'description' => 'Programa de benefícios e descontos exclusivos para membros e seus colaboradores.', 'link' => '/cdl-mais-voce/'],
        ['icon' => null, 'title' => 'CDL Saúde', 'description' => 'Planos de saúde com condições especiais para sua empresa e funcionários.', 'link' => '/cdl-saude/'],
        ['icon' => null, 'title' => 'Sede Campestre', 'description' => 'Espaço de lazer exclusivo para membros e familiares em Anápolis.', 'link' => '/sede-campestre/'],
    ];
}

$svg_icons = [
    '<circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/>',
    '<path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>',
    '<path d="M22 12h-4l-3 9L9 3l-3 9H2"/>',
    '<path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>',
];
$delays = ['', ' ao-d1', ' ao-d1', ' ao-d2'];
?>

<section class="sec" id="beneficios">
    <div class="wrap">
        <div class="sec-tag ao"><?php echo esc_html($tag); ?></div>
        <h2 class="sec-title ao"><?php echo wp_kses_post($title); ?></h2>
        <p class="sec-desc ao"><?php echo esc_html($subtitle); ?></p>
        <div class="bento">
            <?php foreach ($benefits as $i => $benefit): ?>
            <div class="bento-card ao<?php echo $delays[$i % 4]; ?>">
                <div class="ico">
                    <?php if (!empty($benefit['icon'])): ?>
                        <img src="<?php echo esc_url($benefit['icon']['url']); ?>" alt="" width="20" height="20" loading="lazy">
                    <?php else: ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><?php echo $svg_icons[$i % 4]; ?></svg>
                    <?php endif; ?>
                </div>
                <h3><?php echo esc_html($benefit['title']); ?></h3>
                <p><?php echo esc_html($benefit['description']); ?></p>
                <?php if (!empty($benefit['link'])): ?>
                <a href="<?php echo esc_url($benefit['link']); ?>" class="link">Saiba mais &rarr;</a>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
