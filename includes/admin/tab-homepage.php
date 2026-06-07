<?php if($tab==='homepage'): ?>

<?php fms_section_card_start('Hero principal'); ?>
<tr><th>Mode</th><td><select name="fms_theme_options[homepage][hero_mode]"><option value="image" <?php selected(fms_get_option('homepage','hero_mode','image'),'image'); ?>>Image fixe</option><option value="slider" <?php selected(fms_get_option('homepage','hero_mode','image'),'slider'); ?>>Slider</option></select></td></tr>
<tr><th>Titre</th><td><input type="text" name="fms_theme_options[homepage][hero_title]" value="<?php echo esc_attr(fms_get_option('homepage','hero_title','Franciscaines Servantes de Marie')); ?>" class="large-text"></td></tr>
<tr><th>Texte</th><td><textarea name="fms_theme_options[homepage][hero_text]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option('homepage','hero_text','Servir, apprendre et éduquer dans un esprit de fraternité, de simplicité et d’espérance.')); ?></textarea></td></tr>
<tr><th>Texte bouton</th><td><input type="text" name="fms_theme_options[homepage][hero_button_text]" value="<?php echo esc_attr(fms_get_option('homepage','hero_button_text','Découvrir la Congrégation')); ?>" class="large-text"></td></tr>
<tr><th>Lien bouton</th><td><input type="text" name="fms_theme_options[homepage][hero_button_link]" value="<?php echo esc_attr(fms_get_option('homepage','hero_button_link','/la-congregation')); ?>" class="large-text"></td></tr>
<tr><th>Image</th><td><?php fms_image_field('fms_theme_options[homepage][hero_image]', fms_get_option('homepage','hero_image')); ?></td></tr>
<?php for($i=1;$i<=3;$i++): ?>
<tr><th colspan="2" style="background:#f5f5f5;padding:12px;">Slide <?php echo $i; ?></th></tr>
<tr><th>Image</th><td><?php fms_image_field('fms_theme_options[homepage][slide_'.$i.'_image]', fms_get_option('homepage','slide_'.$i.'_image')); ?></td></tr>
<tr>
<th>Afficher les textes</th>
<td>
<input type="hidden" name="fms_theme_options[homepage][slide_<?php echo $i; ?>_show_text]" value="0">
<label><input type="checkbox" name="fms_theme_options[homepage][slide_<?php echo $i; ?>_show_text]" value="1" <?php checked(fms_get_option('homepage','slide_'.$i.'_show_text','1'), '1'); ?>> Afficher le titre, le texte et le bouton sur cette slide</label>
</td>
</tr>
<tr><th>Titre</th><td><input type="text" name="fms_theme_options[homepage][slide_<?php echo $i; ?>_title]" value="<?php echo esc_attr(fms_get_option('homepage','slide_'.$i.'_title','')); ?>" class="large-text"></td></tr>
<tr><th>Texte</th><td><textarea name="fms_theme_options[homepage][slide_<?php echo $i; ?>_text]" rows="2" class="large-text"><?php echo esc_textarea(fms_get_option('homepage','slide_'.$i.'_text','')); ?></textarea></td></tr>
<tr><th>Texte bouton</th><td><input type="text" name="fms_theme_options[homepage][slide_<?php echo $i; ?>_button_text]" value="<?php echo esc_attr(fms_get_option('homepage','slide_'.$i.'_button_text','')); ?>" class="large-text"></td></tr>
<tr><th>Lien bouton</th><td><input type="text" name="fms_theme_options[homepage][slide_<?php echo $i; ?>_button_link]" value="<?php echo esc_attr(fms_get_option('homepage','slide_'.$i.'_button_link','#')); ?>" class="large-text"></td></tr>
<?php endfor; ?>
<?php fms_section_card_end(); ?>

