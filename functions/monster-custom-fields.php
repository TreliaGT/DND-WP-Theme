<?php


// Add the custom field form to the post editor
function add_monster_attributes_custom_fields() {
    add_meta_box(
        'monster_attributes',
        'Monster Attributes',
        'display_monster_attributes_custom_fields',
        'monsters',  // Change 'post' to the post type where you want this custom field form
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_monster_attributes_custom_fields');

// Display the custom field form
function display_monster_attributes_custom_fields($post) {
    // Retrieve existing values from the database
    $monster_health = get_post_meta($post->ID, 'health', true);
    $monster_class = get_post_meta($post->ID, 'class', true);
    $monster_level = get_post_meta($post->ID, 'level', true);


    ?>
    <style>
        label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

/* Style the input fields */
input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Style the form container */
#character_attributes {
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
}



    </style>
    <label for="monster_health">Monster Health:</label>
    <input type="number" id="monster_health" name="monster_health" value="<?php echo esc_attr($monster_health); ?>"><br>

    <label for="monster_class">Monster Class:</label>
    <input type="text" id="monster_class" name="monster_class" value="<?php echo esc_attr($monster_class); ?>"><br>

    <label for="monster_level">Monster Level:</label>
    <input type="number" id="monster_level" name="monster_level" value="<?php echo esc_attr($monster_level); ?>"><br>



    <?php
}

// Save the custom field values when the post is saved or updated
function save_monster_attributes_custom_fields($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    
    $custom_fields = array(
        'monster_health',
        'monster_class',
        'monster_level',

    );

    foreach ($custom_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'save_monster_attributes_custom_fields');


