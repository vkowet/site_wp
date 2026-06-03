<?php if($tab==='identity'): ?>
    
<?php
fms_section_card_start('Identité du site');
?>
<tr><th>Titre site</th><td><input type="text" name="fms_theme_options[identity][title]" value="<?php echo esc_attr(fms_get_option('identity','title')); ?>" class="large-text"></td></tr>
<tr><th>Slogan</th><td><input type="text" name="fms_theme_options[identity][slogan]" value="<?php echo esc_attr(fms_get_option('identity','slogan')); ?>" class="large-text"></td></tr>
<tr><th>Logo mondial</th><td><?php fms_image_field('fms_theme_options[identity][world_logo]', fms_get_option('identity','world_logo')); ?></td></tr>
<tr><th>Logo France</th><td><?php fms_image_field('fms_theme_options[identity][france_logo]', fms_get_option('identity','france_logo')); ?></td></tr>
<?php
fms_section_card_end();
?>
<?php endif; ?>