<?php
/**
 * Template Name: CDL Jovem
 *
 * Todo o conteúdo é administrável via ACF (group_cdl_jovem.json).
 * Se o cliente não preencher algum campo, o fallback PHP abaixo é
 * renderizado — assim a página nunca aparece "vazia".
 */
get_header();

$has_acf = function_exists('get_field');

// ─── HERO ─────────────────────────────────────────────
$hero_tag   = ($has_acf ? get_field('cdl_jovem_hero_tag')   : '') ?: 'Institucional';
$hero_title = ($has_acf ? get_field('cdl_jovem_hero_title') : '') ?: "O Futuro do Comércio\nComeça Aqui";
$hero_sub   = ($has_acf ? get_field('cdl_jovem_hero_subtitle') : '') ?: 'A plataforma de crescimento pessoal e profissional para jovens empreendedores e líderes empresariais.';
$hero_image = $has_acf ? get_field('cdl_jovem_hero_image') : null;
$hero_img_url = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1920&q=80';

// ─── STATS STRIP ─────────────────────────────────────
$stats = $has_acf ? get_field('cdl_jovem_stats') : null;
if (!$stats) {
    $stats = [
        ['stat_numero' => '6',    'stat_label' => 'Diretores'],
        ['stat_numero' => 'FCDL', 'stat_label' => 'Representação estadual'],
        ['stat_numero' => 'CNDL', 'stat_label' => 'Representação nacional'],
    ];
}

// ─── SOBRE ───────────────────────────────────────────
$sobre_tag   = ($has_acf ? get_field('cdl_jovem_sobre_tag')   : '') ?: 'Quem somos';
$sobre_title = ($has_acf ? get_field('cdl_jovem_sobre_title') : '') ?: "Mais do que uma\ncomunidade jovem";
$sobre_text  = ($has_acf ? get_field('cdl_jovem_sobre_text')  : '') ?: '<p>A CDL Jovem Anápolis opera sob a Câmara de Dirigentes Lojistas, fornecendo suporte, recursos e oportunidades para jovens empreendedores transformarem ideias em negócios de sucesso.</p><p>É uma plataforma de crescimento pessoal e profissional, projetada para desenvolver jovens empresários lojistas com networking, capacitação e mentoria de profissionais experientes.</p>';
$sobre_image = $has_acf ? get_field('cdl_jovem_sobre_image') : null;
$sobre_img_url = $sobre_image ? $sobre_image['url'] : 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=640&h=480&fit=crop';

// ─── VALORES ─────────────────────────────────────────
$valores_tag   = ($has_acf ? get_field('cdl_jovem_valores_tag')   : '') ?: 'Nossos valores';
$valores_title = ($has_acf ? get_field('cdl_jovem_valores_title') : '') ?: 'O que nos move';
$valores       = $has_acf ? get_field('cdl_jovem_valores') : null;
if (!$valores) {
    $valores = [
        ['titulo' => 'Paixão',          'descricao' => 'Dedicação com amor, alegria e satisfação em direção aos nossos ideais. Acreditamos no poder do entusiasmo para transformar negócios.'],
        ['titulo' => 'Respeito',        'descricao' => 'Preocupação com as pessoas e o bem-estar comum. Honestidade, transparência e lealdade em todas as relações.'],
        ['titulo' => 'Profissionalismo','descricao' => 'Disciplina, organização, comprometimento e responsabilidade na busca constante pela excelência.'],
    ];
}

// ─── OFERECIMENTOS ───────────────────────────────────
$ofer_tag   = ($has_acf ? get_field('cdl_jovem_oferecimentos_tag')   : '') ?: 'Oportunidades';
$ofer_title = ($has_acf ? get_field('cdl_jovem_oferecimentos_title') : '') ?: 'O que o CDL Jovem oferece';
$oferecimentos = $has_acf ? get_field('cdl_jovem_oferecimentos') : null;
if (!$oferecimentos) {
    $oferecimentos = [
        ['titulo' => 'Networking',     'descricao' => 'Conecte-se com jovens empreendedores e líderes de mercado.'],
        ['titulo' => 'Capacitação',    'descricao' => 'Workshops, palestras e cursos de desenvolvimento pessoal e profissional.'],
        ['titulo' => 'Mentoria',       'descricao' => 'Orientação de empresários experientes que compartilham conhecimento.'],
        ['titulo' => 'Eventos Exclusivos','descricao' => 'Feiras, rodadas de negócios e visitas técnicas para expandir sua rede.'],
        ['titulo' => 'Representação',  'descricao' => 'Defesa dos interesses dos jovens empreendedores junto ao poder público.'],
    ];
}

