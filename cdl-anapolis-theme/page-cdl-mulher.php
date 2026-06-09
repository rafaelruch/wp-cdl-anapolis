<?php
/**
 * Template Name: CDL Mulher
 *
 * Conteúdo administrável via ACF (group_cdl_mulher.json). Fallback PHP
 * abaixo garante que a página nunca aparece vazia mesmo sem ACF preenchido.
 */
get_header();

$has_acf = function_exists('get_field');

// ─── HERO ─────────────────────────────────────────────
$hero_tag   = ($has_acf ? get_field('cdl_mulher_hero_tag')   : '') ?: 'Institucional';
$hero_title = ($has_acf ? get_field('cdl_mulher_hero_title') : '') ?: "Empoderando Mulheres,\nFortalecendo Negócios";
$hero_sub   = ($has_acf ? get_field('cdl_mulher_hero_subtitle') : '') ?: 'O núcleo da CDL Anápolis dedicado ao desenvolvimento e protagonismo das mulheres empreendedoras.';
$hero_image = $has_acf ? get_field('cdl_mulher_hero_image') : null;
$hero_img_url = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?w=1920&q=80';

// ─── STATS STRIP ─────────────────────────────────────
$stats = $has_acf ? get_field('cdl_mulher_stats') : null;
if (!$stats) {
    $stats = [
        ['stat_numero' => '7',    'stat_label' => 'Diretoras'],
        ['stat_numero' => '12',   'stat_label' => 'Eventos por ano'],
        ['stat_numero' => '100+', 'stat_label' => 'Participantes ativas'],
    ];
}

// ─── SOBRE ───────────────────────────────────────────
$sobre_tag   = ($has_acf ? get_field('cdl_mulher_sobre_tag')   : '') ?: 'Quem somos';
$sobre_title = ($has_acf ? get_field('cdl_mulher_sobre_title') : '') ?: "Uma plataforma de\ncrescimento e liderança";
$sobre_text  = ($has_acf ? get_field('cdl_mulher_sobre_text')  : '') ?: '<p>O CDL Mulher Anápolis é um programa dedicado a desenvolver todo o potencial das mulheres empreendedoras. A iniciativa visa identificar, capacitar e desenvolver mulheres lojistas e líderes de diversos setores para papéis de destaque dentro da comunidade, dos negócios e da sociedade.</p><p>Através de eventos mensais com palestras, workshops e oportunidades de networking, o programa enfatiza o espírito comunitário, o desenvolvimento de liderança e a ética profissional.</p>';
$sobre_image = $has_acf ? get_field('cdl_mulher_sobre_image') : null;
$sobre_img_url = $sobre_image ? $sobre_image['url'] : 'https://images.unsplash.com/photo-1573164713988-8665fc963095?w=640&h=480&fit=crop';

// ─── OFERECIMENTOS ───────────────────────────────────
$ofer_tag   = ($has_acf ? get_field('cdl_mulher_oferecimentos_tag')   : '') ?: 'Oportunidades';
$ofer_title = ($has_acf ? get_field('cdl_mulher_oferecimentos_title') : '') ?: 'O que o CDL Mulher oferece';
$ofer_sub   = ($has_acf ? get_field('cdl_mulher_oferecimentos_sub')   : '') ?: 'Desenvolvimento profissional completo para a mulher empreendedora.';
$oferecimentos = $has_acf ? get_field('cdl_mulher_oferecimentos') : null;
if (!$oferecimentos) {
    $oferecimentos = [
        ['titulo' => 'Networking',        'descricao' => 'Conecte-se com outras empreendedoras, compartilhe experiências e aprenda com líderes de mercado em encontros mensais.'],
        ['titulo' => 'Capacitação',       'descricao' => 'Workshops, palestras e cursos focados em gestão, finanças, marketing digital e desenvolvimento de liderança feminina.'],
        ['titulo' => 'Mentoria',          'descricao' => 'Suporte de empresárias experientes que compartilham conhecimento, orientação prática e vivências de mercado.'],
        ['titulo' => 'Eventos Exclusivos','descricao' => 'Feiras, rodadas de negócios, visitas técnicas e encontros para expansão da sua rede de contatos.'],
        ['titulo' => 'Ação Social',       'descricao' => 'Projetos de capacitação profissional e sustentabilidade que impactam positivamente a vida das mulheres da comunidade.'],
        ['titulo' => 'Representação',     'descricao' => 'Defesa dos interesses das mulheres empreendedoras junto a autoridades públicas, FCDL e CNDL.'],
    ];
}

