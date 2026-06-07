<?php

if (!defined('ABSPATH')) {
    exit;
}

function fms_institutional_pages_config() {
    return [
        'spiritualite-charisme' => [
            'section' => 'spiritualite_charisme',
            'label' => 'Spiritualité / Charisme',
            'defaults' => [
                'kicker' => 'Vie spirituelle',
                'title' => 'Spiritualité / Charisme',
                'intro' => 'La source intérieure de la mission des Sœurs Franciscaines Servantes de Marie : suivre le Christ pauvre et serviteur, dans l’esprit de saint François et sous le regard de Marie.',
                'quote' => 'Servir, apprendre et éduquer dans un esprit de fraternité, de simplicité et d’espérance.',
                'section_1_title' => 'Une spiritualité franciscaine au service de la vie',
                'section_1_text' => 'La Congrégation reçoit sa mission dans une spiritualité simple, fraternelle et missionnaire. À la suite du Christ serviteur, les sœurs cherchent à vivre l’Évangile dans l’humilité, la paix, la proximité avec les plus fragiles et la confiance en la Providence.',
                'section_2_title' => 'Le charisme de service',
                'section_2_text' => 'Le charisme de la Congrégation unit la prière, la vie fraternelle et le service concret. Il se manifeste dans l’accueil, l’éducation, l’accompagnement, le soin, la présence auprès des personnes vulnérables et l’attention aux besoins de chaque époque.',
                'card_1_title' => 'À la manière de saint François',
                'card_1_text' => 'Vivre la simplicité, la fraternité universelle, la paix et la joie de l’Évangile.',
                'card_2_title' => 'Avec Marie',
                'card_2_text' => 'Apprendre l’écoute, la disponibilité, la confiance et le service discret.',
                'card_3_title' => 'Dans la prière',
                'card_3_text' => 'Recevoir chaque mission comme une réponse à l’appel de Dieu et aux besoins du monde.',
                'card_4_title' => 'Auprès des plus fragiles',
                'card_4_text' => 'Servir avec respect, compassion et attention à la dignité de chaque personne.',
                'section_3_title' => 'Une présence humble et missionnaire',
                'section_3_text' => 'Ce charisme ne se limite pas à une activité. Il est une manière d’être au monde : proche des personnes, attentive aux réalités locales, enracinée dans la prière et ouverte à la mission de l’Église.',
                'note' => 'Cette page peut être enrichie avec des textes fondateurs, des citations de la fondatrice ou des extraits de documents spirituels de la Congrégation.',
            ],
        ],
        'vie-communautaire' => [
            'section' => 'vie_communautaire',
            'label' => 'Vie communautaire',
            'defaults' => [
                'kicker' => 'Vie fraternelle',
                'title' => 'Vie communautaire',
                'intro' => 'La vie des sœurs se construit dans la prière, la fraternité, le service et le partage quotidien de la mission.',
                'quote' => 'La communauté est le lieu où se reçoit, se partage et se porte la mission.',
                'section_1_title' => 'Vivre ensemble pour servir ensemble',
                'section_1_text' => 'La communauté est un lieu de prière, de fraternité et de mission. Les sœurs y partagent la vie quotidienne, les responsabilités, les joies, les épreuves et le désir de répondre ensemble aux appels de Dieu et du monde.',
                'section_2_title' => 'Un rythme de vie enraciné dans l’Évangile',
                'section_2_text' => 'Chaque communauté cherche à unir la prière, la vie fraternelle et le service. Ce rythme simple aide les sœurs à demeurer disponibles, attentives aux personnes rencontrées et fidèles à leur vocation.',
                'card_1_title' => 'Prière',
                'card_1_text' => 'La prière personnelle et communautaire nourrit la fidélité, l’écoute de la Parole et l’unité de la mission.',
                'card_2_title' => 'Fraternité',
                'card_2_text' => 'La vie commune apprend l’accueil, le pardon, la simplicité, la joie partagée et l’attention aux autres.',
                'card_3_title' => 'Service',
                'card_3_text' => 'Chaque communauté est envoyée pour servir selon les besoins du lieu où elle vit.',
                'card_4_title' => 'Mission',
                'card_4_text' => 'La mission se vit dans l’éducation, l’accompagnement, la solidarité, la santé, l’évangélisation et la proximité humaine.',
                'section_3_title' => 'Une vie simple et ouverte',
                'section_3_text' => 'La vie communautaire est aussi un témoignage : celui d’une fraternité possible, enracinée dans l’Évangile, ouverte aux cultures et attentive aux personnes rencontrées.',
                'note' => 'Cette page pourra accueillir plus tard des photos de communautés, des témoignages de sœurs et des récits de vie quotidienne.',
            ],
        ],
        'formation-vocationnelle' => [
            'section' => 'formation_vocationnelle',
            'label' => 'Formation vocationnelle',
            'defaults' => [
                'kicker' => 'Discerner un appel',
                'title' => 'Formation vocationnelle',
                'intro' => 'Un chemin progressif de discernement, d’accompagnement et de formation pour celles qui désirent répondre à l’appel de Dieu.',
                'quote' => 'Le discernement commence souvent par une question simple, portée dans la prière et confiée à un accompagnement.',
                'section_1_title' => 'Un chemin de discernement',
                'section_1_text' => 'La vocation religieuse se découvre progressivement. La Congrégation accompagne les jeunes femmes qui souhaitent discerner un appel à suivre le Christ dans la vie consacrée, selon le charisme des Sœurs Franciscaines Servantes de Marie.',
                'section_2_title' => 'Les étapes de la formation',
                'section_2_text' => 'La formation respecte le rythme de chaque personne. Elle aide à grandir humainement, spirituellement et communautairement, dans la liberté et la fidélité à l’appel reçu.',
                'card_1_title' => 'Accueil et accompagnement',
                'card_1_text' => 'Temps de dialogue, de prière, de découverte de la Congrégation et de discernement personnel.',
                'card_2_title' => 'Postulat',
                'card_2_text' => 'Première étape de vie plus proche de la communauté, pour vérifier l’appel et apprendre le rythme de la vie religieuse.',
                'card_3_title' => 'Noviciat',
                'card_3_text' => 'Temps fondateur de formation spirituelle, humaine, communautaire et franciscaine.',
                'card_4_title' => 'Vœux temporaires puis perpétuels',
                'card_4_text' => 'Engagement progressif dans la pauvreté, la chasteté et l’obéissance, au service de Dieu et des frères.',
                'section_3_title' => 'Être accompagnée',
                'section_3_text' => 'Chaque chemin vocationnel est personnel. Les sœurs proposent un accompagnement respectueux, dans la liberté, la prière et l’écoute.',
                'note' => 'Pour prendre contact au sujet d’un discernement vocationnel, utilisez la page Contact ou la page Vocations du site.',
            ],
        ],
        'documents-officiels' => [
            'section' => 'documents_officiels',
            'label' => 'Documents officiels',
            'defaults' => [
                'kicker' => 'Ressources institutionnelles',
                'title' => 'Documents officiels',
                'intro' => 'Un espace destiné aux messages, documents de référence, communiqués et publications institutionnelles de la Congrégation.',
                'quote' => 'Conserver, transmettre et rendre accessibles les textes qui accompagnent la vie de la Congrégation.',
                'section_1_title' => 'Documents de référence',
                'section_1_text' => 'Cette page rassemble les documents officiels que la Congrégation souhaite mettre à disposition : messages du siège, textes institutionnels, communiqués, lettres, bulletins, rapports ou publications.',
                'section_2_title' => 'Un espace appelé à s’enrichir',
                'section_2_text' => 'Les documents peuvent être ajoutés au fil des événements et des publications. Cette page permet de garder un accès clair aux ressources importantes pour les sœurs, les partenaires, les familles et les visiteurs.',
                'card_1_title' => 'Messages officiels',
                'card_1_text' => 'Lettres et messages publiés par le gouvernement général ou la Supérieure générale.',
                'card_2_title' => 'Communiqués',
                'card_2_text' => 'Informations importantes concernant la vie de la Congrégation et ses événements institutionnels.',
                'card_3_title' => 'Publications',
                'card_3_text' => 'Bulletins, dossiers, documents de présentation et ressources à télécharger.',
                'card_4_title' => 'Archives',
                'card_4_text' => 'Documents conservés pour mémoire et consultation selon leur caractère public.',
                'section_3_title' => 'Mettre à disposition les ressources',
                'section_3_text' => 'Les fichiers PDF, liens de téléchargement et documents complémentaires peuvent être ajoutés depuis l’administration WordPress lorsque la Congrégation souhaite les publier.',
                'note' => 'Les fichiers PDF et documents téléchargeables pourront être ajoutés depuis l’administration WordPress au fil des publications.',
            ],
        ],
    ];
}

function fms_get_institutional_page_config($slug = '') {
    $slug = $slug ?: get_post_field('post_name', get_queried_object_id());
    $pages = fms_institutional_pages_config();

    return $pages[$slug] ?? null;
}

function fms_institutional_option($config, $field) {
    $default = $config['defaults'][$field] ?? '';

    return fms_get_option($config['section'], $field, $default);
}
