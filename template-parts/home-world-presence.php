<?php
$query = new WP_Query([
    'post_type' => 'world_presence',
    'posts_per_page' => -1,
    'meta_key' => '_fms_order',
    'orderby' => 'meta_value_num',
    'order' => 'ASC'
]);
if($query->have_posts()): ?>
<section class="fms-world-section">
<h2>PRÉSENCE DANS LE MONDE</h2>
<div class="fms-world-grid">
<?php while($query->have_posts()): $query->the_post();
$sisters = get_post_meta(get_the_ID(),'_fms_sisters',true);
$communities = get_post_meta(get_the_ID(),'_fms_communities',true);
$year = get_post_meta(get_the_ID(),'_fms_year',true);
$flag_id = get_post_meta(get_the_ID(),'_fms_flag',true);
$flag = $flag_id ? wp_get_attachment_image_url($flag_id,'full') : ''; ?>
<a href="<?php the_permalink(); ?>" class="fms-world-card">
<div class="fms-world-card-inner">
<div class="fms-world-card-front">
<h3><?php the_title(); ?></h3>
<p><?php echo get_the_excerpt(); ?></p>
<ul>
<li><?php echo esc_html($sisters); ?> sœurs</li>
<li><?php echo esc_html($communities); ?> communautés</li>
<li>Depuis <?php echo esc_html($year); ?></li>
</ul>
</div>
<div class="fms-world-card-back" style="background-image:url('<?php echo esc_url($flag); ?>');"></div>
</div>
</a>
<?php endwhile; wp_reset_postdata(); ?>
</div>
</section>
<?php endif; ?>