<?php
/**
 * Template Name: Custom 404 Error Page
 * in htaccess : ErrorDocument 404 /your-custom-error-page/
 */

get_header(); // Include your header file.

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'yourtheme'); ?></h1>
            </header>
            <div class="page-content">
                <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'yourtheme'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); // Include your footer file. ?>

