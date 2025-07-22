<?php
/**
 * Template Part: Blog Section
 */
    //group
    $blogSection = get_field('blog_posts_section');


    // blog posts
    $blog_posts = [
    $blogSection['blog_post_1'] ?? null,
    $blogSection['blog_post_2'] ?? null,
    $blogSection['blog_post_3'] ?? null,
    ];

    // Filter out empty ones
    $blog_posts = array_filter($blog_posts);
?>

<!-- Blog Highlights -->
  <section class="bg-gray-50 py-22 pb-20 blog-features">
    <div class="max-w-7xl mx-auto px-6 text-center">
      <div class="max-w-2xl mx-auto" data-aos="fade-up" data-aos-duration="1500">
        <?=$blogSection['description']?>
      </div>

      <?php if (!empty($blog_posts)): ?>
        <div class="flex gap-8 mt-16 mb-14" data-aos="fade-in" data-aos-duration="1500">
          <?php foreach ($blog_posts as $post): 
            $title = get_the_title($post->ID);
            $link = get_the_permalink($post->ID);
            $image = get_field('image', $post->ID); ?>
          
            <a class="flex flex-col flex-1 rounded-md overflow-hidden group blog-card" href="<?=$link?>">
              <!-- Image -->
              <div class="blog-image-wrapper">
                <img class="blog-image" src="<?= esc_url($image['sizes']['thumbnail-post']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
                <div class="blog-overlay"></div>
              </div>

              <!-- Title (Equal height) -->
              <div class="blog-title">
                <h3 class="font-semibold"><?= esc_html($title); ?></h3>
                <p class="mt-2 mb-0 text-sm">Read More &rarr;</p>
              </div>

            </a>

          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php 
        $blogButton = $blogSection['button'];
        if($blogButton) : 

          // button properties
          $url = esc_url($blogButton['url']);
          $label = esc_html($blogButton['title']);
          $target = $blogButton['target'] ? esc_attr($blogButton['target']) : '_self';
        
          echo '<a href="'. $url .'" target="'. $target .'" class="btn">'. $label .'</a>';
        endif;
      ?>
    </div>
  </section>