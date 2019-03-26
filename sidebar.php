<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package breadery
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="sidebar sidebar-expand-lg">
	<button class="sidebar-toggler collapsed" data-toggle="side-collapse" data-target="#secondary"></button>
	<aside id="secondary" class="widget-area collapse sidebar-collapse">
		<div><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
	</aside><!-- #secondary -->
</div>
