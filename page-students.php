<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MC_High_2023
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<?php
		$args = array(
			'post_type'      => 'mchigh-student',
			'posts_per_page' => -1,
			'order'          => 'ASC',
			'orderby'        => 'title',
		);

		$query = new WP_Query( $args ); ?>
		<section class="students-all"> <?php
		if ( $query -> have_posts() ) {
			while ( $query -> have_posts() ) {
				$query -> the_post();
				?>
				<article>
					<a href="<?php the_permalink(); ?>"></a>
					<h2><?php the_title(); ?></h2>
					<?php the_post_thumbnail( 'student-landscape' ); ?>
					<p><?php the_excerpt(); ?></p>
					<p>Specialty: <?php 
					$terms = get_the_terms( get_the_ID(), 'mchigh-student-type');

					foreach( $terms as $term ) {
						?> 

						<!-- HAVE RANDY DOUBLE CHECK THIS -->
						<a href="<?php echo get_term_link( $term->slug, 'mchigh-student-type'); ?>"><?php echo( $term->name ); ?></a> 
						<?php
					}

					?></p>
				</article>
				<?php
			}
			wp_reset_postdata();
		}
		?> </section>


	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
