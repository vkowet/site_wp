<?php get_header(); ?>

<?php
$mode = fms_get_option('homepage', 'hero_mode', 'image');
$hero_image_id = fms_get_option('homepage', 'hero_image');
$hero_image = fms_get_image_url($hero_image_id, 'full');

if (!$hero_image) {
    $hero_image = fms_get_theme_image_url(get_theme_mod('fms_hero_image'));
}
?>

<?php if ($mode === 'image'): ?>

    <?php
    $title = fms_get_option('homepage', 'hero_title', 'Franciscaines Servantes de Marie');
    $text  = fms_get_option('homepage', 'hero_text', 'Servir, apprendre et éduquer dans un esprit de fraternité, de simplicité et d’espérance.');
    $btn   = fms_get_option('homepage', 'hero_button_text', 'Découvrir la Congrégation');
    $link  = fms_get_option('homepage', 'hero_button_link', '/la-congregation');
    ?>

    <section class="fms-hero" style="background-image:url('<?php echo esc_url($hero_image); ?>');">
        <?php if ($title || $text): ?>
            <div class="fms-hero-overlay">
                <div class="fms-hero-content">
                    <?php if ($title): ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
                    <?php if ($text): ?><p><?php echo esc_html($text); ?></p><?php endif; ?>
                    <?php if ($btn): ?><a href="<?php echo esc_url(home_url($link)); ?>" class="fms-hero-btn"><?php echo esc_html($btn); ?></a><?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </section>

<?php else: ?>

    <section class="fms-hero-slider">
        <?php for ($i = 1; $i <= 3; $i++): ?>
            <?php
            $img_id = fms_get_option('homepage', 'slide_'.$i.'_image');
            $img = fms_get_image_url($img_id, 'full') ?: $hero_image;
            $show_text = fms_get_option('homepage', 'slide_'.$i.'_show_text', '1') === '1';
            $title = fms_get_option('homepage', 'slide_'.$i.'_title', '');
            $text  = fms_get_option('homepage', 'slide_'.$i.'_text', '');
            $btn   = fms_get_option('homepage', 'slide_'.$i.'_button_text', '');
            $link  = fms_get_option('homepage', 'slide_'.$i.'_button_link', '#');
            ?>
            <div class="fms-slide<?php echo $i === 1 ? ' active' : ''; ?>" style="background-image:url('<?php echo esc_url($img); ?>');">
                <?php if ($show_text && ($title || $text || $btn)): ?>
                    <div class="fms-hero-overlay">
                        <div class="fms-hero-content">
                            <?php if ($title): ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
                            <?php if ($text): ?><p><?php echo esc_html($text); ?></p><?php endif; ?>
                            <?php if ($btn): ?><a href="<?php echo esc_url(home_url($link)); ?>" class="fms-hero-btn"><?php echo esc_html($btn); ?></a><?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
        <button class="fms-slider-nav fms-slider-prev" type="button" aria-label="Slide précédente">‹</button>
        <button class="fms-slider-nav fms-slider-next" type="button" aria-label="Slide suivante">›</button>

        <div class="fms-slider-dots" aria-label="Navigation du slider">
            <button type="button" aria-label="Afficher la slide 1" class="active"></button>
            <button type="button" aria-label="Afficher la slide 2"></button>
            <button type="button" aria-label="Afficher la slide 3"></button>
        </div>
    </section>

<?php endif; ?>

<?php get_template_part('template-parts/home-institution'); ?>
<?php get_template_part('template-parts/home-message'); ?>
<?php get_template_part('template-parts/home-foundress'); ?>
<?php get_template_part('template-parts/home-world-presence'); ?>
<?php get_template_part('template-parts/home-news'); ?>
<?php get_template_part('template-parts/home-vocation'); ?>

<?php get_footer(); ?>
