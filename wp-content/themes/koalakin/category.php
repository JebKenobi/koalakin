<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>
			
			<header class="archive-header">
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .archive-header -->
			<?php
				if ( twentyfourteen_has_featured_posts() ) {
					
					// Include the featured content template.
					get_template_part( 'featured-content' );
				}
				if (is_category() || in_category()) :
					echo '<div class="rightSide sidebar">';
					dynamic_sidebar( 'blog-sidebar' );
					echo '</div>';
				endif;
					$dnd_query = new WP_Query( 'tag__in=16' );
					$do_not_duplicate = array();
					while ( $dnd_query->have_posts() ) : $dnd_query->the_post();
					    $do_not_duplicate[] = get_the_ID() ;
					endwhile;

					$cat = get_cat_id( single_cat_title("",false) );
					$cat_query = new WP_Query( array( 'category__and' => $cat, 'posts_per_page' => 3) );
					$do_not_duplicate_cat = array();
					while ( $cat_query->have_posts() ) : $cat_query->the_post();
					    $do_not_duplicate_cat[] = get_the_ID() ;
					endwhile;

					// Start the Loop.
					while ( have_posts() ) : the_post();
					if (is_category('1')) {
						if (in_array($post->ID, $do_not_duplicate)) continue;
					} elseif (is_category() && !is_category('1')) {
						if (in_array($post->ID, $do_not_duplicate_cat)) continue;
					}
					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					endwhile;
					// Previous/next page navigation.
					twentyfourteen_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php
if (!is_category() || !in_category()) :
get_sidebar( 'content' );
get_sidebar();
endif;
get_footer();
