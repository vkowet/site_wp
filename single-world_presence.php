<?php
get_header();

if (have_posts()):
    while (have_posts()): the_post();
        $post_id = get_the_ID();
        $short = fms_get_world_country_value($post_id, 'short_description', get_the_excerpt());
        $mission = fms_get_world_country_value($post_id, 'mission_text', get_the_content());
        $sisters = fms_get_world_country_value($post_id, 'sisters', '');
        $communities = fms_get_world_country_value($post_id, 'communities', '');
        $since = fms_get_world_country_value($post_id, 'since', '');
        $beneficiaries = fms_get_world_country_value($post_id, 'beneficiaries', '');
        $works = fms_get_world_country_value($post_id, 'works', '');
        $official_url = fms_get_world_country_value($post_id, 'official_url', '');
        $official_button_text = fms_get_world_country_value($post_id, 'official_button_text', 'Visiter le site officiel');
        $hero_image = fms_get_world_country_image_url($post_id, 'activity_image_1', 'full') ?: fms_get_world_country_image_url($post_id, 'front_image', 'full') ?: get_the_post_thumbnail_url($post_id, 'full');
        $gallery = [];
        for ($i = 1; $i <= 4; $i++) {
            $url = fms_get_world_country_image_url($post_id, 'activity_image_' . $i, 'large');
            if ($url) { $gallery[] = $url; }
        }
?>

<style>
.fms-country-page{background:#f7f9fb;color:#263746}.fms-country-hero{background:#16324f;color:#fff;min-height:420px;position:relative;background-position:center;background-size:cover}.fms-country-hero::before{background:linear-gradient(90deg,rgba(8,18,32,.86),rgba(8,18,32,.50));content:'';inset:0;position:absolute;z-index:1}.fms-country-hero-inner{max-width:1140px;margin:0 auto;padding:106px 20px 88px;position:relative;z-index:2}.fms-country-breadcrumb{font-size:.9rem;margin:0 0 18px}.fms-country-breadcrumb a{color:#fff;text-decoration:none}.fms-country-hero h1{color:#fff;font-size:clamp(2.5rem,5vw,4.2rem);margin:0 0 20px}.fms-country-hero p{font-size:1.14rem;line-height:1.85;margin:0;max-width:780px}.fms-country-container{max-width:1140px;margin:0 auto;padding:64px 20px 84px}.fms-country-layout{display:grid;gap:32px;grid-template-columns:minmax(0,1fr) 320px}.fms-country-main,.fms-country-side,.fms-country-gallery{background:#fff;border:1px solid #d9e2ec;padding:34px}.fms-country-main h2,.fms-country-gallery h2{color:#16324f;font-size:2rem;margin:0 0 18px}.fms-country-main p{color:#3e5367;line-height:1.9;margin:0}.fms-country-stats{display:grid;gap:12px}.fms-country-stat{background:#f7f9fb;border:1px solid #e6edf4;padding:18px}.fms-country-stat strong{color:#16324f;display:block;font-size:1.45rem}.fms-country-stat span{color:#567086;font-size:.78rem;font-weight:700;text-transform:uppercase}.fms-country-official{background:#16324f;color:#fff;display:block;font-weight:700;margin-top:22px;padding:13px 18px;text-align:center;text-decoration:none}.fms-country-gallery{margin-top:32px}.fms-country-gallery-grid{display:grid;gap:16px;grid-template-columns:repeat(4,1fr)}.fms-country-gallery-grid img{aspect-ratio:4/3;height:100%;object-fit:cover;width:100%}@media(max-width:900px){.fms-country-layout{grid-template-columns:1fr}.fms-country-gallery-grid{grid-template-columns:1fr 1fr}}@media(max-width:560px){.fms-country-gallery-grid{grid-template-columns:1fr}}
</style>

<main class="fms-country-page">
    <section class="fms-country-hero" <?php if($hero_image): ?>style="background-image:url('<?php echo esc_url($hero_image); ?>')"<?php endif; ?>>
        <div class="fms-country-hero-inner">
            <p class="fms-country-breadcrumb"><a href="<?php echo esc_url(home_url('/presence-mondiale/')); ?>">Présence mondiale</a> / <?php the_title(); ?></p>
            <h1><?php the_title(); ?></h1>
            <?php if($short): ?><p><?php echo esc_html($short); ?></p><?php endif; ?>
        </div>
    </section>

    <div class="fms-country-container">
        <div class="fms-country-layout">
            <section class="fms-country-main">
                <h2>La mission dans le pays</h2>
                <p><?php echo nl2br(esc_html(wp_strip_all_tags($mission))); ?></p>
            </section>

            <aside class="fms-country-side">
                <div class="fms-country-stats">
                    <div class="fms-country-stat"><strong><?php echo esc_html($sisters ?: '—'); ?></strong><span>Sœurs</span></div>
                    <div class="fms-country-stat"><strong><?php echo esc_html($communities ?: '—'); ?></strong><span>Communautés</span></div>
                    <div class="fms-country-stat"><strong><?php echo esc_html($since ?: '—'); ?></strong><span>Depuis</span></div>
                    <?php if($beneficiaries): ?><div class="fms-country-stat"><strong><?php echo esc_html($beneficiaries); ?></strong><span>Bénéficiaires</span></div><?php endif; ?>
                    <?php if($works): ?><div class="fms-country-stat"><strong><?php echo esc_html($works); ?></strong><span>Œuvres</span></div><?php endif; ?>
                </div>
                <?php if($official_url): ?><a class="fms-country-official" href="<?php echo esc_url($official_url); ?>" target="_blank" rel="noopener"><?php echo esc_html($official_button_text); ?></a><?php endif; ?>
            </aside>
        </div>

        <?php if(!empty($gallery)): ?>
            <section class="fms-country-gallery">
                <h2>Images d’activité</h2>
                <div class="fms-country-gallery-grid">
                    <?php foreach($gallery as $image): ?>
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
</main>

<?php
    endwhile;
endif;
get_footer();
