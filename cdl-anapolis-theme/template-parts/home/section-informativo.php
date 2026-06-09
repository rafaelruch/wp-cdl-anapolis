<?php
/**
 * Notícias CDL — carrossel Swiper das últimas publicações (home).
 * Cache via transient em cdl_get_home_informativos (1h).
 * Textos da seção (etiqueta/título/descrição/link) administráveis via ACF.
 */
$posts = cdl_get_home_informativos(12);

$has_acf = function_exists('get_field');
$nt_tag  = ($has_acf ? get_field('noticias_tag', 'option')        : '') ?: 'Eventos e Notícias';
$nt_ttl  = ($has_acf ? get_field('noticias_title', 'option')      : '') ?: 'Notícias CDL';
$nt_dsc  = ($has_acf ? get_field('noticias_desc', 'option')       : '') ?: 'Fique por dentro do que acontece no comércio de Anápolis.';
$nt_lnk  = ($has_acf ? get_field('noticias_link_text', 'option')  : '') ?: 'Ver todas as notícias';
?>

<section class="info-sec" id="informativo" style="background:var(--light)" aria-label="Notícias CDL">
    <div class="wrap">
        <div class="sec-tag ao"><?php echo esc_html($nt_tag); ?></div>
        <h2 class="sec-title ao"><?php echo esc_html($nt_ttl); ?></h2>
        <p class="sec-desc ao"><?php echo esc_html($nt_dsc); ?></p>

        <?php if ($posts->have_posts()): ?>
        <div class="info-carousel ao">
            <button class="info-carousel__btn info-carousel__btn--prev" type="button" aria-label="Notícia anterior">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
            </button>

            <div class="swiper info-swiper">
                <div class="swiper-wrapper">
                    <?php while ($posts->have_posts()): $posts->the_post(); ?>
                    <article class="swiper-slide info-card">
                        <a href="<?php the_permalink(); ?>" class="info-card-link" aria-label="<?php the_title(); ?>"></a>
                        <div class="info-card-img">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('medium_large', ['loading' => 'lazy', 'style' => 'width:100%;height:100%;object-fit:cover']); ?>
                            <?php else: ?>
                                <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=600&h=400&fit=crop" alt="" loading="lazy">
                            <?php endif; ?>
                        </div>
                        <div class="info-card-body">
                            <div class="info-card-date"><?php echo get_the_date('d M Y'); ?></div>
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
                        </div>
                    </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>

            <button class="info-carousel__btn info-carousel__btn--next" type="button" aria-label="Próxima notícia">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
            </button>
        </div>

        <div class="info-footer ao">
            <a href="<?php echo esc_url(get_post_type_archive_link('informativo')); ?>" class="link"><?php echo esc_html($nt_lnk); ?> &rarr;</a>
        </div>
        <?php else: ?>
        <!-- Placeholder card when no posts exist -->
        <div class="info-grid">
            <div class="info-card ao">
                <div class="info-card-img"><img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=600&h=400&fit=crop" alt="" loading="lazy"></div>
                <div class="info-card-body">
                    <div class="info-card-date"><?php echo date('d M Y'); ?></div>
                    <h4>Em breve novas publicações</h4>
                    <p>Fique atento às novidades da CDL Anápolis.</p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
