<div id="featured-posts">

	<?php 
		
		$args = array(
			'post_type'	=> 'post',
			'post_status' => 'publish',
			'posts_per_page' => 5,
			'post__in'  => get_option( 'sticky_posts' ),
			'ignore_sticky_posts' => 1,
			'orderby' => 'date',
			'order' => 'DESC',
			'offset' => 0
			 );
		$last_post = new WP_Query( $args );
	?>
	
		<?php $i = 1; ?>	
		<?php if ( $last_post ->have_posts() ) ?>
	
		<div id="home-posts">
		
		<?php while ( $last_post ->have_posts() ) : $last_post ->the_post(); ?>
		
			<?php if ($i == 1): ?>
			<article id="post-first" <?php post_class(); ?>>
	
			<?php if ( has_post_thumbnail() ) { ?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('themamastore-home-width'); ?>
			</a><?php } ?>
				
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
			</header>
			
			<div class="entry-content <?php if ( !is_single() ) { echo 'list-content'; } ?>">
	
				<?php 
					if (has_excerpt()) : 
						$excerpt = $post->post_excerpt;  ?>  
						<p><?php echo wp_trim_words( $excerpt, 34 ); ?></p>
						
					<?php else : 		    
						$content = $post->post_content; ?>
						<p><?php echo wp_trim_words( $content, 34 ); ?></p> 
		
				<?php endif; ?>
				
			</div><!-- .entry-content -->
	
		</article><!-- #post-## -->

					
			<?php elseif ($i == 2) :?>
			
			<div class="col">

				<article id="post-second" <?php post_class(); ?>>

				<a class="post-thumbnail" href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('themamastore-second-width'); ?>
				</a>
					
				<header class="entry-header">
					
					<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && themamastore_categorized_blog() ) : ?>
			
					<?php
						endif;
			
						if ( is_single() ) :
							the_title( '<h2 class="entry-title">', '</h2>' );
						else :
							the_title( '<h2 class="entry-title list-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;
					?>
				</header>
			</article><!-- #post-## -->
			
			<?php elseif ($i == 3) :?>
			
			<article  id="post-third" <?php post_class(); ?>>

				<header class="entry-header">
					
					<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && themamastore_categorized_blog() ) : ?>
			
					<?php
						endif;
							the_title( '<h2 class="entry-title list-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>	<a class="btn" href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . __('Leer más +', 'themamastore').'</a></h2>' );
					?>
				</header>
						
			</article><!-- #post-## -->
			</div><!--col-## -->
		
		
		
			<?php elseif ($i == 4) :?>
			<div class="col">

			   <article  id="post-fourth" <?php post_class(); ?>>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('themamastore-third-width'); ?>
			</a>
				
			<header class="entry-header">
				
				<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && themamastore_categorized_blog() ) : ?>
		
				<?php
					endif;
		
					if ( is_single() ) :
						the_title( '<h2 class="entry-title">', '</h2>' );
					else :
						the_title( '<h2 class="entry-title list-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
				?>
			</header><!-- .entry-header -->	
			
			</article><!-- #post-## -->
			<?php //include('newsletter.php'); ?>	
			<?php elseif ($i == 5) :?>
			<?php include('post-fifth.php'); ?>
				
			</div><!-- col-->	
			<?php endif; ?>
	   
	    
		<?php  $i++; endwhile; wp_reset_postdata(); ?>
		</div><!--home-post-## -->
</div> 