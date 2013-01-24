<?php
/**
 * dhornbein functions and definitions
 *
 * @package dhornbein
 * @since dhornbein 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since dhornbein 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 1400; /* pixels */

/**
 * enable post thumbnails
 *
 * @since dhornbein 1.0
 */

add_theme_support( 'post-thumbnails' ); 

if ( ! function_exists( 'dhornbein_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since dhornbein 1.0
 */
function dhornbein_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on dhornbein, use a find and replace
	 * to change 'dhornbein' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'dhornbein', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'dhornbein' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status', 'chat' ) );
}
endif; // dhornbein_setup
add_action( 'after_setup_theme', 'dhornbein_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since dhornbein 1.0
 */
function dhornbein_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'dhornbein' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}

add_action( 'widgets_init', 'dhornbein_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function dhornbein_scripts() {
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/framework/foundation.css' );
	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/framework/foundation.css', 'normalize' );
	wp_enqueue_style( 'icons', get_template_directory_uri() . '/css/font-awesome.css', 'foundation' );
	wp_enqueue_style( 'style', get_stylesheet_uri(), 'foundation' );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'dhornbein_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );
