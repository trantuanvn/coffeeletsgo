<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* -------------------------------------------------------------------------*
 * 						CUSTOM FACEBOOK SHARE BUTTON						*
 * -------------------------------------------------------------------------*/
 
 
function OT_customFShare() {
	$link = $_POST['link'];
    $like_array = json_response('http://graph.facebook.com/fql?q=SELECT%20url,%20share_count%20FROM%20link_stat%20WHERE%20url="'. $link .'"');
    if($like_array!=false) {
		if(isset($like_array->data[0]->share_count)) {
			$like_count =  intval($like_array->data[0]->share_count);
		} else {
			$like_count = 0;
		}
		
		if(is_int($like_count)) {
			echo $like_count;
		} else {
			echo 0;
		}
	}
	die();
}


/* -------------------------------------------------------------------------*
 * 							SLIDER ORDER									*
 * -------------------------------------------------------------------------*/
 
function update_slider() {
	$updateRecordsArray = $_POST['recordsArray'];
	
	if ( !get_option(THEME_NAME."-slide-order-set" ) ) {
		add_option(THEME_NAME."-slide-order-set", "1" );
	}
	
	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {
		global $wpdb;

		$wpdb->query( $wpdb->prepare("UPDATE $wpdb->posts SET menu_order = ".$listingCounter." WHERE ID = " . $recordIDValue  ) ); 

		$listingCounter = $listingCounter + 1;

	}

}

/* -------------------------------------------------------------------------*
 * 							HOMEPAGE ORDER									*
 * -------------------------------------------------------------------------*/
 
function update_homepage() {
	$updateRecordsArray = $_POST['recordsArray'];
	$array = explode(',', $_POST['count']);
	$type = explode(',', $_POST['type']);
	$string = explode(',', $_POST['inputType']);
	$postID = explode(',', $_POST['post_id']);

	$strings = array();
	$array_count = sizeof($array);
	$e = 0;
	for($c = 0; $c < $array_count; $c++) {
		$items = array();
		for($i = 0; $i < $array[$c]; $i++) {
			array_push($items, $string[$e]);
			$e++;
		}
		
		if($array[$c] == 0) {
			$e++;
		}
		array_push($strings, $items);
		
		$items = "";
	}
	
	$homepage_layout = array();
	
	$a=0;
	
	if(!empty($updateRecordsArray)) {
		foreach($updateRecordsArray as $recordIDValue)  {
			$homepage_layout[$a]['type'] = $type[$a];
			$homepage_layout[$a]['inputType'] = $strings[$a];
			$homepage_layout[$a]['id'] = $recordIDValue;
			
			$a++;
		}
	}


	
	update_option(THEME_NAME."_homepage_layout_order_".$postID[0], $homepage_layout );

	die();

}
/* -------------------------------------------------------------------------*
 * 					HOMEPAGE SAVE DRAG&DROP OPTIONS							*
 * -------------------------------------------------------------------------*/
 
function ot_save_options() {
	$fields = $_REQUEST;

	foreach($fields as $key => $field) {
		if($key!="action") {
			update_option($key,$field);
		}
	}


	die();

}

/* -------------------------------------------------------------------------*
 * 							SIDEBAR GENERATOR								*
 * -------------------------------------------------------------------------*/
 
