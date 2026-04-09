<?php
/**
 * CTA Dark Section
 * ACF fields on options page
 */
$title    = get_field('cta_dark_title', 'option') ?: 'Junte-se a quem<br>faz o comércio de<br>Anápolis acontecer';
$btn_text = get_field('cta_dark_button_text', 'option') ?: 'Quero fazer parte';
$btn_link = get_field('cta_dark_button_link', 'option') ?: '/associe-se/';
?>

<section class="cta-dark" aria-label="Chamada para participação">
    <div class="wrap" style="position:relative;z-index:1">
        <h2 class="ao"><?php echo wp_kses_post($title); ?></h2>
        <a href="<?php echo esc_url($btn_link); ?>" class="btn btn-gold ao ao-d1">
            <?php echo esc_html($btn_text); ?>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>
