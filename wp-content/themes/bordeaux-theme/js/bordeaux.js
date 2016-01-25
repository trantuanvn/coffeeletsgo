	"use strict";
/* -------------------------------------------------------------------------*
 * 								addLoadEvent
 * -------------------------------------------------------------------------*/
	function addLoadEvent(func) { 
	  	var oldonload = window.onload;
	  	if(typeof window.onload != 'function') {
			window.onload = func;
	 	}else{
			window.onload = function() {
				if(oldonload) {
					oldonload();
				}		
			}
	  	}
	}

    /*---------------------------------
	  HIDE WOO EMPTY CART
	---------------------------------*/


	if ( jQuery.cookie( "woocommerce_items_in_cart" ) > 0 ) {
		jQuery('.hide_cart_widget_if_empty').closest('.widget').show();
	} else {
		jQuery('.hide_cart_widget_if_empty').closest('.widget').hide();
	}

	jQuery('body').bind('adding_to_cart', function(){
	    jQuery(this).find('.hide_cart_widget_if_empty').closest('.widget').fadeIn();
	});