<?php

/**
 * Load custom Woo styles and only load if it's a WooCommerce page.
 * @since 1.0.0
 */
add_filter( 'woocommerce_enqueue_styles', 'logic_modify_woo_styles' );
function logic_modify_woo_styles( $styles ) {

	$styles['logic-woo-styles'] = array();

	if ( ! is_woocommerce() ) {
		foreach( $styles as $handle => $args ) {
			unset( $styles[$handle] );
		}
	} else {
		return $styles;
	}

}

/**
 * Clean up unused scripts.
 *
 * @since 1.0.0
 */
add_action( 'init', 'logic_remove_scripts' );
function logic_remove_scripts() {

	// Emojis.
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
