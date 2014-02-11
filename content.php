<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage themamastore
 * @since themamastore 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php  if ( !is_single() ) :  
		themamastore_post_thumbnail(); 
	endif; ?>

	<header class="entry-header">
		<?php  if ( !is_category() && !is_single() ) :  
		 	 the_category(); 
		 endif; ?>
		
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && themamastore_categorized_blog() ) : ?>
		<div class="entry-meta <?php if ( !is_single() ) { echo 'list-meta'; } ?>">
			<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'themamastore' ) ); ?></span>
		</div>
		<?php
			endif;

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title list-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<div class="entry-meta <?php if ( !is_single() ) { echo 'list-meta'; } ?>">
			<?php
				if ( 'post' == get_post_type() )
					themamastore_posted_on();

				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			
				<?php if ( is_single() ) : ?>
						<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'themamastore' ), __( '1 Comment', 'themamastore' ), __( '% Comments', 'themamastore' ) ); ?></span>
				<?php endif; ?>
			
			<?php
		    endif;

				edit_post_link( __( 'Edit', 'themamastore' ), '<span class="edit-link">', '</span>' );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	
	<?php else : ?>
	<?php  if ( is_single() ) :  
	    if (has_excerpt()) : ?>
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
		<?php endif; ?>
		<?php themamastore_post_thumbnail(); ?>
	<?php endif; ?>
	
	<?php include('inc/social-sharing.php'); ?>	
	
	<div class="entry-content <?php if ( !is_single() ) { echo 'list-content'; } ?>">
		
		<?php if ( is_single() ) : 
		    the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'themamastore' ) );
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'themamastore' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			
		else : 
			if (has_excerpt()) : 
				$excerpt = $post->post_excerpt;
				$excerpt = substr($excerpt, 0, 100); ?>
				<p><?php echo $excerpt; ?>...</p>
			<?php else : 		    
				$content = $post->post_content;
				$content = substr($content, 0, 100); ?>
				<p><?php echo $content; ?>...</p> 

		<?php endif; //has excerpt
		
	   endif; //is single ?>
		
	</div><!-- .entry-content -->
	<?php endif; ?>
	
	<?php if ( is_single() ) : ?>
		<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
	<?php endif; //is single ?>
	
</article><!-- #post-## -->