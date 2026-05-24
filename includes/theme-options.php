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

    /* VOCATION */
    register_setting('fms_theme_options_group', 'fms_vocation_title');
    register_setting('fms_theme_options_group', 'fms_vocation_text');
    register_setting('fms_theme_options_group', 'fms_vocation_button_text');
    register_setting('fms_theme_options_group', 'fms_vocation_button_link');
    register_setting('fms_theme_options_group', 'fms_vocation_bg');

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
                            <p>Colle l’URL complète de l’image</p>
                        </td>
                    </tr>

                </table>
            </div>

            <?php submit_button(); ?>

        </form>
    </div>
    <?php
}
