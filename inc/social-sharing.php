 <?php 
 if ( is_single() ) : 
 include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
 if(is_plugin_active('social-sharing-toolkit/social_sharing_toolkit.php')) {  ?>
	<div id="share-social">
		 <?php $social_sharing_toolkit = new MR_Social_Sharing_Toolkit();
	    echo $social_sharing_toolkit->create_bookmarks(); ?>
		</div>
<?php } endif;  ?>