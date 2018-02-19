<?php

namespace Uno;

/**
 * Setup the Uno child theme.
 *
 * @package    Uno Free
 * @author     Calvin Koepke <hello@calvinkoepke.com>
 * @author     Rafal Tomal <rafal@rafaltomal.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html  GPL-3.0
 * @version    0.0.1
 * @link       https://github.com/cjkoepke/uno
 * @since      0.0.1
 */

/**
 * Make the main Uno class available before anything else.
 *
 * @since 0.0.1
 */
require_once( get_stylesheet_directory() . '/core/Uno.class.php' );

/**
 * Load the required child theme settings.
 *
 * @since 0.0.1
 */
Uno::setup_theme_settings();