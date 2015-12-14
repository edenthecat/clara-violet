<?php

/**
 * Clara Violet functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package Clara Violet
 * @since 0.1.0
 */

// Useful global constants
define( 'CV_VERSION',      '0.1.0' );
define( 'CV_URL',          get_stylesheet_directory_uri() );
define( 'CV_TEMPLATE_URL', get_template_directory_uri() );
define( 'CV_PATH',         get_template_directory() . '/' );
define( 'CV_INC',          CV_PATH . 'includes/' );

// Include compartmentalized functions
require_once CV_INC . 'functions/core.php';

// Include lib classes

// Run the setup functions
if ( ! function_exists( 'cv_setup' ) ) :

function cv_setup() {
	TenUp\Clara_Violet\Core\setup();

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu',	'cv'),
		'social'  => __( 'Social Links Menu', 'cv'),
		'home_categories' => __( 'Front Page Categories', 'cv'),
		'home_links' => __('Front Page Links', 'cv'),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
}
endif; // cv_setup

add_action( 'after_setup_theme', 'cv_setup' );

add_action( 'after_setup_theme', 'widget_support' );
function widget_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'gigpress' );
    add_theme_support( 'recent-posts-widget-extended' ); 
}

// img unautoa
function img_unautop($pee) {
    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<div class="figure">$1</div>', $pee);
    return $pee;
}
add_filter( 'the_content', 'img_unautop', 30 );

function wpb_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );  
    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {
	register_sidebar( array(
		'name'          => 'Home Left Section',
		'id'            => 'home_left',
		'before_widget' => '<div class="home_left">',
		'after_widget'  => '</div> <!-- .home_left -->',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Home Right Section',
		'id'            => 'home_right',
		'before_widget' => '<div class="home_right">',
		'after_widget'  => '</div> <!-- #home_right -->',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );


}
add_action( 'widgets_init', 'arphabet_widgets_init' );
