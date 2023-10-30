<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body <?php body_class(); ?>>
    <header class="bg-gray-900  p-4">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <h1 class="text-white text-2xl"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <nav class="space-x-4">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary', // Change this to your registered menu location
                        'menu_id' => '6',
                        'container' => false,
                        'menu_class' => 'flex text-white',
                    ));
                    ?>
                </nav>
            </div>
        </div>
    </header>
