<?php if($tab==='governance'): ?>

<?php
fms_section_card_start('En-tête de la page');
?>

<tr>
<th>Libellé supérieur</th>
<td>
<input type="text"
name="fms_theme_options[governance][hero_title]"
value="<?php echo esc_attr(fms_get_option('governance','hero_title','Gouvernance')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Titre principal</th>
<td>
<input type="text"
name="fms_theme_options[governance][title]"
value="<?php echo esc_attr(fms_get_option('governance','title','Notre gouvernance')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Texte d'en-tête</th>
<td>
<textarea
name="fms_theme_options[governance][hero_text]"
rows="3"
class="large-text"><?php echo esc_textarea(fms_get_option('governance','hero_text','Une responsabilité exercée dans l’écoute, le discernement et le service de la mission commune.')); ?></textarea>
</td>
</tr>

<tr>
<th>Sous-titre institutionnel</th>
<td>
<textarea
name="fms_theme_options[governance][subtitle]"
rows="3"
class="large-text"><?php echo esc_textarea(fms_get_option('governance','subtitle','Une gouvernance au service de la mission, de l’unité et de la fidélité au charisme.')); ?></textarea>
</td>
</tr>

<?php
fms_section_card_end();

fms_section_card_start('Supérieure Générale');
?>

<tr>
<th>Photo</th>
<td>
<?php fms_image_field(
'fms_theme_options[governance][superior_photo]',
fms_get_option('governance','superior_photo')
); ?>
</td>
</tr>

<tr>
<th>Nom</th>
<td>
<input type="text"
name="fms_theme_options[governance][superior_name]"
value="<?php echo esc_attr(fms_get_option('governance','superior_name','Mère Supérieure Générale')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Fonction</th>
<td>
<input type="text"
name="fms_theme_options[governance][superior_role]"
value="<?php echo esc_attr(fms_get_option('governance','superior_role','Supérieure Générale')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Message</th>
<td>
<textarea
name="fms_theme_options[governance][superior_message]"
rows="6"
class="large-text"><?php echo esc_textarea(fms_get_option('governance','superior_message','La Supérieure Générale, avec son Conseil, accompagne la vie de la Congrégation et veille à la communion entre les communautés, au service de l’Église et du monde.')); ?></textarea>
</td>
</tr>

<?php
fms_section_card_end();

fms_section_card_start('Conseil Général');
?>

<tr>
<th>Titre de la section</th>
<td>
<input type="text"
name="fms_theme_options[governance][council_title]"
value="<?php echo esc_attr(fms_get_option('governance','council_title','Conseil Général')); ?>"
class="large-text">
</td>
</tr>

<?php for($i=1;$i<=6;$i++): ?>

<tr>
<th colspan="2"
style="background:#f5f5f5;padding:12px;">
Membre <?php echo $i; ?>
</th>
</tr>

<tr>
<th>Photo</th>
<td>
<?php
fms_image_field(
'fms_theme_options[governance][member_'.$i.'_photo]',
fms_get_option('governance','member_'.$i.'_photo')
);
?>
</td>
</tr>

<tr>
<th>Nom</th>
<td>
<input
type="text"
name="fms_theme_options[governance][member_<?php echo $i; ?>_name]"
value="<?php echo esc_attr(fms_get_option('governance','member_'.$i.'_name','')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Fonction</th>
<td>
<input
type="text"
name="fms_theme_options[governance][member_<?php echo $i; ?>_role]"
value="<?php echo esc_attr(fms_get_option('governance','member_'.$i.'_role','')); ?>"
class="large-text">
</td>
</tr>

<?php endfor; ?>

<?php
fms_section_card_end();

fms_section_card_start('Organisation institutionnelle');
?>

<tr>
<th>Titre</th>
<td>
<input type="text"
name="fms_theme_options[governance][org_title]"
value="<?php echo esc_attr(fms_get_option('governance','org_title','Organisation de la Congrégation')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Texte</th>
<td>
<textarea
name="fms_theme_options[governance][org_text]"
rows="5"
class="large-text"><?php echo esc_textarea(fms_get_option('governance','org_text','La Congrégation est gouvernée par la Supérieure Générale et son Conseil. Ensemble, elles veillent à la fidélité au charisme, à la mission éducative et sociale, et à l’unité des communautés présentes dans le monde.')); ?></textarea>
</td>
</tr>

<?php
fms_section_card_end();
?>

<?php endif; ?>
