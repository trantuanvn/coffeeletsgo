<?php
	wp_reset_query();

	$sidebar = get_post_meta( OT_page_ID(), THEME_NAME.'_sidebar_select', true );

	if(is_category()) {
		$sidebar = ot_get_option( get_cat_id( single_cat_title("",false) ), 'sidebar_select', false );
	}


	if ( $sidebar=='' || is_search()) {
		$sidebar='default';
	}	

?>
	<!-- BEGIN .sidebar-content -->
	<div class="sidebar-content woocommerce <?php OT_sidebarClass(OT_page_ID());?>">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?>
		<?php endif; ?>
	<!-- END .sidebar-content -->
	</div>
<?php wp_reset_query();  ?>