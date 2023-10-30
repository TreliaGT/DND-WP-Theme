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

function set_up(){
	register_nav_menus(
        array(
            'primary' => esc_html__( 'Primary menu', 'D&D Master Theme' ),
            'footer'  => esc_html__( 'Secondary menu', 'D&D Master Theme' ),
        )
    );
}
add_action( 'after_setup_theme', 'set_up' );

function disable_theme_editor() {
    define('DISALLOW_FILE_EDIT', true);
   // define('DISALLOW_FILE_MODS', true);
}

add_action('init', 'disable_theme_editor');

// adding custom fields to certain posts/pages 
// function add_custom_fields_to_page() {
//     $page_id = 123; // Replace with the actual page ID.
//     $field_name = 'custom_field_name';
//     $field_value = 'Your custom field value';

//     add_post_meta($page_id, $field_name, $field_value, true);
// }
// add_action('init', 'add_custom_fields_to_page');


