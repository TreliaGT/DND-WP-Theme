<?php
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 4,
);
$loop = new WP_Query($args);
?>

<section class="container posts mx-auto mt-10 mb-10">
    <h2 class="text-center text-2xl lg:text-3xl">Catch Up On Last Sessions</h2>
    <div class="flex flex-wrap justify-center p-4 m-4">
        <?php 
        while ($loop->have_posts()) {
            $loop->the_post();
            ?>

            <div class="w-full lg:w-1/4 xl:w-1/4 p-2">
                <div class="bg-white rounded-lg shadow-lg card">
                    <a href="<?php the_permalink(); ?>">
                        <div class="info p-4">
                            <h3 class="text-2xl font-semibold"><?php the_title(); ?></h3>
                            <span><?php the_date('F j, Y'); ?></span>
                            <div>
                                 <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <?php
        }
        ?> 
    </div>
</section>

<?php
wp_reset_postdata(); // Restore the global post data
?>
