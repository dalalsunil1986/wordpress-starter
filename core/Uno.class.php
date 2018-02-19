<?php

namespace Uno;

/**
 * Setup the Uno master class. This includes all the basic
 * helper functions, files, and libraries the Uno theme needs.
 *
 * @package    Uno Free
 * @author     Calvin Koepke <hello@calvinkoepke.com>
 * @author     Rafal Tomal <rafal@rafaltomal.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html  GPL-3.0
 * @version    0.0.1
 * @link       https://github.com/cjkoepke/uno
 * @since      0.0.1
 */

class Uno {

	function __construct() {

	}

	/**
	 * Load the child theme constant library.
	 *
	 * @since 0.0.1
	 */
	public static function setup_theme_constants() {
		require_once( get_stylesheet_directory() . '/core/constants.php' );
	}

	/**
	 * Defines the autoloader for theme classes. If a class is not available,
	 * the autoloader will look in the root /classes/ folder for a file that
	 * corresponds with the class name being called. This allows you to call
	 * classes without having to import them.
	 *
	 * @since 0.0.1
	 */
	public static function register_class_autoloader() {
		spl_autoload_register( function( $class ) {
			$file = UNO_ROOT_PATH . "/classes/{$class}.class.php";
			if ( stream_resolve_include_path( $file ) ) {
				include $file;
			}
		} );
	}

	/**
	 * Recursively autoload the /src/ folder.
	 * This is convenient for breaking up functions into modules and folders,
	 * but be aware that each file is loaded as if it's contents were
	 * in this functions.php file.
	 *
	 * @since 0.0.1
	 */
	public static function autoload_src_folder() {
		require_once( UNO_CORE_PATH . '/file-autoloader.php' );
		autoload( UNO_ROOT_PATH . '/src' );
	}
}