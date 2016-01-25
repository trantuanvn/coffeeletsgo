<?php
add_shortcode('button', 'button_handler');

function button_handler($atts, $content=null, $code="") {
	extract(shortcode_atts(array('color' => null,'textcolor' => null,'icon' => null,'size' => null,), $atts) );


	if(isset($icon) && $icon!="Select a Icon" ) {
		$icon = '<i class="fa '.$icon.'"></i>&nbsp;&nbsp;';
	} else {
		$icon = false;
	}


	/* Target */
	$target=$atts["target"];
	if(!isset($atts["target"]) || $atts["target"]=="blank") {
		$target="_blank";
	} else {
		$target="_self";
	}

	/* link */
	if(isset($atts["link"])) {
		$link = $atts["link"];
	} else {
		$link = "#";
	}

	if($size=="large") {
		$size="big";
	} else {
		$size=false;
	}
	
	if($icon==false) {
		$return = '<a href="'.$link.'" class="button '.$size.' custom" target="'.$target.'" style="background:#'.$color.'; color:#'.$textcolor.';">'.$content.'</a>';
	} else {
		$return = '<a href="'.$link.'" class="button '.$size.' custom" target="'.$target.'" style="background:#'.$color.'; color:#'.$textcolor.';">'.$icon.$content.'</a>';
	}

	
	return $return;
}

?>
