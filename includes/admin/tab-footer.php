<?php if($tab==='footer'): ?>
<?php
fms_section_card_start('Footer');
?>
<tr><th>Nom</th><td><input type="text" name="fms_theme_options[footer][name]" value="<?php echo esc_attr(fms_get_option('footer','name')); ?>" class="large-text"></td></tr>
<tr><th>Adresse 1</th><td><input type="text" name="fms_theme_options[footer][address1]" value="<?php echo esc_attr(fms_get_option('footer','address1')); ?>" class="large-text"></td></tr>
<tr><th>Adresse 2</th><td><input type="text" name="fms_theme_options[footer][address2]" value="<?php echo esc_attr(fms_get_option('footer','address2')); ?>" class="large-text"></td></tr>
<tr><th>Ville</th><td><input type="text" name="fms_theme_options[footer][city]" value="<?php echo esc_attr(fms_get_option('footer','city')); ?>" class="large-text"></td></tr>
<tr><th>Téléphone</th><td><input type="text" name="fms_theme_options[footer][phone]" value="<?php echo esc_attr(fms_get_option('footer','phone')); ?>" class="large-text"></td></tr>
<tr><th>Email</th><td><input type="text" name="fms_theme_options[footer][email]" value="<?php echo esc_attr(fms_get_option('footer','email')); ?>" class="large-text"></td></tr>
<tr><th>Texte bas</th><td><textarea name="fms_theme_options[footer][bottom_text]" class="large-text"><?php echo esc_textarea(fms_get_option('footer','bottom_text')); ?></textarea></td></tr>
<?php
fms_section_card_end();
?>
<?php endif; ?>