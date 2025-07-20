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
		<div class="max-w-7xl mx-auto px-6 flex">
		<div class="flex flex-1/3 flex-col">
			<img class="!w-64" src="<?=get_stylesheet_directory_uri();?>/img/blue-collar-fire-logo-web.png" alt="Blue Collar Fire Logo">
			<p class="text-sm mt-2 mb-4">Copyright &copy; <?=date('Y');?> Blue Collar Fire</p>
		</div>
		<div class="flex flex-2 flex-col">
			<h4 class="font-semibold">Company</h4>
			<ul class="space-y-1 text-sm leading-8">
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Blog</a></li>
			</ul>
		</div>
		<div class="flex flex-2 flex-col">
			<h4 class="font-semibold">Support</h4>
			<ul class="space-y-1 text-sm leading-8">
			<li><a href="#">Contact Us</a></li>
			<li><a href="#">Terms of Service</a></li>
			</ul>
		</div>
		<div class="flex flex-2 flex-col">
			<h4 class="font-semibold mb-2">Stay up to date</h4>
			<?=do_shortcode('[newsletter_form]');?>
		</div>
		</div>
	</footer>
</div><!-- #page -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<?php wp_footer(); ?>

</body>
</html>
