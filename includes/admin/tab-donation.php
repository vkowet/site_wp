<?php

fms_section_card_start('Page Faire un don');
?>

<tr>
<th>Titre</th>
<td>
<input
type="text"
name="fms_theme_options[donation][title]"
value="<?php echo esc_attr(
fms_get_option(
'donation',
'title',
'Faire un don'
)
); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Introduction</th>
<td>
<textarea
name="fms_theme_options[donation][content]"
rows="10"
class="large-text"><?php echo esc_textarea(
fms_get_option(
'donation',
'content'
)
); ?></textarea>
</td>
</tr>

<tr>
<th>Coordonnées bancaires</th>
<td>
<textarea
name="fms_theme_options[donation][bank]"
rows="8"
class="large-text"><?php echo esc_textarea(
fms_get_option(
'donation',
'bank'
)
); ?></textarea>
</td>
</tr>

<tr>
<th>Informations fiscales</th>
<td>
<textarea
name="fms_theme_options[donation][tax]"
rows="8"
class="large-text"><?php echo esc_textarea(
fms_get_option(
'donation',
'tax'
)
); ?></textarea>
</td>
</tr>

<tr>
<th>Texte bouton</th>
<td>
<input
type="text"
name="fms_theme_options[donation][button]"
value="<?php echo esc_attr(
fms_get_option(
'donation',
'button',
'Nous contacter'
)
); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Lien bouton</th>
<td>
<input
type="text"
name="fms_theme_options[donation][link]"
value="<?php echo esc_attr(
fms_get_option(
'donation',
'link',
'/contact'
)
); ?>"
class="large-text">
</td>
</tr>

<?php
fms_section_card_end();