<?php fms_section_card_start('Chiffres clés'); ?>
<?php for($i=1;$i<=4;$i++): ?>
<tr><th>Chiffre <?php echo $i; ?></th><td><input type="text" name="fms_theme_options[homepage][stat_<?php echo $i; ?>_number]" value="<?php echo esc_attr(fms_get_option('homepage','stat_'.$i.'_number',['1852','5','466','74'][$i-1])); ?>"></td><th>Libellé <?php echo $i; ?></th><td><input type="text" name="fms_theme_options[homepage][stat_<?php echo $i; ?>_label]" value="<?php echo esc_attr(fms_get_option('homepage','stat_'.$i.'_label',['Fondation','Pays de présence','Sœurs','Maisons'][$i-1])); ?>"></td></tr>
<?php endfor; ?>
<?php fms_section_card_end(); ?>

<?php fms_section_card_start('Bloc institution'); ?>
<tr><th>Titre</th><td><input type="text" name="fms_theme_options[homepage][institution_title]" value="<?php echo esc_attr(fms_get_option('homepage','institution_title','Une congrégation au service de l’Église et du monde')); ?>" class="large-text"></td></tr>
<tr><th>Texte</th><td><textarea name="fms_theme_options[homepage][institution_text]" rows="4" class="large-text"><?php echo esc_textarea(fms_get_option('homepage','institution_text','Depuis Blois, les Sœurs Franciscaines Servantes de Marie vivent une mission de service, d’éducation et de fraternité auprès des personnes les plus fragiles.')); ?></textarea></td></tr>
<?php fms_section_card_end(); ?>

<?php fms_section_card_start('Message de la Supérieure'); ?>
<tr><th>Page source</th><td><input type="text" name="fms_theme_options[homepage][message_page_slug]" value="<?php echo esc_attr(fms_get_option('homepage','message_page_slug','mot-de-la-mere-superieure')); ?>" class="large-text"></td></tr>
<tr><th>Libellé section</th><td><input type="text" name="fms_theme_options[homepage][message_kicker]" value="<?php echo esc_attr(fms_get_option('homepage','message_kicker','Message de la Supérieure Générale')); ?>" class="large-text"></td></tr>
<tr><th>Texte bouton</th><td><input type="text" name="fms_theme_options[homepage][message_button_text]" value="<?php echo esc_attr(fms_get_option('homepage','message_button_text','Lire le message complet')); ?>" class="large-text"></td></tr>
<tr><th>Nombre de mots</th><td><input type="number" name="fms_theme_options[homepage][message_words]" value="<?php echo esc_attr(fms_get_option('homepage','message_words','55')); ?>"></td></tr>
<?php fms_section_card_end(); ?>

<?php fms_section_card_start('Fondatrice'); ?>
<tr><th>Page source</th><td><input type="text" name="fms_theme_options[homepage][foundress_page_slug]" value="<?php echo esc_attr(fms_get_option('homepage','foundress_page_slug','histoire-de-la-fondatrice')); ?>" class="large-text"></td></tr>
<tr><th>Libellé section</th><td><input type="text" name="fms_theme_options[homepage][foundress_kicker]" value="<?php echo esc_attr(fms_get_option('homepage','foundress_kicker','Histoire de la Fondatrice')); ?>" class="large-text"></td></tr>
<tr><th>Texte bouton</th><td><input type="text" name="fms_theme_options[homepage][foundress_button_text]" value="<?php echo esc_attr(fms_get_option('homepage','foundress_button_text','Découvrir son histoire')); ?>" class="large-text"></td></tr>
<tr><th>Nombre de mots</th><td><input type="number" name="fms_theme_options[homepage][foundress_words]" value="<?php echo esc_attr(fms_get_option('homepage','foundress_words','65')); ?>"></td></tr>
<?php fms_section_card_end(); ?>

