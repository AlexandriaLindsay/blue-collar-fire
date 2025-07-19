<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bluecollarfire
 */

?>

	 <!-- Footer -->
	<footer class="bg-gray-800 text-white py-8">
		<div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-6">
		<div>
			<img class="!w-64" src="<?=get_stylesheet_directory_uri();?>/img/blue-collar-fire-logo-web.png" alt="Blue Collar Fire Logo">
			<p class="text-sm mt-2">Copyright © 2024</p>
		</div>
		<div>
			<h4 class="font-semibold mb-2">Company</h4>
			<ul class="space-y-1 text-sm">
			<li><a href="#" class="hover:underline">Home</a></li>
			<li><a href="#" class="hover:underline">About</a></li>
			<li><a href="#" class="hover:underline">Blog</a></li>
			</ul>
		</div>
		<div>
			<h4 class="font-semibold mb-2">Stay up to date</h4>
			<input type="email" placeholder="Your email" class="w-full p-2 rounded text-black">
		</div>
		</div>
	</footer>
</div><!-- #page -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<?php wp_footer(); ?>

</body>
</html>
