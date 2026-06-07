<?php
/**
 * Template Name: Donation
 * Description: Page de soutien pour les Soeurs Franciscaines Servantes de Marie
 */

get_header();

if (!function_exists('fms_donation_option')) {
    function fms_donation_option($field, $default = '') {
        $value = fms_get_option('donation', $field, $default);
        return trim((string) $value) !== '' ? $value : $default;
    }
}

if (!function_exists('fms_donation_link')) {
    function fms_donation_link($url, $fallback = '') {
        $url = trim((string) $url);
        if ($url === '') {
            $url = $fallback;
        }
        if ($url === '') {
            return '';
        }
        if ($url[0] === '#') {
            return $url;
        }
        if (strpos($url, '/') === 0) {
            return home_url($url);
        }
        return $url;
    }
}

$title = fms_donation_option('title', 'Faire un don');
$intro = fms_donation_option('intro', 'Votre generosite soutient les missions des Soeurs Franciscaines Servantes de Marie, au service de la fraternite, de l’accueil et de la dignite humaine.');

$methods_section_title = fms_donation_option('methods_section_title', 'Choisissez votre mode de soutien');

$online_label = fms_donation_option('online_label', 'Don securise');
$online_title = fms_donation_option('online_title', 'Faire un don en ligne');
$online_description = fms_donation_option('online_description', 'Soutenez directement les missions de la Congregation depuis une plateforme de don securisee.');
$online_button_text = fms_donation_option('online_button_text', 'Donner en ligne');
$online_button_url = fms_donation_link(fms_get_option('donation', 'online_button_url', ''), '/contact/');

