<?php
$title = get_option('fms_vocation_title', 'RÉPONDRE À L’APPEL DU SERVICE');
$text = get_option('fms_vocation_text', 'La vocation franciscaine est un chemin de foi, de service et d’éducation, au service des plus fragiles et de la mission dans le monde.');
$button = get_option('fms_vocation_button_text', 'Découvrir les vocations');
$link = get_option('fms_vocation_button_link', home_url('/vocations'));
$bg = get_option('fms_vocation_bg', '/wp-content/uploads/2025/05/vocation-bg.jpg');
?>

<section class="fms-vocation-section" style="background: url('<?php echo esc_url($bg); ?>') center/cover no-repeat;">

    <div class="fms-vocation-overlay">

        <div class="fms-vocation-content">

            <h2><?php echo esc_html($title); ?></h2>

            <p>
                <?php echo esc_html($text); ?>
            </p>

            <?php if ($button): ?>
                <a href="<?php echo esc_url($link); ?>" class="fms-vocation-btn">
                    <?php echo esc_html($button); ?>
                </a>
            <?php endif; ?>

        </div>

    </div>

</section>
