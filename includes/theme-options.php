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

    /* HEADER IDENTITÉ */
    register_setting('fms_theme_options_group', 'fms_header_title');
    register_setting('fms_theme_options_group', 'fms_header_slogan');
    register_setting('fms_theme_options_group', 'fms_header_world_logo');
    register_setting('fms_theme_options_group', 'fms_header_france_logo');

    /* VOCATION */
    register_setting('fms_theme_options_group', 'fms_vocation_title');
    register_setting('fms_theme_options_group', 'fms_vocation_text');
    register_setting('fms_theme_options_group', 'fms_vocation_button_text');
    register_setting('fms_theme_options_group', 'fms_vocation_button_link');
    register_setting('fms_theme_options_group', 'fms_vocation_bg');

/* CHIFFRES CLÉS */
register_setting('fms_theme_options_group', 'fms_stat_1_number');
register_setting('fms_theme_options_group', 'fms_stat_1_label');

register_setting('fms_theme_options_group', 'fms_stat_2_number');
register_setting('fms_theme_options_group', 'fms_stat_2_label');

register_setting('fms_theme_options_group', 'fms_stat_3_number');
register_setting('fms_theme_options_group', 'fms_stat_3_label');

register_setting('fms_theme_options_group', 'fms_stat_4_number');
register_setting('fms_theme_options_group', 'fms_stat_4_label');
    
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

    <form method="post" action="options.php">

        <?php settings_fields('fms_theme_options_group'); ?>

        <!-- HEADER -->
        <div style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;">
            <h2>Identité — Header</h2>
            <table class="form-table">

                <tr>
                    <th>Titre institution</th>
                    <td><input type="text" name="fms_header_title"
                        value="<?php echo esc_attr(get_option('fms_header_title', 'Franciscaines Servantes de Marie')); ?>"
                        class="large-text"></td>
                </tr>

                <tr>
                    <th>Slogan</th>
                    <td><input type="text" name="fms_header_slogan"
                        value="<?php echo esc_attr(get_option('fms_header_slogan', 'Servir - Apprendre et Éduquer')); ?>"
                        class="large-text"></td>
                </tr>

                <tr>
                    <th>Logo mondial (URL)</th>
                    <td><input type="text" name="fms_header_world_logo"
                        value="<?php echo esc_attr(get_option('fms_header_world_logo', '')); ?>"
                        class="large-text"></td>
                </tr>

                <tr>
                    <th>Logo France (URL)</th>
                    <td><input type="text" name="fms_header_france_logo"
                        value="<?php echo esc_attr(get_option('fms_header_france_logo', '')); ?>"
                        class="large-text"></td>
                </tr>

            </table>
        </div>

        <!-- VOCATION -->
        <div style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;">
            <h2>Homepage — Bloc vocation</h2>
            <table class="form-table">

                <tr>
                    <th>Titre</th>
                    <td><input type="text" name="fms_vocation_title"
                        value="<?php echo esc_attr(get_option('fms_vocation_title', 'RÉPONDRE À L’APPEL DU SERVICE')); ?>"
                        class="regular-text"></td>
                </tr>

                <tr>
                    <th>Texte</th>
                    <td><textarea name="fms_vocation_text" rows="5" class="large-text"><?php echo esc_textarea(get_option('fms_vocation_text', '')); ?></textarea></td>
                </tr>

                <tr>
                    <th>Texte bouton</th>
                    <td><input type="text" name="fms_vocation_button_text"
                        value="<?php echo esc_attr(get_option('fms_vocation_button_text', 'Découvrir les vocations')); ?>"
                        class="regular-text"></td>
                </tr>

                <tr>
                    <th>Lien bouton</th>
                    <td><input type="text" name="fms_vocation_button_link"
                        value="<?php echo esc_attr(get_option('fms_vocation_button_link', home_url('/vocations'))); ?>"
                        class="regular-text"></td>
                </tr>

                <tr>
                    <th>Image de fond (URL)</th>
                    <td><input type="text" name="fms_vocation_bg"
                        value="<?php echo esc_attr(get_option('fms_vocation_bg', '/wp-content/uploads/2025/05/vocation-bg.jpg')); ?>"
                        class="large-text"></td>
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
                    <td><textarea name="fms_footer_bottom_text" rows="3" class="large-text"><?php echo esc_textarea(get_option('fms_footer_bottom_text', 'Au service de la mission dans le monde')); ?></textarea></td>
                </tr>

            </table>
        </div>

        <?php submit_button(); ?>

    </form>
</div>
<?php
}
