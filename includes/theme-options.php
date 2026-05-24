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

function fms_theme_options_page() {
    ?>
    <div class="wrap">
        <h1>Options du thème FMS</h1>

        <h2 class="nav-tab-wrapper">
            <a href="#" class="nav-tab nav-tab-active">Homepage</a>
            <a href="#" class="nav-tab">Identité</a>
            <a href="#" class="nav-tab">Footer</a>
            <a href="#" class="nav-tab">Pages internes</a>
            <a href="#" class="nav-tab">Réseau mondial</a>
        </h2>

        <div style="background:#fff;padding:30px;margin-top:20px;border:1px solid #ddd;">
            <h2>Centre de pilotage FMS</h2>
            <p>Structure créée. Les réglages seront migrés ici progressivement.</p>
        </div>
    </div>
    <?php
}
