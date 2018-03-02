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
