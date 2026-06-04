<?php
get_header();

$title = fms_get_option('system', 'legal_title', get_the_title());
$content = wpautop(
    fms_get_option('system', 'legal_content', get_the_content())
);

$contact = fms_get_option('contact');
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

<section class="fms-system-page-content">
    <div class="fms-system-page-container">

        <?php echo $content; ?>

        <?php if (!empty($contact)): ?>
            <section class="mentions-contact">
                <h2>Contact</h2>

                <?php if (!empty($contact['address'])): ?>
                    <p>
                        <strong>Adresse du siège</strong><br>
                        <?php echo nl2br(esc_html($contact['address'])); ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($contact['phone'])): ?>
                    <p>
                        <strong>Téléphone</strong> :
                        <?php echo esc_html($contact['phone']); ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($contact['email'])): ?>
                    <p>
                        <strong>Courriel</strong> :
                        <a href="mailto:<?php echo esc_attr($contact['email']); ?>">
                            <?php echo esc_html($contact['email']); ?>
                        </a>
                    </p>
                <?php endif; ?>
            </section>
        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>