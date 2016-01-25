<?php
	header("Content-type: text/javascript");
	require_once('../../../../wp-load.php');

	$max_places = get_option(THEME_NAME."_table_count");

	$avarage_places=round($max_places/2);
	$table_name = $wpdb->prefix.THEME_NAME."_reservation"; 
	
	global $wpdb;
	$sql = "SELECT reservationDate, approve
			FROM $table_name WHERE approve='yes'";
		$reservationarray="";
		$results = $wpdb->get_results($sql);
		
		foreach( $results as $result ) {

			$reservationDate=$result->reservationDate;
			$reservationDate = date("Y-n-j", $reservationDate);
			$reservationarray.="'".$reservationDate."', ";

		} //end foreach


		$freeDays = get_option( THEME_NAME.'_custom_free_days' );
		$freeDays = explode( "|*|", $freeDays );
		foreach($freeDays as $freeDay){
			$freeDay = date("Y-n-j", strtotime($freeDay));
			for($i = 1; $i <= $max_places; $i++) {
				$reservationarray.="'".$freeDay."', ";
			} //end for
		}
?>
		  //<![CDATA[
			var calendarClass = function( formName, inputName, inputNamee , selected_day ) {
				this.calendarElem = null;
				this.inputElem = null;
				this.inputElemm = null;
				this.selected_day = null;
				this.today = new Date();
				this.theYear = null;
				this.theMonth = null;
				this.previousMonth = null;
				this.nextMonth = null;
				this.firstDay = null;
				this.dayCount = null;
				this.current = true;
				this.monthsArray = new Array("<?php _e('January', THEME_NAME); ?>","<?php _e('February', THEME_NAME); ?>","<?php _e('March', THEME_NAME); ?>","<?php _e('April', THEME_NAME); ?>","<?php _e('May', THEME_NAME); ?>","<?php _e('June', THEME_NAME); ?>","<?php _e('July', THEME_NAME); ?>","<?php _e('August', THEME_NAME); ?>","<?php _e('September',THEME_NAME); ?>","<?php _e('October', THEME_NAME); ?>","<?php _e('November',THEME_NAME); ?>","<?php _e('December', THEME_NAME); ?>");
			   



				this.initCalendar = function() {
					this.calendarElem = document.getElementById('Calendar');
					this.inputElem = document.forms[formName].elements[inputName];
					this.inputElemm = document.forms[formName].elements[inputNamee];
					this.selected_day = document.forms[formName].elements[selected_day];
				  
				  if( this.calendarElem.style.display == 'inline' ) {
					this.getCurrentDate();

				  } else {
					this.setVariables();
					this.calendarElem.style.display = 'inline';
				  }
				}

				this.setVariables = function() {
					this.theMonth = this.today.getMonth();
					this.previousMonth = new Date( this.theYear, this.theMonth, 0 ).getDate();
					this.nextMonth = 1;
					this.theYear = this.getY2KYear();
					this.firstDay = this.getFirstDay();
					this.dayCount = this.getMonthLen() + this.firstDay;
					this.day = this.today.getDate();
					
					this.calendarElem.innerHTML = this.generateHTML();
			   }
			   
			   this.getY2KYear = function() {
					// correct for Y2K anomalies
					var year = this.today.getYear();
					return ( ( year < 1900 ) ? year + 1900 : year );
			   }
			   
			   this.getFirstDay = function() {
					var firstDate = new Date( this.theYear, this.theMonth, 1 );
					return firstDate.getDay() == 0 ? 7 : firstDate.getDay();
			   }
			   
			   this.getMonthLen = function() {
					// Noskaidro cik saja menesi ir dienas
					var oneDay = 1000 * 60 * 60 * 24;
					var thisMonth = new Date( this.theYear, this.theMonth, 1 );
					var nextMonth = new Date( this.theYear, this.theMonth + 1, 1 );
					var len = Math.ceil( ( nextMonth.getTime() - thisMonth.getTime() ) / oneDay );
				  
					return len;
			   }
			   
			   this.getPreviousMonth = function() {
					this.current = false;
					this.today = new Date( this.theYear, this.theMonth - 1, 1 );
					this.setVariables();
			   }
			   
			   this.getPreviousYear = function() {
					this.current = false;
					this.today = new Date( this.theYear - 1, this.theMonth, 1 );
					this.setVariables();
			   }
			   
			   this.getCurrentDate = function() {
					this.current = true;
					this.today = new Date();
					this.setVariables();
			   }
			   
			   this.getNextMonth = function() {
					this.current = false;
					this.today = new Date( this.theYear, this.theMonth + 1, 1 );
					this.setVariables();
			   }
			   
			   this.getNextYear = function() {
				  this.current = false;
				  this.today = new Date( this.theYear + 1, this.theMonth, 1 );
				  this.setVariables();
			   }


			   this.getClickedDate = function( value ) {
					this.current = true;
					  if( value > 0 ) {
						 value = ( value < 10 ? '0' : '' ) + value;
						 var monthVal = ( ( this.theMonth + 1 ) < 10 ? '0' : '' ) + ( this.theMonth + 1 );
						 
						 this.inputElem.value = value + ' / ' + monthVal + ' / ' + this.theYear ; 
						 this.inputElemm.value = this.theYear + '-' + monthVal + '-' + value; 
						 this.selected_day.value = value; 
						 var reservationdate = this.theYear + '-' + monthVal + '-' + value; 
						
						 //this.initCalendar();
					  } else if( value == -1 ) {
						 this.getPreviousMonth();   
					  } else {
						 this.getNextMonth();   
					  }
						selectedDay = value; 
						this.setVariables();
			   }
					 
			  this.getActiveDate = function() {
					
					var monthVal = ( ( this.theMonth + 1 ) < 10 ? '0' : '' ) + ( this.theMonth + 1 );
			  		var selected = true;
					var selectedDay = jQuery(".selected_day").val();
					var selectedMonth = monthVal;
					this.selectedMonth = monthVal;
					var selectedYear = this.theYear;
			  
					if( selected == true && ( this.theMonth + 1 ) == selectedMonth && this.theYear == selectedYear && selectedDay!=" ") {
						return selectedDay;
					}
			   }
			   
			   this.generateHTML = function() {
				  // Pedejas korekcijas
				  if( this.firstDay == 1 ) {
					 this.firstDay = 8; 
					  this.dayCount = this.dayCount + 7;
					 this.previousMonth = this.previousMonth - ( this.firstDay - 1 );
				  }else if( this.firstDay == 6 && this.theMonth == 9) {
					 this.firstDay = 6; 
					 this.previousMonth = this.previousMonth - ( this.firstDay -1 );
				  } else {
					 this.previousMonth = this.previousMonth - ( this.firstDay - 1 );   
				  }

	  					
				function countvalues(a) {
					var b = {}, i = a.length, j;
					while( i-- ) {
					j = b[a[i]];
					b[a[i]] = j ? j+1 : 1;
					}
					return b; 
				}
				

				
					var arr=[<?php echo $reservationarray;?>];

					var a = countvalues(arr);
					var msg='';

					for (elem in a){
					msg += '\n' + elem + ' : ' + a[elem];
					
				}
				

				  
				  var fulltime=jQuery(".fulltime").val();
				  var dayCounts = this.dayCount;
				  var firstDay = this.firstDay;
				  var dateValue = null;
				  var content = '<div class="reservation-navi">';
				  		content += '<a href="javascript:void(0);" onclick="calendarElem.getPreviousMonth();" class="left"><i class="fa fa-caret-left"></i></a>';
				  		content += '<a href="javascript:void(0);" onclick="calendarElem.getNextMonth();" class="right"><i class="fa fa-caret-right"></i></a>';
				  		content += '<h4>' + this.monthsArray[this.theMonth] + '</h4>';
				 	content += '</div>';
				  	content += '<table class="reservations">';
				  		content += '<tbody>';
							content += '<tr class="weekdays"><td><?php _e('Mo', THEME_NAME); ?><\/td><td><?php _e('Tu', THEME_NAME); ?><\/td><td><?php _e('We', THEME_NAME); ?><\/td><td><?php _e('Th', THEME_NAME); ?><\/td><td><?php _e('Fr', THEME_NAME); ?><\/td><td><?php _e('Sa', THEME_NAME); ?><\/td><td><?php _e('Su', THEME_NAME); ?><\/td><\/tr>';
							content += '<tr>';

							  for( var i = 1; i < dayCounts; i++ ) {
							  if(this.theMonth==9) { var ddd=this.dayCount - 1} else { var ddd=this.dayCount}
								if( firstDay==8) {
									var i=7; 
									var firstDay=firstDay+1;
								 } else if( i < this.firstDay ) {
									dateValue = this.previousMonth + i;
									content += '<td class="days other-month"><a data-date="-1">' + dateValue + '<\/a><\/td>';
								 } 
								 else if( i >= ddd ) {
									content += '<td class="days other-month"><a data-date="-2">' + this.nextMonth + '<\/a><\/td>';
									this.nextMonth++;
								 } else if( (i - this.firstDay + 1) == this.getActiveDate() && this.current == true ) {
								 	
									var month=this.theMonth+1;
									var day=i - this.firstDay + 1;
									var resdate = this.theYear+"-"+month+"-"+day;
									
									if(countvalues(arr)[resdate]>=<?php echo $avarage_places;?> && countvalues(arr)[resdate]<<?php echo $max_places;?>) { var day_class="some-available";} else if(countvalues(arr)[resdate]>=<?php echo $max_places;?>) { var day_class="none-available";} else { var day_class=" ";} ;
									
									dateValue = i - this.firstDay + 1;
									if(countvalues(arr)[resdate]>=<?php echo $max_places;?>) {
										content += '<td class="days selected '+ day_class +'" ><a >' + dateValue + '<\/a><\/td>'; 
									} 
									else { content += '<td class="days selected '+ day_class +'"><a data-date="' + dateValue + '">' + dateValue + '<\/a><\/td>';  }
								
								}  else {
									var d = new Date();
								 	var month=this.theMonth+1;

									
								
									var day=i - this.firstDay + 1;
									var resdate = this.theYear+"-"+month+"-"+day;
									if(countvalues(arr)[resdate]>=<?php echo $avarage_places;?> && countvalues(arr)[resdate]<<?php echo $max_places;?>) { var day_class="some-available";} else if(countvalues(arr)[resdate]>=<?php echo $max_places;?>) { var day_class="none-available";} else { var day_class=" ";} ;
									dateValue = i - this.firstDay + 1;
									var free = new Date();
									free.setFullYear(this.theYear);
									free.setMonth(this.theMonth);
									free.setDate(dateValue);
									<?php for($i=0; $i<=6; $i++) { ?>
										<?php 
											$freeDay = get_option(THEME_NAME."_day_".$i);
											if($freeDay=="on") { 
										?>
											if(free.getDay() == <?php echo $i;?>) {
												day_class+=" free-day";
											}
										<?php } ?>
									<?php } ?>

									if(countvalues(arr)[resdate]>=<?php echo $max_places;?> || ((i - this.firstDay + 1) < (d.getDate()) && month <= (d.getMonth() +1) && this.theYear <= (d.getFullYear())) || ( (month < (d.getMonth() +1)) && (this.theYear < (d.getFullYear()))) || (this.theYear < (d.getFullYear()))) {
										var currentDay = new Date();

										if(dateValue==currentDay.getDate() && this.theYear==currentDay.getFullYear() && this.theMonth==currentDay.getMonth()) {
											day_class+=" current-day ";
										} 
										content += '<td class="days past '+ day_class +'"><a data-date="' + dateValue + '">' + dateValue + '<\/a><\/td>'; 
									} else if (dateValue<32) { 
										var currentDay = new Date();

										if(dateValue==currentDay.getDate() && this.theYear==currentDay.getFullYear() && this.theMonth==currentDay.getMonth()) {
											day_class+=" current-day ";
										} 
										
										content += '<td class="days '+ day_class +'"><a data-date="' + dateValue + '">' + dateValue + '<\/a><\/td>';  
									}
								 }
									if(dateValue==32) { var tdayCount=this.dayCount - 2}
									
								 if ( i % 7 == 0 &&  i != tdayCount ) {
									content += '<\/tr>';
								 } else if (i == dayCounts-1  && i % 7 != 0) { dayCounts++ }
								 
								 
							  }

				  
				  content += '<tr class="legend">'
					content += '<td colspan="7">'
					content += '<p class="available"><?php _e('Free reservation space', THEME_NAME); ?><\/p>'
					content += '<p class="custom-legend"><span class="l-free-day"><\/span><?php _e("We are closed", THEME_NAME); ?><\/p>'
					content += '<p class="some-available"><?php _e('Some reservations available', THEME_NAME); ?><\/p>'
					content += '<p class="none-available"><?php _e('Reservations not available', THEME_NAME); ?><\/p>'
					content += '<p class="custom-legend"><span class="l-past-day"><\/span><?php _e('Days that already has passed by', THEME_NAME); ?><\/p>'
					content += '<p class="custom-legend"><span class="l-current-day"><\/span><?php _e('Current day', THEME_NAME); ?><\/p>'
				content += '<\/td>'
				content += '<\/tr>'
				content += '<\/tbody>'
			content += '<\/table>';

				  return content;
				
			   }
			}


			var calendarElem = new calendarClass( 'reservation-form', 'reservationdate', 'fulltime', 'selected_day' );
		  //]]>


			   
		  	jQuery(document).on("click", "td.days a", function() {
		  		if(jQuery(this).parent().hasClass('free-day') || jQuery(this).parent().hasClass('past') || jQuery(this).parent().hasClass('none-available')) {
		  			alert("<?php _e('This day is not available!', THEME_NAME); ?>");
		  			return false;
		  		} else {
		  			calendarElem.getClickedDate(jQuery(this).data('date')); 
		  		}

		 	});

		 
		 
		 	addLoadEvent(calendarElem.initCalendar());


		 	jQuery(document).ready(function() {
    		    jQuery("#period").change(function() {
    		    	jQuery('#c_reservationtime').prop('selectedIndex',0);
              		if(jQuery("#period").val() == 'AM') {
                		jQuery("div#time").css('display', 'inline-block');     
                		jQuery(".pm").hide();
                		jQuery(".am").show();
              		} else if(jQuery("#period").val() == 'PM') {
               			jQuery("div#time").css('display', 'inline-block');
                		jQuery(".am").hide();            
                		jQuery(".pm").show();
              		} else {
                		jQuery("div#time").hide();                     
                		jQuery(".am").hide();            
                		jQuery(".pm").hide();
              		}
            	});
    		});
			
	
