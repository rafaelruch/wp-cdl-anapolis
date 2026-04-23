<?php
/**
 * Template Name: Sobre Nós
 * Slug: sobre-nos
 */
get_header();

// ACF Fields with fallbacks
$hero_title    = get_field('sobre_hero_title') ?: 'Um Legado de Realizações';
$hero_subtitle = get_field('sobre_hero_subtitle') ?: 'Uma casa acolhedora onde lojistas encontram apoio, ferramentas e conhecimento para prosperar. Uma parceira estratégica impulsionando o sucesso dos negócios.';
$hero_image    = get_field('sobre_hero_image');
$hero_img_url  = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=1920&q=80';

$historia_title = get_field('sobre_historia_title') ?: 'Nossa História';
$historia_text  = get_field('sobre_historia_text') ?: '<p>Fundada em 20 de setembro de 1962, a CDL Anápolis tem suas raízes em um grupo visionário de lojistas que estabeleceu o Serviço de Proteção ao Crédito (SPC). A fusão com o Clube de Diretores Lojistas, em 11 de maio de 1981, criou uma instituição unificada e mais forte.</p><p>Em 21 de setembro de 1994, a mudança de nome para Câmara de Dirigentes Lojistas refletiu a expansão institucional e a importância crescente da entidade. Hoje, com mais de 2.000 empreendedores, somos afiliados à FCDL (Federação de Goiás) e à CNDL (Confederação Nacional).</p><p>Somos mais do que uma entidade de classe — somos uma comunidade de empreendedores que acredita no poder da colaboração para transformar o comércio de Anápolis.</p>';
$historia_image = get_field('sobre_historia_image');
$historia_img_url = $historia_image ? $historia_image['url'] : 'https://images.unsplash.com/photo-1556761175-b413da4baf72?w=800&h=600&fit=crop';

$missao  = get_field('sobre_missao') ?: 'Defender os interesses dos lojistas e promover a prosperidade, fortalecendo o comércio local ao fornecer as melhores ferramentas e representação, contribuindo para o desenvolvimento econômico regional.';
$visao   = get_field('sobre_visao') ?: 'Reconhecimento como a principal referência no apoio ao desenvolvimento dos negócios locais, elevando a competitividade e o alcance dos lojistas que fazem parte da comunidade.';
$valores = get_field('sobre_valores') ?: 'Comprometimento, Inovação, Excelência e Ética.';

$numeros = get_field('sobre_numeros');
if (!$numeros) {
    $numeros = [
        ['numero' => '2.000+', 'label' => 'Empreendedores'],
        ['numero' => '60+',    'label' => 'Anos de história'],
        ['numero' => '7',      'label' => 'Serviços exclusivos'],
        ['numero' => '1962',   'label' => 'Ano de fundação'],
    ];
}

$timeline = get_field('sobre_timeline');
if (!$timeline) {
    $timeline = [
        ['ano' => '1962', 'titulo' => 'Fundação do SPC', 'descricao' => 'Em 20 de setembro de 1962, um grupo visionário de lojistas estabelece o Serviço de Proteção ao Crédito (SPC) em Anápolis.'],
        ['ano' => '1981', 'titulo' => 'Fusão histórica', 'descricao' => 'Em 11 de maio de 1981, ocorre a fusão com o Clube de Diretores Lojistas, criando uma instituição unificada e mais forte.'],
        ['ano' => '1994', 'titulo' => 'Câmara de Dirigentes Lojistas', 'descricao' => 'Em 21 de setembro de 1994, a entidade é renomeada para Câmara de Dirigentes Lojistas, refletindo sua expansão e importância crescente.'],
        ['ano' => '2005', 'titulo' => 'Mérito Empresarial', 'descricao' => 'Lançamento da premiação que se tornaria o "Oscar do Comércio" de Anápolis, reconhecendo a excelência empresarial.'],
        ['ano' => '2019', 'titulo' => 'CDL Mais Você', 'descricao' => 'Adoção do aplicativo CDL Mais Você para avaliações da comunidade, acumulando mais de 1,7 milhão de avaliações qualificadas.'],
        ['ano' => '2026', 'titulo' => '2.000+ empreendedores', 'descricao' => 'A CDL Anápolis alcança mais de 2.000 empreendedores, consolidando-se como a maior comunidade empresarial da região.'],
    ];
}
?>

<!-- Page Hero -->
<section class="page-hero" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)">Institucional</div>
        <h1 class="page-hero__title ao ao-d1"><?php echo esc_html($hero_title); ?></h1>
        <p class="page-hero__sub ao ao-d2"><?php echo esc_html($hero_subtitle); ?></p>
    </div>
</section>

<!-- Números -->
<section class="sobre-numeros">
    <div class="wrap">
        <div class="sobre-numeros__grid">
            <?php foreach ($numeros as $i => $item): ?>
            <div class="sobre-numeros__item ao ao-d<?php echo $i % 4; ?>">
                <div class="sobre-numeros__valor"><?php echo esc_html($item['numero']); ?></div>
                <div class="sobre-numeros__label"><?php echo esc_html($item['label']); ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- História -->
<section class="sec text-left" id="historia">
    <div class="wrap" style="display:grid;grid-template-columns:1fr 1fr;gap:clamp(40px,5vw,80px);align-items:center">
        <div class="ao">
            <img src="<?php echo esc_url($historia_img_url); ?>" alt="CDL Anápolis" style="border-radius:var(--radius-xl);box-shadow:0 32px 80px rgba(0,0,0,.08);width:100%">
        </div>
        <div>
            <div class="sec-tag ao"><?php echo esc_html($historia_title); ?></div>
            <h2 class="sec-title ao ao-d1">De um grupo de<br>lojistas a uma<br>comunidade</h2>
            <div class="sobre-texto ao ao-d2"><?php echo wp_kses_post($historia_text); ?></div>
        </div>
    </div>
</section>

<!-- Missão, Visão, Valores -->
<section class="sec" style="background:var(--light)">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">O que nos guia</div>
        <h2 class="sec-title ao ao-d1">Missão, Visão e Valores</h2>
        <div class="sobre-mvv">
            <div class="sobre-mvv__card ao">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                </div>
                <h3>Missão</h3>
                <p><?php echo esc_html($missao); ?></p>
            </div>
            <div class="sobre-mvv__card ao ao-d1">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </div>
                <h3>Visão</h3>
                <p><?php echo esc_html($visao); ?></p>
            </div>
            <div class="sobre-mvv__card ao ao-d2">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
                </div>
                <h3>Valores</h3>
                <p><?php echo esc_html($valores); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Timeline -->
<section class="sec">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Marcos da nossa trajetória</div>
        <h2 class="sec-title ao ao-d1">Linha do Tempo</h2>
        <div class="sobre-timeline">
            <?php foreach ($timeline as $i => $item): ?>
            <div class="sobre-timeline__item ao" style="transition-delay:<?php echo ($i % 3) * 0.1; ?>s">
                <div class="sobre-timeline__ano"><?php echo esc_html($item['ano']); ?></div>
                <div class="sobre-timeline__line"></div>
                <h4><?php echo esc_html($item['titulo']); ?></h4>
                <p><?php echo esc_html($item['descricao']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-gold">
    <h2 class="ao">Venha para a<br>CDL Anápolis</h2>
    <p class="ao ao-d1">Junte-se a milhares de empreendedores que já fazem parte</p>
    <a href="/associe-se/" class="btn btn-dark ao ao-d2">Quero fazer parte <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
</section>

<?php get_footer(); ?>
