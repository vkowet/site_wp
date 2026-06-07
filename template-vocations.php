<?php
/**
 * Template Name: Vocations (FMS)
 * Template Post Type: page
 * Description: Page de vocations avec design institutionnel
 */

get_header();

if (!function_exists('fms_vocations_option')) {
    function fms_vocations_option($field, $default = '') {
        $value = fms_get_option('vocations', $field, $default);

        return $value === '' || $value === null ? $default : $value;
    }
}

// Récupérer tous les paramètres de l'onglet vocations
$title = fms_vocations_option('title', 'Vocations');
$intro_title = fms_vocations_option('intro_title', 'Discerner un appel à servir');
$intro_text = fms_vocations_option('intro_text', 'La vocation religieuse naît souvent dans le silence d’un désir profond : aimer Dieu, servir les autres et donner sa vie pour une mission qui dépasse nos propres projets. Chez les Sœurs Franciscaines Servantes de Marie, cet appel se découvre pas à pas, dans la prière, l’écoute, la fraternité et le service des personnes confiées à notre présence.');

// Section Vocation Franciscaine
$vocation_title = fms_vocations_option('vocation_title', 'La vocation franciscaine');
$vocation_description = fms_vocations_option('vocation_description', 'Entrer dans la vie religieuse, c’est répondre librement à l’amour de Dieu et choisir de marcher à la suite du Christ dans une vie donnée. Cette réponse se nourrit de la prière, de la Parole de Dieu, de la vie fraternelle et d’un service humble auprès de celles et ceux qui ont besoin d’être accueillis, accompagnés et relevés.

Comme Franciscaines Servantes de Marie, nous cherchons à vivre l’Évangile dans la simplicité, la joie et la proximité. L’esprit de saint François nous invite à reconnaître chaque personne comme un frère ou une sœur, tandis que Marie nous apprend la disponibilité, la confiance et le service discret.

Notre vocation se déploie dans les lieux où la congrégation est appelée : l’éducation, la formation, l’accompagnement humain et spirituel, l’attention aux plus fragiles et la construction d’une fraternité ouverte à tous.');
$vocation_subtitle = fms_vocations_option('vocation_subtitle', 'À la suite du Christ, avec saint François et Marie');

// Section Charisme
$charism_title = fms_vocations_option('charism_title', 'Vivre notre charisme');
$charism_intro = fms_vocations_option('charism_intro', 'Notre charisme unit la contemplation et l’action. Il se vit dans une présence simple, fraternelle et disponible, au service de la dignité humaine et de la croissance de chaque personne.');

$value1_title = fms_vocations_option('value1_title', 'Service');
$value1_desc = fms_vocations_option('value1_desc', 'Servir, pour nous, c’est nous rendre proches avec simplicité et respect. Dans les gestes quotidiens comme dans les grandes missions, nous désirons manifester la tendresse de Dieu et contribuer à la dignité de chaque personne.');
$value2_title = fms_vocations_option('value2_title', 'Compassion');
$value2_desc = fms_vocations_option('value2_desc', 'La compassion nous apprend à écouter avant de parler, à accueillir avant de juger, à accompagner sans brusquer. Elle ouvre un chemin de consolation, de confiance et d’espérance auprès des personnes blessées ou fragilisées.');
$value3_title = fms_vocations_option('value3_title', 'Fidélité');
$value3_desc = fms_vocations_option('value3_desc', 'La fidélité se construit jour après jour dans la prière, la vie communautaire et la mission. Elle nous garde disponibles à l’appel de Dieu et nous aide à demeurer présentes, même lorsque le chemin demande patience et confiance.');

// Section Appel à la réflexion
$reflection_title = fms_vocations_option('reflection_title', 'Et vous ?');
$reflection_text = fms_vocations_option('reflection_text', 'Vous portez une question, un désir de vie donnée, une attirance pour la prière, la fraternité ou le service ? Le discernement ne demande pas d’avoir déjà toutes les réponses. Il commence souvent par une conversation simple, un temps d’écoute, une rencontre.

Nous serons heureuses de cheminer avec vous, dans le respect de votre histoire et de votre rythme, pour vous aider à reconnaître ce que le Seigneur dépose dans votre cœur.');
$reflection_cta_text = fms_vocations_option('reflection_cta_text', 'Parlons de votre vocation');

// Section Contact
$contact_title = fms_vocations_option('contact_title', 'Contactez-nous');
$contact_description = fms_vocations_option('contact_description', 'Pour poser une question, demander un échange ou être accompagnée dans un discernement vocationnel, vous pouvez nous écrire. Votre message sera accueilli avec discrétion, attention et bienveillance.');
$contact_email = fms_vocations_option('contact_email', '');
$contact_phone = fms_vocations_option('contact_phone', '');
?>

<!-- Page Hero Header -->
<section class="fms-system-page-hero">
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

<!-- Main Content -->
<div class="vocations-page-wrapper">

    <!-- Introduction Section -->
    <section class="vocations-intro-section">
        <div class="fms-system-page-container">
            <div class="vocations-intro-content">
                <h2><?php echo esc_html($intro_title); ?></h2>
                <p><?php echo nl2br(esc_html($intro_text)); ?></p>
            </div>
        </div>
    </section>

    <!-- Vocation Franciscaine Section -->
    <section class="vocations-main-section">
        <div class="fms-system-page-container">
            <div class="vocations-two-col">
                <div class="vocations-text-col">
                    <h2><?php echo esc_html($vocation_title); ?></h2>
                    <h3 class="vocations-subtitle"><?php echo esc_html($vocation_subtitle); ?></h3>
                    <div class="vocations-description">
                        <?php echo wpautop(wp_kses_post($vocation_description)); ?>
                    </div>
                </div>
                <div class="vocations-visual-col">
                    <div class="vocations-visual-box">
                        <span class="visual-icon">✨</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Charism Section -->
    <section class="vocations-charism-section">
        <div class="fms-system-page-container">
            <h2><?php echo esc_html($charism_title); ?></h2>
            <p class="charism-intro"><?php echo nl2br(esc_html($charism_intro)); ?></p>
            
            <div class="vocations-values-grid">
                <!-- Value 1 -->
                <div class="vocations-value-card">
                    <div class="value-number">01</div>
                    <div class="value-icon">🤝</div>
                    <h3><?php echo esc_html($value1_title); ?></h3>
                    <p><?php echo nl2br(esc_html($value1_desc)); ?></p>
                </div>

                <!-- Value 2 -->
                <div class="vocations-value-card">
                    <div class="value-number">02</div>
                    <div class="value-icon">💝</div>
                    <h3><?php echo esc_html($value2_title); ?></h3>
                    <p><?php echo nl2br(esc_html($value2_desc)); ?></p>
                </div>

                <!-- Value 3 -->
                <div class="vocations-value-card">
                    <div class="value-number">03</div>
                    <div class="value-icon">🙏</div>
                    <h3><?php echo esc_html($value3_title); ?></h3>
                    <p><?php echo nl2br(esc_html($value3_desc)); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Reflection Section -->
    <section class="vocations-reflection-section">
        <div class="fms-system-page-container">
            <div class="reflection-content">
                <h2><?php echo esc_html($reflection_title); ?></h2>
                <p><?php echo nl2br(esc_html($reflection_text)); ?></p>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="reflection-btn">
                    <?php echo esc_html($reflection_cta_text); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="vocations-contact-section">
        <div class="fms-system-page-container">
            <div class="contact-grid">
                <div class="contact-text">
                    <h2><?php echo esc_html($contact_title); ?></h2>
                    <p><?php echo nl2br(esc_html($contact_description)); ?></p>
                </div>
                <div class="contact-info">
                    <?php if (!empty($contact_email)): ?>
                    <div class="contact-item">
                        <span class="contact-icon">✉️</span>
                        <div>
                            <strong>Email</strong><br>
                            <a href="mailto:<?php echo esc_attr($contact_email); ?>">
                                <?php echo esc_html($contact_email); ?>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($contact_phone)): ?>
                    <div class="contact-item">
                        <span class="contact-icon">☎️</span>
                        <div>
                            <strong>Téléphone</strong><br>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $contact_phone)); ?>">
                                <?php echo esc_html($contact_phone); ?>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
