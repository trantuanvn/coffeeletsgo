<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$prefix = THEME_NAME.'_';
$image = '<img src="'.THEME_IMAGE_CPANEL_URL.'logo-orangethemes-1.png" width="11" height="15" /> ';
$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
$aboutAuthor = get_option ( THEME_NAME."_about_author" ); 
$imageSize = get_option ( THEME_NAME."_image_size" );
$showSingleThumb = get_option ( THEME_NAME."_show_single_thumb" ); 
$similarPosts = get_option ( THEME_NAME."_similar_posts" ); 
$similarPostsGallery = get_option ( THEME_NAME."_similar_posts_gallery" ); 
$breakingSlider = get_option ( THEME_NAME."_breacking_news" ); 
$imageType = get_option (THEME_NAME."_image_type"); 
if($imageType=="small"){
	$imageType="small_large";
} else {
	$imageType="large_small";
}


$shopID = get_shop_page();
$contactID = ot_get_page("contact");
$galleryID = ot_get_page('gallery');
$homeID = ot_get_page('homepage');
$locationID = ot_get_page('location');
$menuID = ot_get_page('menu-card');
$menuShopID = ot_get_page('menu-card-shop');
$aboutID = ot_get_page('about');
$rsvpID = ot_get_page('rsvp');
$fullID = ot_get_page('full-width');
$reservationID = ot_get_page('reservations');
$archiveID = get_archive_page();
$eventsID = get_events_page();
$menuID = get_menu_page();
$mapID = get_map_page();
$shareAll = get_option ( THEME_NAME."_share_all" ); 



if(isset($_GET['post'])) {
	$currentID = $_GET['post'];
} else {
	$currentID = 0;
}

global $box_array;

$box_array = array();

$box_array[] = array( 'id' => 'image-size', 'title' => ''.$image.' Image Size', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Size:', 'std' => '', 'id' => $prefix. 'image_size', 'type'=> $imageType ) ), 'size' => 10, 'first' => 'yes' );
//about couple
if(!in_array($currentID, $reservationID) && !in_array($currentID, $homeID) && !in_array($currentID, $contactID) && !in_array($currentID, $menuID) && !in_array($currentID, $menuShopID) ) {
	$box_array[] = array( 'id' => 'image-size', 'title' => ''.$image.' Image Size', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Size:', 'std' => '', 'id' => $prefix. 'image_size', 'type'=> $imageType ) ), 'size' => 10, 'first' => 'yes' );
}

//menu card posts
$box_array[] = array( 'id' => 'image-size', 'title' => ''.$image.__("Image Size", THEME_NAME), 'page' => OT_POST_MENU, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("Size:", THEME_NAME), 'std' => '', 'id' => $prefix. 'image_size', 'type'=> $imageType ) ), 'size' => 10, 'first' => 'yes' );
$box_array[] = array( 'id' => 'menu-slider-post', 'title' => ''.$image.__("Show In Top Slider", THEME_NAME), 'page' => OT_POST_MENU, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("Show:", THEME_NAME), 'std' => '', 'id' => $prefix. 'menu_slider_post', 'type'=> "yes_no" ) ), 'size' => 10, 'first' => 'no' );
$box_array[] = array( 'id' => 'menu-home-post', 'title' => ''.$image.__("Popular Offering (Show In Homepage Block)", THEME_NAME), 'page' => OT_POST_MENU, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("Show:", THEME_NAME), 'std' => '', 'id' => $prefix. 'popular_offering', 'type'=> "no_yes" ) ), 'size' => 10, 'first' => 'no' );
$box_array[] = array( 'id' => 'menu-post-price', 'title' => ''.$image.__("Price", THEME_NAME), 'page' => OT_POST_MENU, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("Price:", THEME_NAME), 'std' => '', 'id' => $prefix. 'price', 'type'=> "text" ) ), 'size' => 10, 'first' => 'no' );




//gallery images
$box_array[] = array( 'id' => 'post-slider-images', 'title' => ''.$image.__("Gallery Images", THEME_NAME), 'page' => OT_POST_GALLERY, 'context' => 'side', 'priority' => 'low', 'fields' => array(array('name' => '', 'std' => '', 'id' => $prefix. 'gallery_images', 'type'=> 'image_select' ) ), 'size' => 0,'first' => 'no'  );


