<?php
/**
 * Archive Template: Informativo CDL
 * Layout: Breadcrumb + Grid with sidebar
 */
get_header();

$sidebar_posts = new WP_Query([
    'post_type'              => 'informativo',
    'posts_per_page'         => 5,
    'orderby'                => 'date',
    'order'                  => 'DESC',
    'no_found_rows'          => true,
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
    'ignore_sticky_posts'    => true,
]);
?>

<!-- Page Hero -->
<section class="page-hero" style="background-image:url('https://images.unsplash.com/photo-1504711434969-e33886168d6c?w=1920&q=80')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)">Eventos e Notícias</div>
        <h1 class="page-hero__title ao ao-d1">Informativos CDL</h1>
        <p class="page-hero__sub ao ao-d2">Fique por dentro de tudo que acontece no comércio de Anápolis e na nossa comunidade.</p>
    </div>
</section>

<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="wrap">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="<?php echo home_url(); ?>">Início</a>
            <span class="breadcrumb__sep">/</span>
            <span class="breadcrumb__current">Informativos</span>
        </nav>
    </div>
</div>

<!-- Grid + Sidebar -->
<section class="sec single-layout">
    <div class="wrap">
        <div class="archive-grid">
            <!-- Main Content -->
            <div class="archive-main">
                <?php if (have_posts()): ?>
                <div class="info-grid info-grid--2col">
                    <?php $i = 0; while (have_posts()): the_post();
                        $delay_class = ($i % 2 > 0) ? ' ao-d1' : '';
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
                    <?php $i++; endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="archive-pagination ao">
                    <?php
                    echo paginate_links([
                        'prev_text' => '&larr; Anterior',
                        'next_text' => 'Próximo &rarr;',
                        'mid_size'  => 2,
                    ]);
                    ?>
                </div>

                <?php else: ?>
                <div style="text-align:center;padding:80px 0">
                    <h2 class="sec-title">Nenhum informativo encontrado</h2>
                    <p class="sec-desc" style="margin:16px auto">Em breve publicaremos novidades da CDL Anápolis.</p>
                    <a href="<?php echo home_url(); ?>" class="btn btn-gold" style="margin-top:24px">Voltar para a home</a>
                </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <aside class="single-sidebar">
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
                    <h4 class="sidebar-news__title">Mais lidas</h4>
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
