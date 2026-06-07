<?php

fms_section_card_start('Configuration de la page Faire un don');
?>

<tr>
<th>Titre de la page</th>
<td>
<input type="text" name="fms_theme_options[donation][title]" value="<?php echo esc_attr(fms_get_option('donation','title','Faire un don')); ?>" class="large-text">
</td>
</tr>

<tr>
<th>Introduction / Description</th>
<td>
<textarea name="fms_theme_options[donation][intro]" rows="5" class="large-text"><?php echo esc_textarea(fms_get_option('donation','intro','Votre generosite soutient les missions des Soeurs Franciscaines Servantes de Marie, au service de la fraternite, de l’accueil et de la dignite humaine.')); ?></textarea>
<p class="description">Texte affiche en introduction de la page.</p>
</td>
</tr>

<tr>
<th>Titre de la section des modes de don</th>
<td>
<input type="text" name="fms_theme_options[donation][methods_section_title]" value="<?php echo esc_attr(fms_get_option('donation','methods_section_title','Choisissez votre mode de soutien')); ?>" class="large-text">
</td>
</tr>

<?php fms_section_card_end(); ?>

<?php fms_section_card_start('Bloc 1 : Don en ligne'); ?>

<tr>
<th>Libelle court</th>
<td>
<input type="text" name="fms_theme_options[donation][online_label]" value="<?php echo esc_attr(fms_get_option('donation','online_label','Don securise')); ?>" class="large-text">
</td>
</tr>

<tr>
<th>Titre du bloc</th>
<td>
<input type="text" name="fms_theme_options[donation][online_title]" value="<?php echo esc_attr(fms_get_option('donation','online_title','Faire un don en ligne')); ?>" class="large-text">
</td>
</tr>

<tr>
<th>Description / Texte du bloc</th>
<td>
<textarea name="fms_theme_options[donation][online_description]" rows="4" class="large-text"><?php echo esc_textarea(fms_get_option('donation','online_description','Soutenez directement les missions de la Congregation depuis une plateforme de don securisee.')); ?></textarea>
</td>
</tr>

<tr>
<th>Texte du bouton</th>
<td>
<input type="text" name="fms_theme_options[donation][online_button_text]" value="<?php echo esc_attr(fms_get_option('donation','online_button_text','Donner en ligne')); ?>" class="large-text">
</td>
</tr>

<tr>
<th>Lien du bouton</th>
<td>
<input type="url" name="fms_theme_options[donation][online_button_url]" value="<?php echo esc_attr(fms_get_option('donation','online_button_url', home_url('/contact/'))); ?>" class="large-text" placeholder="https://exemple-plateforme-don.fr">
<p class="description">URL vers votre plateforme de don en ligne. A defaut, le bouton peut rediriger vers la page contact.</p>
</td>
</tr>

<?php fms_section_card_end(); ?>

<?php fms_section_card_start('Bloc 2 : Don par cheque'); ?>

<tr>
<th>Libelle court</th>
<td>
<input type="text" name="fms_theme_options[donation][check_label]" value="<?php echo esc_attr(fms_get_option('donation','check_label','Envoi postal')); ?>" class="large-text">
</td>
</tr>

<tr>
<th>Titre du bloc</th>
<td>
<input type="text" name="fms_theme_options[donation][check_title]" value="<?php echo esc_attr(fms_get_option('donation','check_title','Faire un don par cheque')); ?>" class="large-text">
</td>
</tr>

<tr>
<th>Description / Texte du bloc</th>
<td>
<textarea name="fms_theme_options[donation][check_description]" rows="4" class="large-text"><?php echo esc_textarea(fms_get_option('donation','check_description','Adressez votre don a la communaute en indiquant vos coordonnees pour le suivi administratif.')); ?></textarea>
</td>
</tr>

<tr>
<th>Texte du bouton</th>
<td>
<input type="text" name="fms_theme_options[donation][check_button_text]" value="<?php echo esc_attr(fms_get_option('donation','check_button_text','Voir les informations cheque')); ?>" class="large-text">
</td>
</tr>

<tr>
<th>Titre du detail cheque</th>
<td>
<input type="text" name="fms_theme_options[donation][check_detail_title]" value="<?php echo esc_attr(fms_get_option('donation','check_detail_title','Informations pour l’envoi du cheque')); ?>" class="large-text">
</td>
</tr>

<tr>
<th>Adresse / Informations d'envoi</th>
<td>
<textarea name="fms_theme_options[donation][check_address]" rows="6" class="large-text"><?php echo esc_textarea(fms_get_option('donation','check_address',"Soeurs Franciscaines Servantes de Marie\nMaison-mere\nBlois, France")); ?></textarea>
<p class="description">Adresse postale ou informations utiles pour l'envoi du cheque.</p>
</td>
</tr>

<tr>
<th>Titre de la note fiscale</th>
<td>
<input type="text" name="fms_theme_options[donation][check_fiscal_title]" value="<?php echo esc_attr(fms_get_option('donation','check_fiscal_title','Information fiscale')); ?>" class="large-text">
</td>
</tr>

<tr>
<th>Note fiscale cheque</th>
<td>
<textarea name="fms_theme_options[donation][check_fiscal_info]" rows="4" class="large-text"><?php echo esc_textarea(fms_get_option('donation','check_fiscal_info','Un recu peut etre etabli lorsque les informations necessaires sont transmises avec le don.')); ?></textarea>
</td>
</tr>

<tr>
<th>Titre des informations a renseigner</th>
<td>
<input type="text" name="fms_theme_options[donation][check_modal_fields_title]" value="<?php echo esc_attr(fms_get_option('donation','check_modal_fields_title','Informations à renseigner sur le chèque')); ?>" class="large-text">
</td>
</tr>

