<?php

function fms_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'fms_theme_setup');

function fms_enqueue_assets() {
    wp_enqueue_style(
        'fms-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'fms_enqueue_assets');