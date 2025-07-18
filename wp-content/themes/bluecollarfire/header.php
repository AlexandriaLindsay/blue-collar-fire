<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bluecollarfire
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'bluecollarfire' ); ?></a>

	 <!-- Header -->
	<header class="bg-brand-primary shadow-md">
		<div class="max-w-7xl mx-auto flex justify-between items-center py-4 px-6">
			<a href="<?=home_url();?>"><img class="w-56 h-auto" src="<?=get_stylesheet_directory_uri();?>/img/blue-collar-fire-logo-web.png" alt="Blue Collar Fire Logo" /></a>
			<nav class="space-x-6">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
				?>
			</nav>
		</div>
	</header>