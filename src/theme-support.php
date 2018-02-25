<?php
/**
 * Add Genesis theme supports.
 *
 * @package    Uno
 * @author     Calvin Koepke <hello@calvinkoepke.com>
 * @author     Rafal Tomal <rafal@rafaltomal.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html  GPL-3.0
 * @version    0.0.1
 * @link       https://github.com/cjkoepke/uno
 * @since      0.0.1
 */

add_action( 'after_setup_theme', 'uno_theme_supports' );
/**
 * Setup the basic Genesis theme supports that every theme should have.
 * Allow Genesis to load first by hooking into after_setup_theme.
 *
 * @since 0.0.1
 */
function uno_theme_supports() {

	// Mobile viewport tag.
	add_theme_support( 'genesis-responsive-viewport' );

	// HTML5 markup.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Accessibility features.
	add_theme_support( 'genesis-accessibility', array(
		'skip-links',
		'search-form',
		'drop-down-menu',
		'headings',
	) );

}
