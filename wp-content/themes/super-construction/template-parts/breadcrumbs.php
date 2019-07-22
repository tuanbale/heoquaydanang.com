<?php
/**
 * Breadcrumbs.
 *
 * @package Business_Point
 */

// Bail if front page.
if ( is_front_page() || is_page_template( 'templates/home.php' ) ) {
	return;
}

// Custom image.
$image_url = get_header_image();

if( !empty( $image_url ) ){

	$banner_style = 'style="background: url('.esc_url( $image_url ).') center center no-repeat; background-size: cover;"';

} else{

	$banner_style = '';
} ?>

<div id="inner-banner" class="overlay" <?php echo $banner_style; ?>>
	<div class="container">
		<div class="banner-title">

				<?php 
				if(is_page() || is_single() ){ ?>

					<h1><?php echo esc_html( get_the_title() ); ?></h1>

					<?php
				} elseif( is_search() ){ ?>

			        <h2><?php printf( esc_html__( 'Search Results for: %s', 'super-construction' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

			        <?php
			    }elseif( is_404() ){ ?>

			        <h2><?php echo esc_html( 'Page Not Found: 404', 'super-construction'); ?></h2>

			        <?php
			    }elseif( is_home() ){ ?>

			        <h1><?php single_post_title(); ?></h1>

			        <?php
			    } else{

					the_archive_title( '<h2>', '</h2>' );

				}
				?>
			
		</div>
	</div>
</div>

<?php
$breadcrumb_type = business_point_get_option( 'breadcrumb_type' );
if ( 'disable' === $breadcrumb_type ) {
	return;
}

if ( ! function_exists( 'business_point_breadcrumb_trail' ) ) {
	require_once trailingslashit( get_template_directory() ) . '/assets/vendor/breadcrumbs/breadcrumbs.php';
}
?>

<div id="breadcrumb">
	<div class="container">
		<?php
		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);
		business_point_breadcrumb_trail( $breadcrumb_args );
		?>
	</div><!-- .container -->
</div><!-- #breadcrumb -->
