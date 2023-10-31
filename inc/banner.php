<?php
$campaign_title = get_option('campaign_title');
$campaign_overview = get_option('campaign_overview');
$campaign_cover_image = get_option('campaign_cover_image');
?>

<div class="bg-cover py-4 banner" style="background-image: url('<?php echo esc_html($campaign_cover_image) ?>');">
    <div class="container mx-auto">
        <div class="p-8 background-op mt-10 mb-10 mt-lg-20 mb-lg-20">
            <h1 class="h2 lg:h1 mb-3"><?php echo esc_html($campaign_title) ?></h1>
            <p class="h4 lg:h3"><?php echo esc_html($campaign_overview) ?></p>
        </div>
    </div>
</div>
