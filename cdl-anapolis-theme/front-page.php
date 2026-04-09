<?php
/**
 * Homepage Template
 */

get_header(); ?>

<?php get_template_part('template-parts/home/section', 'hero'); ?>
<?php get_template_part('template-parts/home/section', 'features-band'); ?>
<?php get_template_part('template-parts/home/section', 'marquee'); ?>
<?php get_template_part('template-parts/home/section', 'benefits'); ?>
<?php get_template_part('template-parts/home/section', 'informativo'); ?>
<?php get_template_part('template-parts/home/section', 'showcase'); ?>
<?php get_template_part('template-parts/home/section', 'cta'); ?>
<?php get_template_part('template-parts/home/section', 'services'); ?>
<?php get_template_part('template-parts/home/section', 'steps'); ?>
<?php get_template_part('template-parts/home/section', 'quick-access'); ?>
<?php get_template_part('template-parts/home/section', 'economy'); ?>
<?php get_template_part('template-parts/home/section', 'cta-gold'); ?>

<?php get_footer(); ?>
