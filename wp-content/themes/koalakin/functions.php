<?php //Opening PHP tag

// Custom Function to Include
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
register_sidebar(array(
  'name' => __( 'Blog Sidebar' ),
  'id' => 'blog-sidebar',
  'description' => __( 'Widgets in this area will be shown on the blog.' ),
  'before_title' => '<p class="title">',
  'after_title' => '</p>',
  'before_widget' => '',
  'after_widget' => ''
));

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'homepage_sections',
		array(
			'labels' => array(
				'name' => __( 'Homepage' ),
				'singular_name' => __( 'Homepage' )
			),
		'supports' => array(
				'title', 
				'editor', 
				'page-attributes',
				'thumbnail'
			),
		'public' => true,
		'has_archive' => false,
		'show_in_nav_menus' => false,
		)
	);
}
define('WOOCOMMERCE_USE_CSS', false);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 30 );

function list_hooked_functions($tag=false){
 global $wp_filter;
 if ($tag) {
  $hook[$tag]=$wp_filter[$tag];
  if (!is_array($hook[$tag])) {
  trigger_error("Nothing found for '$tag' hook", E_USER_WARNING);
  return;
  }
 }
 else {
  $hook=$wp_filter;
  ksort($hook);
 }
 echo '<pre>';
 foreach($hook as $tag => $priority){
  echo "<br /><strong>$tag</strong><br />";
  ksort($priority);
  foreach($priority as $priority => $function){
  echo $priority;
  foreach($function as $name => $properties) echo "\t$name<br />";
  }
 }
 echo '</pre>';
 return;
}
function twentythirteen_scripts_styles() {	
    // Removes Masonry to handle vertical alignment of footer widgets.
    if ( is_active_sidebar( 'sidebar-1' ) )
            wp_dequeue_script( 'jquery-masonry' );
}
function content($limit) {
global $content;
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content);
  } else {
    $content = implode(" ",$content);
  } 
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}
function closetags($html) {

  #put all opened tags into an array
  $content = $result;
  preg_match_all('#<([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
 $openedtags = $result[1];   #put all closed tags into an array
  preg_match_all('#</([a-z]+)>#iU', $html, $result);
  $closedtags = $result[1];
  $len_opened = count($openedtags);
  # all tags are closed
  if (count($closedtags) == $len_opened) {
    return $html;
  }

  $openedtags = array_reverse($openedtags);
  # close tags
  for ($i=0; $i < $len_opened; $i++) {
    if (!in_array($openedtags[$i], $closedtags)){
      $html .= '</'.$openedtags[$i].'>';
    } else {
      unset($closedtags[array_search($openedtags[$i], $closedtags)]);    }
  }  
    return $html;
} 
function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


function koalakin_post_nav() {
  // Don't print empty markup if there's nowhere to navigate.
  $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
  $next     = get_adjacent_post( false, '', false );

  if ( ! $next && ! $previous ) {
    return;
  }

  ?>
  <nav class="navigation post-navigation" role="navigation">
    <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentyfourteen' ); ?></h1>
    <div class="nav-links">
      <?php
      if ( is_attachment() ) :
        previous_post_link( '%link', __( '<span class="meta-nav">Published In</span>', 'twentyfourteen' ) );
      else :
        previous_post_link( '%link', __( '<span class="meta-nav">Previous Post</span>', 'twentyfourteen' ) );
        next_post_link( '%link', __( '<span class="meta-nav">Next Post</span>', 'twentyfourteen' ) );
      endif;
      ?>
    </div><!-- .nav-links -->
  </nav><!-- .navigation -->
  <?php
}

