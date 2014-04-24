<?php
/**
 * Template Name: P&aacute;gina Completa
 * @package WordPress
 * @subpackage themamastore
 * @since themamastore 1.0
 */

get_header(); ?>

<div id="primary" class="content-area content-full">
		<div id="content" class="site-content" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

				endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>