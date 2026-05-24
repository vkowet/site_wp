<?php
/* FMS Theme Options PRO - architecture stable par blocs */

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
    register_setting('fms_theme_options_group', 'fms_homepage_options');
    register_setting('fms_theme_options_group', 'fms_identity_options');
    register_setting('fms_theme_options_group', 'fms_footer_options');
    register_setting('fms_theme_options_group', 'fms_pages_options');
    register_setting('fms_theme_options_group', 'fms_world_options');
}
add_action('admin_init', 'fms_register_theme_options');

function fms_get_option_block($name){
    return get_option($name, []);
}

function fms_image_field($field_name, $value){
    $url = $value ? wp_get_attachment_image_url($value,'medium') : '';
    ?>
    <div class="fms-image-field">
        <input type="hidden" class="fms-image-id" name="<?php echo esc_attr($field_name); ?>" value="<?php echo esc_attr($value); ?>">
        <button type="button" class="button fms-upload-image">Choisir une image</button>
        <button type="button" class="button fms-remove-image">Supprimer</button>
        <div class="fms-image-preview"><?php if($url): ?><img src="<?php echo esc_url($url); ?>" style="max-width:150px;height:auto;"><?php endif; ?></div>
    </div>
    <?php
}

function fms_theme_options_page() {
    $tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'homepage';

    $home = fms_get_option_block('fms_homepage_options');
    $identity = fms_get_option_block('fms_identity_options');
    $footer = fms_get_option_block('fms_footer_options');
    $pages = fms_get_option_block('fms_pages_options');
    $world = fms_get_option_block('fms_world_options');
?>
<div class="wrap">
<h1>Options du thème FMS</h1>

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
<input type="hidden" name="option_page" value="fms_theme_options_group">
<h2>Homepage — Hero / Slider / Message / Fondatrice / Chiffres / Vocation</h2>
<table class="form-table">
<tr><th>Titre Hero</th><td><input type="text" name="fms_homepage_options[hero_title]" value="<?php echo esc_attr($home['hero_title'] ?? ''); ?>" class="large-text"></td></tr>
<tr><th>Texte Hero</th><td><textarea name="fms_homepage_options[hero_text]" class="large-text"><?php echo esc_textarea($home['hero_text'] ?? ''); ?></textarea></td></tr>

<?php for($i=1;$i<=4;$i++): ?>
<tr>
<th>Chiffre <?php echo $i; ?></th>
<td><input type="text" name="fms_homepage_options[stat_<?php echo $i; ?>_number]" value="<?php echo esc_attr($home['stat_'.$i.'_number'] ?? ''); ?>"></td>
<th>Libellé <?php echo $i; ?></th>
<td><input type="text" name="fms_homepage_options[stat_<?php echo $i; ?>_label]" value="<?php echo esc_attr($home['stat_'.$i.'_label'] ?? ''); ?>"></td>
</tr>
<?php endfor; ?>

<tr><th>Vocation titre</th><td><input type="text" name="fms_homepage_options[vocation_title]" value="<?php echo esc_attr($home['vocation_title'] ?? ''); ?>" class="large-text"></td></tr>
<tr><th>Vocation texte</th><td><textarea name="fms_homepage_options[vocation_text]" class="large-text"><?php echo esc_textarea($home['vocation_text'] ?? ''); ?></textarea></td></tr>
<tr><th>Vocation bouton</th><td><input type="text" name="fms_homepage_options[vocation_button_text]" value="<?php echo esc_attr($home['vocation_button_text'] ?? ''); ?>"></td></tr>
<tr><th>Vocation lien</th><td><input type="text" name="fms_homepage_options[vocation_button_link]" value="<?php echo esc_attr($home['vocation_button_link'] ?? ''); ?>" class="large-text"></td></tr>
<tr><th>Image vocation</th><td><?php fms_image_field('fms_homepage_options[vocation_bg]', $home['vocation_bg'] ?? ''); ?></td></tr>

<tr><th>Mot Supérieure</th><td><textarea name="fms_homepage_options[message_text]" class="large-text"><?php echo esc_textarea($home['message_text'] ?? ''); ?></textarea></td></tr>
<tr><th>Fondatrice</th><td><textarea name="fms_homepage_options[foundress_text]" class="large-text"><?php echo esc_textarea($home['foundress_text'] ?? ''); ?></textarea></td></tr>
</table>
<?php endif; ?>

<?php if ($tab==='identity'): ?>
<table class="form-table">
<tr><th>Titre</th><td><input type="text" name="fms_identity_options[title]" value="<?php echo esc_attr($identity['title'] ?? ''); ?>" class="large-text"></td></tr>
<tr><th>Slogan</th><td><input type="text" name="fms_identity_options[slogan]" value="<?php echo esc_attr($identity['slogan'] ?? ''); ?>" class="large-text"></td></tr>
<tr><th>Logo mondial</th><td><?php fms_image_field('fms_identity_options[world_logo]', $identity['world_logo'] ?? ''); ?></td></tr>
<tr><th>Logo France</th><td><?php fms_image_field('fms_identity_options[france_logo]', $identity['france_logo'] ?? ''); ?></td></tr>
</table>
<?php endif; ?>

<?php if ($tab==='footer'): ?>
<table class="form-table">
<tr><th>Nom</th><td><input type="text" name="fms_footer_options[name]" value="<?php echo esc_attr($footer['name'] ?? ''); ?>"></td></tr>
<tr><th>Adresse 1</th><td><input type="text" name="fms_footer_options[address1]" value="<?php echo esc_attr($footer['address1'] ?? ''); ?>"></td></tr>
<tr><th>Adresse 2</th><td><input type="text" name="fms_footer_options[address2]" value="<?php echo esc_attr($footer['address2'] ?? ''); ?>"></td></tr>
<tr><th>Ville</th><td><input type="text" name="fms_footer_options[city]" value="<?php echo esc_attr($footer['city'] ?? ''); ?>"></td></tr>
<tr><th>Téléphone</th><td><input type="text" name="fms_footer_options[phone]" value="<?php echo esc_attr($footer['phone'] ?? ''); ?>"></td></tr>
<tr><th>Email</th><td><input type="text" name="fms_footer_options[email]" value="<?php echo esc_attr($footer['email'] ?? ''); ?>"></td></tr>
<tr><th>Texte bas</th><td><textarea name="fms_footer_options[bottom_text]"><?php echo esc_textarea($footer['bottom_text'] ?? ''); ?></textarea></td></tr>
</table>
<?php endif; ?>

<?php if ($tab==='pages'): ?>
<table class="form-table">
<tr><th>Titre</th><td><input type="text" name="fms_pages_options[default_title]" value="<?php echo esc_attr($pages['default_title'] ?? ''); ?>"></td></tr>
<tr><th>Sous-titre</th><td><input type="text" name="fms_pages_options[subtitle]" value="<?php echo esc_attr($pages['subtitle'] ?? ''); ?>"></td></tr>
<tr><th>Image fond</th><td><?php fms_image_field('fms_pages_options[bg]', $pages['bg'] ?? ''); ?></td></tr>
</table>
<?php endif; ?>

<?php if ($tab==='world'): ?>
<table class="form-table">
<tr><th>Titre section</th><td><input type="text" name="fms_world_options[title]" value="<?php echo esc_attr($world['title'] ?? 'Présence dans le monde'); ?>"></td></tr>
<tr><th>Sous-titre</th><td><input type="text" name="fms_world_options[subtitle]" value="<?php echo esc_attr($world['subtitle'] ?? ''); ?>"></td></tr>
<tr><th>Cartes/ligne</th><td><input type="text" name="fms_world_options[cards_per_row]" value="<?php echo esc_attr($world['cards_per_row'] ?? '3'); ?>"></td></tr>
</table>
<?php endif; ?>

<?php submit_button(); ?>
</form>
</div>
<?php } ?>
