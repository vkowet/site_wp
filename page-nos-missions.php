<?php
/**
 * Template Name: Nos missions (FMS)
 * Template Post Type: page
 */

get_header();

if (!function_exists('fms_missions_option')) {
    function fms_missions_option($field, $default = '') {
        $value = fms_get_option('missions', $field, $default);

        return $value === '' || $value === null ? $default : $value;
    }
}

$hero_kicker = fms_missions_option('hero_kicker', 'Mission franciscaine');
$hero_title = fms_missions_option('hero_title', 'Nos missions');
$hero_subtitle = fms_missions_option('hero_subtitle', 'Servir la personne humaine dans toutes ses dimensions, avec une attention particulière aux plus fragiles, aux jeunes et aux familles.');
$hero_image = fms_missions_option('hero_image');
$hero_image_url = $hero_image ? wp_get_attachment_image_url($hero_image, 'full') : '';

$intro_title = fms_missions_option('intro_title', 'Une mission au service de la vie');
$intro_text = fms_missions_option('intro_text', 'Depuis les origines de la Congrégation, les Sœurs Franciscaines Servantes de Marie répondent aux besoins de leur temps par une présence simple, éducative, fraternelle et compatissante. Leurs missions s’enracinent dans l’Évangile, la spiritualité franciscaine et l’attention maternelle de Marie.');

$mission_titles = ['Éduquer et former','Accueillir et protéger','Soigner et consoler','Accompagner spirituellement','Servir les plus humbles','Construire la fraternité'];
$mission_texts = [
    'Favoriser la croissance humaine, intellectuelle et spirituelle des enfants, des jeunes et des adultes confiés à la mission.',
    'Créer des lieux d’écoute, de sécurité et de dignité pour les personnes fragilisées, isolées ou en difficulté.',
    'Porter une attention concrète aux souffrances du corps et du cœur, dans un esprit de compassion et de respect.',
    'Soutenir la vie de foi, la prière, le discernement et l’espérance au sein des communautés locales.',
    'Être proche des personnes modestes, démunies ou oubliées, selon l’intuition première de la Congrégation.',
    'Témoigner d’une fraternité ouverte, paisible et internationale, au-delà des cultures et des frontières.'
];

$items = [];
for ($i = 1; $i <= 6; $i++) {
    $items[] = [
        'number' => sprintf('%02d', $i),
        'title' => fms_missions_option('item_' . $i . '_title', $mission_titles[$i - 1]),
        'text' => fms_missions_option('item_' . $i . '_text', $mission_texts[$i - 1]),
    ];
}

$closing_title = fms_missions_option('closing_title', 'Une même mission, plusieurs visages');
$closing_text = fms_missions_option('closing_text', 'Dans chaque pays et chaque communauté, la mission s’adapte aux réalités locales. Elle demeure portée par le même désir : servir avec simplicité, annoncer l’espérance et reconnaître en chacun une dignité reçue de Dieu.');
$button_text = fms_missions_option('button_text', 'Découvrir notre présence mondiale');
$button_link = fms_missions_option('button_link', '/presence-mondiale');
?>

<style>
.fms-missions-page { background:#f7f9fb; color:#263746; }
.fms-missions-hero { background:#16324f; color:#fff; min-height:410px; position:relative; }
.fms-missions-hero.has-image { background-position:center; background-size:cover; }
.fms-missions-hero::before { background:linear-gradient(90deg, rgba(8,18,32,.86), rgba(8,18,32,.52)); content:''; inset:0; position:absolute; z-index:1; }
.fms-missions-hero-inner { margin:0 auto; max-width:1140px; padding:108px 20px 92px; position:relative; z-index:2; }
.fms-missions-kicker { font-size:.78rem; font-weight:700; letter-spacing:.14em; margin:0 0 16px; text-transform:uppercase; }
.fms-missions-hero h1 { color:#fff; font-size:clamp(2.4rem,5vw,4rem); line-height:1.06; margin:0 0 22px; max-width:760px; }
.fms-missions-hero p { font-size:1.16rem; line-height:1.85; margin:0; max-width:760px; }
.fms-missions-container { margin:0 auto; max-width:1140px; padding:72px 20px; }
.fms-missions-intro { border-left:5px solid #234e70; margin-bottom:54px; padding-left:28px; }
.fms-missions-intro h2 { color:#16324f; font-size:clamp(1.85rem,3vw,2.45rem); line-height:1.18; margin:0 0 18px; }
.fms-missions-intro p { color:#3e5367; font-size:1.04rem; line-height:1.9; margin:0; max-width:880px; }
.fms-missions-grid { display:grid; gap:22px; grid-template-columns:repeat(3,1fr); }
.fms-mission-card { background:#fff; border:1px solid #d9e2ec; border-top:4px solid #234e70; padding:30px; }
.fms-mission-number { color:#b8c7d3; display:block; font-family:'Cormorant Garamond', serif; font-size:2.4rem; font-weight:700; line-height:1; margin-bottom:18px; }
.fms-mission-card h2 { color:#16324f; font-size:1.42rem; line-height:1.25; margin:0 0 14px; }
.fms-mission-card p { color:#3e5367; line-height:1.78; margin:0; }
.fms-missions-closing { background:#16324f; color:#fff; margin-top:56px; padding:42px; }
.fms-missions-closing h2 { color:#fff; font-size:clamp(1.7rem,3vw,2.4rem); margin:0 0 16px; }
.fms-missions-closing p { color:#e6edf4; line-height:1.85; margin:0 0 28px; max-width:860px; }
.fms-missions-button { background:#fff; color:#16324f; display:inline-block; font-weight:700; padding:13px 22px; text-decoration:none; }
@media (max-width: 920px) { .fms-missions-grid { grid-template-columns:1fr; } .fms-missions-closing { padding:30px; } }
</style>

<main class="fms-missions-page">
    <section class="fms-missions-hero <?php echo $hero_image_url ? 'has-image' : ''; ?>" <?php if ($hero_image_url): ?>style="background-image:url('<?php echo esc_url($hero_image_url); ?>');"<?php endif; ?>>
        <div class="fms-missions-hero-inner">
            <p class="fms-missions-kicker"><?php echo esc_html($hero_kicker); ?></p>
            <h1><?php echo esc_html($hero_title); ?></h1>
            <p><?php echo esc_html($hero_subtitle); ?></p>
        </div>
    </section>

    <div class="fms-missions-container">
        <section class="fms-missions-intro">
            <h2><?php echo esc_html($intro_title); ?></h2>
            <p><?php echo nl2br(esc_html($intro_text)); ?></p>
        </section>

        <section class="fms-missions-grid" aria-label="<?php echo esc_attr($hero_title); ?>">
            <?php foreach ($items as $item): ?>
                <article class="fms-mission-card">
                    <span class="fms-mission-number"><?php echo esc_html($item['number']); ?></span>
                    <h2><?php echo esc_html($item['title']); ?></h2>
                    <p><?php echo nl2br(esc_html($item['text'])); ?></p>
                </article>
            <?php endforeach; ?>
        </section>

        <section class="fms-missions-closing">
            <h2><?php echo esc_html($closing_title); ?></h2>
            <p><?php echo nl2br(esc_html($closing_text)); ?></p>
            <?php if ($button_text && $button_link): ?>
                <a class="fms-missions-button" href="<?php echo esc_url(home_url($button_link)); ?>"><?php echo esc_html($button_text); ?></a>
            <?php endif; ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>
