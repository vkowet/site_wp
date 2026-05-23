<?php get_header(); ?>
<?php $mode = get_theme_mod('fms_hero_mode','image'); $hero_image = fms_get_theme_image_url('fms_hero_image'); ?>
<?php if($mode==='image'): ?>
<section class="fms-hero" style="background-image:url('<?php echo esc_url($hero_image); ?>');">
<div class="fms-hero-overlay">
<h1><?php echo esc_html(get_theme_mod('fms_hero_title','Franciscaines Servantes de Marie')); ?></h1>
<p><?php echo esc_html(get_theme_mod('fms_hero_text','Au service de Dieu, de l’éducation et de la dignité humaine à travers le monde.')); ?></p>
<a href="<?php echo esc_url(get_theme_mod('fms_hero_button_link','#')); ?>" class="fms-hero-btn"><?php echo esc_html(get_theme_mod('fms_hero_button_text','Découvrir la Congrégation')); ?></a>
</div></section>
<?php else: ?>
<section class="fms-hero-slider">
<?php for($i=1;$i<=3;$i++): $img=fms_get_theme_image_url('fms_slide_'.$i.'_image'); ?>
<div class="fms-slide<?php echo $i===1?' active':''; ?>" style="background-image:url('<?php echo esc_url($img); ?>');">
<div class="fms-hero-overlay">
<h1><?php echo esc_html(get_theme_mod('fms_slide_'.$i.'_title','Slide '.$i)); ?></h1>
<p><?php echo esc_html(get_theme_mod('fms_slide_'.$i.'_text','')); ?></p>
<a href="<?php echo esc_url(get_theme_mod('fms_slide_'.$i.'_button_link','#')); ?>" class="fms-hero-btn"><?php echo esc_html(get_theme_mod('fms_slide_'.$i.'_button_text','Découvrir')); ?></a>
</div></div>
<?php endfor; ?>
<div class="fms-slider-dots"><span></span><span></span><span></span></div>
</section>
<?php endif; ?>
<?php get_footer(); ?>