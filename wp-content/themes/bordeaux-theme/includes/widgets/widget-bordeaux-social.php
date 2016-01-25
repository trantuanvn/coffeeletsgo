<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_social");'));

class OT_social extends WP_Widget {
	function OT_social() {
		 parent::WP_Widget(false, $name = THEME_FULL_NAME.' Social Widget');	
	}

	function form($instance) {
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => "Social Networks",
			'twitter' => '',
			'facebook' => '',
			'linkedin' => '',
			'rss' => '',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = esc_attr($instance['title']);
		$twitter = esc_attr($instance['twitter']);
		$facebook = esc_attr($instance['facebook']);
		$linkedin = esc_attr($instance['linkedin']);
		$rss = esc_attr($instance['rss']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __( 'Title:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('twitter'); ?>"><?php printf ( __( 'Twitter account URL:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('facebook'); ?>"><?php printf ( __( 'Facebook account URL:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php printf ( __( 'LinkedIn account URL:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo $linkedin; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('rss'); ?>"><?php printf ( __( 'RSS URL:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo $rss; ?>" /></label></p>

        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['twitter'] = strip_tags($new_instance['twitter']);
		$instance['facebook'] = strip_tags($new_instance['facebook']);
		$instance['linkedin'] = strip_tags($new_instance['linkedin']);
		$instance['rss'] = strip_tags($new_instance['rss']);

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $twitter = $instance['twitter'];
        $facebook = $instance['facebook'];
        $linkedin = $instance['linkedin'];
        $rss = $instance['rss'];


		wp_reset_query();

		$link = home_url();
		

?>		
	<?php echo $before_widget; ?>
		<?php if($title) echo $before_title.$title.$after_title; ?>
				<div class="widget-soc">
					<ul>
						<?php if($twitter) { ?>
							<li class="twitter"><a href="<?php echo $twitter;?>" tareget="_blank"><?php _e("Follow us on <b>Twitter</b>", THEME_NAME);?></a></li>
						<?php } ?>
						<?php if($facebook) { ?>	
							<li class="facebook"><a href="<?php echo $facebook;?>" tareget="_blank"><?php _e("Friend us on <b>Facebook</b>", THEME_NAME);?></a></li>
						<?php } ?>	
						<?php if($linkedin) { ?>
							<li class="linkedin"><a href="<?php echo $linkedin;?>" tareget="_blank"><?php _e("Check us out on <b>Linked In</b>", THEME_NAME);?></a></li>	
						<?php } ?>
						<?php if($rss) { ?>
							<li class="rss"><a href="<?php echo $rss;?>" tareget="_blank"><?php _e("Check out our <b>RSS feeds</b>", THEME_NAME);?></a></li>	
						<?php } ?>
					</ul>
				</div>

	<?php echo $after_widget; ?>
		
	
      <?php
	}
}

?>
