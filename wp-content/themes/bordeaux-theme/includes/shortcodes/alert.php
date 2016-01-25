<?php
add_shortcode('alert', 'alert_handler');

function alert_handler($atts, $content=null, $code="") {
	extract(shortcode_atts(array('color' => null,'icon' => null,), $atts) );


	if(isset($icon) && $icon!="Select a Icon" ) {
		$icon = '<i class="fa '.$icon.' fa-fw fa-3x"></i>';
	} else {
		$icon = false;
	}
		

	return '<div class="coloralert" style="background-color:#'.$color.';">'.$icon.'
				<p>'.do_shortcode($content).'</p>
				<a href="#close-alert" class="closealert"><i class="fa fa-minus-circle"></i></a>
			</div>';

}

?>
