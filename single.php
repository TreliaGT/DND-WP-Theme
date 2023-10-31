<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main container m-auto">
        <?php
        while (have_posts()) : the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" class="internal-player">
                    <div class="bg-white rounded-lg shadow-lg p-4 m-4">
                        <div class="flex flex-wrap">
                  
                    <div class="w-full">
                        <h1 class="text-2xl font-semibold"><?php the_title(); ?></h1>
                        <span><?php the_date('F j, Y'); ?></span>
                        <?php the_content(); ?>
                    </ul>
                    </div>
                </div>
            </div>
            </article>
            <?php
        endwhile;
        ?>
    </main>
</div>

<?php get_footer(); ?>
