 <?php 
 if ( is_single() ) : ?>
  <div id="share-social">
 <?php  include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
 if(is_plugin_active('social-sharing-toolkit/social_sharing_toolkit.php')) {  ?>	
		 <?php $social_sharing_toolkit = new MR_Social_Sharing_Toolkit();
	    echo $social_sharing_toolkit->create_bookmarks(); ?>
	    <a class="print icon-print" href="#" onclick="window.print();return false;"><?php _e('Imprimir','themamastore');?></a>
   </div>
<?php } endif;  ?>
	
