<?php
/**
 * Theme setup
 *
 * @package Vendia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vendia_setup() {

	load_theme_textdomain( 'vendia', VENDIA_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'script',
		'style',
	] );

	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

	register_nav_menus( [
		'primary' => __( 'Primary Menu', 'vendia' ),
		'footer'  => __( 'Footer Menu', 'vendia' ),
	] );
}
add_action( 'after_setup_theme', 'vendia_setup' );

add_theme_support( 'editor-styles' );

add_editor_style( 'editor-style.css' );
