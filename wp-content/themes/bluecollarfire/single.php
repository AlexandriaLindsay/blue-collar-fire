<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bluecollarfire
 */

get_header();

?>
	<?php if(have_posts()) : while(have_posts()) : the_post(); $image = get_field('image'); ?>
		<section class="max-w-5xl mx-auto px-6 py-10 pt-0 single-blog-post">
			<div class="img-container relative">
				<img class="w-full" src="<?=$image['sizes']['post'];?>" alt="<?=$image['alt'];?>">
				<div>
					<h1><?=the_title();?></h1>
				</div>
			</div>

			<div class="px-0 md:px-[7rem] pt-12">
				<?=get_field('content');?>
			</div>
		</section>
	<?php endwhile; endif?>

	
<?php get_footer(); ?>
