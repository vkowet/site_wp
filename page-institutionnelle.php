<?php
/**
 * Template Name: Page institutionnelle (FMS)
 * Template Post Type: page
 */

get_header();
?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <?php
        $config = fms_get_institutional_page_config();
        $kicker = $config ? fms_institutional_option($config, 'kicker') : '';
        $title = $config ? fms_institutional_option($config, 'title') : get_the_title();
        $intro = $config ? fms_institutional_option($config, 'intro') : get_the_excerpt();
        ?>
        <main class="fms-institutional-page">
            <section class="fms-institutional-hero">
                <div class="fms-institutional-hero-inner">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Accueil</a>
                    <?php if ($kicker): ?><span class="fms-institutional-kicker"><?php echo esc_html($kicker); ?></span><?php endif; ?>
                    <h1><?php echo esc_html($title); ?></h1>
                    <?php if ($intro): ?>
                        <p><?php echo esc_html($intro); ?></p>
                    <?php endif; ?>
                </div>
            </section>

            <section class="fms-institutional-body">
                <article class="fms-institutional-content">
                    <?php if ($config): ?>
                        <?php if (fms_institutional_option($config, 'section_1_title') || fms_institutional_option($config, 'section_1_text')): ?>
                            <h2><?php echo esc_html(fms_institutional_option($config, 'section_1_title')); ?></h2>
                            <p><?php echo nl2br(esc_html(fms_institutional_option($config, 'section_1_text'))); ?></p>
                        <?php endif; ?>

                        <?php if (fms_institutional_option($config, 'quote')): ?>
                            <blockquote><?php echo nl2br(esc_html(fms_institutional_option($config, 'quote'))); ?></blockquote>
                        <?php endif; ?>

                        <?php if (fms_institutional_option($config, 'section_2_title') || fms_institutional_option($config, 'section_2_text')): ?>
                            <h2><?php echo esc_html(fms_institutional_option($config, 'section_2_title')); ?></h2>
                            <p><?php echo nl2br(esc_html(fms_institutional_option($config, 'section_2_text'))); ?></p>
                        <?php endif; ?>

                        <div class="fms-page-grid">
                            <?php for ($i = 1; $i <= 4; $i++): ?>
                                <?php
                                $card_title = fms_institutional_option($config, 'card_' . $i . '_title');
                                $card_text = fms_institutional_option($config, 'card_' . $i . '_text');
                                ?>
                                <?php if ($card_title || $card_text): ?>
                                    <section class="fms-page-card">
                                        <?php if ($card_title): ?><h3><?php echo esc_html($card_title); ?></h3><?php endif; ?>
                                        <?php if ($card_text): ?><p><?php echo nl2br(esc_html($card_text)); ?></p><?php endif; ?>
                                    </section>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>

                        <?php if (fms_institutional_option($config, 'section_3_title') || fms_institutional_option($config, 'section_3_text')): ?>
                            <h2><?php echo esc_html(fms_institutional_option($config, 'section_3_title')); ?></h2>
                            <p><?php echo nl2br(esc_html(fms_institutional_option($config, 'section_3_text'))); ?></p>
                        <?php endif; ?>

                        <?php if (fms_institutional_option($config, 'note')): ?>
                            <div class="fms-page-note">
                                <p><?php echo nl2br(esc_html(fms_institutional_option($config, 'note'))); ?></p>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php the_content(); ?>
                    <?php endif; ?>
                </article>
            </section>
        </main>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
