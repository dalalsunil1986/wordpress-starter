<?php

namespace Uno;

/**
 * Setup the Uno child theme constants.
 *
 * @package    Uno Free
 * @author     Calvin Koepke <hello@calvinkoepke.com>
 * @author     Rafal Tomal <rafal@rafaltomal.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html  GPL-3.0
 * @version    0.0.1
 * @link       https://github.com/cjkoepke/uno
 * @since      0.0.1
 */

$theme = wp_get_theme();

// Paths.
define( 'UNO_ROOT_PATH',       $theme->get_stylesheet_directory() );
define( 'UNO_ROOT_URL',        $theme->get_stylesheet_directory() );

define( 'UNO_CORE_PATH',       UNO_ROOT_PATH . '/core'            );
define( 'UNO_CORE_URL',        UNO_ROOT_URL . '/core'             );

define( 'UNO_VENDOR_PATH',     UNO_ROOT_PATH . '/vendor'          );
define( 'UNO_VENDOR_URL',      UNO_ROOT_URL . '/vendor'           );

// Theme information.
define( 'UNO_THEME_NAME',      $theme->get('Name')                );
define( 'UNO_THEME_URL',       $theme->get('ThemeURI')            );
define( 'UNO_THEME_VERSION',   $theme->get('Version')             );
define( 'UNO_THEME_AUTHORS',   $theme->get('Author')              );
define( 'UNO_THEME_HANDLE',    strtolower( UNO_THEME_NAME )       );

// Compatibility.
define( 'CHILD_THEME_NAME',    $theme->get('Name')                );
define( 'CHILD_THEME_VERSION', $theme->get('Version')             );
