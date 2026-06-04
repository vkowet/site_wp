<?php
/* Template Name: Page Contact */
get_header();

$contact = fms_get_contact();
?>

<main class="contact-page">

    <header class="contact-header">
        <h1><?php the_title(); ?></h1>

        <?php if (!empty($contact['message'])): ?>
            <p><?php echo esc_html( fms_t($contact['message']) ); ?></p>
        <?php endif; ?>
    </header>

    <section class="contact-content">

        <div class="contact-infos">
            <h2>Coordonnées</h2>

            <?php if (!empty($contact['address'])): ?>
                <p>
                    <strong>Adresse</strong><br>
                    <?php fms_echo_nl2br($contact['address']); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($contact['phone'])): ?>
                <p>
                    <strong>Téléphone</strong><br>
                    <?php echo esc_html($contact['phone']); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($contact['email'])): ?>
                <p>
                    <strong>Courriel</strong><br>
                     ?>">
                        <?php echo esc_html($contact['email']); ?>
                    </a>
                </p>
            <?php endif; ?>
        </div>

    </section>

</main>

<?php get_footer(); ?>