function update_sidebar() {
	$updateRecordsArray = $_POST['recordsArray'];
	$updateRecordsArray = str_replace(array("+"," "),"-",$updateRecordsArray);
	$blockId = $_POST['blockID'];
	$last = array_pop($updateRecordsArray);
	$updateRecordsArray = implode ("|*|", $updateRecordsArray)."|*|".$last."|*|";
	update_option( $blockId."s", $updateRecordsArray);
	echo $updateRecordsArray;
	die();
}
function delete_sidebar() {
	$sidebar_name = $_POST['sidebar_name']."|*|";
	$blockId = $_POST['blockID'];
	$sidebar_names = get_option( $blockId."s" );
	$sidebar_names = explode( "|*|", $sidebar_names );
	$sidebar_name = explode( "|*|", $sidebar_name );
	$result = array_diff($sidebar_names, $sidebar_name);
	$last = array_pop($result);
	if(empty($result) || count($result)<=1){
		$update_sidebar = $last;
		if($last) {
			$update_sidebar.= "|*|";	
		}
	} else {
		$update_sidebar = implode ("|*|", $result)."|*|".$last."|*|";	
	}
	
	update_option( $blockId."s", $update_sidebar);
	echo $update_sidebar;
	die();
}
function edit_sidebar() {
	$new_sidebar_name = sanitize_title($_POST['sidebar_name']);
	$blockId = $_POST['blockID'];
	$old_name = $_POST['old_name'];

	$sidebar_names = get_option( $blockId."s" );
	$sidebar_names = explode( "|*|", $sidebar_names );
	$new_sidebar_names=array();
	foreach ($sidebar_names as $sidebar_name) {
		if($sidebar_name!="") {
			if ($sidebar_name==$old_name) {
				$new_sidebar_names[]=$new_sidebar_name;
			} else {
				$new_sidebar_names[]=$sidebar_name;
			}
		}
	}
	$last = array_pop($new_sidebar_names);

	if(empty($new_sidebar_names)){
		$update_sidebar =  $last."|*|";
	} else {
		$update_sidebar = implode ("|*|", $new_sidebar_names)."|*|".$last."|*|";
	}
	
	
	update_option( $blockId."s", $update_sidebar);
	echo $update_sidebar;
	die();
}



/* -------------------------------------------------------------------------*
 * 						LOAD NEXT IMAGE IN GALLERY							*
 * -------------------------------------------------------------------------*/
 
function load_next_image(){
	$g = $_POST['gallery_id'];
	$next_image = $_POST['next_image'];

	$galleryImages = get_post_meta ($g, THEME_NAME."_gallery_images", true );  
	$imageIDs = explode(",",$galleryImages);


	$c=0;
	$images = array();
	
	foreach($imageIDs as $imgId) {
		if(isset($imgId)) {
			$file = wp_get_attachment_url($imgId);
			$image = get_post_thumb(false, 650, 0, false, $file);
			$images[] = $image['src'];
			$c++;
		}
	}
						
	if(isset($images[$next_image-1])) {		
		echo $images[$next_image-1];
	}
	die();
}

/* -------------------------------------------------------------------------*
 * 							LIGHTBOX GALLERY								*
 * -------------------------------------------------------------------------*/
 
function OT_lightbox_gallery(){
	$g = $_POST['gallery_id'];
	$next_image = $_POST['next_image'];

	$galleryImages = get_post_meta ( $g, THEME_NAME."_gallery_images", true ); 
	$imageIDs = explode(",",$galleryImages);


	$c=0;
	$images = array();
	$thumbs = array();

	foreach($imageIDs as $id) {
		$file = wp_get_attachment_url($id);
		$image = get_post_thumb(false, 650, 0, false, $file);
		$images[] = $image['src'];
		$thumb = get_post_thumb(false, 110, 110, false, $file);
		$thumbs[$c] = $thumb['src'];
		$c++;
	}

	$thispost = get_post( $g );
	$content = do_shortcode($thispost->post_content);
	
	$return = array();
	$return['next'] = $images[$next_image-1];
	$return['thumbs'] = $thumbs;
	$return['title'] = get_the_title($g);
	$return['content'] = $content;
	$return['total'] = $c;


	echo json_encode($return);
	die();
}


/* -------------------------------------------------------------------------*
 * 									AWeber									*
 * -------------------------------------------------------------------------*/
 
