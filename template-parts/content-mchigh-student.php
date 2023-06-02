<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MC_High_2023
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>

	</header><!-- .entry-header -->

	<?php the_post_thumbnail( 'student-portrait' ); ?>

	<div class="entry-content">
		<?php
		the_content();

		?>
	</div><!-- .entry-content -->
	
	<?php
	if ( is_singular() ) {

	?>
	<div class="related-students">
		<h3>Other Students:</h3>
		<p><a href="#">The Prodigy</a></p>
	</div>
	<?php
	}
	?>
	<footer class="entry-footer">
		<?php mchigh_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
