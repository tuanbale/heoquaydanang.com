<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Super_Construction
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses super_construction_header_style()
 */
function super_construction_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'super_construction_custom_header_args', array(
		'default-text-color'     => '000000',
		'width'                  => 1500,
		'height'                 => 390,
		'flex-height'            => true,
		'header-text'   		 => false,
		'wp-head-callback'       => 'super_construction_header_style',
		'default-image'          => get_stylesheet_directory_uri() . '/assets/images/inner-banner-01.png'
	) ) );

	/*
	 * Default custom headers packaged with the theme.
	 * %s is a placeholder for the theme template directory URI.
	 */
	register_default_headers( array(		
		'inner-banner-one' => array(
			'url'           => get_stylesheet_directory_uri() . '/assets/images/inner-banner-01.png',
			'thumbnail_url' => get_stylesheet_directory_uri() . '/assets/images/inner-banner-01.png',
			'description'   => _x( 'inner-banner-one', 'default banner', 'super-construction' )
		),	
		'inner-banner-two' => array(
			'url'           => get_stylesheet_directory_uri() . '/assets/images/inner-banner-02.png',
			'thumbnail_url' => get_stylesheet_directory_uri() . '/assets/images/inner-banner-02.png',
			'description'   => _x( 'inner-banner-two', 'second banner', 'super-construction' )
		),
	) );
}
add_action( 'after_setup_theme', 'super_construction_custom_header_setup' );

if ( ! function_exists( 'super_construction_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see super_construction_custom_header_setup().
	 */
	function super_construction_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
		?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			// If the user has set a custom color for the text use that.
			else :
		?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;
