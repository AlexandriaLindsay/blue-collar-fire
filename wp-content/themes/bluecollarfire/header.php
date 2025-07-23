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
	<link href="https://unpkg.com/aos@next/dist/aos.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'bluecollarfire' ); ?></a>

	 <!-- Header -->
	<header class="<?php echo (is_page('home')) ? 'bg-transparent' : 'bg-brand-primary sub-header' ?>">
	<div class="max-w-7xl mx-auto flex justify-between items-center py-4 px-6">
		<a href="<?=home_url();?>">
		<img class="w-56 h-auto" src="<?php echo (is_page('home')) ? get_stylesheet_directory_uri() . '/img/blue-collar-fire-logo-reverse-web.png' : get_stylesheet_directory_uri() . '/img/blue-collar-fire-logo-web.png'; ?>" alt="Blue Collar Fire Logo" />
		</a>

		<!-- Hamburger button - visible only on small screens -->
		<button id="nav-toggle" class="sm:hidden block text-white focus:outline-none" aria-label="Toggle menu">
		<!-- Simple hamburger icon -->
		<svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
		</svg>
		</button>

		<!-- Navigation links -->
		<nav id="primary-menu" class="hidden sm:flex space-x-6">
		<?php
			wp_nav_menu(array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu',
			'container'      => false,
			'menu_class'     => 'flex space-x-6',
			));
		?>
		</nav>
	</div>
	</header>
