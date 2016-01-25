<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	$page_layout = get_option(THEME_NAME."_page_layout");

	//logo settings
	$logo = get_option(THEME_NAME.'_logo');	

	//feedback settings
	$feedbackBlock = get_option(THEME_NAME.'_feedback_block');	


	// layer slider
	$slider = get_post_meta ( ot_page_id(), THEME_NAME."_layer_slider_settings", true ); 
	$sliderId = get_post_meta ( ot_page_id(), THEME_NAME."_layer_slider", true ); 
	if(!$sliderId) $sliderId = 1;

	// menu slider
	$menuSlider = get_post_meta ( ot_page_id(), THEME_NAME."_menu_slider", true ); 
	$menuSliderType = get_post_meta ( ot_page_id(), THEME_NAME."_menu_slider_type", true ); 

?>


		<!-- BEGIN .boxed -->
		<div class="boxed<?php echo $page_layout=="boxed" ? " active" : false; ?>">
			
			<!-- BEGIN .header -->
			<div class="header">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">

					<div class="header-logo">
						<?php if($logo) { ?>
							<a href="<?php echo home_url(); ?>"><img src="<?php echo $logo;?>" alt="<?php bloginfo('name'); ?>"/></a>
						<?php } else { ?>
							<h1 class="logo-text"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
						<?php } ?>
					</div>
					<?php if($feedbackBlock=="on") { ?>
						<div class="feedback-block">
							<?php 
								for($i=1; $i<=3; $i++) { 
									$feedbackImage = get_option(THEME_NAME.'_feedback_image_'.$i);		
									$feedbackName = get_option(THEME_NAME.'_feedback_name_'.$i);		
									$feedbackText = get_option(THEME_NAME.'_feedback_text_'.$i);		
									$feedbackRating = get_option(THEME_NAME.'_feedback_rating_'.$i);		

							?>

								<div class="feedback-item"<?php if($feedbackImage) { ?> style="background-image: url(<?php echo $feedbackImage;?>);"<?php } ?>>
									<?php if($feedbackText) { ?>
										<p class="text">
											<span><?php echo stripcslashes($feedbackText);?></span>
										</p>
									<?php } ?>
									<p class="author">
										<?php if($feedbackName) { ?>
											<span>- <?php echo stripcslashes($feedbackName);?></span>
										<?php } ?>
										<?php 
											if($feedbackRating!=0) { 
												for($ii=1; $ii<=$feedbackRating; $ii++) {
										?>
											<img src="<?php echo THEME_IMAGE_URL;?>ico-star-1.png" alt="<?php _e("Star", THEME_NAME);?>" width="11" height="11">
										<?php 	
												} //end for 
											} //end if 
										?>
									</p>
								</div>
							<?php } ?>

						</div>
					<?php } ?>
				<!-- END .wrapper -->
				</div>
				
			<!-- END .header -->
			</div>

			<!-- BEGIN .main-menu-custom -->
			<div class="main-menu-custom">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">

					<div class="ribbon-left"></div>
					<div class="ribbon-right"></div>

					<?php	
		
						wp_reset_query();
						if ( function_exists( 'register_nav_menus' )) {
							$walker = new OT_Walker;

							$args = array(
								'container' => '',
								'theme_location' => 'main-menu',
								'items_wrap' => '<ul class="%2$s" rel="'.__("Main Menu", THEME_NAME).'">%3$s</ul>',
								'depth' => 3,
								"echo" => false,
								'walker' => $walker
							);
										
										
							if(has_nav_menu('main-menu')) {
								echo wp_nav_menu($args);		
							} else {
								echo "<ul rel=\"".__("Main Menu", THEME_NAME)."\"><li class=\"navi-none\"><a href=\"".admin_url("nav-menus.php") ."\">Please set up ".THEME_FULL_NAME." menu!</a></li></ul>";
							}		

						}
					?>
					
				<!-- END .wrapper -->
				</div>
			<!-- END .main-menu-custom -->
			</div>

			<?php if($slider=="on" && is_page_template("template-homepage.php")) { ?>
				<!-- BEGIN .slider-content -->
				<div class="slider-content">
					
					<!-- BEGIN .wrapper -->
					<div class="wrapper">
						
					
						
					<!-- END .wrapper -->
					</div>
					
				<!-- END .slider-content -->
				</div>
			<?php } ?>

			<?php if($menuSlider=="yes" && !is_page_template("template-homepage.php")) { ?>
			<?php
					//slider type
        			if($menuSliderType=="menu card items") {
        				//latest posts & posts by cat
						$args=array(
							'posts_per_page' => 35,
							'order'	=> 'DESC',
							'orderby'	=> 'date',
							'post_type'	=> OT_POST_MENU,
							'ignore_sticky_posts '	=> 1,
							'post_status '	=> 'publish',
							'meta_key'	=> THEME_NAME.'_menu_slider_post',
							'meta_value'	=> 'yes',
						);
        			} else if($menuSliderType=="shop items") {
        				//popular posts
						$args=array(
							'posts_per_page' => 35,
							'order'	=> 'DESC',
							'orderby'	=> 'date',
							'post_type'	=> 'product',
							'ignore_sticky_posts '	=> 1,
							'post_status '	=> 'publish',
							'meta_key'	=> '_featured',
							'meta_value'	=> 'yes',
						);
        			} else if($menuSliderType=="both") {
        				//latest rated posts & rated by cat
						$args=array(
							'posts_per_page' => 35,
							'order'	=> 'DESC',
							'orderby'	=> 'date',
							'post_type'	=> array(OT_POST_MENU,'product'),
							'ignore_sticky_posts '	=> 1,
							'post_status '	=> 'publish',
						   	'meta_query' => array(
						        'relation' => 'OR',
						        array(
						            'key' => '_featured',
						            'value' => 'yes',
						            'compare' => '='
						        ),
						        array(
						            'key' => THEME_NAME.'_menu_slider_post',
						            'value' => 'yes',
						            'compare' => '='
						        )
						    )
						);
        			} 

					$the_query = new WP_Query($args);
					$postCount = $the_query->post_count;
					$counter=1;
					$bordeaux_currency = get_option(THEME_NAME.'_currency_category');

			?>
				<!-- BEGIN .slider-content -->
				<div class="slider-content">
					
					<!-- BEGIN .wrapper -->
					<div class="wrapper">
						
						<div class="content-slider">

							<div class="content-items">
							
								<ul class="content-block">
									<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
									<?php 
										$price = get_post_meta($the_query->post->ID, THEME_NAME.'_price', true); 
										$image = get_post_thumb($the_query->post->ID,70,70,"menu_item_slider");
										$image_hover = get_post_thumb($the_query->post->ID,180,180,"menu_item_slider_hover");
										$menuSliderTooltip = get_option(THEME_NAME."_menu_slider_tooltip");
									?>
										<li class="content-item">
											<a href="<?php the_permalink();?>" class="image<?php if($menuSliderTooltip=="on") { ?> tooltip<?php } ?>" title="<?php if($menuSliderTooltip=="on") { echo $image_hover['src'];  } else { the_title(); } ?>">
												<?php if($price && $menuSliderType=="menu card items") { ?>
													<span class="price"><?php echo $bordeaux_currency.$price;?></span>
												<?php 
													} else if($menuSliderType!="menu card items") { 
														global $product;
														if($price) {
															$priceHTML ='<span class="price">'.$bordeaux_currency.$price.'<span></span></span>';
														} else if ( $product && $price_html = $product->get_price_html() ) {
															$priceHTML ='<span class="price">'.$price_html.'<span></span></span>';
														} else {
															$priceHTML= false;	
														}
														echo $priceHTML;
													} 
												?>
												<img src="<?php echo $image['src'];?>" alt="<?php the_title(); ?>" />
											</a>
										</li>
									<?php if($counter%7==0 && $counter!=$postCount) { ?>
										</ul>
										<ul class="content-block">
									<?php } ?>
									<?php $counter++; ?>
									<?php endwhile; else: ?>
										<li><?php  _e( 'No posts where found' , THEME_NAME);?></li>
									<?php endif; ?>
								</ul>


							</div>

							<div id="slider-control-wrapper"><div id="slider-control"></div></div>

						</div>
						
					<!-- END .wrapper -->
					</div>
					
				<!-- END .slider-content -->
				</div>
			<?php } ?>

			<?php if($slider=="yes") { ?>
				<!-- BEGIN .slider-content -->
				<div class="slider-content">
					
					<!-- BEGIN .wrapper -->
					<div class="wrapper">

						<?php layerslider($sliderId); ?>
						
					<!-- END .wrapper -->
					</div>
					
				<!-- END .slider-content -->
				</div>	
			<?php } ?>		
			<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">