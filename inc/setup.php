<?php

function fms_theme_setup() {

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('custom-logo');

    register_nav_menus([
        'top-menu'     => __('Menu supérieur', 'fms-theme'),
        'primary-menu' => __('Menu principal', 'fms-theme'),
        'mobile-menu'  => __('Menu mobile', 'fms-theme'),
    ]);
}

add_action('after_setup_theme', 'fms_theme_setup');