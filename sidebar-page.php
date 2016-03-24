<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage themamastore
 * @since themamastore 1.0
 */
?>

<div id="sidebar">

	<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

	<ul class="widget-list">
		<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
	</ul>

<?php endif; ?>

</div>