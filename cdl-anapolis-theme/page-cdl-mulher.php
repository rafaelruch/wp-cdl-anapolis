<?php
/**
 * Template Name: CDL Mulher
 */
get_header();

$hero_image   = get_field('cdl_mulher_hero_image');
$hero_img_url = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?w=1920&q=80';

$img_base = CDL_THEME_URI . '/assets/img/cdl-mulher/';
$diretoria = [
    ['nome' => 'Danielly Mendes',                           'cargo' => 'Presidente',                  'foto' => $img_base . 'Danielly-Mendes-Presidente-CDL-Mulher2.webp'],
    ['nome' => 'Cristiane Eunice Elias de Souza',            'cargo' => 'Vice-Presidente',             'foto' => $img_base . 'Cristiane-Eunice-Elias-de-Souza-Vice-presidente-CDL-Mulher.webp'],
    ['nome' => 'Érica Cristian Batista do Nascimento',       'cargo' => 'Dir. Empreendedorismo',       'foto' => $img_base . 'Erica-Cristian-Batista-do-Nascimento-Diretora-de-Empreendedorismo.webp'],
    ['nome' => 'Caroline do Nascimento Silva',               'cargo' => 'Dir. Captação de Recursos',   'foto' => $img_base . 'Caroline-do-Nascimento-Silva-Diretora-de-Captacao.webp'],
    ['nome' => 'Luciana Nery Moisés Seixas',                 'cargo' => 'Dir. Sustentabilidade Social', 'foto' => $img_base . 'Luciana-Nery-Moises-Seixas-Diretora-de-Sustentabilidade-Social.webp'],
    ['nome' => 'Emanuelle Carolinne do Nascimento',          'cargo' => 'Dir. Eventos',                'foto' => $img_base . 'Emanuelle-Carolinne-do-Nascimento-Diretora-de-Eventos.webp'],
    ['nome' => 'Amanda Prometti',                            'cargo' => 'Dir. Marketing',              'foto' => $img_base . 'Amanda-Prometti-Diretora-de-Marketing.webp'],
];
?>

<!-- Page Hero -->
<section class="page-hero" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)">Institucional</div>
        <h1 class="page-hero__title ao ao-d1">Empoderando Mulheres,<br>Fortalecendo Negócios</h1>
        <p class="page-hero__sub ao ao-d2">O núcleo da CDL Anápolis dedicado ao desenvolvimento e protagonismo das mulheres empreendedoras.</p>
    </div>
</section>

<!-- Stats strip -->
<section class="conv-social-strip">
    <div class="wrap">
        <div class="conv-social-strip__grid">
            <div class="ao"><span class="conv-social-strip__number">7</span><span class="conv-social-strip__label">Diretoras</span></div>
            <div class="ao ao-d1"><span class="conv-social-strip__number">12</span><span class="conv-social-strip__label">Eventos por ano</span></div>
            <div class="ao ao-d2"><span class="conv-social-strip__number">100+</span><span class="conv-social-strip__label">Participantes ativas</span></div>
        </div>
    </div>
</section>

<!-- Sobre o programa — Split -->
<section class="sec text-left">
    <div class="wrap" style="display:grid;grid-template-columns:1fr 1fr;gap:clamp(40px,5vw,80px);align-items:center">
        <div class="ao">
            <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?w=640&h=480&fit=crop" alt="CDL Mulher" style="border-radius:var(--radius-xl);box-shadow:0 32px 80px rgba(0,0,0,.08);width:100%" loading="lazy" decoding="async">
        </div>
        <div>
            <div class="sec-tag ao">Quem somos</div>
            <h2 class="sec-title ao ao-d1" style="text-align:left">Uma plataforma de<br>crescimento e liderança</h2>
            <div class="sobre-texto ao ao-d2">
                <p>O CDL Mulher Anápolis é um programa dedicado a desenvolver todo o potencial das mulheres empreendedoras. A iniciativa visa identificar, capacitar e desenvolver mulheres lojistas e líderes de diversos setores para papéis de destaque dentro da comunidade, dos negócios e da sociedade.</p>
                <p>Através de eventos mensais com palestras, workshops e oportunidades de networking, o programa enfatiza o espírito comunitário, o desenvolvimento de liderança e a ética profissional.</p>
            </div>
        </div>
    </div>
