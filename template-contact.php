<?php
/**
 * Template Name: Contact (FMS)
 * Template Post Type: page
 * Description: Page de contact avec formulaire paramétré
 */

get_header();

$title = fms_get_option('contact', 'page_title', 'Nous Contacter');
$intro = fms_get_option('contact', 'page_intro', '');
$form_result = fms_handle_contact_form();

// Form fields
$form_title = fms_get_option('contact', 'form_title', 'Formulaire de contact');
$form_description = fms_get_option('contact', 'form_description', '');
$label_name = fms_get_option('contact', 'label_name', 'Votre nom');
$placeholder_name = fms_get_option('contact', 'placeholder_name', 'Jean Dupont');
$label_email = fms_get_option('contact', 'label_email', 'Votre email');
$placeholder_email = fms_get_option('contact', 'placeholder_email', 'jean@example.com');
$label_message = fms_get_option('contact', 'label_message', 'Votre message');
$placeholder_message = fms_get_option('contact', 'placeholder_message', 'Écrivez votre message ici...');
$button_text = fms_get_option('contact', 'button_text', 'Envoyer');

// Messages
$message_success = fms_get_option('contact', 'message_success', 'Merci ! Votre message a été envoyé avec succès.');
$message_error = fms_get_option('contact', 'message_error', 'Une erreur est survenue. Veuillez réessayer.');
$message_validation_error = fms_get_option('contact', 'message_validation_error', 'Veuillez remplir tous les champs obligatoires.');
$error_name_required = fms_get_option('contact', 'error_name_required', 'Le nom est requis');
$error_email_required = fms_get_option('contact', 'error_email_required', 'L\'email est requis');
$error_message_required = fms_get_option('contact', 'error_message_required', 'Le message est requis');

// Info section
$section_info_title = fms_get_option('contact', 'section_info_title', 'Nos coordonnées');

$contact = fms_get_option('contact');
?>

<!-- Hero Header -->
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

<!-- Page Content -->
<div class="contact-page">
    <div class="fms-system-page-container">
        <?php if (!empty($intro)): ?>
        <div class="contact-header-text">
            <?php echo wpautop(wp_kses_post($intro)); ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Contact Wrapper -->
<div class="fms-contact-wrapper">
    <div class="fms-system-page-container">
        <div class="contact-content">
            
            <!-- Info Section (Left) -->
            <div class="contact-infos">
                <h3><?php echo esc_html($section_info_title); ?></h3>

                <?php if (!empty($contact['address'])): ?>
                <div class="info-item">
                    <span class="info-icon">📍</span>
                    <p><?php echo nl2br(esc_html($contact['address'])); ?></p>
                </div>
                <?php endif; ?>

                <?php if (!empty($contact['phone'])): ?>
                <div class="info-item">
                    <span class="info-icon">☎️</span>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $contact['phone'])); ?>">
                        <?php echo esc_html($contact['phone']); ?>
                    </a>
                </div>
                <?php endif; ?>

                <?php if (!empty($contact['email'])): ?>
                <div class="info-item">
                    <span class="info-icon">✉️</span>
                    <a href="mailto:<?php echo esc_attr($contact['email']); ?>">
                        <?php echo esc_html($contact['email']); ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>

            <!-- Form Section (Right) -->
            <div class="contact-form">
                <h3><?php echo esc_html($form_title); ?></h3>
                <?php if (!empty($form_description)): ?>
                <p class="form-description"><?php echo esc_html($form_description); ?></p>
                <?php endif; ?>

                <!-- Success Message -->
                <?php if ($form_result && $form_result['success']): ?>
                <div class="form-success">
                    ✓ <?php echo esc_html($form_result['message']); ?>
                </div>
                <?php endif; ?>

                <!-- Error Message -->
                <?php if ($form_result && !$form_result['success'] && isset($form_result['message']) && !empty($form_result['message'])): ?>
                <div class="form-error">
                    ✗ <?php echo esc_html($form_result['message']); ?>
                </div>
                <?php endif; ?>

                <!-- Validation Errors -->
                <?php if ($form_result && !empty($form_result['errors'])): ?>
                <div class="form-validation-errors">
                    <ul>
                        <?php foreach ($form_result['errors'] as $error): ?>
                        <li><?php echo esc_html($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <!-- Form -->
                <form method="POST" class="contact-form-fields">
                    <?php wp_nonce_field('fms_contact_form', 'fms_contact_nonce'); ?>

                    <div class="form-group">
                        <label for="contact_name"><?php echo esc_html($label_name); ?> *</label>
                        <input 
                            type="text" 
                            id="contact_name" 
                            name="contact_name" 
                            placeholder="<?php echo esc_attr($placeholder_name); ?>"
                            value="<?php echo isset($_POST['contact_name']) ? esc_attr(sanitize_text_field($_POST['contact_name'])) : ''; ?>"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="contact_email"><?php echo esc_html($label_email); ?> *</label>
                        <input 
                            type="email" 
                            id="contact_email" 
                            name="contact_email" 
                            placeholder="<?php echo esc_attr($placeholder_email); ?>"
                            value="<?php echo isset($_POST['contact_email']) ? esc_attr(sanitize_email($_POST['contact_email'])) : ''; ?>"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="contact_message"><?php echo esc_html($label_message); ?> *</label>
                        <textarea 
                            id="contact_message" 
                            name="contact_message" 
                            placeholder="<?php echo esc_attr($placeholder_message); ?>"
                            required
                        ><?php echo isset($_POST['contact_message']) ? esc_textarea(sanitize_textarea_field($_POST['contact_message'])) : ''; ?></textarea>
                    </div>

                    <button type="submit" class="donation-btn donation-btn-primary">
                        <?php echo esc_html($button_text); ?>
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
