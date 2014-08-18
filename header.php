<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage themamastore
 * @since themamastore 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> ><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php wp_title( '|', true, 'right' ); ?></title>
			
	    <meta name="description" content="<?php echo '' . get_bloginfo ( 'description' );  ?>">
	    <meta name="robots" content="index,follow">
	    <meta name="twitter:widgets:csp" content="on">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/normalize.css" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" /> 
		<!--[if lt IE 9]>
			<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
		<![endif]-->
		<?php include('inc/facebook-opengraph.php');?>
<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
?>
		
	</head>
	<body <?php body_class(); ?>>
		
		<?php include('inc/facebook-code.php');?>  
	
		<div class="clearfix" id="page">
				
			<header id="masthead" role="banner">
			
				<?php global $themamastore_options;
				$themamastore_settings = get_option( 'themamastore_options', $themamastore_options ); ?>
			
				<div id="top-header">
				
					<div class="content-center">
						<div id="search-container" class="search-box-wrapper">
							<div class="search-box">
								<?php get_search_form(); ?>
							</div>
						</div>
					
						<nav id="nav-2">
								<?php  wp_nav_menu( array( 'container_id' => 'menu-secondary', 'theme_location' => 'secondary', 'sort_column' => 'menu_order' ) ); ?>
						</nav>
					</div>
				</div>

				<div class="header-main content-center">
					<div id="site-title">
					
					<?php if( $themamastore_settings['custom_logo'] ) : ?>
						<h1><a href="<?php echo bloginfo('url'); ?>" class="logo"><img src="<?php echo $themamastore_settings['custom_logo']; ?>" alt="<?php bloginfo('name'); ?>" /> </a></h1>
					<?php  else : ?>
						<h1><a href="<?php echo bloginfo('url'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
						<?php endif; ?>
				  
						<h2><?php bloginfo( 'description' ); ?></h2>
					</div>
					
					<nav id="access" role="navigation" class="clearfix">
						<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'themamastore' ); ?></a>
						<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #access -->
				</div>
	
			</header>
			
			<?php if(! is_front_page() ) {
				include('inc/breadcrumbs.php'); 
			} ?>


			<div id="main" role="main" class="content-center">
				