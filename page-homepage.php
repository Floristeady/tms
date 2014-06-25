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
		<div id="content" class="site-content">
			<div class="the-tag"><a href="<?php echo get_permalink( get_page_by_path( 'blog' ) ) ?>"><?php _e('Blog »', 'themamastore') ?></a></div>
			
			<div id="home-top">
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
						
						<?php elseif ($i == 5) :?>
		
						<article  id="post-fifth" <?php post_class(); ?>>
		
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
						</header>
					</article><!-- #post-## -->
						
					</div><!-- col-->	
					<?php endif; ?>
			   
			    
				<?php  $i++; endwhile; wp_reset_postdata(); ?>
				</div><!--home-post-## -->
		
				<div id="top">
				<div class="one-third">
				<?php if( get_field('imagen_aviso_lateral') && get_field('link_aviso_lateral')) : ?>
				
					<a href="<?php the_field('link_aviso_lateral'); ?>" title="<?php the_field('texto_opcional_seo'); ?>">
						<img src="<?php the_field('imagen_aviso_lateral'); ?>" alt="<?php the_field('texto_opcional_seo'); ?>" />
					</a>
				<?php elseif( get_field('imagen_aviso_lateral')) : ?>
					<img src="<?php the_field('imagen_aviso_lateral'); ?>" alt="<?php the_field('texto_opcional_seo'); ?>" />
				<?php endif; //aviso lateral?>	
				</div>
				
				<div class="one-third">
				<?php include('inc/newsletter.php'); ?>	
				</div>
				<div class="one-third">
				<?php include('inc/twitter.php'); ?>
				</div>
			</div><!--top-## -->

			
			<?php if( get_field('imagen_aviso_central') && get_field('link_aviso_central')) : ?>
			<div id="center" class="clearfix">
				<div class="ad">
					<a href="<?php the_field('link_aviso_central'); ?>" title="<?php the_field('texto_opcional_central'); ?>">
						<img src="<?php the_field('imagen_aviso_central'); ?>" alt="<?php the_field('texto_opcional_central'); ?>" />
					</a>
				</div>
			</div>
		  <?php elseif( get_field('imagen_aviso_central')) : ?>
		  <div id="center" class="clearfix">
					<div class="ad">
					<img src="<?php the_field('imagen_aviso_central'); ?>" alt="<?php the_field('texto_opcional_central'); ?>" />
					</div>
			</div>
			<?php endif; //aviso central?>	
		
			</div><!-- #home-top-## -->
		
			<div id="shop" style="display:none;">
		
				<div class="the-tag tag-shop"><a href="#"><?php _e('Tienda »', 'themamastore') ?></a></div>
			
				<div id="home-bottom">
					<?php  $rows = get_field('coleccion');  ?>
								
					<?php if($rows) { ?>
					<div id="collections">
						
						<div class="collections-title">
							<h1>Colecciones de la <span>Tienda</span></h1>
						</div>
						
						<div class="carousel-collections flexslider">
						
						<?php echo '<ul class="slides">';
						 
							foreach($rows as $row) { ?>
			
					 		<li>
					 			<a href="<?php echo $row['link_coleccion'] ?>" class="fancybox"> 
					 				<img src="<?php bloginfo('template_url') ?>/timthumb.php?src=<?php echo $row['imagen_coleccion'] ?>&w=245&h=188"/>
					 				<h2><?php echo $row['agregar_titulo_coleccion'] ?></h2>
					 			</a> 
					 		</li>
			
						<?php } echo '</ul>';  ?>

					</div>	
							
					</div>	
					<?php } ?>
				
				</div>
				
				<?php include('inc/featured-products.php'); ?>	
								
			</div><!-- #shop -->	

		</div><!-- #content -->
</div><!-- #primary -->
	
</div><!-- #main-content -->

<?php get_footer(); ?>