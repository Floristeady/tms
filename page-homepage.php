<?php
/**
 * Template Name: P&aacute;gina de inicio
 * @package WordPress
 * @subpackage themamastore
 * @since themamastore 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content home-content">

<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					//get_template_part( 'content', 'page' );

			    endwhile; ?>	
				<!---loop1-->
			<?php $args = array(
					'post_type'	=> 'post',
					'post_status' => 'publish',
					'posts_per_page' => 5,
					'orderby' => 'date',
					'order' => 'DESC',
					'offset' => 0
					 );
				$last_post = new WP_Query( $args );
			?>
			
			<?php $i = 1; ?>	
			<?php if ( $last_post ->have_posts() ) while ( $last_post ->have_posts() ) : $last_post ->the_post(); ?>
			
			<?php if ($i == 1): ?>
			<article id="post-first" <?php post_class(); ?>>
			
				<div class="post-thumbnail">
					<?php the_post_thumbnail('themamastore-home-width'); ?>
				</div>
					
				<header class="entry-header">
					
					<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && themamastore_categorized_blog() ) : ?>
			
					<?php
						endif;
			
						if ( is_single() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h1 class="entry-title list-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
						endif;
					?>
				</header><!-- .entry-header -->	
				
				<div class="entry-content <?php if ( !is_single() ) { echo 'list-content'; } ?>">
		
					<?php 
						if (has_excerpt()) : 
							$excerpt = $post->post_excerpt;
							$excerpt = substr($excerpt, 0, 100); ?>
							<p><?php echo $excerpt; ?>...</p>
						<?php else : 		    
							$content = $post->post_content;
							$content = substr($content, 0, 100); ?>
							<p><?php echo $content; ?>...</p> 
			
					<?php endif; ?>
					
				</div><!-- .entry-content -->
			
			</article><!-- #post-## -->
						
			<?php elseif ($i == 2) :?>
			
			<article  id="post-second" <?php post_class(); ?>>

				<div class="post-thumbnail">
					<?php the_post_thumbnail('themamastore-second-width'); ?>
				</div>
					
				<header class="entry-header">
					
					<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && themamastore_categorized_blog() ) : ?>
			
					<?php
						endif;
			
						if ( is_single() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h1 class="entry-title list-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
						endif;
					?>
				</header><!-- .entry-header -->	
			</article><!-- #post-## -->
			
			<?php elseif ($i == 3) :?>
			
			<article  id="post-third" <?php post_class(); ?>>
	
				<header class="entry-header">
					
					<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && themamastore_categorized_blog() ) : ?>
			
					<?php
						endif;
			
						if ( is_single() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h1 class="entry-title list-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
						endif;
					?>
				</header><!-- .entry-header -->	
							
			</article><!-- #post-## -->
			
			<?php elseif ($i == 4) :?>
			
			<article  id="post-fourth" <?php post_class(); ?>>

				<div class="post-thumbnail">
					<?php the_post_thumbnail('themamastore-third-width'); ?>
				</div>
					
				<header class="entry-header">
					
					<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && themamastore_categorized_blog() ) : ?>
			
					<?php
						endif;
			
						if ( is_single() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h1 class="entry-title list-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
						endif;
					?>
				</header><!-- .entry-header -->	
				
			</article><!-- #post-## -->
			
			<?php elseif ($i == 5) :?>
			
			<article  id="post-fifth" <?php post_class(); ?>>

				<div class="post-thumbnail">
					<?php the_post_thumbnail('themamastore-third-width'); ?>
				</div>
					
				<header class="entry-header">
					
					<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && themamastore_categorized_blog() ) : ?>
			
					<?php
						endif;
			
						if ( is_single() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h1 class="entry-title list-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
						endif;
					?>
				</header><!-- .entry-header -->	
			</article><!-- #post-## -->
			
			<?php endif; ?>
			
		<?php  $i++; endwhile; wp_reset_postdata(); ?>

		

		</div><!-- #content -->
	</div><!-- #primary -->
	
</div>

<?php get_footer(); ?>