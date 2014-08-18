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
jQuery(document).data({
  pos2:'<img src="" style="z-index: 1600;">',  
  pos3:'<img src="" style="z-index: 1500;">',  
  pos4:'<img src="" style="z-index: 1700;">',  
  pos5:'<img src="" style="z-index: 1800;">',  
  pos6:'<img src="" style="z-index: 1850;">',  
  pos7:'<img src="" style="z-index: 1800;">',  
  ref_pos6:'<img src="" style="z-index: 2770;">',  
  ref_pos7:'<img src="" style="z-index: 2750;">',  
});
jQuery(document).data({
  back_pos5:'<img src="" style="z-index: 1800;">',  
  back_pos6:'<img src="" style="z-index: 1900;">',  
  back_pos7:'<img src="" style="z-index: 2600;">',  
  back_pos10:'<img src="" style="z-index: 2700;">',  
  back_ref_pos10:'<img src="" style="z-index: 2750;">',  
});
</script>

<div id="product_image">
    <a id="change_position" class="change_position" data-rel="front" href="javascript:;">Turn around model</a>
    <div>
        <div class="man_trenchcoat front" id="model_3d_preview">    
            <div class="layer" pos="0">
                <img src="<?php echo $plugins_url ?>/assets/images/3d/man/<?php echo $category ?>/suit/suit_front.png" style="z-index: 0;">
            </div>    
            <div class="layer" pos="1">
                <img style="z-index: 1000;">
            </div>   
            <div class="layer" pos="2">
                <img style="z-index: 1500;">
            </div>        
            <div class="layer" pos="3">
                
            </div>
            <div class="layer" pos="4">
                <img  style="z-index: 1700;">
            </div> 
            <div class="layer" pos="5">
                <img style="z-index: 1800;">
            </div>
            <div class="layer" pos="6">
                <img style="z-index: 1850;">
            </div>
            <div class="layer" pos="7">
                <img style="z-index: 2600;">
            </div>
            <div class="layer layer_button ref_pos1" pos="8">
                <img style="z-index: 1400;">               
            </div>
            <div class="layer layer_button ref_pos7" pos="9">
                 <img style="z-index: 2750;">
            </div>
            <div class="layer layer_button ref_pos6" pos="10">
                <img style="z-index: 2770;">
            </div>
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
                <img src="" style="z-index: 1000;">
            </div>   
            <div class="layer" pos="2">
                <img src="" style="z-index: 1500;">
            </div>        
            <div class="layer" pos="3">
                <img src="" style="z-index: 1600;">
            </div>
            <div class="layer" pos="4">
                <img src="" style="z-index: 1700;">
            </div> 
            <div class="layer" pos="5">
                 <img src="" style="z-index: 1800;">
            </div>
            <div class="layer" pos="6">
                <img src="" style="z-index: 1900;">
            </div>
             <div class="layer" pos="7">
                <img src="" style="z-index: 2600;">
            </div>
            <div class="layer" pos="8"></div>
            <div class="layer" pos="9"></div>
            <div class="layer" pos="10"></div>
            <div class="layer ref_pos_10" pos="11">
                <img src="" style="z-index: 2750;">
            </div>
            <div class="layer" pos="12"></div>
            <div class="layer" pos="13"></div>
            <div class="layer" pos="14"></div>
            <div class="layer" pos="15"></div>
        </div>
        
    </div>

</div>
