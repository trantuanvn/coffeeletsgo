<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	//single page titile
	$titleShow = get_post_meta ( OT_page_id(), THEME_NAME."_title_show", true ); 
	$post_type = get_post_type();


?>					

<?php if($titleShow!="no") { ?> 
	<div class="main-head">
		<?php if(is_single() && $post_type==OT_POST_MENU) { ?>
			<?php 
				$menuID = ot_get_page("menu-card");
				$title = get_the_title($menuID[0]);
			?>
			<a href="<?php echo get_page_link(ot_get_page('menu-card', false));?>" class="right"><?php _e("back to Menu Card", THEME_NAME);?></a>
		<?php } else { ?>
			<?php 
				$blogID = get_option('page_for_posts');
				$title = get_the_title($blogID[0]);
			?>
			<a href="<?php echo home_url();?>" class="right"><?php _e("back to Homepage", THEME_NAME);?></a>
		<?php } ?>
		<div class="main-title">
			<h1><?php echo $title;?></h1>
			<div class="ribbon"><div class="inner"></div></div>
			<div class="ribbon-tail"><div class="inner-top"></div><div class="inner-bottom"></div></div>
		</div>
	</div>
<?php } ?>

