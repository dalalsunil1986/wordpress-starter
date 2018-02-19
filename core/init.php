<?php

namespace Uno;

/**
 * Instantiate the main Uno class before anything else.
 *
 * @since 0.0.1
 */
require_once( get_stylesheet_directory() . '/core/Uno.class.php' );

/**
 * Setup the child theme.
 */
Uno::setup_theme_constants();
Uno::register_class_autoloader();
Uno::autoload_src_folder();