$box_array[] = array( 'id' => 'sidebar-select-post', 'title' => ''.$image.' Main Sidebar', 'page' => 'events-item', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar name:', 'std' => '', 'id' => $prefix. 'sidebar_select', 'type'=> 'sidebar_select_box' ) ), 'size' => 10, 'first' => 'no' );

$box_array[] = array( 'id' => 'show-image-post', 'title' => ''.$image.' Show Image In Single Post / News Page', 'page' => 'reviews-item', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Image:', 'std' => '', 'id' => $prefix. 'single_image', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'no' );

//location page
$box_array[] = array( 'id' => 'loaction-1', 'title' => ''.$image.__("Venue", THEME_NAME), 'page' => OT_POST_LOCATION, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("Venue", THEME_NAME), 'std' => '', 'id' => $prefix. 'venue', 'type'=> 'text' ) ), 'size' => 10,'first' => 'yes'  );
$box_array[] = array( 'id' => 'loaction-2', 'title' => ''.$image.__("Address", THEME_NAME), 'page' => OT_POST_LOCATION, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("Address", THEME_NAME), 'std' => '', 'id' => $prefix. 'address', 'type'=> 'textarea' ) ), 'size' => 10,'first' => 'no'  );
$box_array[] = array( 'id' => 'loaction-3', 'title' => ''.$image.__("Date", THEME_NAME), 'page' => OT_POST_LOCATION, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("Date", THEME_NAME), 'std' => '', 'id' => $prefix. 'date', 'type'=> 'datepicker' ) ), 'size' => 10,'first' => 'no'  );
$box_array[] = array( 'id' => 'loaction-4', 'title' => ''.$image.__("Venue Map", THEME_NAME).'', 'page' => OT_POST_LOCATION, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => ''.__("Position:", THEME_NAME).'', 'std' => '', 'id' => $prefix. 'map', 'type'=> 'google_map' ) ), 'size' => 10, 'first' => 'no' );
if(in_array($currentID, $locationID) || isset($_POST['post_type'])) {
	$box_array[] = array( 'id' => 'loaction-5', 'title' => ''.$image.__("How long show held venue?", THEME_NAME), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("Days:", THEME_NAME), 'std' => '+1 day', 'id' => $prefix. 'post_age', 'type'=> 'days' ) ), 'size' => 10, 'first' => 'no' );
	$box_array[] = array( 'id' => 'loaction-6', 'title' => ''.$image.__("Items per page", THEME_NAME), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("Count", THEME_NAME), 'std' => '2', 'id' => $prefix. 'location_items', 'type'=> 'text' ) ), 'size' => 10, 'first' => 'no' );
}

//about couple
if(in_array($currentID, $reservationID) || isset($_POST['post_type'])) {
	$box_array[] = array( 'id' => 'reservation-5', 'title' => $image.__("Notifications email", THEME_NAME), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("Email:", THEME_NAME), 'std' => '', 'id' => $prefix. 'reservation_mail', 'type'=> 'text' ) ), 'size' => 20, 'first' => 'yes' );

	$box_array[] = array( 'id' => 'reservation-1', 'title' => ''.$image.__("Calendar Description Title", THEME_NAME), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("Title", THEME_NAME), 'std' => '', 'id' => $prefix. 'calendar_title', 'type'=> 'text' ) ), 'size' => 10, 'first' => 'no' );
	$box_array[] = array( 'id' => 'reservation-2', 'title' => ''.$image.__("Calendar Description Text", THEME_NAME), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("Text", THEME_NAME), 'std' => '', 'id' => $prefix. 'calendar_text', 'type'=> 'textarea' ) ), 'size' => 10, 'first' => 'no' );
	
	$box_array[] = array( 'id' => 'reservation-3', 'title' => ''.$image.__("Form Description Title", THEME_NAME), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("Title", THEME_NAME), 'std' => '', 'id' => $prefix. 'form_title', 'type'=> 'text' ) ), 'size' => 10, 'first' => 'no' );
	$box_array[] = array( 'id' => 'reservation-4', 'title' => ''.$image.__("Form Description Text", THEME_NAME), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("Text", THEME_NAME), 'std' => '', 'id' => $prefix. 'form_text', 'type'=> 'textarea' ) ), 'size' => 10, 'first' => 'no' );
}




