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
    register_setting(
        'fms_theme_options_group',
        'fms_theme_options'
    );
}
add_action('admin_init', 'fms_register_theme_options');

function fms_image_field($name, $value){

    $url = $value
        ? wp_get_attachment_image_url($value,'medium')
        : '';

    ?>
    <div class="fms-image-field">

        <input
            type="hidden"
            class="fms-image-id"
            name="<?php echo esc_attr($name); ?>"
            value="<?php echo esc_attr($value); ?>">

        <button
            type="button"
            class="button fms-upload-image">
            Choisir une image
        </button>

        <button
            type="button"
            class="button fms-remove-image">
            Supprimer
        </button>

        <div
            class="fms-image-preview"
            style="margin-top:15px;">

            <?php if($url): ?>

                <img
                    src="<?php echo esc_url($url); ?>"
                    style="max-width:150px;height:auto;">

            <?php endif; ?>

        </div>

    </div>
    <?php
}

function fms_section_card_start($title){

    echo '<div style="
        background:#fff;
        padding:25px;
        margin:25px 0;
        border:1px solid #ddd;
        border-radius:8px;
    ">';

    echo '<h2 style="margin-top:0;">'.$title.'</h2>';

    echo '<table class="form-table">';
}

function fms_section_card_end(){
    echo '</table></div>';
}

function fms_theme_options_page() {

$tab = isset($_GET['tab'])
    ? sanitize_text_field($_GET['tab'])
    : 'homepage';

?>

<div class="wrap">

<h1>Centre de pilotage FMS</h1>

<h2 class="nav-tab-wrapper">

<?php

$tabs = [
    'homepage'     => 'Homepage',
    'governance'   => 'Gouvernance',
    'institution'  => 'Institution',
    'identity'     => 'Identité',
    'footer'       => 'Footer',
    'pages'        => 'Pages internes',
    'world'        => 'Réseau mondial',
    'system'       => 'Pages système',
    'donation'     => 'Dons'
];

foreach($tabs as $key => $label){

    echo '<a href="?page=fms-theme-options&tab='.$key.'"
    class="nav-tab '.($tab===$key ? 'nav-tab-active' : '').'">
    '.$label.'
    </a>';
}
?>

</h2>

<form method="post" action="options.php">

<?php settings_fields('fms_theme_options_group'); ?>

<?php

$file = __DIR__ . '/admin/tab-' . $tab . '.php';

if(file_exists($file)){
    require $file;
}

submit_button();

?>

</form>

</div>

<?php
}