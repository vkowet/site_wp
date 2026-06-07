<?php
/**
 * Helpers – FMS Theme
 * Centralisation des accès aux options, utilitaires thème,
 * préparation multilingue, mobile et SEO.
 */

/* ======================================================
   OPTIONS GLOBALES
   ====================================================== */

/**
 * Retourne toutes les options du thème
 */
function fms_get_options() {
    return get_option('fms_theme_options', []);
}

/**
 * Récupère une option du thème par section / champ
 */
function fms_get_option($section, $field = null, $default = '') {

    $options = fms_get_options();

    if (!isset($options[$section])) {
        return $default;
    }

    // Si on demande toute la section
    if ($field === null) {
        return is_array($options[$section])
            ? $options[$section]
            : $default;
    }

    if (
        is_array($options[$section]) &&
        array_key_exists($field, $options[$section])
    ) {
        return $options[$section][$field];
    }

    return $default;
}


/* ======================================================
   IMAGES
   ====================================================== */

/**
 * Retourne l’URL d’une image WordPress
 */
function fms_get_image_url($attachment_id, $size = 'full') {

    if (empty($attachment_id)) {
        return '';
    }

    return wp_get_attachment_image_url($attachment_id, $size) ?: '';
}

/**
 * Alias historique (compatibilité)
 */
function fms_get_theme_image_url($attachment_id) {
    return fms_get_image_url($attachment_id);
}


/* ======================================================
   CONTACT – SOURCE DE VÉRITÉ UNIQUE
   ====================================================== */

/**
 * Retourne toutes les données de contact
 */
function fms_get_contact() {
    return fms_get_option('contact', null, []);
}

/**
 * Retourne un champ précis du contact
 */
function fms_get_contact_field($field, $default = '') {
    $contact = fms_get_contact();
    return $contact[$field] ?? $default;
}


/* ======================================================
   MULTILINGUE FUTUR (WPML / POLYLANG READY)
   ====================================================== */

/**
 * Traduction safe d’une chaîne optionnelle
 */
function fms_t($value) {

    if (empty($value)) {
        return '';
    }

    // Polylang
    if (function_exists('pll__')) {
        return pll__($value);
    }

    // WPML / gettext
    if (function_exists('__')) {
        return __($value, 'fms-theme');
    }

    return $value;
}


/* ======================================================
   MOBILE / RESPONSIVE
   ====================================================== */

/**
 * Détection mobile WordPress
 */
function fms_is_mobile() {
    return wp_is_mobile();
}


/* ======================================================
   UTILITAIRES D’AFFICHAGE
   ====================================================== */

/**
 * Echo sécurisé avec fallback
 */
function fms_echo($value, $fallback = '') {
    echo esc_html(!empty($value) ? $value : $fallback);
}

/**
 * Echo avec retours à la ligne HTML
 */
function fms_echo_nl2br($value) {
    echo nl2br(esc_html($value));
}


/* ======================================================
   SEO / STRUCTURED DATA – AIDE
   ====================================================== */

/**
 * Retourne les données d’organisation pour JSON‑LD
 */
function fms_get_organization_schema() {

    $contact = fms_get_contact();

    return [
        '@context' => 'https://schema.org',
        '@type'    => 'ReligiousOrganization',
        'name'     => fms_get_option('footer', 'name'),
        'url'      => home_url(),
        'address'  => !empty($contact['address']) ? [
            '@type' => 'PostalAddress',
            'streetAddress' => $contact['address'],
            'addressCountry' => 'FR'
        ] : null,
        'contactPoint' => (!empty($contact['phone']) || !empty($contact['email']))
            ? [
                '@type' => 'ContactPoint',
                'telephone' => $contact['phone'] ?? null,
                'email'     => $contact['email'] ?? null,
                'contactType' => 'Administration'
            ]
            : null
    ];
}


/* ======================================================
   CONTACT FORM – TRAITEMENT PERSONNALISÉ
   ====================================================== */

/**
 * Traite le formulaire de contact personnalisé
 * Retourne un tableau avec 'success' et 'message'
 */
