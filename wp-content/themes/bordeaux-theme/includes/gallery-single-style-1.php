<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	get_header();
	wp_reset_query();

	global $query_string;
	$query_vars = explode('&',$query_string);
									
	foreach($query_vars as $key) {
		if(strpos($key,'page=') !== false) {
			$i = substr($key,8,12);
			break;
		}
	}
	
	if(!isset($i)) {
		$i = 1;
	}

	$galleryImages = get_post_meta ( $post->ID, THEME_NAME."_gallery_images", true ); 
	$imageIDs = explode(",",$galleryImages);
	$count = count(array_filter($imageIDs));

	//main image
	$file = wp_get_attachment_url($imageIDs[$i-1]);
	$image = get_post_thumb(false, 650, 0, false, $file);	
		
?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
<?php get_template_part(THEME_SINGLE."page-title"); ?>
	<?php if (have_posts()): ?>
	<div class="photo-gallery-block ot-slide-item" id="<?php echo $post->ID;?>">
		<span class="next-image" data-next="<?php echo $i+1;?>"></span>
		<h2><?php the_title();?></h2>

		<div class="page-numbers">
			<a href="javascript:void(0);" class="prev" rel="<?php if($i>1) { echo $i-1; } else { echo $i-1; } ?>"><i class="fa fa-caret-left"></i></a>
			<span><span class="current"><?php echo $i;?></span> <?php _e("of", THEME_NAME);?> <?php echo $count;?></span>
			<a href="javascript:void(0);" class="next" rel="<?php if($i<$count) { echo $i+1; } else { echo $i; } ?>"><i class="fa fa-caret-right"></i></a>
		</div>


		<span class="gal-current-image">
			<div class="loading waiter image-frame">
				<img class="image-big-gallery ot-gallery-image" data-id="<?php echo $i;?>" style="display:none;" src="<?php echo $image['src'];?>" alt="<?php the_title();?>" />
			</div>
		</span>

		<div class="page-numbers">
			<a href="javascript:void(0);" class="prev" rel="<?php if($i>1) { echo $i-1; } else { echo $i-1; } ?>"><i class="fa fa-caret-left"></i></a>
			<span><span class="current"><?php echo $i;?></span> <?php _e("of", THEME_NAME);?> <?php echo $count;?></span>
			<a href="javascript:void(0);" class="next" rel="<?php if($i<$count) { echo $i+1; } else { echo $i; } ?>"><i class="fa fa-caret-right"></i></a>
		</div>

		<?php 
			if (get_the_content() != "") { 				
				add_filter('the_content','remove_images');
				add_filter('the_content','remove_objects');
		?>
			<div class="description">
				<?php the_content();?>
			</div>
		<?php
			} 
		?>	


		<div class="thumbnails the-thumbs">
    		<?php 
        		$c=1;
        		foreach($imageIDs as $id) { 
        			if($id) {
            			$file = wp_get_attachment_url($id);
            			$image = get_post_thumb(false, 110, 110, false, $file);
        	?>
				<a href="javascript:;" rel="<?php echo $c;?>" class="gal-thumbs<?php if($c==$i) { ?> active<?php } ?>" data-nr="<?php echo $c;?>">
					<img src="<?php echo $image['src'];?>" alt="<?php the_title();?>"/>
				</a>
                <?php $c++; ?>
           	 	<?php } ?>
            <?php } ?>
		</div>

	</div>

	<?php else: ?>
		<p><?php  _e('Sorry, no posts matched your criteria.' , THEME_NAME ); ?></p>
	<?php endif; ?>

<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer(); ?>