</section>

<!-- O que oferecemos — Cards com ícones variados -->
<section class="sec" style="background:var(--light)">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Oportunidades</div>
        <h2 class="sec-title ao ao-d1">O que o CDL Mulher oferece</h2>
        <p class="sec-desc ao ao-d2" style="margin:0 auto 0">Desenvolvimento profissional completo para a mulher empreendedora.</p>

        <div class="sobre-mvv" style="margin-top:clamp(40px,5vw,56px)">
            <div class="sobre-mvv__card ao">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                </div>
                <h3>Networking</h3>
                <p>Conecte-se com outras empreendedoras, compartilhe experiências e aprenda com líderes de mercado em encontros mensais.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d1">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/><path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/></svg>
                </div>
                <h3>Capacitação</h3>
                <p>Workshops, palestras e cursos focados em gestão, finanças, marketing digital e desenvolvimento de liderança feminina.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d2">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
                </div>
                <h3>Mentoria</h3>
                <p>Suporte de empresárias experientes que compartilham conhecimento, orientação prática e vivências de mercado.</p>
            </div>
        </div>
        <div class="sobre-mvv" style="margin-top:20px">
            <div class="sobre-mvv__card ao">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
                <h3>Eventos Exclusivos</h3>
                <p>Feiras, rodadas de negócios, visitas técnicas e encontros para expansão da sua rede de contatos.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d1">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
                </div>
                <h3>Ação Social</h3>
                <p>Projetos de capacitação profissional e sustentabilidade que impactam positivamente a vida das mulheres da comunidade.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d2">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
                <h3>Representação</h3>
                <p>Defesa dos interesses das mulheres empreendedoras junto a autoridades públicas, FCDL e CNDL.</p>
            </div>
        </div>
    </div>
</section>

<!-- Diretoria — People Scroll -->
<section class="people-scroll">
    <div class="wrap" style="text-align:center;padding-bottom:40px">
        <div class="sec-tag ao">Quem lidera</div>
        <h2 class="sec-title ao ao-d1">Diretoria CDL Mulher</h2>
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
            <img src="<?php echo esc_url($m['foto']); ?>" alt="<?php echo esc_attr($m['nome']); ?>"<?php echo $i === 0 ? ' class="active" fetchpriority="high"' : ' loading="lazy" decoding="async"'; ?>>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Quote / Chamada -->
<section class="cta-dark">
    <div class="wrap" style="position:relative;z-index:1;max-width:800px;margin:0 auto">
        <div style="font-size:clamp(1.8rem,3vw,2.8rem);color:var(--gold);line-height:1;margin-bottom:24px;font-family:'Sora'">"</div>
        <p class="ao" style="font-family:'Sora';font-size:clamp(1.1rem,2vw,1.5rem);font-weight:500;color:#fff;line-height:1.5;letter-spacing:-.02em;margin-bottom:24px">O movimento CDL Mulher Anápolis está transformando o cenário empresarial da nossa cidade, uma empreendedora de cada vez.</p>
        <p class="ao ao-d1" style="font-size:.85rem;color:rgba(255,255,255,.4)">— CDL Mulher Anápolis</p>
    </div>
</section>

<!-- CTA -->
<section class="cta-gold">
    <h2 class="ao">Quer fazer parte<br>do CDL Mulher?</h2>
    <p class="ao ao-d1">Junte-se às mulheres empreendedoras que estão transformando o comércio de Anápolis.</p>
    <a href="/associe-se/" class="btn btn-dark ao ao-d2">Quero participar <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
</section>

<?php get_footer(); ?>
