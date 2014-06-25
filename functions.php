<?php
/**
 * TheMamaStore functions and definitions
 *
 * The first function, themamastore_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * For information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage themamastore
 * @since themamastore 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 */
if ( ! isset( $content_width ) )
	$content_width = 1024;

/** Tell WordPress to run themamastore_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'themamastore_setup' );

if ( ! function_exists( 'themamastore_setup' ) ):

/**
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 */
function themamastore_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style( array( 'css/editor-style.css', themamastore_font_url() ) );
	
	// Create Theme Logotype Options Page
    require_once ( get_template_directory() . '/theme-admin/theme-options.php' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 378, 999, false);
	add_image_size( 'themamastore-single-width', 766, 530, false );
	add_image_size( 'themamastore-home-width', 466, 352, true );
	add_image_size( 'themamastore-second-width', 250, 212, true );
	add_image_size( 'themamastore-third-width', 250, 130, true );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'themamastore', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'themamastore' ),
		'secondary' => __( 'Secondary Navigation', 'themamastore' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );
	
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );
	
	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'themamastore_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );
	
	// This theme allows users to set a custom header
	global $wp_version;
	if ( version_compare( $wp_version, '3.4', '>=' ) )
		add_theme_support( 'custom-header' );
	else
		add_custom_image_header( $args );
		
	$defaults = array(
	'random-default'         => false,
	'width'                  => 970,
	'height'                 => 220,
	'flex-height'            => true,
	'flex-width'             => false,
	'default-text-color'     => 'fff',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $defaults );
	}
endif;


/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since TheMamaStore 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function themamastore_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'themamastore' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'themamastore_wp_title', 10, 2 );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Twenty Ten 1.0
 */
function themamastore_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'themamastore_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since TheMamaStore 1.0
 * @return int
 */
function themamastore_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'themamastore_excerpt_length' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and themamastore_continue_reading_link().
 *
 * @since TheMamaStore 1.0
 */
function themamastore_auto_excerpt_more( $more ) {
	return ' &hellip;' . themamastore_continue_reading_link();
}
add_filter( 'excerpt_more', 'themamastore_auto_excerpt_more' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since TheMamaStore 1.0
 * @return string "Continue Reading" link
 */
function themamastore_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'themamastore' ) . '</a>';
}

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since TheMamaStore 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function themamastore_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= themamastore_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'themamastore_custom_excerpt_more' );

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override themamastore_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since TheMamaStore 1.0
 * @uses register_sidebar
 */
function themamastore_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'themamastore' ),
		'id' => 'primary-widget-area',
		'description' => __( 'Main Sidebar Widget', 'themamastore' ),
		'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Main Optional Sidebar', 'themamastore' ),
		'id' => 'optional-widget-area',
		'description' => __( 'Optional Sidebar Widget', 'themamastore' ),
		'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	// Area 3, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Sidebar', 'themamastore' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'Secondary Sidebar Widget', 'themamastore' ),
		'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'themamastore' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'An optional widget area for your site footer', 'themamastore' ),
		'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'themamastore' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'An optional widget area for your site footer', 'themamastore' ),
		'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'themamastore' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'An optional widget area for your site footer', 'themamastore' ),
		'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'themamastore' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'An optional widget area for your site footer', 'themamastore' ),
		'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

}
/** Register sidebars by running themamastore_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'themamastore_widgets_init' );

/**
 * Register Lato Google font for TheMamaStore. Register Roboto Slab Google font for TheMamaStore.
 *
 * @since TheMamaStore 1.0
 *
 * @return string
 */
function themamastore_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'themamastore' ) ) {
		//$font_url = add_query_arg( 'family', urlencode( 'Roboto:400,700,300' ), "//fonts.googleapis.com/css" );
		$font_url = add_query_arg( 'family','Roboto:400,700,300|Roboto+Slab:400,700' , "//fonts.googleapis.com/css" );
	}

	return $font_url;
}


/**
 * Enqueue scripts and styles for the front end.
 *
 * @since TheMamaStore 1.0
 *
 * @return void
 */
