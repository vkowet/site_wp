<?php
$page_slug = fms_get_option('homepage', 'foundress_page_slug', 'histoire-de-la-fondatrice');
$foundress_page = get_page_by_path($page_slug);
$kicker = fms_get_option('homepage', 'foundress_kicker', 'Histoire de la Fondatrice');
$button = fms_get_option('homepage', 'foundress_button_text', 'Découvrir son histoire');
$words = (int) fms_get_option('homepage', 'foundress_words', 65);

if ($foundress_page):
?>
<section class="fms-foundress-section">
    <div class="fms-section-kicker"><?php echo esc_html($kicker); ?></div>
    <div class="fms-foundress-container">
        <div class="fms-foundress-content">
            <h2><?php echo esc_html(get_the_title($foundress_page->ID)); ?></h2>
            <p><?php echo esc_html(wp_trim_words(wp_strip_all_tags($foundress_page->post_content), $words, '...')); ?></p>
            <?php if ($button): ?><a href="<?php echo esc_url(get_permalink($foundress_page->ID)); ?>" class="fms-hero-btn"><?php echo esc_html($button); ?></a><?php endif; ?>
        </div>
        <div class="fms-foundress-photo">
            <?php if (has_post_thumbnail($foundress_page->ID)) echo get_the_post_thumbnail($foundress_page->ID, 'medium'); ?>
        </div>
    </div>
</section>
<?php endif; ?>
