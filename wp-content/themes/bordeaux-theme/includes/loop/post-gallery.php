<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	$gallery_style = get_post_meta ( $post->ID, THEME_NAME."_gallery_style", true );

	//gallery images
	$galleryImages = get_post_meta ( $post->ID, THEME_NAME."_gallery_images", true ); 
	$imageIDs = explode(",",$galleryImages);
	

	//set image urls
	$c=1;
	$images = array();
	foreach($imageIDs as $id) { 
		if($id) {
			$file = wp_get_attachment_url($id);
			$images[$c] = get_post_thumb(false, 135, 135, false, $file);
			
		} else {
			$images[$c] = get_post_thumb($post->ID, 135, 135);
		}
		$c++;
	}
	$count = count($images);
?>

		<!-- BEGIN .index-item -->
		<div class="index-item" data-id="gallery-<?php the_ID(); ?>">
			<a href="<?php the_permalink();?>" class="<?php if($gallery_style=="lightbox") { echo 'light-show '; } ?>" data-id="gallery-<?php the_ID(); ?>">
				<img src="<?php echo $images[1]['src'];?>" alt="<?php the_title();?>" />
			</a>
			<a href="<?php the_permalink();?>" class="<?php if($gallery_style=="lightbox") { echo 'light-show '; } ?>" data-id="gallery-<?php the_ID(); ?>">
				<?php the_title();?>
			</a>
		<!-- END .index-item -->
		</div>
