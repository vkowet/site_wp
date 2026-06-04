<?php
$name        = fms_get_option('footer', 'name', 'Sœurs Franciscaines Servantes de Marie');
$bottom_text = fms_get_option('footer', 'bottom_text', 'Site officiel du siège mondial – Blois, France');

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
            <p><?php echo esc_html($bottom_text); ?></p>
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

        <!-- COORDONNÉES OFFICIELLES -->
        <div class="fms-footer-col">
            <h4>Généralat</h4>

            <?php if (!empty($contact)): ?>
                <address>
                    <?php if (!empty($contact['address'])): ?>
                        <?php echo nl2br(esc_html($contact['address'])); ?><br>
                    <?php endif; ?>

                    <?php if (!empty($contact['phone'])): ?>
                        Tél. : <?php echo esc_html($contact['phone']); ?><br>
                    <?php endif; ?>

                    <?php if (!empty($contact['email'])): ?>
                        Courriel :
                        <a href="mailto:<?php echo esc_attr($contact['email']); ?>">
                            <?php echo esc_html($contact['email']); ?>
                        </a>
                    <?php endif; ?>
                </address>
            <?php endif; ?>
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

<?php wp_footer(); ?>
</body>
</html>