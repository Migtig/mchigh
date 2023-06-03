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

	<main id="primary" class="site-main page-news">

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
			'post_type' => 'post',
			'posts_per_page' => -1,
		);

		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); ?>
				<article class data-aos='zoom-in-up'>
				<h2><?php the_title(); ?></h2>
				<p><?php the_excerpt(); ?></p>
				</article>
				<?php
				
			}
		}
		?>

		<script>
			AOS.init();
		</script>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
