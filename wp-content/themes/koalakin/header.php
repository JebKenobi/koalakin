<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
	<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/javascript.js" type="text/javascript"></script>
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/fonts.css">
	<script>
		$(document).ready(function(){
		  $("div.newsletterToggle").click(function(){
		    $("div#newsletter").toggle();
		  });
		});
	</script>
</head>

<body <?php body_class(); ?>>
	<?php if(is_single()) : ?>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=514481465265168";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
	<?php endif; ?>
<div id="page" class="hfeed site">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	</div>
	<?php endif; ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
				<h1 class="menu-toggle"><?php _e( 'Primary Menu', 'twentyfourteen' ); ?></h1>
				<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				<div class="newsletterToggle"><p>Newsletter</p> <span data-icon="e" class="icon"></span></div>
				<div id="newsletter">
					<span class="close">x</span>
			            <!-- Begin MailChimp Signup Form -->
			            <link href="http://cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
			            <div id="mc_embed_signup">
			                 <form style="z-index:1000" action="http://koalakin.us4.list-manage.com/subscribe/post?u=bb9f4d5a1cedba57c9f6f3103&amp;id=0b2f9f1938" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
				            	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Sign up to receive our newsletter" required=""> 
			                    <input type="submit" value="Sign Up" style="border:0" name="subscribe" id="mc-embedded-subscribe" class="button1">
			                </form>
			            <!--End mc_embed_signup-->
			        </div>
				</div>
			</nav>
			<a class="logo" href="<?php bloginfo ( 'url' ); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logo.png" width="185" height="47" border="0" /></a>
		</div>
	</header><!-- #masthead -->

	<div id="main" class="site-main">
