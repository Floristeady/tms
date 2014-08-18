<?php if(is_single() ) { 
	global $post_id;
    $domsxe = simplexml_load_string(get_the_post_thumbnail($post_id, 'full'));
    $thumbnailsrc = $domsxe->attributes()->src;?>
    
    <meta property="og:title" content="<?php the_title(); ?>"/>
	<meta property="og:image" content="<?php echo $thumbnailsrc ?>"/>
	<meta property="og:image:type" content="image/jpeg" />
<?php } ?>
