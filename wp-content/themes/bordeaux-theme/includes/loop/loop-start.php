<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();
	$post_type = get_post_type();

?>
	<?php if(!is_page_template("template-homepage.php")) { ?>
		<div class="content-white">
			
			<!-- BEGIN .main-content -->
			<div class="main-content <?php if(!is_page_template("template-full-width.php") && !is_page_template("template-menu-card.php") && !is_page_template("template-menu-card-shop.php") && $post_type!=OT_POST_GALLERY || is_search()) { OT_content_class(OT_page_ID()); } ?>">
	<?php } ?>