<?php
global $OTfields;
$orangeThemes_general_options= array(



/* ------------------------------------------------------------------------*
 * HOME SETTINGS
 * ------------------------------------------------------------------------*/   

array(
	"type" => "homepage_blocks",
	"title" => __("Homepage Blocks:", THEME_NAME),
	"id" => $OTfields->themeslug."_homepage_blocks",
	"blocks" => array(
		array(
			"title" => __("3 Info Blocks", THEME_NAME),
			"type" => "homepage_info",
			"options" => array(
				array( "type" => "title", "title" => __("Block 1:",THEME_NAME), "home" => "yes" ),
				array( "type" => "upload", "id" => $OTfields->themeslug."_homepage_info_image_1", "title" => __("Image:",THEME_NAME), "home" => "yes" ),
				array( "type" => "input", "id" => $OTfields->themeslug."_homepage_info_title_1", "title" => __("Title:",THEME_NAME), "home" => "yes" ),
				array( "type" => "textarea", "id" => $OTfields->themeslug."_homepage_info_text_1", "title" => __("Text:",THEME_NAME), "home" => "yes" ),
				array( "type" => "input", "id" => $OTfields->themeslug."_homepage_info_url_1", "title" => __("Read More URL:",THEME_NAME), "home" => "yes" ),

				array( "type" => "title", "title" => __("Block 2:",THEME_NAME), "home" => "yes" ),
				array( "type" => "upload", "id" => $OTfields->themeslug."_homepage_info_image_2", "title" => __("Image:",THEME_NAME), "home" => "yes" ),
				array( "type" => "input", "id" => $OTfields->themeslug."_homepage_info_title_2", "title" => __("Title:",THEME_NAME), "home" => "yes" ),
				array( "type" => "textarea", "id" => $OTfields->themeslug."_homepage_info_text_2", "title" => __("Text:",THEME_NAME), "home" => "yes" ),
				array( "type" => "input", "id" => $OTfields->themeslug."_homepage_info_url_2", "title" => __("Read More URL:",THEME_NAME), "home" => "yes" ),
				
				array( "type" => "title", "title" => __("Block 3:",THEME_NAME), "home" => "yes" ),
				array( "type" => "upload", "id" => $OTfields->themeslug."_homepage_info_image_3", "title" => __("Image:",THEME_NAME), "home" => "yes" ),
				array( "type" => "input", "id" => $OTfields->themeslug."_homepage_info_title_3", "title" => __("Title:",THEME_NAME), "home" => "yes" ),
				array( "type" => "textarea", "id" => $OTfields->themeslug."_homepage_info_text_3", "title" => __("Text:",THEME_NAME), "home" => "yes" ),
				array( "type" => "input", "id" => $OTfields->themeslug."_homepage_info_url_3", "title" => __("Read More URL:",THEME_NAME), "home" => "yes" ),
			),
		),
		array(
			"title" => __("Latest Menu Card/Shop Items", THEME_NAME),
			"type" => "homepage_news_block",
			"options" => array(
				array( "type" => "input", "id" => $OTfields->themeslug."_homepage_news_block_title", "title" => __("Title:", THEME_NAME), "home" => "yes" ),
				array( "type" => "scroller", "id" => $OTfields->themeslug."_homepage_news_block_count", "title" => __("Count:", THEME_NAME), "max" => 30, "home" => "yes" ),
				array( "type" => "textarea", "id" => $OTfields->themeslug."_homepage_news_block_text", "title" => __("Text:", THEME_NAME), "home" => "yes" ),
				array( "type" => "sidebar_select", "id" => $OTfields->themeslug."_homepage_news_block_sidebar", "title" => __("Sidebar:", THEME_NAME), "home" => "yes" ),
				array( 
					"type" => "select", 
					"id" => $OTfields->themeslug."_homepage_news_block_type", 
					"title" => __("Type:", THEME_NAME), 
					"home" => "yes",
					"options"=>array(
						array("slug"=>"1", "name"=>"Menu Card"), 
						array("slug"=>"2", "name"=>"Shop Items")
					),
				),
			),
		),
		array(
			"title" => __("Latest News", THEME_NAME),
			"type" => "homepage_news_block_1",
			"options" => array(
				array( "type" => "input", "id" => $OTfields->themeslug."_homepage_news_block_1_title", "title" => __("Title:", THEME_NAME), "home" => "yes" ),
				array( "type" => "scroller", "id" => $OTfields->themeslug."_homepage_news_block_1_count", "title" => __("Count:", THEME_NAME), "max" => 30, "home" => "yes" ),
				array( "type" => "textarea", "id" => $OTfields->themeslug."_homepage_news_block_1_text", "title" => __("Text:", THEME_NAME), "home" => "yes" ),
				array( "type" => "sidebar_select", "id" => $OTfields->themeslug."_homepage_news_block_1_sidebar", "title" => __("Sidebar:", THEME_NAME), "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $OTfields->themeslug."_homepage_news_block_1_cat",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
			),
		),
		array(
			"title" => "HTML Code",
			"type" => "homepage_html",
			"options" => array(
				array( "type" => "input", "id" => $OTfields->themeslug."_homepage_html_title", "title" => __("Title:",THEME_NAME), "home" => "yes" ),
				array( "type" => "textarea", "id" => $OTfields->themeslug."_homepage_html", "title" => __("HTML Code:",THEME_NAME), "home" => "yes" ),
			),
		),

	)
),


 
 );


$OTfields->add_options($orangeThemes_general_options);
?>