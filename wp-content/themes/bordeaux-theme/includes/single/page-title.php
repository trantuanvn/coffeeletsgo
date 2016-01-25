<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	//single page titile
	$titleShow = get_post_meta ( OT_page_id(), THEME_NAME."_title_show", true ); 
	$post_type = get_post_type();
?>					

<?php if($titleShow!="no" && !is_page_template("template-menu-card.php") && !is_page_template("template-menu-card-shop.php")) { ?> 
	<div class="main-head">
		<?php if(is_single() && $post_type==OT_POST_GALLERY) { ?>
			<a href="<?php echo get_page_link(ot_get_page('gallery', false));?>" class="right"><?php _e("show all Photo galleries", THEME_NAME);?></a>
		<?php } else { ?>
			<a href="<?php echo home_url();?>" class="right"><?php _e("back to Homepage", THEME_NAME);?></a>
		<?php } ?>
		<div class="main-title">
			<h1><?php echo ot_page_title();?></h1>
			<div class="ribbon"><div class="inner"></div></div>
			<div class="ribbon-tail"><div class="inner-top"></div><div class="inner-bottom"></div></div>
		</div>
	</div>
<?php } ?>
<?php if($titleShow!="no" && is_page_template("template-menu-card.php") || is_page_template("template-menu-card-shop.php")) { ?>
	<div class="main-head menu-card-title">
		<a href="<?php echo get_page_link(ot_get_page("reservations", false));?>" class="right"><?php _e("check &amp; order your Reservation", THEME_NAME);?></a>
		<div class="main-title">
			<h1><?php echo ot_page_title();?></h1>
			<div class="ribbon-tail"><div class="inner-top"></div><div class="inner-bottom"></div></div>
			<div class="ribbon-tail left"><div class="inner-top"></div><div class="inner-bottom"></div></div>
		</div>
	</div>
<?php } ?>
