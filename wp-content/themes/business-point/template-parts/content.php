<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business_Point
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="featured-thumb">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'business-point-small' ); ?></a>
	</div>
	<?php endif; ?>

	<?php $contet_class =  ( has_post_thumbnail() ) ? 'content-with-image' : 'content-no-image'; ?>

	<div class="content-wrap <?php echo $contet_class; ?>">
		<div class="content-wrap-inner">
			<header class="entry-header">
				<?php

				$cat_meta = business_point_get_option( 'category_meta' );
				the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
				?>
			</header><!-- .entry-header -->
			<div class="entry-footer">
				<?php business_point_entry_footer(); ?>
			</div><!-- .entry-footer -->
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
			
		</div>
	</div>

</article><!-- #post-## -->