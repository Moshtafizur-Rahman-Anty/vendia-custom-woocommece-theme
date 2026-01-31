<?php
/**
 * Footer template
 *
 * @package Vendia
 */
?>

<footer class="site-footer">
	<div class="site-footer-inner">

		<nav class="footer-navigation">
			<?php
			wp_nav_menu( [
				'theme_location' => 'footer',
				'menu_id'        => 'footer-menu',
				'container'      => false,
			] );
			?>
		</nav>

		<div class="site-info">
			<?php
			printf(
				/* translators: %s: WordPress */
				esc_html__( 'Proudly powered by %s', 'vendia' ),
				'WordPress'
			);
			?>
		</div>

	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
