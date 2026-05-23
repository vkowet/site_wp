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
    wp_enqueue_style(
        'fms-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );

    wp_enqueue_script(
        'fms-navigation',
        get_template_directory_uri() . '/assets/js/navigation.js',
        [],
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'fms_enqueue_assets');

function fms_customize_register($wp_customize) {
    $wp_customize->add_section('fms_header_identity', [
        'title' => __('Identité du header FMS', 'fms-theme'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('fms_world_logo', [
        'sanitize_callback' => 'absint',
    ]);

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'fms_world_logo', [
        'label' => __('Logo mondial', 'fms-theme'),
        'section' => 'fms_header_identity',
        'mime_type' => 'image',
    ]));

    $wp_customize->add_setting('fms_france_logo', [
        'sanitize_callback' => 'absint',
    ]);

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'fms_france_logo', [
        'label' => __('Logo France', 'fms-theme'),
        'section' => 'fms_header_identity',
        'mime_type' => 'image',
    ]));
}
add_action('customize_register', 'fms_customize_register');

function fms_get_theme_image_url($setting_name) {
    $attachment_id = get_theme_mod($setting_name);

    if (!$attachment_id) {
        return '';
    }

    return wp_get_attachment_image_url($attachment_id, 'full');
}
/**
 * Création automatique des pages et du menu principal FMS
 */

function fms_create_page_if_not_exists($title) {
    $page = get_page_by_title($title);

    if ($page) {
        return $page->ID;
    }

    return wp_insert_post([
        'post_title'   => $title,
        'post_status'  => 'publish',
        'post_type'    => 'page',
    ]);
}

function fms_seed_primary_menu() {

    // Empêche de recréer plusieurs fois
    if (get_option('fms_menu_seeded')) {
        return;
    }

    $structure = [
        'La Congrégation' => [
            'Présentation',
            'Histoire',
            'Charisme',
            'Spiritualité franciscaine'
        ],

        'Gouvernance' => [
            'Mot de la Mère Supérieure',
            'Conseil général',
            'Siège mondial',
            'Documents officiels'
        ],

        'Mission' => [
            'Éducation',
            'Santé',
            'Action sociale',
            'Évangélisation'
        ],

        'Présence mondiale' => [
            'Carte mondiale',
            'Provinces',
            'Maisons',
            'Sites nationaux'
        ],

        'Vocations' => [
            'Appel vocationnel',
            'Témoignages',
            'Rejoindre la congrégation'
        ],

        'Actualités' => [
            'Nouvelles',
            'Événements',
            'Publications',
            'Galerie'
        ],

        'Contact' => []
    ];

    // Cherche le menu existant
    $menu = wp_get_nav_menu_object('Main Menu FMS');

    if (!$menu) {
        $menu_id = wp_create_nav_menu('Main Menu FMS');
    } else {
        $menu_id = $menu->term_id;
    }

    foreach ($structure as $parent => $children) {

        $parent_page_id = fms_create_page_if_not_exists($parent);

        $parent_item_id = wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title'     => $parent,
            'menu-item-object-id' => $parent_page_id,
            'menu-item-object'    => 'page',
            'menu-item-type'      => 'post_type',
            'menu-item-status'    => 'publish'
        ]);

        foreach ($children as $child) {

            $child_page_id = fms_create_page_if_not_exists($child);

            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title'      => $child,
                'menu-item-object-id'  => $child_page_id,
                'menu-item-object'     => 'page',
                'menu-item-type'       => 'post_type',
                'menu-item-parent-id'  => $parent_item_id,
                'menu-item-status'     => 'publish'
            ]);
        }
    }

    // Assigne le menu à l’emplacement principal
    $locations = get_theme_mod('nav_menu_locations');
    $locations['primary-menu'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);

    update_option('fms_menu_seeded', true);
}

add_action('admin_init', 'fms_seed_primary_menu');
