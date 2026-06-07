<?php

function fms_enqueue_assets() {

    $version = wp_get_theme()->get('Version');

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

    wp_enqueue_style(
        'fms-system-pages',
        get_template_directory_uri() . '/assets/css/system-pages.css',
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

        // Load contact page styles
        if (is_page_template('page-contact.php')) {
            wp_enqueue_style(
                'fms-contact',
                get_template_directory_uri() . '/assets/css/contact.css',
                [],
                $version
            );
        }

        // Load vocations page styles
        if (is_page_template('page-vocations.php') || is_page_template('template-vocations.php')) {
            wp_enqueue_style(
                'fms-vocations',
                get_template_directory_uri() . '/assets/css/vocations.css',
                [],
                $version
            );
        }

        // Load donation page assets
        if (is_page('faire-un-don') || is_page_template('page-faire-un-don.php') || is_page_template('template-donation.php')) {
            wp_enqueue_style(
                'fms-donation',
                get_template_directory_uri() . '/assets/css/donation.css',
                [],
                $version
            );

            wp_enqueue_script(
                'fms-donation',
                get_template_directory_uri() . '/assets/js/donation.js',
                [],
                $version,
                true
            );
        }
    }

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