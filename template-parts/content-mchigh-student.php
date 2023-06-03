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

		$terms = get_the_terms( get_the_ID(), 'mchigh-student-type');
		$stuID = get_the_ID();
		foreach( $terms as $term) {

			$args = array(
				'post_type'      => 'mchigh-student',
				'posts_per_page' => -1,
				'tax_query'      => array(
					array(
						'taxonomy' => 'mchigh-student-type',
						'field'    => 'slug',
						'terms'    => $term->slug,
					)
				),
			);

			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
				?>
				<div class="related-students">
					<h3>Other <?php echo( esc_html( $term->name ) ); ?>s:</h3>
					<?php
					while( $query->have_posts() ) {
						$query->the_post();

						if ( $stuID != get_the_ID() ) {
							?>
							<p><a href="<?php esc_attr( the_permalink() ); ?>"><?php esc_html( the_title() ); ?></a></p>
							<?php
						}

					}
					wp_reset_postdata();
					?>
				</div>
				<?php
			}
		}
		

		?>
		
		<?php
	}
	?>
	<footer class="entry-footer">
		<?php mchigh_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
