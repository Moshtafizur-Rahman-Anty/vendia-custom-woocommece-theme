<?php
/**
 * WooCommerce compatibility
 *
 * @package Vendia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vendia_woocommerce_setup() {

	add_theme_support( 'woocommerce' );

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'vendia_woocommerce_setup' );


/**
 * Shop loop product wrapper start
 */
function vendia_product_card_open() {
	echo '<div class="vendia-product-card">';
}
add_action(
	'woocommerce_before_shop_loop_item',
	'vendia_product_card_open',
	5
);

/**
 * Shop loop product wrapper end
 */
function vendia_product_card_close() {
	echo '</div>';
}
add_action(
	'woocommerce_after_shop_loop_item',
	'vendia_product_card_close',
	20
);


remove_action(
	'woocommerce_after_shop_loop_item_title',
	'woocommerce_template_loop_rating',
	5
);


remove_action(
	'woocommerce_single_product_summary',
	'woocommerce_template_single_price',
	10
);

add_action(
	'woocommerce_single_product_summary',
	'woocommerce_template_single_price',
	25
);



remove_action(
	'woocommerce_single_product_summary',
	'woocommerce_template_single_meta',
	40
);


/**
 * Single product wrapper start
 */
function vendia_single_product_wrap_open() {
	echo '<div class="vendia-single-product">';
}
add_action(
	'woocommerce_before_single_product',
	'vendia_single_product_wrap_open',
	5
);

/**
 * Single product wrapper end
 */
function vendia_single_product_wrap_close() {
	echo '</div>';
}
add_action(
	'woocommerce_after_single_product',
	'vendia_single_product_wrap_close',
	5
);


add_filter(
	'woocommerce_checkout_fields',
	function ( $fields ) {
		foreach ( $fields as $section => $section_fields ) {
			foreach ( $section_fields as $key => $field ) {
				$fields[ $section ][ $key ]['class'][] = 'vendia-field';
			}
		}
		return $fields;
	}
);

