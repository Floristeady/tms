<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage themamastore
 * @since themamastore 1.0
 */

get_header(); ?>

<?php //include('inc/modal.php'); ?> 

	<?php include('inc/posts-top.php'); ?>

	<div id="primary" class="content-area">
		
		
		<div id="content" class="site-content" role="main">

		<?php
			$args =array(
				'ignore_sticky_posts' => true,
				//'posts_per_page' => 10,
				'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
				'post__not_in' => get_option("sticky_posts")
				 );
			query_posts($args);	
			if ( have_posts() ) :
				// Start the Loop.
				
				echo '<div class="blog-content">';
				
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