// ─── DIRETORIA ───────────────────────────────────────
$dir_tag   = ($has_acf ? get_field('cdl_mulher_diretoria_tag')   : '') ?: 'Quem lidera';
$dir_title = ($has_acf ? get_field('cdl_mulher_diretoria_title') : '') ?: 'Diretoria CDL Mulher';
$diretoria = $has_acf ? get_field('cdl_mulher_diretoria') : null;
if (!$diretoria) {
    $img_base = CDL_THEME_URI . '/assets/img/cdl-mulher/';
    $diretoria = [
        ['nome' => 'Danielly Mendes',                          'cargo' => 'Presidente',                  'foto' => ['url' => $img_base . 'Danielly-Mendes-Presidente-CDL-Mulher2.webp']],
        ['nome' => 'Cristiane Eunice Elias de Souza',          'cargo' => 'Vice-Presidente',             'foto' => ['url' => $img_base . 'Cristiane-Eunice-Elias-de-Souza-Vice-presidente-CDL-Mulher.webp']],
        ['nome' => 'Érica Cristian Batista do Nascimento',     'cargo' => 'Dir. Empreendedorismo',       'foto' => ['url' => $img_base . 'Erica-Cristian-Batista-do-Nascimento-Diretora-de-Empreendedorismo.webp']],
        ['nome' => 'Caroline do Nascimento Silva',             'cargo' => 'Dir. Captação de Recursos',   'foto' => ['url' => $img_base . 'Caroline-do-Nascimento-Silva-Diretora-de-Captacao.webp']],
        ['nome' => 'Luciana Nery Moisés Seixas',               'cargo' => 'Dir. Sustentabilidade Social','foto' => ['url' => $img_base . 'Luciana-Nery-Moises-Seixas-Diretora-de-Sustentabilidade-Social.webp']],
        ['nome' => 'Emanuelle Carolinne do Nascimento',        'cargo' => 'Dir. Eventos',                'foto' => ['url' => $img_base . 'Emanuelle-Carolinne-do-Nascimento-Diretora-de-Eventos.webp']],
        ['nome' => 'Amanda Prometti',                          'cargo' => 'Dir. Marketing',              'foto' => ['url' => $img_base . 'Amanda-Prometti-Diretora-de-Marketing.webp']],
    ];
}

// ─── QUOTE ───────────────────────────────────────────
$quote_tag   = ($has_acf ? get_field('cdl_mulher_quote_tag')   : '');
$quote_texto = ($has_acf ? get_field('cdl_mulher_quote_texto') : '') ?: 'O movimento CDL Mulher Anápolis está transformando o cenário empresarial da nossa cidade, uma empreendedora de cada vez.';
$quote_autor = ($has_acf ? get_field('cdl_mulher_quote_autor') : '') ?: '— CDL Mulher Anápolis';

// ─── CTA FINAL ───────────────────────────────────────
$cta_title    = ($has_acf ? get_field('cdl_mulher_cta_title')    : '') ?: "Quer fazer parte\ndo CDL Mulher?";
$cta_subtitle = ($has_acf ? get_field('cdl_mulher_cta_subtitle') : '') ?: 'Junte-se às mulheres empreendedoras que estão transformando o comércio de Anápolis.';
$cta_btn_text = ($has_acf ? get_field('cdl_mulher_cta_btn_text') : '') ?: 'Quero participar';
$cta_btn_link = ($has_acf ? get_field('cdl_mulher_cta_btn_link') : '') ?: '/associe-se/';

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

<!-- Sobre o programa — Split -->
<section class="sec text-left">
    <div class="wrap" style="display:grid;grid-template-columns:1fr 1fr;gap:clamp(40px,5vw,80px);align-items:center">
        <div class="ao">
            <img src="<?php echo esc_url($sobre_img_url); ?>" alt="CDL Mulher" style="border-radius:var(--radius-xl);box-shadow:0 32px 80px rgba(0,0,0,.08);width:100%" loading="lazy" decoding="async">
        </div>
        <div>
            <div class="sec-tag ao"><?php echo esc_html($sobre_tag); ?></div>
            <h2 class="sec-title ao ao-d1" style="text-align:left"><?php echo $nl2br_h($sobre_title); ?></h2>
            <div class="sobre-texto ao ao-d2"><?php echo wp_kses_post($sobre_text); ?></div>
        </div>
    </div>
</section>

<!-- Oferecimentos -->
<?php if ($oferecimentos): ?>
<section class="sec" style="background:var(--light)">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao"><?php echo esc_html($ofer_tag); ?></div>
        <h2 class="sec-title ao ao-d1"><?php echo esc_html($ofer_title); ?></h2>
        <?php if ($ofer_sub): ?>
        <p class="sec-desc ao ao-d2" style="margin:0 auto 0"><?php echo esc_html($ofer_sub); ?></p>
        <?php endif; ?>

        <?php
        $of_icons = [
            '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>',
            '<path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/><path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/>',
            '<circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/>',
            '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>',
            '<path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>',
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
<section class="people-scroll">
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

<!-- Quote / Chamada -->
<section class="cta-dark">
    <div class="wrap" style="position:relative;z-index:1;max-width:800px;margin:0 auto">
        <div style="font-size:clamp(1.8rem,3vw,2.8rem);color:var(--gold);line-height:1;margin-bottom:24px;font-family:'Sora'">&ldquo;</div>
        <p class="ao" style="font-family:'Sora';font-size:clamp(1.1rem,2vw,1.5rem);font-weight:500;color:#fff;line-height:1.5;letter-spacing:-.02em;margin-bottom:24px"><?php echo esc_html($quote_texto); ?></p>
        <p class="ao ao-d1" style="font-size:.85rem;color:rgba(255,255,255,.4)"><?php echo esc_html($quote_autor); ?></p>
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
