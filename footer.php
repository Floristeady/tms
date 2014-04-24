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
	</footer><!-- footer -->
	
	</div>
	
	<?php wp_footer(); ?>
	<script data-no-instant>
		InstantClick.on('change', function() {
			//ga('send', 'pageview', location.pathname + location.search);
		});

		InstantClick.init(50, true);
	</script>
	</body>
</html>