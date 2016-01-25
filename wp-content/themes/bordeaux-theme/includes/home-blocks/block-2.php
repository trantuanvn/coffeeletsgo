<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $OT_builder = new OT_home_builder; 
    //get block data
    $data = $OT_builder->get_data(); 
    //extract array data
    extract($data[0]);



?>

<div class="content-white">
    
    <!-- BEGIN .main-content -->
    <div class="main-content">
        <?php if($title) { ?>
            <div class="main-head">
                <div class="main-title">
                    <h1><?php echo $title;?></h1>
                    <div class="ribbon"><div class="inner"></div></div>
                    <div class="ribbon-tail"><div class="inner-top"></div><div class="inner-bottom"></div></div>
                </div>
            </div>
        <?php } ?>

        <div class="post">
            <?php echo $code;?>
        </div>
        

    <!-- END .main-content -->
    </div>

    <div class="clear-float"></div>
</div>