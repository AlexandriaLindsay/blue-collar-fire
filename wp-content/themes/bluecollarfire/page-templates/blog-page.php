<?php
/**
 * Template Name: Blog
 */
get_header();

$all_posts = new WP_Query([
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
]);
?>

<?php get_template_part('template-parts/header', 'subpage'); ?>

<section class="max-w-7xl mx-auto px-6 py-10">
    <div class="flex">
        <div class="flex-1/4">
            <?php get_sidebar(); ?>
        </div>
        <div class="flex-10/12">
            <div id="filtered-posts">
                <?php
                if ($all_posts->have_posts()) :
                    while ($all_posts->have_posts()) : $all_posts->the_post(); ?>
                        <article class="mb-8">
                            <h2 class="text-xl font-bold">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No posts found.</p>';
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
