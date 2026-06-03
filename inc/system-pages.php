<?php
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
