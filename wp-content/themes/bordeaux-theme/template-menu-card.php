<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
Template Name: Menu Card
*/	


	$taxonomy = OT_POST_MENU."-cat";

	//get all menu car categories
	$categories = get_categories("hide_empty=0&taxonomy=$taxonomy&hierarchical=1");
	
	//category custom order
	$options = get_option(THEME_NAME."_category_order");

	$order = $options[0];
	
	$categories = ot_category_order($order,$categories);



?>
<?php get_header(); ?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php get_template_part(THEME_SINGLE."page-title"); ?>
	<a href="#" class="menu-card-previous">&nbsp;</a>
	<a href="#" class="menu-card-next">&nbsp;</a>
	<?php 
		if($categories) {
			$pageCount=0;
			$sliderCount=1;

			foreach($categories as $category) {
				if($category->parent==0) {
				
					$pageCount++;

					//first page wrap
					if($pageCount==1) { 
					?>
						<!-- BEGIN .menu-card-count -->
						<div class="menu-card-count">
							<!-- BEGIN .menu-card-left -->
							<div class="menu-card-left" id="cardpageid-<?php echo $sliderCount;?>">
								<div class="menu-card-block">
				<?php 
					}
					// next page wrap
					if($pageCount%2==1 && $pageCount!=1) {
						$sliderCount++;
				?>
							</div>

						<!-- END .menu-card-right -->
						</div>

						<div class="clear-float"></div>

					<!-- END .menu-card-count -->
					</div>
																	

					<!-- BEGIN .menu-card-count -->
					<div class="menu-card-count" id="cardpageid-<?php echo $sliderCount;?>">
							
						<!-- BEGIN .menu-card-left -->
						<div class="menu-card-left">

							<div class="menu-card-block">

				<?php 
					// page right side wrap
					} elseif($pageCount%2==0) {
				?>
						</div>
						
					<!-- END .menu-card-left -->
					</div>

					
					<!-- BEGIN .menu-card-right -->
					<div class="menu-card-right">

						<div class="menu-card-block">
				<?php
					}

					echo '<h2 class="title-red">'.$category->name.'</h2>'; 
					
					//*** category description ***//
					$cat_description=$category->description;
					echo "<p>".$cat_description."<p>";	
					
					$sub_cats=get_categories("hide_empty=1&taxonomy=".$taxonomy."&child_of=".$category->term_id);
					
					if(!empty($sub_cats)) {
							
						$cat=$category->term_id;
						if (array_key_exists($cat, $options)) {
							$order = $options[$cat];
						}

						$sub_cats = ot_category_order($order,$sub_cats);


							
						foreach($sub_cats as $sub_cat) {
							echo "<h4>$sub_cat->name</h4>";
							
							//*** category description ***//
							$scat_description=$sub_cat->description;
							echo "<p>".$scat_description."<p>";	
							
							$terms=$sub_cat->term_id;

							$args = array(
								'post_type' => OT_POST_MENU,
								'posts_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => $taxonomy,
										'field' => 'id',
										'terms' => $terms,
									)
								),
								'orderby'=>'menu_order',
								'order'=>'DESC'
							);
							
							$my_query = new WP_Query( $args);
							if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post();
							$thePostID = $post->ID;
								
							$image = get_post_thumb($thePostID,54,54,"menu_item_slider");
							$image_hover = get_post_thumb($thePostID,180,180,"menu_item_slider_hover");
								
							$price=get_post_meta($thePostID, THEME_NAME.'_price', true);
								
							$bordeaux_currency=get_option(THEME_NAME.'_currency_category');

						?>
							<div class="menu-card-item">
								<a href="<?php the_permalink(); ?>" class="image tooltip" title="<?php echo $image_hover['src'];?>">
									<img src="<?php echo $image['src'];?>" alt="<?php the_title(); ?>" />
								</a>
								<?php if($price) { ?>
									<span class="price right"><?php echo $bordeaux_currency.$price;?></span>
								<?php } ?>
								<span class="menu-text">
									<p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
									<?php 
										add_filter('excerpt_length', 'new_excerpt_length_20');
										the_excerpt(); 
									?>
								</span>
								<div class="clear-float"></div>
							</div>


						<?php
							
						endwhile; else: endif; 
							
						} //end foreach
							
					} //end if sub_cats
						
				}//end if 
				
			} // end foreach

		?>
		
		
</div>

<!-- END .menu-card-right -->
</div>

<div class="clear-float"></div>

<!-- END .menu-card-count -->
</div>
<?php 

	$count_posts = wp_count_posts(OT_POST_MENU);
	$published_posts = $count_posts->publish;

	} else if($published_posts==0){
	echo "<span style=\"color:#000; font-size:14pt;\">".__("You need to add at least one post in the menu card, you can do it", THEME_NAME)." <a  style=\"color:#fff; font-size:14pt;\" href=\"".admin_url()."post-new.php?post_type=menu-card\">".__("here", THEME_NAME)."</a>!</span>";
	}
	else if(!$categories){
	echo "<span style=\"color:#000; font-size:14pt;\">".__("You need to add at least one category and one sub-category for the menu card, you can do it  ", THEME_NAME)."<a  style=\"color:#fff; font-size:14pt;\" href=\"".admin_url()."post-new.php?post_type=menu-card\">".__("here", THEME_NAME)."</a>!</span>";
	}
?>	

<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer(); ?>