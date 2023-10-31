<?php
function my_campaign_options_page() {
    add_menu_page(
        'Campaign Options',
        'Campaign Options',
        'manage_options',
        'campaign-options',
        'campaign_options_page'
    );
}

add_action('admin_menu', 'my_campaign_options_page');


function campaign_options_page() {
    ?>
    <div class="wrap">
        <h2>Campaign Options</h2>

        <form method="post" action="options.php">
            <?php
                settings_fields('campaign_options_group');
                do_settings_sections('campaign-options');
                submit_button();
            ?>
        </form>
    </div>
    <?php
}

function campaign_options_init() {
    add_settings_section('campaign_options_section', 'Campaign Settings', 'campaign_section_callback', 'campaign-options');

    add_settings_field('campaign_title', 'Campaign Title', 'campaign_title_callback', 'campaign-options', 'campaign_options_section');
    add_settings_field('campaign_overview', 'Campaign Overview', 'campaign_overview_callback', 'campaign-options', 'campaign_options_section');
    add_settings_field('campaign_cover_image', 'Campaign Cover Image (URL)', 'campaign_cover_image_callback', 'campaign-options', 'campaign_options_section');
    add_settings_field('campaign_main_map_image', 'Campaign Main Map Image (URL)', 'campaign_main_map_image_callback', 'campaign-options', 'campaign_options_section');

    register_setting('campaign_options_group', 'campaign_title');
    register_setting('campaign_options_group', 'campaign_overview');
    register_setting('campaign_options_group', 'campaign_cover_image');
    register_setting('campaign_options_group', 'campaign_main_map_image');
}

add_action('admin_init', 'campaign_options_init');


function campaign_section_callback() {
    // Section description (if needed)
    echo '<p>Settings for your campaign</p>';
}

function campaign_title_callback() {
    $campaign_title = get_option('campaign_title');
    echo '<input type="text" name="campaign_title" value="' . esc_attr($campaign_title) . '" />';
}

function campaign_overview_callback() {
    $campaign_overview = get_option('campaign_overview');
    echo '<textarea name="campaign_overview">' . esc_textarea($campaign_overview) . '</textarea>';
}

function campaign_cover_image_callback() {
    $campaign_cover_image = get_option('campaign_cover_image');
    echo '<input type="url" name="campaign_cover_image" value="' . esc_attr($campaign_cover_image) . '" />';
}

function campaign_main_map_image_callback() {
    $campaign_main_map_image = get_option('campaign_main_map_image');
    echo '<input type="url" name="campaign_main_map_image" value="' . esc_attr($campaign_main_map_image) . '" />';
}


function save_campaign_options() {
    if (isset($_POST['campaign_title'])) {
        update_option('campaign_title', sanitize_text_field($_POST['campaign_title']));
    }

    if (isset($_POST['campaign_overview'])) {
        update_option('campaign_overview', sanitize_text_field($_POST['campaign_overview']));
    }

    if (isset($_POST['campaign_cover_image'])) {
        update_option('campaign_cover_image', sanitize_text_field($_POST['campaign_cover_image']));
    }

    if (isset($_POST['campaign_main_map_image'])) {
        update_option('campaign_main_map_image', sanitize_text_field($_POST['campaign_main_map_image']));
    }
}

add_action('admin_post_save_campaign_options', 'save_campaign_options');
add_action('admin_post_nopriv_save_campaign_options', 'save_campaign_options');

/**
 * $campaign_title = get_option('campaign_title');
 * $campaign_overview = get_option('campaign_overview');
 *
 * echo '<h1>' . esc_html($campaign_title) . '</h1>';
 * echo '<p>' . esc_html($campaign_overview) . '</p>';
 */
