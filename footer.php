<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package breadery
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<nav class="footer-navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'footer-menu',
					'menu_id'        => 'footer-menu',
					'menu_class'     => 'menu nav-menu'
				) );
			?>
		</nav>
		<div class="site-info">
			<?php
			/* translators: 1: CMS, 2: Theme, 3: Theme author. */
			printf( esc_html__( 'Using %1$s theme %2$s by %3$s.', 'breadery' ), '<a href="'.esc_url(__('https://wordpress.org/', 'breadery')).'">Wordpress</a>', 'breadery', '<a href="https://www.rachelbackert.com">Rachel Backert</a>' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
