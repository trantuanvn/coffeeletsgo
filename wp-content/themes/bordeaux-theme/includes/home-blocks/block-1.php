<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $OT_builder = new OT_home_builder; 
    //get block data
    $data = $OT_builder->get_data(); 
    //set query
    $my_query = $data[0]; 
    //extract array data
    extract($data[1]);
    $i=1; 
    $bordeaux_currency=get_option(THEME_NAME.'_currency_category');

    if ( $sidebar=='' ) {
        $sidebar='default';
    }   

?>

<div class="split-content">
    <div class="content-white left">
        <div class="main-content">
        
            <div class="main-head">
                <?php if($type=="1" && get_page_link(ot_get_page("menu-card", false))) { ?>
                    <a href="<?php echo get_page_link(ot_get_page("menu-card", false));?>" class="right"><?php _e("show menu card", THEME_NAME);?></a>
                <?php } ?>
                <?php if($type=="2" && get_page_link(ot_get_page("menu-card-shop", false))) { ?>
                    <a href="<?php echo get_page_link(ot_get_page("menu-card-shop", false));?>" class="right"><?php _e("show menu card", THEME_NAME);?></a>
                <?php } elseif($type!=false && ot_is_woocommerce_activated()==true) { ?>
                    <a href="<?php echo get_permalink(woocommerce_get_page_id('shop'));?>" class="right"><?php _e("show menu card", THEME_NAME);?></a> 
                <?php } else if($type==false && !$cat) { ?>
                    <a href="<?php echo get_page_link(get_option('page_for_posts'));?>" class="right"><?php _e("view all", THEME_NAME);?></a> 
                <?php }  else if($type==false && $cat) { ?>
                    <a href="<?php echo get_category_link($cat);?>" class="right"><?php _e("view all", THEME_NAME);?></a> 
                <?php } ?>
                <?php if($title) { ?>
                    <div class="main-title">
                        <h1><?php echo $title;?></h1>
                        <div class="ribbon"><div class="inner"></div></div>
                        <div class="ribbon-tail"><div class="inner-top"></div><div class="inner-bottom"></div></div>
                    </div>
                <?php } ?>
            </div>
            <?php if($text) { ?>
                <p class="caps"><?php echo $text;?></p>
            <?php } ?>
            <div class="main-spacer"></div>

            <div class="menu-display-1-wrapper">
                <div class="menu-display-1">
                    <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <?php 
                        $image = ot_image_html($my_query->post->ID,180,121); 
                        $price=get_post_meta($my_query->post->ID, THEME_NAME.'_price', true);
                        global $product;
                    ?>
                        <div class="item">
                            <h5><?php the_title();?></h5>
                            <a href="<?php the_permalink();?>" class="image">
                                <?php if($price && $type=="1") { ?>
                                    <span class="price"><?php echo $bordeaux_currency.$price;?><span>&nbsp;</span></span>
                                <?php } ?>
                                <?php if( $product && $product->get_price_html() && $type=="2") { ?>
                                    <span class="price"><?php echo $product->get_price_html();?><span>&nbsp;</span></span>
                                <?php } ?>
                                <?php echo $image;?>
                            </a>
                            <?php 
                                add_filter('excerpt_length', 'new_excerpt_length_10');
                                the_excerpt();
                                if($type=="2") {
                                    get_template_part("woocommerce/loop/add-to-cart");
                                }
                            ?>
    
                        </div>
                    <?php $i++; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php if($i%3==0) { ?>
                        <div class="main-spacer"></div>
                    <?php } ?>
                </div>
            </div>

            <div class="main-spacer"></div>
            <?php if($type=="1") { ?>
                <p class="show-all"><a href="<?php echo get_page_link(ot_get_page("menu-card", false));?>"><span><?php _e("Show entire menu card", THEME_NAME);?></span></a></p>
            <?php } ?>
            <p class="back-top"><a href="#top"><span><?php _e("go back to the top", THEME_NAME);?></span></a></p>

        </div>
    </div>
    <div class="content-white small right">
        <div class="main-content">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?>
                <?php endif; ?>
            <p class="back-top"><a href="#top"><span><?php _e("go back to the top", THEME_NAME);?></span></a></p>

        </div>
    </div>
    <div class="clear-float"></div>
</div>