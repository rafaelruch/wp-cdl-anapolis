<?php
/**
 * Hero Section - Vertical Slider with Blue Gradient
 * ACF repeater: hero_slides on options page
 */

$slides = get_field('hero_slides', 'option');

// Fallback defaults when ACF is empty
if (!$slides) {
    $slides = [
        [
            'slide_tag'            => 'Desde 1962',
            'slide_title_line1'    => 'O lugar certo',
            'slide_title_line2'    => 'pra você',
            'slide_title_line3'    => 'crescer',
            'slide_highlight'      => 'line3',
            'slide_subtitle'       => 'Junte-se a mais de 2.000 empreendedores que já contam com serviços exclusivos, networking e suporte para prosperar em Anápolis.',
            'slide_cta_primary_text'  => 'Quero fazer parte',
            'slide_cta_primary_link'  => '/associe-se/',
            'slide_cta_secondary_text' => 'Ver benefícios',
            'slide_cta_secondary_link' => '#beneficios',
            'slide_images'         => null,
        ],
        [
            'slide_tag'            => 'Para o MEI e pequeno empreendedor',
            'slide_title_line1'    => 'Aqui pra te',
            'slide_title_line2'    => 'ajudar a',
            'slide_title_line3'    => 'crescer',
            'slide_highlight'      => 'line3',
            'slide_subtitle'       => 'Crédito protegido, assessoria jurídica, saúde empresarial e muito mais. Ferramentas que você precisa, com condições que cabem no seu bolso.',
            'slide_cta_primary_text'  => 'Explorar serviços',
            'slide_cta_primary_link'  => '#servicos',
            'slide_cta_secondary_text' => 'SPC Online',
            'slide_cta_secondary_link' => '/spc/',
            'slide_images'         => null,
        ],
        [
            'slide_tag'            => 'Comunidade que faz acontecer',
            'slide_title_line1'    => 'Não precisa',
            'slide_title_line2'    => 'crescer',
            'slide_title_line3'    => 'sozinho',
            'slide_highlight'      => 'line3',
            'slide_subtitle'       => 'Eventos, capacitações, networking e uma comunidade de empreendedores que se apoiam. Juntos, o comércio de Anápolis vai mais longe.',
            'slide_cta_primary_text'  => 'Entrar para a comunidade',
            'slide_cta_primary_link'  => '/associe-se/',
            'slide_cta_secondary_text' => 'Ver informativos',
            'slide_cta_secondary_link' => '#informativo',
            'slide_images'         => null,
        ],
    ];
}

// Fallback placeholder images
$placeholder_images = [
    [
        'https://images.unsplash.com/photo-1556761175-4b46a572b786?w=520&h=640&fit=crop&crop=faces',
        'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=400&h=480&fit=crop',
        'https://images.unsplash.com/photo-1573164713988-8665fc963095?w=440&h=360&fit=crop',
        'https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=320&h=320&fit=crop&crop=faces',
    ],
    [
        'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=520&h=640&fit=crop',
        'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=400&h=480&fit=crop',
        'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=440&h=360&fit=crop',
        'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=320&h=320&fit=crop',
    ],
    [
        'https://images.unsplash.com/photo-1515187029135-18ee286d815b?w=520&h=640&fit=crop',
        'https://images.unsplash.com/photo-1528901166007-3784c7dd3653?w=400&h=480&fit=crop',
        'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=440&h=360&fit=crop',
        'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=320&h=320&fit=crop',
    ],
];

$total_slides = count($slides);
?>

<section class="hero" id="hero" aria-label="Apresentacao CDL Anapolis">
    <div class="hero-shape hero-shape-1"></div>
    <div class="hero-shape hero-shape-2"></div>
    <div class="hero-shape hero-shape-3"></div>
    <div class="hero-shape hero-shape-4"></div>

    <div class="hero-slider">
        <div class="hero-slides" id="heroSlides">
            <?php foreach ($slides as $index => $slide):
                $tag       = $slide['slide_tag'] ?? '';
                $line1     = $slide['slide_title_line1'] ?? '';
                $line2     = $slide['slide_title_line2'] ?? '';
                $line3     = $slide['slide_title_line3'] ?? '';
                $highlight = $slide['slide_highlight'] ?? 'line3';
                $subtitle  = $slide['slide_subtitle'] ?? '';
                $cta1_text = $slide['slide_cta_primary_text'] ?? '';
                $cta1_link = $slide['slide_cta_primary_link'] ?? '#';
                $cta2_text = $slide['slide_cta_secondary_text'] ?? '';
                $cta2_link = $slide['slide_cta_secondary_link'] ?? '#';

                // Images from ACF gallery or fallback
                $images = [];
                if (!empty($slide['slide_images']) && is_array($slide['slide_images'])) {
                    foreach ($slide['slide_images'] as $img) {
                        $images[] = is_array($img) ? $img['url'] : $img;
                    }
                }
                if (count($images) < 4 && isset($placeholder_images[$index])) {
                    $images = $placeholder_images[$index];
                } elseif (count($images) < 4) {
                    $images = $placeholder_images[0];
                }

                // Build title with highlight
                $title_lines = [
                    'line1' => esc_html($line1),
                    'line2' => esc_html($line2),
                    'line3' => esc_html($line3),
                ];
                if (isset($title_lines[$highlight])) {
                    $title_lines[$highlight] = '<em>' . $title_lines[$highlight] . '</em>';
                }
            ?>
            <div class="hero-slide<?php echo $index === 0 ? ' active' : ''; ?>">
                <div class="wrap" style="display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;height:100%">
                    <div class="hero-text">
                        <?php if ($tag): ?>
                        <div class="hero-tag"><?php echo esc_html($tag); ?></div>
                        <?php endif; ?>
                        <h1><?php echo $title_lines['line1']; ?><br><?php echo $title_lines['line2']; ?><br><?php echo $title_lines['line3']; ?></h1>
                        <?php if ($subtitle): ?>
                        <p class="hero-sub"><?php echo esc_html($subtitle); ?></p>
                        <?php endif; ?>
                        <div class="hero-btns">
                            <?php if ($cta1_text): ?>
                            <a href="<?php echo esc_url($cta1_link); ?>" class="btn btn-gold"><?php echo esc_html($cta1_text); ?> <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                            <?php endif; ?>
                            <?php if ($cta2_text): ?>
                            <a href="<?php echo esc_url($cta2_link); ?>" class="btn btn-ghost"><?php echo esc_html($cta2_text); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="hero-mosaic">
                        <div class="mosaic-img mosaic-img-1"><img src="<?php echo esc_url($images[0]); ?>" alt="" loading="<?php echo $index === 0 ? 'eager' : 'lazy'; ?>"></div>
                        <div class="mosaic-img mosaic-img-2"><img src="<?php echo esc_url($images[1]); ?>" alt="" loading="lazy"></div>
                        <div class="mosaic-img mosaic-img-3"><img src="<?php echo esc_url($images[2]); ?>" alt="" loading="lazy"></div>
                        <div class="mosaic-img mosaic-img-4"><img src="<?php echo esc_url($images[3]); ?>" alt="" loading="lazy"></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- Dots -->
        <div class="hero-dots">
            <?php for ($i = 0; $i < $total_slides; $i++): ?>
            <button class="hero-dot<?php echo $i === 0 ? ' active' : ''; ?>" data-slide="<?php echo $i; ?>" aria-label="Slide <?php echo $i + 1; ?>"></button>
            <?php endfor; ?>
        </div>
    </div>
</section>
