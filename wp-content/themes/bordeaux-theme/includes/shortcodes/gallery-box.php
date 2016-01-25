<?php
add_shortcode('ot-gallery', 'gallery_handler');
function gallery_handler($atts, $content=null, $code="") {
	if(isset($atts['url'])) {
		if(substr($atts['url'],-1) == '/') {
			$atts['url'] = substr($atts['url'],0,-1);
		}
		$vars = explode('/',$atts['url']);
		$slug = $vars[count($vars)-1];
		$page = get_page_by_path($slug,'OBJECT',OT_POST_GALLERY);
		if(is_object($page)) {
			$id = $page->ID;
			if(is_numeric($id)) {
				$gallery_style = get_post_meta ( $id, THEME_NAME."_gallery_style", true );
				$galleryImages = get_post_meta ( $id, THEME_NAME."_gallery_images", true ); 
				$imageIDs = explode(",",$galleryImages);
				$count = count($imageIDs);
				if($gallery_style=="lightbox") { $classL = 'light-show '; } else { $classL = false; }

				$content.=	'<div class="gallery-preview-box-wrapper">';
					$content.=	'<div class="gallery-preview-box">';
						$content.=	'<p><b>'.__("Photo gallery:", THEME_NAME).'</b> '.$page->post_title.'</p>';
		            		$counter=1;
		            		foreach($imageIDs as $imgID) { 
		            			if ($counter==5) break;
		            			if($imgID) {
			            			$file = wp_get_attachment_url($imgID);
			            			
									$image = get_post_thumb(false, 80, 80, false, $file);
									$content.=	'<a href="'.$atts['url'].'?page='.$counter.'" class="border-image '.$classL.'" data-id="gallery-'.$id.'">
														<img src="'.$image['src'].'" alt="'.$page->post_title.'" title="'.$page->post_title.'" data-id="'.$counter.'"/>
													</a>';
									}

									$counter++;
								}
						$content.=	'<a href="'.$atts['url'].'" class="show-all-photos">'.__("show<br/>all<br/>photos", THEME_NAME).'</a>'; 
					$content.=	'</div>';
				$content.=	'</div>';

			} else {
				$content.= "Incorrect URL attribute defined";
			}
		} else {
			$content.= "Incorrect URL attribute defined";
		}
		
	} else {
		$content.= "No url attribute defined!";
	
	}
	return $content;
}


?>
