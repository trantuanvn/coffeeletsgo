<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_gallery");'));

class OT_gallery extends WP_Widget {
	function OT_gallery() {
		 parent::WP_Widget(false, $name = THEME_FULL_NAME.' Latest Galleries');	
	}

	function form($instance) {
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => '',
			'count' => '12',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = esc_attr($instance['title']);
		$count = esc_attr($instance['count']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php  printf ( __( 'Title:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php  printf ( __( 'Galleries shown:' , THEME_NAME ));?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>

        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);
		$instance['color'] = strip_tags($new_instance['color']);
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$count = $instance['count'];
		$counter=1;
		if(!$count) $count=12;

		$my_query = new WP_Query(array('post_type' => 'gallery', 'showposts' => $count));  

		
		$totalCount = $my_query->found_posts;
        ?>
        <?php echo $before_widget; ?>
			<?php if($title) echo $before_title.$title.$after_title; ?>
			<div class="popular-galleries">
				<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
					<?php
						global $post;
						$g = $my_query->post->ID;
						$gallery_style = get_post_meta ( $g, THEME_NAME."_gallery_style", true );
						$galleryImages = get_post_meta ( $g, THEME_NAME."_gallery_images", true ); 
						$imageIDs = explode(",",$galleryImages);
						$c=1;
						$images = array();
						foreach($imageIDs as $id) { 
							if($id) {
								$file = wp_get_attachment_url($id);
								$images[$c] = get_post_thumb(false, 51, 51, false, $file);
								
							} else {
								$images[$c] = get_post_thumb($post->ID, 51, 51);
							}
							$c++;
						}
					?>
						<a href="<?php the_permalink();?>" class="<?php if($gallery_style=="lightbox") { echo 'light-show '; } ?>" data-id="gallery-<?php the_ID(); ?>">
							<img src="<?php echo $images[1]['src'];?>" alt="<?php the_title();?>" />
						</a>

				<?php $counter++; ?>
				<?php endwhile; ?>
				<?php endif; ?>	
				</div>
		<?php echo $after_widget; ?>	
        <?php
	}
}
?>
