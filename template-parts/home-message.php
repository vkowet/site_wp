<?php
$page_slug = fms_get_option('homepage', 'message_page_slug', 'mot-de-la-mere-superieure');
$mother_page = get_page_by_path($page_slug);
$kicker = fms_get_option('homepage', 'message_kicker', 'Message de la Supérieure Générale');
$button = fms_get_option('homepage', 'message_button_text', 'Lire le message complet');
$words = (int) fms_get_option('homepage', 'message_words', 55);

if ($mother_page):
?>
<section class="fms-message-section">
    <div class="fms-section-kicker"><?php echo esc_html($kicker); ?></div>
    <div class="fms-message-container">
        <div class="fms-message-photo">
            <?php if (has_post_thumbnail($mother_page->ID)) echo get_the_post_thumbnail($mother_page->ID, 'medium'); ?>
        </div>
        <div class="fms-message-content">
            <h2><?php echo esc_html(get_the_title($mother_page->ID)); ?></h2>
            <p><?php echo esc_html(wp_trim_words(wp_strip_all_tags($mother_page->post_content), $words, '...')); ?></p>
            <?php if ($button): ?><a href="<?php echo esc_url(get_permalink($mother_page->ID)); ?>" class="fms-hero-btn"><?php echo esc_html($button); ?></a><?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
