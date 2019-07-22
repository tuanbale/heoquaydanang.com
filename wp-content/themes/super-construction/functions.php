<?php
/**
 * Super Construction functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Super_Construction
 */

// Load main file
require_once trailingslashit( get_stylesheet_directory() ) . '/includes/main.php';

// Load file to override functions of parent theme
require_once trailingslashit( get_stylesheet_directory() ) . '/includes/override.php';

// Enqueue scripts and styles
function super_construction_scripts() {

	wp_enqueue_style( 'super-construction-parent-style', get_template_directory_uri() . '/style.css' );

	wp_enqueue_script( 'super-construction-custom', get_stylesheet_directory_uri() . '/assets/js/sc-custom.js', array( 'jquery' ), '1.0.1', true );

}

add_action( 'wp_enqueue_scripts', 'super_construction_scripts' );

// Dequeue parent scripts and styles
function super_construction_dequeue_script() {

   wp_dequeue_script( 'business-point-custom' );

}
add_action( 'wp_print_scripts', 'super_construction_dequeue_script', 100 );

// After Theme setup functions.
function super_construction_setup() {

	remove_image_size( 'business-point-long' );
	add_image_size( 'super-construction-blog', 370, 255, true );

}

add_action( 'init', 'super_construction_setup' );

/* Turn on wide images */
add_theme_support( 'align-wide' );