<?php
function fms_world_presence_add_meta_boxes() {
    add_meta_box('fms_world_presence_details', 'Informations du pays', 'fms_world_presence_meta_box_callback', 'world_presence', 'normal', 'high');
}
add_action('add_meta_boxes', 'fms_world_presence_add_meta_boxes');

function fms_world_presence_meta_box_callback($post) {
    wp_nonce_field('fms_world_presence_save_meta', 'fms_world_presence_nonce');

    $sisters = get_post_meta($post->ID, '_fms_sisters', true);
    $communities = get_post_meta($post->ID, '_fms_communities', true);
    $year = get_post_meta($post->ID, '_fms_year', true);
    $flag = get_post_meta($post->ID, '_fms_flag', true);
    $order = get_post_meta($post->ID, '_fms_order', true);

    echo '<p><label>Nombre de sœurs :</label><br><input type="number" name="fms_sisters" value="'.esc_attr($sisters).'" style="width:100%;"></p>';
    echo '<p><label>Nombre de communautés :</label><br><input type="number" name="fms_communities" value="'.esc_attr($communities).'" style="width:100%;"></p>';
    echo '<p><label>Année d’implantation :</label><br><input type="number" name="fms_year" value="'.esc_attr($year).'" style="width:100%;"></p>';
    echo '<p><label>Image drapeau / hover (URL image) :</label><br><input type="text" name="fms_flag" value="'.esc_attr($flag).'" style="width:100%;"></p>';
    echo '<p><label>Ordre d’affichage :</label><br><input type="number" name="fms_order" value="'.esc_attr($order).'" style="width:100%;"></p>';
}

function fms_world_presence_save_meta($post_id) {
    if (!isset($_POST['fms_world_presence_nonce']) || !wp_verify_nonce($_POST['fms_world_presence_nonce'], 'fms_world_presence_save_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    update_post_meta($post_id, '_fms_sisters', sanitize_text_field($_POST['fms_sisters'] ?? ''));
    update_post_meta($post_id, '_fms_communities', sanitize_text_field($_POST['fms_communities'] ?? ''));
    update_post_meta($post_id, '_fms_year', sanitize_text_field($_POST['fms_year'] ?? ''));
    update_post_meta($post_id, '_fms_flag', esc_url_raw($_POST['fms_flag'] ?? ''));
    update_post_meta($post_id, '_fms_order', sanitize_text_field($_POST['fms_order'] ?? ''));
}
add_action('save_post', 'fms_world_presence_save_meta');
