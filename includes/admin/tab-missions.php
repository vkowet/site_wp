<?php if($tab==='missions'): ?>

<?php
fms_section_card_start('Page Nos missions - En-tête');
?>

<tr><th>Libellé supérieur</th><td><input type="text" name="fms_theme_options[missions][hero_kicker]" value="<?php echo esc_attr(fms_get_option('missions','hero_kicker','Mission franciscaine')); ?>" class="large-text"></td></tr>
<tr><th>Titre principal</th><td><input type="text" name="fms_theme_options[missions][hero_title]" value="<?php echo esc_attr(fms_get_option('missions','hero_title','Nos missions')); ?>" class="large-text"></td></tr>
<tr><th>Sous-titre</th><td><textarea name="fms_theme_options[missions][hero_subtitle]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option('missions','hero_subtitle','Servir la personne humaine dans toutes ses dimensions, avec une attention particulière aux plus fragiles, aux jeunes et aux familles.')); ?></textarea></td></tr>
<tr><th>Image d'en-tête</th><td><?php fms_image_field('fms_theme_options[missions][hero_image]', fms_get_option('missions','hero_image')); ?></td></tr>

<?php
fms_section_card_end();
fms_section_card_start('Introduction');
?>

<tr><th>Titre</th><td><input type="text" name="fms_theme_options[missions][intro_title]" value="<?php echo esc_attr(fms_get_option('missions','intro_title','Une mission au service de la vie')); ?>" class="large-text"></td></tr>
<tr><th>Texte</th><td><textarea name="fms_theme_options[missions][intro_text]" rows="5" class="large-text"><?php echo esc_textarea(fms_get_option('missions','intro_text','Depuis les origines de la Congrégation, les Sœurs Franciscaines Servantes de Marie répondent aux besoins de leur temps par une présence simple, éducative, fraternelle et compatissante. Leurs missions s’enracinent dans l’Évangile, la spiritualité franciscaine et l’attention maternelle de Marie.')); ?></textarea></td></tr>

<?php
fms_section_card_end();
fms_section_card_start('Axes missionnaires');

$mission_titles = ['Éduquer et former','Accueillir et protéger','Soigner et consoler','Accompagner spirituellement','Servir les plus humbles','Construire la fraternité'];
$mission_texts = [
    'Favoriser la croissance humaine, intellectuelle et spirituelle des enfants, des jeunes et des adultes confiés à la mission.',
    'Créer des lieux d’écoute, de sécurité et de dignité pour les personnes fragilisées, isolées ou en difficulté.',
    'Porter une attention concrète aux souffrances du corps et du cœur, dans un esprit de compassion et de respect.',
    'Soutenir la vie de foi, la prière, le discernement et l’espérance au sein des communautés locales.',
    'Être proche des personnes modestes, démunies ou oubliées, selon l’intuition première de la Congrégation.',
    'Témoigner d’une fraternité ouverte, paisible et internationale, au-delà des cultures et des frontières.'
];
for($i=1;$i<=6;$i++): ?>
<tr><th colspan="2" style="background:#f5f5f5;padding:12px;">Mission <?php echo $i; ?></th></tr>
<tr><th>Titre</th><td><input type="text" name="fms_theme_options[missions][item_<?php echo $i; ?>_title]" value="<?php echo esc_attr(fms_get_option('missions','item_'.$i.'_title',$mission_titles[$i-1])); ?>" class="large-text"></td></tr>
<tr><th>Texte</th><td><textarea name="fms_theme_options[missions][item_<?php echo $i; ?>_text]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option('missions','item_'.$i.'_text',$mission_texts[$i-1])); ?></textarea></td></tr>
<?php endfor; ?>

<?php
fms_section_card_end();
fms_section_card_start('Bloc final');
?>

<tr><th>Titre</th><td><input type="text" name="fms_theme_options[missions][closing_title]" value="<?php echo esc_attr(fms_get_option('missions','closing_title','Une même mission, plusieurs visages')); ?>" class="large-text"></td></tr>
<tr><th>Texte</th><td><textarea name="fms_theme_options[missions][closing_text]" rows="4" class="large-text"><?php echo esc_textarea(fms_get_option('missions','closing_text','Dans chaque pays et chaque communauté, la mission s’adapte aux réalités locales. Elle demeure portée par le même désir : servir avec simplicité, annoncer l’espérance et reconnaître en chacun une dignité reçue de Dieu.')); ?></textarea></td></tr>
<tr><th>Texte bouton</th><td><input type="text" name="fms_theme_options[missions][button_text]" value="<?php echo esc_attr(fms_get_option('missions','button_text','Découvrir notre présence mondiale')); ?>" class="large-text"></td></tr>
<tr><th>Lien bouton</th><td><input type="text" name="fms_theme_options[missions][button_link]" value="<?php echo esc_attr(fms_get_option('missions','button_link','/presence-mondiale')); ?>" class="large-text"></td></tr>

<?php
fms_section_card_end();
?>

<?php endif; ?>
