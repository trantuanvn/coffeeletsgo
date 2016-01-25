<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	get_header();
	wp_reset_query();

	if (is_pagetemplate_active("template-contact.php")) {
		$contactPages = ot_get_page("contact");
		if($contactPages[0]) {
			$contactUrl = get_page_link($contactPages[0]);
		}
	} else {
		$contactUrl = "#";
	}
?>
	<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					
					<div class="content-white">
						
						<!-- BEGIN .main-content -->
						<div class="main-content">
							
							<div class="main-head">
								<a href="<?php echo home_url();?>" class="right"><?php _e("back to Homepage", THEME_NAME);?></a>
								<div class="main-title">
									<h1><?php _e("Page Not Found",THEME_NAME);?></h1>
									<div class="ribbon"><div class="inner"></div></div>
									<div class="ribbon-tail"><div class="inner-top"></div><div class="inner-bottom"></div></div>
								</div>
							</div>

							<div class="post error-page">
								<h1><?php _e("Error 404",THEME_NAME);?></h1>
								<h2><?php _e("Page Not Found",THEME_NAME);?></h2>

								<p><?php printf(__('Sorry, This page is wanted by the police so it ran<br/>away to Antarctica. If You see it, please let us know.',THEME_NAME), home_url());?></p>
								<a href="<?php echo home_url();?>"><i class="fa fa-reply-all"></i><?php _e("Back to Homepage", THEME_NAME);?></a>
							</div>
							
							<p class="back-top"><a href="#top"><span><?php _e("go back to the top", THEME_NAME);?></span></a></p>

						<!-- END .main-content -->
						</div>

						<div class="clear-float"></div>
					</div>
					
				<!-- END .wrapper -->
				</div>
				
			<!-- END .content -->
			</div>



<?php get_footer(); ?>