<?php

function fms_get_options() {
    return get_option('fms_theme_options', []);
}

function fms_get_option($section, $field, $default = '') {

    $options = fms_get_options();

    if (
        isset($options[$section]) &&
        is_array($options[$section]) &&
        isset($options[$section][$field])
    ) {
        return $options[$section][$field];
    }

    return $default;
}

function fms_get_image_url($attachment_id) {

    if (!$attachment_id) {
        return '';
    }

    return wp_get_attachment_image_url($attachment_id, 'full');
}

function fms_get_theme_image_url($attachment_id) {
    return fms_get_image_url($attachment_id);
}
