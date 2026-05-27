<?php
get_header();

$slug = get_post_field('post_name', get_the_ID());

$title = get_the_title();
$content = apply_filters('the_content', get_the_content());

if ($slug === 'mentions-legales') {
    $title = fms_get_option('system','legal_title',$title);
    $content = wpautop(fms_get_option('system','legal_content', get_the_content()));
}

if ($slug === 'politique-de-confidentialite') {
    $title = fms_get_option('system','privacy_title',$title);
    $content = wpautop(fms_get_option('system','privacy_content', get_the_content()));
}

if ($slug === 'faire-un-don') {
    $title = fms_get_option('system','donation_title',$title);

    $button = fms_get_option('system','donation_button','Nous contacter');
    $link = fms_get_option('system','donation_link','/contact');

    $content = wpautop(fms_get_option('system','donation_content', get_the_content()));

    $content .= '<div class="fms-system-cta">';
    $content .= '<a href="'.esc_url($link).'" class="fms-hero-btn">'.esc_html($button).'</a>';
    $content .= '</div>';
}
?>

<section class="fms-system-page-hero">
    <div class="fms-system-page-overlay">
        <div class="fms-system-page-inner">
            <p class="fms-system-breadcrumb">
                <a href="<?php echo home_url(); ?>">Accueil</a>
                <span>></span>
                <?php echo esc_html($title); ?>
            </p>

            <h1><?php echo esc_html($title); ?></h1>
        </div>
    </div>
</section>

<section class="fms-system-page-content">
    <div class="fms-system-page-container">
        <?php echo $content; ?>
    </div>
</section>

<?php get_footer(); ?>
