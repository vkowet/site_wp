<?php
/* Template Name: Page Contact */
get_header();

$contact = fms_get_contact();

$post_content = '';
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $post_content = trim(get_the_content());
    }
}
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
                    <a href="tel:<?php echo esc_attr( preg_replace('/[^0-9+]/', '', $contact['phone']) ); ?>">
                        <?php echo esc_html($contact['phone']); ?>
                    </a>
                </p>
            <?php endif; ?>

            <?php if (!empty($contact['email'])): ?>
                <p>
                    <strong>Courriel</strong><br>
                    <a href="mailto:<?php echo esc_attr($contact['email']); ?>">
                        <?php echo esc_html($contact['email']); ?>
                    </a>
                </p>
            <?php endif; ?>
        </div>

        <div class="contact-form">
            <h2>Nous écrire</h2>

            <?php if (!empty($post_content)): ?>
                <?php echo apply_filters('the_content', $post_content); ?>
            <?php else: ?>
                <p>Remplissez le formulaire ci-dessous pour nous contacter. Nous revenons vers vous dans les meilleurs délais.</p>
                <?php echo do_shortcode('[contact-form-7 id="123" title="Contact"]'); ?>
            <?php endif; ?>
        </div>

    </section>

</main>

<?php get_footer(); ?>