// ─── DIRETORIA ───────────────────────────────────────
$dir_tag   = ($has_acf ? get_field('cdl_jovem_diretoria_tag')   : '') ?: 'Quem lidera';
$dir_title = ($has_acf ? get_field('cdl_jovem_diretoria_title') : '') ?: 'Diretoria CDL Jovem';
$diretoria = $has_acf ? get_field('cdl_jovem_diretoria') : null;
if (!$diretoria) {
    $img_base = CDL_THEME_URI . '/assets/img/cdl-jovem/';
    $diretoria = [
        ['nome' => 'Luan Samuel Mendes',  'cargo' => 'Presidente',                  'foto' => ['url' => $img_base . 'LUAN-SAMUEL.webp']],
        ['nome' => 'Isabella Perenne',    'cargo' => 'Vice-Presidente',             'foto' => ['url' => $img_base . 'ISABELLA-PERENNE.webp']],
        ['nome' => 'Wesley Venâncio',     'cargo' => 'Dir. Empreendedorismo',       'foto' => ['url' => $img_base . 'WESLEY-VENANCIO.webp']],
        ['nome' => 'Vinícius Corrêa',     'cargo' => 'Dir. Eventos',                'foto' => ['url' => $img_base . 'VINICIUS-CORREA.webp']],
        ['nome' => 'Rafael Vilela',       'cargo' => 'Dir. Marketing',              'foto' => ['url' => $img_base . 'RAFAEL-VILELA.webp']],
        ['nome' => 'Vinícius Ribeiro',    'cargo' => 'Dir. Responsabilidade Social','foto' => ['url' => $img_base . 'VINICIUS-DARIE1024x1024.webp']],
    ];
}

// ─── MISSÃO ──────────────────────────────────────────
$missao_tag  = ($has_acf ? get_field('cdl_jovem_missao_tag')   : '') ?: 'Missão';
$missao_text = ($has_acf ? get_field('cdl_jovem_missao_texto') : '') ?: 'Fortalecer o Movimento Jovem Lojista, criando e desenvolvendo CDLs Jovens para formar futuros líderes do comércio de Anápolis e de todo o Brasil.';

// ─── CTA FINAL ───────────────────────────────────────
$cta_title    = ($has_acf ? get_field('cdl_jovem_cta_title')    : '') ?: "Quer fazer parte\ndo CDL Jovem?";
$cta_subtitle = ($has_acf ? get_field('cdl_jovem_cta_subtitle') : '') ?: 'Transforme suas ideias em negócios de sucesso com a nossa comunidade.';
$cta_btn_text = ($has_acf ? get_field('cdl_jovem_cta_btn_text') : '') ?: 'Quero participar';
$cta_btn_link = ($has_acf ? get_field('cdl_jovem_cta_btn_link') : '') ?: '/associe-se/';

// Helper que aceita quebras de linha em campos de texto
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

<!-- Sobre — Split -->
<section class="sec text-left">
    <div class="wrap" style="display:grid;grid-template-columns:1fr 1fr;gap:clamp(40px,5vw,80px);align-items:center">
        <div>
            <div class="sec-tag ao"><?php echo esc_html($sobre_tag); ?></div>
            <h2 class="sec-title ao ao-d1" style="text-align:left"><?php echo $nl2br_h($sobre_title); ?></h2>
            <div class="sobre-texto ao ao-d2"><?php echo wp_kses_post($sobre_text); ?></div>
        </div>
        <div class="ao ao-d1">
            <img src="<?php echo esc_url($sobre_img_url); ?>" alt="CDL Jovem" style="border-radius:var(--radius-xl);box-shadow:0 32px 80px rgba(0,0,0,.08);width:100%" loading="lazy" decoding="async">
        </div>
    </div>
</section>

