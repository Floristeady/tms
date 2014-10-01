<?php
/**
 * Template Name: P&aacute;gina de inicio
 * @package WordPress
 * @subpackage themamastore
 * @since themamastore 1.0
 */

get_header(); ?>

<?php include('inc/modal.php'); ?> 

<div id="main-content" class="main-content home-content">

<div id="primary" class="content-area">
		<div id="content" class="site-content">
			<div class="the-tag"><a href="<?php echo get_permalink( get_page_by_path( 'blog' ) ) ?>"><?php _e('Blog »', 'themamastore') ?></a></div>
			
			<div id="home-top">
				<?php include('inc/posts-top.php'); ?>
			
								
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
		
			<div id="shop">
		
				<div class="the-tag tag-shop"><a href="http://tienda.themamastore.cl/"><?php _e('Tienda »', 'themamastore') ?></a></div>
			
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
				
				<div class="content-center">
					<div id="top" >
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
							<?php if( get_field('imagen_central_chico') && get_field('textoseo_central_chico')) : ?>
					
						<a href="<?php the_field('link_aviso_central_chico'); ?>" title="<?php the_field('textoseo_central_chico'); ?>">
							<img src="<?php the_field('imagen_central_chico'); ?>" alt="<?php the_field('textoseo_central_chico'); ?>" />
						</a>
						<?php elseif( get_field('imagen_central_chico')) : ?>
							<img src="<?php the_field('imagen_central_chico'); ?>" alt="<?php the_field('textoseo_central_chico'); ?>" />
						<?php endif; //aviso lateral?>	
						</div>
					
						<div class="one-third">
						<?php include('inc/twitter.php'); ?>
						</div>
					
						<!--!<div class="one-third">-->
						<?php //include('inc/newsletter.php'); ?>	
						<!--!</div>-->
					</div><!--top-## -->
			   </div>
				
			</div><!-- #shop -->	

		</div><!-- #content -->
</div><!-- #primary -->
	
</div><!-- #main-content -->

<?php get_footer(); ?>