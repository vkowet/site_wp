<?php if($tab==='vocations'): ?>
<?php
if (!function_exists('fms_vocation_option')) {
    function fms_vocation_option($field, $default = '') {
        $value = fms_get_option('vocations', $field, $default);

        return $value === '' || $value === null ? $default : $value;
    }
}
?>
<?php
fms_section_card_start('Vocations - Paramètres généraux');
?>
<tr><th>Titre de la page</th><td><input type="text" name="fms_theme_options[vocations][title]" value="<?php echo esc_attr(fms_vocation_option('title','Vocations')); ?>" class="large-text"></td></tr>
<tr><th>Titre d'introduction</th><td><input type="text" name="fms_theme_options[vocations][intro_title]" value="<?php echo esc_attr(fms_vocation_option('intro_title','Discerner un appel à servir')); ?>" class="large-text"></td></tr>
<tr><th>Texte d'introduction</th><td><textarea name="fms_theme_options[vocations][intro_text]" class="large-text"><?php echo esc_textarea(fms_vocation_option('intro_text','La vocation religieuse naît souvent dans le silence d’un désir profond : aimer Dieu, servir les autres et donner sa vie pour une mission qui dépasse nos propres projets. Chez les Sœurs Franciscaines Servantes de Marie, cet appel se découvre pas à pas, dans la prière, l’écoute, la fraternité et le service des personnes confiées à notre présence.')); ?></textarea></td></tr>
<?php
fms_section_card_end();
?>

<?php
fms_section_card_start('Vocation Franciscaine');
?>
<tr><th>Titre</th><td><input type="text" name="fms_theme_options[vocations][vocation_title]" value="<?php echo esc_attr(fms_vocation_option('vocation_title','La vocation franciscaine')); ?>" class="large-text"></td></tr>
<tr><th>Sous-titre</th><td><input type="text" name="fms_theme_options[vocations][vocation_subtitle]" value="<?php echo esc_attr(fms_vocation_option('vocation_subtitle','À la suite du Christ, avec saint François et Marie')); ?>" class="large-text"></td></tr>
<tr><th>Description</th><td><textarea name="fms_theme_options[vocations][vocation_description]" class="large-text"><?php echo esc_textarea(fms_vocation_option('vocation_description','Entrer dans la vie religieuse, c’est répondre librement à l’amour de Dieu et choisir de marcher à la suite du Christ dans une vie donnée. Cette réponse se nourrit de la prière, de la Parole de Dieu, de la vie fraternelle et d’un service humble auprès de celles et ceux qui ont besoin d’être accueillis, accompagnés et relevés.\n\nComme Franciscaines Servantes de Marie, nous cherchons à vivre l’Évangile dans la simplicité, la joie et la proximité. L’esprit de saint François nous invite à reconnaître chaque personne comme un frère ou une sœur, tandis que Marie nous apprend la disponibilité, la confiance et le service discret.\n\nNotre vocation se déploie dans les lieux où la congrégation est appelée : l’éducation, la formation, l’accompagnement humain et spirituel, l’attention aux plus fragiles et la construction d’une fraternité ouverte à tous.')); ?></textarea></td></tr>
<?php
fms_section_card_end();
?>

<?php
fms_section_card_start('Charisme Franciscain - Valeurs');
?>
<tr><th>Titre</th><td><input type="text" name="fms_theme_options[vocations][charism_title]" value="<?php echo esc_attr(fms_vocation_option('charism_title','Vivre notre charisme')); ?>" class="large-text"></td></tr>
<tr><th>Introduction</th><td><textarea name="fms_theme_options[vocations][charism_intro]" class="large-text"><?php echo esc_textarea(fms_vocation_option('charism_intro','Notre charisme unit la contemplation et l’action. Il se vit dans une présence simple, fraternelle et disponible, au service de la dignité humaine et de la croissance de chaque personne.')); ?></textarea></td></tr>

<tr><th colspan="2" style="padding: 15px; background: #f3f6fa; font-weight: 600; color: #16324f;">Valeur 1</th></tr>
<tr><th>Titre</th><td><input type="text" name="fms_theme_options[vocations][value1_title]" value="<?php echo esc_attr(fms_vocation_option('value1_title','Service')); ?>" class="large-text"></td></tr>
<tr><th>Description</th><td><textarea name="fms_theme_options[vocations][value1_desc]" class="large-text"><?php echo esc_textarea(fms_vocation_option('value1_desc','Servir, pour nous, c’est nous rendre proches avec simplicité et respect. Dans les gestes quotidiens comme dans les grandes missions, nous désirons manifester la tendresse de Dieu et contribuer à la dignité de chaque personne.')); ?></textarea></td></tr>

