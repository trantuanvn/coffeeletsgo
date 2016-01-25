<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	add_action( 'wp_enqueue_scripts', 'orange_themes_scripts');
	
	function orange_themes_scripts() { 
		global $wp_styles,$wp_scripts;
		$post_type = get_post_type();
		$slider_enable = get_option(THEME_NAME."_slider_enable");
		$responsive = get_option(THEME_NAME."_responsive");
		$banner_type = get_option ( THEME_NAME."_banner_type" );


		//include google fonts
		$google_fonts = array();
		for($i=1; $i<=2; $i++) {
			if(get_option(THEME_NAME."_google_font_".$i)) {
				$google_fonts[] = get_option(THEME_NAME."_google_font_".$i);	
			}
			
		}
		$google_fonts = array_unique($google_fonts);
		$i=1;
		foreach($google_fonts as $google_font) {
			$protocol = is_ssl() ? 'https' : 'http';
			if($google_font && $google_font!="Arial") {
				wp_enqueue_style( 'google-fonts-'.$i, $protocol."://fonts.googleapis.com/css?family=".str_replace(" ", "+", $google_font));
			}
			$i++;
		}
		

		wp_enqueue_style("reset", THEME_CSS_URL."reset.css", Array());
		wp_enqueue_style("font-awesome", THEME_CSS_URL."font-awesome.min.css", Array());
		wp_enqueue_style("main-stylesheet", THEME_CSS_URL."main-stylesheet.css", Array());
		wp_enqueue_style("lightbox", THEME_CSS_URL."lightbox.css", Array());
		wp_enqueue_style("shortcodes", THEME_CSS_URL."shortcodes.css", Array());
		if (is_page_template("template-homepage.php")) { 
			wp_enqueue_style("ot-layerslider", THEME_CSS_URL."layerslider.css", Array());
			wp_enqueue_style("ot-layerslider-skin", THEME_CSS_URL."parallax-slider/skins/lightskin/skin.css", Array());
		}
		if($responsive=="on") {
			wp_enqueue_style("responsive", THEME_CSS_URL."responsive.css", Array());
		}
		wp_enqueue_style('ie-only-styles', THEME_CSS_URL.'ie-ancient.css');
		$wp_styles->add_data('ie-only-styles', 'conditional', '!IE');
		
		wp_enqueue_style("parallax-slider-main-stylesheet", THEME_CSS_URL."parallax-slider-main-stylesheet.css", Array());
		wp_enqueue_style("fonts", THEME_CSS_URL."fonts.php", Array());
		wp_enqueue_style("dynamic-css", THEME_CSS_URL."dynamic-css.php", Array());
 		wp_enqueue_style("style", get_stylesheet_uri(), Array());

 		// js files
		wp_enqueue_script("jquery");
		wp_enqueue_script("html5" , THEME_JS_URL."html5.js", Array('jquery'), "", false);
		$wp_scripts->add_data('html5', 'conditional', 'lt IE 9');

		
		if($banner_type) {
			wp_enqueue_script("banner" , THEME_JS_URL."jquery.floating_popup.1.3.min.js", Array('jquery'), "1.0", true);
		}
		wp_enqueue_script("cookies" , THEME_JS_URL."admin/jquery.c00kie.js", Array('jquery'), "1.0", true);
		wp_enqueue_script("ot-dynamic-scripts" , THEME_JS_URL."scripts.php", Array('jquery'), "1.0", true);	
		wp_enqueue_script("scripts" , THEME_JS_URL."theme-scripts.js", Array('jquery'), "1.0.0", true);
		wp_enqueue_script("lightbox" , THEME_JS_URL."lightbox.js", Array('jquery'), "1.0", true);
		wp_enqueue_script("jquery-transit-modified" , THEME_JS_URL."jquery-transit-modified.js", Array('jquery'), "", true);
		wp_enqueue_script("jquery-easing" , THEME_JS_URL."jquery-easing-1.3.js", Array('jquery'), '', true);
		wp_enqueue_script("swipe" , THEME_JS_URL."jquery.event.swipe.js", Array('jquery'), '', true);
		wp_enqueue_script("jquery-isotope" , THEME_JS_URL."jquery.isotope.min.js", Array('jquery'), '', true);
		wp_enqueue_script("jquery-ui" , THEME_JS_URL."jquery-ui.js", Array('jquery'), '', true);
		wp_enqueue_script("scripts-".THEME_NAME , THEME_JS_URL.THEME_NAME.".js", Array('jquery'), "1.0.0", true);
		
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
		
		wp_enqueue_script("ot-gallery" , THEME_JS_URL."ot_gallery.js", Array('jquery'), "1.0", true);
		wp_enqueue_script("ot-scripts" , THEME_JS_URL."scripts.js", Array('jquery'), "1.0", true);

		if (is_page_template("template-reservations.php")) { 
			wp_enqueue_script("ot-calendar" , THEME_JS_URL."calendar.php", Array('jquery'), "1.0", true);
		}


		$post_type = get_post_type();
		if($post_type==OT_POST_GALLERY) {
			$gallery_id =get_the_ID();
		} else { 
			$gallery_id = false;
		}
		
		wp_localize_script('jquery','ot',
			array(
				'adminUrl' => admin_url("admin-ajax.php"),
				'gallery_id' => $gallery_id,
				'galleryCat' => get_query_var('gallery-cat'),
				'imageUrl' => THEME_IMAGE_URL,
				'cssUrl' => THEME_CSS_URL,
				'themeUrl' => THEME_URL
			)
		);
		
	}
	
?>