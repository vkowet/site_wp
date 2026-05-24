<?php

function fms_add_theme_options_menu() {
    add_menu_page(
        'Options du thème FMS',
        'Options FMS',
        'manage_options',
        'fms-theme-options',
        'fms_theme_options_page',
        'dashicons-admin-generic',
        61
    );
}
add_action('admin_menu', 'fms_add_theme_options_menu');

function fms_register_theme_options() {

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
    wp_enqueue_style('fms-world', get_template_directory_uri() . '/assets/css/world-presence.css', [], wp_get_theme()->get('Version'));
    wp_enqueue_style('fms-footer', get_template_directory_uri() . '/assets/css/footer.css', [], wp_get_theme()->get('Version'));

    wp_enqueue_script('fms-navigation', get_template_directory_uri() . '/assets/js/navigation.js', [], wp_get_theme()->get('Version'), true);
    wp_enqueue_script('fms-hero-slider', get_template_directory_uri() . '/assets/js/hero-slider.js', [], wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'fms_enqueue_assets');

function fms_customize_register($wp_customize) {
    $wp_customize->add_section('fms_header_identity', ['title' => __('Identité du header FMS', 'fms-theme'),'priority' => 30]);
    $wp_customize->add_setting('fms_world_logo', ['sanitize_callback' => 'absint']);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'fms_world_logo', ['label' => __('Logo mondial', 'fms-theme'),'section' => 'fms_header_identity','mime_type' => 'image']));
    $wp_customize->add_setting('fms_france_logo', ['sanitize_callback' => 'absint']);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'fms_france_logo', ['label' => __('Logo France', 'fms-theme'),'section' => 'fms_header_identity','mime_type' => 'image']));

    $wp_customize->add_section('fms_stats_section', ['title' => __('Chiffres clés', 'fms-theme'),'priority' => 40]);

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting('fms_stat_'.$i.'_number', ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control('fms_stat_'.$i.'_number', ['label' => 'Chiffre '.$i, 'section' => 'fms_stats_section', 'type' => 'text']);

        $wp_customize->add_setting('fms_stat_'.$i.'_label', ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control('fms_stat_'.$i.'_label', ['label' => 'Texte '.$i, 'section' => 'fms_stats_section', 'type' => 'text']);
    }

    $wp_customize->add_section('fms_hero_settings', ['title' => __('Hero Settings', 'fms-theme'),'priority' => 35]);
}
add_action('customize_register', 'fms_customize_register');

require get_template_directory() . '/includes/hero-slider-settings.php';
require get_template_directory() . '/includes/world-presence-cpt.php';
require get_template_directory() . '/includes/world-presence-fields.php';
require get_template_directory() . '/includes/theme-options.php';

function fms_get_theme_image_url($setting_name) {
    $attachment_id = get_theme_mod($setting_name);
    if (!$attachment_id) return '';
    return wp_get_attachment_image_url($attachment_id, 'full');
}

