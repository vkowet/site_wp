<?php
/**
 * Template Name: La Congrégation (FMS)
 * Template Post Type: page
 */

get_header();

if (!function_exists('fms_institution_option')) {
    function fms_institution_option($field, $default = '') {
        $value = fms_get_option('institution', $field, $default);

        return $value === '' || $value === null ? $default : $value;
    }
}

$hero_kicker = fms_institution_option('hero_kicker', 'Franciscaines Servantes de Marie');
$hero_title = fms_institution_option('hero_title', 'La Congrégation');
$hero_subtitle = fms_institution_option('hero_subtitle', 'Une famille religieuse internationale, enracinée à Blois, au service de l’Église, de l’éducation et de la dignité humaine.');
$hero_image = fms_institution_option('hero_image');
$hero_image_url = $hero_image ? wp_get_attachment_image_url($hero_image, 'full') : '';

$intro_title = fms_institution_option('intro_title', 'Une présence franciscaine au cœur du monde');
$intro_text = fms_institution_option('intro_text', 'Les Sœurs Franciscaines Servantes de Marie forment une congrégation religieuse féminine de spiritualité franciscaine. Depuis ses origines, la Congrégation unit la prière, la vie fraternelle et le service concret auprès des personnes les plus fragiles, avec une attention particulière à l’éducation, à l’accueil et au soin.');

$identity_title = fms_institution_option('identity_title', 'Notre identité');
$identity_text = fms_institution_option('identity_text', 'Appelées à servir, les sœurs vivent l’Évangile dans la simplicité franciscaine et dans l’esprit de Marie. Leur vocation les conduit à se tenir proches des enfants, des jeunes, des femmes, des familles et de tous ceux qui souffrent dans leur cœur ou dans leur corps.');

$history_title = fms_institution_option('history_title', 'Une histoire née à Blois');
$history_text = fms_institution_option('history_text', 'La Congrégation naît à Blois en 1852, à l’initiative de Marie‑Virginie Vaslin, devenue Mère Marie Sainte‑Claire. L’œuvre commence par l’accueil et l’assistance de femmes en situation de service, puis se développe dans une mission éducative, hospitalière et sociale. La Congrégation reçoit son nom de Franciscaines Servantes de Marie en lien avec la règle du Tiers‑Ordre régulier de saint François.');

$charism_title = fms_institution_option('charism_title', 'Un charisme de service et de miséricorde');
$charism_text = fms_institution_option('charism_text', 'Le charisme de la Congrégation se reçoit dans une double fidélité : suivre le Christ pauvre et serviteur à la manière de saint François, et apprendre de Marie la disponibilité, l’écoute et l’attention aux besoins du monde. Cette spiritualité se traduit par une présence humble, éducative, fraternelle et missionnaire.');

$presence_title = fms_institution_option('presence_title', 'Une congrégation ouverte aux frontières');
$presence_text = fms_institution_option('presence_text', 'De la maison‑mère de Blois aux communautés présentes sur plusieurs continents, les Sœurs Franciscaines Servantes de Marie portent une même mission : servir avec paix, simplicité et espérance, dans la diversité des cultures et des réalités locales.');

$quote = fms_institution_option('quote', 'Servir, apprendre et éduquer dans un esprit de fraternité, de simplicité et d’espérance.');
$quote_author = fms_institution_option('quote_author', 'Congrégation des Franciscaines Servantes de Marie');

$presence_items = [];
for ($i = 1; $i <= 5; $i++) {
    $presence_items[] = fms_institution_option('presence_' . $i, ['France', 'Italie', 'Madagascar', 'Tchad', 'Inde'][$i - 1]);
}
?>

<style>
.fms-congregation-page {
    background: #f7f9fb;
    color: #263746;
}

.fms-congregation-hero {
    background: #16324f;
    color: #ffffff;
    min-height: 430px;
    position: relative;
}

.fms-congregation-hero::before {
    background: linear-gradient(90deg, rgba(8, 18, 32, .84), rgba(8, 18, 32, .54));
    content: '';
    inset: 0;
    position: absolute;
    z-index: 1;
}

.fms-congregation-hero.has-image {
    background-position: center;
    background-size: cover;
}

.fms-congregation-hero-inner {
    margin: 0 auto;
    max-width: 1140px;
    padding: 110px 20px 96px;
    position: relative;
    z-index: 2;
}

.fms-congregation-kicker {
    font-size: .78rem;
    font-weight: 700;
    letter-spacing: .14em;
    margin: 0 0 16px;
    text-transform: uppercase;
}

.fms-congregation-hero h1 {
    color: #ffffff;
    font-size: clamp(2.4rem, 5vw, 4.2rem);
    line-height: 1.05;
    margin: 0 0 22px;
    max-width: 780px;
}

.fms-congregation-hero p {
    font-size: 1.16rem;
    line-height: 1.85;
    margin: 0;
    max-width: 760px;
}

.fms-congregation-container {
    margin: 0 auto;
    max-width: 1140px;
    padding: 72px 20px;
}

.fms-congregation-intro {
    border-left: 5px solid #234e70;
    margin-bottom: 56px;
    padding-left: 28px;
}

