<?php if ($tab === 'institutional-pages'): ?>

<?php foreach (fms_institutional_pages_config() as $slug => $page_config): ?>
    <?php
    $section = $page_config['section'];
    $defaults = $page_config['defaults'];

    fms_section_card_start($page_config['label']);
    ?>

    <tr><th>Libellé supérieur</th><td><input type="text" name="fms_theme_options[<?php echo esc_attr($section); ?>][kicker]" value="<?php echo esc_attr(fms_get_option($section, 'kicker', $defaults['kicker'])); ?>" class="large-text"></td></tr>
    <tr><th>Titre</th><td><input type="text" name="fms_theme_options[<?php echo esc_attr($section); ?>][title]" value="<?php echo esc_attr(fms_get_option($section, 'title', $defaults['title'])); ?>" class="large-text"></td></tr>
    <tr><th>Introduction</th><td><textarea name="fms_theme_options[<?php echo esc_attr($section); ?>][intro]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option($section, 'intro', $defaults['intro'])); ?></textarea></td></tr>
    <tr><th>Citation / phrase forte</th><td><textarea name="fms_theme_options[<?php echo esc_attr($section); ?>][quote]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option($section, 'quote', $defaults['quote'])); ?></textarea></td></tr>

    <?php for ($i = 1; $i <= 3; $i++): ?>
        <tr><th colspan="2" style="padding: 15px; background: #f3f6fa; color: #16324f;">Section <?php echo (int) $i; ?></th></tr>
        <tr><th>Titre</th><td><input type="text" name="fms_theme_options[<?php echo esc_attr($section); ?>][section_<?php echo (int) $i; ?>_title]" value="<?php echo esc_attr(fms_get_option($section, 'section_' . $i . '_title', $defaults['section_' . $i . '_title'])); ?>" class="large-text"></td></tr>
        <tr><th>Texte</th><td><textarea name="fms_theme_options[<?php echo esc_attr($section); ?>][section_<?php echo (int) $i; ?>_text]" rows="4" class="large-text"><?php echo esc_textarea(fms_get_option($section, 'section_' . $i . '_text', $defaults['section_' . $i . '_text'])); ?></textarea></td></tr>
    <?php endfor; ?>

    <tr><th colspan="2" style="padding: 15px; background: #f3f6fa; color: #16324f;">Encadrés</th></tr>
    <?php for ($i = 1; $i <= 4; $i++): ?>
        <tr><th>Encadré <?php echo (int) $i; ?> - Titre</th><td><input type="text" name="fms_theme_options[<?php echo esc_attr($section); ?>][card_<?php echo (int) $i; ?>_title]" value="<?php echo esc_attr(fms_get_option($section, 'card_' . $i . '_title', $defaults['card_' . $i . '_title'])); ?>" class="large-text"></td></tr>
        <tr><th>Encadré <?php echo (int) $i; ?> - Texte</th><td><textarea name="fms_theme_options[<?php echo esc_attr($section); ?>][card_<?php echo (int) $i; ?>_text]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option($section, 'card_' . $i . '_text', $defaults['card_' . $i . '_text'])); ?></textarea></td></tr>
    <?php endfor; ?>

    <tr><th>Note finale</th><td><textarea name="fms_theme_options[<?php echo esc_attr($section); ?>][note]" rows="3" class="large-text"><?php echo esc_textarea(fms_get_option($section, 'note', $defaults['note'])); ?></textarea></td></tr>

    <?php fms_section_card_end(); ?>
<?php endforeach; ?>

<?php endif; ?>
