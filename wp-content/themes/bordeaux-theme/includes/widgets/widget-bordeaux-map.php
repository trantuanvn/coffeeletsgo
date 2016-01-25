<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_map");'));

class OT_map extends WP_Widget {
	function OT_map() {
		 parent::WP_Widget(false, $name = THEME_FULL_NAME.' Google Map');	
	}

	function form($instance) {
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => "Where To Find Us",
			'url' => '',

		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = esc_attr($instance['title']);
		$url = esc_attr($instance['url']);

		

        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __( 'Widget Title:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('url'); ?>"><?php printf ( __( 'Google map URL:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" /></label></p>

        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['url'] = $new_instance['url'];


		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $url = stripslashes($instance['url']);

		

?>		
	<?php echo $before_widget; ?>
		<?php if($title) echo $before_title.$title.$after_title; ?>
			<div class="contact-map">
				<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $url;?>&amp;output=embed"></iframe>
			</div>
			<a href="<?php echo $url;?>" class="footer-map-link" target="_blank"><i class="fa fa-map-marker"></i><?php _e("View Full Map", THEME_NAME);?></a>
	<?php echo $after_widget; ?>
		
	
      <?php
	}
}

?>
