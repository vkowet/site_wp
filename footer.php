<?php
$name        = fms_get_option('footer', 'name', 'Sœurs Franciscaines Servantes de Marie');
$bottom_text = fms_get_option('footer', 'bottom_text', 'Site officiel du siège mondial – Blois, France');
$address1    = fms_get_option('footer', 'address1', '');
$address2    = fms_get_option('footer', 'address2', '');
$city        = fms_get_option('footer', 'city', '');
$phone       = fms_get_option('footer', 'phone', '');
$email       = fms_get_option('footer', 'email', '');
$subtitle    = fms_get_option('footer', 'subtitle', '');

$contact = fms_get_option('contact');
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

        <!-- IDENTITÉ -->
        <div class="fms-footer-col fms-footer-identity">
            <h3><?php echo esc_html($name); ?></h3>
            <?php if (!empty($subtitle)): ?>
            <h4 style="margin: 8px 0 15px 0; font-size: 14px; font-weight: 600; color: #e7ecef;"><?php echo esc_html($subtitle); ?></h4>
            <?php endif; ?>
            <p><?php echo esc_html($bottom_text); ?></p>
            
            <!-- Coordonnées du siège -->
            <?php if (!empty($address1) || !empty($phone) || !empty($email)): ?>
            <address style="margin-top: 15px; font-size: 14px; line-height: 1.6;">
                <?php if (!empty($address1)): ?>
                    <?php echo esc_html($address1); ?><br>
                <?php endif; ?>
                <?php if (!empty($address2)): ?>
                    <?php echo esc_html($address2); ?><br>
                <?php endif; ?>
                <?php if (!empty($city)): ?>
                    <?php echo esc_html($city); ?><br>
                <?php endif; ?>
                
                <?php if (!empty($phone)): ?>
                    Tél. : <?php echo esc_html($phone); ?><br>
                <?php endif; ?>

                <?php if (!empty($email)): ?>
                    Courriel :
                    <a href="mailto:<?php echo esc_attr($email); ?>">
                        <?php echo esc_html($email); ?>
                    </a>
                <?php endif; ?>
            </address>
            <?php endif; ?>
        </div>

        <!-- ACCÈS RAPIDE -->
        <div class="fms-footer-col">
            <h4>Accès rapide</h4>
            <ul>
                <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                <li><a href="<?php echo home_url('/mot-de-la-mere-superieure'); ?>">Mot de la Supérieure Générale</a></li>
                <li><a href="<?php echo home_url('/histoire-de-la-fondatrice'); ?>">Histoire de la Fondatrice</a></li>
                <li><a href="<?php echo home_url('/presence-mondiale'); ?>">Présence dans le monde</a></li>
                <li><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
            </ul>
        </div>

        <!-- LIENS -->
        <div class="fms-footer-col">
            <h4>Liens utiles</h4>
            <ul>
                <li><a href="<?php echo home_url('/faire-un-don'); ?>">Faire un don</a></li>
                <li><a href="<?php echo home_url('/vocations'); ?>">Vocations</a></li>
                <li><a href="<?php echo home_url('/mentions-legales'); ?>">Mentions légales</a></li>
                <li><a href="<?php echo home_url('/politique-de-confidentialite'); ?>">Politique de confidentialité</a></li>
                <li><a href="<?php echo home_url('/plan-du-site'); ?>">Plan du site</a></li>
            </ul>
        </div>

    </div>

    <div class="fms-footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <?php echo esc_html($name); ?> – Tous droits réservés.</p>
        <p><?php echo esc_html($bottom_text); ?></p>
    </div>

</footer>

<button class="fms-back-to-top" type="button" aria-label="Retour en haut de page">↑</button>

<?php wp_footer(); ?>
</body>
</html>