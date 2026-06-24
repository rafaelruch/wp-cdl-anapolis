<?php
/**
 * Template Name: Documento Legal
 *
 * Layout genérico pra documentos jurídicos (Termos de Uso, Política de
 * Cookies, etc.). Hero compacto + corpo WYSIWYG renderizado num container
 * de leitura. Tudo administrável via ACF (group_documento_legal).
 *
 * A página /lgpd/ continua usando page-lgpd.php (template específico com
 * cards visuais ou WYSIWYG opcional).
 */
get_header();

$has_acf = function_exists('get_field');

$hero_image    = $has_acf ? get_field('legal_hero_image') : null;
$hero_img_url  = $hero_image ? $hero_image['url'] : 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=1920&q=80';
$hero_tag      = ($has_acf ? get_field('legal_hero_tag')      : '') ?: 'Institucional';
$hero_title    = ($has_acf ? get_field('legal_hero_title')    : '') ?: get_the_title();
$hero_subtitle = ($has_acf ? get_field('legal_hero_subtitle') : '') ?: 'Documento atualizado periodicamente para refletir alterações legais, regulatórias ou operacionais.';

$last_update = ($has_acf ? get_field('legal_last_update') : '') ?: '';
$corpo_html  = $has_acf ? get_field('legal_corpo_html') : '';

$cta_title    = ($has_acf ? get_field('legal_cta_title')    : '') ?: 'Tem dúvidas sobre este documento?';
$cta_subtitle = ($has_acf ? get_field('legal_cta_subtitle') : '') ?: 'Entre em contato com a CDL Anápolis.';
$cta_btn_text = ($has_acf ? get_field('legal_cta_btn_text') : '') ?: 'Fale conosco';
$cta_btn_link = ($has_acf ? get_field('legal_cta_btn_link') : '') ?: '/fale-conosco/';
?>

<!-- Page Hero -->
<section class="page-hero page-hero--compact" style="background-image:url('<?php echo esc_url($hero_img_url); ?>')">
    <div class="page-hero__overlay"></div>
    <div class="wrap page-hero__content" style="text-align:center">
        <div class="sec-tag ao" style="color:var(--gold);background:var(--gold-soft);border-color:rgba(255,180,0,.2)"><?php echo esc_html($hero_tag); ?></div>
        <h1 class="page-hero__title ao ao-d1"><?php echo esc_html($hero_title); ?></h1>
        <p class="page-hero__sub ao ao-d2"><?php echo esc_html($hero_subtitle); ?></p>
        <?php if ($last_update): ?>
        <p class="ao ao-d3" style="margin-top:18px;color:rgba(255,255,255,.78);font-size:.82rem">
            <strong>Última atualização:</strong> <?php echo esc_html($last_update); ?>
        </p>
        <?php endif; ?>
    </div>
</section>

<!-- Documento -->
<section class="sec legal-page">
    <div class="wrap">
        <article class="legal-page__doc ao">
            <?php if ($corpo_html): ?>
                <?php echo wp_kses_post($corpo_html); ?>
            <?php else: ?>
                <p style="text-align:center;color:var(--gray)">O conteúdo deste documento será publicado em breve.</p>
            <?php endif; ?>
        </article>
    </div>
</section>

<!-- CTA Gold -->
<section class="cta-gold">
    <h2 class="ao"><?php echo esc_html($cta_title); ?></h2>
    <p class="ao ao-d1"><?php echo esc_html($cta_subtitle); ?></p>
    <a href="<?php echo esc_url($cta_btn_link); ?>" class="btn btn-dark ao ao-d2">
        <?php echo esc_html($cta_btn_text); ?>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
</section>

<?php get_footer(); ?>
