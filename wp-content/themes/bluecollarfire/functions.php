<?php
/**
 * bluecollarfire functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bluecollarfire
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bluecollarfire_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on bluecollarfire, use a find and replace
		* to change 'bluecollarfire' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'bluecollarfire', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'bluecollarfire' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'bluecollarfire_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'bluecollarfire_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bluecollarfire_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bluecollarfire_content_width', 640 );
}
add_action( 'after_setup_theme', 'bluecollarfire_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bluecollarfire_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bluecollarfire' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bluecollarfire' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bluecollarfire_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bluecollarfire_scripts() {
	wp_enqueue_style( 'bluecollarfire-style', get_template_directory_uri() . '/css/main.min.css', array(), _S_VERSION );

	wp_enqueue_script( 'bluecollarfire-navigation', get_template_directory_uri() . '/js/main.min.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bluecollarfire_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// *** Remove unecessary menu items for all but Administrators ***
function remove_unecessary_menu_items() {
	$user = wp_get_current_user();
	if ( ! $user->has_cap( 'manage_options' ) ) {
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'tools.php' );
		remove_menu_page( 'profile.php' );
	}
}


// Custom Login Logo and Background
function custom_login_logo_and_bg() {
    ?>
    <style type="text/css">
        body.login {
            background-color: #263238;
        }

		.login #backtoblog a, .login #nav a {
			color: #fff;
		}

        .login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/blue-collar-fire-logo-reverse.svg');
            background-size: contain;
            width: 100%;
            height: 100px;
        }
    </style>
    <?php
}
add_action('login_head', 'custom_login_logo_and_bg');



/* Custom Backend Logo */
function admin_custom_logo() {?>
	<style type="text/css">
		#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/blue-collar-fire-badge.png');
			background-position: 0 0;
			color:rgba(0, 0, 0, 0);
			background-size: contain;
			background-repeat: no-repeat;
			width: 63px;
			background-repeat: no-repeat;
			display: block;
			height: 39px;
			top: -2px;
			left: 12px;
		}

		#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
			background-position: 0 0;
		}

		#wpadminbar #wp-admin-bar-wp-logo>.ab-item {
			padding: 0 46px;
			padding-right: 83px;
		}
	</style>
	<?php
}
add_action('wp_before_admin_bar_render', 'admin_custom_logo');


/* Site Favicon */
function custom_site_favicon() {
    $favicon_url = get_stylesheet_directory_uri() . '/img/blue-collar-fire-badge.png'; // Adjust the path if needed

    echo '<link rel="icon" href="' . esc_url($favicon_url) . '" type="image/x-icon" />';
    echo '<link rel="shortcut icon" href="' . esc_url($favicon_url) . '" type="image/x-icon" />';
}
add_action('wp_head', 'custom_site_favicon');        // Frontend
add_action('login_head', 'custom_site_favicon');     // Login page
add_action('admin_head', 'custom_site_favicon');     // Admin dashboard (optional)


/*** Remove Editor ***/
function remove_editor() {
	if (isset($_GET['post'])) {
			$id = $_GET['post'];
			$template = get_post_meta($id, '_wp_page_template', true);
			switch ($template) {
					case 'page-templates/home.php':
					case 'page-templates/about.php':
					case 'page-templates/blog-page.php':

					remove_post_type_support('page', 'editor');
					break;
					default :
					// Don't remove any other template.
					break;
			}
	}
}
add_action('init', 'remove_editor'); 

/**
 * Regsiter ACF Options Page
 */
// function acf_options_page_for_theme() {
// 	if( function_exists('acf_add_options_page') ) {
// 		acf_add_options_page();
// 		acf_set_options_page_title( __('Footer Settings') );
// 	}		
// }
// add_action('after_setup_theme', 'acf_options_page_for_theme'); 

/**
 * Image Cropping Sizes
 */
function image_cropping_sizes() {
	add_image_size('hero', 391, 407, true);
	add_image_size('icon', 65, 56, true);
	add_image_size('home-about', 561, 396, true);
}
add_action('after_setup_theme', 'image_cropping_sizes');



/**
 * Remove featured image for posts
 */
add_action('init', function () {
    remove_post_type_support('post', 'thumbnail'); // Change 'post' to your CPT slug if needed
});
