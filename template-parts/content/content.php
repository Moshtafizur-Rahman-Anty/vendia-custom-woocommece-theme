<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vendia
 * @since   1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
		// Display post thumbnail if it exists.
		if ( has_post_thumbnail() ) :
			?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php
					the_post_thumbnail(
						'large',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
					?>
				</a>
			</div><!-- .post-thumbnail -->
		<?php endif; ?>

		<?php
		// Display post title.
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				/**
				 * Display post date.
				 */
				vendia_posted_on();

				/**
				 * Display post author.
				 */
				vendia_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		// Display excerpt on archive pages, full content on single posts.
		if ( is_singular() ) :
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Post title. */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'vendia' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			// Display page links for paginated posts.
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vendia' ),
					'after'  => '</div>',
				)
			);
		else :
			the_excerpt();
		endif;
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		/**
		 * Display post categories and tags.
		 */
		if ( 'post' === get_post_type() ) :
			vendia_entry_footer();
		endif;
		?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->