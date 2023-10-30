<?php


// Add the custom field form to the post editor
function add_npcs_attributes_custom_fields() {
    add_meta_box(
        'npcs_attributes',
        'NPCS Attributes',
        'display_npc_attributes_custom_fields',
        'npcs',  // Change 'post' to the post type where you want this custom field form
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_npcs_attributes_custom_fields');

// Display the custom field form
function display_npc_attributes_custom_fields($post) {
    // Retrieve existing values from the database
    $npc_health = get_post_meta($post->ID, 'health', true);
    $npc_class = get_post_meta($post->ID, 'class', true);
    $npc_level = get_post_meta($post->ID, 'level', true);


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
    <label for="npc_health">NPC  Health:</label>
    <input type="number" id="npc_health" name="npc_health" value="<?php echo esc_attr($npc_health); ?>"><br>

    <label for="npc_class">NPC Class:</label>
    <input type="text" id="npc_class" name="npc_class" value="<?php echo esc_attr($npc_class); ?>"><br>

    <label for="npc_level">NPC Level:</label>
    <input type="number" id="npc_level" name="npc_level" value="<?php echo esc_attr($npc_level); ?>"><br>



    <?php
}

// Save the custom field values when the post is saved or updated
function save_npc_attributes_custom_fields($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    
    $custom_fields = array(
        'npc_health',
        'npc_class',
        'npc_level',

    );

    foreach ($custom_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'save_npc_attributes_custom_fields');


