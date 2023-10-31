<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main container m-auto">
        <?php
        while (have_posts()) : the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" class="internal-player">
                    <div class="bg-white rounded-lg shadow-lg p-4 m-4">
                        <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/4 xl:w-1/4 mb-2">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('thumbnail', ['class' => 'w-full']);
                        }
                        ?>
                    </div>
                    <div class="w-full  lg:w-3/4 xl:w-3/4 pl-2">
                        <h1 class="text-2xl font-semibold"><?php the_title(); ?></h1>
                        <div class="icons-right">
                            <div class="health" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/heart.png';?>');"><?php echo get_post_meta(get_the_ID(), 'character_health', true); ?></div>
						    <div class="level" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/shield.png'; ?>');"><?php echo get_post_meta(get_the_ID(), 'character_level', true); ?></div>
                        </div>
                        <p><strong>Class:</strong> <?php echo get_post_meta(get_the_ID(), 'character_class', true); ?></p>
                        <p><strong>Race:</strong> <?php echo get_post_meta(get_the_ID(), 'character_race', true); ?></p>
                        

                        <ul>
                        <li><strong>Strength (STR):</strong> <?php echo esc_attr(get_post_meta(get_the_ID(), 'character_strength', true)); ?></li>
                        <li><strong>Dexterity (DEX):</strong> <?php echo esc_attr(get_post_meta(get_the_ID(), 'character_dexterity', true)); ?></li>
                        <li><strong>Constitution (CON):</strong> <?php echo esc_attr(get_post_meta(get_the_ID(), 'character_constitution', true)); ?></li>
                        <li><strong>Intelligence (INT):</strong> <?php echo esc_attr(get_post_meta(get_the_ID(), 'character_intelligence', true)); ?></li>
                        <li><strong>Wisdom (WIS):</strong> <?php echo esc_attr(get_post_meta(get_the_ID(), 'character_wisdom', true)); ?></li>
                        <li><strong>Charisma (CHA):</strong> <?php echo esc_attr(get_post_meta(get_the_ID(), 'character_charisma', true)); ?></li>
                        <li><strong>Coins:</strong> <?php echo esc_attr(get_post_meta(get_the_ID(), 'character_coins', true)); ?></li>
                    </ul>
                    </div>
                </div>
                <div class="mt-10 mb-10">
                        <?php the_content(); ?>
                    </div>
            </div>
            </article>

            <?php
        endwhile;
        ?>
    </main>
</div>

<?php get_footer(); ?>
