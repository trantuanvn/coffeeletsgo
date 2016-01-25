<?php
	add_shortcode('directions_wrap', 'directions_handler');

	function directions_handler($atts, $content=null, $code="") {
		$directions = explode(";", $content);
			$return=  '<h3>'.__("Directions", THEME_NAME).'</h3>';
			$return.=  '<div class="directions-wrapper">';
				$return.=  '<ol>';
					foreach($directions as $direction) { 
						$return.=  '<li>'.$direction.'</li>';
					}
				$return.=  '</ol>';
			$return.=  '</div>';
		return $return;
	}
?>
