<?php
/**
 * WooCommerce Compatibility
 *
 * Configures WooCommerce integration and customizations for the Vendia theme.
 * Includes theme support declarations, product gallery features, layout modifications,
 * and custom styling hooks.
 *
 * @package Vendia
 * @since   1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Setup WooCommerce theme support and features.
 *
 * Declares WooCommerce compatibility and enables product gallery features
 * including zoom, lightbox, and slider functionality.
 *
 * @since 1.0.0
 *
 * @return void
 */
function vendia_woocommerce_setup() {

	// Declare WooCommerce support.
	add_theme_support( 'woocommerce' );

	// Enable product gallery zoom feature.
	add_theme_support( 'wc-product-gallery-zoom' );

	// Enable product gallery lightbox feature.
	add_theme_support( 'wc-product-gallery-lightbox' );

	// Enable product gallery slider feature.
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'vendia_woocommerce_setup' );

/**
 * ========================================
 * SHOP LOOP CUSTOMIZATIONS
 * ========================================
 */

/**
 * Open product card wrapper in shop loop.
 *
 * Adds a custom wrapper div around each product in the shop loop
 * for enhanced styling and layout control.
 *
 * @since 1.0.0
 *
 * @return void
 */
function vendia_product_card_open() {
	echo '<div class="vendia-product-card">';
}
add_action( 'woocommerce_before_shop_loop_item', 'vendia_product_card_open', 5 );

/**
 * Close product card wrapper in shop loop.
 *
 * Closes the custom wrapper div around each product in the shop loop.
 *
 * @since 1.0.0
 *
 * @return void
 */
function vendia_product_card_close() {
	echo '</div>';
}
add_action( 'woocommerce_after_shop_loop_item', 'vendia_product_card_close', 20 );

/**
 * Remove product rating from shop loop.
 *
 * Removes the default star rating display from product listings
 * in the shop loop for a cleaner appearance.
 *
 * @since 1.0.0
 */
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

/**
 * ========================================
 * SINGLE PRODUCT CUSTOMIZATIONS
 * ========================================
 */

/**
 * Remove default price position from single product page.
 *
 * Removes the price from its default position (priority 10) so it can
 * be repositioned later in the product summary.
 *
 * @since 1.0.0
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

/**
 * Reposition price on single product page.
 *
 * Moves the product price to display after the add to cart button
 * (priority 25) for better visual hierarchy.
 *
 * @since 1.0.0
 */
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );

/**
 * Remove product meta from single product page.
 *
 * Removes the product meta information (SKU, categories, tags)
 * from the single product page.
 *
 * @since 1.0.0
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/**
 * Open single product wrapper.
 *
 * Adds a custom wrapper div around the entire single product
 * for enhanced styling and layout control.
 *
 * @since 1.0.0
 *
 * @return void
 */
function vendia_single_product_wrap_open() {
	echo '<div class="vendia-single-product">';
}
add_action( 'woocommerce_before_single_product', 'vendia_single_product_wrap_open', 5 );

/**
 * Close single product wrapper.
 *
 * Closes the custom wrapper div around the single product.
 *
 * @since 1.0.0
 *
 * @return void
 */
function vendia_single_product_wrap_close() {
	echo '</div>';
}
add_action( 'woocommerce_after_single_product', 'vendia_single_product_wrap_close', 5 );

/**
 * ========================================
 * CHECKOUT CUSTOMIZATIONS
 * ========================================
 */

/**
 * Add custom class to checkout fields.
 *
 * Adds 'vendia-field' class to all checkout form fields for
 * consistent styling across the checkout page.
 *
 * @since 1.0.0
 *
 * @param array $fields Checkout fields array.
 * @return array Modified checkout fields array.
 */
function vendia_customize_checkout_fields( $fields ) {

	// Loop through each section of checkout fields.
	foreach ( $fields as $section => $section_fields ) {

		// Loop through each field in the section.
		foreach ( $section_fields as $key => $field ) {

			// Add custom class to the field.
			$fields[ $section ][ $key ]['class'][] = 'vendia-field';
		}
	}

	return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'vendia_customize_checkout_fields' );