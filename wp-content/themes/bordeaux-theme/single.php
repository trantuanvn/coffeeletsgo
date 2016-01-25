<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	get_header();
	$post_type = get_post_type();
	$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
	$sidebarPositionCustom = get_post_meta ( $post->ID, THEME_NAME."_sidebar_position", true ); 


	if($post_type == OT_POST_GALLERY) {
		get_template_part(THEME_INCLUDES.'gallery-single','style-1');
	} elseif($post_type == OT_POST_MENU) {
		get_template_part(THEME_INCLUDES.'menu','single');
		get_footer();
	} else {
		get_template_part(THEME_INCLUDES.'news','single');
		get_footer();
	}
	
	
?>