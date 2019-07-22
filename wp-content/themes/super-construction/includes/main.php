<?php
/**
 * Super Construction functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Super_Construction
 */

// Override and add new widgets.
require_once trailingslashit( get_stylesheet_directory() ) . '/includes/widgets/widgets.php';

// Custom header for this theme.
require_once trailingslashit( get_stylesheet_directory() ) . '/includes/custom-header.php';

if ( is_admin() ) {
	// Load about.
	require_once trailingslashit( get_stylesheet_directory() ) . 'includes/theme-info/class-about.php';
	require_once trailingslashit( get_stylesheet_directory() ) . 'includes/theme-info/about.php';

	// Load demo.
	require_once trailingslashit( get_stylesheet_directory() ) . 'includes/demo/class-demo.php';
	require_once trailingslashit( get_stylesheet_directory() ) . 'includes/demo/demo.php';
}