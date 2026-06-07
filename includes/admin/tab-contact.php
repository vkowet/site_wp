<?php if($tab==='contact'): ?>

<?php
fms_section_card_start('Configuration des emails');
?>
<tr>
    <th>Email(s) destinataire(s)</th>
    <td>
        <input 
            type="text" 
            name="fms_theme_options[contact][email_recipients]" 
            value="<?php echo esc_attr(fms_get_option('contact','email_recipients')); ?>" 
            class="large-text"
            placeholder="exemple@domaine.fr, autre@domaine.fr">
        <p class="description">Adresses email séparées par une virgule</p>
    </td>
</tr>
<tr>
    <th>Sujet de l'email</th>
    <td>
        <input 
            type="text" 
            name="fms_theme_options[contact][email_subject]" 
            value="<?php echo esc_attr(fms_get_option('contact','email_subject','Nouveau message de contact')); ?>" 
            class="large-text">
        <p class="description">Sujet qui apparaîtra dans la boîte de réception</p>
    </td>
</tr>
<?php
fms_section_card_end();
?>

<?php
fms_section_card_start('Textes du formulaire');
?>
<tr>
    <th>Titre du formulaire</th>
    <td>
        <input 
            type="text" 
            name="fms_theme_options[contact][form_title]" 
            value="<?php echo esc_attr(fms_get_option('contact','form_title','Nous écrire')); ?>" 
            class="large-text">
    </td>
</tr>
<tr>
    <th>Description / Introduction</th>
    <td>
        <textarea 
            name="fms_theme_options[contact][form_description]" 
            class="large-text" 
            rows="3"><?php echo esc_textarea(fms_get_option('contact','form_description','Remplissez le formulaire ci-dessous pour nous contacter. Nous revenons vers vous dans les meilleurs délais.')); ?></textarea>
        <p class="description">Texte affiché avant le formulaire</p>
    </td>
</tr>
<?php
fms_section_card_end();
?>

<?php
fms_section_card_start('Labels et placeholders');
?>
<tr>
    <th>Label - Nom</th>
    <td>
        <input 
            type="text" 
            name="fms_theme_options[contact][label_name]" 
            value="<?php echo esc_attr(fms_get_option('contact','label_name','Nom')); ?>" 
            class="large-text">
    </td>
</tr>
<tr>
    <th>Placeholder - Nom</th>
    <td>
        <input 
            type="text" 
            name="fms_theme_options[contact][placeholder_name]" 
            value="<?php echo esc_attr(fms_get_option('contact','placeholder_name','Votre nom complet')); ?>" 
            class="large-text">
    </td>
</tr>

<tr>
    <th>Label - Email</th>
    <td>
        <input 
            type="text" 
            name="fms_theme_options[contact][label_email]" 
            value="<?php echo esc_attr(fms_get_option('contact','label_email','Email')); ?>" 
            class="large-text">
    </td>
</tr>
<tr>
    <th>Placeholder - Email</th>
    <td>
        <input 
            type="text" 
            name="fms_theme_options[contact][placeholder_email]" 
            value="<?php echo esc_attr(fms_get_option('contact','placeholder_email','votre.email@domaine.fr')); ?>" 
            class="large-text">
    </td>
</tr>

<tr>
    <th>Label - Message</th>
    <td>
        <input 
            type="text" 
            name="fms_theme_options[contact][label_message]" 
            value="<?php echo esc_attr(fms_get_option('contact','label_message','Message')); ?>" 
            class="large-text">
    </td>
</tr>
<tr>
    <th>Placeholder - Message</th>
    <td>
        <textarea 
            name="fms_theme_options[contact][placeholder_message]" 
            class="large-text" 
            rows="2"><?php echo esc_textarea(fms_get_option('contact','placeholder_message','Écrivez votre message ici...')); ?></textarea>
    </td>
</tr>
<?php
fms_section_card_end();
?>

<?php
fms_section_card_start('Bouton et messages');
?>
<tr>
    <th>Texte du bouton</th>
    <td>
        <input 
            type="text" 
            name="fms_theme_options[contact][button_text]" 
            value="<?php echo esc_attr(fms_get_option('contact','button_text','Envoyer mon message')); ?>" 
            class="large-text">
    </td>
</tr>

<tr>
    <th>Message de succès</th>
    <td>
        <textarea 
            name="fms_theme_options[contact][message_success]" 
            class="large-text" 
            rows="2"><?php echo esc_textarea(fms_get_option('contact','message_success','Votre message a été envoyé avec succès. Nous vous revenons dans les meilleurs délais.')); ?></textarea>
    </td>
</tr>

<tr>
    <th>Message d'erreur</th>
    <td>
        <textarea 
            name="fms_theme_options[contact][message_error]" 
            class="large-text" 
            rows="2"><?php echo esc_textarea(fms_get_option('contact','message_error','Une erreur s\'est produite lors de l\'envoi. Veuillez réessayer.')); ?></textarea>
    </td>
</tr>

<tr>
    <th>Erreur de validation</th>
    <td>
        <textarea 
            name="fms_theme_options[contact][message_validation_error]" 
            class="large-text" 
            rows="2"><?php echo esc_textarea(fms_get_option('contact','message_validation_error','Veuillez corriger les erreurs ci-dessus.')); ?></textarea>
    </td>
</tr>

<tr>
    <th>Champ requis - Message d'erreur Nom</th>
    <td>
        <input 
            type="text" 
            name="fms_theme_options[contact][error_name_required]" 
            value="<?php echo esc_attr(fms_get_option('contact','error_name_required','Le nom est obligatoire')); ?>" 
            class="large-text">
    </td>
</tr>

<tr>
    <th>Champ requis - Message d'erreur Email</th>
    <td>
        <input 
            type="text" 
            name="fms_theme_options[contact][error_email_required]" 
            value="<?php echo esc_attr(fms_get_option('contact','error_email_required','Un email valide est obligatoire')); ?>" 
            class="large-text">
    </td>
</tr>

<tr>
    <th>Champ requis - Message d'erreur Message</th>
    <td>
        <input 
            type="text" 
            name="fms_theme_options[contact][error_message_required]" 
            value="<?php echo esc_attr(fms_get_option('contact','error_message_required','Le message est obligatoire')); ?>" 
            class="large-text">
    </td>
</tr>

<?php
fms_section_card_end();
?>

<?php
fms_section_card_start('En-tête de la page Contact');
?>
<tr>
    <th>Titre de la page</th>
    <td>
        <input 
            type="text" 
            name="fms_theme_options[contact][page_title]" 
            value="<?php echo esc_attr(fms_get_option('contact','page_title','Nous Contacter')); ?>" 
            class="large-text">
        <p class="description">Titre principal de la page de contact</p>
    </td>
</tr>
<tr>
    <th>Message d'introduction</th>
    <td>
        <textarea 
            name="fms_theme_options[contact][page_intro]" 
            class="large-text" 
            rows="3"><?php echo esc_textarea(fms_get_option('contact','page_intro','N\'hésitez pas à nous contacter pour toute question ou demande d\'information.')); ?></textarea>
        <p class="description">Message affiché sous le titre de la page</p>
    </td>
</tr>

<tr>
    <th>Titre section Coordonnées</th>
    <td>
        <input 
            type="text" 
            name="fms_theme_options[contact][section_info_title]" 
            value="<?php echo esc_attr(fms_get_option('contact','section_info_title','Coordonnées')); ?>" 
            class="large-text">
    </td>
</tr>
<?php
fms_section_card_end();
?>

<?php endif; ?>
