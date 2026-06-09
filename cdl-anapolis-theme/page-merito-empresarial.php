<?php
/**
 * Template Name: Mérito Empresarial
 *
 * Conteúdo administrável via ACF (group_merito.json). Fallback PHP
 * abaixo garante que a página nunca fica vazia.
 */
get_header();

$has_acf = function_exists('get_field');

// ─── HERO ─────────────────────────────────────────────
$hero_tag   = ($has_acf ? get_field('merito_hero_tag')   : '') ?: 'Institucional';
$hero_title = ($has_acf ? get_field('merito_hero_title') : '') ?: "O Oscar do Comércio\nde Anápolis";
$hero_sub   = ($has_acf ? get_field('merito_hero_subtitle') : '') ?: 'A maior e mais tradicional premiação do setor comercial da cidade, promovida pela CDL Anápolis.';
$hero_image = $has_acf ? get_field('merito_hero_image') : null;
$hero_img_url = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1920&q=80';

// ─── STATS ───────────────────────────────────────────
$stats = $has_acf ? get_field('merito_stats') : null;
if (!$stats) {
    $stats = [
        ['stat_numero' => '20 anos', 'stat_label' => 'de tradição'],
        ['stat_numero' => '1,7M+',   'stat_label' => 'avaliações realizadas'],
        ['stat_numero' => '★',       'stat_label' => 'Reconhecimento da excelência'],
    ];
}

// ─── O QUE É ─────────────────────────────────────────
$oque_tag   = ($has_acf ? get_field('merito_oque_tag')   : '') ?: 'O que é';
$oque_title = ($has_acf ? get_field('merito_oque_title') : '') ?: "O reconhecimento que\na cidade constrói";
$oque_text  = ($has_acf ? get_field('merito_oque_text')  : '') ?: '<p>O Mérito Empresarial é a principal premiação do comércio de Anápolis — uma iniciativa da CDL Anápolis que reconhece e motiva empreendedores de diversos segmentos a manter a excelência na prestação de serviços.</p><p>A partir de 2019, o programa adotou transparência e participação comunitária através do aplicativo CDL Mais Você, permitindo que consumidores avaliem os estabelecimentos da cidade. São mais de 1,7 milhão de avaliações qualificadas, auxiliando os empresários a entender as necessidades dos clientes e melhorar as experiências de compra.</p>';
$oque_image = $has_acf ? get_field('merito_oque_image') : null;
$oque_img_url = $oque_image ? $oque_image['url'] : 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=640&h=480&fit=crop';

// ─── PILARES ─────────────────────────────────────────
$pil_tag   = ($has_acf ? get_field('merito_pilares_tag')   : '') ?: 'Como funciona';
$pil_title = ($has_acf ? get_field('merito_pilares_title') : '') ?: 'Os pilares da premiação';
$pil_sub   = ($has_acf ? get_field('merito_pilares_sub')   : '') ?: 'Do propósito à celebração, cada etapa fortalece o comércio local.';
$pilares   = $has_acf ? get_field('merito_pilares') : null;
if (!$pilares) {
    $pilares = [
        ['titulo' => 'Propósito',          'descricao' => 'Fortalecer a imagem dos estabelecimentos locais dentro da comunidade anapolina, homenageando empresas que demonstram qualidade excepcional de atendimento e incentivando a melhoria contínua.'],
        ['titulo' => 'Sistema de Avaliação','descricao' => 'Através do app CDL Mais Você, consumidores avaliam os estabelecimentos da cidade. São mais de 1,7 milhão de avaliações construindo o ranking das melhores empresas — a voz da comunidade decide.'],
        ['titulo' => 'Evento de Gala',     'descricao' => 'A cada ano, um evento formal de gala reúne figuras importantes da comunidade — liderança da CDL, representantes da indústria, autoridades e membros da organização — para celebrar a excelência.'],
    ];
}

