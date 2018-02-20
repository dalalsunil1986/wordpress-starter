<?php
/**
 * Add styles to the Uno theme, dequeue the main style.css file.
 *
 * @package    Uno Free
 * @author     Calvin Koepke <hello@calvinkoepke.com>
 * @author     Rafal Tomal <rafal@rafaltomal.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html  GPL-3.0
 * @version    0.0.1
 * @link       https://github.com/cjkoepke/uno
 * @since      0.0.1
 */

add_action( 'wp_enqueue_scripts', 'uno_load_styles' );
/**
 * Load compiled theme styles.
 *
 * @since 0.0.1
 */
function uno_load_styles() {

	// Main theme styles.
	wp_enqueue_style( 'uno-theme', CHILD_CSS_URL . "/theme.min.css", [], CHILD_THEME_VERSION );

}

add_action( 'wp_enqueue_scripts', 'uno_remove_default_styles' );
/**
 * Remove the default stylesheet from enqueuing. This lets us control
 * how the styles are loaded, and avoids an extra HTTP request for an empty style.css.
 *
 * @since 0.0.1
 */
function uno_remove_default_styles() {

	$handle = CHILD_THEME_HANDLE ? CHILD_THEME_HANDLE : 'child-theme';
	wp_dequeue_style( $handle );

}