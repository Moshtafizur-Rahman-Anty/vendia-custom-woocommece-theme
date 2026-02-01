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

	// Add RTL support for the main stylesheet.
	wp_style_add_data( 'vendia-style', 'rtl', 'replace' );

	// Enqueue main theme JavaScript (if you have a main.js file).
	// wp_enqueue_script(
	// 	'vendia-scripts',
	// 	get_template_directory_uri() . '/assets/js/main.js',
	// 	array( 'jquery' ),
	// 	VENDIA_VERSION,
	// 	true
	// );

	// Enqueue comment reply script on singular posts/pages with comments open.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'vendia_enqueue_assets' );