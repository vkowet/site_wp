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

    for ($i=1;$i<=4;$i++){
        register_setting('fms_theme_options_group','fms_stat_'.$i.'_number');
        register_setting('fms_theme_options_group','fms_stat_'.$i.'_label');
    }

    register_setting('fms_theme_options_group','fms_vocation_title');
    register_setting('fms_theme_options_group','fms_vocation_text');
    register_setting('fms_theme_options_group','fms_vocation_button_text');
    register_setting('fms_theme_options_group','fms_vocation_button_link');
    register_setting('fms_theme_options_group','fms_vocation_bg');

    $footer_fields=['name','address1','address2','city','phone','email','facebook','youtube','instagram','world_link','copyright','bottom_text'];
    foreach($footer_fields as $field){ register_setting('fms_theme_options_group','fms_footer_'.$field); }
}
add_action('admin_init','fms_register_theme_options');

function fms_theme_options_page() {
    $tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'homepage';
?>
<div class="wrap">
<h1>Options du thème FMS</h1>
<h2 class="nav-tab-wrapper">
<a href="?page=fms-theme-options&tab=homepage" class="nav-tab <?php echo $tab==='homepage' ? 'nav-tab-active' : ''; ?>">Homepage</a>
<a href="?page=fms-theme-options&tab=identity" class="nav-tab <?php echo $tab==='identity' ? 'nav-tab-active' : ''; ?>">Identité</a>
<a href="?page=fms-theme-options&tab=footer" class="nav-tab <?php echo $tab==='footer' ? 'nav-tab-active' : ''; ?>">Footer</a>
<a href="?page=fms-theme-options&tab=pages" class="nav-tab <?php echo $tab==='pages' ? 'nav-tab-active' : ''; ?>">Pages internes</a>
<a href="?page=fms-theme-options&tab=world" class="nav-tab <?php echo $tab==='world' ? 'nav-tab-active' : ''; ?>">Réseau mondial</a>
</h2>
<form method="post" action="options.php">
<?php settings_fields('fms_theme_options_group'); ?>
<?php if ($tab==='homepage') : ?><div style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;"><h2>Homepage</h2><p>Chiffres + vocation</p></div><?php endif; ?>
<?php if ($tab==='identity') : ?><div style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;"><h2>Identité — Header</h2></div><?php endif; ?>
<?php if ($tab==='footer') : ?><div style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;"><h2>Footer</h2></div><?php endif; ?>
<?php if ($tab==='pages') : ?><div style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;"><h2>Pages internes</h2></div><?php endif; ?>
<?php if ($tab==='world') : ?><div style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;"><h2>Réseau mondial</h2></div><?php endif; ?>
<?php submit_button(); ?>
</form></div>
<?php }
