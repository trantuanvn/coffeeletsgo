<?php 
	wp_reset_query();
	//get image settings
	$imageSize = get_post_meta( $post->ID, THEME_NAME."_image_size", true ); //custom image size
	$imageType = get_option (THEME_NAME."_image_type");  //default image size

	if(!$imageSize) { $imageSize = $imageType; }

	if($imageSize=="large") {
		$width = 600;
		$height = 180;
		$class= "post-image-2";
	} else {
		$width = 170;
		$height = 170;
		$class= "post-image-1";
	}

	$image = get_post_thumb($post->ID,$width,$height); 

	//post details
	$singleImage = get_post_meta( $post->ID, THEME_NAME."_single_image", true );
	if((get_option(THEME_NAME."_show_single_thumb") == "on"  && $singleImage=="show" && $image['show']==true) || (get_option(THEME_NAME."_show_single_thumb") == "on" && !$singleImage && $image['show']==true)) { 

?>

	<?php echo ot_image_html($post->ID,$width,$height,$class); ?>

<?php } ?>
