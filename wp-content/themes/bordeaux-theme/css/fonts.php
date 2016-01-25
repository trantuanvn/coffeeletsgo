<?php
	header("Content-type: text/css");
	require_once('../../../../wp-load.php');
	//fonts
	$google_font_1 = get_option(THEME_NAME."_google_font_1");
	$google_font_2 = get_option(THEME_NAME."_google_font_2");



?>
/* Menu font */
.main-menu-custom .wrapper > ul > li > a {
	font-family: "<?php echo $google_font_1;?>", sans-serif;
}

/* Titles font */
h1, h2, h3, h4, h5, h6 {
	font-family: "<?php echo $google_font_2;?>", sans-serif;
}
