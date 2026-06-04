<?php
get_header();
?>

<main class="contact-page">

    <header class="contact-header">
        <h1><?php the_title(); ?></h1>
        <p>
            Le siège social des Sœurs Franciscaines Servantes de Marie
            est à votre écoute pour toute demande institutionnelle,
            administrative ou spirituelle.
        </p>
    </header>

    <section class="contact-content">

        <div class="contact-infos">
            <h2>Coordonnées</h2>
            <?php the_content(); ?>
        </div>

        <div class="contact-form">
            <h2>Nous écrire</h2>

            <!-- Exemple : shortcode de formulaire -->
            <?php echo do_shortcode('[contact-form-7 id="123" title="Contact"]'); ?>
        </div>

    </section>

</main>

<?php
get_footer();