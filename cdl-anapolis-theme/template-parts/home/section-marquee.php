<?php
/**
 * Marquee Ticker — Lista de serviços/textos rolando.
 * Itens administráveis via ACF Options (CDL Config → Homepage → Marquee).
 */
$has_acf = function_exists('get_field');
$items = $has_acf ? get_field('marquee_items', 'option') : null;

// Fallback: lista institucional default.
if (!$items) {
    $items = [
        ['texto' => 'SPC Brasil'],
        ['texto' => 'Assessoria Jurídica'],
        ['texto' => 'CDL Saúde'],
        ['texto' => 'Certificado Digital'],
        ['texto' => 'CDL Celular'],
        ['texto' => 'Balcão do MEI'],
        ['texto' => 'NF-e / NFC-e'],
        ['texto' => 'Central de Cobranças'],
    ];
}
?>

<div class="marquee-sec" aria-hidden="true"><div class="marquee-track">
    <?php
    // Duplica a lista 2x pra criar o efeito de scroll contínuo.
    for ($repeat = 0; $repeat < 2; $repeat++):
        foreach ($items as $item):
            $texto = is_array($item) ? ($item['texto'] ?? '') : $item;
            if (!$texto) continue;
    ?>
    <span><?php echo esc_html($texto); ?></span><span class="dot">&bull;</span>
    <?php
        endforeach;
    endfor;
    ?>
</div></div>
