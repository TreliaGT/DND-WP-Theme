<?php


// Add the custom field form to the post editor
function add_character_attributes_custom_fields() {
    add_meta_box(
        'character_attributes',
        'Character Attributes',
        'display_character_attributes_custom_fields',
        'players',  // Change 'post' to the post type where you want this custom field form
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_character_attributes_custom_fields');

// Display the custom field form
function display_character_attributes_custom_fields($post) {
    // Retrieve existing values from the database
    $character_health = get_post_meta($post->ID, 'character_health', true);
    $strength = get_post_meta($post->ID, 'character_strength', true);
    $dexterity = get_post_meta($post->ID, 'character_dexterity', true);
    $constitution = get_post_meta($post->ID, 'character_constitution', true);
    $intelligence = get_post_meta($post->ID, 'character_intelligence', true);
    $wisdom = get_post_meta($post->ID, 'character_wisdom', true);
    $charisma = get_post_meta($post->ID, 'character_charisma', true);
    $coins = get_post_meta($post->ID, 'character_coins', true);
    $character_class = get_post_meta($post->ID, 'character_class', true);
    $character_level = get_post_meta($post->ID, 'character_level', true);
    $character_race = get_post_meta($post->ID, 'character_race', true);


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

/* Style the attribute group container */
.attribute-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 15px;
}

/* Style the labels and input fields within the group */
.attribute-group label,
.attribute-group input {
    flex-basis: calc(50% - 10px);
    margin-right: 10px;
}

/* Adjust spacing for smaller screens if needed */
@media screen and (max-width: 768px) {
    .attribute-group label,
    .attribute-group input {
        flex-basis: 100%;
        margin-right: 0;
        margin-bottom: 10px;
    }
}

    </style>
    <label for="character_health">Character Health:</label>
<input type="number" id="character_health" name="character_health" value="<?php echo esc_attr($character_health); ?>"><br>

 <label for="character_class">Character Class:</label>
<input type="text" id="character_class" name="character_class" value="<?php echo esc_attr($character_class); ?>"><br>

<label for="character_level">Character Level:</label>
<input type="number" id="character_level" name="character_level" value="<?php echo esc_attr($character_level); ?>"><br>

<label for="character_race">Character Race:</label>
<input type="text" id="character_race" name="character_race" value="<?php echo esc_attr($character_race); ?>"><br>
<label for="character_coin">Coins:</label>
<input type="text" id="character_coin" name="character_coin" value="<?php echo esc_attr($coins); ?>">
<div class="attribute-group">
    <div>
    <label for="character_strength">Strength (STR):</label>
    <input type="text" id="character_strength" name="character_strength" value="<?php echo esc_attr($strength); ?>">
    </div><div>
    <label for="character_dexterity">Dexterity (DEX):</label>
    <input type="text" id="character_dexterity" name="character_dexterity" value="<?php echo esc_attr($dexterity); ?>">
    </div><div>
    <label for="character_constitution">Constitution (CON):</label>
    <input type="text" id="character_constitution" name="character_constitution" value="<?php echo esc_attr($constitution); ?>">
    </div><div>
    <label for="character_intelligence">Intelligence (INT):</label>
    <input type="text" id="character_intelligence" name="character_intelligence" value="<?php echo esc_attr($intelligence); ?>">
    </div><div>
    <label for="character_wisdom">Wisdom (WIS):</label>
    <input type="text" id="character_wisdom" name="character_wisdom" value="<?php echo esc_attr($wisdom); ?>">
    </div><div>
    <label for="character_charisma">Charisma (CHA):</label>
    <input type="text" id="character_charisma" name="character_charisma" value="<?php echo esc_attr($charisma); ?>">
    </div>
</div>


    <?php
}

// Save the custom field values when the post is saved or updated
function save_character_attributes_custom_fields($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    
    $custom_fields = array(
        'character_health',
        'character_class',
        'character_level',
        'character_race',
        'character_strength',
        'character_dexterity',
        'character_constitution',
        'character_intelligence',
        'character_wisdom',
        'character_charisma',
        'character_coins',
    );

    foreach ($custom_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'save_character_attributes_custom_fields');


function add_skills_meta_box() {
    add_meta_box(
        'skills_meta_box',
        'Skills',
        'display_skills_meta_box',
        'players',  // Replace 'post' with your custom post type
        'normal',
        'default'
    );
}

add_action('add_meta_boxes', 'add_skills_meta_box');

function display_skills_meta_box($post) {
    ?>
    <style>
        /* Style the skill container */
.skills-container {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 15px;
}

/* Style the individual skill fields */
.skill-field {
    margin-bottom: 10px;
    display: flex;
    align-items: center;
}

/* Style the skill input field */
.skill-field input {
    flex: 1;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Style the "Add Skill" button */
.add-skill-button {
    background-color: #0073e6;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}

.add-skill-button:hover {
    background-color: #005bb8;
}

/* Style the "Remove" button within each skill field */
.remove-skill-button {
    background-color: #ff0000;
    color: #fff;
    border: none;
    padding: 3px 8px;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 10px;
}

.remove-skill-button:hover {
    background-color: #cc0000;
}

    </style>
    <div class="skills-container">
        <?php
        $skills = get_post_meta($post->ID, 'skills', true);

        if ($skills) {
            foreach ($skills as $skill) {
                ?>
                <div class="skill-field">
                    <input type="text" name="skills[]" value="<?php echo esc_attr($skill); ?>">
                    <button class="remove-skill-button">Remove</button>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <button class="add-skill-button">Add Skill</button>

    <script>
        jQuery(document).ready(function($) {
            // Add new skill input field
            $('.add-skill-button').click(function() {
                $('.skills-container').append('<div class="skill-field"><input type="text" name="skills[]"><button class="remove-skill-button">Remove</button></div>');
            });

            // Remove skill input field
            $('.skills-container').on('click', '.remove-skill-button', function() {
                $(this).parent().remove();
            });
        });
    </script>
    <?php
}

function save_skills_data($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['skills'])) {
        $skills = array_map('sanitize_text_field', $_POST['skills']);
        update_post_meta($post_id, 'skills', $skills);
    }
}

add_action('save_post', 'save_skills_data');
