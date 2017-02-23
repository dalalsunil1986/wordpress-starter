<?php
/*============================================
=            Begin Functions File            =
============================================*/

/**
 * Define Child Theme Constants
 *
 * @since 1.0.0
 */
define( 'CHILD_THEME_NAME', 'Calvin Koepke - v1' );
define( 'CHILD_THEME_AUTHOR', 'Calvin Koepke' );
define( 'CHILD_THEME_AUTHOR_URL', 'https://calvinkoepke.com/' );
define( 'CHILD_THEME_URL', 'https://github.com/cjkoepke/calvinkoepke-com/' );
define( 'CHILD_THEME_VERSION', '1.1.0' );
define( 'TEXT_DOMAIN', 'ck' );

// Start the engine.
include_once( get_template_directory() . '/lib/init.php');

// Add custom body classes.
include_once( get_stylesheet_directory() . '/lib/classes.php' );

// Setup default Genesis settings.
include_once( get_stylesheet_directory() . '/lib/genesis-setup.php' );

// Remove unused scripts.
include_once( get_stylesheet_directory() . '/lib/clean.php' );

// Register widget areas.
include_once( get_stylesheet_directory() . '/lib/widgets.php' );

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
 * Remove default scripts and styles and add new ones.
 *
 * @since 1.0.0
 */
function ck_load_assets() {

	// Remove default WP Scripts.
	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'wp-embed' );

	// Load theme JS.
	wp_enqueue_script( 'ck-fonts', '//use.typekit.net/xoo4gbo.js', array(), null );
	wp_enqueue_script( 'ck-theme-js', get_stylesheet_directory_uri() . '/build/js/theme.min.js', array(), CHILD_THEME_VERSION, true );

	// Load extra CSS.
	if ( is_front_page() ) {
		wp_enqueue_style( 'ck-home-styles', get_stylesheet_directory_uri() . '/build/css/front-page.min.css', array( 'calvin-koepke-v1' ), CHILD_THEME_VERSION );
	}

	// TypeKit fonts. Delete this or replace with your own kitId.
	wp_add_inline_script( 'ck-fonts', '(function(d) {
		var config = {
		  kitId: \'xoo4gbo\',
		  scriptTimeout: 3000,
		  async: true,
		  events: false,
		  classes: false
		},
		h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src=\'https://use.typekit.net/\'+config.kitId+\'.js\';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	})(document);' );

	// Localize menu settings.
	wp_localize_script(
		'ck-theme-js',
		'genesis_responsive_menu',
		ck_get_responsive_menu_settings()
	);

}

/**
 * Set up the responsive menu settings for the theme.
 *
 * @return array Array of settings.
 *
 * @since 1.0.0
 */
function ck_get_responsive_menu_settings() {

	$settings = array(
		'mainMenu'      => __( 'Menu', TEXT_DOMAIN ),
		'menuIconClass' => 'button',
		'menuClasses'   => array(
			'others' => array(
				'.nav-primary',
			)
		),
	);

	return $settings;

}

add_action( 'genesis_entry_content', 'ck_social_share' );
/**
 * Add sharing buttons and signup form to bottom of entry content.
 *
 * @since 1.0.0
 */
function ck_social_share() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	$url   = urlencode( get_the_permalink() );
	$title = urlencode( get_the_title() );

	$facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
	$twitter  = 'https://twitter.com/home?status=' . $title . '%3A%20' . $url . '%20via%20%40cjkoepke';

	if ( is_singular( 'post' ) ) {
		printf( '
			<div class="share-it">
				<a href="%s" target="_blank" class="button" alt="Share on Twitter">Share on Twitter</a>
				<a href="%s" target="_blank" alt="Share on Facebook" class="button">Share on Facebook</a>
				<a href="#" class="button button-primary show-popup">Get Updates</a>
			</div>
		', $twitter, $facebook );
	}

}

/**
 * Add search form to header.
 *
 * @since 1.0.0
 */
add_action( 'genesis_header', 'ck_do_search_form', 5 );
function ck_do_search_form() {

	echo '<div id="header-search">';
		get_search_form();
	echo '</div>';

}

add_action( 'genesis_before_footer', 'ck_add_overlay' );
/**
 * Add overlay div.
 *
 * @since 1.0.0
 */
function ck_add_overlay() {

	echo '<div id="site-overlay"></div>';

}

add_action( 'genesis_after', 'ck_widget_popup', 20 );
/**
 * Add widget area for popup.
 *
 * @since 1.0.0
 */
function ck_widget_popup() {

	echo '<div id="popup">';
		genesis_widget_area( 'popup' );
	echo '</div>';

}
