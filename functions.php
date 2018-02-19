<?php

namespace Uno;

/**
 * The main functions.php file for the Uno Genesis child theme. This file is
 * not intended to have anything other than the instantiation of the Uno class.
 * All other setup files for your child theme should be added to the /src/ folder,
 * which will autoload everything in it.
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
 * Import the main Uno class dependency.
 *
 * @since 0.0.1
 */
require_once( get_stylesheet_directory() . '/vendor/uno/uno-package/Uno.class.php' );

/**
 * Instantiate the class to enable the development workflow. You can also call
 * Uno::init() statically to achieve the same result, without instantiation.
 *
 * @since 0.0.1
 */
$uno = new Uno();