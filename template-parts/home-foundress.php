<?php $foundress_page = get_page_by_path('histoire-de-la-fondatrice'); if($foundress_page): ?>
<section class="fms-foundress-section">
<div class="fms-foundress-container">
<div class="fms-foundress-content">
<h2>Histoire de la Fondatrice</h2>
<p><?php echo wp_trim_words(wp_strip_all_tags($foundress_page->post_content), 90, '...'); ?></p>
<a href="<?php echo get_permalink($foundress_page->ID); ?>" class="fms-hero-btn">Découvrir son histoire</a>
</div>
<div class="fms-foundress-photo"><?php if(has_post_thumbnail($foundress_page->ID)) echo get_the_post_thumbnail($foundress_page->ID,'medium'); ?></div>
</div>
</section>
<?php endif; ?>