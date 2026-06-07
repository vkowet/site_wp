<?php if($tab==='world'): ?>
<?php
$world_subtab = isset($_GET['country']) ? sanitize_text_field($_GET['country']) : 'global';
$countries = get_posts([
    'post_type' => 'world_presence',
    'post_status' => ['publish', 'draft', 'private'],
    'numberposts' => -1,
    'meta_key' => '_fms_order',
    'orderby' => 'meta_value_num title',
    'order' => 'ASC',
]);
?>

<style>
.fms-world-subtabs { display:flex; flex-wrap:wrap; gap:8px; margin:18px 0 24px; }
.fms-world-subtabs a { background:#f7f9fb; border:1px solid #d9e2ec; color:#16324f; padding:8px 12px; text-decoration:none; border-radius:4px; font-weight:600; }
.fms-world-subtabs a.is-active { background:#d9e8f5; border-color:#234e70; box-shadow: inset 0 -2px 0 #234e70; }
</style>

<div class="fms-world-subtabs">
    <a class="<?php echo $world_subtab === 'global' ? 'is-active' : ''; ?>" href="?page=fms-theme-options&tab=world&country=global">Réglages globaux</a>
    <?php foreach($countries as $country): ?>
        <a class="<?php echo (string) $country->ID === $world_subtab ? 'is-active' : ''; ?>" href="?page=fms-theme-options&tab=world&country=<?php echo esc_attr($country->ID); ?>">
            <?php echo esc_html(get_the_title($country)); ?>
        </a>
    <?php endforeach; ?>
</div>

<?php if($world_subtab === 'global'): ?>

<?php fms_section_card_start('Réseau mondial - Réglages globaux'); ?>
<tr><th>Titre global</th><td><input type="text" name="fms_theme_options[world][title]" value="<?php echo esc_attr(fms_get_option('world','title','Présence mondiale')); ?>" class="large-text"></td></tr>
<tr><th>Sous-titre global</th><td><textarea name="fms_theme_options[world][subtitle]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option('world','subtitle','Une présence missionnaire portée par des communautés locales, au service de l’éducation, de la dignité humaine et de la fraternité.')); ?></textarea></td></tr>
<tr><th>Texte d'introduction</th><td><textarea name="fms_theme_options[world][intro]" rows="4" class="large-text"><?php echo esc_textarea(fms_get_option('world','intro','Découvrez les pays où les Sœurs Franciscaines Servantes de Marie vivent leur mission. Chaque fiche présente les réalités locales, les engagements, quelques chiffres et les liens utiles.')); ?></textarea></td></tr>
<tr><th>Cartes / ligne</th><td><input type="number" min="1" max="4" name="fms_theme_options[world][cards_per_row]" value="<?php echo esc_attr(fms_get_option('world','cards_per_row','3')); ?>"></td></tr>
<tr><th>Texte bouton carte</th><td><input type="text" name="fms_theme_options[world][card_button_text]" value="<?php echo esc_attr(fms_get_option('world','card_button_text','Voir la mission du pays')); ?>" class="large-text"></td></tr>
<?php fms_section_card_end(); ?>

<?php else: ?>

<?php
$country_id = absint($world_subtab);
$country_post = get_post($country_id);
if($country_post && $country_post->post_type === 'world_presence'):
    $country_options = fms_get_world_country_options($country_id);
    $short_default = $country_post->post_excerpt ?: wp_trim_words(wp_strip_all_tags($country_post->post_content), 24);
    $mission_default = $country_post->post_content;
?>

<?php fms_section_card_start('Pays - '.esc_html(get_the_title($country_post))); ?>
<tr><th>Page publique</th><td><a href="<?php echo esc_url(get_permalink($country_id)); ?>" target="_blank" rel="noopener">Voir la fiche pays</a></td></tr>
<tr><th>Description courte</th><td><textarea name="fms_theme_options[world_countries][<?php echo esc_attr($country_id); ?>][short_description]" rows="3" class="large-text"><?php echo esc_textarea($country_options['short_description'] ?? $short_default); ?></textarea></td></tr>
<tr><th>Mission dans le pays</th><td><textarea name="fms_theme_options[world_countries][<?php echo esc_attr($country_id); ?>][mission_text]" rows="7" class="large-text"><?php echo esc_textarea($country_options['mission_text'] ?? $mission_default); ?></textarea></td></tr>
<tr><th>Nombre de sœurs</th><td><input type="text" name="fms_theme_options[world_countries][<?php echo esc_attr($country_id); ?>][sisters]" value="<?php echo esc_attr(fms_get_world_country_value($country_id,'sisters','')); ?>" class="large-text"></td></tr>
<tr><th>Nombre de communautés</th><td><input type="text" name="fms_theme_options[world_countries][<?php echo esc_attr($country_id); ?>][communities]" value="<?php echo esc_attr(fms_get_world_country_value($country_id,'communities','')); ?>" class="large-text"></td></tr>
<tr><th>Depuis</th><td><input type="text" name="fms_theme_options[world_countries][<?php echo esc_attr($country_id); ?>][since]" value="<?php echo esc_attr(fms_get_world_country_value($country_id,'since','')); ?>" class="large-text"></td></tr>
<tr><th>Bénéficiaires / personnes accompagnées</th><td><input type="text" name="fms_theme_options[world_countries][<?php echo esc_attr($country_id); ?>][beneficiaries]" value="<?php echo esc_attr($country_options['beneficiaries'] ?? ''); ?>" class="large-text"></td></tr>
<tr><th>Œuvres / lieux de mission</th><td><input type="text" name="fms_theme_options[world_countries][<?php echo esc_attr($country_id); ?>][works]" value="<?php echo esc_attr($country_options['works'] ?? ''); ?>" class="large-text"></td></tr>
<tr><th>Site officiel du pays</th><td><input type="url" name="fms_theme_options[world_countries][<?php echo esc_attr($country_id); ?>][official_url]" value="<?php echo esc_attr($country_options['official_url'] ?? ''); ?>" class="large-text" placeholder="https://"></td></tr>
<tr><th>Texte bouton site officiel</th><td><input type="text" name="fms_theme_options[world_countries][<?php echo esc_attr($country_id); ?>][official_button_text]" value="<?php echo esc_attr($country_options['official_button_text'] ?? 'Visiter le site officiel'); ?>" class="large-text"></td></tr>
<?php fms_section_card_end(); ?>

<?php fms_section_card_start('Images d’activité'); ?>
<?php for($i=1;$i<=4;$i++): ?>
<tr><th>Image activité <?php echo $i; ?></th><td><?php fms_image_field('fms_theme_options[world_countries]['.$country_id.'][activity_image_'.$i.']', $country_options['activity_image_'.$i] ?? ''); ?></td></tr>
<?php endfor; ?>
<?php fms_section_card_end(); ?>

<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
