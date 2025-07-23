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
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
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

    <!-- Hamburger button -->
    <button id="nav-toggle" class="hover:cursor-pointer sm:hidden block text-brand-secondary text-2xl" aria-label="Toggle menu">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Nav -->
<nav id="primary-menu" class="fixed top-0 left-0 w-full h-full bg-brand-secondary transform translate-x-full transition-transform duration-300 ease-in-out z-40 
  flex-col space-y-6 sm:translate-x-0 sm:relative sm:flex sm:flex-row sm:space-y-0 sm:space-x-6 sm:bg-transparent sm:h-auto sm:top-auto sm:left-auto sm:w-auto">      <?php
        wp_nav_menu(array(
          'theme_location' => 'menu-1',
          'container'      => false,
          'menu_class'     => 'flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6',
        ));
      ?>
    </nav>
  </div>
</header>
