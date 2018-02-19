<?php
/**
 * Add Genesis theme supports.
 *
 * @package    Uno Free
 * @author     Calvin Koepke <hello@calvinkoepke.com>
 * @author     Rafal Tomal <rafal@rafaltomal.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html  GPL-3.0
 * @version    0.0.1
 * @link       https://github.com/cjkoepke/uno
 * @since      0.0.1
 */

add_action( 'after_setup_theme', 'uno_setup_genesis' );
function uno_setup_genesis() {

	// Mobile viewport tag.
	add_theme_support( 'genesis-responsive-viewport' );

	// HTML5 markup.
	add_theme_support( 'html5',  [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	] );

	// Accessibility features.
	add_theme_support( 'genesis-accessibility', [
		'skip-links',
		'search-form',
		'drop-down-menu',
		'headings',
	] );

	// Enable after-entry widget area.
	add_theme_support( 'genesis-after-entry-widget-area' );

}