function fms_handle_contact_form() {
    
    $result = [
        'success' => false,
        'message' => '',
        'errors'  => []
    ];

    // Vérifier que c'est une requête POST et que le nonce est valide
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return $result;
    }

    // Vérifier le nonce de sécurité
    if (!isset($_POST['fms_contact_nonce']) || 
        !wp_verify_nonce($_POST['fms_contact_nonce'], 'fms_contact_form')) {
        $result['message'] = 'Erreur de sécurité. Veuillez réessayer.';
        return $result;
    }

    // Récupérer et valider les champs
    $name = isset($_POST['contact_name']) ? sanitize_text_field($_POST['contact_name']) : '';
    $email = isset($_POST['contact_email']) ? sanitize_email($_POST['contact_email']) : '';
    $message = isset($_POST['contact_message']) ? sanitize_textarea_field($_POST['contact_message']) : '';

    // Validation avec messages paramétrables
    if (empty($name)) {
        $result['errors']['name'] = fms_get_option('contact', 'error_name_required', 'Le nom est obligatoire');
    }

    if (empty($email) || !is_email($email)) {
        $result['errors']['email'] = fms_get_option('contact', 'error_email_required', 'Un email valide est obligatoire');
    }

    if (empty($message)) {
        $result['errors']['message'] = fms_get_option('contact', 'error_message_required', 'Le message est obligatoire');
    }

    // Si erreurs, retourner
    if (!empty($result['errors'])) {
        $result['message'] = fms_get_option('contact', 'message_validation_error', 'Veuillez corriger les erreurs ci-dessus.');
        return $result;
    }

    // Récupérer les emails destinataires depuis les options
    $email_recipients = fms_get_option('contact', 'email_recipients', get_option('admin_email'));
    
    // Nettoyer les adresses email
    $recipients = array_map('trim', explode(',', $email_recipients));
    $recipients = array_filter($recipients, 'is_email');

    if (empty($recipients)) {
        $result['message'] = 'Erreur de configuration. Veuillez réessayer.';
        return $result;
    }

    // Préparer le contenu de l'email
    $site_name = get_bloginfo('name');
    $subject = sprintf(
        fms_get_option('contact', 'email_subject', '[%s] Nouveau message de contact'),
        $site_name
    );
    
    $email_body = sprintf(
        "Bonjour,\n\n" .
        "Vous avez reçu un nouveau message via le formulaire de contact.\n\n" .
        "--- DÉTAILS ---\n" .
        "Nom: %s\n" .
        "Email: %s\n\n" .
        "--- MESSAGE ---\n" .
        "%s\n\n" .
        "---\n" .
        "Message envoyé depuis: %s\n" .
        "Date: %s\n",
        sanitize_text_field($name),
        sanitize_email($email),
        sanitize_textarea_field($message),
        home_url(),
        current_time('d/m/Y à H:i')
    );

    // Headers de l'email
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . sanitize_email($email),
        'From: ' . $site_name . ' <' . get_option('admin_email') . '>'
    ];

    // Envoyer l'email aux destinataires
    $mail_sent = wp_mail($recipients, $subject, $email_body, $headers);

    if ($mail_sent) {
        $result['success'] = true;
        $result['message'] = fms_get_option('contact', 'message_success', 'Votre message a été envoyé avec succès. Nous vous revenons dans les meilleurs délais.');
    } else {
        $result['message'] = fms_get_option('contact', 'message_error', 'Une erreur s\'est produite lors de l\'envoi. Veuillez réessayer.');
    }

    return $result;
}

/* ======================================================
   PRESENCE MONDIALE
   ====================================================== */

function fms_get_world_country_options($post_id) {
    $countries = fms_get_option('world_countries', null, []);

    return isset($countries[$post_id]) && is_array($countries[$post_id])
        ? $countries[$post_id]
        : [];
}

function fms_get_world_country_value($post_id, $field, $default = '') {
    $country = fms_get_world_country_options($post_id);

    if (array_key_exists($field, $country) && $country[$field] !== '' && $country[$field] !== null) {
        return $country[$field];
    }

    $meta_map = [
        'sisters' => '_fms_sisters',
        'communities' => '_fms_communities',
        'since' => '_fms_year',
        'front_image' => '_fms_front_image',
        'flag_image' => '_fms_flag',
        'order' => '_fms_order',
    ];

    if (isset($meta_map[$field])) {
        $meta = get_post_meta($post_id, $meta_map[$field], true);
        return $meta !== '' && $meta !== null ? $meta : $default;
    }

    return $default;
}

function fms_get_world_country_image_url($post_id, $field, $size = 'large') {
    $image_id = fms_get_world_country_value($post_id, $field, '');

    return $image_id ? wp_get_attachment_image_url($image_id, $size) : '';
}

