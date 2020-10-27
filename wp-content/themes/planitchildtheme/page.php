<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();

// $page_id = get_the_ID();
?>

<main id="site-content" class="page">

	<section>

		<?php

		/* Start the Loop */
		while ( have_posts() ) : the_post();

			the_content();

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) {
			// 	comments_template();
			// }

		endwhile; // End of the loop.
		?>

	</section>

</main>

<?php
get_footer();
