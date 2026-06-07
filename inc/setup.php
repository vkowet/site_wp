<?php

function fms_theme_setup() {

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('custom-logo');

    add_image_size('fms-news-thumbnail', 720, 480, false);
    add_image_size('fms-single-post-image', 980, 620, false);

    register_nav_menus([
        'top-menu'     => __('Menu supérieur', 'fms-theme'),
        'primary-menu' => __('Menu principal', 'fms-theme'),
        'mobile-menu'  => __('Menu mobile', 'fms-theme'),
    ]);
}

add_action('after_setup_theme', 'fms_theme_setup');

function fms_widgets_init() {
    register_sidebar([
        'name'          => __('Sidebar articles', 'fms-theme'),
        'id'            => 'single-post-sidebar',
        'description'   => __('Blocs affichés dans la colonne latérale des articles.', 'fms-theme'),
        'before_widget' => '<section id="%1$s" class="fms-single-sidebar-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ]);
}

add_action('widgets_init', 'fms_widgets_init');
