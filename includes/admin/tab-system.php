<?php if($tab==='system'): ?>

<?php
fms_section_card_start('Mentions légales');
?>

<tr>
<th>Titre</th>
<td>
<input type="text"
name="fms_theme_options[system][legal_title]"
value="<?php echo esc_attr(fms_get_option('system','legal_title','Mentions légales')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Contenu</th>
<td>
<textarea
name="fms_theme_options[system][legal_content]"
rows="14"
class="large-text"><?php echo esc_textarea(fms_get_option('system','legal_content')); ?></textarea>
</td>
</tr>

<?php
fms_section_card_end();
?>



<?php
fms_section_card_start('Politique de confidentialité');
?>

<tr>
<th>Titre</th>
<td>
<input type="text"
name="fms_theme_options[system][privacy_title]"
value="<?php echo esc_attr(fms_get_option('system','privacy_title','Politique de confidentialité')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Contenu</th>
<td>
<textarea
name="fms_theme_options[system][privacy_content]"
rows="14"
class="large-text"><?php echo esc_textarea(fms_get_option('system','privacy_content')); ?></textarea>
</td>
</tr>

<?php
fms_section_card_end();
?>



<?php
fms_section_card_start('Faire un don');
?>

<tr>
<th>Titre</th>
<td>
<input type="text"
name="fms_theme_options[system][donation_title]"
value="<?php echo esc_attr(fms_get_option('system','donation_title','Faire un don')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Contenu</th>
<td>
<textarea
name="fms_theme_options[system][donation_content]"
rows="10"
class="large-text"><?php echo esc_textarea(fms_get_option('system','donation_content')); ?></textarea>
</td>
</tr>

<tr>
<th>IBAN / Coordonnées bancaires</th>
<td>
<textarea
name="fms_theme_options[system][donation_bank]"
rows="6"
class="large-text"><?php echo esc_textarea(
fms_get_option('system','donation_bank')
); ?></textarea>
</td>
</tr>

<tr>
<th>Texte fiscal</th>
<td>
<textarea
name="fms_theme_options[system][donation_tax]"
rows="6"
class="large-text"><?php echo esc_textarea(
fms_get_option('system','donation_tax')
); ?></textarea>
</td>
</tr>

<tr>
<th>Texte bouton</th>
<td>
<input type="text"
name="fms_theme_options[system][donation_button]"
value="<?php echo esc_attr(fms_get_option('system','donation_button','Nous contacter')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Lien bouton</th>
<td>
<input type="text"
name="fms_theme_options[system][donation_link]"
value="<?php echo esc_attr(fms_get_option('system','donation_link','/contact')); ?>"
class="large-text">
</td>
</tr>

<?php
fms_section_card_end();
?>



<?php
fms_section_card_start('Footer légal');
?>

<tr>
<th>Copyright</th>
<td>
<input type="text"
name="fms_theme_options[system][copyright]"
value="<?php echo esc_attr(fms_get_option('system','copyright')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Texte bas footer</th>
<td>
<textarea
name="fms_theme_options[system][footer_text]"
rows="6"
class="large-text"><?php echo esc_textarea(fms_get_option('system','footer_text')); ?></textarea>
</td>
</tr>

<?php
fms_section_card_end();
?>

<?php endif; ?>
