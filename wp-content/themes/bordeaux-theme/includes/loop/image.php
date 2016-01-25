<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

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

	if($blogStyle=="2") {
		$width = 600;
		$height = 180;
	} else {
		$width = 100;
		$height = 100;
	}



	$image = get_post_thumb($post->ID,$width,$height); 
	if(get_option(THEME_NAME."_show_first_thumb") == "on" && $image['show']==true) {
?>

	<div class="image">
		<a href="<?php the_permalink();?>">
			<?php echo ot_image_html($post->ID,$width,$height); ?>
		</a>
	</div>

<?php } ?>