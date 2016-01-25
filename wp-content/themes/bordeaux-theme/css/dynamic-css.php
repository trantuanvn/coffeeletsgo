<?php
	header("Content-type: text/css");
	require_once('../../../../wp-load.php');

	//banner settings
	$banner_type = get_option ( THEME_NAME."_banner_type" );


	//colors
	$color_1 = get_option(THEME_NAME."_color_1");
	$color_2 = get_option(THEME_NAME."_color_2");

	$bg_texture = get_option(THEME_NAME."_bg_texture");
	$bg_texture_slider = get_option(THEME_NAME."_bg_texture_slider");
	$bg_texture_header = get_option(THEME_NAME."_bg_texture_header");

?>





<?php
	if ( $banner_type == "image" ) {
	//Image Banner
?>
		#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:20001; background-color:#000000; overflow: hidden;  }
		#popup { display: none; position:absolute; width:auto; height:auto; z-index:20002; color: #000; font-family: Tahoma,sans-serif;font-size: 14px; }
		#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -10px; top: -10px; }
<?php
	} else if ( $banner_type == "text" ) {
	//Text Banner
?>
		#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:20001; background-color:#000000; overflow: hidden;  }
		#popup { display: none; position:absolute; width:auto; height:auto; max-width:700px; z-index:20002; border: 1px solid #000; background: #e5e5e5 url(<?php echo get_template_directory_uri(); ?>/images/dotted-bg-6.png) 0 0 repeat; color: #000; font-family: Tahoma,sans-serif;font-size: 14px; line-height: 24px; border: 1px solid #cccccc; -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; text-shadow: #fff 0 1px 0; }
		#popup center { display: block; padding: 20px 20px 20px 20px; }
		#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -12px; top: -12px; }
<?php 
	} else if ( $banner_type == "text_image" ) {
	//Image And Text Banner
?>
		#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:20001; background-color:#000000; overflow: hidden;  }
		#popup { display: none; position:absolute; width:auto; z-index:20002; color: #000; font-size: 11px; font-weight: bold; }
		#popup center { padding: 15px 0 0 0; }
		#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -10px; top: -10px; }
<?php } ?>


/* Main color Scheme */
.main-menu-custom .wrapper, .main-spacer.ribbon, .more-link, .main-title, .main-title .ribbon .inner, .tabs .tab-navi li.active a, .main-title .ribbon-tail .inner-top, .main-title .ribbon-tail .inner-bottom, .pagination .page-numbers.current {
	background-color: #<?php echo $color_1;?>;
}
.main-menu-custom .wrapper, .split-content .content-white.small .widget .title h3, .reservation-navi h4, .photo-gallery-block .page-numbers span, blockquote, .title-red, .events .item h6, .sidebar-content .widget > .title h3, .blog-list-1 .item .comments a, .blog-list-1 .item .section a, .blog-list-1 .item .author a {
	color: #<?php echo $color_1;?>;
}
.tabs .tab-navi {
	border-bottom: 3px solid #<?php echo $color_1;?>;
}
blockquote.style-3 {
	border: 1px dashed #<?php echo $color_1;?>;
}
.tabs .tab-navi li a {
	background-color: #daae8b;
}

/* Link colors */
.content a {
	color: #<?php echo $color_2;?>;
}

.header {
	background-image: url(<?php echo THEME_IMAGE_URL.$bg_texture_header;?>); 
	background-attachment: scroll; 
	background-origin: padding-box; 
	background-clip: border-box; 
	background-color: rgba(0, 0, 0, 0); 
	background-size: auto; 
	background-position: top center; 
	background-repeat: repeat repeat;
}
.slider-content, .footer {
	background-image: url(<?php echo THEME_IMAGE_URL.$bg_texture_slider;?>); 
	background-attachment: scroll; 
	background-origin: padding-box; 
	background-clip: border-box; 
	background-color: rgba(0, 0, 0, 0); 
	background-size: auto; 
	background-position: top center;
	background-repeat: repeat repeat;
}
body {
	background-image: url(<?php echo THEME_IMAGE_URL.$bg_texture;?>); 
	background-attachment: scroll; 
	background-origin: padding-box; 
	background-clip: border-box; 
	background-color: rgba(0, 0, 0, 0); 
	background-size: auto; 
	background-position: top center; 
	background-repeat: repeat repeat;
}