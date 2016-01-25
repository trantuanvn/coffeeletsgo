<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();
	$post_type = get_post_type();


?>
<?php if(!is_page_template("template-homepage.php")) { ?>
		<?php 
			if(!is_page_template("template-menu-card.php") && !is_page_template("template-menu-card-shop.php")) {
		?>
			<div class="main-spacer"></div>

			<p class="show-all"><a href="<?php echo home_url();?>"><span><?php _e("Back to Homepage", THEME_NAME);?></span></a></p>
			<p class="back-top"><a href="#top"><span><?php _e("go back to the top", THEME_NAME);?></span></a></p>
		<?php } ?>
		<!-- END .main-content -->
		</div>
		<?php 
			if(!is_page_template("template-full-width.php") && !is_page_template("template-menu-card.php") && !is_page_template("template-menu-card-shop.php") && $post_type!=OT_POST_GALLERY || is_search()) {
				ot_get_sidebar(OT_page_ID());
			} 
		?>
		<div class="clear-float"></div>
	</div>
<?php } ?>

				