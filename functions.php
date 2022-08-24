<?php

include_once( get_template_directory_uri(). '/inc/theme-functions/cpt-functions.php');
/**
 * darwinconsulting functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package darwinconsulting
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
function darwinconsulting_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on darwinconsulting, use a find and replace
		* to change 'darwinconsulting' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'darwinconsulting', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'darwinconsulting' ),
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
			'darwinconsulting_custom_background_args',
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
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'darwinconsulting_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function darwinconsulting_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'darwinconsulting_content_width', 640 );
}
add_action( 'after_setup_theme', 'darwinconsulting_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function darwinconsulting_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'darwinconsulting' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'darwinconsulting' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'darwinconsulting_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function darwinconsulting_scripts() {
	wp_enqueue_style( 'darwinconsulting-bootstrap-style', get_template_directory_uri(). '/assets/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'owl-style', get_template_directory_uri(). '/assets/css/owl.carousel.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'darwinconsulting-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'darwinconsulting-style', 'rtl', 'replace' );
	wp_enqueue_style( 'darwinconsulting-responsive-style', get_template_directory_uri(). '/assets/css/responsive.css', array(), _S_VERSION );
	wp_enqueue_style( 'darwinconsulting-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css', array(), _S_VERSION );
	wp_enqueue_script( 'darwinconsulting-jquery', get_template_directory_uri(). '/assets/js/jquery-3.6.0.min.js', array(), _S_VERSION, true);
	wp_enqueue_script( 'darwinconsulting-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'darwinconsulting-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'owl-script', get_template_directory_uri(). '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'darwinconsulting-js', get_template_directory_uri(). '/assets/js/darwinconsulting.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'darwinconsulting_scripts' );

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

/*
add_action( 'admin_menu', 'darwinconsulting_setup_page' );

function darwinconsulting_setup_page() {
	
	add_menu_page( 'Darwin Consulting Set Up', 'Theme Settings', 'administrator', 'theme-settings', 'settings_page' );
}

function settings_page() {
?>
<div class="wrap">
	<h1>Your Plugin Page Title</h1>
	<form method="post" action="options.php"> 
	<?php
	settings_fields( 'theme-options' );
	do_settings_sections( 'theme-options' );
	?>
	<table class="form-table">
        <tr valign="top">
        <th scope="row">Logo</th>
        <td>
			<input type="text" name="logo" value="<?php echo esc_attr( get_option('logo') ); ?>" />
		</td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Footer Style</th>
        <td><input type="text" name="footer_style" value="<?php echo esc_attr( get_option('footer_style') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Logo</th>
        <td><input type="text" name="header-style" value="<?php echo esc_attr( get_option('header-style') ); ?>" /></td>
        </tr>
    </table>
	<?php
	submit_button();
	?>
	</form>
</div>
<?php
}

add_action( 'admin_init', 'register_theme_settings' );

function register_theme_settings() {
	
	register_setting( 'theme-options', 'new_option_name' );
	register_setting( 'theme-options', 'some_other_option' );
	register_setting( 'theme-options', 'option_etc' );
}

*/

add_action( 'init', 'testimonial_post_type' );

function testimonial_post_type() {
      
	$labels = array(
		'name'                => _x( 'Testimonials', 'Post Type General Name', 'darwinconsulting' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'darwinconsulting' ),
		'menu_name'           => __( 'Testimonials', 'darwinconsulting' ),
		'parent_item_colon'   => __( 'Parent Testimonial', 'darwinconsulting' ),
		'all_items'           => __( 'All Testimonials', 'darwinconsulting' ),
		'view_item'           => __( 'View Testimonial', 'darwinconsulting' ),
		'add_new_item'        => __( 'Add New Testimonial', 'darwinconsulting' ),
		'add_new'             => __( 'Add New', 'darwinconsulting' ),
		'edit_item'           => __( 'Edit Testimonial', 'darwinconsulting' ),
		'update_item'         => __( 'Update Testimonial', 'darwinconsulting' ),
		'search_items'        => __( 'Search Testimonial', 'darwinconsulting' ),
		'not_found'           => __( 'Not Found', 'darwinconsulting' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'darwinconsulting' ),
	);
	
	$args = array(
		'label'               => __( 'Testimonials', 'darwinconsulting' ),
		'description'         => __( 'Testimonial news and reviews', 'darwinconsulting' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ), 
		'taxonomies'          => array( 'genres' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
	);

	register_post_type( 'testimonials', $args );  
}