function fms_enqueue_mobile_menu_script() {
    wp_enqueue_script('fms-mobile-menu', get_template_directory_uri() . '/assets/js/mobile-menu.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'fms_enqueue_mobile_menu_script');

function fms_enqueue_mobile_assets() {
    wp_enqueue_style('fms-mobile', get_template_directory_uri() . '/assets/css/mobile.css', array(), null);
    wp_enqueue_script('fms-mobile', get_template_directory_uri() . '/assets/js/mobile.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'fms_enqueue_mobile_assets');

function fms_enqueue_stats_assets() {
    wp_enqueue_style('fms-stats', get_template_directory_uri() . '/assets/css/stats.css', array(), null);
    wp_enqueue_script('fms-stats', get_template_directory_uri() . '/assets/js/stats.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'fms_enqueue_stats_assets');

function fms_enqueue_news_assets() {
    wp_enqueue_style('fms-news', get_template_directory_uri() . '/assets/css/news.css', array(), null);
}
add_action('wp_enqueue_scripts', 'fms_enqueue_news_assets');

function fms_enqueue_vocation_assets() {
    wp_enqueue_style('fms-vocation', get_template_directory_uri() . '/assets/css/vocation.css', array(), null);
}
add_action('wp_enqueue_scripts', 'fms_enqueue_vocation_assets');

function fms_enqueue_page_assets() {
    if (is_page()) {
        wp_enqueue_style('fms-page', get_template_directory_uri() . '/assets/css/page.css', array(), null);
    }
}
add_action('wp_enqueue_scripts', 'fms_enqueue_page_assets');

    /* VOCATION */
    register_setting('fms_theme_options_group', 'fms_vocation_title');
    register_setting('fms_theme_options_group', 'fms_vocation_text');
    register_setting('fms_theme_options_group', 'fms_vocation_button_text');
    register_setting('fms_theme_options_group', 'fms_vocation_button_link');
    register_setting('fms_theme_options_group', 'fms_vocation_bg');

    /* FOOTER */
    register_setting('fms_theme_options_group', 'fms_footer_name');
    register_setting('fms_theme_options_group', 'fms_footer_address1');
    register_setting('fms_theme_options_group', 'fms_footer_address2');
    register_setting('fms_theme_options_group', 'fms_footer_city');
    register_setting('fms_theme_options_group', 'fms_footer_phone');
    register_setting('fms_theme_options_group', 'fms_footer_email');
    register_setting('fms_theme_options_group', 'fms_footer_facebook');
    register_setting('fms_theme_options_group', 'fms_footer_youtube');
    register_setting('fms_theme_options_group', 'fms_footer_instagram');
    register_setting('fms_theme_options_group', 'fms_footer_world_link');
    register_setting('fms_theme_options_group', 'fms_footer_copyright');
    register_setting('fms_theme_options_group', 'fms_footer_bottom_text');
}
add_action('admin_init', 'fms_register_theme_options');

function fms_theme_options_page() {
    ?>
    <div class="wrap">
        <h1>Options du thème FMS</h1>

        <h2 class="nav-tab-wrapper">
            <a href="#" class="nav-tab nav-tab-active">Homepage</a>
            <a href="#" class="nav-tab">Identité</a>
            <a href="#" class="nav-tab">Footer</a>
            <a href="#" class="nav-tab">Pages internes</a>
            <a href="#" class="nav-tab">Réseau mondial</a>
        </h2>

        <form method="post" action="options.php">

            <?php settings_fields('fms_theme_options_group'); ?>
            <?php do_settings_sections('fms_theme_options_group'); ?>

            <!-- VOCATION -->
            <div style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;">
                <h2>Homepage — Bloc vocation</h2>

                <table class="form-table">

                    <tr>
                        <th>Titre</th>
                        <td>
                            <input type="text" name="fms_vocation_title"
                                   value="<?php echo esc_attr(get_option('fms_vocation_title', 'RÉPONDRE À L’APPEL DU SERVICE')); ?>"
                                   class="regular-text">
                        </td>
                    </tr>

                    <tr>
                        <th>Texte</th>
                        <td>
                            <textarea name="fms_vocation_text" rows="5" class="large-text"><?php echo esc_textarea(get_option('fms_vocation_text', 'La vocation franciscaine est un chemin de foi, de service et d’éducation, au service des plus fragiles et de la mission dans le monde.')); ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <th>Texte bouton</th>
                        <td>
                            <input type="text" name="fms_vocation_button_text"
                                   value="<?php echo esc_attr(get_option('fms_vocation_button_text', 'Découvrir les vocations')); ?>"
                                   class="regular-text">
                        </td>
                    </tr>

                    <tr>
                        <th>Lien bouton</th>
                        <td>
                            <input type="text" name="fms_vocation_button_link"
                                   value="<?php echo esc_attr(get_option('fms_vocation_button_link', home_url('/vocations'))); ?>"
                                   class="regular-text">
                        </td>
                    </tr>

                    <tr>
                        <th>Image de fond (URL)</th>
                        <td>
                            <input type="text" name="fms_vocation_bg"
                                   value="<?php echo esc_attr(get_option('fms_vocation_bg', '/wp-content/uploads/2025/05/vocation-bg.jpg')); ?>"
                                   class="large-text">
                        </td>
                    </tr>

                </table>
            </div>

            <!-- FOOTER -->
            <div style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;">
                <h2>Footer — Coordonnées</h2>

                <table class="form-table">

                    <tr><th>Nom institution</th><td><input type="text" name="fms_footer_name" value="<?php echo esc_attr(get_option('fms_footer_name', 'Sœurs Franciscaines Servantes de Marie')); ?>" class="large-text"></td></tr>
                    <tr><th>Adresse ligne 1</th><td><input type="text" name="fms_footer_address1" value="<?php echo esc_attr(get_option('fms_footer_address1', 'Généralat')); ?>" class="large-text"></td></tr>
                    <tr><th>Adresse ligne 2</th><td><input type="text" name="fms_footer_address2" value="<?php echo esc_attr(get_option('fms_footer_address2', '15 rue Monin')); ?>" class="large-text"></td></tr>
                    <tr><th>Ville</th><td><input type="text" name="fms_footer_city" value="<?php echo esc_attr(get_option('fms_footer_city', '41000 BLOIS')); ?>" class="large-text"></td></tr>

                    <tr><th>Téléphone</th><td><input type="text" name="fms_footer_phone" value="<?php echo esc_attr(get_option('fms_footer_phone', '')); ?>" class="regular-text"></td></tr>
                    <tr><th>Email</th><td><input type="text" name="fms_footer_email" value="<?php echo esc_attr(get_option('fms_footer_email', '')); ?>" class="regular-text"></td></tr>

                    <tr><th>Facebook</th><td><input type="text" name="fms_footer_facebook" value="<?php echo esc_attr(get_option('fms_footer_facebook', '')); ?>" class="large-text"></td></tr>
                    <tr><th>YouTube</th><td><input type="text" name="fms_footer_youtube" value="<?php echo esc_attr(get_option('fms_footer_youtube', '')); ?>" class="large-text"></td></tr>
                    <tr><th>Instagram</th><td><input type="text" name="fms_footer_instagram" value="<?php echo esc_attr(get_option('fms_footer_instagram', '')); ?>" class="large-text"></td></tr>
                    <tr><th>Site réseau mondial</th><td><input type="text" name="fms_footer_world_link" value="<?php echo esc_attr(get_option('fms_footer_world_link', '')); ?>" class="large-text"></td></tr>

                    <tr><th>Copyright</th><td><input type="text" name="fms_footer_copyright" value="<?php echo esc_attr(get_option('fms_footer_copyright', '© Franciscaines Servantes de Marie')); ?>" class="large-text"></td></tr>

                    <tr>
                        <th>Texte bas footer</th>
                        <td>
                            <textarea name="fms_footer_bottom_text" rows="3" class="large-text"><?php echo esc_textarea(get_option('fms_footer_bottom_text', 'Au service de la mission dans le monde')); ?></textarea>
                        </td>
                    </tr>

                </table>
            </div>
<!-- HEADER IDENTITÉ -->
<div style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;">
    <h2>Identité — Header</h2>

    <table class="form-table">

        <tr>
            <th>Titre institution</th>
            <td>
                <input type="text" name="fms_header_title"
                       value="<?php echo esc_attr(get_option('fms_header_title', 'Franciscaines Servantes de Marie')); ?>"
                       class="large-text">
            </td>
        </tr>

        <tr>
            <th>Slogan</th>
            <td>
                <input type="text" name="fms_header_slogan"
                       value="<?php echo esc_attr(get_option('fms_header_slogan', 'Servir - Apprendre et Éduquer')); ?>"
                       class="large-text">
            </td>
        </tr>

        <tr>
            <th>Logo mondial (URL)</th>
            <td>
                <input type="text" name="fms_header_world_logo"
                       value="<?php echo esc_attr(get_option('fms_header_world_logo', '')); ?>"
                       class="large-text">
            </td>
        </tr>

        <tr>
            <th>Logo France (URL)</th>
            <td>
                <input type="text" name="fms_header_france_logo"
                       value="<?php echo esc_attr(get_option('fms_header_france_logo', '')); ?>"
                       class="large-text">
            </td>
        </tr>

    </table>
</div>
            <?php submit_button(); ?>

        </form>
    </div>
    <?php
}
