<?php

function fms_add_theme_options_menu() {
    add_menu_page('Options du thème FMS','Options FMS','manage_options','fms-theme-options','fms_theme_options_page','dashicons-admin-generic',61);
}
add_action('admin_menu', 'fms_add_theme_options_menu');

function fms_register_theme_options() {
    register_setting('fms_theme_options_group', 'fms_theme_options');
}
add_action('admin_init', 'fms_register_theme_options');

function fms_image_field($name, $value){
    $url = $value ? wp_get_attachment_image_url($value,'medium') : '';
    ?>
    <div class="fms-image-field">
        <input type="hidden" class="fms-image-id" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>">
        <button type="button" class="button fms-upload-image">Choisir une image</button>
        <button type="button" class="button fms-remove-image">Supprimer</button>
        <div class="fms-image-preview"><?php if($url): ?><img src="<?php echo esc_url($url); ?>" style="max-width:150px;height:auto;"><?php endif; ?></div>
    </div>
    <?php
}

function fms_theme_options_page() {
$tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'homepage'; ?>

<div class="wrap">
<h1>Centre de pilotage FMS</h1>

<h2 class="nav-tab-wrapper">
<a href="?page=fms-theme-options&tab=homepage" class="nav-tab <?php echo $tab==='homepage' ? 'nav-tab-active' : ''; ?>">Homepage</a>
<a href="?page=fms-theme-options&tab=identity" class="nav-tab <?php echo $tab==='identity' ? 'nav-tab-active' : ''; ?>">Identité</a>
<a href="?page=fms-theme-options&tab=footer" class="nav-tab <?php echo $tab==='footer' ? 'nav-tab-active' : ''; ?>">Footer</a>
<a href="?page=fms-theme-options&tab=pages" class="nav-tab <?php echo $tab==='pages' ? 'nav-tab-active' : ''; ?>">Pages internes</a>
<a href="?page=fms-theme-options&tab=world" class="nav-tab <?php echo $tab==='world' ? 'nav-tab-active' : ''; ?>">Réseau mondial</a>
</h2>

<form method="post" action="options.php">
<?php settings_fields('fms_theme_options_group'); ?>

<?php if($tab==='homepage'): ?>
<div class="fms-tab-panel active" style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;">
<h2>Homepage</h2>
<table class="form-table">

<tr><th>Titre section monde</th><td><input type="text" name="fms_theme_options[homepage][world_title]" value="<?php echo esc_attr(fms_get_option('homepage','world_title')); ?>" class="large-text"></td></tr>
<tr><th>Sous-titre</th><td><textarea name="fms_theme_options[homepage][world_subtitle]" class="large-text"><?php echo esc_textarea(fms_get_option('homepage','world_subtitle')); ?></textarea></td></tr>
<tr><th>Texte bouton</th><td><input type="text" name="fms_theme_options[homepage][world_button_text]" value="<?php echo esc_attr(fms_get_option('homepage','world_button_text')); ?>" class="large-text"></td></tr>
<tr><th>Lien bouton</th><td><input type="text" name="fms_theme_options[homepage][world_button_link]" value="<?php echo esc_attr(fms_get_option('homepage','world_button_link')); ?>" class="large-text"></td></tr>
<tr><th>Nombre max de pays</th><td><input type="number" name="fms_theme_options[homepage][world_max_items]" value="<?php echo esc_attr(fms_get_option('homepage','world_max_items','6')); ?>"></td></tr>
<tr><th>Libellé sœurs</th><td><input type="text" name="fms_theme_options[homepage][world_label_sisters]" value="<?php echo esc_attr(fms_get_option('homepage','world_label_sisters','sœurs')); ?>"></td></tr>
<tr><th>Libellé communautés</th><td><input type="text" name="fms_theme_options[homepage][world_label_communities]" value="<?php echo esc_attr(fms_get_option('homepage','world_label_communities','communautés')); ?>"></td></tr>
<tr><th>Libellé depuis</th><td><input type="text" name="fms_theme_options[homepage][world_label_since]" value="<?php echo esc_attr(fms_get_option('homepage','world_label_since','Depuis')); ?>"></td></tr>

</table>
</div>
<?php else: ?>
<div class="fms-tab-panel active" style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;">
<h2>Bloc conservé</h2>
<p>Les autres onglets restent inchangés.</p>
</div>
<?php endif; ?>

<?php submit_button(); ?>
</form>
</div>
<?php }