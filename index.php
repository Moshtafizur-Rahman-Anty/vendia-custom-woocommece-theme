<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and is required
 * for the theme to work. It is used to display a page when nothing more specific
 * matches a query. For example, it puts together the home page when no home.php exists.
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

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			// Check if we're on the blog page.
			if ( is_home() && ! is_front_page() ) :
				?>
				<header class="page-header">
					<h1 class="page-title">
						<?php single_post_title(); ?>
					</h1>
				</header>
				<?php
			endif;

			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				/**
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content/content', get_post_type() );

			endwhile;

			/**
			 * Display pagination if there are multiple pages.
			 */
			the_posts_pagination(
				array(
					'mid_size'           => 2,
					'prev_text'          => __( 'Previous', 'vendia' ),
					'next_text'          => __( 'Next', 'vendia' ),
					'screen_reader_text' => __( 'Posts navigation', 'vendia' ),
				)
			);

		else :

			/**
			 * Display no content message.
			 * 
			 * If no content, include the "No posts found" template.
			 */
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>

	</main><!-- #primary-content -->

	<?php
	/**
	 * Display sidebar if it exists and has widgets.
	 */
	if ( is_active_sidebar( 'sidebar-1' ) ) :
		get_sidebar();
	endif;
	?>

<?php
get_footer();