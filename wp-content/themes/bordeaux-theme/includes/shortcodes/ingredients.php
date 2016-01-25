<?php
	add_shortcode('ingredients_wrap', 'ingredients_handler');

	function ingredients_handler($atts, $content=null, $code="") {
		$ingredients = explode(";", $content);
		$return=  '<h3>'.__("Ingredients", THEME_NAME).'</h3>';
		$return.=  '<div class="ingredients-wrapper">';
			$return.=  '<ul>';
				foreach($ingredients as $ingredient) { 
					$return.=  '<li>'.$ingredient.'</li>';
				}
			$return.=  '</ul>';
		$return.=  '</div>';



		return $return;
	}
?>
