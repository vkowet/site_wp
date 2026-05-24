<?php
/*
 * FMS Centre de Pilotage PRO
 * Stockage unique en base : wp_options > fms_theme_options
 */

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
    register_setting('fms_theme_options_group', 'fms_theme_options');
}
add_action('admin_init', 'fms_register_theme_options');

function fms_get_theme_options() {
    return get_option('fms_theme_options', []);
}

function fms_opt($section, $field, $default = '') {
    $options = fms_get_theme_options();
    return $options[$section][$field] ?? $default;
}

function fms_image_field($name, $value){
    $url = $value ? wp_get_attachment_image_url($value,'medium') : '';
    ?>
    <div class="fms-image-field">
        <input type="hidden" class="fms-image-id" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>">
        <button type="button" class="button fms-upload-image">Choisir une image</button>
        <button type="button" class="button fms-remove-image">Supprimer</button>
        <div class="fms-image-preview">
            <?php if($url): ?><img src="<?php echo esc_url($url); ?>" style="max-width:150px;height:auto;"><?php endif; ?>
        </div>
    </div>
    <?php
}

function fms_theme_options_page() {
    $tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'homepage';
?>
<div class="wrap">
    <h1>Centre de pilotage FMS</h1>

    <h2 class="nav-tab-wrapper">
        <a href="?page=fms-theme-options&tab=homepage" class="nav-tab <?php echo $tab==='homepage'?'nav-tab-active':''; ?>">Homepage</a>
        <a href="?page=fms-theme-options&tab=identity" class="nav-tab <?php echo $tab==='identity'?'nav-tab-active':''; ?>">Identité</a>
        <a href="?page=fms-theme-options&tab=footer" class="nav-tab <?php echo $tab==='footer'?'nav-tab-active':''; ?>">Footer</a>
        <a href="?page=fms-theme-options&tab=pages" class="nav-tab <?php echo $tab==='pages'?'nav-tab-active':''; ?>">Pages internes</a>
        <a href="?page=fms-theme-options&tab=world" class="nav-tab <?php echo $tab==='world'?'nav-tab-active':''; ?>">Réseau mondial</a>
    </h2>

    <form method="post" action="options.php">
        <?php settings_fields('fms_theme_options_group'); ?>

        <?php if ($tab==='homepage'): ?>
            <h2>Homepage</h2>
            <table class="form-table">
                <tr><th>Titre Hero</th><td><input type="text" name="fms_theme_options[homepage][hero_title]" value="<?php echo esc_attr(fms_opt('homepage','hero_title')); ?>" class="large-text"></td></tr>
                <tr><th>Texte Hero</th><td><textarea name="fms_theme_options[homepage][hero_text]" class="large-text"><?php echo esc_textarea(fms_opt('homepage','hero_text')); ?></textarea></td></tr>

                <?php for($i=1;$i<=4;$i++): ?>
                <tr>
                    <th>Chiffre <?php echo $i; ?></th>
                    <td><input type="text" name="fms_theme_options[homepage][stat_<?php echo $i; ?>_number]" value="<?php echo esc_attr(fms_opt('homepage','stat_'.$i.'_number')); ?>"></td>
                    <th>Libellé <?php echo $i; ?></th>
                    <td><input type="text" name="fms_theme_options[homepage][stat_<?php echo $i; ?>_label]" value="<?php echo esc_attr(fms_opt('homepage','stat_'.$i.'_label')); ?>"></td>
                </tr>
                <?php endfor; ?>

                <tr><th>Vocation titre</th><td><input type="text" name="fms_theme_options[homepage][vocation_title]" value="<?php echo esc_attr(fms_opt('homepage','vocation_title')); ?>" class="large-text"></td></tr>
                <tr><th>Vocation texte</th><td><textarea name="fms_theme_options[homepage][vocation_text]" class="large-text"><?php echo esc_textarea(fms_opt('homepage','vocation_text')); ?></textarea></td></tr>
                <tr><th>Bouton</th><td><input type="text" name="fms_theme_options[homepage][vocation_button_text]" value="<?php echo esc_attr(fms_opt('homepage','vocation_button_text')); ?>"></td></tr>
                <tr><th>Lien bouton</th><td><input type="text" name="fms_theme_options[homepage][vocation_button_link]" value="<?php echo esc_attr(fms_opt('homepage','vocation_button_link')); ?>" class="large-text"></td></tr>
                <tr><th>Image vocation</th><td><?php fms_image_field('fms_theme_options[homepage][vocation_bg]', fms_opt('homepage','vocation_bg')); ?></td></tr>

                <tr><th>Mot Supérieure</th><td><textarea name="fms_theme_options[homepage][message_text]" class="large-text"><?php echo esc_textarea(fms_opt('homepage','message_text')); ?></textarea></td></tr>
                <tr><th>Texte Fondatrice</th><td><textarea name="fms_theme_options[homepage][foundress_text]" class="large-text"><?php echo esc_textarea(fms_opt('homepage','foundress_text')); ?></textarea></td></tr>
            </table>
        <?php endif; ?>

        <?php if ($tab==='identity'): ?>
            <h2>Identité</h2>
            <table class="form-table">
                <tr><th>Titre</th><td><input type="text" name="fms_theme_options[identity][title]" value="<?php echo esc_attr(fms_opt('identity','title')); ?>" class="large-text"></td></tr>
                <tr><th>Slogan</th><td><input type="text" name="fms_theme_options[identity][slogan]" value="<?php echo esc_attr(fms_opt('identity','slogan')); ?>" class="large-text"></td></tr>
                <tr><th>Logo mondial</th><td><?php fms_image_field('fms_theme_options[identity][world_logo]', fms_opt('identity','world_logo')); ?></td></tr>
                <tr><th>Logo France</th><td><?php fms_image_field('fms_theme_options[identity][france_logo]', fms_opt('identity','france_logo')); ?></td></tr>
            </table>
        <?php endif; ?>

        <?php if ($tab==='footer'): ?>
            <h2>Footer</h2>
            <table class="form-table">
                <tr><th>Nom</th><td><input type="text" name="fms_theme_options[footer][name]" value="<?php echo esc_attr(fms_opt('footer','name')); ?>"></td></tr>
                <tr><th>Adresse 1</th><td><input type="text" name="fms_theme_options[footer][address1]" value="<?php echo esc_attr(fms_opt('footer','address1')); ?>"></td></tr>
                <tr><th>Adresse 2</th><td><input type="text" name="fms_theme_options[footer][address2]" value="<?php echo esc_attr(fms_opt('footer','address2')); ?>"></td></tr>
                <tr><th>Ville</th><td><input type="text" name="fms_theme_options[footer][city]" value="<?php echo esc_attr(fms_opt('footer','city')); ?>"></td></tr>
                <tr><th>Téléphone</th><td><input type="text" name="fms_theme_options[footer][phone]" value="<?php echo esc_attr(fms_opt('footer','phone')); ?>"></td></tr>
                <tr><th>Email</th><td><input type="text" name="fms_theme_options[footer][email]" value="<?php echo esc_attr(fms_opt('footer','email')); ?>"></td></tr>
                <tr><th>Texte bas</th><td><textarea name="fms_theme_options[footer][bottom_text]"><?php echo esc_textarea(fms_opt('footer','bottom_text')); ?></textarea></td></tr>
            </table>
        <?php endif; ?>

        <?php if ($tab==='pages'): ?>
            <h2>Pages internes</h2>
            <table class="form-table">
                <tr><th>Titre</th><td><input type="text" name="fms_theme_options[pages][default_title]" value="<?php echo esc_attr(fms_opt('pages','default_title')); ?>"></td></tr>
                <tr><th>Sous-titre</th><td><input type="text" name="fms_theme_options[pages][subtitle]" value="<?php echo esc_attr(fms_opt('pages','subtitle')); ?>"></td></tr>
                <tr><th>Image fond</th><td><?php fms_image_field('fms_theme_options[pages][bg]', fms_opt('pages','bg')); ?></td></tr>
            </table>
        <?php endif; ?>

        <?php if ($tab==='world'): ?>
            <h2>Réseau mondial</h2>
            <table class="form-table">
                <tr><th>Titre</th><td><input type="text" name="fms_theme_options[world][title]" value="<?php echo esc_attr(fms_opt('world','title','Présence dans le monde')); ?>"></td></tr>
                <tr><th>Sous-titre</th><td><input type="text" name="fms_theme_options[world][subtitle]" value="<?php echo esc_attr(fms_opt('world','subtitle')); ?>"></td></tr>
                <tr><th>Cartes/ligne</th><td><input type="text" name="fms_theme_options[world][cards_per_row]" value="<?php echo esc_attr(fms_opt('world','cards_per_row','3')); ?>"></td></tr>
            </table>
        <?php endif; ?>

        <?php submit_button(); ?>
    </form>
</div>
<?php } ?>
