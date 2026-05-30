<?php
die('FMS FUNCTIONS LOADED');
/*
|--------------------------------------------------------------------------
| THEME SETUP
|--------------------------------------------------------------------------
*/

function fms_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('custom-logo');

   register_nav_menus([
    'top-menu'     => __('Menu supérieur', 'fms-theme'),
    'primary-menu' => __('Menu principal', 'fms-theme'),
    'mobile-menu'  => __('Menu mobile', 'fms-theme'),
]);
}
add_action('after_setup_theme', 'fms_theme_setup');

add_action('admin_notices', function () {
    echo '<div class="notice notice-success"><p>MENU MOBILE CHARGE</p></div>';
});

/*
|--------------------------------------------------------------------------
| GLOBAL OPTION HELPER (SOURCE UNIQUE)
|--------------------------------------------------------------------------
*/

function fms_get_options() {
    return get_option('fms_theme_options', []);
}

function fms_get_option($section, $field, $default = '') {
    $options = fms_get_options();

    if (
        isset($options[$section]) &&
        is_array($options[$section]) &&
        isset($options[$section][$field])
    ) {
        return $options[$section][$field];
    }

    return $default;
}


/*
|--------------------------------------------------------------------------
| IMAGE HELPER
|--------------------------------------------------------------------------
*/

function fms_get_image_url($attachment_id) {
    if (!$attachment_id) return '';
    return wp_get_attachment_image_url($attachment_id, 'full');
}

function fms_get_theme_image_url($attachment_id) {
    return fms_get_image_url($attachment_id);
}

/*
|--------------------------------------------------------------------------
| FRONT ASSETS
|--------------------------------------------------------------------------
*/

function fms_enqueue_assets() {

    $version = wp_get_theme()->get('Version');

    /* CSS */
    wp_enqueue_style('fms-style', get_stylesheet_uri(), [], $version);

    wp_enqueue_style(
        'fms-hero',
        get_template_directory_uri() . '/assets/css/hero.css',
        [],
        $version
    );

    wp_enqueue_style(
        'fms-world',
        get_template_directory_uri() . '/assets/css/world-presence.css',
        [],
        $version
    );

    wp_enqueue_style(
        'fms-footer',
        get_template_directory_uri() . '/assets/css/footer.css',
        [],
        $version
    );

    wp_enqueue_style(
        'fms-mobile',
        get_template_directory_uri() . '/assets/css/mobile.css',
        [],
        $version
    );

    wp_enqueue_style(
        'fms-stats',
        get_template_directory_uri() . '/assets/css/stats.css',
        [],
        $version
    );

    wp_enqueue_style(
        'fms-news',
        get_template_directory_uri() . '/assets/css/news.css',
        [],
        $version
    );

    wp_enqueue_style(
        'fms-vocation',
        get_template_directory_uri() . '/assets/css/vocation.css',
        [],
        $version
    );

    if (is_page()) {
        wp_enqueue_style(
            'fms-page',
            get_template_directory_uri() . '/assets/css/page.css',
            [],
            $version
        );
    }

    /* JS */
    wp_enqueue_script(
        'fms-navigation',
        get_template_directory_uri() . '/assets/js/navigation.js',
        [],
        $version,
        true
    );

    wp_enqueue_script(
        'fms-hero-slider',
        get_template_directory_uri() . '/assets/js/hero-slider.js',
        [],
        $version,
        true
    );

    wp_enqueue_script(
        'fms-mobile-menu',
        get_template_directory_uri() . '/assets/js/mobile-menu.js',
        [],
        $version,
        true
    );

    wp_enqueue_script(
        'fms-mobile',
        get_template_directory_uri() . '/assets/js/mobile.js',
        [],
        $version,
        true
    );

    wp_enqueue_script(
        'fms-stats',
        get_template_directory_uri() . '/assets/js/stats.js',
        [],
        $version,
        true
    );

    wp_enqueue_style(
    'fms-system-pages',
    get_template_directory_uri() . '/assets/css/system-pages.css',
    [],
    $version
);
}
add_action('wp_enqueue_scripts', 'fms_enqueue_assets');


/*
|--------------------------------------------------------------------------
| ADMIN MEDIA (WORDPRESS MEDIA UPLOADER)
|--------------------------------------------------------------------------
*/

function fms_admin_media_assets($hook) {

    if (
        $hook === 'toplevel_page_fms-theme-options' ||
        $hook === 'post.php' ||
        $hook === 'post-new.php'
    ) {
        wp_enqueue_media();

        wp_enqueue_script(
            'fms-admin-media',
            get_template_directory_uri() . '/assets/js/admin-media.js',
            ['jquery'],
            null,
            true
        );
    }
}
add_action('admin_enqueue_scripts', 'fms_admin_media_assets');

