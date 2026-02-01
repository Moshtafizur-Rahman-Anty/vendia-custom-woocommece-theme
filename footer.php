<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 * Displays footer navigation menu and site credits.
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

	<footer id="colophon" class="site-footer">
		<div class="site-footer-inner">

			<?php
			// Check if footer menu has been assigned.
			if ( has_nav_menu( 'footer' ) ) :
				?>
				<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'vendia' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu_id'        => 'footer-menu',
							'menu_class'     => 'footer-menu',
							'container'      => false,
							'depth'          => 1,
							'fallback_cb'    => false,
						)
					);
					?>
				</nav>
			<?php endif; ?>

			<div class="site-info">
				<?php
				/**
				 * Display site credits and copyright information.
				 * 
				 * Developers can use the 'vendia_footer_credits' filter
				 * to customize the footer credits text.
				 */
				$footer_text = sprintf(
					/* translators: 1: Current year, 2: Site name, 3: WordPress */
					esc_html__( '&copy; %1$s %2$s. Proudly powered by %3$s.', 'vendia' ),
					date_i18n( 'Y' ),
					get_bloginfo( 'name' ),
					'<a href="' . esc_url( __( 'https://wordpress.org/', 'vendia' ) ) . '">WordPress</a>'
				);

				/**
				 * Filter the footer credits text.
				 *
				 * @since 1.0.0
				 *
				 * @param string $footer_text The footer credits HTML.
				 */
				echo wp_kses_post( apply_filters( 'vendia_footer_credits', $footer_text ) );
				?>
			</div>

		</div><!-- .site-footer-inner -->
	</footer><!-- #colophon -->

<?php
/**
 * Fires before the closing body tag.
 * 
 * This hook is used by WordPress and plugins to inject
 * scripts and other content before the closing body tag.
 */
wp_footer();
?>

</body>
</html>