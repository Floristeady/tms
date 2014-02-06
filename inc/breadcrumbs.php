<div id="breadcrumbs">
	<div class="content-center">
		<p><a href="/"> <?php _e('Home', 'themamastore') ?></a> 
		<span class="separator">></span> 
		<?php if (is_page()) { ?>
			<?php if($post->post_parent) {
					$parent_title = get_the_title($post->post_parent);
					echo $parent_title.'<span class="separator"> > </span>';
			} ?> 
			<span class="current"><?php the_title(); ?></span>
		
		<?php } elseif (is_category() || is_single()) { ?>
			<?php  echo '<span class="cat">';
			the_category('</span><span class="separator"> > </span><span class="current">');
            if (is_single()) {
                echo '</span><span class="separator"> > </span><span class="current">';
                the_title();
                echo '</span>';
            }  ?>
		<?php } elseif (is_home()) { 
			echo"<span class='current'>"; echo'Blog </span>';
		 } elseif (is_tag()) { 
			echo"<span class='current'>"; printf( __( 'Tag Archives: %s', 'themamastore' ), single_tag_title( '', false ) ); echo'</span>';
		 } elseif (is_month()) {
			echo"<span class='current'>"; printf( __( 'Monthly Archives: %s', 'themamastore' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'themamastore' ) ) ); echo'</span>';
		 } elseif (is_author()) { 
			echo"<span class='current'>"; printf( __( 'All posts by %s', 'themamastore' ), get_the_author() );  echo'</span>';
		 } elseif (is_search()) { 
			echo"<span class='current'>"; printf( __( 'Search Results for: %s', 'themamastore' ), get_search_query() ); echo '</span>';
		 } else { ?>
		
		<?php  } ?>
		</p>
	</div>
</div>