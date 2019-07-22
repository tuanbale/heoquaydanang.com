<?php
/**
 * Demo configuration
 *
 * @package Super_Construction
 */

$config = array(
	'static_page'    => 'home',
	'posts_page'     => 'blog',
	'menu_locations' => array(
		'top'  	  => 'top-menu',
		'primary' => 'main-menu',
		'social'  => 'social-menu',
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Theme Demo Content', 'super-construction' ),
			'local_import_file'            => trailingslashit( get_stylesheet_directory() ) . 'includes/demo/demo-content/content.xml',
			'local_import_widget_file'     => trailingslashit( get_stylesheet_directory() ) . 'includes/demo/demo-content/widget.wie',
			'local_import_customizer_file' => trailingslashit( get_stylesheet_directory() ) . 'includes/demo/demo-content/customizer.dat',
		),
	),
);

Super_Construction_Demo::init( apply_filters( 'super_construction_demo_filter', $config ) );