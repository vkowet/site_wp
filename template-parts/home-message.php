<?php $mother_page = get_page_by_path('mot-de-la-mere-superieure'); if($mother_page): ?>
<section class="fms-message-section">
<div class="fms-message-container">
<div class="fms-message-photo"><?php if(has_post_thumbnail($mother_page->ID)) echo get_the_post_thumbnail($mother_page->ID,'medium'); ?></div>
<div class="fms-message-content">
<h2>Mot de la Mère Supérieure Générale</h2>
<p><?php echo wp_trim_words(wp_strip_all_tags($mother_page->post_content), 80, '...'); ?></p>
<a href="<?php echo get_permalink($mother_page->ID); ?>" class="fms-hero-btn">Lire le message complet</a>
</div>
</div>
</section>
<?php endif; ?>