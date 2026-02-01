<?php
/**
 * Theme setup functions
 *
 * @package Vendia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme supports and setup
 */
function vendia_theme_setup() {

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'woocommerce' );

	register_nav_menus( [
		'primary' => __( 'Primary Menu', 'vendia' ),
		'footer'  => __( 'Footer Menu', 'vendia' )

	] );

	load_theme_textdomain(
		'vendia',
		get_template_directory() . '/languages'
	);



}
add_action( 'after_setup_theme', 'vendia_theme_setup' );


function vendia_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', 'vendia_editor_styles' );

