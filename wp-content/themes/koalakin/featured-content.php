<?php
/**
 * The template for displaying featured content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<div id="featured-content" class="featured-content">
	<div class="featured-content-inner">
	<?php
		/**
		 * Fires before the Twenty Fourteen featured content.
		 *
		 * @since Twenty Fourteen 1.0
		 */
		do_action( 'twentyfourteen_featured_posts_before' );
		$postcount = 0; // Initialize the post counter
		$featured_posts = twentyfourteen_get_featured_posts();
		foreach ( (array) $featured_posts as $order => $post) :
			$postcount++; //add 1 to the post counter
			setup_postdata( $post );
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>">
			<?php
				// Output the featured image.
				if ( has_post_thumbnail() ) :
					if ( 'grid' == get_theme_mod( 'featured_content_layout' ) ) {
						the_post_thumbnail();
					} else {
						the_post_thumbnail( 'twentyfourteen-full-width' );
					}
				endif;
				
			?>
			</a>

			<header class="entry-header">
				<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
				<div class="entry-meta">
					<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
					<span class="date"><?php the_time('j M'); ?></span>
				</div><!-- .entry-meta -->
				<?php endif; ?>

				<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h1>' ); ?>
				<?php if (is_category('1') && $postcount == 1) : ?>
					<div class="excerpt"><?php the_excerpt(apply_filters('excerpt_length', '20')); ?></div> 
					<a href="<?php the_permalink; ?>" class="rm button">Read More<span data-icon="b" class="icon"></span></a>
				<?php endif; ?>
			</header><!-- .entry-header -->
		</article><!-- #post-## -->
		<?php endforeach;

		/**
		 * Fires after the Twenty Fourteen featured content.
		 *
		 * @since Twenty Fourteen 1.0
		 */
		do_action( 'twentyfourteen_featured_posts_after' );

		wp_reset_postdata();
	?>
	</div><!-- .featured-content-inner -->
</div><!-- #featured-content .featured-content -->
