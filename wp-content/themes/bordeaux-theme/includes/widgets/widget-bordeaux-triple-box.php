<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_triple_box");'));

class OT_triple_box extends WP_Widget {
	function OT_triple_box() {
		 parent::WP_Widget(
		 	false, 
		 	$name = THEME_FULL_NAME.' Triple Box',
		 	array( 'description' => __( "Populat posts, latest comments and recent news widget.", THEME_NAME ))
		 );	
	}

	function form($instance) {
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => '',
			'count_p' => '3',
			'count_r' => '3',
			'count_c' => '3',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = esc_attr($instance['title']);
		$count_r = esc_attr($instance['count_r']);
		$count_p = esc_attr($instance['count_p']);
		$count_c = esc_attr($instance['count_c']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __( 'Widget Title:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

			
			<p><label for="<?php echo $this->get_field_id('count_p'); ?>"><?php printf ( __( 'Populat Post count:' , THEME_NAME ));?> <input class="widefat" id="<?php echo $this->get_field_id('count_p'); ?>" name="<?php echo $this->get_field_name('count_p'); ?>" type="text" value="<?php echo $count_p; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('count_r'); ?>"><?php printf ( __( 'Recent Post count:' , THEME_NAME ));?> <input class="widefat" id="<?php echo $this->get_field_id('count_r'); ?>" name="<?php echo $this->get_field_name('count_r'); ?>" type="text" value="<?php echo $count_r; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('count_c'); ?>"><?php printf ( __( 'Comment count:' , THEME_NAME ));?> <input class="widefat" id="<?php echo $this->get_field_id('count_c'); ?>" name="<?php echo $this->get_field_name('count_c'); ?>" type="text" value="<?php echo $count_c; ?>" /></label></p>

		
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count_p'] = strip_tags($new_instance['count_p']);
		$instance['count_r'] = strip_tags($new_instance['count_r']);
		$instance['count_c'] = strip_tags($new_instance['count_c']);

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$countP = $instance['count_p'];
		$countR = $instance['count_r'];
		$countC = $instance['count_c'];

		//popular post args
		$argsP = array(
			'posts_per_page' => $countP,
			'order' => 'DESC',
			'orderby'	=> 'meta_value_num',
			'meta_key'	=> THEME_NAME.'_post_views_count',
			'post_type'=> 'post'
		);

		//recent post args
		$argsR=array(
			'posts_per_page'=> $countR
		);

		//commnet post args
		$argsC =	array(
			'status' => 'approve', 
			'order' => 'DESC',
			'number' => $countC
		);	
		$comments = get_comments($argsC);
		$totalCount = count($comments);

		$the_query_p = new WP_Query($argsP);
		$the_query_r = new WP_Query($argsR);
		
		//post counts
		$totalCountP = $the_query_p->found_posts;
		$totalCountR = $the_query_r->found_posts;
		
		$blogID = get_option('page_for_posts');
		

		$postDate = get_option(THEME_NAME."_post_date");
		$postComments = get_option(THEME_NAME."_post_comment");
?>		
	<?php echo $before_widget; ?>
		<?php if($title) echo $before_title.$title.$after_title; ?>
			<div class="tabs">

				<ul class="tab-navi">
					<li class="active"><a href="#"><span><?php _e("Popular", THEME_NAME);?></span></a></li>
					<li><a href="#"><span><?php _e("Recent", THEME_NAME);?></span></a></li>
					<li><a href="#"><span><?php _e("Comments", THEME_NAME);?></span></a></li>
				</ul>

				<!-- BEGIN .latest-activity -->
				<div class="latest-activity active">
					<?php if ($the_query_p->have_posts()) : while ($the_query_p->have_posts()) : $the_query_p->the_post(); ?>
					<?php 
						$image = get_post_thumb($the_query_p->post->ID,0,0); 
					?>	
						<div class="activity-item<?php if($image['show']!=true) { ?> no-image<?php } ?>">
							<div class="image">
								<?php if($image['show']==true) { ?>
									<a href="<?php the_permalink();?>">
										<?php echo ot_image_html($the_query_p->post->ID,60,60); ?>
									</a>
								<?php } ?>
							</div>
							<div class="text">
								<h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
								<p><a href="<?php the_permalink();?>" class="more-link"><i><?php _e("Read more", THEME_NAME);?></i></a></p>
							</div>
						</div>
					<?php endwhile; else: ?>
						<p><?php  _e( 'No posts where found' , THEME_NAME);?></p>
					<?php endif; ?>
				<!-- END .latest-activity -->
				</div>

				<!-- BEGIN .latest-activity -->
				<div class="latest-activity">
					<?php if ($the_query_r->have_posts()) : while ($the_query_r->have_posts()) : $the_query_r->the_post(); ?>
					<?php 
						$image = get_post_thumb($the_query_r->post->ID,0,0); 
					?>	
						<div class="activity-item<?php if($image['show']!=true) { ?> no-image<?php } ?>">
							<div class="image">
								<?php if($image['show']==true) { ?>
									<a href="<?php the_permalink();?>">
										<?php echo ot_image_html($the_query_r->post->ID,60,60); ?>
									</a>
								<?php } ?>
							</div>
							<div class="text">
								<h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
								<p><a href="<?php the_permalink();?>" class="more-link"><i><?php _e("Read more", THEME_NAME);?></i></a></p>
							</div>
						</div>
					<?php endwhile; else: ?>
						<p><?php  _e( 'No posts where found' , THEME_NAME);?></p>
					<?php endif; ?>
				<!-- END .latest-activity -->
				</div>

				<!-- BEGIN .latest-activity -->
				<div class="latest-activity">
				<?php		
					foreach($comments as $comment) {
						if($comment->user_id && $comment->user_id!="0") {
							$authorName = get_the_author_meta('display_name',$comment->user_id );
						} else {
							$authorName = $comment->comment_author;
						}
				?>

					<div class="activity-item">
						<div class="image">
							<a href="<?php echo get_comment_link($comment);?>">
								<img src="<?php echo get_avatar_url(get_avatar( $comment, 60));?>" alt="<?php echo $authorName; ?>" />
							</a>
						</div>
						<div class="text">
							<h5><a href="<?php echo get_comment_link($comment);?>"><?php echo $authorName; ?></a></h5>
							<p><?php comment_excerpt($comment->comment_ID);?></p>
							<p><a href="<?php echo get_comment_link($comment);?>" class="more-link"><i><?php _e("View article", THEME_NAME);?></i></a></p>
						</div>
					</div>
				<?php } ?>
				<!-- END .latest-activity -->
				</div>

			</div>

	<?php echo $after_widget; ?>
		
	
      <?php
	}
}
?>
