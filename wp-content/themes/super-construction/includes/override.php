<?php
/**
 * Super Construction functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Super_Construction
 */


//=============================================================
// Credit info of the theme
//=============================================================
function business_point_credit_info(){ ?> 

    <div class="site-info">
        <?php printf( esc_html__( '%1$s by %2$s', 'super-construction' ), 'Super Construction', '<a href="https://fb.com/tuansaske" rel="designer">Tuấn Sasu Ke</a>' ); ?>
    </div><!-- .site-info -->
    
    <?php
}

//=============================================================
// Remove upsell link of parent theme and add new link
//=============================================================



//=============================================================
// Remove theme info page of parent theme
//=============================================================
function super_construction_remove_parent_info_page() {

    return array();

}

add_filter( 'business_point_about_filter', 'super_construction_remove_parent_info_page');

//=============================================================
// Remove demo page of parent theme
//=============================================================
function super_construction_remove_parent_demo_page() {

    return array();

}

add_filter( 'Business_Point_Demo_filter', 'super_construction_remove_parent_demo_page');

//=============================================================
// Remove demo page of parent theme
//=============================================================

function business_point_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'super-construction' ) ) {
		$fonts[] = 'Open Sans:400,700,900,400italic,700italic,900italic';
	}

	if ( 'off' !== _x( 'on', 'Dosis font: on or off', 'super-construction' ) ) {
		$fonts[] = 'Dosis:300,400,500,600,700';
	}
	
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}