<?php

namespace Uno;

/**
 * Add styles to the Uno theme, dequeue the main style.css file.
 *
 * @package    Uno
 * @author     Calvin Koepke <hello@calvinkoepke.com>
 * @author     Rafal Tomal <rafal@rafaltomal.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html  GPL-3.0
 * @version    0.0.1
 * @link       https://github.com/cjkoepke/uno
 * @since      0.0.1
 */

add_action( 'wp_enqueue_scripts', 'load_styles' );
/**
 * Load compiled theme styles.
 *
 * @since 0.0.1
 */
function load_styles() {

	// Load additional styles here.

}