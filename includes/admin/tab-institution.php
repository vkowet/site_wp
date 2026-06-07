<?php if($tab==='institution'): ?>

<?php
fms_section_card_start('Page La Congrégation - En-tête');
?>

<tr><th>Libellé supérieur</th><td><input type="text" name="fms_theme_options[institution][hero_kicker]" value="<?php echo esc_attr(fms_get_option('institution','hero_kicker','Franciscaines Servantes de Marie')); ?>" class="large-text"></td></tr>
<tr><th>Titre principal</th><td><input type="text" name="fms_theme_options[institution][hero_title]" value="<?php echo esc_attr(fms_get_option('institution','hero_title','La Congrégation')); ?>" class="large-text"></td></tr>
<tr><th>Sous-titre</th><td><textarea name="fms_theme_options[institution][hero_subtitle]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option('institution','hero_subtitle','Une famille religieuse internationale, enracinée à Blois, au service de l’Église, de l’éducation et de la dignité humaine.')); ?></textarea></td></tr>
<tr><th>Image d'en-tête</th><td><?php fms_image_field('fms_theme_options[institution][hero_image]', fms_get_option('institution','hero_image')); ?></td></tr>

<?php
fms_section_card_end();
fms_section_card_start('Introduction');
?>

<tr><th>Titre</th><td><input type="text" name="fms_theme_options[institution][intro_title]" value="<?php echo esc_attr(fms_get_option('institution','intro_title','Une présence franciscaine au cœur du monde')); ?>" class="large-text"></td></tr>
<tr><th>Texte</th><td><textarea name="fms_theme_options[institution][intro_text]" rows="5" class="large-text"><?php echo esc_textarea(fms_get_option('institution','intro_text','Les Sœurs Franciscaines Servantes de Marie forment une congrégation religieuse féminine de spiritualité franciscaine. Depuis ses origines, la Congrégation unit la prière, la vie fraternelle et le service concret auprès des personnes les plus fragiles, avec une attention particulière à l’éducation, à l’accueil et au soin.')); ?></textarea></td></tr>

<?php
fms_section_card_end();
fms_section_card_start('Repères institutionnels');
?>

<tr><th>Libellé accessibilité des chiffres</th><td><input type="text" name="fms_theme_options[institution][stats_aria_label]" value="<?php echo esc_attr(fms_get_option('institution','stats_aria_label','Repères institutionnels')); ?>" class="large-text"></td></tr>

<?php for($i=1;$i<=4;$i++): ?>
<tr>
<th>Valeur <?php echo $i; ?></th>
<td><input type="text" name="fms_theme_options[institution][stat_<?php echo $i; ?>_value]" value="<?php echo esc_attr(fms_get_option('institution','stat_'.$i.'_value',['1852','F.S.M.','5','Blois'][$i-1])); ?>"></td>
<th>Libellé <?php echo $i; ?></th>
<td><input type="text" name="fms_theme_options[institution][stat_<?php echo $i; ?>_label]" value="<?php echo esc_attr(fms_get_option('institution','stat_'.$i.'_label',['Fondation','Abréviation','Pays de présence','Maison-mère'][$i-1])); ?>"></td>
</tr>
<?php endfor; ?>

<?php
fms_section_card_end();
fms_section_card_start('Identité');
?>

<tr><th>Titre</th><td><input type="text" name="fms_theme_options[institution][identity_title]" value="<?php echo esc_attr(fms_get_option('institution','identity_title','Notre identité')); ?>" class="large-text"></td></tr>
<tr><th>Texte</th><td><textarea name="fms_theme_options[institution][identity_text]" rows="5" class="large-text"><?php echo esc_textarea(fms_get_option('institution','identity_text','Appelées à servir, les sœurs vivent l’Évangile dans la simplicité franciscaine et dans l’esprit de Marie. Leur vocation les conduit à se tenir proches des enfants, des jeunes, des femmes, des familles et de tous ceux qui souffrent dans leur cœur ou dans leur corps.')); ?></textarea></td></tr>

<?php
fms_section_card_end();
fms_section_card_start('Histoire');
?>

<tr><th>Titre</th><td><input type="text" name="fms_theme_options[institution][history_title]" value="<?php echo esc_attr(fms_get_option('institution','history_title','Une histoire née à Blois')); ?>" class="large-text"></td></tr>
<tr><th>Texte</th><td><textarea name="fms_theme_options[institution][history_text]" rows="6" class="large-text"><?php echo esc_textarea(fms_get_option('institution','history_text','La Congrégation naît à Blois en 1852, à l’initiative de Marie‑Virginie Vaslin, devenue Mère Marie Sainte‑Claire. L’œuvre commence par l’accueil et l’assistance de femmes en situation de service, puis se développe dans une mission éducative, hospitalière et sociale. La Congrégation reçoit son nom de Franciscaines Servantes de Marie en lien avec la règle du Tiers‑Ordre régulier de saint François.')); ?></textarea></td></tr>