// ─── CATEGORIAS ──────────────────────────────────────
$cat_tag   = ($has_acf ? get_field('merito_categorias_tag')   : '') ?: 'Categorias';
$cat_title = ($has_acf ? get_field('merito_categorias_title') : '') ?: 'Reconhecimentos da premiação';
$cat_sub   = ($has_acf ? get_field('merito_categorias_sub')   : '') ?: 'Diversas categorias celebram a excelência em cada segmento.';
$categorias = $has_acf ? get_field('merito_categorias') : null;
if (!$categorias) {
    $categorias = [
        ['titulo' => 'Avaliação Popular',         'descricao' => 'Mais de 1,7 milhão de avaliações via app CDL Mais Você constroem o ranking das melhores empresas da cidade.'],
        ['titulo' => 'Excelência no Atendimento', 'descricao' => 'Reconhecimento às empresas que se destacam pela qualidade no atendimento ao consumidor.'],
        ['titulo' => 'Destaque Comércio',         'descricao' => 'Premiação para a empresa do comércio que apresentou excelência em gestão e experiência do cliente.'],
        ['titulo' => 'Destaque Serviços',         'descricao' => 'Reconhecimento ao prestador de serviço que mais contribuiu com a comunidade anapolina.'],
        ['titulo' => 'Jovem Empreendedor',        'descricao' => 'Premiação para o jovem que se destacou pela inovação e pelo empreendedorismo na cidade.'],
        ['titulo' => 'Mulher Empreendedora',      'descricao' => 'Reconhecimento à mulher que se destacou no cenário empresarial de Anápolis.'],
    ];
}

// ─── QUOTE ───────────────────────────────────────────
$quote_texto = ($has_acf ? get_field('merito_quote_texto') : '') ?: 'O Mérito Empresarial celebra o comprometimento com qualidade, inovação e atendimento ao cliente. Mais que um prêmio, é o reconhecimento que a própria cidade constrói.';
$quote_autor = ($has_acf ? get_field('merito_quote_autor') : '') ?: '— CDL Anápolis, 20 anos de Mérito Empresarial';

// ─── CTA ─────────────────────────────────────────────
$cta_title    = ($has_acf ? get_field('merito_cta_title')    : '') ?: "Quer indicar um\nempreendedor destaque?";
$cta_subtitle = ($has_acf ? get_field('merito_cta_subtitle') : '') ?: 'Fale com a CDL Anápolis e indique quem merece ser reconhecido.';
$cta_btn_text = ($has_acf ? get_field('merito_cta_btn_text') : '') ?: 'Fale conosco';
$cta_btn_link = ($has_acf ? get_field('merito_cta_btn_link') : '') ?: '/fale-conosco/';

$nl2br_h = function ($s) { return nl2br(esc_html($s)); };
?>

<!-- Page Hero -->
<section class="page-hero" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)"><?php echo esc_html($hero_tag); ?></div>
        <h1 class="page-hero__title ao ao-d1"><?php echo $nl2br_h($hero_title); ?></h1>
        <p class="page-hero__sub ao ao-d2"><?php echo esc_html($hero_sub); ?></p>
    </div>
</section>

<!-- Stats strip -->
<?php if ($stats): ?>
<section class="conv-social-strip">
    <div class="wrap">
        <div class="conv-social-strip__grid">
            <?php foreach ($stats as $i => $s):
                $delay = $i > 0 ? ' ao-d' . min($i, 4) : '';
            ?>
            <div class="ao<?php echo $delay; ?>">
                <span class="conv-social-strip__number"><?php echo esc_html($s['stat_numero'] ?? ''); ?></span>
                <span class="conv-social-strip__label"><?php echo esc_html($s['stat_label'] ?? ''); ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Split section — O que é -->
<section class="sec text-left">
    <div class="wrap" style="display:grid;grid-template-columns:1fr 1fr;gap:clamp(40px,5vw,80px);align-items:center">
        <div class="ao">
            <img src="<?php echo esc_url($oque_img_url); ?>" alt="Mérito Empresarial" style="border-radius:var(--radius-xl);box-shadow:0 32px 80px rgba(0,0,0,.08);width:100%" loading="lazy" decoding="async">
        </div>
        <div>
            <div class="sec-tag ao"><?php echo esc_html($oque_tag); ?></div>
            <h2 class="sec-title ao ao-d1" style="text-align:left"><?php echo $nl2br_h($oque_title); ?></h2>
            <div class="sobre-texto ao ao-d2"><?php echo wp_kses_post($oque_text); ?></div>
        </div>
    </div>
