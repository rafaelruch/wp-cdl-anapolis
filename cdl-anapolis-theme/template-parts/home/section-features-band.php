<?php
/**
 * Features Band - Carrossel Swiper de todos os serviços (mesmo design dos cards)
 * ACF fields on options page (mantidos para o título/subtítulo)
 */

$title    = get_field('features_band_title', 'option') ?: 'Todas as vantagens, <em>em um só lugar</em>';
$subtitle = get_field('features_band_subtitle', 'option') ?: 'Serviços essenciais para quem empreende — do crédito à assessoria jurídica, tudo pensado para você focar no que importa.';

// Lista fixa dos 6 serviços, pareada com o mega-menu de Serviços do header.php.
// Hardcoded de propósito: o ACF Options estava com 3 itens antigos sobrescrevendo
// a lista correta. Para reabilitar a edição via admin no futuro, basta voltar a
// usar get_field('features_band_items', 'option') aqui.
$items = [
    [
        'item_title'       => 'CDL Celular',
        'item_description' => 'Consultas e proteção mobile para o seu negócio.',
        'item_link'        => '/cdl-celular/',
    ],
    [
        'item_title'       => 'Central de Cobranças',
        'item_description' => 'Recuperação de crédito profissional e segura.',
        'item_link'        => '/central-de-cobrancas/',
    ],
    [
        'item_title'       => 'Certificado Digital',
        'item_description' => 'e-CPF e e-CNPJ nos formatos A1 e A3, com agendamento facilitado.',
        'item_link'        => '/certificado-digital-cdl/',
    ],
    [
        'item_title'       => 'NF-e / NFC-e',
        'item_description' => 'Emissão de notas fiscais eletrônicas sem complicação.',
        'item_link'        => '/nfe-nfce/',
    ],
    [
        'item_title'       => 'SPC Brasil',
        'item_description' => 'Consultas e proteção ao crédito com a maior base do país.',
        'item_link'        => '/spc/',
    ],
    [
        'item_title'       => 'Tempo & Saúde',
        'item_description' => 'Saúde ocupacional e segurança do trabalho para sua equipe.',
        'item_link'        => '/tempo-saude/',
    ],
];

// Ícones SVG por slug — usados quando não há ícone via ACF
$icon_by_slug = [
    'cdl-celular'           => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>',
    'central-de-cobrancas'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>',
    'certificado-digital-cdl' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>',
    'nfe-nfce'              => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>',
    'spc'                   => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    'tempo-saude'           => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
];

// Ícone genérico de fallback
$default_icon = '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>';
?>

<section class="features-band" aria-label="Principais vantagens">
    <div class="wrap">
        <h2 class="features-headline ao"><?php echo wp_kses_post($title); ?></h2>
        <p class="features-sub ao ao-d1"><?php echo esc_html($subtitle); ?></p>

        <div class="features-band-carousel ao ao-d2">
            <button class="features-band-carousel__btn features-band-carousel__btn--prev" type="button" aria-label="Vantagem anterior">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
            </button>

            <div class="swiper features-band-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($items as $item):
                        $link = !empty($item['item_link']) ? $item['item_link'] : '';
                        $slug = $link ? trim(parse_url($link, PHP_URL_PATH) ?: '', '/') : '';
                        $tag  = $link ? 'a' : 'div';
                    ?>
                    <<?php echo $tag; ?> class="swiper-slide feature-card"<?php if ($link): ?> href="<?php echo esc_url($link); ?>"<?php endif; ?>>
                        <div class="feature-ico">
                            <?php if (!empty($item['item_icon']) && is_array($item['item_icon'])): ?>
                                <img src="<?php echo esc_url($item['item_icon']['url']); ?>" alt="" width="22" height="22" loading="lazy">
                            <?php else:
                                echo $icon_by_slug[$slug] ?? $default_icon;
                            endif; ?>
                        </div>
                        <h3><?php echo esc_html($item['item_title']); ?></h3>
                        <p><?php echo esc_html($item['item_description']); ?></p>
                    </<?php echo $tag; ?>>
                    <?php endforeach; ?>
                </div>
            </div>

            <button class="features-band-carousel__btn features-band-carousel__btn--next" type="button" aria-label="Próxima vantagem">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
            </button>
        </div>
    </div>
</section>