<?php
fms_section_card_end();
fms_section_card_start('Charisme');
?>

<tr><th>Titre</th><td><input type="text" name="fms_theme_options[institution][charism_title]" value="<?php echo esc_attr(fms_get_option('institution','charism_title','Un charisme de service et de miséricorde')); ?>" class="large-text"></td></tr>
<tr><th>Texte</th><td><textarea name="fms_theme_options[institution][charism_text]" rows="5" class="large-text"><?php echo esc_textarea(fms_get_option('institution','charism_text','Le charisme de la Congrégation se reçoit dans une double fidélité : suivre le Christ pauvre et serviteur à la manière de saint François, et apprendre de Marie la disponibilité, l’écoute et l’attention aux besoins du monde. Cette spiritualité se traduit par une présence humble, éducative, fraternelle et missionnaire.')); ?></textarea></td></tr>

<?php
fms_section_card_end();
fms_section_card_start('Missions');
?>

<tr><th>Titre</th><td><input type="text" name="fms_theme_options[institution][mission_title]" value="<?php echo esc_attr(fms_get_option('institution','mission_title','Nos missions')); ?>" class="large-text"></td></tr>
<tr><th>Introduction</th><td><textarea name="fms_theme_options[institution][mission_intro]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option('institution','mission_intro','Selon les lieux et les besoins, la mission prend des formes diverses, toujours orientées vers la croissance intégrale de la personne.')); ?></textarea></td></tr>

<?php
$mission_titles = ['Éduquer','Accueillir','Soigner','Accompagner'];
$mission_texts = [
    'Contribuer à la formation humaine, spirituelle et sociale des enfants et des jeunes.',
    'Offrir une présence attentive aux personnes fragilisées, seules ou en difficulté.',
    'Servir la vie avec compassion, dans l’attention au corps, au cœur et à l’esprit.',
    'Cheminer avec les communautés locales dans la prière, la proximité et la fraternité.'
];
for($i=1;$i<=4;$i++): ?>
<tr><th colspan="2" style="background:#f5f5f5;padding:12px;">Mission <?php echo $i; ?></th></tr>
<tr><th>Titre</th><td><input type="text" name="fms_theme_options[institution][mission_<?php echo $i; ?>_title]" value="<?php echo esc_attr(fms_get_option('institution','mission_'.$i.'_title',$mission_titles[$i-1])); ?>" class="large-text"></td></tr>
<tr><th>Texte</th><td><textarea name="fms_theme_options[institution][mission_<?php echo $i; ?>_text]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option('institution','mission_'.$i.'_text',$mission_texts[$i-1])); ?></textarea></td></tr>
<?php endfor; ?>

<?php
fms_section_card_end();
fms_section_card_start('Présence internationale');
?>

<tr><th>Titre</th><td><input type="text" name="fms_theme_options[institution][presence_title]" value="<?php echo esc_attr(fms_get_option('institution','presence_title','Une congrégation ouverte aux frontières')); ?>" class="large-text"></td></tr>
<tr><th>Texte</th><td><textarea name="fms_theme_options[institution][presence_text]" rows="4" class="large-text"><?php echo esc_textarea(fms_get_option('institution','presence_text','De la maison‑mère de Blois aux communautés présentes sur plusieurs continents, les Sœurs Franciscaines Servantes de Marie portent une même mission : servir avec paix, simplicité et espérance, dans la diversité des cultures et des réalités locales.')); ?></textarea></td></tr>

<?php for($i=1;$i<=5;$i++): ?>
<tr><th>Pays / zone <?php echo $i; ?></th><td><input type="text" name="fms_theme_options[institution][presence_<?php echo $i; ?>]" value="<?php echo esc_attr(fms_get_option('institution','presence_'.$i,['France','Italie','Madagascar','Tchad','Inde'][$i-1])); ?>" class="large-text"></td></tr>
<?php endfor; ?>

<?php
fms_section_card_end();
fms_section_card_start('Citation');
?>

<tr><th>Citation</th><td><textarea name="fms_theme_options[institution][quote]" rows="4" class="large-text"><?php echo esc_textarea(fms_get_option('institution','quote','Servir, apprendre et éduquer dans un esprit de fraternité, de simplicité et d’espérance.')); ?></textarea></td></tr>
<tr><th>Signature</th><td><input type="text" name="fms_theme_options[institution][quote_author]" value="<?php echo esc_attr(fms_get_option('institution','quote_author','Congrégation des Franciscaines Servantes de Marie')); ?>" class="large-text"></td></tr>

<?php
fms_section_card_end();
?>

<?php endif; ?>
