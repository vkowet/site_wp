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

$bank = fms_get_option(
    'system',
    'donation_bank',
    ''
);

$tax = fms_get_option(
    'system',
    'donation_tax',
    ''
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
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    Accueil
                </a>

                <span>></span>

                <?php echo esc_html($title); ?>
            </p>

            <h1><?php echo esc_html($title); ?></h1>

        </div>
    </div>
</section>

<section class="fms-system-page-content fms-donation-page">
    <div class="fms-system-page-container">

        <div class="fms-donation-intro">
            <?php echo wp_kses_post($content); ?>
        </div>

        <div class="fms-donation-values">
            <article class="fms-donation-card">
                <h2>Accompagner</h2>
                <p>
                    Votre don soutient les missions éducatives, sociales
                    et pastorales portées par la congrégation.
                </p>
            </article>

            <article class="fms-donation-card">
                <h2>Préserver</h2>
                <p>
                    Votre générosité contribue à l’entretien des lieux de vie,
                    des maisons communautaires et du patrimoine.
                </p>
            </article>

            <article class="fms-donation-card">
                <h2>Transmettre</h2>
                <p>
                    Vous participez à la transmission des valeurs franciscaines :
                    service, fraternité, simplicité et espérance.
                </p>
            </article>
        </div>

        <?php if (!empty($bank)) : ?>
            <div class="fms-donation-box">
                <h2>Coordonnées pour effectuer un don</h2>
                <div class="fms-donation-text">
                    <?php echo wpautop(wp_kses_post($bank)); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($tax)) : ?>
            <div class="fms-donation-box fms-donation-tax">
                <h2>Informations fiscales</h2>
                <div class="fms-donation-text">
                    <?php echo wpautop(wp_kses_post($tax)); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="fms-system-cta">
            <a href="<?php echo esc_url($link); ?>"
               class="fms-hero-btn">
                <?php echo esc_html($button); ?>
            </a>
        </div>

    </div>
</section>

<?php get_footer(); ?>