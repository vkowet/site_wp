<?php
/* FMS Theme Options - version stable structure */
function fms_add_theme_options_menu() {
    add_menu_page('Options du thème FMS','Options FMS','manage_options','fms-theme-options','fms_theme_options_page','dashicons-admin-generic',61);
}
add_action('admin_menu','fms_add_theme_options_menu');

function fms_register_theme_options() {
    $fields = [
        'fms_header_title','fms_header_slogan','fms_header_world_logo','fms_header_france_logo',
        'fms_vocation_title','fms_vocation_text','fms_vocation_button_text','fms_vocation_button_link','fms_vocation_bg',
        'fms_page_default_title','fms_page_subtitle','fms_page_bg','fms_page_height','fms_page_margin_top','fms_page_content_width','fms_page_overlay_opacity',
        'fms_world_section_title','fms_world_section_subtitle','fms_world_cards_per_row','fms_world_bg_color','fms_world_card_color','fms_world_flip_speed','fms_world_enable_flip'
    ];
    foreach($fields as $f){ register_setting('fms_theme_options_group',$f); }
    for ($i=1;$i<=4;$i++) {
        register_setting('fms_theme_options_group','fms_stat_'.$i.'_number');
        register_setting('fms_theme_options_group','fms_stat_'.$i.'_label');
    }
    $footer_fields=['name','address1','address2','city','phone','email','facebook','youtube','instagram','world_link','copyright','bottom_text'];
    foreach($footer_fields as $field){ register_setting('fms_theme_options_group','fms_footer_'.$field); }
}
add_action('admin_init','fms_register_theme_options');

function fms_image_field($name,$value){
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
<h2>Chiffres clés</h2>
<table class="form-table">
<?php for ($i=1;$i<=4;$i++): ?>
<tr>
<th>Chiffre <?php echo $i; ?></th><td><input type="text" name="fms_stat_<?php echo $i; ?>_number" value="<?php echo esc_attr(get_option('fms_stat_'.$i.'_number','')); ?>"></td>
<th>Libellé <?php echo $i; ?></th><td><input type="text" name="fms_stat_<?php echo $i; ?>_label" value="<?php echo esc_attr(get_option('fms_stat_'.$i.'_label','')); ?>"></td>
</tr>
<?php endfor; ?>
<tr><th>Image vocation</th><td colspan="3"><?php fms_image_field('fms_vocation_bg', get_option('fms_vocation_bg','')); ?></td></tr>
</table>
<?php endif; ?>

<?php if ($tab==='identity'): ?>
<table class="form-table">
<tr><th>Titre</th><td><input type="text" name="fms_header_title" value="<?php echo esc_attr(get_option('fms_header_title','')); ?>" class="large-text"></td></tr>
<tr><th>Slogan</th><td><input type="text" name="fms_header_slogan" value="<?php echo esc_attr(get_option('fms_header_slogan','')); ?>" class="large-text"></td></tr>
<tr><th>Logo mondial</th><td><?php fms_image_field('fms_header_world_logo', get_option('fms_header_world_logo','')); ?></td></tr>
<tr><th>Logo France</th><td><?php fms_image_field('fms_header_france_logo', get_option('fms_header_france_logo','')); ?></td></tr>
</table>
<?php endif; ?>

<?php if ($tab==='footer'): ?>
<table class="form-table">
<tr><th>Nom</th><td><input type="text" name="fms_footer_name" value="<?php echo esc_attr(get_option('fms_footer_name','')); ?>"></td></tr>
<tr><th>Adresse 1</th><td><input type="text" name="fms_footer_address1" value="<?php echo esc_attr(get_option('fms_footer_address1','')); ?>"></td></tr>
<tr><th>Adresse 2</th><td><input type="text" name="fms_footer_address2" value="<?php echo esc_attr(get_option('fms_footer_address2','')); ?>"></td></tr>
<tr><th>Ville</th><td><input type="text" name="fms_footer_city" value="<?php echo esc_attr(get_option('fms_footer_city','')); ?>"></td></tr>
<tr><th>Email</th><td><input type="text" name="fms_footer_email" value="<?php echo esc_attr(get_option('fms_footer_email','')); ?>"></td></tr>
<tr><th>Texte bas</th><td><textarea name="fms_footer_bottom_text"><?php echo esc_textarea(get_option('fms_footer_bottom_text','')); ?></textarea></td></tr>
</table>
<?php endif; ?>

<?php if ($tab==='pages'): ?>
<table class="form-table">
<tr><th>Titre par défaut</th><td><input type="text" name="fms_page_default_title" value="<?php echo esc_attr(get_option('fms_page_default_title','')); ?>"></td></tr>
<tr><th>Sous-titre</th><td><input type="text" name="fms_page_subtitle" value="<?php echo esc_attr(get_option('fms_page_subtitle','')); ?>"></td></tr>
<tr><th>Image fond</th><td><?php fms_image_field('fms_page_bg', get_option('fms_page_bg','')); ?></td></tr>
</table>
<?php endif; ?>

<?php if ($tab==='world'): ?>
<table class="form-table">
<tr><th>Titre section</th><td><input type="text" name="fms_world_section_title" value="<?php echo esc_attr(get_option('fms_world_section_title','Présence dans le monde')); ?>"></td></tr>
<tr><th>Sous-titre</th><td><input type="text" name="fms_world_section_subtitle" value="<?php echo esc_attr(get_option('fms_world_section_subtitle','')); ?>"></td></tr>
<tr><th>Cartes/ligne</th><td><input type="text" name="fms_world_cards_per_row" value="<?php echo esc_attr(get_option('fms_world_cards_per_row','3')); ?>"></td></tr>
</table>
<?php endif; ?>

<?php submit_button(); ?>
</form></div>
<?php } ?>
