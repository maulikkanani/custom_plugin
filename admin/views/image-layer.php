<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
global $post;
// Add an nonce field so we can check for it later.
wp_nonce_field('myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce');
$plugins_url = plugins_url('woocommerce-custom-attribute');
$category='trenchcoat';
$fabric='813_fabric';
?>
<script type="text/javascript">
var image_front_url='<?php echo $plugins_url ?>/assets/images/3d/man/<?php echo $category ?>/<?php echo $fabric ?>/front';    
var image_back_url='<?php echo $plugins_url ?>/assets/images/3d/man/<?php echo $category ?>/<?php echo $fabric ?>/back';    
var button_url='<?php echo $plugins_url ?>/assets/images/3d/man/trenchcoat/botones';
var zipper_url='<?php echo $plugins_url ?>/assets/images/3d/man/trenchcoat/zipper';
var category='<?php echo $category ?>';
var fabric='<?php echo $fabric ?>';
</script>

<div id="product_image">
    <a id="change_position" class="change_position" data-rel="front" href="javascript:;">Turn around model</a>
    <div>
        <div class="man_trenchcoat front" id="model_3d_preview">    
            <div class="layer" pos="0">
                <img src="<?php echo $plugins_url ?>/assets/images/3d/man/<?php echo $category ?>/suit/suit_front.png" style="z-index: 0;">
            </div>    
            <div class="layer" pos="1">
                <img src="<?php echo $plugins_url ?>/assets/images/3d/man/<?php echo $category ?>/<?php echo $fabric ?>/front/body_simple_boton_standard_fit1_long.png" style="z-index: 1000;">
            </div>   
            <div class="layer" pos="2">
                <img src="<?php echo $plugins_url ?>/assets/images/3d/man/<?php echo $category ?>/<?php echo $fabric ?>/front/pockets_2_type1_fit1.png" style="z-index: 2000;">
            </div>        
            <div class="layer" pos="3">
                <img src="<?php echo $plugins_url ?>/assets/images/3d/man/<?php echo $category ?>/<?php echo $fabric ?>/front/sleeve_tape.png" style="z-index: 6000;">
            </div>
            <div class="layer" pos="4">
                <img src="<?php echo $plugins_url ?>/assets/images/3d/man/<?php echo $category ?>/botones/1_boton_body_simple_boton_standard.png" style="z-index: 15000;">
            </div> 
            <div class="layer" pos="5"></div>
            <div class="layer" pos="6"></div>
            <div class="layer" pos="7"></div>
            <div class="layer" pos="8"></div>
            <div class="layer" pos="9"></div>
            <div class="layer" pos="10"></div>
            <div class="layer" pos="11"></div>
            <div class="layer" pos="12"></div>
            <div class="layer" pos="13"></div>
            <div class="layer" pos="14"></div>
            <div class="layer" pos="15"></div>
        </div>
        
        <div class="man_trenchcoat back" id="model_3d_preview" style="display:none">    
            <div class="layer" pos="0">
                <img src="<?php echo $plugins_url ?>/assets/images/3d/man/<?php echo $category ?>/suit/suit_back.png" style="z-index: 0;">
            </div>    
            <div class="layer" pos="1">
                <img src="<?php echo $plugins_url ?>/assets/images/3d/man/<?php echo $category ?>/<?php echo $fabric ?>/back/1_cortes_fit1_short.png" style="z-index: 1000;">
            </div>   
            <div class="layer" pos="2">
                <img src="<?php echo $plugins_url ?>/assets/images/3d/man/<?php echo $category ?>/<?php echo $fabric ?>/back/belt_sewing_fit1.png" style="z-index: 2000;">
            </div>        
            <div class="layer" pos="3">
                <img src="<?php echo $plugins_url ?>/assets/images/3d/man/<?php echo $category ?>/<?php echo $fabric ?>/back/sleeve_tape.png" style="z-index: 6000;">
            </div>
            <div class="layer" pos="4">
                <img src="<?php echo $plugins_url ?>/assets/images/3d/man/<?php echo $category ?>/<?php echo $fabric ?>/back/1_boton_belt_sewing_fit1.png" style="z-index: 15000;">
            </div> 
            <div class="layer" pos="5"></div>
            <div class="layer" pos="6"></div>
            <div class="layer" pos="7"></div>
            <div class="layer" pos="8"></div>
            <div class="layer" pos="9"></div>
            <div class="layer" pos="10"></div>
            <div class="layer" pos="11"></div>
            <div class="layer" pos="12"></div>
            <div class="layer" pos="13"></div>
            <div class="layer" pos="14"></div>
            <div class="layer" pos="15"></div>
        </div>
        
    </div>

</div>
