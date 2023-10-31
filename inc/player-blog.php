<?php
$args = array(
    'post_type'      => 'players',
    'posts_per_page' => 8,
);
$loop = new WP_Query($args);
?>

<section class="container players mx-auto mt-10 mb-10">
    <h2 class="text-center text-2xl lg:text-3xl">Meet Our Players</h2>
    <div class="flex flex-wrap justify-center p-4 m-4">
        <?php 
        while ($loop->have_posts()) {
            $loop->the_post();
            ?>

            <div class="w-full lg:w-1/4 xl:w-1/4 p-2">
                <div class="bg-white rounded-lg shadow-lg card">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('thumbnail', ['class' => 'w-full']);
                        }
                        ?>
                        <div class="health bg-center" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/heart.png';?>');">
                            <?php echo get_post_meta(get_the_ID(), 'character_health', true); ?>
                        </div>
                        <div class="level bg-center" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/shield.png'; ?>');">
                            <?php echo get_post_meta(get_the_ID(), 'character_level', true); ?>
                        </div>
                        <div class="info p-4">
                            <h3 class="text-2xl font-semibold"><?php the_title(); ?></h3>
                            <div>
                                <p><strong>Class:</strong> <?php echo get_post_meta(get_the_ID(), 'character_class', true); ?></p>
                                <p><strong>Race:</strong> <?php echo get_post_meta(get_the_ID(), 'character_race', true); ?></p>
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
