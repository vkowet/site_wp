<?php get_header(); ?>
<?php $mode = get_theme_mod('fms_hero_mode','image'); $hero_image = fms_get_theme_image_url('fms_hero_image'); ?>
<?php if($mode==='image'): 
$title=get_theme_mod('fms_hero_title','Franciscaines Servantes de Marie');
$text=get_theme_mod('fms_hero_text','');
$btn=get_theme_mod('fms_hero_button_text','');
$link=get_theme_mod('fms_hero_button_link','#'); ?>
<section class="fms-hero" style="background-image:url('<?php echo esc_url($hero_image); ?>');">
<?php if($title || $text): ?><div class="fms-hero-overlay"><div class="fms-hero-content">
<?php if($title): ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
<?php if($text): ?><p><?php echo esc_html($text); ?></p><?php endif; ?>
<?php if($text && $btn): ?><a href="<?php echo esc_url($link); ?>" class="fms-hero-btn"><?php echo esc_html($btn); ?></a><?php endif; ?>
</div></div><?php endif; ?></section>
<?php else: ?>
<section class="fms-hero-slider">
<?php for($i=1;$i<=3;$i++): 
$img=fms_get_theme_image_url('fms_slide_'.$i.'_image');
$title=get_theme_mod('fms_slide_'.$i.'_title','');
$text=get_theme_mod('fms_slide_'.$i.'_text','');
$btn=get_theme_mod('fms_slide_'.$i.'_button_text','');
$link=get_theme_mod('fms_slide_'.$i.'_button_link','#'); ?>
<div class="fms-slide<?php echo $i===1?' active':''; ?>" style="background-image:url('<?php echo esc_url($img); ?>');">
<?php if($title || $text): ?><div class="fms-hero-overlay"><div class="fms-hero-content">
<?php if($title): ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
<?php if($text): ?><p><?php echo esc_html($text); ?></p><?php endif; ?>
<?php if($text && $btn): ?><a href="<?php echo esc_url($link); ?>" class="fms-hero-btn"><?php echo esc_html($btn); ?></a><?php endif; ?>
</div></div><?php endif; ?>
</div>
<?php endfor; ?>
<div class="fms-slider-dots"><span></span><span></span><span></span></div>
</section>
<?php endif; ?>
<?php get_template_part('template-parts/home-message'); ?>
<?php get_template_part('template-parts/home-foundress'); ?>
<?php get_template_part('template-parts/home-world-presence'); ?>
<?php get_template_part('template-parts/home-stats'); ?>
<?php get_footer(); ?>
