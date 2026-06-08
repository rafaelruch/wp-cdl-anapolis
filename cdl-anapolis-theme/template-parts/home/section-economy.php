<?php
/**
 * Economia Local em Números — widget do Impostômetro de Anápolis.
 * URL configurável via ACF Options (CDL Config → Homepage) com fallback
 * para o widget oficial.
 */
$iframe_url = function_exists('get_field')
    ? (get_field('impostometro_iframe_url', 'option')
        ?: 'https://impostometro.com.br/widget/contador/go?municipio=anapolis')
    : 'https://impostometro.com.br/widget/contador/go?municipio=anapolis';
?>

<section class="sec eco-sec" style="text-align:center;background:var(--light)">
    <div class="wrap">
        <div class="sec-tag ao">Anápolis - GO</div>
        <h2 class="sec-title ao">Economia Local<br>em Números</h2>
        <p class="sec-desc ao" style="margin:16px auto 0;max-width:560px">Acompanhe em tempo real a arrecadação tributária do município de Anápolis. Dados fornecidos pela ACSP — Associação Comercial de São Paulo.</p>

        <div class="eco-iframe ao ao-d1">
            <iframe
                src="<?php echo esc_url($iframe_url); ?>"
                width="728"
                height="228"
                scrolling="no"
                frameborder="0"
                title="Impostômetro de Anápolis"
                loading="lazy">
            </iframe>
        </div>
    </div>
</section>
