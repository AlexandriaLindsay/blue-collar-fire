<?php
/**
*    Template Name: Home
*/
get_header();

// acf groups
$hero = get_field('hero');
$audienceSection = get_field('section_1');
$blogSection = get_field('blog_post_section');
$aboutSection= get_field('about');

// audiences
$audiences = [
  $audienceSection['column_1'] ?? null,
  $audienceSection['column_2'] ?? null,
  $audienceSection['column_3'] ?? null,
];

// blog posts
$blog_posts = [
  $blogSection['blog_post_1'] ?? null,
  $blogSection['blog_post_2'] ?? null,
  $blogSection['blog_post_3'] ?? null,
];

// Filter out empty ones
$blog_posts = array_filter($blog_posts);
?>

 <!-- Hero Section -->
  <section class="hero py-12">
    <div class="flex max-w-7xl mx-auto items-center">
      <div class="opacity-0 flex-1 px-6 animate-flip-up">
        <div class="absolute -top-[18.5rem] content">
          <?php 
            if($hero) :
              echo $hero['hero_text'];

              // hero link
              $callToAction = $hero['call_to_action'];

              if($callToAction) :
                $url = esc_url($callToAction['url']);
                $label = esc_html($callToAction['title']);
                $target = $callToAction['target'] ? esc_attr($callToAction['target']) : '_self';

                echo '<a href="'. $url .'" target="'. $target .'" class="btn">'. $label .'</a>';
              endif;
            endif; 
          ?>
        </div>
      
      </div>

      <div class="opacity-0 flex flex-3 justify-center items-center animate-flip-up" style="animation-delay: .3s;">
        <?php if($hero) : ?>
          <img src="<?=$hero['hero_image']['url'];?>" alt="<?=$hero['hero_image']['alt'];?>" />
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Audiences -->
  <section class="py-4 pb-16 relative">
    <div class=" absolute -left-[28rem] bottom-[1rem] accent"><img src="<?=get_stylesheet_directory_uri();?>/img/dirt.png" alt="Dirt Splatter" /></div>
    <div class="max-w-7xl mx-auto px-12 text-center mt-12">

      <div class="max-w-xl mx-auto" data-aos="fade-up">
        <?=$audienceSection['intro_text'];?>
      </div>
      
      <div class="flex items-start gap-24 mt-16">
        <?php if(!empty($audiences)) : ?>
          <?php foreach( $audiences as $audience) : ?>
            <div class="flex-1 flex flex-col items-center">
              <img src="<?=$audience['icon']['sizes']['icon']?>" alt="<?=$audience['icon']['alt'];?>" />
              <?=$audience['description'];?>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

    </div>
  </section>

  <!-- Blog Highlights -->
  <section class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-6 text-center">
      <div class="max-w-2xl mx-auto" data-aos="fade-up">
        <?=$blogSection['intro_description']?>
      </div>
      <?php if (!empty($blog_posts)): ?>
        <div class="flex items-start gap-12 mt-16" data-aos="fade-in">
          <?php foreach ($blog_posts as $post): 
            $title = get_the_title($post->ID);
            $link = get_the_permalink($post->ID);
            $image = get_field('image', $post->ID); ?>
            
            <a class="flex-1 flex flex-col items-center relative" href="<?=$link?>">
              <?php if ($image): ?>
                <img class="w-full rounded-md" src="<?= esc_url($image['sizes']['thumbnail-post']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
              <?php endif; ?>
              <h3 class="bg-brand-silver absolute -bottom-10 mb-0 drop-shadow-sm rounded-md py-4 px-2 mx-8 my-0"><?= esc_html($title); ?></h3>
              </a>

          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- About Preview -->
  <section class="py-12">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-8 px-6">

      <?php if($aboutSection) : $aboutImg = $aboutSection['image'];?>
        <div data-aos="fade-up">
          <?=$aboutSection['description'];?>
          <?php
              // about link
            $button = $aboutSection['button'];

            if($button) :
              $url = esc_url($button['url']);
              $label = esc_html($button['title']);
              $target = $button['target'] ? esc_attr($button['target']) : '_self';

              echo '<a href="'. $url .'" target="'. $target .'" class="btn">'. $label .'</a>';
            endif;
          ?>
        </div>
        <img data-aos="fade-in" src="<?=$aboutImg['sizes']['home-about'];?>" class="w-full md:w-1/2 rounded shadow" alt="<?=$aboutImg['alt']?>">
      <?php endif; ?>
    </div>
  </section>

  <?php get_footer();?>