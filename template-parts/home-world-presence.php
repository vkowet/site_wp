<?php
$section_title    = fms_get_option('homepage', 'world_title', 'PRÉSENCE DANS LE MONDE');
$section_subtitle = fms_get_option('homepage', 'world_subtitle', 'Une mission vivante au service des peuples sur plusieurs continents.');
$button_text      = fms_get_option('homepage', 'world_button_text', 'Découvrir notre présence mondiale');
$button_link      = fms_get_option('homepage', 'world_button_link', home_url('/presence-mondiale'));
$max_items        = (int) fms_get_option('homepage', 'world_max_items', 6);

$label_sisters      = fms_get_option('homepage', 'world_label_sisters', 'sœurs');
$label_communities  = fms_get_option('homepage', 'world_label_communities', 'communautés');
$label_since        = fms_get_option('homepage', 'world_label_since', 'Depuis');

$query = new WP_Query([
    'post_type'      => 'world_presence',
    'posts_per_page' => $max_items,
    'meta_key'       => '_fms_order',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC'
]);

if ($query->have_posts()) : ?>
<section class="fms-world-section">

    <h2><?php echo esc_html($section_title); ?></h2>

    <?php if ($section_subtitle): ?>
        <p class="fms-world-subtitle"><?php echo esc_html($section_subtitle); ?></p>
    <?php endif; ?>

    <div class="fms-world-grid">

        <?php while ($query->have_posts()) : $query->the_post();

            $sisters       = get_post_meta(get_the_ID(), '_fms_sisters', true);
            $communities   = get_post_meta(get_the_ID(), '_fms_communities', true);
            $year          = get_post_meta(get_the_ID(), '_fms_year', true);

            $flag_id       = get_post_meta(get_the_ID(), '_fms_flag', true);
            $flag          = $flag_id ? wp_get_attachment_image_url($flag_id, 'full') : '';

            $front_mode    = get_post_meta(get_the_ID(), '_fms_front_mode', true);
            $front_mode    = $front_mode ?: 'text';

            $front_image_id = get_post_meta(get_the_ID(), '_fms_front_image', true);
            $front_image    = $front_image_id ? wp_get_attachment_image_url($front_image_id, 'full') : '';
        ?>

        <a href="<?php the_permalink(); ?>" class="fms-world-card">
            <div class="fms-world-card-inner">

                <?php if ($front_mode === 'image' && $front_image): ?>

                    <div class="fms-world-card-front fms-front-image-mode"
                         style="background-image:url('<?php echo esc_url($front_image); ?>'); background-size:cover; background-position:center;">

                        <div class="fms-world-image-title">
    <h3><?php the_title(); ?></h3>
</div>

                    </div>

                <?php else: ?>

                    <div class="fms-world-card-front fms-front-text-mode">

                        <h3><?php the_title(); ?></h3>

                        <p><?php echo get_the_excerpt(); ?></p>

                        <ul>
                            <li><?php echo esc_html($sisters); ?> <?php echo esc_html($label_sisters); ?></li>
                            <li><?php echo esc_html($communities); ?> <?php echo esc_html($label_communities); ?></li>
                            <li><?php echo esc_html($label_since); ?> <?php echo esc_html($year); ?></li>
                        </ul>

                    </div>

                <?php endif; ?>

                <div class="fms-world-card-back"
                     style="background-image:url('<?php echo esc_url($flag); ?>');">
                </div>

            </div>
        </a>

        <?php endwhile; wp_reset_postdata(); ?>

    </div>

    <?php if ($button_text): ?>
        <div class="fms-world-footer" style="text-align:center;margin-top:40px;">
            <a href="<?php echo esc_url($button_link); ?>" class="fms-hero-btn">
                <?php echo esc_html($button_text); ?>
            </a>
        </div>
    <?php endif; ?>

</section>
<?php endif; ?>
