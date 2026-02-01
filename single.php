<?php
/**
 * Template for displaying single posts
 *
 * @package Vendia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content/content', get_post_type() );

		// COMMENTS SUPPORT
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

	endwhile;
	?>

</main>

<?php
get_footer();
