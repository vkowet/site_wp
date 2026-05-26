<?php

function fms_add_theme_options_menu() {
    add_menu_page(
        'Options du thème FMS',
        'Options FMS',
        'manage_options',
        'fms-theme-options',
        'fms_theme_options_page',
        'dashicons-admin-generic',
        61
    );
}
add_action('admin_menu', 'fms_add_theme_options_menu');


function fms_register_theme_options() {
    register_setting('fms_theme_options_group', 'fms_theme_options');
}
add_action('admin_init', 'fms_register_theme_options');


function fms_image_field($name, $value){
    $url = $value ? wp_get_attachment_image_url($value,'medium') : '';
    ?>
    <div class="fms-image-field">
        <input type="hidden"
               class="fms-image-id"
               name="<?php echo esc_attr($name); ?>"
               value="<?php echo esc_attr($value); ?>">

        <button type="button" class="button fms-upload-image">Choisir une image</button>
        <button type="button" class="button fms-remove-image">Supprimer</button>

        <div class="fms-image-preview" style="margin-top:15px;">
            <?php if($url): ?>
                <img src="<?php echo esc_url($url); ?>" style="max-width:150px;height:auto;">
            <?php endif; ?>
        </div>
    </div>
    <?php
}


function fms_section_card_start($title){
    echo '<div style="background:#fff;padding:25px;margin:25px 0;border:1px solid #ddd;border-radius:8px;">';
    echo '<h2 style="margin-top:0;">'.$title.'</h2>';
    echo '<table class="form-table">';
}

function fms_section_card_end(){
    echo '</table></div>';
}


function fms_theme_options_page() {

$tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'homepage';
?>

<div class="wrap">
<h1>Centre de pilotage FMS</h1>

<h2 class="nav-tab-wrapper">

<a href="?page=fms-theme-options&tab=homepage"
class="nav-tab <?php echo $tab==='homepage' ? 'nav-tab-active' : ''; ?>">
Homepage
</a>

<a href="?page=fms-theme-options&tab=identity"
class="nav-tab <?php echo $tab==='identity' ? 'nav-tab-active' : ''; ?>">
Identité
</a>

<a href="?page=fms-theme-options&tab=footer"
class="nav-tab <?php echo $tab==='footer' ? 'nav-tab-active' : ''; ?>">
Footer
</a>

<a href="?page=fms-theme-options&tab=pages"
class="nav-tab <?php echo $tab==='pages' ? 'nav-tab-active' : ''; ?>">
Pages internes
</a>

<a href="?page=fms-theme-options&tab=world"
class="nav-tab <?php echo $tab==='world' ? 'nav-tab-active' : ''; ?>">
Réseau mondial
</a>

<a href="?page=fms-theme-options&tab=system"
class="nav-tab <?php echo $tab==='system' ? 'nav-tab-active' : ''; ?>">
Pages système
</a>

</h2>

<form method="post" action="options.php">

<?php settings_fields('fms_theme_options_group'); ?>


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



<?php if($tab==='pages'): ?>
<?php
fms_section_card_start('Pages internes');
?>
<tr><th>Sous-titre</th><td><input type="text" name="fms_theme_options[pages][subtitle]" value="<?php echo esc_attr(fms_get_option('pages','subtitle')); ?>" class="large-text"></td></tr>
<tr><th>Image fond</th><td><?php fms_image_field('fms_theme_options[pages][bg]', fms_get_option('pages','bg')); ?></td></tr>
<tr><th>Hauteur bandeau</th><td><input type="text" name="fms_theme_options[pages][hero_height]" value="<?php echo esc_attr(fms_get_option('pages','hero_height','280')); ?>"></td></tr>
<tr><th>Marge top</th><td><input type="text" name="fms_theme_options[pages][margin_top]" value="<?php echo esc_attr(fms_get_option('pages','margin_top','5')); ?>"></td></tr>
<tr><th>Largeur contenu</th><td><input type="text" name="fms_theme_options[pages][content_width]" value="<?php echo esc_attr(fms_get_option('pages','content_width','1100')); ?>"></td></tr>
<tr><th>Overlay</th><td><input type="text" name="fms_theme_options[pages][overlay_opacity]" value="<?php echo esc_attr(fms_get_option('pages','overlay_opacity','0.45')); ?>"></td></tr>
<?php
fms_section_card_end();
?>
<?php endif; ?>



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



<?php if($tab==='system'): ?>

<?php
fms_section_card_start('Mentions légales');
?>

<tr>
<th>Titre</th>
<td>
<input type="text"
name="fms_theme_options[system][legal_title]"
value="<?php echo esc_attr(fms_get_option('system','legal_title','Mentions légales')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Contenu</th>
<td>
<textarea
name="fms_theme_options[system][legal_content]"
rows="14"
class="large-text"><?php echo esc_textarea(fms_get_option('system','legal_content')); ?></textarea>
</td>
</tr>

<?php
fms_section_card_end();
?>



<?php
fms_section_card_start('Politique de confidentialité');
?>

<tr>
<th>Titre</th>
<td>
<input type="text"
name="fms_theme_options[system][privacy_title]"
value="<?php echo esc_attr(fms_get_option('system','privacy_title','Politique de confidentialité')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Contenu</th>
<td>
<textarea
name="fms_theme_options[system][privacy_content]"
rows="14"
class="large-text"><?php echo esc_textarea(fms_get_option('system','privacy_content')); ?></textarea>
</td>
</tr>

<?php
fms_section_card_end();
?>



<?php
fms_section_card_start('Faire un don');
?>

<tr>
<th>Titre</th>
<td>
<input type="text"
name="fms_theme_options[system][donation_title]"
value="<?php echo esc_attr(fms_get_option('system','donation_title','Faire un don')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Contenu</th>
<td>
<textarea
name="fms_theme_options[system][donation_content]"
rows="10"
class="large-text"><?php echo esc_textarea(fms_get_option('system','donation_content')); ?></textarea>
</td>
</tr>

<tr>
<th>Texte bouton</th>
<td>
<input type="text"
name="fms_theme_options[system][donation_button]"
value="<?php echo esc_attr(fms_get_option('system','donation_button','Nous contacter')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Lien bouton</th>
<td>
<input type="text"
name="fms_theme_options[system][donation_link]"
value="<?php echo esc_attr(fms_get_option('system','donation_link','/contact')); ?>"
class="large-text">
</td>
</tr>

<?php
fms_section_card_end();
?>



<?php
fms_section_card_start('Footer légal');
?>

<tr>
<th>Copyright</th>
<td>
<input type="text"
name="fms_theme_options[system][copyright]"
value="<?php echo esc_attr(fms_get_option('system','copyright')); ?>"
class="large-text">
</td>
</tr>

<tr>
<th>Texte bas footer</th>
<td>
<textarea
name="fms_theme_options[system][footer_text]"
rows="6"
class="large-text"><?php echo esc_textarea(fms_get_option('system','footer_text')); ?></textarea>
</td>
</tr>

<?php
fms_section_card_end();
?>

<?php endif; ?>

<?php submit_button(); ?>

</form>
</div>

<?php
}
