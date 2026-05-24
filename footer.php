<?php
$name = get_option('fms_footer_name', 'Sœurs Franciscaines Servantes de Marie');
$address1 = get_option('fms_footer_address1', 'Généralat');
$address2 = get_option('fms_footer_address2', '15 rue Monin');
$city = get_option('fms_footer_city', '41000 BLOIS');
$phone = get_option('fms_footer_phone', '');
$email = get_option('fms_footer_email', '');

$facebook = get_option('fms_footer_facebook', '');
$youtube = get_option('fms_footer_youtube', '');
$instagram = get_option('fms_footer_instagram', '');
$world_link = get_option('fms_footer_world_link', '');

$copyright = get_option('fms_footer_copyright', '© Franciscaines Servantes de Marie');
$bottom_text = get_option('fms_footer_bottom_text', 'Au service de la mission dans le monde');
?>

<footer class="fms-footer">
    <div class="fms-footer-cta">
        <div>
            <span>Restons unis dans la mission</span>
            <p>Au service de l’éducation, de la formation et de la dignité humaine.</p>
        </div>
        <a href="<?php echo esc_url(home_url('/contact')); ?>">Nous contacter</a>
    </div>

    <div class="fms-footer-main">

        <div class="fms-footer-col fms-footer-identity">
            <h3><?php echo esc_html($name); ?></h3>
            <p class="fms-footer-subtitle"><?php echo esc_html($address1); ?></p>
            <p><?php echo esc_html($bottom_text); ?></p>
        </div>

        <div class="fms-footer-col">
            <h4>Accès rapide</h4>
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Accueil</a></li>
                <li><a href="<?php echo esc_url(home_url('/mot-de-la-mere-superieure')); ?>">Mot de la Supérieure Générale</a></li>
                <li><a href="<?php echo esc_url(home_url('/histoire-de-la-fondatrice')); ?>">Histoire de la Fondatrice</a></li>
                <li><a href="<?php echo esc_url(home_url('/presence-mondiale')); ?>">Présence dans le monde</a></li>
                <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
            </ul>
        </div>

        <div class="fms-footer-col">
            <h4>Généralat</h4>
            <address>
                <?php echo esc_html($name); ?><br>
                <?php echo esc_html($address1); ?><br>
                <?php echo esc_html($address2); ?><br>
                <?php echo esc_html($city); ?><br>

                <?php if ($phone): ?>
                    Tél : <?php echo esc_html($phone); ?><br>
                <?php endif; ?>

                <?php if ($email): ?>
                    Email : <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                <?php endif; ?>
            </address>
        </div>

        <div class="fms-footer-col">
            <h4>Liens utiles</h4>
            <ul>
                <li><a href="<?php echo esc_url(home_url('/faire-un-don')); ?>">Faire un don</a></li>
                <li><a href="<?php echo esc_url(home_url('/vocations')); ?>">Vocations</a></li>

                <?php if ($world_link):
