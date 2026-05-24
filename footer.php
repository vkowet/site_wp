<?php
$name        = fms_get_option('footer', 'name', 'Sœurs Franciscaines Servantes de Marie');
$address1    = fms_get_option('footer', 'address1', 'Généralat');
$address2    = fms_get_option('footer', 'address2', '15 rue Monin');
$city        = fms_get_option('footer', 'city', '41000 BLOIS');
$phone       = fms_get_option('footer', 'phone', '');
$email       = fms_get_option('footer', 'email', '');
$bottom_text = fms_get_option('footer', 'bottom_text', 'Site officiel du siège mondial – Blois, France');
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

        <!-- COLONNE IDENTITE -->
        <div class="fms-footer-col fms-footer-identity">
            <h3><?php echo esc_html($name); ?></h3>
            <p class="fms-footer-subtitle"><?php echo esc_html($address1); ?></p>
            <p><?php echo esc_html($bottom_text); ?></p>
        </div>

        <!-- ACCES RAPIDE -->
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

        <!-- GENERALAT -->
        <div class="fms-footer-col">
            <h4>Généralat</h4>
            <address>
                <?php echo esc_html($name); ?><br>
                <?php echo esc_html($address1); ?><br>
                <?php echo esc_html($city); ?><br>

                <?php if ($phone): ?>
                    Tél : <?php echo esc_html($phone); ?><br>
                <?php endif; ?>

                <?php if ($email): ?>
                    Email :
                    <a href="mailto:<?php echo esc_attr($email); ?>">
                        <?php echo esc_html($email); ?>
                    </a>
                <?php endif; ?>
            </address>
        </div>

        <!-- LIENS -->
        <div class="fms-footer-col">
            <h4>Liens utiles</h4>
            <ul>
                <li><a href="<?php echo esc_url(home_url('/faire-un-don')); ?>">Faire un don</a></li>
                <li><a href="<?php echo esc_url(home_url('/vocations')); ?>">Vocations</a></li>
                <li><a href="<?php echo esc_url(home_url('/mentions-legales')); ?>">Mentions légales</a></li>
                <li><a href="<?php echo esc_url(home_url('/politique-de-confidentialite')); ?>">Politique de confidentialité</a></li>
                <li><a href="<?php echo esc_url(home_url('/plan-du-site')); ?>">Plan du site</a></li>
            </ul>
        </div>

    </div>

    <div class="fms-footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <?php echo esc_html($name); ?> – Tous droits réservés.</p>
        <p><?php echo esc_html($bottom_text); ?></p>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