function aweber_form() {
		
	$keys = get_option(THEME_NAME."_aweber_keys"); 
	if(isset($_POST["email"])){
		$email = is_email($_POST["email"]);
	}
	if(isset($_POST["u_name"])){
		$u_name = esc_textarea($_POST["u_name"]);
	}
	if(isset($_POST["listID"])){
		$listID = remove_html_slashes($_POST["listID"]);
	}
			
	$ip = $_SERVER['REMOTE_ADDR'];

	extract($keys);

	if($email && $u_name && $listID) {
				 

		try {
			$aweber = new AWeberAPI($consumer_key, $consumer_secret);
			$account = $aweber->getAccount($access_key, $access_secret);
			$account_id = $account->id;
			$listURL = "/accounts/{$account_id}/lists/{$listID}";
			$list = $account->loadFromUrl($listURL);
				
			# create a subscriber
			$params = array(
				'email' => $email,
				'ip_address' => $ip,
				'name' => $u_name,

			);
			$subscribers = $list->subscribers;
			$new_subscriber = $subscribers->create($params);
			

		} catch(AWeberAPIException $exc) {
			print 'Error: '.$exc->message.'';
			exit(1);
		}	
				
	}
	 
	die();

}
/* -------------------------------------------------------------------------*
 * 									RESERVATIONS							*
 * -------------------------------------------------------------------------*/
 
function ot_reservations() {

	$page_id = intval($_POST["page_id"]);
	
	if(get_option(THEME_NAME."_email_notifications")=="on") {
		//email where to send notification about new entry
		$mail_to = get_post_meta ( $page_id , THEME_NAME."_reservation_mail", true ); 
	}


	if(isset($_POST["fulltime"])){
		$reservationdate = $_POST["fulltime"];
	}

	if(isset($_POST["period"])){
		$period = $_POST["period"];
	} else {
		$period = false;
	} 

	if(isset($_POST["timefrom"])){
		$timefrom = $_POST["timefrom"];
	}

	if(isset($_POST["minutes"])){
		$minutes = $_POST["minutes"];
	} 

	$reservationdate = strtotime("".$reservationdate." ".$timefrom.":".$minutes." ".$period."");

	if(isset($_POST["c_people"])){
		$c_people = $_POST["c_people"];
	} 

	if(isset($_POST["u_name"])){
		$u_name = $_POST["u_name"];
	}

	if(isset($_POST["email"]) && is_email($_POST["email"])){
		$email = $_POST["email"];
	}

	if(isset($_POST["phone"])){
		$phone = $_POST["phone"];
	}

	if(isset($_POST["notes"])){
		$notes = wpautop($_POST["notes"]);
	}


	$ip = $_SERVER['REMOTE_ADDR'];


	//insert the data in mysql db
	global $wpdb;

	// table name
	$table_name = $wpdb->prefix.THEME_NAME."_reservation"; 
	
	// execute query
	$wpdb->query(
		$wpdb->prepare("INSERT INTO $table_name
							(page_id, reservationDate, guests, name, email, notes, phone, reservationCreated)
						VALUES (%d, %d, %d, %s, %s, %s, %s, %d)",
						$page_id,
						$reservationdate,
						$c_people,
						$u_name,
						$email,
						$notes,
						$phone,
						time()
						)
	);

	//send notification if the email is set
	if($mail_to) {	

		//set up email header
		$subject = ( __( 'New entry at' , THEME_NAME ))." ".get_bloginfo('name')." - ".stripslashes($u_name);	
		$subject = html_entity_decode (  $subject, ENT_QUOTES, 'UTF-8' );
		
		$eol="\n";
		$mime_boundary=md5(time());
		$headers = "From: ".$email." <".$email.">".$eol;
		//$headers .= "Reply-To: ".$email."<".$email.">".$eol;
		$headers .= "Message-ID: <".time()."-".$email.">".$eol;
		$headers .= "X-Mailer: PHP v".phpversion().$eol;
		$headers .= 'MIME-Version: 1.0'.$eol;
		$headers .= "Content-Type: text/html; charset=UTF-8; boundary=\"".$mime_boundary."\"".$eol.$eol;

		//start the email
		ob_start(); 
		?>
		<?php
			 if($notes) { 
			 	_e( 'Message:' , THEME_NAME );?> <?php echo stripslashes($notes);
			 }
		?>
		<div style="padding-top:100px;">
		<?php if($u_name) { 
			_e( 'Name:' , THEME_NAME );?> <?php echo stripslashes($u_name);?><br/>
		<?php } ?>
		<?php if($c_people) { 
			_e( 'People Count:' , THEME_NAME );?> <?php echo $c_people;?><br/>
		<?php } ?>
		<?php if($phone) { 
			_e( 'Phone:' , THEME_NAME );?> <?php echo stripslashes($phone);?><br/>
		<?php } ?>
		<?php if($email) { 
			_e( 'E-mail:' , THEME_NAME );?> <?php echo $email;?><br/>
		<?php } ?>
		<?php if($reservationdate) { 
			_e( 'Reservation Date:' , THEME_NAME );?> <?php echo date("Y-m-d H:i",$reservationdate);?><br/>
		<?php } ?>
		<?php _e( 'IP Address:' , THEME_NAME );?> <?php echo $ip;?><br/>
		</div>
		<?php
		$message = ob_get_clean();

		//send the email
		wp_mail($mail_to,$subject,$message,$headers);
			
	}
	die();

}


