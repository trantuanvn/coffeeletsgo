<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/* Template Name: Photo Gallery */
?>
<?php get_header(); ?>
<?php
	wp_reset_query();
	$paged = get_query_string_paged();
	$posts_per_page = get_option(THEME_NAME.'_gallery_items');

	if($posts_per_page == "") {
		$posts_per_page = get_option('posts_per_page');
	}
	$catSlug = $wp_query->queried_object->slug;
	if(!$catSlug) {
		$my_query = new WP_Query(array('post_type' => OT_POST_GALLERY, 'posts_per_page' => $posts_per_page, 'paged'=>$paged));  
	} else {
		$my_query = new WP_Query(
			array('post_type' => OT_POST_GALLERY, 
				'posts_per_page' => $posts_per_page, 
				'paged'=>$paged, 
				'tax_query' => array(
					array(
						'taxonomy' => OT_POST_GALLERY.'-cat',
						'field' => 'slug',
						'terms' => $catSlug
					)
				)
			)
		);  
	}
	$counter=1;
	$postCount = $my_query->post_count;
?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
<?php get_template_part(THEME_SINGLE."page-title"); ?>
<div class="photo-gallery">
	<div class="row">
		<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
			<?php get_template_part(THEME_LOOP."post","gallery"); ?>
		<?php if($counter%4==0 && $counter!=$postCount) { ?>
			</div>
			<div class="row">
		<?php } ?>
		<?php $counter++; ?>
		<?php endwhile; ?>
		<?php else : ?>
			<h2 class="title"><?php _e( 'No galleries were found' , THEME_NAME );?></h2>
		<?php endif; ?>
		
	</div>
</div>
<?php customized_nav_btns($paged, $my_query->max_num_pages); ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer(); ?>