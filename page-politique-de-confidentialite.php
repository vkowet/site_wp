<?php
get_header();

$title = fms_get_option('system', 'privacy_title', get_the_title());
$content = wpautop(
    fms_get_option('system', 'privacy_content', get_the_content())
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
                <h2>Responsable du traitement</h2>

                <?php if (!empty($contact['address'])): ?>
                    <p>
                        <?php echo nl2br(esc_html($contact['address'])); ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($contact['email'])): ?>
                    <p>
                        Courriel :
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