/* -------------------------------------------------------------------------*
 * 								INVITATIONS FORM							*
 * -------------------------------------------------------------------------*/
 
function invitations_form() {

	if(isset($_POST["post_id"])){
		$formPageId = (int) $_POST["post_id"];

		//email where to send notification about new entry
		$mail_to = get_post_meta ( $formPageId , THEME_NAME."_invitations_mail", true ); 

		//get the checkboxes
		$checkboxes = get_post_meta ( $formPageId , THEME_NAME."_checkboxes", true ); 
		if($checkboxes) {
			$checkboxes = explode(";", $checkboxes);	
		}

	} else {
		die();
	}

	//entry email field
	if(isset($_POST["email"]) && is_email($_POST["email"])){
		$email = is_email($_POST["email"]);
	}
	//entry name field
	if(isset($_POST["u_name"])){
		$u_name = esc_textarea($_POST["u_name"]);
	}
	//entry note field
	if(isset($_POST["message"])){
		$message = esc_textarea($_POST["message"]);
	}
	//entry phone field
	if(isset($_POST["phone"])){
		$phone = esc_textarea($_POST["phone"]);
	}
	//entry guests field
	if(isset($_POST["guests"])){
		$guests = esc_textarea($_POST["guests"]);
	}
	//entry IP address
	$ip = $_SERVER['REMOTE_ADDR'];

	//prepare the checkbox values for save
	if(is_array($checkboxes)) {
		$i = 0;
		$checkValues = array();
		foreach($checkboxes as $checkbox) {
			if(isset($_POST["checkbox_".$i])){
				$checkValues[$i]['text']= $checkbox;
				$checkValues[$i]['value']= esc_textarea($_POST["checkbox_".$i]);
			} else {
				$checkValues[$i]['text']= $checkbox;
				$checkValues[$i]['value']= "no";
			}
			$i++;
		}
	}


	//insert the data in mysql db
	global $wpdb;

	// table name
	$table_name = $wpdb->prefix.THEME_NAME."_inivations"; 
	
	// execute query
	$wpdb->query(
		$wpdb->prepare("INSERT INTO $table_name
							(ip, form_page_id, name, phone, guests, email, notes, checkboxes, added)
						VALUES (%s, %d, %s, %s, %d, %s, %s, %s, %d)",
						$ip,
						$formPageId,
						$u_name,
						$phone,
						$guests,
						$email,
						nl2br($message),
						serialize($checkValues),
						time()
						)
	);


	

	//send notification if the email is set
	if($mail_to) {	

		//set up email header
		$subject = ( __( 'New entry at' , THEME_NAME ))." ".get_bloginfo('name')." - ".stripslashes($u_name);	
		$subject = html_entity_decode (  $subject, ENT_QUOTES, 'UTF-8' );
		
		$eol="\n";
		$mime_boundary=md5(time());
		$headers = "From: ".$email." <".$email.">".$eol;
		//$headers .= "Reply-To: ".$email."<".$email.">".$eol;
		$headers .= "Message-ID: <".time()."-".$email.">".$eol;
		$headers .= "X-Mailer: PHP v".phpversion().$eol;
		$headers .= 'MIME-Version: 1.0'.$eol;
		$headers .= "Content-Type: text/html; charset=UTF-8; boundary=\"".$mime_boundary."\"".$eol.$eol;

		//start the email
		ob_start(); 
		?>
		<?php
			 if($message) { 
			 	_e( 'Message:' , THEME_NAME );?> <?php echo nl2br(stripslashes($message));
			 }
		?>
		<div style="padding-top:100px;">
		<?php if($u_name) { 
			_e( 'Name:' , THEME_NAME );?> <?php echo stripslashes($u_name);?><br/>
		<?php } ?>
		<?php if($guests) { 
			_e( 'Guest Count:' , THEME_NAME );?> <?php echo $guests;?><br/>
		<?php } ?>
		<?php if($phone) { 
			_e( 'Phone:' , THEME_NAME );?> <?php echo stripslashes($phone);?><br/>
		<?php } ?>
		<?php if(is_array($checkboxes)) {  
			_e( 'Events:' , THEME_NAME )."<br>";
		?>
		<div style="padding-left:30px;">
		<?php
			if(is_array($checkValues)) {
				foreach($checkValues as $ckeckbox) {
					echo stripslashes($ckeckbox['text'])." : ".$ckeckbox['value']."<br>";
				}
			}
		?>
		</div>
		<?php } ?>
		<?php if($u_name) { 
			_e( 'E-mail:' , THEME_NAME );?> <?php echo $email;?><br/>
		<?php } ?>
		<?php _e( 'IP Address:' , THEME_NAME );?> <?php echo $ip;?><br/>
		</div>
		<?php
		$message = ob_get_clean();

		//send the email
		wp_mail($mail_to,$subject,$message,$headers);
			
	}
	 
	die();

}

