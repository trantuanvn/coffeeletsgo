<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Template Name: Full Width Page
*/	
?>
<?php get_header(); ?>
<?php 
	wp_reset_query(); 
?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php if (have_posts()) : ?>
		<?php get_template_part(THEME_SINGLE."page-title"); ?>
		<?php the_content(); ?>
		<?php else: ?>
				<p><?php printf ( __('Sorry, no posts matched your criteria.' , THEME_NAME )); ?></p>
		<?php endif; ?>	
<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer(); ?>