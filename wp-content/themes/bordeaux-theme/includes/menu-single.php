<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();


	//post details
	$postDate = get_option(THEME_NAME."_post_date");
	$postComments = get_option(THEME_NAME."_post_comment");
	$postAuthor = get_option(THEME_NAME."_post_author");

?>

<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php get_template_part(THEME_SINGLE."page-title","parent"); ?>
	<?php if (have_posts()) : ?>
		<div <?php post_class("post"); ?>>
			<h2><?php the_title();?></h2>

			<div class="date">
				<?php if($postDate=="on") { ?>
					<p class="day"><?php the_time("d F, Y");?></p>
				<?php } ?>
				<?php 
					if($postAuthor=="on") { 
				?>
					<p class="author">
						<?php echo the_author_posts_link(); ?>
					</p>
				<?php
					} 
				?>
				<?php 
					$termCount=count( wp_get_post_terms( $post->ID, OT_POST_MENU."-cat"));
					if($termCount>=1) {
				?>
					<p class="section">
						<?php 
							$i=1;
							$terms = wp_get_post_terms( $post->ID, OT_POST_MENU."-cat");
							foreach($terms as $term) {
						?>
						<a href="<?php echo get_term_link( $term->term_id, OT_POST_MENU."-cat" );?>"><?php echo $term->name;?></a><?php if($i!=$termCount) { echo ","; } ?>
						<?php $i++; ?>
						<?php } ?>
					</p>
				<?php } ?>
				<?php if ( comments_open() && $postComments=="on") { ?>
					<p class="comments">
						<a href="<?php the_permalink();?>#comments"><?php comments_number('0', '1','%'); ?></a>
					</p>
				<?php } ?>
			</div>

			<?php get_template_part(THEME_SINGLE."image"); ?>
			<?php add_filter('the_content', 'BigFirstChar', 5); ?>
			<?php the_content();?>
			<?php 
				$args = array(
					'before'           => '<div class="post-pages"><p>' . __('Pages:', THEME_NAME),
					'after'            => '</p></div>',
					'link_before'      => '',
					'link_after'       => '',
					'next_or_number'   => 'number',
					'nextpagelink'     => __('Next page', THEME_NAME),
					'previouspagelink' => __('Previous page', THEME_NAME),
					'pagelink'         => '%',
					'echo'             => 1
				);

				wp_link_pages($args); 
			?>	
		<!-- END .post -->
		</div>

		<?php wp_reset_query(); ?>
		<?php if ( comments_open() ) : ?>
			<?php comments_template(); // Get comments.php template ?>
		<?php endif; ?>

	<?php else: ?>
		<p><?php  _e('Sorry, no posts matched your criteria.' , THEME_NAME ); ?></p>
	<?php endif; ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?>