/* AUTO CREATE / UPDATE SYSTEM PAGES */
function fms_create_default_pages() {

    $pages = [

        [
            'title' => 'Mentions légales',
            'slug'  => 'mentions-legales',
            'content' => '

<h2>Éditeur du site</h2>

<p>
Les <strong>Sœurs Franciscaines Servantes de Marie – Généralat</strong>,
dont le siège mondial est situé à Blois, assurent l’édition du présent site internet.
</p>

<p>
15 rue Monin<br>
41000 BLOIS – France
</p>

<h2>Responsable de publication</h2>

<p>
La Supérieure Générale des Sœurs Franciscaines Servantes de Marie
ou son représentant dûment mandaté.
</p>

<h2>Hébergement</h2>

<p>
Le site est hébergé sur une infrastructure sécurisée administrée
par les responsables techniques de la congrégation.
</p>

<h2>Propriété intellectuelle</h2>

<p>
L’ensemble des contenus présents sur ce site
(textes, photographies, documents, logos, vidéos,
graphismes, identité visuelle, etc.)
est protégé par le droit d’auteur.
</p>

<p>
Toute reproduction, diffusion ou utilisation
sans autorisation écrite préalable est interdite.
</p>

<h2>Responsabilité</h2>

<p>
La congrégation s’efforce d’assurer l’exactitude
des informations publiées sur ce site,
sans pouvoir garantir l’absence totale d’erreurs ou d’omissions.
</p>

<h2>Contact</h2>

<p>
Pour toute demande :<br>
<strong>contact@blois.valkoprod.com</strong>
</p>
'
        ],

        [
            'title' => 'Politique de confidentialité',
            'slug'  => 'politique-de-confidentialite',
            'content' => '

<h2>Protection des données personnelles</h2>

<p>
Les <strong>Sœurs Franciscaines Servantes de Marie</strong>
attachent une grande importance à la protection
des données personnelles.
</p>

<h2>Données collectées</h2>

<ul>
<li>Nom et prénom</li>
<li>Adresse e-mail</li>
<li>Numéro de téléphone</li>
<li>Messages transmis via les formulaires</li>
<li>Données techniques de navigation</li>
</ul>

<h2>Finalité des traitements</h2>

<p>
Les données collectées sont utilisées uniquement pour :
</p>

<ul>
<li>Répondre aux demandes de contact</li>
<li>Assurer le bon fonctionnement du site</li>
<li>Améliorer les services proposés</li>
<li>Garantir la sécurité technique</li>
</ul>

<h2>Conservation des données</h2>

<p>
Les données sont conservées uniquement
pour la durée nécessaire au traitement des demandes.
</p>

<h2>Vos droits</h2>

<p>
Conformément à la réglementation applicable,
vous disposez d’un droit :
</p>

<ul>
<li>D’accès</li>
<li>De rectification</li>
<li>D’opposition</li>
<li>De suppression</li>
</ul>

<h2>Contact RGPD</h2>

<p>
Pour toute demande relative à vos données personnelles :<br>
<strong>contact@blois.valkoprod.com</strong>
</p>
'
        ],

        [
            'title' => 'Plan du site',
            'slug'  => 'plan-du-site',
            'content' => '

<h2>Navigation principale</h2>

<ul>
<li><a href="/">Accueil</a></li>
<li><a href="/mot-de-la-mere-superieure">Mot de la Mère Supérieure Générale</a></li>
<li><a href="/histoire-de-la-fondatrice">Histoire de la Fondatrice</a></li>
<li><a href="/presence-mondiale">Présence dans le monde</a></li>
<li><a href="/actualites">Actualités & Missions</a></li>
<li><a href="/vocations">Vocations</a></li>
<li><a href="/contact">Contact</a></li>
</ul>

<h2>Informations institutionnelles</h2>

<ul>
<li><a href="/mentions-legales">Mentions légales</a></li>
<li><a href="/politique-de-confidentialite">Politique de confidentialité</a></li>
<li><a href="/faire-un-don">Faire un don</a></li>
</ul>

<h2>Réseau mondial</h2>

<p>
Découvrez les différentes présences missionnaires
des Sœurs Franciscaines Servantes de Marie à travers le monde.
</p>
'
        ],

        [
            'title' => 'Faire un don',
            'slug'  => 'faire-un-don',
            'content' => '

<h2>Soutenir notre mission</h2>

<p>
Votre soutien permet aux
<strong>Sœurs Franciscaines Servantes de Marie</strong>
de poursuivre leurs missions d’éducation,
de solidarité, d’accompagnement et de présence missionnaire.
</p>

<p>
À travers le monde,
la congrégation agit auprès des populations
les plus fragiles dans un esprit de service,
de fraternité et d’espérance.
</p>

<h2>Comment nous aider ?</h2>

<p>
Pour connaître les modalités de soutien
ou effectuer un don,
nous vous invitons à prendre contact avec la congrégation.
</p>

<p>
<strong>Contact :</strong><br>
contact@blois.valkoprod.com
</p>
'
        ]

    ];

    foreach ($pages as $page) {

        $existing = get_page_by_path($page['slug']);

        if ($existing) {

            wp_update_post([
                'ID'           => $existing->ID,
                'post_content' => $page['content']
            ]);

        } else {

            wp_insert_post([
                'post_title'   => $page['title'],
                'post_name'    => $page['slug'],
                'post_content' => $page['content'],
                'post_status'  => 'publish',
                'post_type'    => 'page'
            ]);
        }
    }
}
add_action('init', 'fms_create_default_pages');

/*
|--------------------------------------------------------------------------
| LOAD MODULES
|--------------------------------------------------------------------------
*/

require get_template_directory() . '/includes/theme-options.php';
require get_template_directory() . '/includes/hero-slider-settings.php';
require get_template_directory() . '/includes/world-presence-cpt.php';
require get_template_directory() . '/includes/world-presence-fields.php';
