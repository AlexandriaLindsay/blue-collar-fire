<?php
/**
 * Template Name: About
 */
get_header();

//groups
$about = get_field('about');
?>

<?php get_template_part('template-parts/header', 'subpage'); ?>

<section class="max-w-5xl mx-auto px-6 py-10">
  <div>
    <img class="mx-auto" src="<?=$about['image']['sizes']['post'];?>" alt="<?=$about['image']['alt'];?>">
  </div>

  <div class="px-[7rem] pt-12">
    <?=$about['description'];?>
  </div>
</section>

<?php get_template_part('template-parts/blog', 'section'); ?>

<?php get_footer(); ?> 