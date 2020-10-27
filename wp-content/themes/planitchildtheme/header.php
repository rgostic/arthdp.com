<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */
global $page_id;
global $logo;

$page_id = get_the_ID();

// $logo_id = get_theme_mod( 'custom_logo' );
// $logo_image = wp_get_attachment_image_src( $logo_id , 'full' );
// $logo = file_get_contents(get_stylesheet_directory_uri().'/assets/images/svg/logo.svg');
?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>
        <?php
        if( class_exists('ACF') && get_field('gtm_head') ):
        the_field('gtm_head', 'option');
        endif;
        ?>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="stylesheet" href="https://use.typekit.net/uww8aju.css">
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>
    <?php
    if( class_exists('ACF') && get_field('gtm_body') ):
    the_field('gtm_body', 'option');
    endif;
    ?>

		<?php
		wp_body_open();
		?>

		<header id="masthead" class="site-header arrive arrive-fade_in arrive-move_in--down arrive-move_100 arrive-delay_1000 arrive-duration_2000<?php if(!is_front_page()) : ?> site-header__interior<?php endif; ?>" role="banner">

			<?php if ( has_nav_menu( 'main' ) ) : ?>
                <?php wp_nav_menu( array(
                'theme_location' => 'main',
                'menu_id'        => 'main-menu',
            ) ); ?>
            <?php endif; ?>

		</header><!-- #masthead -->

		<?php
		if(!is_front_page() && function_exists('yoast_breadcrumb')) :
		?>

		<div class="breadcrumbs container-fluid gutter">

			<div class="row">

				<div class="breadcrumbs-inner col-12 col-md-6">

					<?php yoast_breadcrumb( '<nav id="breadcrumbs">','</nav>' ); ?>

				</div>

			</div>

		</div>

		<?php
        endif;
		?>
		