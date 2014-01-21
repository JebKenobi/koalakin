<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
				echo '<div class="rightSide sidebar">';
				dynamic_sidebar( 'blog-sidebar' ); ?>
				<p class="title">Recent Posts</p>
				<?php
				$count = 1;
				$args = array( 'posts_per_page' => 3 );
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<div class="post post-<?php echo $count; ?>">
						<?php $count++; ?>
						<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
						<p class="cat"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></p> 
						<p class="date"><?php the_time('j M'); ?></p>
					</div>

				<?php endforeach; 
				wp_reset_postdata();
				echo '</div>';
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					// Previous/next post navigation.
					koalakin_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