</section>

<!-- Pilares -->
<?php if ($pilares): ?>
<section class="sec" style="background:var(--light)">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao"><?php echo esc_html($pil_tag); ?></div>
        <h2 class="sec-title ao ao-d1"><?php echo esc_html($pil_title); ?></h2>
        <?php if ($pil_sub): ?>
        <p class="sec-desc ao ao-d2" style="margin:0 auto 0"><?php echo esc_html($pil_sub); ?></p>
        <?php endif; ?>

        <?php
        $pil_icons = [
            '<circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/>',
            '<path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>',
            '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
        ];
        ?>
        <div class="sobre-mvv" style="margin-top:clamp(40px,5vw,56px)">
            <?php foreach ($pilares as $i => $p):
                $delay = $i > 0 ? ' ao-d' . min($i, 4) : '';
            ?>
            <div class="sobre-mvv__card ao<?php echo $delay; ?>">
                <div class="sobre-mvv__ico"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><?php echo $pil_icons[$i % count($pil_icons)]; ?></svg></div>
                <h3><?php echo esc_html($p['titulo'] ?? ''); ?></h3>
                <p><?php echo esc_html($p['descricao'] ?? ''); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Categorias -->
<?php if ($categorias): ?>
<section class="sec">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao"><?php echo esc_html($cat_tag); ?></div>
        <h2 class="sec-title ao ao-d1"><?php echo esc_html($cat_title); ?></h2>
        <?php if ($cat_sub): ?>
        <p class="sec-desc ao ao-d2" style="margin:0 auto"><?php echo esc_html($cat_sub); ?></p>
        <?php endif; ?>

        <?php
        $cat_icons = [
            '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>',
            '<path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>',
            '<rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>',
            '<path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/>',
            '<path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>',
            '<path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>',
        ];
        $chunks = array_chunk($categorias, 3);
        foreach ($chunks as $row_i => $row):
            $row_style = $row_i === 0 ? 'margin-top:clamp(40px,5vw,56px)' : 'margin-top:20px';
        ?>
        <div class="sobre-mvv" style="<?php echo $row_style; ?>">
            <?php foreach ($row as $i => $c):
                $delay = $i > 0 ? ' ao-d' . min($i, 4) : '';
                $icon_idx = $row_i * 3 + $i;
            ?>
            <div class="sobre-mvv__card ao<?php echo $delay; ?>">
                <div class="sobre-mvv__ico"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><?php echo $cat_icons[$icon_idx % count($cat_icons)]; ?></svg></div>
                <h3><?php echo esc_html($c['titulo'] ?? ''); ?></h3>
                <p><?php echo esc_html($c['descricao'] ?? ''); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<!-- Quote / Dark CTA band -->
<section class="cta-dark">
    <div class="wrap" style="position:relative;z-index:1;max-width:800px;margin:0 auto">
        <div style="font-size:clamp(1.8rem,3vw,2.8rem);color:var(--gold);line-height:1;margin-bottom:24px;font-family:'Sora'">&ldquo;</div>
        <p class="ao" style="font-family:'Sora';font-size:clamp(1.1rem,2vw,1.5rem);font-weight:500;color:#fff;line-height:1.5;letter-spacing:-.02em;margin-bottom:24px"><?php echo esc_html($quote_texto); ?></p>
        <p class="ao ao-d1" style="font-size:.85rem;color:rgba(255,255,255,.4)"><?php echo esc_html($quote_autor); ?></p>
    </div>
</section>

<!-- CTA Gold -->
<section class="cta-gold">
    <h2 class="ao"><?php echo $nl2br_h($cta_title); ?></h2>
    <p class="ao ao-d1"><?php echo esc_html($cta_subtitle); ?></p>
    <a href="<?php echo esc_url($cta_btn_link); ?>" class="btn btn-dark ao ao-d2">
        <?php echo esc_html($cta_btn_text); ?>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
</section>

<?php get_footer(); ?>
