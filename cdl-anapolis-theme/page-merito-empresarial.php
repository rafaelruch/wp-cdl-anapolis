<?php
/**
 * Template Name: Mérito Empresarial
 */
get_header();

$hero_image   = get_field('merito_hero_image');
$hero_img_url = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1920&q=80';
?>

<!-- Page Hero -->
<section class="page-hero" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)">Institucional</div>
        <h1 class="page-hero__title ao ao-d1">O Oscar do Comércio<br>de Anápolis</h1>
        <p class="page-hero__sub ao ao-d2">A maior e mais tradicional premiação do setor comercial da cidade, promovida pela CDL Anápolis.</p>
    </div>
</section>

<!-- Stats strip -->
<section class="conv-social-strip">
    <div class="wrap">
        <div class="conv-social-strip__grid">
            <div class="ao"><span class="conv-social-strip__number">20 anos</span><span class="conv-social-strip__label">de tradição</span></div>
            <div class="ao ao-d1"><span class="conv-social-strip__number">1,7M+</span><span class="conv-social-strip__label">avaliações realizadas</span></div>
            <div class="ao ao-d2"><span class="conv-social-strip__number">★</span><span class="conv-social-strip__label">Reconhecimento da excelência</span></div>
        </div>
    </div>
</section>

<!-- Split section — O que é -->
<section class="sec text-left">
    <div class="wrap" style="display:grid;grid-template-columns:1fr 1fr;gap:clamp(40px,5vw,80px);align-items:center">
        <div class="ao">
            <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?w=640&h=480&fit=crop" alt="Mérito Empresarial" style="border-radius:var(--radius-xl);box-shadow:0 32px 80px rgba(0,0,0,.08);width:100%" loading="lazy" decoding="async">
        </div>
        <div>
            <div class="sec-tag ao">O que é</div>
            <h2 class="sec-title ao ao-d1" style="text-align:left">O reconhecimento que<br>a cidade constrói</h2>
            <div class="sobre-texto ao ao-d2">
                <p>O Mérito Empresarial é a principal premiação do comércio de Anápolis — uma iniciativa da CDL Anápolis que reconhece e motiva empreendedores de diversos segmentos a manter a excelência na prestação de serviços.</p>
                <p>A partir de 2019, o programa adotou transparência e participação comunitária através do aplicativo CDL Mais Você, permitindo que consumidores avaliem os estabelecimentos da cidade. São mais de 1,7 milhão de avaliações qualificadas, auxiliando os empresários a entender as necessidades dos clientes e melhorar as experiências de compra.</p>
            </div>
        </div>
    </div>
</section>

<!-- 3 Cards: Propósito, Avaliação, Gala -->
<section class="sec" style="background:var(--light)">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Como funciona</div>
        <h2 class="sec-title ao ao-d1">Os pilares da premiação</h2>
        <p class="sec-desc ao ao-d2" style="margin:0 auto 0">Do propósito à celebração, cada etapa fortalece o comércio local.</p>

        <div class="sobre-mvv" style="margin-top:clamp(40px,5vw,56px)">
            <div class="sobre-mvv__card ao">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
                </div>
                <h3>Propósito</h3>
                <p>Fortalecer a imagem dos estabelecimentos locais dentro da comunidade anapolina, homenageando empresas que demonstram qualidade excepcional de atendimento e incentivando a melhoria contínua.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d1">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                </div>
                <h3>Sistema de Avaliação</h3>
                <p>Através do app CDL Mais Você, consumidores avaliam os estabelecimentos da cidade. São mais de 1,7 milhão de avaliações construindo o ranking das melhores empresas — a voz da comunidade decide.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d2">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
                <h3>Evento de Gala</h3>
                <p>A cada ano, um evento formal de gala reúne figuras importantes da comunidade — liderança da CDL, representantes da indústria, autoridades e membros da organização — para celebrar a excelência.</p>
            </div>
        </div>
    </div>
</section>

<!-- Categorias da premiação — Cards -->
<section class="sec">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao">Categorias</div>
        <h2 class="sec-title ao ao-d1">Reconhecimentos da premiação</h2>
        <p class="sec-desc ao ao-d2" style="margin:0 auto">Diversas categorias celebram a excelência em cada segmento.</p>

        <div class="sobre-mvv" style="margin-top:clamp(40px,5vw,56px)">
            <div class="sobre-mvv__card ao">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                </div>
                <h3>Avaliação Popular</h3>
                <p>Mais de 1,7 milhão de avaliações via app CDL Mais Você constroem o ranking das melhores empresas da cidade.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d1">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <h3>Excelência no Atendimento</h3>
                <p>Reconhecimento às empresas que se destacam pela qualidade no atendimento ao consumidor.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d2">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
                </div>
                <h3>Destaque Comércio</h3>
                <p>Premiação para a empresa do comércio que apresentou excelência em gestão e experiência do cliente.</p>
            </div>
        </div>
        <div class="sobre-mvv" style="margin-top:20px">
            <div class="sobre-mvv__card ao">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>
                </div>
                <h3>Destaque Serviços</h3>
                <p>Reconhecimento ao prestador de serviço que mais contribuiu com a comunidade anapolina.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d1">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                </div>
                <h3>Jovem Empreendedor</h3>
                <p>Premiação para o jovem que se destacou pela inovação e pelo empreendedorismo na cidade.</p>
            </div>
            <div class="sobre-mvv__card ao ao-d2">
                <div class="sobre-mvv__ico">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
                </div>
                <h3>Mulher Empreendedora</h3>
                <p>Reconhecimento à mulher que se destacou no cenário empresarial de Anápolis.</p>
            </div>
        </div>
    </div>
</section>

<!-- Quote / Dark CTA band -->
<section class="cta-dark">
    <div class="wrap" style="position:relative;z-index:1;max-width:800px;margin:0 auto">
        <div style="font-size:clamp(1.8rem,3vw,2.8rem);color:var(--gold);line-height:1;margin-bottom:24px;font-family:'Sora'">"</div>
        <p class="ao" style="font-family:'Sora';font-size:clamp(1.1rem,2vw,1.5rem);font-weight:500;color:#fff;line-height:1.5;letter-spacing:-.02em;margin-bottom:24px">O Mérito Empresarial celebra o comprometimento com qualidade, inovação e atendimento ao cliente. Mais que um prêmio, é o reconhecimento que a própria cidade constrói.</p>
        <p class="ao ao-d1" style="font-size:.85rem;color:rgba(255,255,255,.4)">— CDL Anápolis, 20 anos de Mérito Empresarial</p>
    </div>
</section>

<!-- CTA Gold -->
<section class="cta-gold">
    <h2 class="ao">Quer indicar um<br>empreendedor destaque?</h2>
    <p class="ao ao-d1">Fale com a CDL Anápolis e indique quem merece ser reconhecido.</p>
    <a href="/fale-conosco/" class="btn btn-dark ao ao-d2">Fale conosco <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
</section>

<?php get_footer(); ?>
