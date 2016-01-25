<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
	wp_reset_query();

    //get current cat id
    $catId = get_cat_id( single_cat_title("",false) );

    //blog style
    if(is_category()) {
        $blogStyle = ot_get_option($catId,"blog_style");
    } else {
        $blogStyle = get_option(THEME_NAME."_blog_style");
    }
    
    if(!isset($blogStyle) || $blogStyle==""){
        $blogStyle = get_option(THEME_NAME."_blog_style");
    }

?>
<?php get_header(); ?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
<?php get_template_part(THEME_SINGLE."page-title"); ?>
	<?php $counter = 1;?>
		<!-- BEGIN .blog-list-1 -->
		<div class="blog-list-<?php echo $blogStyle;?>">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part(THEME_LOOP."post"); ?>
			<?php $counter++; ?>
			<?php endwhile; else: ?>
				<?php get_template_part(THEME_LOOP."no","post"); ?>
			<?php endif; ?>
		<!-- END .blog-list-1 -->
		</div>
		<?php customized_nav_btns($paged, $wp_query->max_num_pages); ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer(); ?>