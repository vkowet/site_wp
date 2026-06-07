<?php
/**
 * Template Name: Contenu (Design FMS)
 * Template Post Type: page
 * Description: Page avec le design et les styles du thème FMS
 */

get_header();

// Get page data
$page_title = get_the_title();
$page_content = get_the_content();
$post_id = get_the_ID();
?>

<!-- Hero Header -->
<section class="fms-system-page-hero">
    <div class="fms-system-page-overlay">
        <div class="fms-system-page-inner">
            <p class="fms-system-breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Accueil</a>
                <span>›</span>
                <?php echo esc_html($page_title); ?>
            </p>
            <h1><?php echo esc_html($page_title); ?></h1>
        </div>
    </div>
</section>

<!-- Page Content -->
<div class="fms-generic-page-wrapper">
    <div class="fms-system-page-container">
        <div class="fms-page-content">
            <?php 
                // Display page content with WordPress editor
                if (!empty($page_content)) {
                    echo wpautop(wp_kses_post($page_content));
                }
            ?>
        </div>
    </div>
</div>

<?php 
// Display page comments if enabled
if (comments_open() || get_comments_number()) {
    echo '<div class="fms-system-page-container"><div class="fms-page-comments">';
    comments_template();
    echo '</div></div>';
}

get_footer(); 
?>