//share buttons
if($shareAll=="custom") {
	$box_array[] = array( 'id' => 'share-post', 'title' => ''.$image.__("Show Share Buttons", THEME_NAME), 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Show Share Buttons:', 'std' => 'hide', 'id' => $prefix. 'share_single', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'no' );
	if(!in_array($currentID, $contactID) && $currentID!=get_option('page_for_posts') && !in_array($currentID, $aboutID) && !in_array($currentID, $galleryID) && !in_array($currentID, $homeID) && !in_array($currentID, $locationID) && !in_array($currentID, $fullID) || isset($_POST['post_type']) || $currentID==0) {
		//$box_array[] = array( 'id' => 'share-post', 'title' => ''.$image.__("Show Share Buttons", THEME_NAME), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Show Share Buttons:', 'std' => 'hide', 'id' => $prefix. 'share_single', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'no' );
	}
}


//page title
if(!in_array($currentID, $homeID)) {
	$box_array[] = array( 
		'id' => 'page-title', 
		'title' => ''.$image.' Show Page Title', 
		'page' => 'page', 
		'context' => 'normal', 
		'priority' => 'high', 
		'fields' => array(
			array(
				'name' => 'Show:', 
				'std' => '', 
				'id' => $prefix. 'title_show', 
				'type'=> 'yes_no' 
				) 
			), 
		'size' => 10, 
		'first' => 'no' 
	);

	$box_array[] = array( 'id' => 'menu-slider-settings', 'title' => ''.$image.__("Show Menu Card/Shop Item slider", THEME_NAME), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Show', 'std' => '', 'id' => $prefix. 'menu_slider', 'type'=> 'yes_no' ) ), 'size' => 10,'first' => 'yes'  );
	$box_array[] = array( 'id' => 'menu-slider', 'title' => ''.$image.__("Slider Type", THEME_NAME), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Slider', 'std' => '', 'id' => $prefix. 'menu_slider_type', 'type'=> 'slider_type' ) ), 'size' => 10,'first' => 'no'  );


}


// contact settings
if(in_array($currentID, $contactID) || isset($_POST['post_type'])) {
	$box_array[] = array( 'id' => 'contact-email', 'title' => ''.$image.__("Contact form E-mail", THEME_NAME), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("E-mail", THEME_NAME), 'std' => '', 'id' => $prefix. 'contact_mail', 'type'=> 'text' ) ), 'size' => 10,'first' => 'yes'  );
	//$box_array[] = array( 'id' => 'contact-map', 'title' => ''.$image.__("Google Map", THEME_NAME), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("URL", THEME_NAME), 'std' => '', 'id' => $prefix. 'map', 'type'=> 'text' ) ), 'size' => 10,'first' => 'no'  );
}

//gallery
$box_array[] = array( 'id' => 'gallery-type-box', 'title' => ''.$image.__("Gallery Style", THEME_NAME), 'page' => OT_POST_GALLERY, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Gallery Style:', 'std' => '', 'id' => $prefix. 'gallery_style', 'type'=> 'gallery_style' ) ), 'size' => 10, 'first' => 'yes'  );
if($similarPostsGallery=="custom") {
	//$box_array[] = array( 'id' => 'gallery-smilar-posts', 'title' => ''.$image.' Similar Posts', 'page' => OT_POST_GALLERY, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Show:', 'std' => '', 'id' => $prefix. 'similar_posts', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'no'  );	
}

//sidebar settings
$box_array[] = array( 'id' => 'sidebar-select-post', 'title' => ''.$image.__("Sidebar", THEME_NAME), 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar name:', 'std' => '', 'id' => $prefix. 'sidebar_select', 'type'=> 'sidebar_select_box' ) ), 'size' => 10, 'first' => 'no' );
$box_array[] = array( 'id' => 'sidebar-select-post', 'title' => ''.$image.__("Sidebar", THEME_NAME), 'page' => OT_POST_GALLERY, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar name:', 'std' => '', 'id' => $prefix. 'sidebar_select', 'type'=> 'sidebar_select_box' ) ), 'size' => 10, 'first' => 'no' );
if($sidebarPosition=="custom") {
	$box_array[] = array( 'id' => 'sidebar-position-page', 'title' => ''.$image.' Sidebar Position', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar position:', 'std' => '', 'id' => $prefix. 'sidebar_position', 'type'=> 'sidebar_position_box' ) ), 'size' => 10, 'first' => 'no' );	
}



//sidebar settings
if(!in_array($currentID, $homeID) && !in_array($currentID, $reservationID) && !in_array($currentID, $fullID) && !in_array($currentID, $archiveID) ) {
	$box_array[] = array( 'id' => 'sidebar-select-box', 'title' => ''.$image.__("Sidebar", THEME_NAME), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar name:', 'std' => '', 'id' => $prefix. 'sidebar_select', 'type'=> 'sidebar_select_box' ) ), 'size' => 10, 'first' => 'yes'  );

	if($sidebarPosition=="custom") {
		$box_array[] = array( 'id' => 'sidebar-position-page', 'title' => ''.$image.' Sidebar Position', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar position:', 'std' => '', 'id' => $prefix. 'sidebar_position', 'type'=> 'sidebar_position_box' ) ), 'size' => 10, 'first' => 'no' );
	}
}

//about author
if($aboutAuthor=="custom" && !in_array($currentID, $homeID) && !in_array($currentID, $contactID) && !in_array($currentID, $mapID) && !in_array($currentID, $galleryID) && !in_array($currentID, $fullID) && !in_array($currentID, $archiveID) || $currentID==0) {
	$box_array[] = array( 'id' => 'about-author-post', 'title' => ''.$image.' About Author', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'About Author:', 'std' => '', 'id' => $prefix. 'about_author', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'no' );
}

if($showSingleThumb=="on" && $currentID!=get_option('page_for_posts') && !in_array($currentID, $reservationID) && !in_array($currentID, $homeID) && !in_array($currentID, $contactID) && !in_array($currentID, $galleryID) && !in_array($currentID, $fullID) || isset($_POST['post_type']) || $currentID==0) {
	$box_array[] = array( 'id' => 'show-image-post', 'title' => ''.$image.' Show Image In Single Post / News Page', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Image:', 'std' => '', 'id' => $prefix. 'single_image', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'no' );
	$box_array[] = array( 'id' => 'show-image-page', 'title' => ''.$image.' Show Image In Single Page / News Page', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Image:', 'std' => '', 'id' => $prefix. 'single_image', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'no' );
}

//homepage 
if(in_array($currentID, $homeID) || isset($_POST['post_type'])) {
	$box_array[] = array( 'id' => 'layer-slider-settings', 'title' => ''.$image.__("Show Layer Slider", THEME_NAME), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Show', 'std' => '', 'id' => $prefix. 'layer_slider_settings', 'type'=> 'no_yes' ) ), 'size' => 10,'first' => 'yes'  );
	$box_array[] = array( 'id' => 'layer-slider', 'title' => ''.$image.__("Layer Slider", THEME_NAME), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Slider', 'std' => '', 'id' => $prefix. 'layer_slider', 'type'=> 'layer_slider_select' ) ), 'size' => 10,'first' => 'no'  );

	$box_array[] = array( 
		'id' => 'home-drag-drop', 
		'title' => ''.$image.' Homepage Builder', 
		'page' => 'page', 
		'context' => 'normal', 
		'priority' => 'high', 
		'fields' => array(
			array(
				'name' => '', 
				'std' => '', 'id' => $prefix. 'home_drag_drop', 
				'type'=> 'home_drag_drop' 
				) 
			), 
		'size' => 0,
		'first' => 'no'  
	);
}

// Add meta box
function add_sticky_box() {
	global $box_array;
	
	foreach ($box_array as $box) {
		add_meta_box($box['id'], $box['title'], 'sticky_show_box', $box['page'], $box['context'], $box['priority'], array('content'=>$box, 'first'=>$box['first'], 'size'=>$box['size']));
	}

}

function sticky_show_box( $post, $metabox) {
	show_box_funtion($metabox['args']['content'], $metabox['args']['first'], $metabox['args']['size']);
}

// Callback function to show fields in meta box
function show_box_funtion($fields, $first='no', $width='60') {
	global $post, $post_id;

	if($first=="yes") {
		echo '<input type="hidden" name="sticky_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	}
	if($width!=0) {
		echo '<table class="form-table">';
	}


	foreach ($fields['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		//$post_num = htmlentities($_GET['post']);
		if($width!=0) {
			echo '<tr>';
				echo '<th style="width:',$width,'%"><label for="', $field['id'], '">', $field['name'], '</label></th>';
			echo '<td>';
		}
		switch ($field['type']) {
			case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" ', $meta ? ' ' : '', ' value="', $meta ? remove_html_slashes($meta) : remove_html_slashes($field['std']), '"/> ';
				break;
			case 'datepicker':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" ', $meta ? ' ' : '', ' value="', $meta ? date("m/d/y, H:i",remove_html_slashes($meta)) : remove_html_slashes($field['std']), '"/> ';
				break;
			case 'slider_image_box':
				echo '<input class="upload input-text-1 ot-upload-field" type="text" name="', $field['id'], '" id="', $field['id'], '" value="',  $meta ? remove_html_slashes($meta) :  remove_html_slashes($field['std']), '" style="width: 140px;"/><a href="#" class="ot-upload-button">Button</a>';
				break;
			case 'image_select':
				ot_gallery_image_select($field['id'],$meta);
				break;
			case 'checkbox':
				echo '<input type="checkbox" value="1" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
				break;
			case 'sidebar_select_box':
				$sidebar_names = get_option( THEME_NAME."_sidebar_names" );
				$sidebar_names = explode( "|*|", $sidebar_names );

				echo '	<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
				echo "<option value=\"\">Default</option>";
					foreach ($sidebar_names as $sidebar_name) {
	
						if ( $meta == $sidebar_name ) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $sidebar_name != "" ) {
							echo "<option value=\"".$sidebar_name."\" ".$selected.">".$sidebar_name."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'sidebar_select_box_small':
				$sidebar_names = get_option( THEME_NAME."_sidebar_names" );
				$sidebar_names = explode( "|*|", $sidebar_names );

				if ( $meta == "default" ) {
					$selected="selected=\"selected\"";
				} else { 
					$selected="";
				}

				echo '	<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
				echo "<option value=\"off\">Off</option>";
				echo "<option value=\"default\" ".$selected.">Default</option>";
					foreach ($sidebar_names as $sidebar_name) {
	
						if ( $meta == $sidebar_name ) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $sidebar_name != "" ) {
							echo "<option value=\"".$sidebar_name."\" ".$selected.">".$sidebar_name."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'category_select':
				global $wpdb;
				$data = get_terms( "category", 'parent=0&hide_empty=0' );	
				
				echo '	<select name="', $field['id'], '[]" id="', $field['id'], '" style="min-width:200px; min-height:200px;" multiple>';
					foreach($data as $key => $d) {
						if(is_array($meta) && in_array($d->term_id,$meta)) { $selected=' selected'; } else { $selected=''; }
						echo "<option value=\"".$d->term_id."\" ".$selected.">".$d->name."</option>";
					}

				echo '	</select>';
				break;
			case 'breaking_cat':
				global $wpdb;
				$data = get_terms( "category", 'parent=0&hide_empty=0' );	
					if ( $meta == "slider_off" || !$meta) {
						$selected="selected=\"selected\"";
					}
				echo '	<select name="', $field['id'], '[]" id="', $field['id'], '" style="min-width:200px; min-height:200px;" multiple>';
					echo '<option value="slider_off" '.$selected.'>'.__("Off", THEME_NAME).'</option>';
					foreach($data as $key => $d) {
						if(is_array($meta) && in_array($d->term_id,$meta)) { $selected=' selected'; } else { $selected=''; }
						echo "<option value=\"".$d->term_id."\" ".$selected.">".$d->name."</option>";
					}

				echo '	</select>';
				break;
			case 'category_select_2':
				global $wpdb;
				$data = get_terms( "category", 'parent=0&hide_empty=0' );	
				
				echo '	<select class="home-cat-select" name="', $field['id'], '[]" id="', $field['id'], '" style="min-width:200px; min-height:200px;" multiple disabled>';
					foreach($data as $key => $d) {
						if(is_array($meta) && in_array($d->term_id,$meta)) { $selected=' selected'; } else { $selected=''; }
						echo "<option value=\"".$d->term_id."\" ".$selected.">".$d->name."</option>";
					}

				echo '	</select>';
				break;
			case 'layer_slider_select':
				// Get WPDB Object
				global $wpdb;

				// Table name
				$table_name = $wpdb->prefix . "layerslider";
				
				// Get sliders
				$sliders = $wpdb->get_results( "SELECT * FROM $table_name
													WHERE flag_hidden = '0' AND flag_deleted = '0'
													ORDER BY id ASC LIMIT 200" );
					
				echo '	<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					if(!empty($sliders)) {
						foreach($sliders as $key => $item) {
							$name = empty($item->name) ? 'Unnamed' : $item->name;
							if($meta == $item->id) { $selected='selected="selected"'; } else { $selected=''; }
							echo '<option value="'.$item->id.'" '.$selected.'>'.$name.'</option>';
						}
					}
					if(empty($sliders)) {
						echo '<option value="">'.__("You didn't create a slider yet.", THEME_NAME).'</option>';
					}
				echo '	</select>';
				echo '	<br/><br/>Sliders You can create with LayerSlider WP (included with the theme). By creating homepage slider, choose <strong>Light</strong> skin. And set The slider size <strong>950px x 350px.</strong>';
				break;
			case 'sidebar_position_box':
				$positions = array('Right', 'Left');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'slider_type':
				$positions = array('Menu Card Items', 'Shop Items', 'Both');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'small_large':
				$positions = array('Small', 'Large');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'large_small':
				$positions = array('Large', 'Small');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'yes_no':
				$positions = array('Yes', 'No');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'no_yes':
				$positions = array('No', 'Yes');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'reviews_style':
				$positions = array('1', '2');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'color':
				echo '<input class="color" type="text" name="', $field['id'], '" id="', $field['id'], '" ', $meta ? ' ' : '', ' value="', $meta ? remove_html_slashes($meta) : remove_html_slashes($field['std']), '"/> ';
				break;
			case 'comment_select':
				$positions = array('Under The Post', 'New Tab');
				$val = array('under', 'new');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $k => $position) {
	
						if ( $meta == strtolower($val[$k])) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($val[$k])."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'days':
				$positions = array('1 day', '2 days', '3 days', '7 days', '14 days', '21 days');
				$val = array('1', '2', '3', '7', '14', '21');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $k => $position) {
	
						if ( $meta == strtolower($val[$k])) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($val[$k])."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'gallery_style':
				$positions = array('Default', 'LightBox');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'show_hide':
				$positions = array('Show', 'Hide');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;			
				case 'hide_show':
				$positions = array('Hide', 'Show');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'image_size_box':
				$positions = array('Large', 'Small');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'textarea':
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" ', $meta ? ' ' : '', ' style="width:400px; height:100px;">', $meta ? remove_html_slashes($meta) : remove_html_slashes($field['std']), '</textarea>';
				break;

			case 'home_drag_drop':
				global $OTfields;
				$OTfields = new OrangeThemesManagment(THEME_FULL_NAME,THEME_NAME);
				
				
				get_template_part(THEME_FUNCTIONS."drag-drop");
				$options = $OTfields->get_options();

				echo '
					<div style="vertical-align:top;clear: both;">
						'.$OTfields->print_options().'
					</div>
				
';
				break;
			case 'google_map':

				
				echo '
				    <div id="map-canvas"></div>

				    <p>'.__("Left click on the map to add markers. Right click on the marker to remove it!", THEME_NAME).'</p>
				    <input type="hidden" class="ot-coordinates" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? remove_html_slashes($meta) : remove_html_slashes($field['std']), '"/>
					<script type="text/javascript">';

				$markers = json_decode($meta);

				echo 	'
						var mapOptions = { zoom: 11, mapTypeId: google.maps.MapTypeId.ROADMAP };
						var markerBounds = new google.maps.LatLngBounds();
						var map = new google.maps.Map(document.getElementById(\'map-canvas\'),mapOptions);';
				
				if(is_array($markers)) {
					$i=0;
					foreach($markers as $marker) {
						if($marker->lb && $marker->mb) {
							echo 	'
										cord = new google.maps.LatLng('.$marker->lb.','.$marker->mb.');
										addMarker(cord);
										markerBounds.extend(cord);';
							$i++;
						} 
					} 
				}	

				if(!isset($i)) {
					echo 	'if(navigator.geolocation) {
						 		navigator.geolocation.getCurrentPosition(function(position) {
						      	var pos = new google.maps.LatLng(position.coords.latitude,
						                                       position.coords.longitude);

						      	var infowindow = new google.maps.InfoWindow({
						        	map: map,
						        	position: pos,
						        	content: "Whereabouts"
						      	});

						      	map.setCenter(pos);
						    }, function() {
						      	handleNoGeolocation(true);
						    	});
						  	} else {
						    	handleNoGeolocation(false);
						  	}
					';
				} else if($i==1) {
					echo 'map.setZoom(11);
						map.setCenter(cord);';
				} else {
					echo 	'map.fitBounds(markerBounds);';
				}

				echo 	'
					 google.maps.event.addDomListener(window, \'load\', initialize);
					</script>
				';

				break;
		}
		if($width!=0) {
			echo '<td>', '</tr>';
		}
	}
	if($width!=0) {
		echo '</table>';
	}
}

function save_data($fields) {
	global $post_id;

	foreach ($fields['fields'] as $field) {	
		$old = get_post_meta($post_id, $field['id'], true);
		if(isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];
			
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}//else if closer
		}
	}//foreach closer
	
}

function save_datepicker($fields) {
	global $post_id;

	foreach ($fields['fields'] as $field) {	
		$old = get_post_meta($post_id, $field['id'], true);
		if(isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];
			
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], strtotime($new));
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], strtotime($old));
			}//else if closer
		}
	}//foreach closer
	
}

function save_numbers($fields) { 
	global $post_id;
	foreach ($fields['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		if(!is_numeric($new)) { 
			$new = preg_replace("/[^0-9]/","",$new);
		}
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}//else if closer
	}//foreach closer

}

// Save data from meta box
function save_sticky_data($post_id) {
	global $box_array;
	
	// verify nonce
	if (isset($_POST['sticky_meta_box_nonce']) && !wp_verify_nonce($_POST['sticky_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
	foreach ($box_array as $box) {
		if($box["fields"][0]["type"]=="datepicker") {
			save_datepicker($box);
		} else {
			save_data($box);
		}

	}

} //function closer

	add_action('admin_menu', 'add_sticky_box');	
	add_action('save_post', 'save_sticky_data');

	

	function bordeaux_category_order_scriptaculous() {
		if(isset($_GET['page']) && $_GET['page'] == THEME_NAME."-category-order"){
			wp_enqueue_script('scriptaculous');
		} 
	}
	
	
	function bordeaux_category_order_compare($a, $b) {
		
		if ($a->order == $b->order) {
			if($a->name == $b->name){
				return 0;
			}else{
				return ($a->name < $b->name) ? -1 : 1;
			}
			
		}
		
	    return ($a->order < $b->order) ? -1 : 1;
	}
	

	function bordeaux_category_order_head(){
		if(isset($_GET['page']) && $_GET['page'] == THEME_NAME."-category-order"){
			?>
			<style>
				#container{
					list-style: none;
					width: 225px;
				}
				
				#order{
				}
				
				.childrenlink{
					float: right;
					font-size: 12px;
				}
				
				.lineitem {
					background-color: #ececec;
					color: #000;
					margin-bottom: 5px;
					padding: .5em 1em;
					width: 350px;
					font-size: 13px;
					-moz-border-radius: 3px;
					-khtml-border-radius: 3px;
					-webkit-border-radius: 3px;
					border-radius: 3px;
					cursor: move;
				}
				
				.lineitem h4{
					font-weight: bold;
					margin: 0;
				}
			</style>

			 <script type="text/javascript">
				jQuery(document).ready(function(){ 
					jQuery(function() {
						jQuery("#order").sortable({ opacity: 0.6, cursor: 'move', update: function (){
							document.getElementById("category_order").value = jQuery(this).sortable("toArray");
						}
						});
					});
				});
				
			</script> 
			<?php
		}
	}
	
	function bordeaux_category_order() {
		if(isset($_GET['childrenOf'])){
			$childrenOf = $_GET['childrenOf'];
		}else{
			$childrenOf = 0;
		}
		
		
		$options = get_option(THEME_NAME."_category_order");
		$order = $options[$childrenOf];
		
		
		if(isset($_POST['submit'])){
			$options[$childrenOf] = $order = $_POST['category_order'];
			update_option(THEME_NAME."_category_order", $options);
			$updated = true;
		}
		
		$allthecategories = get_categories("hide_empty=0&taxonomy=".OT_POST_MENU."-cat");
		if($childrenOf != 0){
			foreach($allthecategories as $category){
				if($category->cat_ID == $childrenOf){
					$father = $category->parent;
					$current_name = $category->name;
				}
			}
			
		}
		
		$categories = get_categories("hide_empty=0&taxonomy=".OT_POST_MENU."-cat&child_of=$childrenOf");
		
		if($order){
			$order_array = explode(",", $order);
		
			$i=0;
		
			foreach($order_array as $id){
				foreach($categories as $n => $category){
					if(is_object($category) && $category->term_id == $id){
						$categories[$n]->order = $i;
						$i++;
					}
				}
				
				
				foreach($categories as $n => $category){
					if(is_object($category) && !isset($category->order)){
						$categories[$n]->order = 99999;
					}
				}

			}
			
			usort($categories, THEME_NAME."_category_order_compare");
			
		}
		
		?>
		
		<div class='wrap'>
			
			<?php if(isset($updated) && $updated == true): ?>
				<div id="message" class="fade updated"><p><?php _e("Changes Saved.", THEME_NAME);?></p></div>
			<?php endif; ?>
			
			<form action="" method="POST">
				<input type="hidden" id="category_order" name="category_order" size="500" value="<?php echo $order; ?>">
				<input type="hidden" name="childrenOf" value="<?php echo $childrenOf; ?>" />
			<h2><?php _e("Bordeaux Menu Category Order", THEME_NAME);?></h2>
			
			<?php if($childrenOf != 0): ?>
			<p><a href="<?php bloginfo("wpurl"); ?>/wp-admin/edit.php?post_type=<?php echo OT_POST_MENU;?>&page=<?php echo THEME_NAME;?>-category-order&amp;childrenOf=<?php echo $father; ?>"><img src="<?php echo THEME_IMAGE_URL."btn-back-1.png";?>" alt="Back" title="Back" /></a></p>
			<h3><?php echo $current_name; ?></h3>
			<h5><?php _e("Just drag &amp; drop them", THEME_NAME);?></h5>
			<?php else: ?>
			<h3><?php _e("Top level categories", THEME_NAME);?></h3>
			<h5><?php _e("Just drag &amp; drop them", THEME_NAME);?></h5>
			<?php endif; ?>
			
			<div id="container">
				<div id="order">
					<?php
					foreach($categories as $category) {
						
						if($category->parent == $childrenOf){
							
							echo "<div id='$category->cat_ID' class='lineitem'>";
							if(get_categories("hide_empty=0&taxonomy=".OT_POST_MENU."-cat&child_of=$category->cat_ID")){
								echo "<span class=\"childrenlink\"><a href=\"".get_bloginfo("wpurl")."/wp-admin/edit.php?post_type=".OT_POST_MENU."&page=".THEME_NAME."-category-order&childrenOf=$category->cat_ID\">".__("Order subcategories &raquo;",THEME_NAME)."</a></span>";
							}
							echo "<h4>$category->name</h4>";
							echo "</div>\n";
							
						}
					}
					?>
				</div>
				<p class="submit"><input type="submit" name="submit" Value="<?php _e("Save Changes", THEME_NAME);?>"></p>
			</div>
			</form>
		</div>

		<?php
	}



	function add_new_menucard_columns($column_name) {
		$new_columns['cb'] = '<input type="checkbox" />';
	 
		$new_columns['title'] = _x('Item Title', 'column name');
		$new_columns['price'] = _x('Price', 'column name');
		$new_columns['slider'] = _x('Slider', 'column name');
		$new_columns['popular'] = _x('Popular', 'column name');
		$new_columns['category'] = _x('Category', 'column name');
		$new_columns['author'] = _x('Author', 'column name');
	 
	 
		$new_columns['date'] = _x('Date', 'column name');
	 
		return $new_columns;
	}

	function manage_menucard_columns($column_name, $id) {
		global $wpdb;
		switch ($column_name) {
		case 'id':
			echo $id;
			       break;
	 
		case 'price':
			$price = $wpdb->get_var($wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key='".THEME_NAME."_price' AND post_id = {$id};",""));
			
			if(!$price) $price="0";
			echo  "<a href=\"post.php?post=".$id."&action=edit\">".$price." ".get_option(THEME_NAME.'_currency_category')."</a> ";
			break;
			
		case 'slider':
			$slider = $wpdb->get_var($wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key='".THEME_NAME."_slider' AND post_id = {$id};",""));
		
			if($slider=="1") {
				$slider="Yes";
			}
			else {
				$slider="No";
			}
			echo "<a href=\"post.php?post=".$id."&action=edit\">".$slider."</a>";
			break;
			
		case 'popular':
			$popular_offering = $wpdb->get_var($wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key='".THEME_NAME."_popular_offering' AND post_id = {$id};",""));
			
			if($popular_offering=="1") {
				$popular_offering="Yes";
			}
			else {
				$popular_offering="No";
			}
			echo "<a href=\"post.php?post=".$id."&action=edit\">".$popular_offering."</a>";
			break;
			
		case 'category':
			
			$terms=wp_get_post_terms($id, OT_POST_MENU.'-cat');
			$term_string="";
			$first=true;
			foreach($terms as $term){
				if(!$first) {
					$term_string.=', ';	
				}
					
				$term_string.="<a href=\"post.php?post=".$id."&action=edit\">".($term->name)."</a>";
				$first=false;
			}
			
			echo $term_string;
			break;
			
			default:
			break;
			
		} // end switch
		
	}

	function mytheme_admin_bar_render() {
        global $wp_admin_bar, $wpdb;
        $table_name = $wpdb->prefix.THEME_NAME."_reservation"; 
		$count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(id) as Num FROM $table_name WHERE approve=''",""));		
		
		if($count!=0) $c="<span id=\"ab-awaiting-mod\" class=\"pending-count\">".$count."</span>";
        $wp_admin_bar->add_menu( 
        	array(
		        'id' => 'reservations',
		        'title' => __('Reservations '.$c, THEME_NAME),
		        'href' => admin_url( 'admin.php?page=theme-configuration#1')
   	 		) 
   	 	);
	}
	add_action('wp_before_admin_bar_render', 'mytheme_admin_bar_render');
	add_action('admin_head', 'bordeaux_category_order_head'); 
	add_action('admin_menu', 'bordeaux_category_order_scriptaculous');
	add_filter('manage_edit-'.OT_POST_MENU.'_columns', 'add_new_menucard_columns');
	add_action('manage_'.OT_POST_MENU.'_posts_custom_column', 'manage_menucard_columns', 10, 2);

?>
