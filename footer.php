</div> <!-- .container -->
</nav>

<footer class="bg-gray-900 text-white p-4">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            <nav class="space-x-4">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer', // Change this to your registered menu location
                    'menu_id' => 'footer-menu',
                    'container' => false,
                    'menu_class' => 'flex',
                ));
                ?>
            </nav>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>
</body>
</html>
