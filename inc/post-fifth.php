
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
