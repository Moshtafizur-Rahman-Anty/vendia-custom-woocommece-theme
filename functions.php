<?php
/**
 * Vendia functions and definitions
 *
 * @package Vendia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define constants
define( 'VENDIA_VERSION', '1.0.0' );
define( 'VENDIA_DIR', get_template_directory() );
define( 'VENDIA_URI', get_template_directory_uri() );

// Include core files
require_once VENDIA_DIR . '/inc/setup.php';
require_once VENDIA_DIR . '/inc/assets.php';
require_once VENDIA_DIR . '/inc/accessibility.php';
require_once VENDIA_DIR . '/inc/woocommerce.php';
