<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $OT_builder = new OT_home_builder; 
    //get block data
    $data = $OT_builder->get_data(); 
    //block data
    $blockData = $data[0]['data']; 

?>
    <div class="group tripple-icons">
        <?php foreach($blockData as $value) { ?>
        <div class="col span_1_of_3">
            <div class="triple-text"<?php if($value['image']){ ?> style="background-image: url(<?php echo $value['image'];?>);"<?php } ?>>
                <?php if($value['title']) { ?>
                    <h3><?php echo $value['title'];?></h3>
                <?php } ?>
            </div>
            <?php if($value['text']) { echo $value['text']; } ?>
            <?php if($value['url']) { ?>
                <a href="<?php echo $value['url'];?>" class="more-link"><i><?php _e("Read more", THEME_NAME);?></i></a>
            <?php } ?>
        </div>
        <?php } ?>

    </div>