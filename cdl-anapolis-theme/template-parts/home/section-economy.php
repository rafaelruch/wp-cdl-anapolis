<?php
/**
 * Economia Local em Números — contadores Impostômetro e Gastômetro.
 *
 * Os shortcodes [impostometro_cdl] e [gastometro_cdl] vêm do código
 * embarcado em inc/contadores/* (originalmente plugins desenvolvidos pelo
 * Matheus Rezende). Cada um traz CSS e JS inline próprios, então não tem
 * dependência extra. Os dois ficam lado a lado em desktop e empilhados em
 * mobile via .eco-contadores.
 */
?>

<section class="sec eco-sec" style="text-align:center;background:var(--light)">
    <div class="wrap">
        <div class="sec-tag ao">Anápolis - GO</div>
        <h2 class="sec-title ao">Economia Local<br>em Números</h2>
        <p class="sec-desc ao" style="margin:16px auto 0;max-width:620px">Acompanhe em tempo real a arrecadação tributária e os gastos públicos do município, do estado e do país. Dados oficiais do Impostômetro (ACSP) e da Plataforma Gasto Brasil.</p>

        <div class="eco-contadores ao ao-d1">
            <div class="eco-contadores__item">
                <?php echo do_shortcode('[impostometro_cdl]'); ?>
            </div>
            <div class="eco-contadores__item">
                <?php echo do_shortcode('[gastometro_cdl]'); ?>
            </div>
        </div>
    </div>
</section>
