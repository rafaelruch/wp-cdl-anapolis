<?php
/**
 * Marquee Ticker - Service names scrolling
 */

$services = [
    'SPC Brasil',
    'Assessoria Juridica',
    'CDL Saude',
    'Certificado Digital',
    'CDL Celular',
    'Sede Campestre',
    'NF-e / NFC-e',
    'Central de Cobrancas',
    'CDL Mais Voce',
];
?>

<div class="marquee-sec" aria-hidden="true"><div class="marquee-track">
    <?php
    // Duplicate the list twice for seamless infinite scroll
    for ($repeat = 0; $repeat < 2; $repeat++):
        foreach ($services as $service):
    ?>
    <span><?php echo esc_html($service); ?></span><span class="dot">&bull;</span>
    <?php
        endforeach;
    endfor;
    ?>
</div></div>
