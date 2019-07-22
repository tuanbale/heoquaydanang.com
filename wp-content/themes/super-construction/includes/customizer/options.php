<?php
/**
 * Options.
 *
 * @package Super_Construction
 */

$slider_number = 5;

for ( $i = 1; $i <= $slider_number; $i++ ) {

	//Slide Details
	$wp_customize->add_setting('slide_'.$i.'_info', 
		array(
			'sanitize_callback' => 'esc_attr',            
		)
	);

	$wp_customize->add_control( 
		new Super_Construction_Info( 
			$wp_customize, 
			'slide_'.$i.'_info', 
			array(
				'label' 			=> esc_html__( 'Slide ', 'super-construction' ) . ' - ' . $i,
				'section' 			=> 'section_slider',
				'priority' 			=> 100,
				'active_callback' 	=> 'business_point_is_featured_slider_active',
			) 
		)
	);

	$wp_customize->add_setting( "slider_page_$i",
		array(
			'sanitize_callback' => 'business_point_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control( "slider_page_$i",
		array(
			'label'           => esc_html__( 'Select Slide', 'super-construction' ),
			'section'         => 'section_slider',
			'type'            => 'dropdown-pages',
			'active_callback' => 'business_point_is_featured_slider_active',
			'priority' 		  => 100,
		)
	); 

	$wp_customize->add_setting( "caption_position_$i",
		array(
			'default'           => 'center',
			'sanitize_callback' => 'business_point_sanitize_select',
		)
	);

	$wp_customize->add_control( "caption_position_$i",
		array(
			'label'           => esc_html__( 'Caption Position', 'super-construction' ),
			'section'         => 'section_slider',
			'type'            => 'select',
			'choices'         => array(
				'left'     => esc_html__( 'Left', 'super-construction' ),
				'right'    => esc_html__( 'Right', 'super-construction' ),
				'center'   => esc_html__( 'Center', 'super-construction' ),
			),
			'active_callback' => 'business_point_is_featured_slider_active',
			'priority' 		  => 100,
		)
	); 

}