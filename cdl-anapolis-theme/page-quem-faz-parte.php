<?php
/**
 * Template Name: Quem Faz Parte
 * Página de associados com mapa interativo + lista lateral + filtro por categoria
 *
 * Os dados vêm de cdl_get_associados_data() (cacheado via transient — 6h).
 * O JS recebe `cdlAssociados` injetado via wp_add_inline_script no enqueue.
 */
get_header();

$assoc_payload   = cdl_get_associados_data();
$associados_data = $assoc_payload['data'];

// Categorias existentes (cacheadas pelo WP via update_term_cache no helper)
$categorias = get_terms([
    'taxonomy'   => 'categoria_associado',
    'hide_empty' => true,
]);
?>

<!-- Page Hero -->
<section class="page-hero" style="background:linear-gradient(135deg,#03428e 0%,#1a1a2e 100%)">
    <div class="page-hero__overlay" style="background:transparent"></div>
    <div class="wrap page-hero__content" style="text-align:center">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)">Nossos Associados</div>
        <h1 class="page-hero__title ao ao-d1">Quem Faz Parte</h1>
        <p class="page-hero__sub ao ao-d2">Conheça as empresas que fazem o comércio de Anápolis acontecer. Filtre por categoria e encontre no mapa.</p>
    </div>
</section>

<!-- Barra de Busca + Filtros -->
<section class="assoc-filters">
    <div class="wrap assoc-filters__inner">
        <div class="assoc-search">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            <input type="text" id="assocSearch" placeholder="Buscar por nome ou endereço..." autocomplete="off">
        </div>
        <div class="assoc-pills">
            <button class="assoc-pill active" data-cat="all">Todos</button>
            <?php if ($categorias && !is_wp_error($categorias)): ?>
                <?php foreach ($categorias as $cat): ?>
                    <button class="assoc-pill" data-cat="<?php echo esc_attr($cat->slug); ?>"><?php echo esc_html($cat->name); ?></button>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Mapa + Lista -->
<section class="assoc-main">
    <div class="assoc-main__inner">
        <!-- Mapa -->
        <div class="assoc-map" id="assocMap">
            <div class="assoc-map__counter">
                <span id="assocCount"><?php echo count($associados_data); ?></span> associados encontrados
            </div>
        </div>

        <!-- Lista -->
        <div class="assoc-list">
            <div class="assoc-list__header">
                <span>Mostrando <strong id="assocListCount"><?php echo count($associados_data); ?></strong> associados</span>
                <div class="assoc-list__sort">
                    Ordenar: <strong>A-Z</strong>
                </div>
            </div>
            <div class="assoc-list__items" id="assocListItems">
                <?php foreach ($associados_data as $assoc): ?>
                    <div class="assoc-card"
                         data-id="<?php echo esc_attr($assoc['id']); ?>"
                         data-cat="<?php echo esc_attr($assoc['categoria']); ?>"
                         data-nome="<?php echo esc_attr(mb_strtolower($assoc['nome'])); ?>"
                         data-endereco="<?php echo esc_attr(mb_strtolower($assoc['endereco'] . ' ' . $assoc['bairro'])); ?>">
                        <div class="assoc-card__avatar">
                            <span><?php echo esc_html($assoc['inicial']); ?></span>
                        </div>
                        <div class="assoc-card__info">
                            <div class="assoc-card__name"><?php echo esc_html($assoc['nome']); ?></div>
                            <div class="assoc-card__address"><?php echo esc_html($assoc['endereco']); ?><?php if ($assoc['bairro']): ?> — <?php echo esc_html($assoc['bairro']); ?><?php endif; ?></div>
                        </div>
                        <?php if ($assoc['categoria_nome']): ?>
                            <div class="assoc-card__tag"><?php echo esc_html($assoc['categoria_nome']); ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                <div class="assoc-empty" id="assocEmpty" style="display:none">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="opacity:.4"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                    <p>Nenhum associado encontrado com esse filtro.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