<tr>
<th>Informations à renseigner sur le chèque</th>
<td>
<textarea name="fms_theme_options[donation][check_modal_fields]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option('donation','check_modal_fields','Ordre du chèque
Montant
Date et lieu
Signature')); ?></textarea>
</td>
</tr>

<tr>
<th>Message de rappel pour le reçu</th>
<td>
<textarea name="fms_theme_options[donation][check_modal_reminder]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option('donation','check_modal_reminder','Merci de joindre vos coordonnées complètes avec votre don afin de recevoir votre reçu ou justificatif.')); ?></textarea>
</td>
</tr>

<?php fms_section_card_end(); ?>

<?php fms_section_card_start('Bloc 3 : Don par telephone'); ?>

<tr>
<th>Libelle court</th>
<td>
<input type="text" name="fms_theme_options[donation][phone_label]" value="<?php echo esc_attr(fms_get_option('donation','phone_label','Contact direct')); ?>" class="large-text">
</td>
</tr>

<tr>
<th>Titre du bloc</th>
<td>
<input type="text" name="fms_theme_options[donation][phone_title]" value="<?php echo esc_attr(fms_get_option('donation','phone_title','Faire un don par telephone')); ?>" class="large-text">
</td>
</tr>

<tr>
<th>Description / Texte du bloc</th>
<td>
<textarea name="fms_theme_options[donation][phone_description]" rows="4" class="large-text"><?php echo esc_textarea(fms_get_option('donation','phone_description','Echangez avec une personne de contact pour etre accompagne dans votre demarche de soutien.')); ?></textarea>
</td>
</tr>

<tr>
<th>Texte du bouton</th>
<td>
<input type="text" name="fms_theme_options[donation][phone_button_text]" value="<?php echo esc_attr(fms_get_option('donation','phone_button_text','Contacter la communaute')); ?>" class="large-text">
</td>
</tr>

<tr>
<th>Numero de telephone</th>
<td>
<input type="tel" name="fms_theme_options[donation][phone_number]" value="<?php echo esc_attr(fms_get_option('donation','phone_number','A renseigner')); ?>" class="large-text" placeholder="+33 1 23 45 67 89">
</td>
</tr>

<tr>
<th>Titre du detail telephone</th>
<td>
<input type="text" name="fms_theme_options[donation][phone_detail_title]" value="<?php echo esc_attr(fms_get_option('donation','phone_detail_title','Disponibilite')); ?>" class="large-text">
</td>
</tr>

<tr>
<th>Horaires / Disponibilite</th>
<td>
<textarea name="fms_theme_options[donation][phone_hours]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option('donation','phone_hours','Du lundi au vendredi, selon les disponibilites de la maison.')); ?></textarea>
</td>
</tr>

<?php fms_section_card_end(); ?>

<?php fms_section_card_start('Mention de defiscalisation'); ?>

<tr>
<th>Texte affiche sous l'introduction</th>
<td>
<textarea name="fms_theme_options[donation][fiscal_content]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option('donation','fiscal_content','Les dons sont defiscalises selon la reglementation applicable. Un recu peut etre transmis avec les informations necessaires.')); ?></textarea>
<p class="description">Mention courte affichee avant les boutons de don.</p>
</td>
</tr>

<?php fms_section_card_end(); ?>

<?php fms_section_card_start('Bloc de valeurs franciscaines'); ?>

<tr>
<th>Afficher les valeurs</th>
<td>
<input type="hidden" name="fms_theme_options[donation][show_values]" value="0">
<label>
<input type="checkbox" name="fms_theme_options[donation][show_values]" value="1" <?php checked(fms_get_option('donation','show_values',1)); ?>>
Afficher les trois valeurs
</label>
</td>
</tr>

<tr>
<th>Titre de la section</th>
<td>
<input type="text" name="fms_theme_options[donation][values_section_title]" value="<?php echo esc_attr(fms_get_option('donation','values_section_title','Pourquoi soutenir nos missions ?')); ?>" class="large-text">
</td>
</tr>

<tr>
<th>Valeur 1 - Titre</th>
<td><input type="text" name="fms_theme_options[donation][value1_title]" value="<?php echo esc_attr(fms_get_option('donation','value1_title','Accompagner')); ?>" class="large-text"></td>
</tr>
<tr>
<th>Valeur 1 - Description</th>
<td><textarea name="fms_theme_options[donation][value1_description]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option('donation','value1_description','Votre soutien aide les communautes a demeurer proches des personnes fragiles, des familles et des jeunes.')); ?></textarea></td>
</tr>

<tr>
<th>Valeur 2 - Titre</th>
<td><input type="text" name="fms_theme_options[donation][value2_title]" value="<?php echo esc_attr(fms_get_option('donation','value2_title','Servir')); ?>" class="large-text"></td>
</tr>
<tr>
<th>Valeur 2 - Description</th>
<td><textarea name="fms_theme_options[donation][value2_description]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option('donation','value2_description','Vos dons participent aux actions educatives, sociales, pastorales et fraternelles portees localement.')); ?></textarea></td>
</tr>

<tr>
<th>Valeur 3 - Titre</th>
<td><input type="text" name="fms_theme_options[donation][value3_title]" value="<?php echo esc_attr(fms_get_option('donation','value3_title','Transmettre')); ?>" class="large-text"></td>
</tr>
<tr>
<th>Valeur 3 - Description</th>
<td><textarea name="fms_theme_options[donation][value3_description]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option('donation','value3_description','Vous contribuez a transmettre un esprit franciscain fait de simplicite, de paix et d’esperance.')); ?></textarea></td>
</tr>

<?php fms_section_card_end(); ?>
