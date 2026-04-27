<?php
/**
 * Informativo CDL Section - Latest 4 posts (cacheado via transient — 1h)
 */
$posts = cdl_get_home_informativos(4);
?>

<section class="info-sec" id="informativo" style="background:var(--light)" aria-label="Informativo CDL">
    <div class="wrap">
        <div class="sec-tag ao">Eventos e Notícias</div>
        <h2 class="sec-title ao">Informativos CDL</h2>
        <p class="sec-desc ao">Fique por dentro do que acontece no comércio de Anápolis.</p>

        <?php if ($posts->have_posts()): ?>
        <div class="info-grid">
            <?php $i = 0; while ($posts->have_posts()): $posts->the_post();
                $delay_class = $i > 0 ? ' ao-d' . $i : '';
            ?>
            <article class="info-card ao<?php echo $delay_class; ?>">
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
            <?php $i++; endwhile; wp_reset_postdata(); ?>
        </div>
        <?php else: ?>
        <!-- Placeholder cards when no posts exist -->
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
