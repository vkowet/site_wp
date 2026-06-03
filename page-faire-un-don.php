<?php
get_header();

$title = fms_get_option(
    'system',
    'donation_title',
    'Faire un don'
);

$content = wpautop(
    fms_get_option(
        'system',
        'donation_content',
        ''
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
                <a href="<?php echo home_url(); ?>">Accueil</a>
                <span>></span>
                <?php echo esc_html($title); ?>
            </p>

            <h1><?php echo esc_html($title); ?></h1>

        </div>
    </div>
</section>

<section class="fms-donation-intro">
    <div class="fms-container">

        <div class="fms-donation-content">
            <?php echo $content; ?>
        </div>

    </div>
</section>

<section class="fms-donation-values">
    <div class="fms-container">

        <div class="fms-donation-grid">

            <article>
                <h3>Accompagner</h3>
                <p>
                    Votre don soutient les missions éducatives,
                    sociales et pastorales des Sœurs Franciscaines
                    Servantes de Marie.
                </p>
            </article>

            <article>
                <h3>Préserver</h3>
                <p>
                    Vous contribuez à l'entretien des lieux de vie,
                    des maisons communautaires et du patrimoine.
                </p>
            </article>

            <article>
                <h3>Transmettre</h3>
                <p>
                    Vous participez à la transmission des valeurs
                    évangéliques et franciscaines auprès des jeunes
                    générations.
                </p>
            </article>

        </div>

    </div>
</section>

<section class="fms-donation-bank">
    <div class="fms-container">

        <h2>Faire un don</h2>

        <p>
            Pour soutenir la congrégation, vous pouvez effectuer
            un don par virement bancaire ou nous contacter pour
            connaître les autres modalités de soutien.
        </p>

        <div class="fms-system-cta">
            <a href="<?php echo esc_url($link); ?>"
               class="fms-hero-btn">
                <?php echo esc_html($button); ?>
            </a>
        </div>

    </div>
</section>

<section class="fms-donation-tax">
    <div class="fms-container">

        <h2>Informations fiscales</h2>

        <p>
            Les dons réalisés au profit de la congrégation peuvent
            ouvrir droit à une réduction fiscale conformément à la
            réglementation en vigueur.
        </p>

    </div>
</section>

<?php get_footer(); ?>