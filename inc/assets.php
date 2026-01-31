<?php
/**
 * Enqueue scripts and styles
 *
 * @package Vendia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vendia_enqueue_assets() {

	wp_enqueue_style(
		'vendia-style',
		get_stylesheet_uri(),
		[],
		VENDIA_VERSION
	);

}
add_action( 'wp_enqueue_scripts', 'vendia_enqueue_assets' );
