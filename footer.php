<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MC_High_2023
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-menu">
			<nav id="footer-navigation" class="footer-navigation">
				<?php the_custom_logo();
				wp_nav_menu( array ( 'theme_location' => 'footer-nav')) ?>
			</nav>
		</div>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mchigh' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'mchigh' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'mchigh' ), 'mchigh', '<a href="https://connorfroese.ca">Connor Froese & Kristina Hunt</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