<?php fms_section_card_start('Présence mondiale'); ?>
<tr><th>Titre section</th><td><input type="text" name="fms_theme_options[homepage][world_title]" value="<?php echo esc_attr(fms_get_option('homepage','world_title','Présence dans le monde')); ?>" class="large-text"></td></tr>
<tr><th>Sous-titre</th><td><textarea name="fms_theme_options[homepage][world_subtitle]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option('homepage','world_subtitle','Une mission vivante au service des peuples sur plusieurs continents.')); ?></textarea></td></tr>
<tr><th>Texte bouton</th><td><input type="text" name="fms_theme_options[homepage][world_button_text]" value="<?php echo esc_attr(fms_get_option('homepage','world_button_text','Découvrir notre présence mondiale')); ?>" class="large-text"></td></tr>
<tr><th>Lien bouton</th><td><input type="text" name="fms_theme_options[homepage][world_button_link]" value="<?php echo esc_attr(fms_get_option('homepage','world_button_link','/presence-mondiale')); ?>" class="large-text"></td></tr>
<tr><th>Nombre max de pays</th><td><input type="number" name="fms_theme_options[homepage][world_max_items]" value="<?php echo esc_attr(fms_get_option('homepage','world_max_items','5')); ?>"></td></tr>
<tr><th>Libellé sœurs</th><td><input type="text" name="fms_theme_options[homepage][world_label_sisters]" value="<?php echo esc_attr(fms_get_option('homepage','world_label_sisters','sœurs')); ?>"></td></tr>
<tr><th>Libellé communautés</th><td><input type="text" name="fms_theme_options[homepage][world_label_communities]" value="<?php echo esc_attr(fms_get_option('homepage','world_label_communities','communautés')); ?>"></td></tr>
<tr><th>Libellé depuis</th><td><input type="text" name="fms_theme_options[homepage][world_label_since]" value="<?php echo esc_attr(fms_get_option('homepage','world_label_since','Depuis')); ?>"></td></tr>
<?php fms_section_card_end(); ?>

<?php fms_section_card_start('Actualités'); ?>
<tr><th>Titre section</th><td><input type="text" name="fms_theme_options[homepage][news_title]" value="<?php echo esc_attr(fms_get_option('homepage','news_title','Actualités et missions')); ?>" class="large-text"></td></tr>
<tr><th>Nombre d’articles</th><td><input type="number" name="fms_theme_options[homepage][news_count]" value="<?php echo esc_attr(fms_get_option('homepage','news_count','3')); ?>"></td></tr>
<tr><th>Texte bouton article</th><td><input type="text" name="fms_theme_options[homepage][news_button_text]" value="<?php echo esc_attr(fms_get_option('homepage','news_button_text','Lire l’actualité')); ?>" class="large-text"></td></tr>
<?php fms_section_card_end(); ?>

<?php fms_section_card_start('Bloc vocation'); ?>
<tr><th>Titre</th><td><input type="text" name="fms_theme_options[homepage][vocation_title]" value="<?php echo esc_attr(fms_get_option('homepage','vocation_title','Répondre à l’appel du service')); ?>" class="large-text"></td></tr>
<tr><th>Texte</th><td><textarea name="fms_theme_options[homepage][vocation_text]" class="large-text" rows="5"><?php echo esc_textarea(fms_get_option('homepage','vocation_text','La vocation franciscaine est un chemin de foi, de service et d’éducation, au service des plus fragiles et de la mission dans le monde.')); ?></textarea></td></tr>
<tr><th>Texte bouton</th><td><input type="text" name="fms_theme_options[homepage][vocation_button_text]" value="<?php echo esc_attr(fms_get_option('homepage','vocation_button_text','Découvrir les vocations')); ?>" class="large-text"></td></tr>
<tr><th>Lien bouton</th><td><input type="text" name="fms_theme_options[homepage][vocation_button_link]" value="<?php echo esc_attr(fms_get_option('homepage','vocation_button_link','/vocations')); ?>" class="large-text"></td></tr>
<tr><th>Image fond</th><td><?php fms_image_field('fms_theme_options[homepage][vocation_bg]', fms_get_option('homepage','vocation_bg')); ?></td></tr>
<?php fms_section_card_end(); ?>

<?php endif; ?>
