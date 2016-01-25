<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Template Name: Contact Page
*/	
?>
<?php get_header(); ?>
<?php 
	wp_reset_query();
	$mail_to = get_post_meta ( $post->ID, THEME_NAME."_contact_mail", true ); 
	$image = get_post_thumb($post->ID,0,0); 
?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php if($mail_to) { ?>
		<?php if (have_posts()) : ?>
			<?php get_template_part(THEME_SINGLE."page-title"); ?>
			<?php get_template_part(THEME_SINGLE."page-header"); ?>
				<?php the_content(); ?>	
				<!-- BEGIN .writecomment -->
				<div class="writecomment">
					<div class="coloralert contact-success-block" style="display:none; background: #68a117;">
						<p><?php _e("Success!",THEME_NAME);?></p>
						<a href="#close-alert" class="icon-text">&#10006;</a>
					</div>

					<form id="writecomment" name="writecomment" class="contact-form add-comment" action="">
						<input type="hidden"  name="form_type" value="contact" />
						<input type="hidden"  name="post_id" value="<?php echo $post->ID;?>" />

						<p class="contact-form-user">
							<label for="c_name"><?php _e("Nickname", THEME_NAME);?><span class="required">*</span></label>
							<input type="text" name="u_name" id="contact-name-input" placeholder="<?php _e("Nickname", THEME_NAME);?>" title="<?php _e("Nickname", THEME_NAME);?>" />
							<span class="error-msg" id="contact-name-error" style="display:none;"><i class="fa fa-ban"></i><font class="ot-error-text"></font></span>
						</p>
						<p class="contact-form-email">
							<label for="c_name"><?php _e("E-mail", THEME_NAME);?><span class="required">*</span></label>
							<input type="text" name="email" id="contact-mail-input" placeholder="<?php _e("E-mail address", THEME_NAME);?>" title="<?php _e("E-mail", THEME_NAME);?>" />
							<span class="error-msg" id="contact-mail-error" style="display:none;"><i class="fa fa-ban"></i><font class="ot-error-text"></font></span>
						</p>
						<p class="contact-form-message">
							<label for="c_name"><?php _e("Your message", THEME_NAME);?><span class="required">*</span></label>
							<textarea name="message" placeholder="<?php _e("Your message", THEME_NAME);?>" id="contact-message-input"></textarea>
							<span class="error-msg" id="contact-message-error" style="display:none;"><i class="fa fa-ban"></i><font class="ot-error-text"></font></span>
						</p>
						<p class="form-submit">
							<input name="submit" type="submit" class="button" id="contact-submit" value="<?php printf ( __( 'Send us a message' , THEME_NAME ));?>" />
						</p>
					</form>
				<!-- END .writecomment -->
				</div>
			<?php get_template_part(THEME_SINGLE."page-footer"); ?>
		<?php else: ?>
			<p><?php printf ( __('Sorry, no posts matched your criteria.' , THEME_NAME )); ?></p>
		<?php endif; ?>
	<?php } else { echo "<p style=\"color:#000; font-size:14pt;\">You need to set up Your contact mail!</p>"; } ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer(); ?>