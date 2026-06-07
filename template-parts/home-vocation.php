<?php
$title  = fms_get_option('homepage', 'vocation_title', 'RÉPONDRE À L’APPEL DU SERVICE');
$text   = fms_get_option('homepage', 'vocation_text', 'La vocation franciscaine est un chemin de foi, de service et d’éducation, au service des plus fragiles et de la mission dans le monde.');
$button = fms_get_option('homepage', 'vocation_button_text', 'Découvrir les vocations');
$link   = fms_get_option('homepage', 'vocation_button_link', home_url('/vocations'));

$bg_id = fms_get_option('homepage', 'vocation_bg');
$bg    = fms_get_image_url($bg_id);

if (!$bg) {
    $bg = fms_get_image_url(fms_get_option('homepage', 'hero_image'), 'full');
}
?>

<section class="fms-vocation-section"
         style="background: url('<?php echo esc_url($bg); ?>') center/cover no-repeat;">

    <div class="fms-vocation-overlay">

        <div class="fms-vocation-content">

            <?php if ($title): ?>
                <h2><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if ($text): ?>
                <p><?php echo esc_html($text); ?></p>
            <?php endif; ?>

            <?php if ($button): ?>
                <a href="<?php echo esc_url($link); ?>" class="fms-vocation-btn">
                    <?php echo esc_html($button); ?>
                </a>
            <?php endif; ?>

        </div>

    </div>

</section>