/* -------------------------------------------------------------------------*
 * 							 ADMIN EMAIL FORM								*
 * -------------------------------------------------------------------------*/
 
function ot_send_email_admin() {

	if(isset($_POST["mail"])){
		$mail_to = is_email($_POST["mail"]); 
	}

	if(isset($_POST["form_page_id"])){
		$formPageId = $_POST["form_page_id"]; 
		$email = get_post_meta ( $formPageId , THEME_NAME."_reservation_mail", true );
	}

	if(isset($_POST["reservation_id"])){
		echo $reservationId = $_POST["reservation_id"]; 
	}

	if(!$email) {
		//Get rid of wwww
		$domain_name =  preg_replace('/^www\./','',$_SERVER['SERVER_NAME']);
		$email = "noreply@".$domain_name;
	}

	if(isset($_POST["message"])){
		$message = stripslashes(wpautop($_POST["message"]));
	}

	if(isset($_POST["type"])){
		$type = $_POST["type"];
	}

	if(isset($mail_to) && isset($message)) {	
		global $wpdb;
		// table name
		$table_name = $wpdb->prefix.THEME_NAME."_reservation";

		$subject = get_bloginfo('name');
				
		$eol="\n";
		$mime_boundary=md5(time());
		$headers = "From: ".$email." <".$email.">".$eol;
		//$headers .= "Reply-To: ".$email."<".$email.">".$eol;
		$headers .= "Message-ID: <".time()."-".$email.">".$eol;
		$headers .= "X-Mailer: PHP v".phpversion().$eol;
		$headers .= 'MIME-Version: 1.0'.$eol;
		$headers .= "Content-Type: text/html; charset=UTF-8; boundary=\"".$mime_boundary."\"".$eol.$eol;

		wp_mail($mail_to,$subject,$message,$headers);

		if($type=="accept") {
			$approve="yes";
		} else {
			$approve="no";
		}
		$wpdb->update( 
			$table_name, 
			array( 
				'approve' => $approve,
			), 
			array( 'id' => $reservationId  )
		);
	}
	 
	die();

}

