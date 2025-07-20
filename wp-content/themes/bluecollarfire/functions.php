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
	wp_enqueue_style( 'bluecollarfire-style', get_template_directory_uri() . '/dist/css/app.min.css', array(), _S_VERSION );

	wp_enqueue_script( 'bluecollarfire-js', get_template_directory_uri() . '/dist/js/app.min.js', array(), _S_VERSION, true );

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
            background-color: #303841;
        }

		.login #backtoblog a, .login #nav a {
			color: #fff;
		}  
		
		.login h1 {
			height: 70px;
		}

        .login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/blue-collar-fire-logo-web.png');
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
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png');
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
    $favicon_url = get_stylesheet_directory_uri() . '/img/favicon.png'; // Adjust the path if needed

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
 * Remove featured image
 */
function remove_featured_image_support() {
    // Get all registered post types
    foreach (get_post_types() as $post_type) {
        remove_post_type_support($post_type, 'thumbnail');
    }
}
add_action('init', 'remove_featured_image_support');


/**
 * Disable gutenburg for single post types
 */
function disable_gutenberg_for_posts() {
    remove_post_type_support('post', 'editor');
}
add_action('init', 'disable_gutenberg_for_posts');


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
	add_image_size('hero', 1250, 1250, true);
	add_image_size('icon', 90, 80, true);
	add_image_size('thumbnail-post', 368, 286, true);
	add_image_size('post', 875, 423, true);
	add_image_size('home-about', 561, 396, true);
}
add_action('after_setup_theme', 'image_cropping_sizes');

/**
 * Auto add ALT text on images
 */
function auto_set_image_alt_text($post_ID) {
    $post = get_post($post_ID);

    // Only apply to images
    if ($post->post_type === 'attachment' && strpos($post->post_mime_type, 'image/') === 0) {
        $alt_text = get_post_meta($post_ID, '_wp_attachment_image_alt', true);

        if (empty($alt_text)) {
            // Use the image title (or filename) as alt text
            $image_title = $post->post_title;

            // Clean up the title (e.g., replace dashes with spaces)
            $image_title = ucwords(str_replace(['-', '_'], ' ', $image_title));

            // Set alt text
            update_post_meta($post_ID, '_wp_attachment_image_alt', $image_title);
        }
    }
}
add_action('add_attachment', 'auto_set_image_alt_text');


/**
 * Duplicate posts and pages
 */
function duplicate_post_link($actions, $post) {
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url(
            admin_url('admin.php?action=duplicate_post_as_draft&post=' . $post->ID),
            basename(__FILE__),
            'duplicate_nonce'
        ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
    }
    return $actions;
}
add_filter('post_row_actions', 'duplicate_post_link', 10, 2);
add_filter('page_row_actions', 'duplicate_post_link', 10, 2);

function duplicate_post_as_draft() {
    if (
        !isset($_GET['post']) ||
        !isset($_GET['duplicate_nonce']) ||
        !wp_verify_nonce($_GET['duplicate_nonce'], basename(__FILE__))
    ) {
        wp_die('Unauthorized action.');
    }

    $post_id = absint($_GET['post']);
    $post = get_post($post_id);

    if (!$post) {
        wp_die('Post not found.');
    }

    $new_post_args = [
        'post_title'     => $post->post_title . ' (Copy)',
        'post_content'   => $post->post_content,
        'post_status'    => 'draft',
        'post_type'      => $post->post_type,
        'post_author'    => get_current_user_id(),
        'post_excerpt'   => $post->post_excerpt,
        'post_category'  => wp_get_post_categories($post_id),
        'post_parent'    => $post->post_parent,
        'menu_order'     => $post->menu_order,
        'comment_status' => $post->comment_status,
        'ping_status'    => $post->ping_status,
    ];

    $new_post_id = wp_insert_post($new_post_args);

    // Copy custom fields
    $meta = get_post_meta($post_id);
    foreach ($meta as $key => $values) {
        foreach ($values as $value) {
            update_post_meta($new_post_id, $key, maybe_unserialize($value));
        }
    }

    // Redirect to edit screen
    wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
    exit;
}
add_action('admin_action_duplicate_post_as_draft', 'duplicate_post_as_draft');


