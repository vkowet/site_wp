<?php if ($tab === 'pages'): ?>

<?php
/* =========================
   CARTE : PAGES INTERNES
   ========================= */
fms_section_card_start('Pages internes');
?>

<tr>
    <th>Sous-titre</th>
    <td>
        <input
            type="text"
            name="fms_theme_options[pages][subtitle]"
            value="<?php echo esc_attr(fms_get_option('pages', 'subtitle')); ?>"
            class="large-text">
    </td>
</tr>

<tr>
    <th>Image fond</th>
    <td>
        <?php
        fms_image_field(
            'fms_theme_options[pages][bg]',
            fms_get_option('pages', 'bg')
        );
        ?>
    </td>
</tr>

<tr>
    <th>Hauteur bandeau</th>
    <td>
        <input
            type="text"
            name="fms_theme_options[pages][hero_height]"
            value="<?php echo esc_attr(fms_get_option('pages', 'hero_height', '280')); ?>">
    </td>
</tr>

<tr>
    <th>Marge top</th>
    <td>
        <input
            type="text"
            name="fms_theme_options[pages][margin_top]"
            value="<?php echo esc_attr(fms_get_option('pages', 'margin_top', '5')); ?>">
    </td>
</tr>

<tr>
    <th>Largeur contenu</th>
    <td>
        <input
            type="text"
            name="fms_theme_options[pages][content_width]"
            value="<?php echo esc_attr(fms_get_option('pages', 'content_width', '1100')); ?>">
    </td>
</tr>

<tr>
    <th>Overlay</th>
    <td>
        <input
            type="text"
            name="fms_theme_options[pages][overlay_opacity]"
            value="<?php echo esc_attr(fms_get_option('pages', 'overlay_opacity', '0.45')); ?>">
    </td>
</tr>

<tr>
    <th>Pages concernées</th>
    <td>
        <?php
        $selected_pages = fms_get_option('pages', 'selected_pages', []);
        $pages = get_pages();

        foreach ($pages as $page):
            $checked = in_array($page->ID, $selected_pages) ? 'checked' : '';
        ?>
            <label style="display:block;margin-bottom:8px;">
                <input
                    type="checkbox"
                    name="fms_theme_options[pages][selected_pages][]"
                    value="<?php echo $page->ID; ?>"
                    <?php echo $checked; ?>>
                <?php echo esc_html($page->post_title); ?>
            </label>
        <?php endforeach; ?>

        <p style="margin-top:10px;color:#666;">
            Choisissez les pages internes utilisant ce bandeau.
        </p>
    </td>
</tr>

<?php
fms_section_card_end();


/* =========================
   CARTE : PAGE CONTACT
   ========================= */
fms_section_card_start('Page Contact – Coordonnées officielles');
?>

<tr>
    <th>Adresse institutionnelle</th>
    <td>
        <textarea
            name="fms_theme_options[contact][address]"
            rows="4"
            class="large-text"><?php
                echo esc_textarea(fms_get_option('contact', 'address'));
            ?></textarea>
    </td>
</tr>

<tr>
    <th>Téléphone</th>
    <td>
        <input
            type="text"
            name="fms_theme_options[contact][phone]"
            value="<?php echo esc_attr(fms_get_option('contact', 'phone')); ?>"
            class="regular-text">
    </td>
</tr>

<tr>
    <th>Courriel</th>
    <td>
        <input
            type="email"
            name="fms_theme_options[contact][email]"
            value="<?php echo esc_attr(fms_get_option('contact', 'email')); ?>"
            class="regular-text">
    </td>
</tr>

<tr>
    <th>Message institutionnel</th>
    <td>
        <textarea
            name="fms_theme_options[contact][message]"
            rows="3"
            class="large-text"><?php
                echo esc_textarea(fms_get_option('contact', 'message'));
            ?></textarea>
        <p style="margin-top:6px;color:#666;">
            Texte affiché en en‑tête de la page « Nous contacter ».
        </p>
    </td>
</tr>

<?php
fms_section_card_end();
?>

<?php endif; ?>
``