/* -------------------------------------------------------------------------*
 * 							 CONTACT FORM									*
 * -------------------------------------------------------------------------*/
 
function footer_contact_form() {

	if(isset($_POST["post_id"])){
		$mail_to = get_post_meta ( $_POST["post_id"], THEME_NAME."_contact_mail", true ); 
	}

	if(isset($_POST["email"]) && is_email($_POST["email"])){
		$email = is_email($_POST["email"]);
	}
	if(isset($_POST["u_name"])){
		$u_name = stripslashes(esc_textarea($_POST["u_name"]));
	}
	if(isset($_POST["message"])){
		$message = stripslashes(esc_textarea($_POST["message"]));
	}

	if(isset($_POST["url"])){
		$url = esc_textarea($_POST["url"]);
	}
	
	$ip = $_SERVER['REMOTE_ADDR'];

	
	if(isset($_POST["form_type"])) {	
		
		$subject = ( __( 'From' , THEME_NAME ))." ".get_bloginfo('name')." ".( __( 'Contact Page' , THEME_NAME ));
				
		$eol="\n";
		$mime_boundary=md5(time());
		$headers = "From: ".$email." <".$email.">".$eol;
		//$headers .= "Reply-To: ".$email."<".$email.">".$eol;
		$headers .= "Message-ID: <".time()."-".$email.">".$eol;
		$headers .= "X-Mailer: PHP v".phpversion().$eol;
		$headers .= 'MIME-Version: 1.0'.$eol;
		$headers .= "Content-Type: text/html; charset=UTF-8; boundary=\"".$mime_boundary."\"".$eol.$eol;

		ob_start(); 
		?>
<?php printf ( __( 'Message:' , THEME_NAME ));?> <?php echo nl2br($message);?>
<div style="padding-top:100px;">
<?php printf ( __( 'Name:' , THEME_NAME ));?> <?php echo $u_name;?><br/>
<?php printf ( __( 'E-mail:' , THEME_NAME ));?> <?php echo $email;?><br/>
<?php printf ( __( 'IP Address:' , THEME_NAME ));?> <?php echo $ip;?><br/>
</div>
<?php
		$message = ob_get_clean();
		wp_mail($mail_to,$subject,$message,$headers);
			
	}
	 
	die();

}

add_action('wp_ajax_update_slider', 'update_slider');
add_action('wp_ajax_update_homepage', 'update_homepage');

add_action('wp_ajax_ot_save_options', 'ot_save_options');
add_action('wp_ajax_nopriv_ot_save_options', 'ot_save_options');

add_action('wp_ajax_update_sidebar', 'update_sidebar');
add_action('wp_ajax_delete_sidebar', 'delete_sidebar');
add_action('wp_ajax_edit_sidebar', 'edit_sidebar');
add_action('wp_ajax_load_next_image', 'load_next_image');
add_action('wp_ajax_nopriv_load_next_image', 'load_next_image');
add_action('wp_ajax_OT_lightbox_gallery', 'OT_lightbox_gallery');
add_action('wp_ajax_nopriv_OT_lightbox_gallery', 'OT_lightbox_gallery');
add_action('wp_ajax_OT_customFShare', 'OT_customFShare');
add_action('wp_ajax_nopriv_OT_customFShare', 'OT_customFShare');

add_action('wp_ajax_aweber_form', 'aweber_form');
add_action('wp_ajax_nopriv_aweber_form', 'aweber_form');
add_action('wp_ajax_ot_reservations', 'ot_reservations');
add_action('wp_ajax_nopriv_ot_reservations', 'ot_reservations');
add_action('wp_ajax_nopriv_footer_contact_form', 'footer_contact_form');
add_action('wp_ajax_footer_contact_form', 'footer_contact_form');
add_action('wp_ajax_nopriv_invitations_form', 'invitations_form');
add_action('wp_ajax_invitations_form', 'invitations_form');
add_action('wp_ajax_ot_send_email_admin', 'ot_send_email_admin');
?>