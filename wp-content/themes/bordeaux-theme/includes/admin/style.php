<?php
global $orange_themes_managment;
$orangeThemes_slider_options= array(
 array(
	"type" => "navigation",
	"name" => "Style Settings",
	"slug" => "custom-styling"
),

array(
	"type" => "tab",
	"slug"=>'custom-styling'
),

array(
	"type" => "sub_navigation",
	"subname"=>array(
		array("slug"=>"font_style", "name"=>"Font Style"),
		array("slug"=>"page_colors", "name"=>"Page Colors/Style")
		)
),

/* ------------------------------------------------------------------------*
 * PAGE FONT SETTINGS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'font_style'
),

array(
	"type" => "row"
),

array(
	"type" => "google_font_select",
	"title" => "Menu font:",
	"id" => $orange_themes_managment->themeslug."_google_font_1",
	"sort" => "alpha",
	"info" => "Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",
	"default_font" => array('font' => "Capriola", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => "Titles font:",
	"id" => $orange_themes_managment->themeslug."_google_font_2",
	"sort" => "alpha",
	"info" => "Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",
	"default_font" => array('font' => "Capriola", 'txt' => "(default)")
),


array(
	"type" => "close"

),

array(
	"type" => "save",
	"title" => "Save Changes"
),
   
array(
	"type" => "closesubtab"
),
/* ------------------------------------------------------------------------*
 * PAGE COLORS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'page_colors'
),


array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => "Enable Responsive"
),

array(
	"type" => "checkbox",
	"title" => "Enable",
	"id" => $orange_themes_managment->themeslug."_responsive"
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Page Layout"
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_page_layout",
	"radio" => array(
		array("title" => "Boxed:", "value" => "boxed"),
		array("title" => "Wide:", "value" => "wide"),
	),
),

array(
	"type" => "close"
),


array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => "Page Color Settings"
),

array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_color_1", 
	"title" => "Main color Scheme:",
	"std" => "b10700",
),


array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_color_2", 
	"title" => "Link colors:",
	"std" => "b10700",
),

array(
	"type" => "close"
),


array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Page Background Settings"
),

array(
	"type" => "select",
	"title" => "Header Texture",
	"id" => $orange_themes_managment->themeslug."_bg_texture_header",
	"options"=>array(
		array("slug"=>"main-body-bg.jpg", "name"=>"Texture-1"), 
		array("slug"=>"footer-background.jpg", "name"=>"Texture-2"), 
		array("slug"=>"main-header-wrapper-bg.jpg", "name"=>"Texture-3 (default)"),
		array("slug"=>"texture-1.png", "name"=>"Texture-4"),
		array("slug"=>"texture-2.png", "name"=>"Texture-5"),
		array("slug"=>"texture-3.png", "name"=>"Texture-6"),
		array("slug"=>"texture-4.png", "name"=>"Texture-7"),
		array("slug"=>"texture-5.png", "name"=>"Texture-8"),
		array("slug"=>"texture-6.png", "name"=>"Texture-9"),
		array("slug"=>"tootlip-content-bg.png", "name"=>"Texture-10"),
	)
),
array(
	"type" => "select",
	"title" => "Footer & Slider Texture",
	"id" => $orange_themes_managment->themeslug."_bg_texture_slider",
	"options"=>array(
		array("slug"=>"main-body-bg.jpg", "name"=>"Texture-1"), 
		array("slug"=>"footer-background.jpg", "name"=>"Texture-2 (default)"), 
		array("slug"=>"main-header-wrapper-bg.jpg", "name"=>"Texture-3"),
		array("slug"=>"texture-1.png", "name"=>"Texture-4"),
		array("slug"=>"texture-2.png", "name"=>"Texture-5"),
		array("slug"=>"texture-3.png", "name"=>"Texture-6"),
		array("slug"=>"texture-4.png", "name"=>"Texture-7"),
		array("slug"=>"texture-5.png", "name"=>"Texture-8"),
		array("slug"=>"texture-6.png", "name"=>"Texture-9"),
		array("slug"=>"tootlip-content-bg.png", "name"=>"Texture-10"),
	)
),

array(
	"type" => "select",
	"title" => "Background Texture",
	"id" => $orange_themes_managment->themeslug."_bg_texture",
	"options"=>array(
		array("slug"=>"main-body-bg.jpg", "name"=>"Texture-1 (default)"), 
		array("slug"=>"footer-background.jpg", "name"=>"Texture-2"), 
		array("slug"=>"main-header-wrapper-bg.jpg", "name"=>"Texture-3"),
		array("slug"=>"texture-1.png", "name"=>"Texture-4"),
		array("slug"=>"texture-2.png", "name"=>"Texture-5"),
		array("slug"=>"texture-3.png", "name"=>"Texture-6"),
		array("slug"=>"texture-4.png", "name"=>"Texture-7"),
		array("slug"=>"texture-5.png", "name"=>"Texture-8"),
		array("slug"=>"texture-6.png", "name"=>"Texture-9"),
		array("slug"=>"tootlip-content-bg.png", "name"=>"Texture-10"),
	)
),


array(
	"type" => "close"
),

array(
	"type" => "save",
	"title" => "Save Changes"
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