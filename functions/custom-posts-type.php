<?php

// Register Custom Post Type
function register_players_custom_post_type() {
    $labels = array(
        'name' => 'Players',
        'singular_name' => 'Player',
        'add_new' => 'Add New Player',
        'add_new_item' => 'Add New Player',
        'edit_item' => 'Edit Player',
        'new_item' => 'New Player',
        'view_item' => 'View Player',
        'search_items' => 'Search Players',
        'not_found' => 'No players found',
        'not_found_in_trash' => 'No players found in trash',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'players'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    );

    register_post_type('players', $args);
}
add_action('init', 'register_players_custom_post_type');



// Register Custom Post Type for Quests
function register_quest_custom_post_type() {
    $labels = array(
        'name' => 'Quests',
        'singular_name' => 'Quest',
        'add_new' => 'Add New Quest',
        'add_new_item' => 'Add New Quest',
        'edit_item' => 'Edit Quest',
        'new_item' => 'New Quest',
        'view_item' => 'View Quest',
        'search_items' => 'Search Quests',
        'not_found' => 'No quests found',
        'not_found_in_trash' => 'No quests found in trash',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'quests'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
 
    );

    register_post_type('quests', $args);
}
add_action('init', 'register_quest_custom_post_type');

// Register Custom Post Type for Monsters
function register_monster_custom_post_type() {
    $labels = array(
        'name' => 'Monsters',
        'singular_name' => 'Monster',
        'add_new' => 'Add New Monster',
        'add_new_item' => 'Add New Monster',
        'edit_item' => 'Edit Monster',
        'new_item' => 'New Monster',
        'view_item' => 'View Monster',
        'search_items' => 'Search Monsters',
        'not_found' => 'No monsters found',
        'not_found_in_trash' => 'No monsters found in trash',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'monsters'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        
    );

    register_post_type('monsters', $args);
}
add_action('init', 'register_monster_custom_post_type');


//npc 

// Register Custom Post Type
function register_npcs_custom_post_type() {
    $labels = array(
        'name' => 'NPCS',
        'singular_name' => 'NPC',
        'add_new' => 'Add New NPC',
        'add_new_item' => 'Add New NPC',
        'edit_item' => 'Edit NPC',
        'new_item' => 'New NPC',
        'view_item' => 'View NPC',
        'search_items' => 'Search NPC',
        'not_found' => 'No NPC found',
        'not_found_in_trash' => 'No NPC found in trash',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'NPCS'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    );

    register_post_type('npcs', $args);
}
add_action('init', 'register_npcs_custom_post_type');

//taxonomy

function register_player_taxonomy() {
    $labels = array(
        'name' => 'Player Categories',
        'singular_name' => 'Player Category',
        'menu_name' => 'Player Categories',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );

    register_taxonomy('player_category', 'players', $args);
}
add_action('init', 'register_player_taxonomy');

function register_quest_taxonomy() {
    $labels = array(
        'name' => 'Quest Categories',
        'singular_name' => 'Quest Category',
        'menu_name' => 'Quest Categories',
    );

    $args = array(
        'hierarchical' => true, // Set to true for a hierarchical taxonomy (like categories) or false for non-hierarchical (like tags).
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );

    register_taxonomy('quest_category', 'quests', $args);
}
add_action('init', 'register_quest_taxonomy');


function register_monster_taxonomy() {
    $labels = array(
        'name' => 'Monster Types',
        'singular_name' => 'Monster Type',
        'menu_name' => 'Monster Types',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );

    register_taxonomy('monster_type', 'monsters', $args);
}
add_action('init', 'register_monster_taxonomy');

function register_npcs_taxonomy() {
    $labels = array(
        'name' => 'NPCS Types',
        'singular_name' => 'NPCS Type',
        'menu_name' => 'NPCS Types',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );

    register_taxonomy('npcs_type', 'npcs', $args);
}
add_action('init', 'register_npcs_taxonomy');

function register_items_taxonomy() {
    $labels = array(
        'name' => 'Items',
        'singular_name' => 'Item',
        'menu_name' => 'Items',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );

    register_taxonomy('item', array('monsters', 'quests', 'players', 'npcs'), $args);
}
add_action('init', 'register_items_taxonomy');

function register_locations_taxonomy() {
    $labels = array(
        'name' => 'locations',
        'singular_name' => 'location',
        'menu_name' => 'locations',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );

    register_taxonomy('locations', array('monsters', 'quests', 'players', 'npcs'), $args);
}
add_action('init', 'register_locations_taxonomy');

