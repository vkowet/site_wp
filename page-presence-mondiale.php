<?php
/**
 * Template Name: Présence mondiale (FMS)
 * Template Post Type: page
 */

get_header();

$title = fms_get_option('world', 'title', 'Présence mondiale');
$subtitle = fms_get_option('world', 'subtitle', 'Une présence missionnaire portée par des communautés locales, au service de l’éducation, de la dignité humaine et de la fraternité.');
$intro = fms_get_option('world', 'intro', 'Découvrez les pays où les Sœurs Franciscaines Servantes de Marie vivent leur mission. Chaque fiche présente les réalités locales, les engagements, quelques chiffres et les liens utiles.');
$button_text = fms_get_option('world', 'card_button_text', 'Voir la mission du pays');
$cards_per_row = max(1, min(4, (int) fms_get_option('world', 'cards_per_row', 3)));

$query = new WP_Query([
    'post_type' => 'world_presence',
    'posts_per_page' => -1,
    'meta_key' => '_fms_order',
    'orderby' => 'meta_value_num title',
    'order' => 'ASC',
]);
?>

<style>
.fms-world-page{background:#f7f9fb;color:#263746}.fms-world-hero{background:#16324f;color:#fff;padding:96px 20px 84px}.fms-world-hero-inner{max-width:1140px;margin:0 auto}.fms-world-hero h1{color:#fff;font-size:clamp(2.4rem,5vw,4rem);line-height:1.06;margin:0 0 22px}.fms-world-hero p{font-size:1.12rem;line-height:1.85;margin:0;max-width:820px}.fms-world-page-container{max-width:1140px;margin:0 auto;padding:64px 20px 84px}.fms-world-intro{border-left:5px solid #234e70;margin-bottom:44px;padding-left:28px}.fms-world-intro p{color:#3e5367;font-size:1.04rem;line-height:1.9;margin:0;max-width:860px}.fms-world-country-grid{display:grid;gap:24px;grid-template-columns:repeat(var(--cards-per-row),1fr)}.fms-world-country-card{background:#fff;border:1px solid #d9e2ec;text-decoration:none;color:inherit;display:flex;flex-direction:column;min-height:100%;transition:transform .25s ease,box-shadow .25s ease,border-color .25s ease}.fms-world-country-card:hover{border-color:#234e70;box-shadow:0 16px 36px rgba(16,42,67,.12);transform:translateY(-4px)}.fms-world-country-media{background:#e6edf4;min-height:210px;background-position:center;background-size:cover}.fms-world-country-body{padding:28px;display:flex;flex:1;flex-direction:column}.fms-world-country-body h2{color:#16324f;font-size:1.55rem;margin:0 0 12px}.fms-world-country-body p{color:#3e5367;line-height:1.75;margin:0 0 22px}.fms-world-country-stats{display:grid;gap:10px;grid-template-columns:repeat(3,1fr);margin:auto 0 24px}.fms-world-country-stat{background:#f7f9fb;border:1px solid #e6edf4;padding:12px;text-align:center}.fms-world-country-stat strong{color:#16324f;display:block;font-size:1.05rem}.fms-world-country-stat span{color:#567086;font-size:.76rem;font-weight:700;text-transform:uppercase}.fms-world-country-link{align-self:flex-start;background:#16324f;color:#fff;font-weight:700;padding:12px 18px}.fms-world-empty{background:#fff;border:1px solid #d9e2ec;padding:32px}@media(max-width:980px){.fms-world-country-grid{grid-template-columns:repeat(2,1fr)}}@media(max-width:680px){.fms-world-country-grid{grid-template-columns:1fr}.fms-world-country-stats{grid-template-columns:1fr}}
</style>

<main class="fms-world-page">
    <section class="fms-world-hero">
        <div class="fms-world-hero-inner">
            <h1><?php echo esc_html($title); ?></h1>
            <p><?php echo esc_html($subtitle); ?></p>
        </div>
    </section>

    <div class="fms-world-page-container">
        <section class="fms-world-intro">
            <p><?php echo nl2br(esc_html($intro)); ?></p>
        </section>

        <?php if ($query->have_posts()): ?>
            <section class="fms-world-country-grid" style="--cards-per-row:<?php echo esc_attr($cards_per_row); ?>">
                <?php while ($query->have_posts()): $query->the_post();
                    $post_id = get_the_ID();
                    $short = fms_get_world_country_value($post_id, 'short_description', get_the_excerpt());
                    $image = fms_get_world_country_image_url($post_id, 'activity_image_1', 'large') ?: fms_get_world_country_image_url($post_id, 'front_image', 'large') ?: get_the_post_thumbnail_url($post_id, 'large');
                    $sisters = fms_get_world_country_value($post_id, 'sisters', '');
                    $communities = fms_get_world_country_value($post_id, 'communities', '');
                    $since = fms_get_world_country_value($post_id, 'since', '');
                ?>
                    <a class="fms-world-country-card" href="<?php the_permalink(); ?>">
                        <div class="fms-world-country-media" <?php if($image): ?>style="background-image:url('<?php echo esc_url($image); ?>')"<?php endif; ?>></div>
                        <div class="fms-world-country-body">
                            <h2><?php the_title(); ?></h2>
                            <?php if($short): ?><p><?php echo esc_html($short); ?></p><?php endif; ?>
                            <div class="fms-world-country-stats">
                                <div class="fms-world-country-stat"><strong><?php echo esc_html($sisters ?: '—'); ?></strong><span>Sœurs</span></div>
                                <div class="fms-world-country-stat"><strong><?php echo esc_html($communities ?: '—'); ?></strong><span>Communautés</span></div>
                                <div class="fms-world-country-stat"><strong><?php echo esc_html($since ?: '—'); ?></strong><span>Depuis</span></div>
                            </div>
                            <span class="fms-world-country-link"><?php echo esc_html($button_text); ?></span>
                        </div>
                    </a>
                <?php endwhile; wp_reset_postdata(); ?>
            </section>
        <?php else: ?>
            <div class="fms-world-empty">Aucun pays n’est encore renseigné.</div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
