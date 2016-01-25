<?php
global $orange_themes_managment;
$orangeThemes_documentation_options= array(
 array(
	"type" => "navigation",
	"name" => __("Reservations", THEME_NAME),
	"slug" => "invitations"
),

array(
	"type" => "tab",
	"slug"=>'reservations'
),

array(
	"type" => "sub_navigation",
	"subname"=>array(
		array("slug"=>"reservations", "name"=>__("Main", THEME_NAME)),
		array("slug"=>"reservations_settings", "name"=>__("Settings", THEME_NAME))
		)
),

/* ------------------------------------------------------------------------*
 * DOCUMENTATION INVITATIONS
 * ------------------------------------------------------------------------*/

array(
	"type" => "sub_tab",
	"slug"=>'reservations'
),

array(
	"type" => "row"
),

array(
	"type" => "invitations",
	"title" => __("All Entries", THEME_NAME)
),

 
array(
	"type" => "close"
),


array(
	"type" => "closesubtab"
),


/* ------------------------------------------------------------------------*
 * DOCUMENTATION INVITATIONS SETTINGS
 * ------------------------------------------------------------------------*/

array(
	"type" => "sub_tab",
	"slug"=>'reservations_settings'
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Time Settings", THEME_NAME)
),

array(
	"type" => "select",
	"title" => __("Time Format", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_time_format",
	"options"=>array(
		array("slug"=>"european", "name"=>__("24 hour time", THEME_NAME)), 
		array("slug"=>"american", "name"=>__("12 hour time", THEME_NAME)),
	),
	"std" => "european"
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Work Time", THEME_NAME)
),

array(
	"type" => "select",
	"title" => __("From", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_time_from",
	"options"=>array(
		array("slug"=>"0", "name"=>__("0:00", THEME_NAME)), 
		array("slug"=>"1", "name"=>__("1:00", THEME_NAME)), 
		array("slug"=>"2", "name"=>__("2:00", THEME_NAME)), 
		array("slug"=>"3", "name"=>__("3:00", THEME_NAME)), 
		array("slug"=>"4", "name"=>__("4:00", THEME_NAME)), 
		array("slug"=>"5", "name"=>__("5:00", THEME_NAME)), 
		array("slug"=>"6", "name"=>__("6:00", THEME_NAME)), 
		array("slug"=>"7", "name"=>__("7:00", THEME_NAME)), 
		array("slug"=>"8", "name"=>__("8:00", THEME_NAME)), 
		array("slug"=>"9", "name"=>__("9:00", THEME_NAME)), 
		array("slug"=>"10", "name"=>__("10:00", THEME_NAME)), 
		array("slug"=>"11", "name"=>__("11:00", THEME_NAME)), 
		array("slug"=>"12", "name"=>__("12:00", THEME_NAME)), 
		array("slug"=>"13", "name"=>__("13:00", THEME_NAME)), 
		array("slug"=>"14", "name"=>__("14:00", THEME_NAME)), 
		array("slug"=>"15", "name"=>__("15:00", THEME_NAME)), 
		array("slug"=>"16", "name"=>__("16:00", THEME_NAME)), 
		array("slug"=>"17", "name"=>__("17:00", THEME_NAME)), 
		array("slug"=>"18", "name"=>__("18:00", THEME_NAME)), 
		array("slug"=>"19", "name"=>__("19:00", THEME_NAME)), 
		array("slug"=>"20", "name"=>__("20:00", THEME_NAME)), 
		array("slug"=>"21", "name"=>__("21:00", THEME_NAME)), 
		array("slug"=>"22", "name"=>__("22:00", THEME_NAME)), 
		array("slug"=>"23", "name"=>__("23:00", THEME_NAME)), 
		array("slug"=>"24", "name"=>__("24:00", THEME_NAME)), 
	),
	"std" => "9"
),

array(
	"type" => "select",
	"title" => __("Till", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_time_till",
	"options"=>array(
		array("slug"=>"0", "name"=>__("0:00", THEME_NAME)), 
		array("slug"=>"1", "name"=>__("1:00", THEME_NAME)), 
		array("slug"=>"2", "name"=>__("2:00", THEME_NAME)), 
		array("slug"=>"3", "name"=>__("3:00", THEME_NAME)), 
		array("slug"=>"4", "name"=>__("4:00", THEME_NAME)), 
		array("slug"=>"5", "name"=>__("5:00", THEME_NAME)), 
		array("slug"=>"6", "name"=>__("6:00", THEME_NAME)), 
		array("slug"=>"7", "name"=>__("7:00", THEME_NAME)), 
		array("slug"=>"8", "name"=>__("8:00", THEME_NAME)), 
		array("slug"=>"9", "name"=>__("9:00", THEME_NAME)), 
		array("slug"=>"10", "name"=>__("10:00", THEME_NAME)), 
		array("slug"=>"11", "name"=>__("11:00", THEME_NAME)), 
		array("slug"=>"12", "name"=>__("12:00", THEME_NAME)), 
		array("slug"=>"13", "name"=>__("13:00", THEME_NAME)), 
		array("slug"=>"14", "name"=>__("14:00", THEME_NAME)), 
		array("slug"=>"15", "name"=>__("15:00", THEME_NAME)), 
		array("slug"=>"16", "name"=>__("16:00", THEME_NAME)), 
		array("slug"=>"17", "name"=>__("17:00", THEME_NAME)), 
		array("slug"=>"18", "name"=>__("18:00", THEME_NAME)), 
		array("slug"=>"19", "name"=>__("19:00", THEME_NAME)), 
		array("slug"=>"20", "name"=>__("20:00", THEME_NAME)), 
		array("slug"=>"21", "name"=>__("21:00", THEME_NAME)), 
		array("slug"=>"22", "name"=>__("22:00", THEME_NAME)), 
		array("slug"=>"23", "name"=>__("23:00", THEME_NAME)), 
		array("slug"=>"24", "name"=>__("24:00", THEME_NAME)), 
	),
	"std" => "18"
),
array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Available table per day", THEME_NAME)
),

array(
	"type" => "select",
	"title" => __("Max Table Count", THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_table_count",
	"options"=>array( 
		array("slug"=>"1", "name"=>__("1", THEME_NAME)), 
		array("slug"=>"2", "name"=>__("2", THEME_NAME)), 
		array("slug"=>"3", "name"=>__("3", THEME_NAME)), 
		array("slug"=>"4", "name"=>__("4", THEME_NAME)), 
		array("slug"=>"5", "name"=>__("5", THEME_NAME)), 
		array("slug"=>"6", "name"=>__("6", THEME_NAME)), 
		array("slug"=>"7", "name"=>__("7", THEME_NAME)), 
		array("slug"=>"8", "name"=>__("8", THEME_NAME)), 
		array("slug"=>"9", "name"=>__("9", THEME_NAME)), 
		array("slug"=>"10", "name"=>__("10", THEME_NAME)), 
		array("slug"=>"11", "name"=>__("11", THEME_NAME)), 
		array("slug"=>"12", "name"=>__("12", THEME_NAME)), 
		array("slug"=>"13", "name"=>__("13", THEME_NAME)), 
		array("slug"=>"14", "name"=>__("14", THEME_NAME)), 
		array("slug"=>"15", "name"=>__("15", THEME_NAME)), 
		array("slug"=>"16", "name"=>__("16", THEME_NAME)), 
		array("slug"=>"17", "name"=>__("17", THEME_NAME)), 
		array("slug"=>"18", "name"=>__("18", THEME_NAME)), 
		array("slug"=>"19", "name"=>__("19", THEME_NAME)), 
		array("slug"=>"20", "name"=>__("20", THEME_NAME)), 
		array("slug"=>"21", "name"=>__("21", THEME_NAME)), 
		array("slug"=>"22", "name"=>__("22", THEME_NAME)), 
		array("slug"=>"23", "name"=>__("23", THEME_NAME)), 
		array("slug"=>"24", "name"=>__("24", THEME_NAME)), 
		array("slug"=>"25", "name"=>__("25", THEME_NAME)), 
		array("slug"=>"26", "name"=>__("26", THEME_NAME)), 
		array("slug"=>"27", "name"=>__("27", THEME_NAME)), 
		array("slug"=>"28", "name"=>__("28", THEME_NAME)), 
		array("slug"=>"29", "name"=>__("29", THEME_NAME)), 
		array("slug"=>"30", "name"=>__("30", THEME_NAME)), 
		array("slug"=>"31", "name"=>__("31", THEME_NAME)), 
		array("slug"=>"32", "name"=>__("32", THEME_NAME)), 
		array("slug"=>"33", "name"=>__("33", THEME_NAME)), 
		array("slug"=>"34", "name"=>__("34", THEME_NAME)), 
		array("slug"=>"35", "name"=>__("35", THEME_NAME)), 
		array("slug"=>"36", "name"=>__("36", THEME_NAME)), 
		array("slug"=>"37", "name"=>__("37", THEME_NAME)), 
		array("slug"=>"38", "name"=>__("38", THEME_NAME)), 
		array("slug"=>"39", "name"=>__("39", THEME_NAME)), 
		array("slug"=>"40", "name"=>__("40", THEME_NAME)), 
		array("slug"=>"41", "name"=>__("41", THEME_NAME)), 
		array("slug"=>"42", "name"=>__("42", THEME_NAME)), 
		array("slug"=>"43", "name"=>__("43", THEME_NAME)), 
		array("slug"=>"44", "name"=>__("44", THEME_NAME)), 
		array("slug"=>"45", "name"=>__("45", THEME_NAME)), 
		array("slug"=>"46", "name"=>__("46", THEME_NAME)), 
		array("slug"=>"47", "name"=>__("47", THEME_NAME)), 
		array("slug"=>"48", "name"=>__("48", THEME_NAME)), 
		array("slug"=>"49", "name"=>__("49", THEME_NAME)), 
		array("slug"=>"50", "name"=>__("50", THEME_NAME)), 
	),
	"std" => "12"
),
array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title"=>__('Reservation Support Mail', THEME_NAME)
),


array(
	"type" => "checkbox",
	"title" => __('Enable Email Notifications About New Reservations, Email will be sent to email that you setted in the reservation page.', THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_email_notifications",
	"std" => "on"
),

array(
	"type" => "close"
),
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title"=>__('Set Weekly Free Days', THEME_NAME)
),

array(
	"type" => "checkbox",
	"title" => __('Monday', THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_day_1",
),
array(
	"type" => "checkbox",
	"title" => __('Tuesday', THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_day_2",
),
array(
	"type" => "checkbox",
	"title" => __('Wednesday', THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_day_3",
),
array(
	"type" => "checkbox",
	"title" => __('Thursday', THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_day_4",
),
array(
	"type" => "checkbox",
	"title" => __('Friday', THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_day_5",
),

array(
	"type" => "checkbox",
	"title" => __('Saturday', THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_day_6",
),

array(
	"type" => "checkbox",
	"title" => __('Sunday', THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_day_0",
),

array(
	"type" => "add_text_datepicker",
	"title" => __('Set a Full Day', THEME_NAME),
	"id" => $orange_themes_managment->themeslug."_custom_free_day",
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __('Full Day\'s', THEME_NAME),
),

array(
	"type" => "date_order",
	"id" => THEME_NAME."_custom_free_day"
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

$orange_themes_managment->add_options($orangeThemes_documentation_options);
 
?>