<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bluecollarfire
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found max-w-7xl mx-auto p-4 py-[15rem] text-center">
			<h1 class=" m-0 page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bluecollarfire' ); ?></h1>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