$check_label = fms_donation_option('check_label', 'Envoi postal');
$check_title = fms_donation_option('check_title', 'Faire un don par cheque');
$check_description = fms_donation_option('check_description', 'Adressez votre don a la communaute en indiquant vos coordonnees pour le suivi administratif.');
$check_button_text = fms_donation_option('check_button_text', 'Voir les informations cheque');
$check_detail_title = fms_donation_option('check_detail_title', 'Informations pour l’envoi du cheque');
$check_address = fms_donation_option('check_address', "Soeurs Franciscaines Servantes de Marie\nMaison-mere\nBlois, France");
$check_fiscal_info = fms_donation_option('check_fiscal_info', 'Un recu peut etre etabli lorsque les informations necessaires sont transmises avec le don.');
$check_fiscal_title = fms_donation_option('check_fiscal_title', 'Information fiscale');
$check_modal_fields_title = fms_donation_option('check_modal_fields_title', 'Informations à renseigner sur le chèque');
$check_modal_fields = fms_donation_option('check_modal_fields', "Ordre du chèque
Montant
Date et lieu
Signature");
$check_modal_reminder = fms_donation_option('check_modal_reminder', 'Merci de joindre vos coordonnées complètes avec votre don afin de recevoir votre reçu ou justificatif.');

$phone_label = fms_donation_option('phone_label', 'Contact direct');
$phone_title = fms_donation_option('phone_title', 'Faire un don par telephone');
$phone_description = fms_donation_option('phone_description', 'Echangez avec une personne de contact pour etre accompagne dans votre demarche de soutien.');
$phone_number = fms_donation_option('phone_number', 'A renseigner');
$phone_button_text = fms_donation_option('phone_button_text', 'Contacter la communaute');
$phone_detail_title = fms_donation_option('phone_detail_title', 'Disponibilite');
$phone_hours = fms_donation_option('phone_hours', 'Du lundi au vendredi, selon les disponibilites de la maison.');
$phone_digits = preg_replace('/[^0-9+]/', '', $phone_number);
$phone_link = $phone_digits !== '' ? 'tel:' . $phone_digits : fms_donation_link('', '/contact/');

$show_values = (bool) fms_get_option('donation', 'show_values', 1);
$values_section_title = fms_donation_option('values_section_title', 'Pourquoi soutenir nos missions ?');
$value1_title = fms_donation_option('value1_title', 'Accompagner');
$value1_description = fms_donation_option('value1_description', 'Votre soutien aide les communautes a demeurer proches des personnes fragiles, des familles et des jeunes.');
$value2_title = fms_donation_option('value2_title', 'Servir');
$value2_description = fms_donation_option('value2_description', 'Vos dons participent aux actions educatives, sociales, pastorales et fraternelles portees localement.');
$value3_title = fms_donation_option('value3_title', 'Transmettre');
$value3_description = fms_donation_option('value3_description', 'Vous contribuez a transmettre un esprit franciscain fait de simplicite, de paix et d’esperance.');

$fiscal_content = fms_donation_option('fiscal_content', 'Les dons sont defiscalises selon la reglementation applicable. Un recu peut etre transmis avec les informations necessaires.');
?>

<section class="fms-system-page-hero donation-hero">
    <div class="fms-system-page-overlay">
        <div class="fms-system-page-inner">
            <p class="fms-system-breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Accueil</a>
                <span>›</span>
                <?php echo esc_html($title); ?>
            </p>
            <h1><?php echo esc_html($title); ?></h1>
        </div>
    </div>
</section>

<div class="donation-page-wrapper">
    <section class="donation-intro-section">
        <div class="fms-system-page-container">
            <p class="donation-intro-text"><?php echo esc_html($intro); ?></p>
            <?php if (!empty($fiscal_content)): ?>
                <p class="donation-fiscal-note"><?php echo esc_html($fiscal_content); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <section class="donation-methods-section">
        <div class="fms-system-page-container">
            <h2 class="section-title"><?php echo esc_html($methods_section_title); ?></h2>

            <div class="donation-methods-grid" aria-label="<?php echo esc_attr($methods_section_title); ?>">
                <article class="donation-method-card online-method">
                    <span class="method-kicker"><?php echo esc_html($online_label); ?></span>
                    <h3><?php echo esc_html($online_title); ?></h3>
                    <p class="method-description"><?php echo esc_html($online_description); ?></p>
                    <a href="<?php echo esc_url($online_button_url); ?>" class="donation-btn donation-btn-primary">
                        <?php echo esc_html($online_button_text); ?>
                    </a>
                </article>

                <article class="donation-method-card check-method">
                    <span class="method-kicker"><?php echo esc_html($check_label); ?></span>
                    <h3><?php echo esc_html($check_title); ?></h3>
                    <p class="method-description"><?php echo esc_html($check_description); ?></p>
                    <button type="button" class="donation-btn donation-btn-secondary" data-donation-modal-open="donation-check-modal">
                        <?php echo esc_html($check_button_text); ?>
                    </button>
                </article>

                <article class="donation-method-card phone-method">
                    <span class="method-kicker"><?php echo esc_html($phone_label); ?></span>
                    <h3><?php echo esc_html($phone_title); ?></h3>
                    <p class="method-description"><?php echo esc_html($phone_description); ?></p>
                    <a href="<?php echo esc_url($phone_link); ?>" class="donation-btn donation-btn-secondary">
                        <?php echo esc_html($phone_button_text); ?>
                    </a>
                </article>
            </div>

            <div class="donation-check-modal" id="donation-check-modal" role="dialog" aria-modal="true" aria-labelledby="donation-check-modal-title" hidden>
                <div class="donation-check-modal__backdrop" data-donation-modal-close></div>
                <div class="donation-check-modal__dialog" tabindex="-1">
                    <button type="button" class="donation-check-modal__close" aria-label="Fermer" data-donation-modal-close>×</button>
                    <h3 id="donation-check-modal-title"><?php echo esc_html($check_detail_title); ?></h3>

                    <div class="donation-check-modal__section">
                        <h4>Adresse d’envoi</h4>
                        <div class="address-content"><?php echo nl2br(esc_html($check_address)); ?></div>
                    </div>

                    <div class="donation-check-modal__section">
                        <h4><?php echo esc_html($check_modal_fields_title); ?></h4>
                        <div class="donation-check-modal__lines"><?php echo nl2br(esc_html($check_modal_fields)); ?></div>
                    </div>

                    <div class="donation-check-modal__reminder">
                        <strong><?php echo esc_html($check_fiscal_title); ?></strong>
                        <p><?php echo esc_html($check_modal_reminder); ?></p>
                        <?php if (!empty($check_fiscal_info)): ?>
                            <p><?php echo esc_html($check_fiscal_info); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if ($show_values): ?>
        <section class="donation-values-section">
            <div class="fms-system-page-container">
                <h2 class="section-title"><?php echo esc_html($values_section_title); ?></h2>

                <div class="donation-values-grid">
                    <div class="value-card">
                        <h3><?php echo esc_html($value1_title); ?></h3>
                        <p><?php echo esc_html($value1_description); ?></p>
                    </div>

                    <div class="value-card">
                        <h3><?php echo esc_html($value2_title); ?></h3>
                        <p><?php echo esc_html($value2_description); ?></p>
                    </div>

                    <div class="value-card">
                        <h3><?php echo esc_html($value3_title); ?></h3>
                        <p><?php echo esc_html($value3_description); ?></p>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

</div>

<?php get_footer(); ?>
