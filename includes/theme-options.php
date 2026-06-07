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

function fms_sanitize_theme_options($input) {
    $existing = get_option('fms_theme_options', []);

    if (!is_array($existing)) {
        $existing = [];
    }

    if (!is_array($input)) {
        return $existing;
    }

    return array_replace_recursive($existing, $input);
}

function fms_register_theme_options() {
    register_setting(
        'fms_theme_options_group',
        'fms_theme_options',
        [
            'sanitize_callback' => 'fms_sanitize_theme_options',
        ]
    );
}
add_action('admin_init', 'fms_register_theme_options');

/**
 * Enqueue custom CSS for theme options page
 */
function fms_enqueue_theme_options_styles($hook) {
    if ($hook !== 'toplevel_page_fms-theme-options') {
        return;
    }

    // Enqueue admin styles first
    wp_enqueue_style('admin');
    
    // Add custom styles inline for theme options
    $custom_css = "
        /* Sticky navigation tabs */
        .wrap .nav-tab-wrapper {
            position: sticky;
            top: 32px;
            background: rgba(255, 255, 255, 0.96);
            z-index: 1000;
            border-bottom: 2px solid #234e70;
            padding: 0;
            margin: 20px 0 30px 0 !important;
            box-shadow: 0 6px 18px rgba(35, 78, 112, 0.12);
            border-radius: 4px 4px 0 0;
            backdrop-filter: blur(8px);
        }

        /* Tab styling */
        .nav-tab {
            background: #f8f9fa;
            color: #334e68;
            border: none;
            border-bottom: 3px solid transparent;
            padding: 12px 20px !important;
            margin: 0;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-tab:hover {
            background: #eef2f6;
            color: #16324f;
        }

        /* Active tab with theme colors */
        .nav-tab.nav-tab-active {
            background: linear-gradient(135deg, #d9e8f5 0%, #eef6fb 100%);
            color: #16324f;
            border-bottom-color: #234e70;
            box-shadow: inset 0 -3px 0 #234e70;
        }

        .wrap form {
            padding-bottom: 96px;
        }

        /* Floating submit button */
        .wrap form .submit {
            position: fixed;
            right: 28px;
            bottom: 24px;
            background: rgba(255, 255, 255, 0.96);
            padding: 12px;
            margin: 0 !important;
            border: 1px solid #d9e2ec;
            border-radius: 8px;
            box-shadow: 0 14px 32px rgba(22, 50, 79, 0.18);
            z-index: 1001;
            backdrop-filter: blur(8px);
        }

        .wrap form.fms-options-dirty .submit {
            border-color: #234e70;
            box-shadow: 0 16px 36px rgba(35, 78, 112, 0.28);
        }

        /* Style the submit button */
        .wrap form .submit .button-primary {
            background: linear-gradient(135deg, #234e70 0%, #1a3a52 100%);
            color: white;
            border: none;
            padding: 12px 32px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(35, 78, 112, 0.2);
        }

        .wrap form.fms-options-dirty .submit .button-primary {
            background: linear-gradient(135deg, #2f6f9f 0%, #234e70 100%);
            box-shadow: 0 6px 18px rgba(35, 78, 112, 0.35);
        }

        .wrap form .submit .button-primary:hover {
            background: linear-gradient(135deg, #1a3a52 0%, #102a43 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(35, 78, 112, 0.3);
        }

        .wrap form .submit .button-primary:active {
            transform: translateY(0);
        }

        @media screen and (max-width: 782px) {
            .wrap .nav-tab-wrapper {
                top: 46px;
                overflow-x: auto;
                white-space: nowrap;
            }

            .wrap form .submit {
                right: 12px;
                bottom: 12px;
                left: 12px;
                text-align: center;
            }

            .wrap form .submit .button-primary {
                width: 100%;
            }
        }

        /* Improve form-table styling inside cards */
        .form-table {
            background: white;
        }

        .form-table th {
            background: #f8fafc;
            padding: 12px 15px;
            font-weight: 600;
            color: #16324f;
            border-top: 1px solid #e6edf4;
        }

        .form-table td {
            padding: 12px 15px;
            border-top: 1px solid #e6edf4;
        }

        /* Input styling */
        .form-table input[type=\"text\"],
        .form-table input[type=\"email\"],
        .form-table input[type=\"url\"],
        .form-table input[type=\"tel\"],
        .form-table textarea {
            width: 100%;
            max-width: 500px;
            padding: 10px 12px;
            border: 1px solid #d9e2ec;
            border-radius: 4px;
            font-family: Arial, sans-serif;
            transition: border-color 0.3s ease;
        }

        .form-table input[type=\"text\"]:focus,
        .form-table input[type=\"email\"]:focus,
        .form-table input[type=\"url\"]:focus,
        .form-table input[type=\"tel\"]:focus,
        .form-table textarea:focus {
            outline: none;
            border-color: #234e70;
            box-shadow: 0 0 0 3px rgba(35, 78, 112, 0.1);
        }

        .form-table textarea {
            min-height: 120px;
            max-width: 100%;
            font-size: 13px;
            line-height: 1.5;
        }

        .form-table .large-text {
            max-width: 100%;
        }

        /* Checkbox styling */
        .form-table input[type=\"checkbox\"] {
            margin-right: 8px;
        }

        /* Description text */
        .description {
            display: block;
            margin-top: 5px;
            color: #4a6572;
            font-size: 12px;
            font-style: italic;
        }
    ";
    
    wp_add_inline_style('admin', $custom_css);

    wp_enqueue_script('jquery');

    $custom_js = <<<'JS'
jQuery(function($) {
    var $form = $('.toplevel_page_fms-theme-options form');
    var $button = $form.find('.submit .button-primary');
    var cleanText = $button.val() || 'Enregistrer';

    $form.on('change input', 'input, textarea, select', function() {
        $form.addClass('fms-options-dirty');
        $button.val('Enregistrer les modifications');
    });

    $form.on('submit', function() {
        $button.val('Enregistrement...');
        $button.prop('disabled', true);
    });

    if (cleanText) {
        $button.attr('data-clean-text', cleanText);
    }
});
JS;

    wp_add_inline_script('jquery', $custom_js);
}
add_action('admin_enqueue_scripts', 'fms_enqueue_theme_options_styles');

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
    'institutional-pages' => 'Pages institutionnelles',
    'missions'     => 'Missions',
    'identity'     => 'Identité',
    'contact'      => 'Contact',
    'vocations'    => 'Vocations',
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