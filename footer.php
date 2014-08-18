<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage themamastore
 * @since themamastore 1.0
 */
?>
	
		
	</div><!-- #main -->
	
	<footer id="footer" class="site-footer" role="contentinfo">
		<div id="footer-content">
			
		<?php get_sidebar( 'footer' ); ?>
		
		</div>
		<a style="margin-top:24px; float:left;" href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=themamastore.cl','SiteLock','width=600,height=600,left=160,top=170');" ><img alt="website security" title="SiteLock" src="//shield.sitelock.com/shield/themamastore.cl"/></a>
	</footer><!-- footer -->
	
	</div>
	
	<?php wp_footer(); ?>
	<script src="https://du8eo9nh88b2j.cloudfront.net/libs/0.0.2/search_widget.min.js" type="text/javascript"></script>
	
	</body>
</html>