<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="left-entry-meta">
		<?php
			if ( 'post' == get_post_type() )
				echo '<time class="entry-date"><em>';
				the_time('l');
				echo '</em><br />';
				the_time('j F Y');
				echo '</time>';
				echo '<div class="dot"></div>';

			edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
		?>
		<?php if(is_single()): ?>
			<p><a href="<?php the_author_meta('user_url'); ?>"><?php the_author_meta('display_name'); ?></a></p>
		<?php endif; ?>
		<?php if(!is_single()): echo '<a href="' .esc_url(get_permalink()) .'" class="post-thumbnail">'; the_post_thumbnail('thumbnail'); echo '</a>'; endif; ?>

	</div><!-- .entry-meta -->
	<div class="the_post">
		<header class="entry-header">
			<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
			<div class="entry-meta">
				<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
			</div>
			<?php
				endif;

				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
				endif;
			?>
		</header><!-- .entry-header -->
		<?php if(is_single()): the_post_thumbnail('full'); endif; ?>
		<?php if ( is_search() || is_archive() || is_category() ) : ?>
		<div class="entry-summary">
			<?php echo closetags( content(155) );?>  
			<a href="<?php the_permalink; ?>" class="rm button">Read More<span data-icon="b" class="icon"></span></a>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php endif; ?>
	</div>
</article><!-- #post-## -->
