<?php
/**
 * The template for displaying Staff
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
		$taxonomy = 'mchigh-staff-type';
		$terms    = get_terms(
			array(
				'taxonomy' => $taxonomy
			)
		);

		if($terms && ! is_wp_error($terms) ){
			foreach($terms as $term){
				$args = array(
					'post_type'      => 'mchigh-staff',
					'posts_per_page' => -1,
					'order'          => 'ASC',
					'orderby'        => 'title',
					'tax_query'      => array(
						array(
							'taxonomy' => $taxonomy,
							'field'    => 'slug',
							'terms'    => $term->slug,
						)
					),
				);

				$query = new WP_Query( $args ); ?>
				<section class="staff-types"> <?php
				if ( $query -> have_posts() ) {
					echo '<h2>' . esc_html( $term->name ) . '</h2>';
					while ( $query -> have_posts() ) {
						$query -> the_post();
						if (function_exists('get_field')){
							if (get_field('biography') ) { ?>
								<h3 id='<?php esc_attr( get_the_ID()); ?>'> <?php esc_html(the_title()); ?> </h3>
								<p><?php the_field( 'biography' ); ?></p> <?php 
							}
							if (get_field('courses') ) { ?>
								<p>Courses: <?php the_field('courses'); ?></p> <?php		
							}
							if (get_field('website') ) { ?>
								<a href='<?php the_field('website') ?>'>Class Website</a> <?php		
							}
						}
					}
					wp_reset_postdata();
				}
				?> </section> <?php
			}
		}

		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
