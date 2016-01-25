<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_contact");'));

class OT_contact extends WP_Widget {
	function OT_contact() {
		 parent::WP_Widget(false, $name = THEME_FULL_NAME.' Contact Information');	
	}

	function form($instance) {
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => "Contact Information",
			'name' => '',
			'address' => '',
			'phone' => '',
			'email' => '',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = esc_attr($instance['title']);
		$name = esc_attr($instance['name']);
		$address = esc_attr($instance['address']);
		$phone = esc_attr($instance['phone']);
		$email = esc_attr($instance['email']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __( 'Widget Title:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('name'); ?>"><?php printf ( __( 'Restaurant Name:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo $name; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('address'); ?>"><?php printf ( __( 'Address:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo $address; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('phone'); ?>"><?php printf ( __( 'Phone:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('email'); ?>"><?php printf ( __( 'Email:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></label></p>

        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['name'] = strip_tags($new_instance['name']);
		$instance['address'] = strip_tags($new_instance['address']);
		$instance['phone'] = strip_tags($new_instance['phone']);
		$instance['email'] = strip_tags($new_instance['email']);

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $name = stripslashes($instance['name']);
        $address = stripslashes($instance['address']);
        $phone = $instance['phone'];
        $email = $instance['email'];


		wp_reset_query();

		$link = home_url();
		

?>		
	<?php echo $before_widget; ?>
		<?php if($title) echo $before_title.$title.$after_title; ?>
	
			<div class="contact-info">
				<?php if($name || $address) { ?>
					<div class="address">
						<?php if($name) { ?>
							<p><b><?php echo $name;?></b></p>
						<?php } ?>
						<?php if($name) { ?>
							<p><?php echo $address;?></p>
						<?php } ?>
					</div>
				<?php } ?>
				<?php if($name) { ?>
					<div class="phone">
						<p><?php echo $phone;?></p>
					</div>
				<?php } ?>
				<?php if($email) { ?>
					<div class="email">
						<p><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></p>
					</div>
				<?php } ?>
			</div>


	<?php echo $after_widget; ?>
		
	
      <?php
	}
}

?>