// adding additional fields to item & Location: 
function add_taxonomy_custom_fields() {
    // Add a custom field for the "Thumbnail"
    add_action('item_add_form_fields', 'add_thumbnail_field', 10, 2);
    add_action('created_item', 'save_thumbnail_field', 10, 2);

    add_action('locations_add_form_fields', 'add_thumbnail_field', 10, 2);
    add_action('created_locations', 'save_thumbnail_field', 10, 2);

    // Add a custom field for "Additional Information"
    add_action('item_add_form_fields', 'add_additional_info_field', 10, 2);
    add_action('created_item', 'save_additional_info_field', 10, 2);

    add_action('locations_add_form_fields', 'add_additional_info_field', 10, 2);
    add_action('created_locations', 'save_additional_info_field', 10, 2);

    // Edit term page
    add_action('item_edit_form_fields', 'edit_thumbnail_field', 10, 2);
    add_action('edited_item', 'update_thumbnail_field', 10, 2);

    add_action('locations_edit_form_fields', 'edit_thumbnail_field', 10, 2);
    add_action('edited_locations', 'update_thumbnail_field', 10, 2);


    add_action('item_edit_form_fields', 'edit_additional_info_field', 10, 2);
    add_action('edited_item', 'update_additional_info_field', 10, 2);

    add_action('locations_edit_form_fields', 'edit_additional_info_field', 10, 2);
    add_action('edited_locations', 'update_additional_info_field', 10, 2);
}

add_action('admin_init', 'add_taxonomy_custom_fields');

// Add Thumbnail Field
function add_thumbnail_field($taxonomy) {
    ?>
    <div class="form-field term-thumbnail-wrap">
        <label for="term-thumbnail">Thumbnail</label>
        <input type="text" name="term-thumbnail" id="term-thumbnail" value="" />
        <p>Add a thumbnail URL for this item.</p>
    </div>
    <?php
}

// Save Thumbnail Field
function save_thumbnail_field($term_id, $tt_id) {
    if (isset($_POST['term-thumbnail'])) {
        update_term_meta($term_id, 'thumbnail', sanitize_text_field($_POST['term-thumbnail']));
    }
}

// Edit Thumbnail Field
function edit_thumbnail_field($term, $taxonomy) {
    $thumbnail = get_term_meta($term->term_id, 'thumbnail', true);
    ?>
    <tr class="form-field term-thumbnail-wrap">
        <th scope="row"><label for="term-thumbnail">Thumbnail</label></th>
        <td>
            <input type="text" name="term-thumbnail" id="term-thumbnail" value="<?php echo esc_attr($thumbnail); ?>" />
            <p>Add a thumbnail URL for this item.</p>
        </td>
    </tr>
    <?php
}

// Update Thumbnail Field
function update_thumbnail_field($term_id, $tt_id) {
    if (isset($_POST['term-thumbnail'])) {
        update_term_meta($term_id, 'thumbnail', sanitize_text_field($_POST['term-thumbnail']));
    }
}

// Add Additional Information Field
function add_additional_info_field($taxonomy) {
    ?>
    <div class="form-field term-additional-info-wrap">
        <label for="term-additional-info">Additional Information</label>
        <textarea name="term-additional-info" id="term-additional-info"></textarea>
        <p>Add additional information for this item.</p>
    </div>
    <?php
}

// Save Additional Information Field
function save_additional_info_field($term_id, $tt_id) {
    if (isset($_POST['term-additional-info'])) {
        update_term_meta($term_id, 'additional_info', sanitize_text_field($_POST['term-additional-info']));
    }
}

// Edit Additional Information Field
function edit_additional_info_field($term, $taxonomy) {
    $additional_info = get_term_meta($term->term_id, 'additional_info', true);
    ?>
    <tr class="form-field term-additional-info-wrap">
        <th scope="row"><label for="term-additional-info">Additional Information</label></th>
        <td>
            <textarea name="term-additional-info" id="term-additional-info"><?php echo esc_html($additional_info); ?></textarea>
            <p>Add additional information for this item.</p>
        </td>
    </tr>
    <?php
}

// Update Additional Information Field
function update_additional_info_field($term_id, $tt_id) {
    if (isset($_POST['term-additional-info'])) {
        update_term_meta($term_id, 'additional_info', sanitize_text_field($_POST['term-additional-info']));
    }
}






