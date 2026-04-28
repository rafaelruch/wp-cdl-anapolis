<?php
/**
 * Benefits Carousel Section — todos os benefícios da CDL Anápolis (Swiper)
 */
$tag      = get_field('benefits_tag', 'option') ?: 'Para quem faz parte';
$title    = get_field('benefits_title', 'option') ?: 'Benefícios que fazem a diferença';
$subtitle = get_field('benefits_subtitle', 'option') ?: 'Vantagens reais que impulsionam o crescimento do seu negócio todos os dias.';

// Fonte única de todos os benefícios (pareada com o mega-menu)
$benefits = [
    ['title' => 'Planejamento Estratégico', 'link' => '/planejamento-estrategico/', 'icon' => '<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/>'],
    ['title' => 'Assessoria Contábil',      'link' => '/assessoria-contabil/',      'icon' => '<path d="M9 11H5a2 2 0 00-2 2v7h18v-7a2 2 0 00-2-2h-4"/><rect x="9" y="3" width="6" height="8" rx="1"/>'],
    ['title' => 'Assessoria Jurídica',      'link' => '/cdl-assessoria-juridica/',  'icon' => '<circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/>'],
    ['title' => 'Apoio ao MEI',             'link' => '/apoio-mei/',                'icon' => '<path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/>'],
    ['title' => 'CDL Saúde',                'link' => '/cdl-saude/',                'icon' => '<path d="M22 12h-4l-3 9L9 3l-3 9H2"/>'],
    ['title' => 'Rede de Descontos',        'link' => '/rede-de-descontos/',        'icon' => '<path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/>'],
    ['title' => 'Espaços Corporativos',     'link' => '/espacos-corporativos/',     'icon' => '<rect x="3" y="4" width="18" height="16" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/>'],
    ['title' => 'Eventos Corporativos',     'link' => '/eventos-corporativos/',     'icon' => '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>'],
    ['title' => 'Espaço de Lazer',          'link' => '/sede-campestre/',           'icon' => '<path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>'],
    ['title' => 'Núcleos Empresariais',     'link' => '/nucleos-empresariais/',     'icon' => '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>'],
    ['title' => 'Treinamentos',             'link' => '/treinamentos/',             'icon' => '<path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>'],
    ['title' => 'Mídia e Divulgação',       'link' => '/midia-divulgacao/',         'icon' => '<path d="M3 11l18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 11-5.8-1.6"/>'],
    ['title' => 'Recrutamento',             'link' => '/recrutamento/',             'icon' => '<path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/>'],
    ['title' => 'Exames Admissionais',      'link' => '/exames-admissionais/',      'icon' => '<path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="9" y1="15" x2="15" y2="15"/>'],
    ['title' => 'Gestão E-social',          'link' => '/gestao-esocial/',           'icon' => '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M8 2v4M16 2v4M3 10h18"/>'],
];
?>

<section class="sec" id="beneficios">
    <div class="wrap" style="text-align:center">
        <div class="sec-tag ao"><?php echo esc_html($tag); ?></div>
        <h2 class="sec-title ao"><?php echo wp_kses_post($title); ?></h2>
        <p class="sec-desc ao" style="margin-left:auto;margin-right:auto"><?php echo esc_html($subtitle); ?></p>

        <div class="benefits-carousel ao">
            <button class="benefits-carousel__btn benefits-carousel__btn--prev" type="button" aria-label="Benefício anterior">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
            </button>

            <div class="swiper benefits-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($benefits as $b): ?>
                    <a href="<?php echo esc_url($b['link']); ?>" class="swiper-slide benefit-card">
                        <div class="benefit-card__ico">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?php echo $b['icon']; ?></svg>
                        </div>
                        <h3 class="benefit-card__title"><?php echo esc_html($b['title']); ?></h3>
                        <svg class="benefit-card__arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <button class="benefits-carousel__btn benefits-carousel__btn--next" type="button" aria-label="Próximo benefício">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
            </button>
        </div>

        <div class="benefits-footer ao">
            <span>Quer acessar todos estes benefícios?</span>
            <a href="/associe-se/" class="link">Seja um associado &rarr;</a>
        </div>
    </div>
</section>
