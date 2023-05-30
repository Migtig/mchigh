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

		if (function_exists('get_field')){
			?> <table> <?php 
			if(get_field('schedule')){
				if(have_rows('schedule')){
					?> <tr>
						<th>Date</th>
						<th>Course</th>
						<th>Instructor</th>
					</tr> <?php
					
					while ( have_rows('schedule') ) : the_row();
					?> <tr> <?php
					$date = get_sub_field('date');
					echo "<td>". $date ."</td>";

					$course = get_sub_field('course');
					echo "<td>". $course ."</td>";

					$instructor = get_sub_field('instructor');
					echo "<td>". $instructor ."</td>";
					?> </tr> <?php
					endwhile;
				}
			}
			?> </table> <?php
		} 
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
