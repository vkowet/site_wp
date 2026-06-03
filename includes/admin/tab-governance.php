<?php if($tab==='governance'): ?>

<?php
fms_section_card_start('Gouvernance');
?>

<tr>
<th>Titre</th>
<td>
<input type="text"
name="fms_theme_options[governance][title]"
value="<?php echo esc_attr(fms_get_option('governance','title','Notre gouvernance')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Sous-titre</th>
<td>
<textarea
name="fms_theme_options[governance][subtitle]"
rows="3"
class="large-text"><?php echo esc_textarea(fms_get_option('governance','subtitle','Une gouvernance au service de la mission et de la fraternité.')); ?></textarea>
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
value="<?php echo esc_attr(fms_get_option('governance','superior_role','Congrégation des Franciscaines Servantes de Marie')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Message</th>
<td>
<textarea
name="fms_theme_options[governance][superior_message]"
rows="6"
class="large-text"><?php echo esc_textarea(fms_get_option('governance','superior_message','Message de présentation de la gouvernance.')); ?></textarea>
</td>
</tr>

<?php
fms_section_card_end();

fms_section_card_start('Conseil Général');
?>

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

<?php
$default_name = '';

if($i === 1){
    $default_name = 'Conseillère générale';
}
?>

<input
type="text"
name="fms_theme_options[governance][member_<?php echo $i; ?>_name]"
value="<?php echo esc_attr(
fms_get_option(
'governance',
'member_'.$i.'_name',
$default_name
)
); ?>"
class="large-text">

</td>
</tr>

<tr>
<th>Fonction</th>
<td>

<?php
$default_role = '';

if($i === 1){
    $default_role = 'Membre du Conseil général';
}
?>

<input
type="text"
name="fms_theme_options[governance][member_<?php echo $i; ?>_role]"
value="<?php echo esc_attr(
fms_get_option(
'governance',
'member_'.$i.'_role',
$default_role
)
); ?>"
class="large-text">

</td>
</tr>

<?php endfor; ?>

<?php
fms_section_card_end();
?>

<?php endif; ?>