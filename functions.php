<?php
/**
 * Limberlost functions and definitions
 *
 * @package Limberlost
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'limberlost_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function limberlost_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Limberlost, use a find and replace
	 * to change 'Limberlost' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'limberlost', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'limberlost' ),
		'mobile' => __( 'Mobile Menu', 'limberlost' ),
		'supporting' => __( 'Supporting Menu', 'limberlost' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
}
endif; // limberlost_setup
add_action( 'after_setup_theme', 'limberlost_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function limberlost_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'limberlost' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'limberlost_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function limberlost_scripts() {
	wp_enqueue_style( 'limberlost-style', get_stylesheet_directory_uri() . '/css/style.css', false, filemtime(get_stylesheet_directory() . '/css/style.css') );

	wp_enqueue_script( 'limberlost-site-scripts', get_template_directory_uri() . '/js/site-scripts.js', array(), '20130115', true );

	wp_enqueue_script( 'limberlost-jQuery', '//code.jquery.com/ui/1.11.4/jquery-ui.js', false, true );

	wp_enqueue_script( 'limberlost-pictureFill', get_template_directory_uri() . '/js/pictureFill.js', array(), '20130115', true );

	wp_enqueue_script( 'limberlost-matchHeight', get_template_directory_uri() . '/js/matchHeight.min.js', array(), '20130115', true );

	wp_enqueue_script( 'limberlost-slick', get_template_directory_uri() . '/js/slick.min.js', array(), '20130115', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'limberlost_scripts' );

/**
 * Get Custom Post Types
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Declare Woocommerce support
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_image_size( 'portal-mobile', '480', '300', 'true' );
add_image_size( 'portal-tablet', '768', '576', 'true' );
add_image_size( 'portal-desktop', '1280', '960', 'true' );
add_image_size( 'portal-retina', '2400', '1800', 'true' );

add_image_size( 'banner-mobile', '480', '80', 'true' );
add_image_size( 'banner-desktop', '1280', '210', 'true' );
add_image_size( 'banner-retina', '2400', '400', 'true' );


// Remove Woo styling
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Disable reviews on products
add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
 unset($tabs['reviews']);
 return $tabs;
}

// Allow SVG upload
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Limberlost Logo on login
function custom_login_logo() {
	echo '<style type="text/css">
	.login h1 a {
		background-image: url('.get_bloginfo('template_directory').'/images/limberlost_login_logo.png) !important;
		background-size: 150px !important;
		height: 150px;
		width: 150px !important;
	}
	</style>';
}
add_action('login_head', 'custom_login_logo');

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Adventures off the beaten path.';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

// add taxoonomy term to body_class
function wpprogrammer_custom_taxonomy_in_body_class( $classes ){
  if( is_singular() )
  {
    $custom_terms = get_the_terms(0, 'product_cat');
    if ($custom_terms) {
      foreach ($custom_terms as $custom_term) {
        $classes[] = 'custom-tax-' . $custom_term->slug;
      }
    }
  }
  return $classes;
}

add_filter( 'body_class', 'wpprogrammer_custom_taxonomy_in_body_class' );
