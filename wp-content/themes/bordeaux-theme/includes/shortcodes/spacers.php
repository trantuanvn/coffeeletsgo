<?php
	add_shortcode('spacer', 'spacer_handler');

	function spacer_handler($atts, $content=null, $code="") {
		switch ($atts['style']) {
			case '1':
				$class = "main-spacer";
				break;
			case '2':
				$class = "main-spacer star";
				break;
			case '3':
				$class = "main-spacer dashed";
				break;
			case '4':
				$class = "main-spacer thick-dashed";
				break;
			case '5':
				$class = "main-spacer zigzag";
				break;
			case '6':
				$class = "main-spacer ribbon-grunge";
				break;
			case '7':
				$class = "main-spacer ribbon";
				break;
			
			default:
				$class = "main-spacer";
				break;
		}
		if(isset($atts["color"]) && ($atts['style']==6 || $atts['style']==7 )) { 
			/* Color */
			$color=$atts["color"];	
			$color=' style="background-color:#'.$color.'"';
		} else {
			$color = false;
		}
		return '<div class="'.$class.'"'.$color.'></div>';

	}
?>