function themamastore_scripts() {
	// Add Roboto font, used in the main stylesheet.
	wp_enqueue_style( 'themamastore-roboto', themamastore_font_url(), array(), null );
	
	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/css/genericons.css', array(), '3.0.2' );

	// Load our main stylesheet style.css 
	wp_enqueue_style( 'themamastore-style', get_stylesheet_uri(), array( 'genericons' ) );
	
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'themamastore-ie', get_template_directory_uri() . '/css/ie.css', array( 'themamastore-style', 'genericons' ), '20131205' );
	
	wp_style_add_data( 'themamastore-ie', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'themamastore-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}

	
}
add_action( 'wp_enqueue_scripts', 'themamastore_scripts' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since TheMamaStore 1.0
 *
 * @return void
 */
function themamastore_admin_fonts() {
	wp_enqueue_style( 'themamastore-lato', themamastore_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'themamastore_admin_fonts' );


if ( ! function_exists( 'themamastore_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since TheMamaStore  1.0
 *
 * @return void
 */
function themamastore_posted_on() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . __( 'Sticky', 'themamastore' ) . '</span>';
	}

	if ( is_single() ) {
	// Set up and print post meta information.
	printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);
	} else {
		// Set up and print post meta information.
	printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);

	}
}
endif;
if ( ! function_exists( 'themamastore_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since TheMamaStore 1.0
 */
function themamastore_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s.', 'themamastore' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s.', 'themamastore' );
	} else {
		$posted_in = __( 'Bookmark the <a href="/%3$s/" rel="bookmark">permalink</a>.', 'themamastore' );
	}

	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;


/**
 * Add Admin
 *
 * @since TheMamaStore 1.0
 */
	require_once(TEMPLATEPATH . '/theme-admin/general-options.php');

	// remove version info from head and feeds (http://digwp.com/2009/07/remove-wordpress-version-number/)
	function themamastore_complete_version_removal() {
		return '';
	}
	add_filter('the_generator', 'themamastore_complete_version_removal');

/**
 * Change Search Form input type from "text" to "search" and add placeholder text
 *
 * @since TheMamaStore 1.0
 */
	function themamastore_search_form ( $form ) {
		$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
		<div><label class="screen-reader-text" for="s">' . __('Search for:', 'themamastore') . '</label>
		<input type="search" placeholder="'. __('Search for:', 'themamastore'). '" value="' . get_search_query() . '" name="s" id="s" />
		<input type="submit" class="hide" id="searchsubmit" value="'. esc_attr__('Search') .'" />
		</div>
		</form>';
		return $form;
	}
	add_filter( 'get_search_form', 'themamastore_search_form' );


/**
 *  Adds excerpt on pages
 */
 
add_post_type_support( 'page', 'excerpt');

/**
 * Find out if blog has more than one category.
 *
 * @since TheMamaStore 1.0
 *
 * @return boolean true if blog has more than 1 category
 */
function themamastore_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'themamastore_category_count' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'themamastore_category_count', $all_the_cool_cats );
	}

	if ( 1 !== (int) $all_the_cool_cats ) {
		// This blog has more than 1 category so themamastore_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so themamastore_categorized_blog should return false
		return false;
	}
}

if ( ! function_exists( 'themamastore_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since TheMamaStore 1.0
 *
 * @return void
 */
function themamastore_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'themamastore' ),
		'next_text' => __( 'Next &rarr;', 'themamastore' ),
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'themamastore' ); ?></h1>
		<div class="pagination loop-pagination">
			<?php echo $links; ?>
		</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;

if ( ! function_exists( 'themamastore_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @since TheMamaStore 1.0
 *
 * @return void
 */
function themamastore_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}

	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'themamastore' ); ?></h1>
		<div class="nav-links">
			<?php
			if ( is_attachment() ) :
				previous_post_link( '%link', __( '<span class="meta-nav ">Published In</span>%title', 'themamastore' ) );
			else :
				previous_post_link( '%link', __( '<span class="meta-nav">Previous Post</span>%title', 'themamastore' ) );
				next_post_link( '%link', __( '<span class="meta-nav">Next Post</span>%title', 'themamastore' ) );
			endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 *
 * @since TheMamaStore 1.0
 *
 * @return void
*/
function themamastore_post_thumbnail() {
	if ( post_password_required() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
	<?php the_post_thumbnail('themamastore-single-width'); ?>
	</div>

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>">
	<?php the_post_thumbnail(); ?>
	</a>

	<?php endif; // End is_singular()
}

/**
 * Allow SVG uploads
 *
 * @since TheMamaStore 1.0
 *
*/
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
	$existing_mimes['svg'] = 'mime/type';
	return $existing_mimes;
}

/*
* Change rel to class en Menu
*/

function add_menuclass($ulclass) {
	return preg_replace('/<a rel="icon-facebook"/', '<a rel="icon-facebook" target="_blank" class="icon-facebook"', $ulclass, 1);
}

add_filter('wp_nav_menu','add_menuclass');

function add_menuclass2($ulclass) {
	return preg_replace('/<a rel="icon-twitter"/', '<a rel="icon-twitter" target="_blank" class="icon-twitter"', $ulclass, 2);
}

add_filter('wp_nav_menu','add_menuclass2');

function add_menuclass3($ulclass) {
	return preg_replace('/<a rel="icon-pinterest"/', '<a rel="icon-pinterest" target="_blank" class="icon-pinterest"', $ulclass, 3);
}

add_filter('wp_nav_menu','add_menuclass3');


?>