<?php

function fms_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('custom-logo');

    register_nav_menus([
        'top-menu' => __('Menu supérieur', 'fms-theme'),
        'primary-menu' => __('Menu principal', 'fms-theme'),
    ]);
}
add_action('after_setup_theme', 'fms_theme_setup');

function fms_enqueue_assets() {
    wp_enqueue_style('fms-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version'));
    wp_enqueue_style('fms-hero', get_template_directory_uri() . '/assets/css/hero.css', [], wp_get_theme()->get('Version'));

    wp_enqueue_script('fms-navigation', get_template_directory_uri() . '/assets/js/navigation.js', [], wp_get_theme()->get('Version'), true);
    wp_enqueue_script('fms-hero-slider', get_template_directory_uri() . '/assets/js/hero-slider.js', [], wp_get_theme()->get('Version'), true);
    wp_enqueue_style('fms-world', get_template_directory_uri() . '/assets/css/world-presence.css', [], wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'fms_enqueue_assets');

function fms_customize_register($wp_customize) {
    $wp_customize->add_section('fms_header_identity', ['title' => __('Identité du header FMS', 'fms-theme'),'priority' => 30]);
    $wp_customize->add_setting('fms_world_logo', ['sanitize_callback' => 'absint']);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'fms_world_logo', ['label' => __('Logo mondial', 'fms-theme'),'section' => 'fms_header_identity','mime_type' => 'image']));
    $wp_customize->add_setting('fms_france_logo', ['sanitize_callback' => 'absint']);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'fms_france_logo', ['label' => __('Logo France', 'fms-theme'),'section' => 'fms_header_identity','mime_type' => 'image']));
    $wp_customize->add_section('fms_hero_settings', ['title' => __('Hero Settings', 'fms-theme'),'priority' => 35]);
}
add_action('customize_register', 'fms_customize_register');

require get_template_directory() . '/includes/hero-slider-settings.php';
require get_template_directory() . '/includes/world-presence-cpt.php';
require get_template_directory() . '/includes/world-presence-fields.php';

function fms_get_theme_image_url($setting_name) {
    $attachment_id = get_theme_mod($setting_name);
    if (!$attachment_id) return '';
    return wp_get_attachment_image_url($attachment_id, 'full');
}
