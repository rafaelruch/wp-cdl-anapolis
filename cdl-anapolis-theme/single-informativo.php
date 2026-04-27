<?php
/**
 * Single Template: Informativo CDL
 * Layout: Breadcrumb + Article with sidebar (CTA + últimas notícias)
 */
get_header();

$sidebar_posts = new WP_Query([
    'post_type'              => 'informativo',
    'posts_per_page'         => 5,
    'post__not_in'           => [get_the_ID()],
    'orderby'                => 'date',
    'order'                  => 'DESC',
    'no_found_rows'          => true,
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
    'ignore_sticky_posts'    => true,
]);
?>

<!-- Page Hero -->
<section class="page-hero" style="<?php if (has_post_thumbnail()): ?>background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>')<?php else: ?>background-image:url('https://images.unsplash.com/photo-1504711434969-e33886168d6c?w=1920&q=80')<?php endif; ?>">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)"><?php echo get_the_date('d M Y'); ?></div>
        <h1 class="page-hero__title ao ao-d1"><?php the_title(); ?></h1>
        <?php if (has_excerpt()): ?>
        <p class="page-hero__sub ao ao-d2"><?php echo esc_html(get_the_excerpt()); ?></p>
        <?php endif; ?>
    </div>
</section>

<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="wrap">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="<?php echo home_url(); ?>">Início</a>
            <span class="breadcrumb__sep">/</span>
            <a href="<?php echo get_post_type_archive_link('informativo'); ?>">Informativos</a>
            <span class="breadcrumb__sep">/</span>
            <span class="breadcrumb__current"><?php echo wp_trim_words(get_the_title(), 8, '...'); ?></span>
        </nav>
    </div>
</div>

<!-- Article + Sidebar -->
<section class="sec single-layout">
    <div class="wrap">
        <div class="single-grid">
            <!-- Main Content -->
            <article class="single-article ao">
                <!-- Featured Image -->
                <?php if (has_post_thumbnail()): ?>
                <div class="single-article__hero-img">
                    <?php the_post_thumbnail('large', ['style' => 'width:100%;height:auto;border-radius:var(--radius-xl);']); ?>
                </div>
                <?php endif; ?>

                <!-- Meta -->
                <div class="single-article__meta">
                    <span class="single-article__date">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <?php echo get_the_date('d \d\e F \d\e Y'); ?>
                    </span>
                </div>

                <!-- Title -->
                <h1 class="single-article__title"><?php the_title(); ?></h1>

                <!-- Lead -->
                <?php if (has_excerpt()): ?>
                <p class="single-article__lead"><?php echo esc_html(get_the_excerpt()); ?></p>
                <?php endif; ?>

                <!-- Content -->
                <div class="single-article__content">
                    <?php the_content(); ?>
                </div>

                <!-- Share -->
                <div class="single-article__share">
                    <span class="single-article__share-label">Compartilhar:</span>
                    <a href="https://wa.me/?text=<?php echo rawurlencode(get_the_title() . ' - ' . get_permalink()); ?>" target="_blank" rel="noopener" class="single-article__share-btn" aria-label="WhatsApp">
                        <svg width="16" height="16" viewBox="0 0 32 32" fill="currentColor"><path d="M16 0C7.2 0 0 7.2 0 16c0 3.5 1.1 6.7 3 9.4L1 31.2l6-2A15.9 15.9 0 0016 32c8.8 0 16-7.2 16-16S24.8 0 16 0zm9.3 22.6c-.4 1.1-2.3 2.1-3.2 2.2-.9.1-1.7.4-5.7-1.2-4.8-1.9-7.8-6.8-8.1-7.1-.2-.3-1.9-2.6-1.9-4.9 0-2.3 1.2-3.5 1.6-3.9.4-.5.9-.6 1.3-.6.3 0 .6 0 .9 0 .3 0 .7-.1 1 .7.3.9 1.1 2.9 1.1 3.1.1.2.2.5 0 .7-.1.3-.2.5-.4.7-.2.2-.4.6-.6.7-.2.2-.4.4-.2.9.2.4 1 1.6 2.1 2.6 1.4 1.3 2.6 1.7 3 1.9.4.2.6.2.8-.1.2-.2.9-1.1 1.2-1.5.2-.4.5-.3.8-.2.3.1 2.2 1 2.6 1.2.4.2.6.3.7.4.1.2.1.9-.3 2z"/></svg>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="single-article__share-btn" aria-label="Facebook">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo rawurlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="single-article__share-btn" aria-label="LinkedIn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>

                <!-- Back link -->
                <div class="single-article__footer">
                    <a href="<?php echo get_post_type_archive_link('informativo'); ?>" class="btn btn-ghost" style="color:var(--blue);border-color:rgba(3,66,142,.15)">
                        &larr; Todos os informativos
                    </a>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="single-sidebar ao ao-d1">
                <!-- CTA Box -->
                <div class="sidebar-cta">
                    <div class="sidebar-cta__ico">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                    </div>
                    <h4>Faça parte da CDL</h4>
                    <p>Junte-se a mais de 2.000 empreendedores e tenha acesso a serviços exclusivos.</p>
                    <a href="/associe-se/" class="btn btn-gold" style="width:100%;justify-content:center;padding:12px 20px;font-size:.82rem">
                        Quero fazer parte
                    </a>
                </div>

                <!-- Últimas notícias -->
                <?php if ($sidebar_posts->have_posts()): ?>
                <div class="sidebar-news">
                    <h4 class="sidebar-news__title">Últimas notícias</h4>
                    <?php while ($sidebar_posts->have_posts()): $sidebar_posts->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="sidebar-news__item">
                        <div class="sidebar-news__thumb">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('thumbnail', ['style' => 'width:100%;height:100%;object-fit:cover']); ?>
                            <?php else: ?>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="opacity:.3"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                            <?php endif; ?>
                        </div>
                        <div class="sidebar-news__body">
                            <span class="sidebar-news__date"><?php echo get_the_date('d/m/Y'); ?></span>
                            <h5><?php echo wp_trim_words(get_the_title(), 10, '...'); ?></h5>
                        </div>
                    </a>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <?php endif; ?>
            </aside>
        </div>
    </div>
</section>

<?php get_footer(); ?>
