<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Template Name: Reservations
*/	
	//calendar description
	$calendarTitle = get_post_meta( OT_page_ID(), THEME_NAME.'_calendar_title', true );
	$calendarText = get_post_meta( OT_page_ID(), THEME_NAME.'_calendar_text', true );

	//form description
	$formTitle = get_post_meta( OT_page_ID(), THEME_NAME.'_form_title', true );
	$formText = get_post_meta( OT_page_ID(), THEME_NAME.'_form_text', true );

	//work time
	$work_time_from = get_option(THEME_NAME."_time_from");
	$work_time_till = get_option(THEME_NAME."_time_till")-1;

	//time format
    $time_format = get_option(THEME_NAME."_time_format");			
    if(date('H', strtotime($work_time_from.":00")) > 12) {
      	$am = true;
    } else {
      	$am = false;	
    }     
    if(date('H', strtotime($work_time_till.":00")) <= 12) {
      	$pm = true;
    } else {
      	$pm = false;	
    }  	

?>
<?php get_header(); ?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php if (have_posts()) : ?>
		<?php get_template_part(THEME_SINGLE."page-title"); ?>
		<?php get_template_part(THEME_SINGLE."page-header"); ?>
			<div class="success-remove">
				<?php if($calendarTitle){ ?>
					<h2><?php echo $calendarTitle;?></h2>
				<?php } ?>
				<?php if($calendarText){ ?>
					<?php echo do_shortcode(wpautop(stripslashes($calendarText)));?>
				<?php } ?>
					<div id="Calendar" align="center" style="display: none;"></div>
				<?php if($formTitle){ ?>
					<h2><?php echo $formTitle;?></h2>
				<?php } ?>
				<?php if($formText){ ?>
					<?php echo do_shortcode(wpautop(stripslashes($formText)));?>
				<?php } ?>
					<form class="add-comment custom-form reservation-form" name="reservation-form" id="reservation-form" >
						<input type="hidden"  name="selected_day" class="selected_day" value=" "/>
						<input type="hidden"  name="fulltime" class="fulltime" value=""/>
						<input type="hidden" name="page_id" value="<?php echo $post->ID;?>" />
						<p class="contact-form-reservation-date">
							<label for="c_reservationdate"><?php _e("Date", THEME_NAME);?><span class="required">*</span></label>
							<input type="text" value="dd / mm / yyyy" name="reservationdate" id="c_reservationdate" disabled />
							<span class="error-msg" style="display:none;"><i class="fa fa-ban"></i><span class="text"></span></span>
						</p>

						<p class="contact-form-reservation-time">
							<label for="c_reservationtime"><?php _e("Time", THEME_NAME);?><span class="required">*</span></label>
							<div class="reservation-select">
								<?php if($time_format == 'american') { ?>
	   								<select name="period" id="period">
									  	<option value="no"><?php _e("Period", THEME_NAME);?></option>
									  	<?php if($am!=true) { ?>
									    	<option value="AM">AM</option>
									  	<?php } ?>
									  	<?php if($pm!=true) { ?>
									    	<option value="PM">PM</option>
									  	<?php } ?>
									</select>
									<div id="time" style="display:none;">
										<select name="timefrom" id="c_reservationtime">
											<option value="no"><?php _e("Hour", THEME_NAME);?></option>
		        							<?php 
		        								if(date('H', strtotime($work_time_from.":00")) == 0) { 
		        									$time = 0; 
		        								} else { 
		        									$time = date('g', strtotime($work_time_from.":00")); 
		        								}
		        							?>                              
		        							<?php 
		        								if($pm==true) {
												  	for($i = date('g', strtotime($work_time_from.":00")); $i <= date('g', strtotime($work_time_till.":00")); $i++) { 
											?>
														<option class="am" style="display: none;" value="<?php echo $i;?>"><?php echo $i;?></option>'; 
											<?php 	
													}//end for
		        								} else if($time <= 11) {															
													for($i = $time; $i <= 11; $i++) { 
														if($i == 0) { 
											?> 
															<option class="am" style="display: none;" value="12">12</option>
											<?php
														} else { 
											?>
														<option class="am" style="display: none;" value="<?php echo $i;?>"><?php echo $i;?></option> 
											<?php 
														} //end if 
													} //end for
											 	} //end if
											 ?> 

		      								<?php 
		      									if($am==true) {
													for($i = date('g', strtotime($work_time_from.":00")); $i <= date('g', strtotime($work_time_till.":00")); $i++) { 
											?>
														<option class="pm" style="display: none;" value="<?php echo $i;?>"><?php echo $i;?></option>
											<?php  	
													} //end for                                
		       									} else if(date('H', strtotime($work_time_till.":00")) > 12) { 															
													for($i = 0; $i <= date('g', strtotime($work_time_till.":00")); $i++) {
														if($i == 0) {
											?>
															<option class="pm" style="display: none;" value="12">12</option>
											<?php 
														} else { 
											?>
															<option class="pm" style="display: none;" value="<?php echo $i;?>"><?php echo $i;?></option>
											<?php 		} //end if
													 } //edn for
											 	} //end if
											?>  
										</select>
										<span>:</span>
										<select name="minutes" id="c_reservationminutes">
											<option value="no"><?php _e("Minutes", THEME_NAME);?></option>
											<option value="00">00</option>
											<option value="15">15</option>
											<option value="30">30</option>
											<option value="45">45</option>
										</select>
									</div>
								<?php } else { ?> 
									<select name="timefrom" id="c_reservationtime">
										<option value="no"><?php _e("Hour", THEME_NAME);?></option>
										<?php
											for ($i = $work_time_from; $i <= $work_time_till; $i++) {
										?>
												<option value="<?php echo $i;?>"><?php echo $i;?></option>
										<?php
											}
										?>
									</select>
									<span>:</span>
									<select name="minutes" id="c_reservationminutes">
										<option value="no"><?php _e("Minutes", THEME_NAME);?></option>
										<option value="00">00</option>
										<option value="15">15</option>
										<option value="30">30</option>
										<option value="45">45</option>
									</select>
								<?php } ?>
							</div>
						</p>
						<p class="contact-form-people">
							<label for="c_people"><?php _e("People Count", THEME_NAME);?></label>
							<div class="reservation-select">
								<select name="c_people" id="c_people">
									<?php for($i=1; $i<=50; $i++) { ?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
									<?php } ?>
								</select>
							</div>
						</p>
						<p class="contact-form-user">
							<label for="u_name"><?php _e("Name", THEME_NAME);?><span class="required">*</span></label>
							<input type="text" placeholder="<?php _e("Your Name", THEME_NAME);?>" name="u_name" id="u_name" />
							<span class="error-msg" style="display:none;"><i class="fa fa-ban"></i><span class="text"></span></span>
						</p>
						<p class="contact-form-email">
							<label for="email"><?php _e("E-mail", THEME_NAME);?><span class="required">*</span></label>
							<input type="text" placeholder="<?php _e("E-mail", THEME_NAME);?>" name="email" id="email" />
							<span class="error-msg" style="display:none;"><i class="fa fa-ban"></i><span class="text"></span></span>
						</p>
						<p class="contact-form-phone">
							<label for="phone"><?php _e("Phone", THEME_NAME);?><span class="required">*</span></label>
							<input type="text" placeholder="<?php _e("Phone", THEME_NAME);?>" name="phone" id="phone" />
							<span class="error-msg" style="display:none;"><i class="fa fa-ban"></i><span class="text"></span></span>
						</p>
						<p class="contact-form-message">
							<label for="notes"><?php _e("Notes", THEME_NAME);?><span class="required">*</span></label>
							<textarea name="notes" placeholder="<?php _e("Additional notes..", THEME_NAME);?>" id="notes"></textarea>
							<span class="error-msg" style="display:none;"><i class="fa fa-ban"></i><span class="text"></span></span>
						</p>
						<p><input type="submit" class="button validate-reservations" value="<?php _e("Send Reservation", THEME_NAME);?>" /></p>
					</form>
				<?php the_content(); ?>	
			</div>
			<div class="success" style="display:none;">
				<p><b><?php _e("Thanks!", THEME_NAME);?></b></p>
				<p><?php _e("Your registration has been sent!", THEME_NAME);?></p>
			</div>
		<?php get_template_part(THEME_SINGLE."page-footer"); ?>
	<?php else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.' , THEME_NAME ); ?></p>
	<?php endif; ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer(); ?>