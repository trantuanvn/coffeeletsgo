<?php wp_reset_query();?>		
<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php if (have_posts()) :  ?>
		<?php get_template_part(THEME_SINGLE."page-title"); ?>
		<?php get_template_part(THEME_SINGLE."page-header"); ?>
			<?php woocommerce_content(); ?>
		<?php get_template_part(THEME_SINGLE."page-footer"); ?>
		<?php else: ?>
			<p><?php  _e('Sorry, no posts matched your criteria.' , THEME_NAME ); ?></p>
		<?php endif; ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?>