<?php
function fms_add_theme_options_menu() {
    add_menu_page('Options du thème FMS','Options FMS','manage_options','fms-theme-options','fms_theme_options_page','dashicons-admin-generic',61);
}
add_action('admin_menu','fms_add_theme_options_menu');

function fms_register_theme_options() {
    register_setting('fms_theme_options_group','fms_header_title');
    register_setting('fms_theme_options_group','fms_header_slogan');
    register_setting('fms_theme_options_group','fms_header_world_logo');
    register_setting('fms_theme_options_group','fms_header_france_logo');
    for ($i=1;$i<=4;$i++) { register_setting('fms_theme_options_group','fms_stat_'.$i.'_number'); register_setting('fms_theme_options_group','fms_stat_'.$i.'_label'); }
    register_setting('fms_theme_options_group','fms_vocation_title'); register_setting('fms_theme_options_group','fms_vocation_text'); register_setting('fms_theme_options_group','fms_vocation_button_text'); register_setting('fms_theme_options_group','fms_vocation_button_link'); register_setting('fms_theme_options_group','fms_vocation_bg');
    $footer_fields=['name','address1','address2','city','phone','email','facebook','youtube','instagram','world_link','copyright','bottom_text']; foreach($footer_fields as $field){ register_setting('fms_theme_options_group','fms_footer_'.$field); }
}
add_action('admin_init','fms_register_theme_options');

function fms_image_field($name,$value){ $url = $value ? wp_get_attachment_image_url($value,'medium') : ''; ?>
<div class="fms-image-field">
<input type="hidden" class="fms-image-id" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>">
<button type="button" class="button fms-upload-image">Choisir une image</button>
<button type="button" class="button fms-remove-image">Supprimer</button>
<div class="fms-image-preview" style="margin-top:15px;"><?php if($url): ?><img src="<?php echo esc_url($url); ?>" style="max-width:150px;height:auto;"><?php endif; ?></div>
</div><?php }

function fms_theme_options_page() { $tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'homepage'; ?>
<div class="wrap"><h1>Options du thème FMS</h1><h2 class="nav-tab-wrapper"><a href="?page=fms-theme-options&tab=homepage" class="nav-tab <?php echo $tab==='homepage' ? 'nav-tab-active' : ''; ?>">Homepage</a><a href="?page=fms-theme-options&tab=identity" class="nav-tab <?php echo $tab==='identity' ? 'nav-tab-active' : ''; ?>">Identité</a><a href="?page=fms-theme-options&tab=footer" class="nav-tab <?php echo $tab==='footer' ? 'nav-tab-active' : ''; ?>">Footer</a><a href="?page=fms-theme-options&tab=pages" class="nav-tab <?php echo $tab==='pages' ? 'nav-tab-active' : ''; ?>">Pages internes</a><a href="?page=fms-theme-options&tab=world" class="nav-tab <?php echo $tab==='world' ? 'nav-tab-active' : ''; ?>">Réseau mondial</a></h2><form method="post" action="options.php"><?php settings_fields('fms_theme_options_group'); ?>
<?php if ($tab==='homepage') : ?><div style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;"><h2>Homepage — Chiffres clés</h2><table class="form-table"><?php for ($i=1;$i<=4;$i++) : ?><tr><th>Chiffre <?php echo $i; ?></th><td><input type="text" name="fms_stat_<?php echo $i; ?>_number" value="<?php echo esc_attr(get_option('fms_stat_'.$i.'_number','')); ?>" class="regular-text"></td><th>Libellé <?php echo $i; ?></th><td><input type="text" name="fms_stat_<?php echo $i; ?>_label" value="<?php echo esc_attr(get_option('fms_stat_'.$i.'_label','')); ?>" class="regular-text"></td></tr><?php endfor; ?></table></div><div style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;"><h2>Homepage — Bloc vocation</h2><table class="form-table"><tr><th>Titre</th><td><input type="text" name="fms_vocation_title" value="<?php echo esc_attr(get_option('fms_vocation_title','')); ?>" class="large-text"></td></tr><tr><th>Texte</th><td><textarea name="fms_vocation_text" rows="5" class="large-text"><?php echo esc_textarea(get_option('fms_vocation_text','')); ?></textarea></td></tr><tr><th>Texte bouton</th><td><input type="text" name="fms_vocation_button_text" value="<?php echo esc_attr(get_option('fms_vocation_button_text','')); ?>" class="regular-text"></td></tr><tr><th>Lien bouton</th><td><input type="text" name="fms_vocation_button_link" value="<?php echo esc_attr(get_option('fms_vocation_button_link','')); ?>" class="large-text"></td></tr><tr><th>Image de fond</th><td><?php fms_image_field('fms_vocation_bg', get_option('fms_vocation_bg','')); ?></td></tr></table></div><?php endif; ?>
<?php if ($tab==='identity') : ?><div style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;"><h2>Identité — Header</h2><table class="form-table"><tr><th>Titre institution</th><td><input type="text" name="fms_header_title" value="<?php echo esc_attr(get_option('fms_header_title','Franciscaines Servantes de Marie')); ?>" class="large-text"></td></tr><tr><th>Slogan</th><td><input type="text" name="fms_header_slogan" value="<?php echo esc_attr(get_option('fms_header_slogan','Servir - Apprendre et Éduquer')); ?>" class="large-text"></td></tr><tr><th>Logo mondial</th><td><?php fms_image_field('fms_header_world_logo', get_option('fms_header_world_logo','')); ?></td></tr><tr><th>Logo France</th><td><?php fms_image_field('fms_header_france_logo', get_option('fms_header_france_logo','')); ?></td></tr></table></div><?php endif; ?>
<?php if ($tab==='footer') : ?><div style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;"><h2>Footer configuré</h2></div><?php endif; ?>
<?php submit_button(); ?></form></div><?php }