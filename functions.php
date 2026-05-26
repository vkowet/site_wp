<?php

/*
|--------------------------------------------------------------------------
| THEME SETUP
|--------------------------------------------------------------------------
*/

function fms_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('custom-logo');

    register_nav_menus([
        'top-menu'     => __('Menu supérieur', 'fms-theme'),
        'primary-menu' => __('Menu principal', 'fms-theme'),
    ]);
}
add_action('after_setup_theme', 'fms_theme_setup');


/*
|--------------------------------------------------------------------------
| GLOBAL OPTION HELPER (SOURCE UNIQUE)
|--------------------------------------------------------------------------
*/

function fms_get_options() {
    return get_option('fms_theme_options', []);
}

function fms_get_option($section, $field, $default = '') {
    $options = fms_get_options();

    if (
        isset($options[$section]) &&
        is_array($options[$section]) &&
        isset($options[$section][$field])
    ) {
        return $options[$section][$field];
    }

    return $default;
}


/*
|--------------------------------------------------------------------------
| IMAGE HELPER
|--------------------------------------------------------------------------
*/

function fms_get_image_url($attachment_id) {
    if (!$attachment_id) return '';
    return wp_get_attachment_image_url($attachment_id, 'full');
}

function fms_get_theme_image_url($attachment_id) {
    return fms_get_image_url($attachment_id);
}

/*
|--------------------------------------------------------------------------
| FRONT ASSETS
|--------------------------------------------------------------------------
*/

function fms_enqueue_assets() {

    $version = wp_get_theme()->get('Version');

    /* CSS */
    wp_enqueue_style('fms-style', get_stylesheet_uri(), [], $version);

    wp_enqueue_style(
        'fms-hero',
        get_template_directory_uri() . '/assets/css/hero.css',
        [],
        $version
    );

    wp_enqueue_style(
        'fms-world',
        get_template_directory_uri() . '/assets/css/world-presence.css',
        [],
        $version
    );

    wp_enqueue_style(
        'fms-footer',
        get_template_directory_uri() . '/assets/css/footer.css',
        [],
        $version
    );

    wp_enqueue_style(
        'fms-mobile',
        get_template_directory_uri() . '/assets/css/mobile.css',
        [],
        $version
    );

    wp_enqueue_style(
        'fms-stats',
        get_template_directory_uri() . '/assets/css/stats.css',
        [],
        $version
    );

    wp_enqueue_style(
        'fms-news',
        get_template_directory_uri() . '/assets/css/news.css',
        [],
        $version
    );

    wp_enqueue_style(
        'fms-vocation',
        get_template_directory_uri() . '/assets/css/vocation.css',
        [],
        $version
    );

    if (is_page()) {
        wp_enqueue_style(
            'fms-page',
            get_template_directory_uri() . '/assets/css/page.css',
            [],
            $version
        );
    }

    /* JS */
    wp_enqueue_script(
        'fms-navigation',
        get_template_directory_uri() . '/assets/js/navigation.js',
        [],
        $version,
        true
    );

    wp_enqueue_script(
        'fms-hero-slider',
        get_template_directory_uri() . '/assets/js/hero-slider.js',
        [],
        $version,
        true
    );

    wp_enqueue_script(
        'fms-mobile-menu',
        get_template_directory_uri() . '/assets/js/mobile-menu.js',
        [],
        $version,
        true
    );

    wp_enqueue_script(
        'fms-mobile',
        get_template_directory_uri() . '/assets/js/mobile.js',
        [],
        $version,
        true
    );

    wp_enqueue_script(
        'fms-stats',
        get_template_directory_uri() . '/assets/js/stats.js',
        [],
        $version,
        true
    );
}
add_action('wp_enqueue_scripts', 'fms_enqueue_assets');


/*
|--------------------------------------------------------------------------
| ADMIN MEDIA (WORDPRESS MEDIA UPLOADER)
|--------------------------------------------------------------------------
*/

function fms_admin_media_assets($hook) {

    if (
        $hook === 'toplevel_page_fms-theme-options' ||
        $hook === 'post.php' ||
        $hook === 'post-new.php'
    ) {
        wp_enqueue_media();

        wp_enqueue_script(
            'fms-admin-media',
            get_template_directory_uri() . '/assets/js/admin-media.js',
            ['jquery'],
            null,
            true
        );
    }
}
add_action('admin_enqueue_scripts', 'fms_admin_media_assets');

/* AUTO CREATE SYSTEM PAGES */
function fms_create_default_pages() {

    if (get_option('fms_default_pages_created')) return;

    $pages = [

        [
            'title' => 'Mentions légales',
            'slug' => 'mentions-legales',
            'content' => 'La congrégation des Sœurs Franciscaines Servantes de Marie – Généralat, dont le siège mondial est situé à Blois, édite le présent site internet.

Éditeur : Sœurs Franciscaines Servantes de Marie
Généralat
15 rue Monin
41000 BLOIS – France

L’ensemble des contenus du site est protégé par le droit d’auteur. Toute reproduction sans autorisation est interdite.'
        ],

        [
            'title' => 'Politique de confidentialité',
            'slug' => 'politique-de-confidentialite',
            'content' => 'Les Sœurs Franciscaines Servantes de Marie attachent une grande importance à la protection des données personnelles.

Les données collectées via ce site servent uniquement à répondre aux demandes, assurer la sécurité et améliorer le service.'
        ],

        [
            'title' => 'Plan du site',
            'slug' => 'plan-du-site',
            'content' => 'Accueil
Mot de la Mère Supérieure Générale
Histoire de la Fondatrice
Présence dans le monde
Actualités & Missions
Vocations
Contact
Mentions légales
Politique de confidentialité'
        ],

        [
            'title' => 'Faire un don',
            'slug' => 'faire-un-don',
            'content' => 'Votre soutien permet à la congrégation des Sœurs Franciscaines Servantes de Marie de poursuivre ses missions d’éducation, de formation et de solidarité.

Merci pour votre soutien.'
        ]

    ];

    foreach ($pages as $page) {

        if (!get_page_by_path($page['slug'])) {

            wp_insert_post([
                'post_title'   => $page['title'],
                'post_name'    => $page['slug'],
                'post_content' => $page['content'],
                'post_status'  => 'publish',
                'post_type'    => 'page'
            ]);
        }
    }

    update_option('fms_default_pages_created', 1);
}
add_action('init', 'fms_create_default_pages');

/*
|--------------------------------------------------------------------------
| LOAD MODULES
|--------------------------------------------------------------------------
*/

require get_template_directory() . '/includes/theme-options.php';
require get_template_directory() . '/includes/hero-slider-settings.php';
require get_template_directory() . '/includes/world-presence-cpt.php';
require get_template_directory() . '/includes/world-presence-fields.php';
