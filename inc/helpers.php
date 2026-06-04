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