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
            <h3>Franciscaines Servantes de Marie</h3>
            <p class="fms-footer-subtitle">Siège mondial – Généralat</p>
            <p>Congrégation religieuse présente dans le monde, au service de la mission, de l’éducation et de l’Évangile.</p>
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
                Sœurs Franciscaines Servantes de Marie<br>
                Généralat<br>
                15 rue Monin<br>
                41000 BLOIS<br>
                France
            </address>
        </div>

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
        <p>&copy; <?php echo date('Y'); ?> Franciscaines Servantes de Marie – Tous droits réservés.</p>
        <p>Site officiel du siège mondial – Blois, France</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>