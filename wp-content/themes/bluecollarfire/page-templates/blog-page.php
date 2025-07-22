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
        <div class="flex-[25%] pr-[3rem] custom-sidebar">
            <?php get_sidebar(); ?>
        </div>
        <div class="flex-[75%]">
            <div id="filtered-posts" class="relative blog-posts flex flex-wrap gap-4">
                <?php
                if ($all_posts->have_posts()) :
                    while ($all_posts->have_posts()) : $all_posts->the_post(); ?>
                        <article class="flex w-[32%] flex-col group blog-card" data-aos="fade-in">
                            <a href="<?php the_permalink(); ?>">
                                <?php $image = get_field('image');?>
                                 <!-- Image -->
                                <div class="blog-image-wrapper">
                                    <img class="blog-image" src="<?= esc_url($image['sizes']['thumbnail-post']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
                                    <div class="blog-overlay"></div>
                                </div>

                                <!-- Title (Equal height) -->
                                <div class="blog-title">
                                    <div class="bg-white opacity-80 trans-bg"></div>
                                    <h3 class="font-semibold"><?=the_title();?> <span>&rarr;</span></h3>
                                </div>
                            </a>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="no-posts">No posts found.</p>';
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
