<?php
class ThemeFunctions {

	public function __construct() {
		add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts_styles']);
		// add_action('wp_head',[$this,'addAjaxUrl']);
	}

	public function enqueue_scripts_styles() {
		//wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

    	$version = '1.0.0';

		// jquery
		wp_deregister_script('jquery'); 
		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), '3.4.1', false); // 3.4.1 - 2.2.4

		// jquery mobile JS
		// wp_enqueue_script('jquery-mobile', 'https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js', array(), '1.4.5', false);

		// // jquery mobile CSS
		// wp_register_style('jquery-css-min', 'https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css', array(), '1.4.5');
		// wp_enqueue_style('jquery-css-min');

		// touchswipe
		// wp_enqueue_script( 'touchswipe', get_stylesheet_directory_uri() . '/assets/scripts/jquery.touchSwipe.min.js', array(), $version, true );

		// jquery-ui
		// wp_enqueue_script( 'jquery-ui', get_stylesheet_directory_uri() . '/assets/scripts/jquery-ui.min.js', array(), $version, true );

		// arrive JS
		// wp_enqueue_script( 'arrive-js-min', get_stylesheet_directory_uri() . '/assets/scripts/arrive.min.js', array(), $version, true );

		// arrive CSS
		// wp_register_style( 'arrive-css-min', get_stylesheet_directory_uri() . '/assets/styles/arrive.min.css', array(), $version );
		// wp_enqueue_style('arrive-css-min');

		// slick
		// wp_enqueue_script( 'slick-min', get_stylesheet_directory_uri() . '/assets/scripts/slick.min.js', array(), $version, true );

		// Slick CSS
		// wp_register_style('css-slickslider', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', [], '1.9.0');
		// wp_enqueue_style('css-slickslider');

		// inLarge
		// wp_enqueue_script( 'inLarge-min', get_stylesheet_directory_uri() . '/assets/scripts/inLarge.min.js', array(), $version, true );

		// touch punch
		// wp_enqueue_script( 'touch-punch', '//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js', array(), '1.0.1', true );

    	// Compiled SCSS
		wp_register_style( 'css-main', get_stylesheet_directory_uri() . '/assets/styles/main.bundle.css', array(), $version );
		wp_enqueue_style('css-main');
		

    // Compiled JS
  	wp_enqueue_script( 'scripts-min', get_stylesheet_directory_uri() . '/assets/scripts/main.bundle.js', array(), $version, true );
	}

	// public function addAjaxUrl() {
	    
	// }
}

$ThemeFunctions = new ThemeFunctions();

// dequeue twentytwenty scripts
function dequeue_parent_style() {

  wp_dequeue_style( 'twentytwenty-style' );
  wp_deregister_style( 'twentytwenty-style' );

}
add_action( 'wp_enqueue_scripts', 'dequeue_parent_style', 20 );


/**
 * Sets up theme defaults and registers support for various WordPress features
 * in admin editors
 */
function add_editor_styles() {
  // Add support for editor styles.
  add_theme_support( 'editor-styles' );

  // Enqueue editor styles.
  add_editor_style( get_stylesheet_directory_uri() . '/assets/styles/main.bundle.css' );
}
add_action( 'after_setup_theme', 'add_editor_styles' );