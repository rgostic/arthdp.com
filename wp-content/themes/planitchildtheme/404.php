<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" role="main">

	<section>

		<div class="container gutter pb-5">

			<div class="row">

				<div class="col-12 col-lg-10 offset-lg-1">

					<h1 class="entry-title"><?php _e( 'Page Not Found', 'twentytwenty' ); ?></h1>

					<div class="intro-text"><p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'twentytwenty' ); ?></p></div>

					<?php
					get_search_form(
						array(
							'label' => __( '404 not found', 'twentytwenty' ),
						)
					);
					?>

				</div>

			</div>

		</div>

	</section><!-- .section-inner -->

</main><!-- #site-content -->

<?php //get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
