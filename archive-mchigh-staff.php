<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MC_High_2023
 */

get_header();
?>

	<main id="primary" class="site-main">

<?php
// the_archive_title( '<h1 class="page-title">', '</h1>' );
the_archive_title( '<h1 class="page-title">', '</h1>' );
the_archive_description( '<div class="archive-description">', '</div>' );

//Faculty 
$args = array(
	'post_type' => 'mchigh-staff',
	'posts_per_page' => -1,
	'tax_query' => array (
		array (
			'taxonomy' => 'mchigh-staff-type',
			'field' => 'slug',
			'terms' => 'faculty',
		)
	)
);
$query = new WP_Query($args);
if($query -> have_posts()){ ?>
	<section class="faculty-list">
	<h2>Faculty</h2> <?php 
	while($query -> have_posts()) {
		$query -> the_post(); ?>
		<?php
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
	?> </section> <?php
}

//Admin
$args = array(
	'post_type' => 'mchigh-staff',
	'posts_per_page' => -1,
	'tax_query' => array (
		array (
			'taxonomy' => 'mchigh-staff-type',
			'field' => 'slug',
			'terms' => 'administrative',
		)
	)
);
$query = new WP_Query($args);
if($query -> have_posts()){ ?>
	<section class="administative-list">
	<h2>Administrative Staff</h2> <?php 
	while($query -> have_posts()) {
		$query -> the_post(); ?>
		<?php
		if (function_exists('get_field')){
			if (get_field('biography') ) { ?>
				<h3 id='<?php esc_attr( get_the_ID()); ?>'> <?php esc_html( the_title()); ?> </h3>
				<p><?php the_field( 'biography' ); ?></p> <?php 
			}
		}
	}
	wp_reset_postdata();
	?> </section> <?php
}


		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();