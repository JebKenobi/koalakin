<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<div id="secondary">
	<?php
		$description = get_bloginfo( 'description', 'display' );
		if ( ! empty ( $description ) ) :
	?>
	<h2 class="site-description"><?php echo esc_html( $description ); ?></h2>
	<?php endif; ?>

	<?php if (is_page()) :
		$parent_title = get_the_title($post->post_parent);
		$parent_url = get_permalink($post->post_parent); ?>
		<p class="title"><a href="<?php echo $parent_url; ?>"><?php echo $parent_title; ?></a></p>
		<?php if($post->post_parent): ?>
		<?php $children = wp_list_pages('title_li=&child_of='.$post->post_parent.'&echo=0'); ?>
		<?php else: ?>
		<?php $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0'); ?>
		<?php endif; ?>
		<?php if ($children) { ?>
		<ul class="subpage-list">
		<?php echo $children; ?>
		</ul>
		<?php } ?>
	<?php endif; ?>

	<?php if ( has_nav_menu( 'secondary' ) ) : ?>
	<nav role="navigation" class="navigation site-navigation secondary-navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
	</nav>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #primary-sidebar -->
	<?php endif; ?>
</div><!-- #secondary -->
