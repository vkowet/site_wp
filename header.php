<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$world_logo = fms_get_theme_image_url('fms_world_logo');
$france_logo = fms_get_theme_image_url('fms_france_logo');
?>
<header class="fms-header">

    <div class="fms-topbar">
        <?php
        wp_nav_menu([
            'theme_location' => 'top-menu',
            'container' => false,
            'fallback_cb' => false,
        ]);
        ?>
    </div>

    <div class="fms-branding">
        <div class="fms-brand-logo left">
            <?php if ($world_logo): ?>
                <img src="<?php echo esc_url($world_logo); ?>" alt="Logo mondial">
            <?php endif; ?>
        </div>

        <div class="fms-brand-title">
            <h1>Franciscaines Servantes de Marie</h1>
            <p>Servir - Apprendre et Éduquer</p>
        </div>

        <div class="fms-brand-logo right">
            <?php if ($france_logo): ?>
                <img src="<?php echo esc_url($france_logo); ?>" alt="Logo France">
            <?php endif; ?>
        </div>
    </div>

    <nav class="fms-main-nav">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary-menu',
            'container' => false,
            'fallback_cb' => false,
        ]);
        ?>
    </nav>

</header>