<?php
/**
 * Template Name: Impostômetro
 * Slug: impostometro
 */
get_header();
?>

<!-- Page Hero -->
<section class="page-hero" style="background-image:url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1920&q=80')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)">Anápolis - GO</div>
        <h1 class="page-hero__title ao">Economia Local<br>em Números</h1>
        <p class="page-hero__sub ao">Acompanhe em tempo real a arrecadação de impostos e os gastos públicos do município de Anápolis.</p>
    </div>
</section>

<!-- Widgets -->
<section class="sec imposto-section">
    <div class="wrap">

        <div class="imposto-grid">
            <!-- Impostômetro -->
            <div class="imposto-card ao">
                <div class="imposto-card__badge">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    Impostômetro
                </div>
                <h2 class="imposto-card__title">Quanto Anápolis já pagou em impostos?</h2>
                <p class="imposto-card__desc">Contador em tempo real da arrecadação tributária do município. Dados fornecidos pela ACSP — Associação Comercial de São Paulo.</p>
                <div class="imposto-card__iframe">
                    <iframe src="https://impostometro.com.br/widget/contador/go?municipio=anapolis" width="728" height="228" scrolling="no" frameborder="0" title="Impostômetro de Anápolis" loading="lazy"></iframe>
                </div>
                <a href="https://impostometro.com.br" target="_blank" rel="noopener" class="imposto-card__link">
                    Ver detalhes no Impostômetro
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17l9.2-9.2M17 17V8H8"/></svg>
                </a>
            </div>

            <!-- Gastômetro -->
            <div class="imposto-card ao ao-d1">
                <div class="imposto-card__badge imposto-card__badge--gold">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                    Gastômetro
                </div>
                <h2 class="imposto-card__title">Para onde vai o dinheiro público?</h2>
                <p class="imposto-card__desc">Painel de gastos públicos do município de Anápolis. Transparência fiscal em tempo real com dados do Gasto Brasil.</p>
                <div class="imposto-card__iframe">
                    <iframe src="https://gastobrasil.com.br/widget-impostometro-gastometro-728-228" width="728" height="258" scrolling="no" frameborder="0" title="Gastômetro de Anápolis" loading="lazy"></iframe>
                </div>
                <a href="https://gastobrasil.com.br/municipios" target="_blank" rel="noopener" class="imposto-card__link">
                    Ver painel completo
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17l9.2-9.2M17 17V8H8"/></svg>
                </a>
            </div>
        </div>

        <!-- CTA -->
        <div class="imposto-cta ao">
            <p>A CDL Anápolis trabalha pela transparência fiscal e pelo fortalecimento do comércio local.</p>
            <a href="<?php echo esc_url(home_url('/associe-se/')); ?>" class="btn btn--gold">Faça parte da CDL</a>
        </div>

    </div>
</section>

<?php get_footer(); ?>
