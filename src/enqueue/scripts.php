<?php
/**
 * Add scripts to the Uno child theme.
 *
 * @package    Uno
 * @author     Calvin Koepke <hello@calvinkoepke.com>
 * @author     Rafal Tomal <rafal@rafaltomal.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html  GPL-3.0
 * @version    0.0.1
 * @link       https://github.com/cjkoepke/uno
 * @since      0.0.1
 */

add_action( 'wp_enqueue_scripts', 'uno_load_scripts' );
/**
 * Load compiled theme scripts.
 *
 * @since 0.0.1
 */
function uno_load_scripts() {

	$ext = defined( SCRIPT_DEBUG ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_script( 'google-webfont', '//ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js', [], null, true );
	wp_enqueue_script( 'theme', CHILD_ROOT_URL . '/dist/js/theme' . $ext . '.js', ['google-webfont'], CHILD_THEME_VERSION, true );

}