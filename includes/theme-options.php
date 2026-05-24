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

            <?php submit_button(); ?>

        </form>
    </div>
    <?php
}
