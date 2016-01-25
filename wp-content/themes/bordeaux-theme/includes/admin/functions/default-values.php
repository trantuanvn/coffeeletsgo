<?php
	/* -------------------------------------------------------------------------*
	 * 						SET DEFAULT VALUES BY THEME INSTALL					*
	 * -------------------------------------------------------------------------*/
	global $pagenow,$wpdb;
	get_template_part(THEME_INCLUDES."/lib/class-tgm-plugin-activation");

	// Run activation scripts when adding new sites to a multisite installation
	add_action('wpmu_new_blog', 'ot_new_site');

	// with activate istall option
	if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
		$theme_logo = THEME_IMAGE_URL."header-logo.png";
		$theme_logo_f = THEME_IMAGE_URL."logo-footer.png";
		$favicon = THEME_IMAGE_URL."favicon.ico";
		$banner = '	<a href="http://www.orange-themes.com" target="_blank"><img src="'.THEME_IMAGE_URL.'no-banner-728x90.jpg" alt="" title="" /></a>';
		$banner1 = '<a href="http://www.orange-themes.com" target="_blank"><img src="'.get_template_directory_uri().'/images/no-banner-468x60.jpg" alt="" title=""/></a>';
		$copyright = '&copy; '.date("Y").' Copyright <b>'.THEME_FULL_NAME.' theme</b>. All Rights reserved.';
		
		update_option(THEME_NAME."_logo", $theme_logo);
		update_option(THEME_NAME."_favicon", $favicon);
		//update_option(THEME_NAME."_logo_footer", $theme_logo_f);
		update_option(THEME_NAME."_rss_url", get_bloginfo("rss_url"));
		update_option(THEME_NAME.'_copyright', $copyright);
		update_option(THEME_NAME.'_show_first_thumb', "on");
		update_option(THEME_NAME.'_menu_effect', 'on');
		update_option(THEME_NAME.'_sidebar_position', "custom");
		update_option(THEME_NAME.'_page_layout', 'wide');
		update_option(THEME_NAME.'_show_single_thumb', "on");
		update_option(THEME_NAME.'_blog_style', "1");
		update_option(THEME_NAME.'_image_type', "small");
		update_option(THEME_NAME.'_time_format', "european");
		update_option(THEME_NAME.'_time_from', "9");
		update_option(THEME_NAME.'_time_till', "18");
		update_option(THEME_NAME.'_table_count', "12");
		update_option(THEME_NAME.'_email_notifications', "on");
		update_option(THEME_NAME.'_day_0', "on");
		update_option(THEME_NAME.'_day_1', "off");
		update_option(THEME_NAME.'_day_2', "off");
		update_option(THEME_NAME.'_day_3', "off");
		update_option(THEME_NAME.'_day_4', "off");
		update_option(THEME_NAME.'_day_5', "off");
		update_option(THEME_NAME.'_day_6', "on");
		update_option(THEME_NAME.'_gallery_items', "12");
		update_option(THEME_NAME.'_currency_category', "$");



		
		//style settings
		update_option(THEME_NAME.'_responsive', 'on');
		update_option(THEME_NAME.'_similar_posts_gallery', "custom");
		update_option(THEME_NAME.'_sidebar_position', "custom");
		update_option(THEME_NAME.'_post_date', "on");
		update_option(THEME_NAME.'_post_comment', "on");
		update_option(THEME_NAME.'_post_author', "on");
		
		update_option(THEME_NAME.'_google_font_1', 'Capriola');
		update_option(THEME_NAME.'_google_font_2', 'Capriola');
		update_option(THEME_NAME.'_color_1', 'b10700');
		update_option(THEME_NAME.'_color_2', 'b10700');

		update_option(THEME_NAME.'_bg_texture', 'main-body-bg.jpg');
		update_option(THEME_NAME.'_bg_texture_slider', 'footer-background.jpg');
		update_option(THEME_NAME.'_bg_texture_header', 'main-header-wrapper-bg.jpg');

		//custom sql table
		if(is_multisite()) {

			// Get current site
			$old_site = $wpdb->blogid;

			// Get all sites
			$sites = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");

			// Iterate over the sites
			foreach($sites as $site) {
				switch_to_blog($site);
				ot_create_table();
			}

			// Switch back the old site
			switch_to_blog($old_site);

		} else {
			ot_create_table();
		}



}



add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme	
		array(
			'name'     				=> 'Layer Slider', // The plugin name
			'slug'     				=> 'LayerSlider', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory(). '/includes/lib/plugins/layersliderwp-5.1.1.installable.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),	

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     				=> 'Woocommerce', // The plugin name
			'slug'     				=> 'woocommerce', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory(). '/includes/lib/plugins/woocommerce.2.0.20.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'WPBakery Visual Composer', // The plugin name
			'slug'     				=> 'js_composer', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory(). '/includes/lib/plugins/js_composer.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),	
	);


	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> THEME_NAME,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', THEME_NAME ),
			'menu_title'                       			=> __( 'Install Plugins', THEME_NAME ),
			'installing'                       			=> __( 'Installing Plugin: %s', THEME_NAME ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', THEME_NAME ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', THEME_NAME ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', THEME_NAME ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', THEME_NAME ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );
}

/* -------------------------------------------------------------------------*
 * 								CREATE DB TABLE								*
 * -------------------------------------------------------------------------*/

function ot_create_table() {
	global $wpdb;

	$table_name = $wpdb->prefix.THEME_NAME."_reservation"; 

	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
		id int(10) NOT NULL AUTO_INCREMENT,
		page_id bigint(20) NOT NULL,
		name varchar(200) NOT NULL,
		phone varchar(50) NOT NULL,
		email varchar(100) NOT NULL,
		notes text NOT NULL,
		guests int(3) NOT NULL,
		reservationDate int(11) NOT NULL,
		reservationCreated int(11) NOT NULL,
		approve varchar(3) NOT NULL default '',
		edited int(11) NOT NULL,
		UNIQUE KEY id (id)
	) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";

	$wpdb->query($sql);



}

/* -------------------------------------------------------------------------*
 * 								NEW SITE ACTIVATED							*
 * -------------------------------------------------------------------------*/

function ot_new_site($blog_id) {

    // Get WPDB Object
    global $wpdb;

    // Get current site
	$old_site = $wpdb->blogid;

	// Switch to new site
	switch_to_blog($blog_id);

	// Run activation scripts
	layerslider_create_db_table();

	// Switch back the old site
	switch_to_blog($old_site);

}


?>