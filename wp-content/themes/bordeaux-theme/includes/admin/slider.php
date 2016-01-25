<?php
global $orange_themes_managment;
$orangeThemes_slider_options= array(
 array(
	"type" => "navigation",
	"name" => __("Slider Settings", THEME_NAME),
	"slug" => "sliders"
),

array(
	"type" => "tab",
	"slug"=>'slider_settings'
),

array(
	"type" => "sub_navigation",
	"subname"=>array(
			array("slug"=>"top_slider", "name"=>__("Feedback Slider", THEME_NAME)),
			array("slug"=>"menu_slider", "name"=>__("Menu Card/Shop Item Slider", THEME_NAME))
		)
),

/* ------------------------------------------------------------------------*
 * SLIDER SETTINGS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=>'top_slider'
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Feedback Slider", THEME_NAME),
),

array(
	"type" => "checkbox",
	"title" => __("Show:", THEME_NAME),
	"id"=>$orange_themes_managment->themeslug."_feedback_block"
),

array(
	"type" => "title",
	"title" => __("Block 1", THEME_NAME),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_feedback_block", "value" => "on")
	)
),

array(
	"type" => "input",
	"title" => __("Author Name:", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_feedback_name_1",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_feedback_block", "value" => "on")
	)
),

array(
	"type" => "textarea",
	"title" => __("Text:", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_feedback_text_1",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_feedback_block", "value" => "on")
	)
),
array(
	"type" => "upload",
	"title" => __("Image:", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_feedback_image_1",
	"info" => __("The suggested image size is - 470x144px",THEME_NAME),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_feedback_block", "value" => "on")
	)
),
array(
	"type" => "select",
	"title" => __("Rating:", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_feedback_rating_1",
	"options"=>array(
		array("slug"=>"0", "name"=>__("None", THEME_NAME)), 
		array("slug"=>"1", "name"=>__("1 Star", THEME_NAME)), 
		array("slug"=>"2", "name"=>__("2 Stars", THEME_NAME)),
		array("slug"=>"3", "name"=>__("3 Stars", THEME_NAME)),
		array("slug"=>"4", "name"=>__("4 Stars", THEME_NAME)),
		array("slug"=>"5", "name"=>__("5 Stars", THEME_NAME)),
	),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_feedback_block", "value" => "on")
	)
),


array(
	"type" => "title",
	"title" => __("Block 2", THEME_NAME),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_feedback_block", "value" => "on")
	)
),

array(
	"type" => "input",
	"title" => __("Author Name:", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_feedback_name_2",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_feedback_block", "value" => "on")
	)
),

array(
	"type" => "textarea",
	"title" => __("Text:", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_feedback_text_2",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_feedback_block", "value" => "on")
	)
),
array(
	"type" => "upload",
	"title" => __("Image:", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_feedback_image_2",
	"info" => __("The suggested image size is - 470x144px",THEME_NAME),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_feedback_block", "value" => "on")
	)
),
array(
	"type" => "select",
	"title" => __("Rating:", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_feedback_rating_2",
	"options"=>array(
		array("slug"=>"0", "name"=>__("None", THEME_NAME)), 
		array("slug"=>"1", "name"=>__("1 Star", THEME_NAME)), 
		array("slug"=>"2", "name"=>__("2 Stars", THEME_NAME)),
		array("slug"=>"3", "name"=>__("3 Stars", THEME_NAME)),
		array("slug"=>"4", "name"=>__("4 Stars", THEME_NAME)),
		array("slug"=>"5", "name"=>__("5 Stars", THEME_NAME)),
	),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_feedback_block", "value" => "on")
	)
),


array(
	"type" => "title",
	"title" => __("Block 3", THEME_NAME),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_feedback_block", "value" => "on")
	)
),

array(
	"type" => "input",
	"title" => __("Author Name:", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_feedback_name_3",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_feedback_block", "value" => "on")
	)
),

array(
	"type" => "textarea",
	"title" => __("Text:", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_feedback_text_3",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_feedback_block", "value" => "on")
	)
),
array(
	"type" => "upload",
	"title" => __("Image:", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_feedback_image_3",
	"info" => __("The suggested image size is - 470x144px",THEME_NAME),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_feedback_block", "value" => "on")
	)
),
array(
	"type" => "select",
	"title" => __("Rating:", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_feedback_rating_3",
	"options"=>array(
		array("slug"=>"0", "name"=>__("None", THEME_NAME)), 
		array("slug"=>"1", "name"=>__("1 Star", THEME_NAME)), 
		array("slug"=>"2", "name"=>__("2 Stars", THEME_NAME)),
		array("slug"=>"3", "name"=>__("3 Stars", THEME_NAME)),
		array("slug"=>"4", "name"=>__("4 Stars", THEME_NAME)),
		array("slug"=>"5", "name"=>__("5 Stars", THEME_NAME)),
	),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_feedback_block", "value" => "on")
	)
),


array(
	"type" => "close"
),
 
array(
	"type" => "save",
	"title" => __("Save Changes", THEME_NAME)
),
   
array(
	"type" => "closesubtab"
),
/* ------------------------------------------------------------------------*
 * SLIDER SETTINGS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=>'menu_slider'
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Show Image Tooltip on hover", THEME_NAME),
),

array(
	"type" => "checkbox",
	"title" => __("Show:", THEME_NAME),
	"id"=>$orange_themes_managment->themeslug."_menu_slider_tooltip"
),

array(
	"type" => "close"
),

array(
	"type" => "save",
	"title" => __("Save Changes", THEME_NAME)
),
   
array(
	"type" => "closesubtab"
),

array(
	"type" => "closetab"
)
 
);

$orange_themes_managment->add_options($orangeThemes_slider_options);
?>