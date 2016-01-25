<?php

	//social share icons
	$shareAll = get_option(THEME_NAME."_share_all");
	$shareSingle = get_post_meta( $post->ID, THEME_NAME."_share_single", true ); 
	$image = get_post_thumb($post->ID,0,0); 
?>

		<?php if($shareAll == "show" || ($shareAll=="custom" && $shareSingle=="show") ) { ?>
				<hr />
				<div>
					<a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" data-url="<?php the_permalink();?>" data-url="<?php the_permalink();?>" class="soc-share i-facebook ot-share">
						<i class="fa fa-facebook"></i><?php _e("Facebook", THEME_NAME);?><span class="count">0</span>
					</a>
				</div>
				<div>
					<a href="#" data-hashtags="" data-url="<?php the_permalink();?>" data-via="<?php echo get_option(THEME_NAME.'_twitter_name');?>" data-text="<?php the_title();?>" class="soc-share i-twitter ot-tweet">
						<i class="fa fa-twitter"></i><?php _e("Twitter", THEME_NAME);?><span class="count">0</span>
					</a>
				</div>
				<div>
					<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="soc-share i-google ot-pluss">
						<i class="fa fa-google-plus"></i><?php _e("Google+", THEME_NAME);?><span class="count"><?php echo OT_plusones(get_permalink());?></span>
					</a>
				</div>
				<div>
					<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $image['src']; ?>&description=<?php the_title(); ?>" data-url="<?php the_permalink();?>" class="soc-share i-pinterest ot-pin">
						<i class="fa fa-pinterest"></i><?php _e("Pinterest", THEME_NAME);?><span class="count">0</span>
					</a>
				</div>
				<div>
					<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title();?>" data-url="<?php the_permalink();?>" class="soc-share i-linkedin ot-link">
						<i class="fa fa-linkedin"></i><?php _e("Linkedin", THEME_NAME);?><span class="count">0</span></a>
				</div>
		<?php } ?>