<tr><th colspan="2" style="padding: 15px; background: #f3f6fa; font-weight: 600; color: #16324f;">Valeur 2</th></tr>
<tr><th>Titre</th><td><input type="text" name="fms_theme_options[vocations][value2_title]" value="<?php echo esc_attr(fms_vocation_option('value2_title','Compassion')); ?>" class="large-text"></td></tr>
<tr><th>Description</th><td><textarea name="fms_theme_options[vocations][value2_desc]" class="large-text"><?php echo esc_textarea(fms_vocation_option('value2_desc','La compassion nous apprend à écouter avant de parler, à accueillir avant de juger, à accompagner sans brusquer. Elle ouvre un chemin de consolation, de confiance et d’espérance auprès des personnes blessées ou fragilisées.')); ?></textarea></td></tr>

<tr><th colspan="2" style="padding: 15px; background: #f3f6fa; font-weight: 600; color: #16324f;">Valeur 3</th></tr>
<tr><th>Titre</th><td><input type="text" name="fms_theme_options[vocations][value3_title]" value="<?php echo esc_attr(fms_vocation_option('value3_title','Fidélité')); ?>" class="large-text"></td></tr>
<tr><th>Description</th><td><textarea name="fms_theme_options[vocations][value3_desc]" class="large-text"><?php echo esc_textarea(fms_vocation_option('value3_desc','La fidélité se construit jour après jour dans la prière, la vie communautaire et la mission. Elle nous garde disponibles à l’appel de Dieu et nous aide à demeurer présentes, même lorsque le chemin demande patience et confiance.')); ?></textarea></td></tr>
<?php
fms_section_card_end();
?>

<?php
fms_section_card_start('Appel à la réflexion');
?>
<tr><th>Titre</th><td><input type="text" name="fms_theme_options[vocations][reflection_title]" value="<?php echo esc_attr(fms_vocation_option('reflection_title','Et vous ?')); ?>" class="large-text"></td></tr>
<tr><th>Texte</th><td><textarea name="fms_theme_options[vocations][reflection_text]" class="large-text"><?php echo esc_textarea(fms_vocation_option('reflection_text','Vous portez une question, un désir de vie donnée, une attirance pour la prière, la fraternité ou le service ? Le discernement ne demande pas d’avoir déjà toutes les réponses. Il commence souvent par une conversation simple, un temps d’écoute, une rencontre.\n\nNous serons heureuses de cheminer avec vous, dans le respect de votre histoire et de votre rythme, pour vous aider à reconnaître ce que le Seigneur dépose dans votre cœur.')); ?></textarea></td></tr>
<tr><th>Texte du bouton</th><td><input type="text" name="fms_theme_options[vocations][reflection_cta_text]" value="<?php echo esc_attr(fms_vocation_option('reflection_cta_text','Parlons de votre vocation')); ?>" class="large-text"></td></tr>
<?php
fms_section_card_end();
?>

<?php
fms_section_card_start('Contact & Informations');
?>
<tr><th>Titre</th><td><input type="text" name="fms_theme_options[vocations][contact_title]" value="<?php echo esc_attr(fms_vocation_option('contact_title','Contactez-nous')); ?>" class="large-text"></td></tr>
<tr><th>Description</th><td><textarea name="fms_theme_options[vocations][contact_description]" class="large-text"><?php echo esc_textarea(fms_vocation_option('contact_description','Pour poser une question, demander un échange ou être accompagnée dans un discernement vocationnel, vous pouvez nous écrire. Votre message sera accueilli avec discrétion, attention et bienveillance.')); ?></textarea></td></tr>
<tr><th>Email de contact</th><td><input type="email" name="fms_theme_options[vocations][contact_email]" value="<?php echo esc_attr(fms_get_option('vocations','contact_email',get_option('admin_email'))); ?>" class="large-text"></td></tr>
<tr><th>Téléphone</th><td><input type="tel" name="fms_theme_options[vocations][contact_phone]" value="<?php echo esc_attr(fms_get_option('vocations','contact_phone','')); ?>" class="large-text"></td></tr>
<?php
fms_section_card_end();
?>
<?php endif; ?>
