<?php
/**
*    Template Name: Home
*/
get_header();

// acf groups
$hero = get_field('hero');
$audiences = get_field('section_1');


// columns
$column1 = $audiences['column_1'];
$column2 = $audiences['column_2'];
$column3 = $audiences['column_3'];
?>

 <!-- Hero Section -->
  <section class="bg-gray-100 py-12">
    <div class="flex gap-32 max-w-7xl mx-auto items-center">
      <div class="flex-1 px-6">
        <?php 
          if($hero) :
            echo $hero['hero_text'];
          endif; 
        ?>
      </div>

      <div class="flex justify-center items-center">
        <?php if($hero) : ?>
          <img src="<?=$hero['hero_image']['sizes']['hero'];?>" alt="<?=$hero['hero_image']['alt'];?>" />
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Audiences -->
  <section class="py-12">
    <div class="max-w-7xl mx-auto px-12 text-center mt-12">
      <?=$audiences['intro_text'];?>
      <div class="flex items-start gap-24 mt-16">

        <?php if($column1) : ?>
          <div class="flex-1 flex flex-col items-center">
            <img src="<?=$column1['icon']['sizes']['icon']?>" alt="<?=$column1['icon']['alt'];?>" />
            <?=$column1['description'];?>
          </div>
        <?php endif; ?>

        <?php if($column2) : ?>
          <div class="flex-1 flex flex-col items-center"">
            <img src="<?=$column2['icon']['sizes']['icon']?>" alt="<?=$column2['icon']['alt'];?>" />
            <?=$column2['description'];?>
          </div>
        <?php endif; ?>

        <?php if($column3) : ?>
          <div class="flex-1 flex flex-col items-center"">
            <img src="<?=$column3['icon']['sizes']['icon']?>" alt="<?=$column3['icon']['alt'];?>" />
            <?=$column3['description'];?>
          </div>
        <?php endif; ?>
        
      </div>
    </div>
  </section>

  <!-- Blog Highlights -->
  <section class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-6">
      <h3 class="text-2xl font-bold text-center mb-8">Real money talk for real people</h3>
      <div class="grid md:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="bg-white shadow rounded p-4">
          <img src="blog1.jpg" class="rounded mb-4" alt="">
          <h4 class="font-semibold mb-2">Creating Streamlined Safeguard Processes</h4>
          <a href="#" class="text-blue-600 underline">Readmore →</a>
        </div>
        <!-- Card 2 -->
        <div class="bg-white shadow rounded p-4">
          <img src="blog2.jpg" class="rounded mb-4" alt="">
          <h4 class="font-semibold mb-2">What are your safeguarding responsibilities?</h4>
          <a href="#" class="text-blue-600 underline">Readmore →</a>
        </div>
        <!-- Card 3 -->
        <div class="bg-white shadow rounded p-4">
          <img src="blog3.jpg" class="rounded mb-4" alt="">
          <h4 class="font-semibold mb-2">Revamping the Membership Model</h4>
          <a href="#" class="text-blue-600 underline">Readmore →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- About Preview -->
  <section class="py-12">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-8 px-6">
      <img src="your-about-image.jpg" class="w-full md:w-1/2 rounded shadow" alt="About Image">
      <div>
        <h3 class="text-2xl font-bold mb-2">About</h3>
        <p class="text-gray-600 mb-4">Blue Collar FIRE was built for the everyday worker sharing extraordinary goals...</p>
        <a href="#" class="text-blue-600 font-semibold underline">Read More</a>
      </div>
    </div>
  </section>

  <?php get_footer();?>