<?php
/**
 * Theme Setup
 */

function cdl_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);
    add_theme_support('custom-logo', [
        'height'      => 115,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    register_nav_menus([
        'primary' => 'Menu Principal',
        'footer'  => 'Menu Footer',
    ]);

    // Image sizes
    add_image_size('hero-bg', 1920, 800, true);
    add_image_size('card-thumb', 600, 400, true);
    add_image_size('portrait', 400, 500, true);
    add_image_size('gallery-thumb', 400, 400, true);
    add_image_size('gallery-full', 1200, 900, false);
    add_image_size('post-featured', 1200, 628, true);
    add_image_size('logo-servico', 300, 100, false);
}
add_action('after_setup_theme', 'cdl_theme_setup');
