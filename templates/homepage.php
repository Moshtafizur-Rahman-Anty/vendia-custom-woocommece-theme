<?php
/**
 * Template Name: Store Homepage
 *
 * @package Vendia
 */

get_header();
?>

<main id="primary" class="site-main site-homepage">

	<!-- Hero / Intro -->
	<section class="home-hero">
		<h1 class="home-title"><?php bloginfo( 'name' ); ?></h1>
		<p class="home-description"><?php bloginfo( 'description' ); ?></p>
	</section>

	<!-- Featured Products -->
	<section class="home-section home-featured">
		<h2><?php esc_html_e( 'Featured Products', 'vendia' ); ?></h2>
		<?php
		echo do_shortcode(
			'[featured_products limit="4" columns="4"]'
		);
		?>
	</section>

	<!-- New Arrivals -->
	<section class="home-section home-latest">
		<h2><?php esc_html_e( 'New Arrivals', 'vendia' ); ?></h2>
		<?php
		echo do_shortcode(
			'[products limit="8" columns="4" orderby="date"]'
		);
		?>
	</section>

	<!-- Best Sellers -->
	<section class="home-section home-best-sellers">
		<h2><?php esc_html_e( 'Best Sellers', 'vendia' ); ?></h2>
		<?php
		echo do_shortcode(
			'[best_selling_products limit="6" columns="3"]'
		);
		?>
	</section>

	<!-- Category Highlight (example: hoodies) -->
	<section class="home-section home-category">
		<h2><?php esc_html_e( 'Shop Hoodies', 'vendia' ); ?></h2>
		<?php
		echo do_shortcode(
			'[product_category category="hoodies" limit="4" columns="4"]'
		);
		?>
	</section>

</main>

<?php
get_footer();
