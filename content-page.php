<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage themamastore
 * @since themamastore 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
		 if (has_excerpt()) : ?>
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
		<?php endif; 		
		themamastore_post_thumbnail();
	?>

	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'themamastore' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );

			edit_post_link( __( 'Edit', 'themamastore' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
