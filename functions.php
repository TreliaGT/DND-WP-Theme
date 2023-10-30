<?php

//calling other functions
include get_template_directory() . '/functions/option-page.php';
include get_template_directory() . '/functions/custom-posts-type.php';
include get_template_directory() . '/functions/player-custom-fields.php';
include get_template_directory() . '/functions/monster-custom-fields.php';
include get_template_directory() . '/functions/npc-custom-fields.php';

function disable_custom_fields() {
    echo '<style>.postbox-container#postcustom { display: none; }</style>';
    echo '<script>jQuery(document).ready(function($){ $("#postcustom").remove(); });</script>';
}

add_action('admin_head', 'disable_custom_fields');


function disable_theme_editor() {
    define('DISALLOW_FILE_EDIT', true);
    define('DISALLOW_FILE_MODS', true);
}

add_action('init', 'disable_theme_editor');
