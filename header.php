<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the main content area.
 * Contains the site logo/title, primary navigation, and mobile menu toggle.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vendia
 * @since   1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php
	/**
	 * Fires in the head tag.
	 * 
	 * This hook is used by WordPress and plugins to inject
	 * styles, scripts, meta tags, and other content into the head.
	 */
	wp_head();
	?>
</head>

<body <?php body_class(); ?>>

<?php
/**
 * Fires after the opening body tag.
 * 
 * This hook allows plugins and child themes to inject content
 * immediately after the opening body tag.
 *
 * @since WordPress 5.2.0
 */
wp_body_open();
?>

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#primary-content">
		<?php esc_html_e( 'Skip to content', 'vendia' ); ?>
	</a>

	<header id="masthead" class="site-header">
		<div class="site-header-inner">

			<div class="site-branding">
				<?php
				// Display custom logo if set, otherwise show site title.
				if ( has_custom_logo() ) :
					the_custom_logo();
				else :
					?>
					<div class="site-title-wrap">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>

						<?php
						$vendia_description = get_bloginfo( 'description', 'display' );
						if ( $vendia_description || is_customize_preview() ) :
							?>
							<p class="site-description">
								<?php echo esc_html( $vendia_description ); ?>
							</p>
						<?php endif; ?>
					</div>
					<?php
				endif;
				?>
			</div><!-- .site-branding -->

			<?php
			// Check if primary menu has been assigned.
			if ( has_nav_menu( 'primary' ) ) :
				?>
				<nav id="site-navigation" class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'vendia' ); ?>">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span class="menu-toggle-icon" aria-hidden="true"></span>
						<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'vendia' ); ?></span>
					</button>

					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'primary-menu',
							'container'      => false,
							'fallback_cb'    => false,
						)
					);
					?>
				</nav><!-- #site-navigation -->
			<?php endif; ?>

			<?php
			/**
			 * Display WooCommerce cart icon if WooCommerce is active.
			 */
			if ( class_exists( 'WooCommerce' ) ) :
				?>
				<div class="header-cart">
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-link" aria-label="<?php esc_attr_e( 'View shopping cart', 'vendia' ); ?>">
						<span class="cart-icon" aria-hidden="true">
<svg viewBox="0 0 24 24" width="40" height="40" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M6 6H22L20 14H8L6 6Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
	<path d="M6 6L4 2H1" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
	<circle cx="9" cy="20" r="1.5" fill="currentColor"/>
	<circle cx="18" cy="20" r="1.5" fill="currentColor"/>
							</svg>
						</span>
						<?php
						$cart_count = WC()->cart->get_cart_contents_count();
						if ( $cart_count > 0 ) :
							?>
							<span class="cart-count"><?php echo esc_html( $cart_count ); ?></span>
						<?php endif; ?>
					</a>
				</div><!-- .header-cart -->
			<?php endif; ?>

		</div><!-- .site-header-inner -->
	</header><!-- #masthead -->