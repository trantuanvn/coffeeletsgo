<?php require_once( '../../../../wp-load.php' );?>
	<h2 class="ot-light-title light-title"></h2>
	<a href="#" onclick="javascript:lightboxclose();" class="light-close"><i class="fa fa-minus-square"></i>&nbsp;&nbsp;<?php _e("Close Window",THEME_NAME);?></a>
			
	<div class="main-block">
		<div class="photo-gallery-block ot-slide-item">
			<span class="next-image" data-next="0"></span>

			<span class="gal-current-image">
				<div class="the-image loading waiter image-frame">
					<img class="image-big-gallery ot-gallery-image" data-id="0" style="display:none;" src="#" alt="" />
				</div>	
			</span>	
		
			<div class="page-numbers gallery-full-photo">
				<a href="javascript:void(0);" class="prev"><i class="fa fa-caret-left"></i></a>
				<span><span class="current">0</span> <?php _e("of", THEME_NAME);?> <span class="total">0</span></span>
				<a href="javascript:void(0);" class="next"><i class="fa fa-caret-right"></i></a>
			</div>

			<div class="description">
				<p id="ot-lightbox-content"></p>
			</div>

			<div class="thumbnails the-thumbs" id="ot-lightbox-thumbs"></div>


		</div>
		
	</div>
