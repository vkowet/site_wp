<?php
function fms_register_slider_settings($wp_customize) {
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("fms_slide_{$i}_image", ['sanitize_callback' => 'absint']);
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, "fms_slide_{$i}_image", [
            'label' => "Slide {$i} - Image",
            'section' => 'fms_hero_settings',
            'mime_type' => 'image',
        ]));

        $wp_customize->add_setting("fms_slide_{$i}_title", ['sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("fms_slide_{$i}_title", ['label' => "Slide {$i} - Titre",'section' => 'fms_hero_settings','type' => 'text']);

        $wp_customize->add_setting("fms_slide_{$i}_text", ['sanitize_callback' => 'sanitize_textarea_field']);
        $wp_customize->add_control("fms_slide_{$i}_text", ['label' => "Slide {$i} - Texte",'section' => 'fms_hero_settings','type' => 'textarea']);

        $wp_customize->add_setting("fms_slide_{$i}_button_text", ['sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("fms_slide_{$i}_button_text", ['label' => "Slide {$i} - Bouton",'section' => 'fms_hero_settings','type' => 'text']);

        $wp_customize->add_setting("fms_slide_{$i}_button_link", ['sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control("fms_slide_{$i}_button_link", ['label' => "Slide {$i} - Lien",'section' => 'fms_hero_settings','type' => 'url']);
    }
}
add_action('customize_register', 'fms_register_slider_settings');