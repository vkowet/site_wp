<?php
get_header();

$title = fms_get_option(
    'system',
    'donation_title',
    get_the_title()
);

$content = wpautop(
    fms_get_option(
        'system',
        'donation_content',
        get_the_content()
    )
);

$button = fms_get_option(
    'system',
    'donation_button',
    'Nous contacter'
);

$link = fms_get_option(
    'system',
    'donation_link',
    '/contact'
);
?>

<section class="fms-system-page-hero">
    <div class="fms-system-page-overlay">
        <div class="fms-system-page-inner">

            <p class="fms-system-breadcrumb">
                <a href="<?php echo home_url(); ?>">
                    Accueil
                </a>

                <span>></span>

                <?php echo esc_html($title); ?>
            </p>

            <h1><?php echo esc_html($title); ?></h1>

        </div>
    </div>
</section>

<section class="fms-system-page-content">
    <div class="fms-system-page-container">

        <?php echo $content; ?>

        <div class="fms-system-cta">
            <a href="<?php echo esc_url($link); ?>"
               class="fms-hero-btn">
                <?php echo esc_html($button); ?>
            </a>
        </div>

    </div>
</section>

<?php get_footer(); ?>
