<?php if($tab==='homepage'): ?>

<?php
fms_section_card_start('Chiffres clés');
for($i=1;$i<=4;$i++): ?>
<tr>
    <th>Chiffre <?php echo $i; ?></th>
    <td>
        <input type="text"
               name="fms_theme_options[homepage][stat_<?php echo $i; ?>_number]"
               value="<?php echo esc_attr(fms_get_option('homepage','stat_'.$i.'_number')); ?>">
    </td>

    <th>Libellé <?php echo $i; ?></th>
    <td>
        <input type="text"
               name="fms_theme_options[homepage][stat_<?php echo $i; ?>_label]"
               value="<?php echo esc_attr(fms_get_option('homepage','stat_'.$i.'_label')); ?>">
    </td>
</tr>
<?php endfor;
fms_section_card_end();
?>


<?php
fms_section_card_start('Bloc vocation');
?>
<tr>
    <th>Titre</th>
    <td><input type="text" name="fms_theme_options[homepage][vocation_title]" value="<?php echo esc_attr(fms_get_option('homepage','vocation_title')); ?>" class="large-text"></td>
</tr>

<tr>
    <th>Texte</th>
    <td><textarea name="fms_theme_options[homepage][vocation_text]" class="large-text" rows="5"><?php echo esc_textarea(fms_get_option('homepage','vocation_text')); ?></textarea></td>
</tr>

<tr>
    <th>Texte bouton</th>
    <td><input type="text" name="fms_theme_options[homepage][vocation_button_text]" value="<?php echo esc_attr(fms_get_option('homepage','vocation_button_text')); ?>" class="large-text"></td>
</tr>

<tr>
    <th>Lien bouton</th>
    <td><input type="text" name="fms_theme_options[homepage][vocation_button_link]" value="<?php echo esc_attr(fms_get_option('homepage','vocation_button_link')); ?>" class="large-text"></td>
</tr>

<tr>
    <th>Image fond</th>
    <td><?php fms_image_field('fms_theme_options[homepage][vocation_bg]', fms_get_option('homepage','vocation_bg')); ?></td>
</tr>
<?php
fms_section_card_end();
?>


<?php
fms_section_card_start('Présence mondiale');
?>
<tr><th>Titre section</th><td><input type="text" name="fms_theme_options[homepage][world_title]" value="<?php echo esc_attr(fms_get_option('homepage','world_title')); ?>" class="large-text"></td></tr>
<tr><th>Sous-titre</th><td><textarea name="fms_theme_options[homepage][world_subtitle]" class="large-text"><?php echo esc_textarea(fms_get_option('homepage','world_subtitle')); ?></textarea></td></tr>
<tr><th>Texte bouton</th><td><input type="text" name="fms_theme_options[homepage][world_button_text]" value="<?php echo esc_attr(fms_get_option('homepage','world_button_text')); ?>" class="large-text"></td></tr>
<tr><th>Lien bouton</th><td><input type="text" name="fms_theme_options[homepage][world_button_link]" value="<?php echo esc_attr(fms_get_option('homepage','world_button_link')); ?>" class="large-text"></td></tr>
<tr><th>Nombre max de pays</th><td><input type="number" name="fms_theme_options[homepage][world_max_items]" value="<?php echo esc_attr(fms_get_option('homepage','world_max_items','6')); ?>"></td></tr>
<tr><th>Libellé sœurs</th><td><input type="text" name="fms_theme_options[homepage][world_label_sisters]" value="<?php echo esc_attr(fms_get_option('homepage','world_label_sisters','sœurs')); ?>"></td></tr>
<tr><th>Libellé communautés</th><td><input type="text" name="fms_theme_options[homepage][world_label_communities]" value="<?php echo esc_attr(fms_get_option('homepage','world_label_communities','communautés')); ?>"></td></tr>
<tr><th>Libellé depuis</th><td><input type="text" name="fms_theme_options[homepage][world_label_since]" value="<?php echo esc_attr(fms_get_option('homepage','world_label_since','Depuis')); ?>"></td></tr>
<?php
fms_section_card_end();
?>

<?php endif; ?>