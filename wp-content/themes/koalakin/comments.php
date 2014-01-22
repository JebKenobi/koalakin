<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

	<h2 class="comments-title">
		Comments <?php comments_number( '', '1', '%' ); ?>
	</h2>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'twentyfourteen' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentyfourteen' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyfourteen' ) ); ?></div>
	</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<div class="comment-list">
		<?php $comment_args = array(
			'style'  => 'div',
			'callback' => 'koalakin_comments_callback',
		); ?>
		<?php wp_list_comments($comment_args); ?>
		
	</div><!-- .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'twentyfourteen' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentyfourteen' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyfourteen' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfourteen' ); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php 
	add_action( 'comment_form_top', 'add_textarea' );

	function add_textarea()
	{
	    echo '<textarea id="comment" name="comment" placeholder="Leave a Comment" aria-required="true"></textarea>';
	}
	$comments_args = array(
        // change the title of send button 
        'label_submit'=>'Leave a Comment',
        // change the title of the reply section
        'title_reply'=>'',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        'comment_notes_before' => '',
        // redefine your own textarea (the comment body)
        'fields' => apply_filters( 'comment_form_default_fields', array(

		    'author' =>
		      '<input id="author" placeholder="Name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		      '" size="30"' . $aria_req . ' />',

		    'email' =>
		      '<input id="email" placeholder="Email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		      '" size="30"' . $aria_req . ' />',

		    'url' =>
		      '<input id="url" placeholder="Website" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		      '" size="30" />'
		    )
		  ),
        'comment_field' => '',
	);

	comment_form($comments_args); ?>

</div><!-- #comments -->
