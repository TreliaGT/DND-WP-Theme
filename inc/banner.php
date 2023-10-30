<?php

 $campaign_title = get_option('campaign_title');
 $campaign_overview = get_option('campaign_overview');
$campaign_cover_image = get_option('campaign_cover_image');

?>

<div class="bg-cover py-4 text-center" style="background-image: url('<?php echo esc_html($campaign_cover_image) ?>');">
    <div class="bg-blue-500 container mx-auto text-white">
        <div class="p-4">
            <h2 class="text-2xl"><?php echo esc_html($campaign_title) ?></h2>
            <p class="text-lg"><?php echo esc_html($campaign_overview) ?></p>
        </div>
    </div>
</div>

