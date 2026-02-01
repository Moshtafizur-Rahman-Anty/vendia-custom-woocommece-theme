<?php
/**
 * Homepage Customizer Settings
 *
 * Registers customizer controls for the homepage sections including
 * hero, products, product of the week, and customer reviews.
 *
 * @package Vendia
 * @since   1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register homepage customizer settings and controls.
 *
 * This function adds a customizer panel for homepage settings and registers
 * sections for hero, products, featured product, and reviews with their
 * respective settings and controls.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function vendia_homepage_customizer( $wp_customize ) {

	/**
	 * ========================================
	 * HOMEPAGE PANEL
	 * ========================================
	 */
	$wp_customize->add_panel(
		'vendia_homepage',
		array(
			'title'       => __( 'Homepage Settings', 'vendia' ),
			'description' => __( 'Customize the appearance and content of your homepage.', 'vendia' ),
			'priority'    => 30,
		)
	);

	/**
	 * ========================================
	 * HERO SECTION
	 * ========================================
	 */
	
	// Add Hero Section.
	$wp_customize->add_section(
		'vendia_home_hero',
		array(
			'title'       => __( 'Hero Section', 'vendia' ),
			'description' => __( 'Configure the hero banner displayed at the top of your homepage.', 'vendia' ),
			'panel'       => 'vendia_homepage',
			'priority'    => 10,
		)
	);

	// Hero Title Setting.
	$wp_customize->add_setting(
		'home_hero_title',
		array(
			'default'           => __( 'Quality Products for Everyday Life', 'vendia' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	// Hero Title Control.
	$wp_customize->add_control(
		'home_hero_title',
		array(
			'label'       => __( 'Hero Title', 'vendia' ),
			'description' => __( 'Enter the main headline for your hero section.', 'vendia' ),
			'section'     => 'vendia_home_hero',
			'type'        => 'text',
			'priority'    => 10,
		)
	);

	// Hero Subtitle Setting.
	$wp_customize->add_setting(
		'home_hero_subtitle',
		array(
			'default'           => __( 'Thoughtfully designed essentials built for modern living.', 'vendia' ),
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'refresh',
		)
	);

	// Hero Subtitle Control.
	$wp_customize->add_control(
		'home_hero_subtitle',
		array(
			'label'       => __( 'Hero Subtitle', 'vendia' ),
			'description' => __( 'Enter a supporting subtitle or tagline.', 'vendia' ),
			'section'     => 'vendia_home_hero',
			'type'        => 'textarea',
			'priority'    => 20,
		)
	);

	// Hero Button Text Setting.
	$wp_customize->add_setting(
		'home_hero_button_text',
		array(
			'default'           => __( 'Shop Collection', 'vendia' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	// Hero Button Text Control.
	$wp_customize->add_control(
		'home_hero_button_text',
		array(
			'label'       => __( 'Hero Button Text', 'vendia' ),
			'description' => __( 'Enter the text for the call-to-action button.', 'vendia' ),
			'section'     => 'vendia_home_hero',
			'type'        => 'text',
			'priority'    => 30,
		)
	);

	// Get shop URL, fallback to home if WooCommerce isn't active.
	$shop_url = function_exists( 'wc_get_page_permalink' )
		? wc_get_page_permalink( 'shop' )
		: home_url( '/' );

	// Hero Button URL Setting.
	$wp_customize->add_setting(
		'home_hero_button_url',
		array(
			'default'           => $shop_url,
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);

	// Hero Button URL Control.
	$wp_customize->add_control(
		'home_hero_button_url',
		array(
			'label'       => __( 'Hero Button URL', 'vendia' ),
			'description' => __( 'Enter the destination URL for the button.', 'vendia' ),
			'section'     => 'vendia_home_hero',
			'type'        => 'url',
			'priority'    => 40,
		)
	);

	// Hero Background Image Setting.
	$wp_customize->add_setting(
		'home_hero_bg_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);

	// Hero Background Image Control.
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'home_hero_bg_image',
			array(
				'label'       => __( 'Hero Background Image', 'vendia' ),
				'description' => __( 'Upload a background image for the hero section.', 'vendia' ),
				'section'     => 'vendia_home_hero',
				'priority'    => 50,
			)
		)
	);

	/**
	 * ========================================
	 * SHOP PRODUCTS SECTION
	 * ========================================
	 */
	
	// Add Products Section.
	$wp_customize->add_section(
		'vendia_products_section',
		array(
			'title'       => __( 'Homepage Products', 'vendia' ),
			'description' => __( 'Configure the products displayed on your homepage.', 'vendia' ),
			'panel'       => 'vendia_homepage',
			'priority'    => 20,
		)
	);

	// Products Section Title Setting.
	$wp_customize->add_setting(
		'vendia_products_title',
		array(
			'default'           => __( 'Shop Our Products', 'vendia' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	// Products Section Title Control.
	$wp_customize->add_control(
		'vendia_products_title',
		array(
			'label'       => __( 'Section Title', 'vendia' ),
			'description' => __( 'Enter the heading for the products section.', 'vendia' ),
			'section'     => 'vendia_products_section',
			'type'        => 'text',
			'priority'    => 10,
		)
	);

	// Products Count Setting.
	$wp_customize->add_setting(
		'vendia_products_count',
		array(
			'default'           => 8,
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);

	// Products Count Control.
	$wp_customize->add_control(
		'vendia_products_count',
		array(
			'label'       => __( 'Number of Products', 'vendia' ),
			'description' => __( 'Select how many products to display (4-12).', 'vendia' ),
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 4,
				'max'  => 12,
				'step' => 1,
			),
			'section'     => 'vendia_products_section',
			'priority'    => 20,
		)
	);

	/**
	 * ========================================
	 * PRODUCT OF THE WEEK SECTION
	 * ========================================
	 */
	
	// Add Product of the Week Section.
	$wp_customize->add_section(
		'vendia_product_week_section',
		array(
			'title'       => __( 'Product of the Week', 'vendia' ),
			'description' => __( 'Feature a special product on your homepage.', 'vendia' ),
			'panel'       => 'vendia_homepage',
			'priority'    => 30,
		)
	);

	// Featured Product ID Setting.
	$wp_customize->add_setting(
		'vendia_product_of_week',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);

	// Featured Product ID Control.
	$wp_customize->add_control(
		'vendia_product_of_week',
		array(
			'label'       => __( 'Product ID', 'vendia' ),
			'description' => __( 'Enter an existing WooCommerce product ID to feature.', 'vendia' ),
			'type'        => 'number',
			'section'     => 'vendia_product_week_section',
			'priority'    => 10,
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
			),
		)
	);

	/**
	 * ========================================
	 * CUSTOMER REVIEWS SECTION
	 * ========================================
	 */
	
	// Add Customer Reviews Section.
	$wp_customize->add_section(
		'vendia_reviews_section',
		array(
			'title'       => __( 'Customer Reviews', 'vendia' ),
			'description' => __( 'Configure the customer reviews section on your homepage.', 'vendia' ),
			'panel'       => 'vendia_homepage',
			'priority'    => 40,
		)
	);

	// Enable Reviews Setting.
	$wp_customize->add_setting(
		'vendia_reviews_enable',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);

	// Enable Reviews Control.
	$wp_customize->add_control(
		'vendia_reviews_enable',
		array(
			'type'        => 'checkbox',
			'label'       => __( 'Enable Reviews Section', 'vendia' ),
			'description' => __( 'Check to display customer reviews on the homepage.', 'vendia' ),
			'section'     => 'vendia_reviews_section',
			'priority'    => 10,
		)
	);

	// Reviews Section Title Setting.
	$wp_customize->add_setting(
		'vendia_reviews_title',
		array(
			'default'           => __( 'What Our Customers Say', 'vendia' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	// Reviews Section Title Control.
	$wp_customize->add_control(
		'vendia_reviews_title',
		array(
			'label'       => __( 'Section Title', 'vendia' ),
			'description' => __( 'Enter the heading for the reviews section.', 'vendia' ),
			'section'     => 'vendia_reviews_section',
			'type'        => 'text',
			'priority'    => 20,
		)
	);

	// Reviews Count Setting.
	$wp_customize->add_setting(
		'vendia_reviews_count',
		array(
			'default'           => 3,
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);

	// Reviews Count Control.
	$wp_customize->add_control(
		'vendia_reviews_count',
		array(
			'label'       => __( 'Number of Reviews', 'vendia' ),
			'description' => __( 'Select how many reviews to display (1-6).', 'vendia' ),
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 1,
				'max'  => 6,
				'step' => 1,
			),
			'section'     => 'vendia_reviews_section',
			'priority'    => 30,
		)
	);
}
add_action( 'customize_register', 'vendia_homepage_customizer' );