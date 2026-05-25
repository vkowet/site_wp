<?php
function fms_world_presence_add_meta_boxes() {
    add_meta_box(
        'fms_world_presence_details',
        'Informations du pays',
        'fms_world_presence_meta_box_callback',
        'world_presence',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'fms_world_presence_add_meta_boxes');

function fms_world_presence_admin_assets($hook) {
    global $post;

    if (($hook === 'post.php' || $hook === 'post-new.php') && isset($post) && $post->post_type === 'world_presence') {
        wp_enqueue_media();
        wp_enqueue_script(
            'fms-world-admin',
            get_template_directory_uri() . '/assets/js/world-presence-admin.js',
            array('jquery'),
            null,
            true
        );
    }
}
add_action('admin_enqueue_scripts', 'fms_world_presence_admin_assets');

function fms_world_presence_meta_box_callback($post) {
    wp_nonce_field('fms_world_presence_save_meta', 'fms_world_presence_nonce');

    $sisters     = get_post_meta($post->ID, '_fms_sisters', true);
    $communities = get_post_meta($post->ID, '_fms_communities', true);
    $year        = get_post_meta($post->ID, '_fms_year', true);
    $flag        = get_post_meta($post->ID, '_fms_flag', true);
    $order       = get_post_meta($post->ID, '_fms_order', true);
    $front_mode  = get_post_meta($post->ID, '_fms_front_mode', true) ?: 'text';
    $front_image = get_post_meta($post->ID, '_fms_front_image', true);
    $back_mode   = get_post_meta($post->ID, '_fms_back_mode', true) ?: 'image';

    $flag_url        = $flag ? wp_get_attachment_image_url($flag, 'medium') : '';
    $front_image_url = $front_image ? wp_get_attachment_image_url($front_image, 'medium') : '';

    ?>

    <div class="fms-meta-wrap">

        <p>
            <label><strong>Face avant :</strong></label><br>
            <label><input type="radio" name="fms_front_mode" value="text" <?php checked($front_mode, 'text'); ?>> Texte</label><br>
            <label><input type="radio" name="fms_front_mode" value="image" <?php checked($front_mode, 'image'); ?>> Image</label>
        </p>

        <div class="fms-image-field" style="margin:20px 0;">
            <label><strong>Image face avant :</strong></label><br><br>
            <input type="hidden" class="fms-image-id" name="fms_front_image" value="<?php echo esc_attr($front_image); ?>">
            <button type="button" class="button fms-upload-image">Choisir une image</button>
            <button type="button" class="button fms-remove-image">Supprimer</button>
            <div class="fms-image-preview" style="margin-top:15px;">
                <?php if ($front_image_url): ?><img src="<?php echo esc_url($front_image_url); ?>" style="max-width:150px;height:auto;"><?php endif; ?>
            </div>
        </div>

        <p><label><strong>Nombre de sœurs :</strong></label><br><input type="number" name="fms_sisters" value="<?php echo esc_attr($sisters); ?>" style="width:100%;"></p>
        <p><label><strong>Nombre de communautés :</strong></label><br><input type="number" name="fms_communities" value="<?php echo esc_attr($communities); ?>" style="width:100%;"></p>
        <p><label><strong>Année d’implantation :</strong></label><br><input type="number" name="fms_year" value="<?php echo esc_attr($year); ?>" style="width:100%;"></p>

        <p>
            <label><strong>Face arrière (hover) :</strong></label><br>
            <label><input type="radio" name="fms_back_mode" value="image" <?php checked($back_mode, 'image'); ?>> Image</label><br>
            <label><input type="radio" name="fms_back_mode" value="text" <?php checked($back_mode, 'text'); ?>> Texte</label>
        </p>

        <div class="fms-image-field" style="margin:20px 0;">
            <label><strong>Drapeau / image hover :</strong></label><br><br>
            <input type="hidden" class="fms-image-id" name="fms_flag" value="<?php echo esc_attr($flag); ?>">
            <button type="button" class="button fms-upload-image">Choisir une image</button>
            <button type="button" class="button fms-remove-image">Supprimer</button>
            <div class="fms-image-preview" style="margin-top:15px;">
                <?php if ($flag_url): ?><img src="<?php echo esc_url($flag_url); ?>" style="max-width:150px;height:auto;"><?php endif; ?>
            </div>
        </div>

        <p><label><strong>Ordre d’affichage :</strong></label><br><input type="number" name="fms_order" value="<?php echo esc_attr($order); ?>" style="width:100%;"></p>

    </div>

    <?php
}

function fms_world_presence_save_meta($post_id) {
    if (!isset($_POST['fms_world_presence_nonce']) || !wp_verify_nonce($_POST['fms_world_presence_nonce'], 'fms_world_presence_save_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    update_post_meta($post_id, '_fms_front_mode', sanitize_text_field($_POST['fms_front_mode'] ?? 'text'));
    update_post_meta($post_id, '_fms_front_image', absint($_POST['fms_front_image'] ?? 0));
    update_post_meta($post_id, '_fms_back_mode', sanitize_text_field($_POST['fms_back_mode'] ?? 'image'));
    update_post_meta($post_id, '_fms_sisters', sanitize_text_field($_POST['fms_sisters'] ?? ''));
    update_post_meta($post_id, '_fms_communities', sanitize_text_field($_POST['fms_communities'] ?? ''));
    update_post_meta($post_id, '_fms_year', sanitize_text_field($_POST['fms_year'] ?? ''));
    update_post_meta($post_id, '_fms_flag', absint($_POST['fms_flag'] ?? 0));
    update_post_meta($post_id, '_fms_order', sanitize_text_field($_POST['fms_order'] ?? ''));
}
add_action('save_post', 'fms_world_presence_save_meta');