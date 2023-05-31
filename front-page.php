<?php
/**
 * The template for displaying the home page.
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

		<section-news>
			<h2><?php esc_html_e('News', 'mchigh') ?></h2>
				<?php
				$args = array(
					'post_type' => 'post', // might have to change this
					'posts_per_page' => 3,
				);
				$blog_query = new WP_Query($args);
				if ($blog_query -> have_posts()){
					while ($blog_query -> have_posts()){
						$blog_query -> the_post();
						?>
						<article>
							<a href="<?php the_permalink(); ?>">
								<h3><?php the_title(); ?></h3>
								<?php the_post_thumbnail('home-thumbnail'); ?>
							</a>
						</article>
						<?php
					}
					wp_reset_postdata();
				}
				?>
		</section-news>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
