<?php
/**
*    Template Name: Home
*/
get_header();
?>

 <!-- Hero Section -->
  <section class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto text-center px-6">
      <h2 class="text-4xl font-bold text-gray-800 mb-4">Financial <span class="text-blue-600">insights</span> and <span class="text-blue-400">lessons</span> on the path to FIRE</h2>
      <p class="text-gray-600 mb-6">Actionable advice, tools, and tips to help you learn, explore, thrive, and grow.</p>
      <button class="bg-blue-600 text-white px-6 py-3 rounded shadow hover:bg-blue-700">Explore the Blog</button>
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

  <!-- Audiences -->
  <section class="py-12">
    <div class="max-w-7xl mx-auto px-6 text-center">
      <h3 class="text-xl font-bold mb-6">Helping working-class families build wealth</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
          <h4 class="font-bold text-lg">9-to-5 Workers</h4>
          <p class="text-sm text-gray-600">Work hard. Build wealth. Retire with dignity.</p>
        </div>
        <div>
          <h4 class="font-bold text-lg">Families on a Budget</h4>
          <p class="text-sm text-gray-600">Stretch every dollar while investing in your future.</p>
        </div>
        <div>
          <h4 class="font-bold text-lg">Dreamers Seeking FIRE</h4>
          <p class="text-sm text-gray-600">Unlock the path to financial independence early.</p>
        </div>
      </div>
    </div>
  </section>

  <?php get_footer();?>