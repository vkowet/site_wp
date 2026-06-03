<?php if($tab==='institution'): ?>

<?php
fms_section_card_start('Présentation institutionnelle');
?>

<tr>
<th>Titre</th>
<td>
<input type="text"
name="fms_theme_options[institution][title]"
value="<?php echo esc_attr(fms_get_option('institution','title','Une congrégation au service de l\'Église et du monde')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Texte</th>
<td>
<textarea
name="fms_theme_options[institution][intro]"
rows="5"
class="large-text"><?php echo esc_textarea(
fms_get_option(
'institution',
'intro',
'Depuis sa fondation, la congrégation des Franciscaines Servantes de Marie poursuit sa mission d’éducation, de fraternité et de service auprès des populations qu’elle accompagne.'
)); ?></textarea>
</td>
</tr>

<?php
fms_section_card_end();
?>

<?php
fms_section_card_start('Chiffres institutionnels');

for($i=1;$i<=4;$i++):
?>

<tr>

<th>Valeur <?php echo $i; ?></th>

<td>
<input type="text"
name="fms_theme_options[institution][stat_<?php echo $i; ?>_value]"
value="<?php echo esc_attr(
fms_get_option(
'institution',
'stat_'.$i.'_value',
['1891','10+','100+','50+'][$i-1]
)
); ?>">
</td>

<th>Libellé <?php echo $i; ?></th>

<td>
<input type="text"
name="fms_theme_options[institution][stat_<?php echo $i; ?>_label]"
value="<?php echo esc_attr(
fms_get_option(
'institution',
'stat_'.$i.'_label',
[
'Année de fondation',
'Pays de présence',
'Religieuses et missionnaires',
'Œuvres éducatives et sociales'
][$i-1]
)
); ?>">
</td>

</tr>

<?php endfor;

fms_section_card_end();
?>

<?php
fms_section_card_start('Citation');
?>

<tr>
<th>Citation</th>
<td>
<textarea
name="fms_theme_options[institution][quote]"
rows="4"
class="large-text"><?php echo esc_textarea(
fms_get_option(
'institution',
'quote',
'Servir, apprendre et éduquer dans un esprit de fraternité, de simplicité et d’espérance.'
)); ?></textarea>
</td>
</tr>

<tr>
<th>Signature</th>
<td>
<input type="text"
name="fms_theme_options[institution][quote_author]"
value="<?php echo esc_attr(
fms_get_option(
'institution',
'quote_author',
'Congrégation des Franciscaines Servantes de Marie'
)); ?>"
class="large-text">
</td>
</tr>

<?php
fms_section_card_end();
?>

<?php endif; ?>