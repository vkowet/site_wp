<?php
function fms_register_world_presence_cpt() {
    register_post_type('world_presence', [
        'labels' => [
            'name' => 'Congrégations dans le monde',
            'singular_name' => 'Pays de mission',
            'add_new' => 'Ajouter un pays',
            'add_new_item' => 'Ajouter un pays de mission',
            'edit_item' => 'Modifier le pays',
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-site-alt3',
        'rewrite' => ['slug' => 'monde'],
        'supports' => ['title','editor','thumbnail','excerpt'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'fms_register_world_presence_cpt');