<!-- Valores -->
<?php if ($valores): ?>
<section class="sec" style="background:var(--light)">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao"><?php echo esc_html($valores_tag); ?></div>
        <h2 class="sec-title ao ao-d1"><?php echo esc_html($valores_title); ?></h2>
        <div class="sobre-mvv" style="margin-top:clamp(40px,5vw,56px)">
            <?php
            $val_icons = [
                '<path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>',
                '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>',
                '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
            ];
            foreach ($valores as $i => $v):
                $delay = $i > 0 ? ' ao-d' . min($i, 4) : '';
            ?>
            <div class="sobre-mvv__card ao<?php echo $delay; ?>">
                <div class="sobre-mvv__ico"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><?php echo $val_icons[$i % count($val_icons)]; ?></svg></div>
                <h3><?php echo esc_html($v['titulo'] ?? ''); ?></h3>
                <p><?php echo esc_html($v['descricao'] ?? ''); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Oferecimentos -->
<?php if ($oferecimentos): ?>
<section class="sec">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao"><?php echo esc_html($ofer_tag); ?></div>
        <h2 class="sec-title ao ao-d1"><?php echo esc_html($ofer_title); ?></h2>
        <?php
        // Splitar em grupos de 3 para repetir o padrão visual (3 cards + 2 cards, etc).
        $of_icons = [
            '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>',
            '<path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/><path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/>',
            '<circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/>',
            '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>',
            '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
            '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
        ];
        $chunks = array_chunk($oferecimentos, 3);
        foreach ($chunks as $row_i => $row):
            $row_style = $row_i === 0 ? 'margin-top:clamp(40px,5vw,56px)' : 'margin-top:20px';
        ?>
        <div class="sobre-mvv" style="<?php echo $row_style; ?>">
            <?php foreach ($row as $i => $o):
                $delay = $i > 0 ? ' ao-d' . min($i, 4) : '';
                $icon_idx = $row_i * 3 + $i;
            ?>
            <div class="sobre-mvv__card ao<?php echo $delay; ?>">
                <div class="sobre-mvv__ico"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><?php echo $of_icons[$icon_idx % count($of_icons)]; ?></svg></div>
                <h3><?php echo esc_html($o['titulo'] ?? ''); ?></h3>
                <p><?php echo esc_html($o['descricao'] ?? ''); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<!-- Diretoria — People Scroll -->
<?php if ($diretoria): ?>
<section class="people-scroll" style="background:var(--light)">
    <div class="wrap" style="text-align:center;padding-bottom:40px">
        <div class="sec-tag ao"><?php echo esc_html($dir_tag); ?></div>
        <h2 class="sec-title ao ao-d1"><?php echo esc_html($dir_title); ?></h2>
    </div>
    <div class="people-scroll__grid wrap">
        <div class="people-scroll__list">
            <?php foreach ($diretoria as $i => $m): ?>
            <div class="people-scroll__item<?php echo $i === 0 ? ' active' : ''; ?>" data-index="<?php echo $i; ?>">
                <span class="people-scroll__name"><?php echo esc_html($m['nome'] ?? ''); ?></span>
                <span class="people-scroll__role"><span class="people-scroll__plus">+</span><?php echo esc_html($m['cargo'] ?? ''); ?></span>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="people-scroll__photo">
            <?php foreach ($diretoria as $i => $m):
                $foto = $m['foto'] ?? null;
                $foto_url = is_array($foto) ? ($foto['url'] ?? '') : ($foto ?: '');
                if (!$foto_url) continue;
            ?>
            <img src="<?php echo esc_url($foto_url); ?>" alt="<?php echo esc_attr($m['nome'] ?? ''); ?>"<?php echo $i === 0 ? ' class="active" fetchpriority="high"' : ' loading="lazy" decoding="async"'; ?>>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Missão -->
<section class="cta-dark">
    <div class="wrap" style="position:relative;z-index:1;max-width:700px;margin:0 auto">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2);margin:0 auto 24px"><?php echo esc_html($missao_tag); ?></div>
        <p class="ao" style="font-family:'Sora';font-size:clamp(1.1rem,2vw,1.4rem);font-weight:500;color:#fff;line-height:1.5;letter-spacing:-.02em"><?php echo esc_html($missao_text); ?></p>
    </div>
</section>

<!-- CTA Final -->
<section class="cta-gold">
    <h2 class="ao"><?php echo $nl2br_h($cta_title); ?></h2>
    <p class="ao ao-d1"><?php echo esc_html($cta_subtitle); ?></p>
    <a href="<?php echo esc_url($cta_btn_link); ?>" class="btn btn-dark ao ao-d2">
        <?php echo esc_html($cta_btn_text); ?>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
</section>

<?php get_footer(); ?>