.fms-congregation-intro h2,
.fms-congregation-section h2 {
    color: #16324f;
    font-size: clamp(1.85rem, 3vw, 2.5rem);
    line-height: 1.16;
    margin: 0 0 18px;
}

.fms-congregation-intro p,
.fms-congregation-section p {
    color: #3e5367;
    font-size: 1.04rem;
    line-height: 1.9;
    margin: 0;
}

.fms-congregation-stats {
    display: grid;
    gap: 18px;
    grid-template-columns: repeat(4, 1fr);
    margin-bottom: 72px;
}

.fms-congregation-stat {
    background: #ffffff;
    border: 1px solid #d9e2ec;
    padding: 26px;
}

.fms-congregation-stat strong {
    color: #16324f;
    display: block;
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.35rem;
    line-height: 1;
    margin-bottom: 10px;
}

.fms-congregation-stat span {
    color: #567086;
    font-size: .92rem;
    font-weight: 700;
    letter-spacing: .04em;
    text-transform: uppercase;
}

.fms-congregation-grid {
    display: grid;
    gap: 28px;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    margin-bottom: 72px;
}

.fms-congregation-section {
    background: #ffffff;
    border: 1px solid #d9e2ec;
    padding: 34px;
}

.fms-congregation-section.is-wide {
    grid-column: 1 / -1;
}

.fms-congregation-presence-list {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin: 28px 0 0;
    padding: 0;
}

.fms-congregation-presence-list li {
    background: #eef4f8;
    border: 1px solid #d9e2ec;
    color: #16324f;
    font-weight: 700;
    list-style: none;
    padding: 10px 16px;
}

.fms-congregation-quote {
    background: #16324f;
    color: #ffffff;
    margin: 0;
    padding: 42px;
}

.fms-congregation-quote p {
    color: #ffffff;
    font-family: 'Cormorant Garamond', serif;
    font-size: clamp(1.45rem, 3vw, 2rem);
    line-height: 1.45;
    margin: 0 0 18px;
}

.fms-congregation-quote footer {
    color: #d9e2ec;
    font-weight: 700;
}

@media (max-width: 900px) {
    .fms-congregation-stats,
    .fms-congregation-grid, {
        grid-template-columns: 1fr;
    }
}
</style>

<main class="fms-congregation-page">
    <section class="fms-congregation-hero <?php echo $hero_image_url ? 'has-image' : ''; ?>" <?php if ($hero_image_url): ?>style="background-image:url('<?php echo esc_url($hero_image_url); ?>');"<?php endif; ?>>
        <div class="fms-congregation-hero-inner">
            <p class="fms-congregation-kicker"><?php echo esc_html($hero_kicker); ?></p>
            <h1><?php echo esc_html($hero_title); ?></h1>
            <p><?php echo esc_html($hero_subtitle); ?></p>
        </div>
    </section>

    <div class="fms-congregation-container">
        <section class="fms-congregation-intro">
            <h2><?php echo esc_html($intro_title); ?></h2>
            <p><?php echo nl2br(esc_html($intro_text)); ?></p>
        </section>

        <section class="fms-congregation-stats" aria-label="<?php echo esc_attr(fms_institution_option('stats_aria_label', 'Repères institutionnels')); ?>">
            <?php for ($i = 1; $i <= 4; $i++): ?>
                <div class="fms-congregation-stat">
                    <strong><?php echo esc_html(fms_institution_option('stat_' . $i . '_value', ['1852', 'F.S.M.', '5', 'Blois'][$i - 1])); ?></strong>
                    <span><?php echo esc_html(fms_institution_option('stat_' . $i . '_label', ['Fondation', 'Abréviation', 'Pays de présence', 'Maison-mère'][$i - 1])); ?></span>
                </div>
            <?php endfor; ?>
        </section>

        <div class="fms-congregation-grid">
            <section class="fms-congregation-section">
                <h2><?php echo esc_html($identity_title); ?></h2>
                <p><?php echo nl2br(esc_html($identity_text)); ?></p>
            </section>

            <section class="fms-congregation-section">
                <h2><?php echo esc_html($history_title); ?></h2>
                <p><?php echo nl2br(esc_html($history_text)); ?></p>
            </section>

            <section class="fms-congregation-section is-wide">
                <h2><?php echo esc_html($charism_title); ?></h2>
                <p><?php echo nl2br(esc_html($charism_text)); ?></p>
            </section>

            <section class="fms-congregation-section is-wide">
                <h2><?php echo esc_html($presence_title); ?></h2>
                <p><?php echo nl2br(esc_html($presence_text)); ?></p>
                <ul class="fms-congregation-presence-list">
                    <?php foreach ($presence_items as $presence): ?>
                        <?php if ($presence !== ''): ?>
                            <li><?php echo esc_html($presence); ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </section>
        </div>

        <blockquote class="fms-congregation-quote">
            <p><?php echo esc_html($quote); ?></p>
            <footer><?php echo esc_html($quote_author); ?></footer>
        </blockquote>
    </div>
</main>

<?php get_footer(); ?>
