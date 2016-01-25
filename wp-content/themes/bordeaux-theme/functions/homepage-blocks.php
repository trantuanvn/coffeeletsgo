<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* -------------------------------------------------------------------------*
 * 								HOMEPAGE BUILDER							*
 * -------------------------------------------------------------------------*/
 
class OT_home_builder {

	private static $data;
	public static $counter = 1; 


	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE INFO BLOCKS							*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_info($blockType, $blockId,$blockInputType) {
		global $post;

		$blockData = array();
		for($i=1; $i<=3; $i++) {
			$blockData[$i]['title'] = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$i."_".$blockId));
			$blockData[$i]['image'] = get_option(THEME_NAME."_".$blockType."_image_".$i."_".$blockId);
			$blockData[$i]['text'] = wpautop(stripslashes(get_option(THEME_NAME."_".$blockType."_text_".$i."_".$blockId)));
			$blockData[$i]['url'] = get_option(THEME_NAME."_".$blockType."_url_".$i."_".$blockId);
		}
		
		//set block attributes
		$attr = array(
			'data' =>$blockData,
		);


		//add all data in array
		$data = array($attr);

		//set data
		$this->set_data($data);
		$block = "homepage-info";
		return $block;

	}

	/* -------------------------------------------------------------------------*
	 * 					HOMEPAGE FEATURED MENUCARD/SHOP ITEMS					*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$type = get_option(THEME_NAME."_".$blockType."_type_".$blockId);
		$text = nl2br(do_shortcode(stripslashes(get_option(THEME_NAME."_".$blockType."_text_".$blockId))));
		$sidebar = wpautop(stripslashes(get_option(THEME_NAME."_".$blockType."_sidebar_".$blockId)));

		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'type' =>$type,
			'text' =>$text,
			'cat' => false,
			'sidebar' =>$sidebar
		);

		//set wp query
		if($type=="1") {
			//latest posts & posts by cat
			$args=array(
				'posts_per_page' => $count,
				'order'	=> 'DESC',
				'orderby'	=> 'date',
				'post_type'	=> OT_POST_MENU,
				'ignore_sticky_posts '	=> 1,
				'post_status '	=> 'publish',
				'meta_key'	=> THEME_NAME.'_popular_offering',
				'meta_value'	=> 'yes',
			);
		} else if($type=="2") {
			//popular posts
			$args=array(
				'posts_per_page' => $count,
				'order'	=> 'DESC',
				'orderby'	=> 'date',
				'post_type'	=> 'product',
				'ignore_sticky_posts '	=> 1,
				'post_status '	=> 'publish',
				'meta_key'	=> '_featured',
				'meta_value'	=> 'yes',
			);
		}


		$my_query = new WP_Query($args);



		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "block-1";
		return $block;

	}
	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE LATEST NEWS						*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_1($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$text = nl2br(do_shortcode(stripslashes(get_option(THEME_NAME."_".$blockType."_text_".$blockId))));
		$sidebar = wpautop(stripslashes(get_option(THEME_NAME."_".$blockType."_sidebar_".$blockId)));

		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'text' =>$text,
			'type' => false,
			'cat' => $cat,
			'sidebar' =>$sidebar
		);

		//set wp query
		$args = array(
			'post_type' => "post",
			'cat' => $cat,
			'showposts' => $count,
			'ignore_sticky_posts' => "1"
		);

		$my_query = new WP_Query($args);

		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "block-1";
		return $block;

	}



	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE HTML BLOCK								*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_html($blockType, $blockId,$blockInputType) {
		global $post;
		$code = get_option(THEME_NAME."_".$blockType."_".$blockId);
		$title = get_option(THEME_NAME."_".$blockType."_title_".$blockId);

		
		//set block attributes
		$attr = array(
			'code' =>wpautop(stripslashes(do_shortcode($code))),
			'title' =>stripslashes($title),
		);


		//add all data in array
		$data = array($attr);

		//set data
		$this->set_data($data);
		$block = "block-2";
		return $block;

	}

	private static function set_data($data) {
		self::$data = $data;
	}

	public static function get_data() {
		return self::$data;
	}


} 
?>