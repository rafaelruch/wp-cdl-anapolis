<?php
/**
 * CTA Gold Band
 * ACF fields on options page
 */

$title    = get_field('cta_gold_title', 'option') ?: 'Venha para a CDL Anápolis';
$subtitle = get_field('cta_gold_subtitle', 'option') ?: 'Junte-se a milhares de empreendedores que já fazem parte';
$btn_text = get_field('cta_gold_button_text', 'option') ?: 'Quero fazer parte';
$btn_link = get_field('cta_gold_button_link', 'option') ?: '/associe-se/';
?>

<section class="cta-gold" aria-label="Faça parte da CDL">
    <h2 class="ao"><?php echo wp_kses_post($title); ?></h2>
    <p class="ao ao-d1"><?php echo esc_html($subtitle); ?></p>
    <a href="<?php echo esc_url($btn_link); ?>" class="btn btn-dark ao ao-d2">
        <?php echo esc_html($btn_text); ?>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
</section>
