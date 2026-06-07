<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
$world_logo_id  = fms_get_option('identity', 'world_logo');
$france_logo_id = fms_get_option('identity', 'france_logo');

$world_logo  = fms_get_image_url($world_logo_id);
$france_logo = fms_get_image_url($france_logo_id);

$header_title  = fms_get_option('identity', 'title', 'Franciscaines Servantes de Marie');
$header_slogan = fms_get_option('identity', 'slogan', 'Servir - Apprendre et Éduquer');
?>

<header class="fms-header">

    <!-- MOBILE HEADER -->
    <div class="fms-mobile-header">

        <div class="fms-mobile-logo left">
            <?php if ($world_logo): ?>
                <img src="<?php echo esc_url($world_logo); ?>" alt="Logo mondial">
            <?php endif; ?>
        </div>

        <div class="fms-mobile-title">
            <span><?php echo esc_html($header_title); ?></span>
        </div>

        <div class="fms-mobile-actions">

            <div class="fms-mobile-logo right">
                <?php if ($france_logo): ?>
                    <img src="<?php echo esc_url($france_logo); ?>" alt="Logo France">
                <?php endif; ?>
            </div>

            <button class="fms-mobile-toggle" aria-label="Menu">
                ☰
            </button>

        </div>

    </div>

    <!-- MENU MOBILE -->
    <nav class="fms-mobile-menu">

        <?php
        wp_nav_menu([
            'theme_location' => has_nav_menu('mobile-menu')
                ? 'mobile-menu'
                : 'primary-menu',
            'container'      => false,
            'fallback_cb'    => false,
        ]);
        ?>


        <div class="fms-language-switcher fms-language-switcher-mobile" aria-label="Choix de la langue">
            <?php echo do_shortcode('[gtranslate widget_look="dropdown_with_flags"]'); ?>
        </div>

        <div class="fms-mobile-cta">

            <a href="<?php echo esc_url(home_url('/faire-un-don')); ?>"
               class="fms-mobile-donate">
                Faire un don
            </a>

            <a href="<?php echo esc_url(home_url('/contact')); ?>"
               class="fms-mobile-contact">
                Contact
            </a>

        </div>

    </nav>

    <!-- TOP MENU -->
    <div class="fms-topbar">
        <?php
        wp_nav_menu([
            'theme_location' => 'top-menu',
            'container'      => false,
            'fallback_cb'    => false,
        ]);
        ?>

        <div class="fms-language-switcher fms-language-switcher-desktop" aria-label="Choix de la langue">
            <?php echo do_shortcode('[gtranslate widget_look="dropdown_with_flags"]'); ?>
        </div>

    </div>

    <!-- BRANDING -->
    <div class="fms-branding">

        <div class="fms-brand-logo left">
            <?php if ($world_logo): ?>
                <img src="<?php echo esc_url($world_logo); ?>" alt="Logo mondial">
            <?php endif; ?>
        </div>

        <div class="fms-brand-title">
            <h1><?php echo esc_html($header_title); ?></h1>
            <p><?php echo esc_html($header_slogan); ?></p>
        </div>

        <div class="fms-brand-logo right">
            <?php if ($france_logo): ?>
                <img src="<?php echo esc_url($france_logo); ?>" alt="Logo France">
            <?php endif; ?>
        </div>

    </div>

    <!-- MENU DESKTOP -->
    <nav class="fms-main-nav">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary-menu',
            'container'      => false,
            'fallback_cb'    => false,
        ]);
        ?>
    </nav>

</header>
