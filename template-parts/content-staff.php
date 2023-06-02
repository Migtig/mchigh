<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MC_High_2023
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="entry-content">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mchigh' ),
				'after'  => '</div>',
			)
		);
		?>

	<?php if ( get_edit_post_link() ) : ?>
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'mchigh' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
		endif; ?>
	</section><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
