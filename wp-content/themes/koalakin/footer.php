<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="content">
				<div class="colLeft">
					<h3>Recent Posts</h3>
					<?php
					$count = 1;
					$args = array( 'posts_per_page' => 3 );
					$myposts = get_posts( $args );
					foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
						<div class="post post-<?php echo $count; ?>">
							<?php $count++; ?>
							<p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
							<p class="cat"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></p> 
							<p class="date"><?php the_time('j M'); ?></p>
						</div>

					<?php endforeach; 
					wp_reset_postdata();?>
				</div>

				<div class="colRight">
					<?php get_sidebar( 'footer' ); ?>
				</div>
			</div>
			<div class="site-info">
				<p>&copy; <?php echo date('Y');?> <?php bloginfo('name'); ?>&reg; <a href="#">Privacy &amp; Terms</a></p>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>