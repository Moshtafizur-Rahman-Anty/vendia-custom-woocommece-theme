<?php
/**
 * Template Name: Store Homepage
 *
 * Custom homepage template for displaying hero section, product listings,
 * featured product of the week, and customer reviews.
 *
 * @package Vendia
 * @since   1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main site-homepage">

	<?php
	/**
	 * ========================================
	 * HERO SECTION
	 * ========================================
	 */

	// Get hero background image from customizer.
	$hero_bg = get_theme_mod( 'home_hero_bg_image' );
	?>

	<section class="home-hero"
		<?php
		// Add inline background image style if set.
		if ( $hero_bg ) {
			echo 'style="background-image:url(' . esc_url( $hero_bg ) . ');"';
		}
		?>
	>
		<div class="home-hero-overlay"></div>

		<div class="home-hero-inner">
			<h1 class="home-hero-title">
				<?php
				echo esc_html(
					get_theme_mod(
						'home_hero_title',
						__( 'Quality Products for Everyday Life', 'vendia' )
					)
				);
				?>
			</h1>

			<p class="home-hero-subtitle">
				<?php
				echo esc_html(
					get_theme_mod(
						'home_hero_subtitle',
						__( 'Thoughtfully designed essentials crafted for comfort, durability, and style.', 'vendia' )
					)
				);
				?>
			</p>

			<a class="home-hero-button" href="<?php
				echo esc_url(
					get_theme_mod(
						'home_hero_button_url',
						function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' )
					)
				);
			?>">
				<?php
				echo esc_html(
					get_theme_mod(
						'home_hero_button_text',
						__( 'Shop the Collection', 'vendia' )
					)
				);
				?>
			</a>
		</div>
	</section>

	<?php
	/**
	 * ========================================
	 * SHOP PRODUCTS SECTION
	 * ========================================
	 */
	?>
	<section class="home-section home-products">
		<div class="section-inner">

			<h2 class="section-title">
				<?php
				echo esc_html(
					get_theme_mod(
						'vendia_products_title',
						__( 'Shop Our Products', 'vendia' )
					)
				);
				?>
			</h2>

			<div class="products-grid">
				<?php
				// Display WooCommerce products if available.
				if ( class_exists( 'WooCommerce' ) ) {
					$products_count = absint(
						get_theme_mod(
							'vendia_products_count',
							8
						)
					);

					echo do_shortcode( '[products limit="' . $products_count . '" columns="4"]' );
				}
				?>
			</div>

		</div>
	</section>

	<?php
	/**
	 * ========================================
	 * PRODUCT OF THE WEEK SECTION
	 * ========================================
	 */

	// Only display if WooCommerce is active and a product is selected.
	if ( class_exists( 'WooCommerce' ) ) :

		// Get featured product ID from customizer.
		$product_id = absint( get_theme_mod( 'vendia_product_of_week' ) );

		// Get product object if ID exists.
		$product = $product_id ? wc_get_product( $product_id ) : false;

		// Display section only if valid product exists.
		if ( $product && $product->is_type( 'simple' ) || $product->is_type( 'variable' ) ) :
			?>
			<section class="home-section home-product-week">
				<div class="section-inner product-week-inner">

					<div class="product-week-media">
						<?php echo wp_kses_post( $product->get_image() ); ?>
					</div>

					<div class="product-week-content">
						<h2 class="section-title">
							<?php esc_html_e( 'Product of the Week', 'vendia' ); ?>
						</h2>

						<h3 class="product-title">
							<?php echo esc_html( $product->get_name() ); ?>
						</h3>

						<div class="product-price">
							<?php echo wp_kses_post( $product->get_price_html() ); ?>
						</div>

						<?php
						// Display rating if product has reviews.
						$average_rating = $product->get_average_rating();
						if ( $average_rating > 0 ) :
							?>
							<div class="product-rating">
								<?php echo wp_kses_post( wc_get_rating_html( $average_rating ) ); ?>
							</div>
						<?php endif; ?>

						<a class="btn" href="<?php echo esc_url( $product->get_permalink() ); ?>">
							<?php esc_html_e( 'View Product', 'vendia' ); ?>
						</a>
					</div>

				</div>
			</section>
			<?php
		endif;
	endif;
	?>

	<?php
	/**
	 * ========================================
	 * FEATURED PRODUCTS SECTION
	 * ========================================
	 */
	?>
	<section class="home-section home-featured">
		<div class="section-inner">

			<h2 class="section-title">
				<?php
				echo esc_html(
					get_theme_mod(
						'vendia_featured_title',
						__( 'Featured Products', 'vendia' )
					)
				);
				?>
			</h2>

			<div class="products-grid">
				<?php
				// Display featured WooCommerce products if available.
				if ( class_exists( 'WooCommerce' ) ) {
					$featured_count = absint(
						get_theme_mod(
							'vendia_featured_count',
							4
						)
					);

					echo do_shortcode( '[featured_products limit="' . $featured_count . '"]' );
				}
				?>
			</div>

		</div>
	</section>

	<?php
	/**
	 * ========================================
	 * CUSTOMER REVIEWS SECTION
	 * ========================================
	 */

	// Only display if WooCommerce is active and reviews are enabled.
	if ( class_exists( 'WooCommerce' ) && get_theme_mod( 'vendia_reviews_enable', true ) ) :
		?>
		<section class="home-section home-reviews">
			<div class="section-inner">

				<h2 class="section-title">
					<?php
					echo esc_html(
						get_theme_mod(
							'vendia_reviews_title',
							__( 'What Our Customers Say', 'vendia' )
						)
					);
					?>
				</h2>

				<div class="reviews-grid">
					<?php
					// Get approved product reviews with rating >= 3.
					$reviews_count = absint(
						get_theme_mod(
							'vendia_reviews_count',
							3
						)
					);

					$reviews = get_comments(
						array(
							'number'     => $reviews_count,
							'status'     => 'approve',
							'post_type'  => 'product',
							'meta_key'   => 'rating', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
							'meta_query' => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query
								array(
									'key'     => 'rating',
									'value'   => '3',
									'compare' => '>=',
									'type'    => 'NUMERIC',
								),
							),
							'orderby'    => 'comment_date',
							'order'      => 'DESC',
						)
					);

					// Loop through each review.
					foreach ( $reviews as $review ) :

						// Get review rating.
						$rating = intval(
							get_comment_meta(
								$review->comment_ID,
								'rating',
								true
							)
						);

						// Get product and review permalink.
						$product_link = get_permalink( $review->comment_post_ID );
						$review_link  = $product_link . '#comment-' . $review->comment_ID;

						// Get reviewer name (default to comment author).
						$reviewer_name = $review->comment_author;

						// If registered user, try to get formatted name.
						if ( $review->user_id ) {
							$user = get_userdata( $review->user_id );

							if ( $user ) {
								$first_name = get_user_meta( $review->user_id, 'first_name', true );
								$last_name  = get_user_meta( $review->user_id, 'last_name', true );

								// Format as "FirstName L." if available.
								if ( $first_name ) {
									$reviewer_name = $first_name;

									if ( $last_name ) {
										$reviewer_name .= ' ' . substr( $last_name, 0, 1 ) . '.';
									}
								}
							}
						}
						?>
						<article class="review-card">
							<a href="<?php echo esc_url( $review_link ); ?>" class="review-link">
								<div class="review-rating">
									<?php echo wp_kses_post( wc_get_rating_html( $rating ) ); ?>
								</div>

								<p class="review-text">
									<?php
									echo esc_html(
										wp_trim_words(
											$review->comment_content,
											20
										)
									);
									?>
								</p>

								<span class="review-author">
									<?php echo esc_html( $reviewer_name ); ?>
								</span>
							</a>
						</article>
						<?php
					endforeach;
					?>
				</div>

			</div>
		</section>
	<?php endif; ?>

</main>

<?php
get_footer();