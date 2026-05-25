<?php get_header(); ?>

<?php
$page_title     = get_the_title();
$subtitle       = fms_get_option('pages', 'subtitle', '');
$bg_id          = fms_get_option('pages', 'bg');
$bg             = fms_get_image_url($bg_id);

$hero_height    = fms_get_option('pages', 'hero_height', '280');
$margin_top     = fms_get_option('pages', 'margin_top', '5');
$content_width  = fms_get_option('pages', 'content_width', '1100');
$overlay        = fms_get_option('pages', 'overlay_opacity', '0.45');

if (!$bg) {
    $bg = get_template_directory_uri() . '/assets/images/default-page.jpg';
}
?>

<section class="fms-page-hero"
         style="background-image:url('<?php echo esc_url($bg); ?>'); min-height:<?php echo esc_attr($hero_height); ?>px; margin-top:<?php echo esc_attr($margin_top); ?>px;">

    <div class="fms-page-hero-overlay"
         style="background:rgba(0,0,0,<?php echo esc_attr($overlay); ?>);">

        <div class="fms-page-hero-content">

            <span class="fms-breadcrumb">
                <a href="<?php echo esc_url(home_url()); ?>">Accueil</a>
                > <?php echo esc_html($page_title); ?>
            </span>

            <h1><?php echo esc_html($page_title); ?></h1>

            <?php if ($subtitle): ?>
                <p><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>

        </div>

    </div>
</section>

<section class="fms-page-content">

    <div class="fms-page-container"
         style="max-width:<?php echo esc_attr($content_width); ?>px;">

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>

    </div>

</section>

<?php get_footer(); ?>
