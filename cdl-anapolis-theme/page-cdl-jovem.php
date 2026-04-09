<?php
/**
 * Template Name: CDL Jovem
 */
get_header();

$hero_image   = get_field('cdl_jovem_hero_image');
$hero_img_url = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1920&q=80';

$img_base = CDL_THEME_URI . '/assets/img/cdl-jovem/';
$diretoria = [
    ['nome' => 'Luan Samuel Mendes',  'cargo' => 'Presidente',                  'foto' => $img_base . 'LUAN-SAMUEL.png'],
    ['nome' => 'Isabella Perenne',     'cargo' => 'Vice-Presidente',             'foto' => $img_base . 'ISABELLA-PERENNE.png'],
    ['nome' => 'Wesley Venâncio',      'cargo' => 'Dir. Empreendedorismo',       'foto' => $img_base . 'WESLEY-VENANCIO.png'],
    ['nome' => 'Vinícius Corrêa',      'cargo' => 'Dir. Eventos',               'foto' => $img_base . 'VINICIUS-CORREA.png'],
    ['nome' => 'Rafael Vilela',        'cargo' => 'Dir. Marketing',              'foto' => $img_base . 'RAFAEL-VILELA.png'],
    ['nome' => 'Vinícius Ribeiro',     'cargo' => 'Dir. Responsabilidade Social','foto' => $img_base . 'VINICIUS-DARIE1024x1024.png'],
];
?>

<!-- Page Hero -->
<section class="page-hero" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)">Institucional</div>
        <h1 class="page-hero__title ao ao-d1">O Futuro do Comércio<br>Começa Aqui</h1>
        <p class="page-hero__sub ao ao-d2">A plataforma de crescimento pessoal e profissional para jovens empreendedores e líderes empresariais.</p>
    </div>
</section>

<!-- Stats strip -->
<section class="conv-social-strip">
    <div class="wrap">
        <div class="conv-social-strip__grid">
            <div class="ao"><span class="conv-social-strip__number">6</span><span class="conv-social-strip__label">Diretores</span></div>
            <div class="ao ao-d1"><span class="conv-social-strip__number">FCDL</span><span class="conv-social-strip__label">Representação estadual</span></div>
            <div class="ao ao-d2"><span class="conv-social-strip__number">CNDL</span><span class="conv-social-strip__label">Representação nacional</span></div>
        </div>
    </div>
</section>

<!-- Sobre — Split -->
<section class="sec text-left">
    <div class="wrap" style="display:grid;grid-template-columns:1fr 1fr;gap:clamp(40px,5vw,80px);align-items:center">
        <div>
            <div class="sec-tag ao">Quem somos</div>
            <h2 class="sec-title ao ao-d1" style="text-align:left">Mais do que uma<br>comunidade jovem</h2>
            <div class="sobre-texto ao ao-d2">
                <p>A CDL Jovem Anápolis opera sob a Câmara de Dirigentes Lojistas, fornecendo suporte, recursos e oportunidades para jovens empreendedores transformarem ideias em negócios de sucesso.</p>
                <p>É uma plataforma de crescimento pessoal e profissional, projetada para desenvolver jovens empresários lojistas com networking, capacitação e mentoria de profissionais experientes.</p>
            </div>
        </div>
        <div class="ao ao-d1">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=640&h=480&fit=crop" alt="CDL Jovem" style="border-radius:var(--radius-xl);box-shadow:0 32px 80px rgba(0,0,0,.08);width:100%">
        </div>
    </div>
</section>

