<?php
/**
 * Vendia Theme Functions and Definitions
 *
 * Sets up the theme and provides helper functions. This is the main entry point
 * for the theme and loads all necessary files and configurations.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vendia
 * @since   1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define theme constants.
 *
 * These constants are used throughout the theme for versioning,
 * file paths, and URIs.
 */

// Theme version for cache busting.
if ( ! defined( 'VENDIA_VERSION' ) ) {
	define( 'VENDIA_VERSION', '1.0.0' );
}

// Theme directory path.
if ( ! defined( 'VENDIA_DIR' ) ) {
	define( 'VENDIA_DIR', get_template_directory() );
}

// Theme directory URI.
if ( ! defined( 'VENDIA_URI' ) ) {
	define( 'VENDIA_URI', get_template_directory_uri() );
}

/**
 * ========================================
 * INCLUDE CORE THEME FILES
 * ========================================
 * 
 * Load required theme files in the proper order.
 * Each file handles a specific aspect of theme functionality.
 */

// Theme setup and configuration.
require_once VENDIA_DIR . '/inc/setup.php';

// Enqueue scripts and styles.
require_once VENDIA_DIR . '/inc/assets.php';

// Accessibility features.
require_once VENDIA_DIR . '/inc/accessibility.php';

// WooCommerce integration and customizations.
if ( class_exists( 'WooCommerce' ) ) {
	require_once VENDIA_DIR . '/inc/woocommerce.php';
}

// Customizer settings and controls.
require_once VENDIA_DIR . '/inc/customizer/homepage.php';

/**
 * Load Jetpack compatibility file if Jetpack is active.
 *
 * @since 1.0.0
 */
if ( class_exists( 'Jetpack' ) ) {
	require_once VENDIA_DIR . '/inc/jetpack.php';
}

/**
 * Theme helper functions.
 *
 * Load additional helper functions if they exist.
 *
 * @since 1.0.0
 */
if ( file_exists( VENDIA_DIR . '/inc/template-functions.php' ) ) {
	require_once VENDIA_DIR . '/inc/template-functions.php';
}

/**
 * Custom template tags for this theme.
 *
 * Load template tag functions if they exist.
 *
 * @since 1.0.0
 */
if ( file_exists( VENDIA_DIR . '/inc/template-tags.php' ) ) {
	require_once VENDIA_DIR . '/inc/template-tags.php';
}