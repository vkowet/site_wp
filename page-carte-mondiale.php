<?php
/**
 * Template Name: Carte mondiale (FMS)
 * Template Post Type: page
 */

get_header();

$map_image_id = get_post_thumbnail_id() ?: 151;
$map_image = wp_get_attachment_image_url($map_image_id, 'full');
$map_alt = trim((string) get_post_meta($map_image_id, '_wp_attachment_image_alt', true));

$countries = new WP_Query([
    'post_type'      => 'world_presence',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order title',
    'order'          => 'ASC',
]);
?>

<main class="fms-world-map-page">
    <section class="fms-world-map-hero">
        <div class="fms-world-map-hero-inner">
            <p class="fms-world-map-kicker">Présence dans le monde</p>
            <h1><?php the_title(); ?></h1>
            <p>Une même mission portée sur plusieurs continents, avec des communautés au service de l’éducation, de la dignité humaine, de la fraternité et de l’espérance.</p>
        </div>
    </section>

    <section class="fms-world-map-stage">
        <div class="fms-world-map-frame">
            <?php if ($map_image): ?>
                <img src="<?php echo esc_url($map_image); ?>" alt="<?php echo esc_attr($map_alt ?: 'Carte mondiale des Sœurs Franciscaines Servantes de Marie'); ?>">
            <?php endif; ?>
        </div>

        <div class="fms-world-map-caption">
            <div>
                <span>Maison-mère à Blois</span>
                <strong>Une famille religieuse internationale</strong>
            </div>
            <a href="<?php echo esc_url(home_url('/presence-mondiale')); ?>">Explorer les pays</a>
        </div>
    </section>

    <section class="fms-world-map-content">
        <div class="fms-world-map-intro">
            <h2>Une présence missionnaire vivante</h2>
            <p>Depuis Blois, l’intuition de Mère Marie Sainte-Claire continue de rejoindre des réalités très diverses. Cette carte donne à voir l’unité de la Congrégation et la diversité de ses présences locales.</p>
        </div>

        <?php if ($countries->have_posts()): ?>
            <div class="fms-world-map-links" aria-label="Pays de présence">
                <?php while ($countries->have_posts()): $countries->the_post(); ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>