<!-- Valores — 3 cards -->
<section class="sec" style="background:var(--light)">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Nossos valores</div>
        <h2 class="sec-title ao ao-d1">O que nos move</h2>
        <div class="sobre-mvv" style="margin-top:clamp(40px,5vw,56px)">
            <div class="sobre-mvv__card ao">
                <div class="sobre-mvv__ico"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg></div>
                <h3>Paixão</h3>
                <p>Dedicação com amor, alegria e satisfação em direção aos nossos ideais. Acreditamos no poder do entusiasmo para transformar negócios.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d1">
                <div class="sobre-mvv__ico"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div>
                <h3>Respeito</h3>
                <p>Preocupação com as pessoas e o bem-estar comum. Honestidade, transparência e lealdade em todas as relações.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d2">
                <div class="sobre-mvv__ico"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
                <h3>Profissionalismo</h3>
                <p>Disciplina, organização, comprometimento e responsabilidade na busca constante pela excelência.</p>
            </div>
        </div>
    </div>
</section>

<!-- Ofertas — Service cards -->
<section class="sec">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Oportunidades</div>
        <h2 class="sec-title ao ao-d1">O que o CDL Jovem oferece</h2>
        <div class="svc-grid" style="margin-top:clamp(40px,5vw,56px)">
            <div class="svc ao"><div class="ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div><div><h4>Networking</h4><p>Conecte-se com jovens empreendedores e líderes de mercado.</p></div></div>
            <div class="svc ao ao-d1"><div class="ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/><path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/></svg></div><div><h4>Capacitação</h4><p>Workshops, palestras e cursos de desenvolvimento pessoal e profissional.</p></div></div>
            <div class="svc ao ao-d2"><div class="ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg></div><div><h4>Mentoria</h4><p>Orientação de empresários experientes que compartilham conhecimento.</p></div></div>
            <div class="svc ao"><div class="ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div><div><h4>Eventos Exclusivos</h4><p>Feiras, rodadas de negócios e visitas técnicas para expandir sua rede.</p></div></div>
            <div class="svc ao ao-d1"><div class="ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div><div><h4>Representação</h4><p>Defesa dos interesses dos jovens empreendedores junto ao poder público.</p></div></div>
        </div>
    </div>
</section>

<!-- Diretoria — People Scroll -->
<section class="people-scroll" style="background:var(--light)">
    <div class="wrap" style="text-align:center;padding-bottom:40px">
        <div class="sec-tag ao">Quem lidera</div>
        <h2 class="sec-title ao ao-d1">Diretoria CDL Jovem</h2>
    </div>
    <div class="people-scroll__grid wrap">
        <div class="people-scroll__list">
            <?php foreach ($diretoria as $i => $m): ?>
            <div class="people-scroll__item<?php echo $i === 0 ? ' active' : ''; ?>" data-index="<?php echo $i; ?>">
                <span class="people-scroll__name"><?php echo esc_html($m['nome']); ?></span>
                <span class="people-scroll__role"><span class="people-scroll__plus">+</span><?php echo esc_html($m['cargo']); ?></span>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="people-scroll__photo">
            <?php foreach ($diretoria as $i => $m): ?>
            <img src="<?php echo esc_url($m['foto']); ?>" alt="<?php echo esc_attr($m['nome']); ?>"<?php echo $i === 0 ? ' class="active"' : ''; ?>>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Missão -->
<section class="cta-dark">
    <div class="wrap" style="position:relative;z-index:1;max-width:700px;margin:0 auto">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2);margin:0 auto 24px">Missão</div>
        <p class="ao" style="font-family:'Sora';font-size:clamp(1.1rem,2vw,1.4rem);font-weight:500;color:#fff;line-height:1.5;letter-spacing:-.02em">Fortalecer o Movimento Jovem Lojista, criando e desenvolvendo CDLs Jovens para formar futuros líderes do comércio de Anápolis e de todo o Brasil.</p>
    </div>
</section>

<!-- CTA -->
<section class="cta-gold">
    <h2 class="ao">Quer fazer parte<br>do CDL Jovem?</h2>
    <p class="ao ao-d1">Transforme suas ideias em negócios de sucesso com a nossa comunidade.</p>
    <a href="/associe-se/" class="btn btn-dark ao ao-d2">Quero participar <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
</section>

<?php get_footer(); ?>
