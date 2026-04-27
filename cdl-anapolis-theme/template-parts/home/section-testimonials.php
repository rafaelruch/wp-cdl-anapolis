<?php
/**
 * Testimonials Carousel Section (cacheado via transient — 6h)
 */
$depoimentos = cdl_get_home_depoimentos(10);
?>

<?php if ($depoimentos->have_posts()): ?>
<section class="testimonials section-padding" aria-label="Depoimentos de associados">
    <div class="container">
        <div class="testimonials__header text-center">
            <span class="label fade-up">O que dizem nossos associados</span>
            <h2 class="testimonials__title fade-up">Depoimentos</h2>
        </div>

        <div class="testimonials__quote-deco fade-up" aria-hidden="true">&ldquo;</div>

        <div class="swiper testimonials__slider fade-up">
            <div class="swiper-wrapper">
                <?php while ($depoimentos->have_posts()): $depoimentos->the_post();
                    $name    = get_field('author_name') ?: get_the_title();
                    $company = get_field('author_company') ?: '';
                    $photo   = get_field('author_photo');
                    $text    = get_field('testimonial_text') ?: '';
                ?>
                <div class="swiper-slide">
                    <blockquote class="testimonial-card">
                        <p class="testimonial-card__text"><?php echo esc_html($text); ?></p>
                        <footer class="testimonial-card__author">
                            <?php if ($photo): ?>
                                <img src="<?php echo esc_url($photo['sizes']['thumbnail']); ?>"
                                     alt="<?php echo esc_attr($name); ?>"
                                     class="testimonial-card__photo"
                                     width="56" height="56" loading="lazy">
                            <?php else: ?>
                                <div class="testimonial-card__photo testimonial-card__photo--placeholder">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                </div>
                            <?php endif; ?>
                            <div>
                                <cite class="testimonial-card__name"><?php echo esc_html($name); ?></cite>
                                <?php if ($company): ?>
                                <span class="testimonial-card__company"><?php echo esc_html($company); ?></span>
                                <?php endif; ?>
                            </div>
                        </footer>
                    </blockquote>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <div class="swiper-pagination"></div>
            <button class="swiper-button-prev" aria-label="Depoimento anterior"></button>
            <button class="swiper-button-next" aria-label="Proximo depoimento"></button>
        </div>
    </div>
</section>
<?php endif; ?>
