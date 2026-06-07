<?php
/* Template Name: Page Contact */
get_header();

$contact = fms_get_contact();

// Traiter le formulaire si soumis
$form_result = fms_handle_contact_form();

$post_content = '';
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $post_content = trim(get_the_content());
    }
}

// Récupérer tous les paramètres du formulaire depuis les options
$contact_options = fms_get_option('contact', null, []);
$page_title = fms_get_option('contact', 'page_title', 'Nous Contacter');
$page_intro = fms_get_option('contact', 'page_intro', 'N\'hésitez pas à nous contacter pour toute question ou demande d\'information.');
$form_title = fms_get_option('contact', 'form_title', 'Nous écrire');
$form_description = fms_get_option('contact', 'form_description', 'Remplissez le formulaire ci-dessous pour nous contacter. Nous revenons vers vous dans les meilleurs délais.');
$label_name = fms_get_option('contact', 'label_name', 'Nom');
$placeholder_name = fms_get_option('contact', 'placeholder_name', 'Votre nom complet');
$label_email = fms_get_option('contact', 'label_email', 'Email');
$placeholder_email = fms_get_option('contact', 'placeholder_email', 'votre.email@domaine.fr');
$label_message = fms_get_option('contact', 'label_message', 'Message');
$placeholder_message = fms_get_option('contact', 'placeholder_message', 'Écrivez votre message ici...');
$button_text = fms_get_option('contact', 'button_text', 'Envoyer mon message');
$section_info_title = fms_get_option('contact', 'section_info_title', 'Coordonnées');
?>

<main class="contact-page">

    <header class="contact-header">
        <h1><?php echo esc_html($page_title); ?></h1>

        <?php if (!empty($page_intro)): ?>
            <p><?php echo esc_html($page_intro); ?></p>
        <?php endif; ?>
    </header>

    <div class="fms-contact-wrapper">
        <section class="contact-content">

            <!-- Contact Information Section -->
            <div class="contact-infos">
                <h2><?php echo esc_html($section_info_title); ?></h2>

                <?php if (!empty($contact['address'])): ?>
                    <p>
                        <strong>Adresse</strong><br>
                        <?php fms_echo_nl2br($contact['address']); ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($contact['phone'])): ?>
                    <p>
                        <strong>Téléphone</strong><br>
                        <a href="tel:<?php echo esc_attr( preg_replace('/[^0-9+]/', '', $contact['phone']) ); ?>">
                            <?php echo esc_html($contact['phone']); ?>
                        </a>
                    </p>
                <?php endif; ?>

                <?php if (!empty($contact['email'])): ?>
                    <p>
                        <strong>Courriel</strong><br>
                        <a href="mailto:<?php echo esc_attr($contact['email']); ?>">
                            <?php echo esc_html($contact['email']); ?>
                        </a>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Contact Form Section -->
            <div class="contact-form">
                <h2><?php echo esc_html($form_title); ?></h2>

                <?php if (!empty($post_content)): ?>
                    <?php echo apply_filters('the_content', $post_content); ?>
                <?php else: ?>
                    <p><?php echo esc_html($form_description); ?></p>
                <?php endif; ?>

                <!-- Custom Contact Form -->
                <form method="POST" class="fms-contact-form" novalidate>
                    
                    <?php wp_nonce_field('fms_contact_form', 'fms_contact_nonce'); ?>

                    <!-- Form Messages -->
                    <?php if (!empty($form_result['message'])): ?>
                        <div class="form-message <?php echo $form_result['success'] ? 'form-success' : 'form-error'; ?>">
                            <?php echo esc_html($form_result['message']); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Nom -->
                    <div class="form-group <?php echo !empty($form_result['errors']['name']) ? 'has-error' : ''; ?>">
                        <label for="contact_name">
                            <?php echo esc_html($label_name); ?> <span class="required">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="contact_name" 
                            name="contact_name" 
                            placeholder="<?php echo esc_attr($placeholder_name); ?>"
                            value="<?php echo isset($_POST['contact_name']) ? esc_attr(sanitize_text_field($_POST['contact_name'])) : ''; ?>"
                            required
                            aria-required="true"
                        >
                        <?php if (!empty($form_result['errors']['name'])): ?>
                            <span class="error-message"><?php echo esc_html($form_result['errors']['name']); ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Email -->
                    <div class="form-group <?php echo !empty($form_result['errors']['email']) ? 'has-error' : ''; ?>">
                        <label for="contact_email">
                            <?php echo esc_html($label_email); ?> <span class="required">*</span>
                        </label>
                        <input 
                            type="email" 
                            id="contact_email" 
                            name="contact_email" 
                            placeholder="<?php echo esc_attr($placeholder_email); ?>"
                            value="<?php echo isset($_POST['contact_email']) ? esc_attr(sanitize_email($_POST['contact_email'])) : ''; ?>"
                            required
                            aria-required="true"
                        >
                        <?php if (!empty($form_result['errors']['email'])): ?>
                            <span class="error-message"><?php echo esc_html($form_result['errors']['email']); ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Message -->
                    <div class="form-group <?php echo !empty($form_result['errors']['message']) ? 'has-error' : ''; ?>">
                        <label for="contact_message">
                            <?php echo esc_html($label_message); ?> <span class="required">*</span>
                        </label>
                        <textarea 
                            id="contact_message" 
                            name="contact_message" 
                            placeholder="<?php echo esc_attr($placeholder_message); ?>"
                            required
                            aria-required="true"
                        ><?php echo isset($_POST['contact_message']) ? esc_textarea(sanitize_textarea_field($_POST['contact_message'])) : ''; ?></textarea>
                        <?php if (!empty($form_result['errors']['message'])): ?>
                            <span class="error-message"><?php echo esc_html($form_result['errors']['message']); ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="fms-submit-btn"><?php echo esc_html($button_text); ?></button>

                </form>

            </div>

        </section>
    </div>

</main>

<?php get_footer(); ?>