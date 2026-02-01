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

add_theme_support( 'html5', array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption',
	'style',
	'script',
) );


add_theme_support( 'wp-block-styles' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'align-wide' );

add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );



	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'woocommerce' );

	add_theme_support( 'wp-block-styles' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'align-wide' );
add_theme_support( 'html5', array(
	'comment-form',
	'comment-list',
	'gallery',
	'caption',
) );


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
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'vendia_editor_styles' );

function vendia_register_sidebars() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'vendia' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar area', 'vendia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vendia_register_sidebars' );


