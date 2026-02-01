<?php
/**
 * Enqueue Scripts and Styles
 *
 * Handles the registration and enqueuing of all theme stylesheets and scripts
 * for the front-end of the website.
 *
 * @package Vendia
 * @since   1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue theme styles and scripts.
 *
 * Registers and enqueues the main theme stylesheet and any additional
 * JavaScript files needed for the front-end functionality.
 *
 * @since 1.0.0
 *
 * @return void
 */
function vendia_enqueue_assets() {

	// Enqueue main theme stylesheet.
	wp_enqueue_style(
		'vendia-style',
		get_stylesheet_uri(),
		array(),
		VENDIA_VERSION,
		'all'
	);

	// Enqueue theme style inline for better performance (optional).
	wp_style_add_data( 'vendia-style', 'rtl', 'replace' );

}
add_action( 'wp_enqueue_scripts', 'vendia_enqueue_assets' );