<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	$postDate = get_option(THEME_NAME."_post_date");
	$postComments = get_option(THEME_NAME."_post_comment");
	$postAuthor = get_option(THEME_NAME."_post_author");

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


	$image = get_post_thumb($post->ID,0,0); 
	if($image['show']!=true) {
		$class=" post-no-image";	
	} else {
		$class = false;
	}
	
?>
<!-- BEGIN .item -->
<div <?php post_class("item".$class); ?>>
	<?php 
		if($blogStyle=="2") {
			get_template_part(THEME_LOOP."image");
		} 
	?>
	<div class="date">
		<?php if($postDate=="on") { ?>
			<p class="day"><?php the_time("d");?></p>
			<p class="month"><?php the_time("F");?></p>
			<p class="year"><?php the_time("Y");?></p>
		<?php } ?>
		<?php if ( comments_open() && $postComments=="on") { ?>
			<p class="comments">
				<a href="<?php the_permalink();?>#comments"><?php comments_number('0', '1','%'); ?></a>
			</p>
		<?php } ?>
		
		<?php 
			if(count(get_the_category($post->ID))>=1) {
		?>
			<p class="section">
				<?php the_category(", ");?>
			</p>
		<?php } ?>
		<?php 
			if($postAuthor=="on") { 
		?>
			<p class="author">
				<?php echo the_author_posts_link(); ?>
			</p>
		<?php
			} 
		?>
	</div>
	<?php 
		if($blogStyle=="1" || !$blogStyle) {
			get_template_part(THEME_LOOP."image");
		} 
	?>
	<div class="text">
		<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
		<?php 
			add_filter('excerpt_length', 'new_excerpt_length_50');
			the_excerpt();
		?>
		<p><a href="<?php the_permalink();?>" class="more-link"><i><?php _e("Read more", THEME_NAME);?></i></a></p>
	</div>

<!-- END .item -->
</div>
