<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage themamastore
 * @since themamastore 1.0
 */

get_header(); ?>
<section id="primary" class="content-area">
		<div id="content" class="site-content blog-content" role="main">

			<?php if ( have_posts() ) : ?>

			<?php  echo '<div class="blog-content">';
					// Start the Loop.
					while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					endwhile;
					echo '</div>';
					// Previous/next page navigation.
					themamastore_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php 
get_sidebar();
get_footer(); ?>