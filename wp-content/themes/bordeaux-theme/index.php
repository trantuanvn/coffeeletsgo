<?php 
	global $query_string, $post;
	$post_type = get_post_type();

	
	if($post_type == OT_POST_GALLERY) {
		get_template_part("template","gallery");
	} else {
		get_header();
		get_template_part(THEME_INCLUDES."news");
		get_footer();
	}
?>