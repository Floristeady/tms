<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage themamastore
 * @since themamastore 1.0
 */

get_header(); ?>

	<?php include('inc/posts-top.php'); ?>

	<div id="primary" class="content-area">
		
		
		<div id="content" class="site-content" role="main">

		<?php
			if ( have_posts() ) :
				// Start the Loop.
				
				echo '<div class="blog-content">';

				$args =array('orderby' => 'date', 'order' => 'DESC', 'ignore_sticky_posts' => true);
				query_posts($args);
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

				endwhile;
				echo '</div>';
				// Previous/next post navigation.
				themamastore_paging_nav();

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
			// Reset Post Data
			wp_reset_postdata();
		?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>