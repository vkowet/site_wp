<?php
/**
 * Template : Faire un don
 */

get_header();

$title = fms_get_option(
    'donation',
    'title',
    get_the_title()
);

$content = wpautop(
    fms_get_option(
        'donation',
        'content',
        get_the_content()
    )
);

$bank = fms_get_option(
    'donation',
    'bank',
    ''
);

$tax = fms_get_option(
    'donation',
    'tax',
    ''
);

$button = fms_get_option(
    'donation',
    'button',
    'Nous contacter'
);

$link = fms_get_option(
    'donation',
    'link',
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

        <?php if (!empty($content)) : ?>
            <div class="fms-donation-intro">
                <?php echo wp_kses_post($content); ?>
            </div>
        <?php endif; ?>

        <div class="fms-donation-values">

            <div class="fms-donation-card">
                <h2>Accompagner</h2>
                <p>
                    Votre soutien permet aux Sœurs Franciscaines
                    Servantes de Marie de poursuivre leurs missions
                    éducatives, pastorales et sociales.
                </p>
            </div>

            <div class="fms-donation-card">
                <h2>Préserver</h2>
                <p>
                    Vos dons contribuent à l'entretien des maisons,
                    des lieux d'accueil et du patrimoine de la
                    congrégation.
                </p>
            </div>

            <div class="fms-donation-card">
                <h2>Transmettre</h2>
                <p>
                    Vous participez à la transmission des valeurs
                    franciscaines de fraternité, de service
                    et d'espérance.
                </p>
            </div>

        </div>

        <?php if (!empty($bank)) : ?>

            <div class="fms-donation-box">

                <h2>
                    Coordonnées bancaires
                </h2>

                <div class="fms-donation-text">
                    <?php echo wpautop(wp_kses_post($bank)); ?>
                </div>

            </div>

        <?php endif; ?>

        <?php if (!empty($tax)) : ?>

            <div class="fms-donation-box">

                <h2>
                    Informations fiscales
                </h2>

                <div class="fms-donation-text">
                    <?php echo wpautop(wp_kses_post($tax)); ?>
                </div>

            </div>

        <?php endif; ?>

        <div class="fms-system-cta">

            <a
                href="<?php echo esc_url($link); ?>"
                class="fms-hero-btn">

                <?php echo esc_html($button); ?>

            </a>

        </div>

    </div>

</section>

<?php get_footer(); ?>