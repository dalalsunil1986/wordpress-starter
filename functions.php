<?php
/**
 * Define Child Theme Constants
 *
 * @since 1.0.0
 */
define( 'CHILD_THEME_NAME', 'Calvin Koepke' );
define( 'CHILD_THEME_AUTHOR', 'Calvin Koepke' );
define( 'CHILD_THEME_AUTHOR_URL', 'https://calvinkoepke.com/' );
define( 'CHILD_THEME_URL', 'https://github.com/cjkoepke/calvinkoepke-com/' );
define( 'CHILD_THEME_VERSION', '2.0.0' );

/**
 *
 * Start the engine
 *
 * @since 1.0.0
 *
 */
include_once( get_template_directory() . '/lib/init.php');

/**
 * Set the content width.
 *
 * @since 1.0.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 740;
}

add_action( 'wp_enqueue_scripts', 'ck_load_assets' );
/**
 * Load files in the /assets/ directory
 *
 * @since 2.0.0
 */
function ck_load_assets() {

	// Clean up default WP Scripts.
	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'wp-embed' );
	wp_deregister_script( 'skip-links' );

	// Load theme JS.
	wp_enqueue_script( 'ck-global-js', get_stylesheet_directory_uri() . '/build/js/global.min.js', array(), CHILD_THEME_VERSION, true );

}

/**
 * Async header scripts.
 *
 * @since 2.0.0
 */
// add_filter( 'script_loader_tag', 'ck_async_scripts', 10, 2 );
function ck_async_scripts( $tag, $handle ) {
	if ( 'ck-global-js' === $handle || 'ck-prism-js' === $handle ) {
		$tag = str_replace( 'src=', 'async="async" src=', $tag );
	}
	return $tag;
}

/**
 * Add theme supports
 *
 * @since 1.0.0
 */
add_theme_support( 'genesis-responsive-viewport' ); /* Enable Viewport Meta Tag for Mobile Devices */
add_theme_support( 'html5',  array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) ); /* HTML5 */
add_theme_support( 'genesis-accessibility', array( 'skip-links', 'search-form', 'drop-down-menu', 'headings' ) ); /* Accessibility */
add_theme_support( 'genesis-structural-wraps', array() );

/**
 * Apply custom body classes.
 *
 * @since 1.0.0
 * @uses /lib/classes.php
 */
include_once( get_stylesheet_directory() . '/lib/classes.php' );

/**
 * Apply Genesis setup functions (overrides default Genesis settings).
 *
 * @since 2.0.0
 * @uses /lib/genesis-setup.php
 */
include_once( get_stylesheet_directory() . '/lib/genesis-setup.php' );

/**
 * Apply default attributes.
 *
 * @since 1.0.0
 * @uses /lib/attributes.php
 */
include_once( get_stylesheet_directory() . '/lib/attributes.php' );

/**
 * Clean up unused scripts/styles.
 *
 * @since 1.0.0
 * @uses /lib/clean.php
 */
include_once( get_stylesheet_directory() . '/lib/clean.php' );