/**
 * Custom toolbar to add colors for WYSIWYG editor
 */
function custom_acf_wysiwyg_toolbars($toolbars) {
    // Add a custom toolbar
    $toolbars['Custom'] = array();
    $toolbars['Custom'][1] = array(
        'formatselect', 'bold', 'italic', 'underline', 'bullist', 'numlist',
        'blockquote', 'alignleft', 'aligncenter', 'alignright', 'link', 'unlink',
        'forecolor', 'backcolor', 'removeformat'
    );

    return $toolbars;
}
add_filter('acf/fields/wysiwyg/toolbars', 'custom_acf_wysiwyg_toolbars');



// 1. Category Filter Widget
class Blog_Filter_Widget extends WP_Widget {
  function __construct() {
    parent::__construct(
      'blog_filter_widget',
      __('Blog Filter (AJAX)', 'textdomain'),
      ['description' => __('AJAX blog post filter by category', 'textdomain')]
    );
  }

  public function widget($args, $instance) {
    echo $args['before_widget'];
    ?>
    <form id="blog-filter" class="p-4 bg-gray-100 rounded space-y-2">
      <h3 class="text-lg font-bold mb-2">Filter by Category</h3>
      <div>
        <label>
          <input type="radio" name="category" value="" checked> All Categories
        </label>
      </div>
      <?php
      $categories = get_categories();
      foreach ($categories as $cat) {
        echo '<div>
                <label>
                  <input type="radio" name="category" value="' . esc_attr($cat->term_id) . '"> ' . esc_html($cat->name) . '
                </label>
              </div>';
      }
      ?>
    </form>
    <?php
    echo $args['after_widget'];
  }
}
function register_blog_filter_widget() {
  register_widget('Blog_Filter_Widget');
}
add_action('widgets_init', 'register_blog_filter_widget');


// 2. Search Widget
class Blog_Search_Widget extends WP_Widget {
  function __construct() {
    parent::__construct(
      'blog_search_widget',
      __('Blog Search (AJAX)', 'textdomain'),
      ['description' => __('AJAX live blog post search form', 'textdomain')]
    );
  }

  public function widget($args, $instance) {
    echo $args['before_widget'];
    ?>
    <form id="blog-search" class="mb-6" role="search" method="get" action="">
      <label for="search-input" class="sr-only">Search Posts</label>
      <input
        type="search"
        id="search-input"
        name="search"
        placeholder="Search blog posts..."
        class="w-full p-2 border rounded"
        autocomplete="off"
      />
    </form>
    <?php
    echo $args['after_widget'];
  }
}
function register_blog_search_widget() {
  register_widget('Blog_Search_Widget');
}
add_action('widgets_init', 'register_blog_search_widget');


// 3. Enqueue JS + localize ajax_url
function enqueue_blog_filter_search_scripts() {
    wp_enqueue_script(
        'blog-filter-search',
        get_template_directory_uri() . '/js/app.js',
        ['jquery'],
        null,
        true
    );

    wp_localize_script('blog-filter-search', 'blogfilter', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
}
add_action('wp_enqueue_scripts', 'enqueue_blog_filter_search_scripts');


// 4. AJAX handler for filtering posts
function ajax_filter_blog_posts() {
  $args = [
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
  ];

  if (!empty($_POST['category'])) {
    $args['cat'] = intval($_POST['category']);
  }

  if (!empty($_POST['search'])) {
    $args['s'] = sanitize_text_field($_POST['search']);
  }

  $query = new WP_Query($args);

  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post(); ?>
      <article class="mb-8">
        <h2 class="text-xl font-bold">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
      </article>
    <?php endwhile;
    wp_reset_postdata();
  else :
    echo '<p>No posts found.</p>';
  endif;

  wp_die();
}
add_action('wp_ajax_filter_blog_posts', 'ajax_filter_blog_posts');
add_action('wp_ajax_nopriv_filter_blog_posts', 'ajax_filter_blog_posts');
