<?php get_header(); ?>
<?php $mode = get_theme_mod('fms_hero_mode','image'); $hero_image = fms_get_theme_image_url('fms_hero_image'); ?>
<section class="fms-hero" <?php if($mode==='image'): ?>style="background-image:url('<?php echo esc_url($hero_image); ?>');"<?php endif; ?>>
<div class="fms-hero-overlay">
<?php if($mode==='image'): ?>
<h1><?php echo esc_html(get_theme_mod('fms_hero_title','Franciscaines Servantes de Marie')); ?></h1>
<p><?php echo esc_html(get_theme_mod('fms_hero_text','Au service de Dieu, de l’éducation et de la dignité humaine à travers le monde.')); ?></p>
<a href="<?php echo esc_url(get_theme_mod('fms_hero_button_link','#')); ?>" class="fms-hero-btn"><?php echo esc_html(get_theme_mod('fms_hero_button_text','Découvrir la Congrégation')); ?></a>
<?php else: ?>
<div class="fms-slider-placeholder">Slider mode activé (Lot 4 visuel à finaliser)</div>
<?php endif; ?>
</div></section>
<?php get_footer(); ?>