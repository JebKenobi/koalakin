<?php

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
				if ( have_posts() ) :
					// Start the Loop.
					$cntr = 1;
					$args = array( 'post_type' => 'homepage_sections', 'posts_per_page' => 10, 'orderby' => 'menu_order', 'order' => 'ASC' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
						echo '<div class="homeSec section_' . $cntr . '" style="background-image: url(' . $large_image_url[0] . ')">';

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', 'homepage_sections' );
						echo '</div>';
						$cntr++;
					endwhile;
					// Previous/next post navigation.
					twentyfourteen_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
			<div id="section_4" class="homeSec">
				<h2>Latest from the Blog</h2>
				<?php
				$count = 1;
				$args = array( 'posts_per_page' => 3 );
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<div class="blogFeat feat-<?php echo $count; ?>">
						<?php $count++; ?>
						<div class="thumb">
							<?php twentyfourteen_post_thumbnail(); ?>
							<p> <span class="cat"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span> <span class="date"><?php the_time('j M'); ?></span></p>
						</div>
						<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
					</div>

				<?php endforeach; 
				wp_reset_postdata();?>
				<div id="twitter">
                    <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter-bird.gif" align="left" />
                    	<?php
							/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
							$settings = array(
							    'oauth_access_token' => "141297832-cbeEdzHH6palpAYhVDoTc10DluoGf5LmfgVlxqO7",
							    'oauth_access_token_secret' => "KM8Pp13eFDpJffuk2ikrW7bIczMCyGdg4N1GfwvrXecYz",
							    'consumer_key' => "NGGGgg46RDB7rri56fgMWA",
							    'consumer_secret' => "uziWxkhdNr8jirPn2SMTLPAZR4ccKoVWYrfB8DXPFU"
							);
                    	?>Do/did you have a code name for breastfeeding your toddler? Does your nursling have a special name for breastfeeding? http://fb.me/YLq5jANK </p>
                    <p class="meta"><span class="time">10 hours ago</span> <span class="mention">Follow <a href="#">@KoalaKin</a></span></p>
                </div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();
