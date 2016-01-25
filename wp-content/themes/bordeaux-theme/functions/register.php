<?php

$homepage = get_option( 'show_on_front');
if( $homepage == "page" ) {
	$meta = get_post_custom_values("_wp_page_template",get_option( 'page_on_front'));
	if($homepage == "page" && $meta[0] == "template-homepage.php") {$has_homepage=true;} else {$has_homepage=false;}
}
	
	
function register_my_menus() {
	if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array( 
				'main-menu' => __( 'Main Menu', THEME_NAME ),
				'footer-menu' => __( 'Footer Menu', THEME_NAME ),
			)
		);
	}	
}
function create_gallery() {
		
	$labels = array(
    'name' => _x('Gallery', THEME_NAME.' menu'),
    'singular_name' => _x('Gallery Menu', THEME_NAME.' menu'),
    'add_new' => _x('Add New', THEME_NAME.' menu'),
    'add_new_item' => __('Add New Item', THEME_NAME),
    'edit_item' => __('Edit Item', THEME_NAME),
    'new_item' => __('New Gallery Item', THEME_NAME),
    'view_item' => __('View Item', THEME_NAME),
    'search_items' => __('Search Gallery Items', THEME_NAME),
    'not_found' =>  __('No gallery items found', THEME_NAME),
    'not_found_in_trash' => __('No gallery items found in Trash', THEME_NAME), 
    'parent_item_colon' => ''
	);
  
	register_taxonomy(OT_POST_GALLERY."-cat", 
					    	array("Gallery Categories"), 
					    	array(	"hierarchical" => true, 
					    			"label" => "Gallery Categories", 
					    			"singular_label" => "Gallery Categories", 
					    			"rewrite" => true,
					    			"query_var" => true
					    		));  
		
		register_post_type( OT_POST_GALLERY,
		array( 'labels' => $labels,
	         'public' => true,  
	         'show_ui' => true,  
	         'capability_type' => 'post',  
	         'hierarchical' => false,  
			 'taxonomies' => array(OT_POST_GALLERY.'-cat'),
	         'supports' => array('title', 'editor', 'page-attributes', 'excerpt') ) );

}

function create_menu() {
		
	$labels = array(
    'name' => __('Menu Card', THEME_NAME),
    'singular_name' => __('Menu Card', THEME_NAME),
    'add_new' => __('Add New', THEME_NAME),
    'add_new_item' => __('Add New Item', THEME_NAME),
    'edit_item' => __('Edit Item', THEME_NAME),
    'new_item' => __('Menu Card Item', THEME_NAME),
    'view_item' => __('View Item', THEME_NAME),
    'search_items' => __('Menu Card Items', THEME_NAME),
    'not_found' =>  __('No items found', THEME_NAME),
    'not_found_in_trash' => __('No items found in Trash', THEME_NAME), 
    'parent_item_colon' => ''
	);
  
	register_taxonomy(OT_POST_MENU."-cat", 
					    	array(__("Menu Card Categories", THEME_NAME)), 
					    	array(	"hierarchical" => true, 
					    			"label" => __("Menu Card Categories", THEME_NAME), 
					    			"singular_label" => __("Menu Card Categories", THEME_NAME), 
					    			"rewrite" => true,
					    			"query_var" => true
					    		));  
		
		register_post_type( OT_POST_MENU,
		array( 'labels' => $labels,
	        'public' 				=> true,  
	        'show_ui' 				=> true,  
	        'capability_type'		=> 'post',
			'map_meta_cap'			=> true,
			'publicly_queryable' 	=> true,
			'exclude_from_search' 	=> false,
			'query_var' 			=> true,
	        'hierarchical' 			=> false,  
	        'show_in_nav_menus' 	=> false,
			'taxonomies' 			=> array(OT_POST_MENU.'-cat'),
	        'supports' 				=> array('title', 'editor', 'thumbnail', 'comments', 'page-attributes', 'excerpt') ) );



}






function orange_register_sidebar($name, $id, $description){
	register_sidebar(array('name'=>$name,
		'id' => $id,
		'description' => $description,
		'before_widget' => '<div class="widget col span_1_of_3">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div>'
	));
}


/* -------------------------------------------------------------------------*
 * 							DEFAULT SIDEBARS								*
 * -------------------------------------------------------------------------*/

$orange_sidebars=array(
	array('name'=>'Default Sidebar', 'id'=>'default','description' => __('The default page sidebar.', THEME_NAME)),
	array('name'=>'Footer', 'id'=>'footer', 'description' => __('Footer widget area, supports up to 3 widgets.', THEME_NAME))	
);	
	
$sidebar_strings = get_option(THEME_NAME.'_sidebar_names');
$generated_sidebars = explode("|*|", $sidebar_strings);
array_pop($generated_sidebars);
$orange_generated_sidebars=array();
	
foreach($generated_sidebars as $sidebar) {
	$orange_sidebars[]=array('name'=>$sidebar, 'id'=>convert_to_class($sidebar), 'description'=>$sidebar);
	$orange_generated_sidebars[]=array('name'=>$sidebar, 'id'=>convert_to_class($sidebar), 'description'=>$sidebar);
}
 
 /* -------------------------------------------------------------------------*
 * 							REGISTER ALL SIDEBARS
 * -------------------------------------------------------------------------*/

if (function_exists('register_sidebar')) {
	
	//register the sidebars
	foreach($orange_sidebars as $sidebar){
		orange_register_sidebar($sidebar['name'], $sidebar['id'], $sidebar['description']);
	}
	
}
add_action('init', 'create_gallery');
add_action('init', 'create_menu');
add_action('init', 'register_my_menus' );
add_theme_support( 'post-thumbnails' );
?>