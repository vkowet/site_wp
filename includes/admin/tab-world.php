<?php if($tab==='world'): ?>
<?php
fms_section_card_start('Réseau mondial');
?>
<tr><th>Cartes / ligne</th><td><input type="text" name="fms_theme_options[world][cards_per_row]" value="<?php echo esc_attr(fms_get_option('world','cards_per_row','3')); ?>"></td></tr>
<tr><th>Titre global</th><td><input type="text" name="fms_theme_options[world][title]" value="<?php echo esc_attr(fms_get_option('world','title')); ?>" class="large-text"></td></tr>
<tr><th>Sous-titre global</th><td><input type="text" name="fms_theme_options[world][subtitle]" value="<?php echo esc_attr(fms_get_option('world','subtitle')); ?>" class="large-text"></td></tr>
<?php
fms_section_card_end();
?>
<?php endif; ?>