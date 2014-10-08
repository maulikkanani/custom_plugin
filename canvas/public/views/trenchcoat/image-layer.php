<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
global $post;
// Add an nonce field so we can check for it later.
wp_nonce_field('myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce');

// Use get_post_meta to retrieve an existing value from the database.
$value = get_post_meta($post->ID, '_my_meta_value_key', true);
include ABS_WCA . 'admin/models/get_attrs.php';
$wca_attributes = $default_values;
include ABS_MODEL . '/product_image_data.php';
?>
<script type="text/javascript">
    $fabric = '<?php echo $fabric ?>';
    $fabric_color = '<?php echo $fabric_color ?>';
    $fabric_data = jQuery.parseJSON('<?php echo $fabric_data ?>');
    $buttons = $fabric_data[$fabric].button;
    $zipper = $fabric_data[$fabric].zipper;
    var blank_image = '<?php echo $blank_image ?>';
    var blank_img = 'blank.png';
    var cat_url = '<?php echo $image_category ?>';
    var image_front_url = cat_url + '/fabric_color/' + $fabric_color + '/front';
    var image_back_url = cat_url + '/fabric_color/' + $fabric_color + '/back';
    var button_url = cat_url + '/botones/' + $buttons;
    var zipper_url = cat_url + '/zipper/' + $zipper;
    var linig_url = cat_url + '/linings';
    var category = '<?php echo $category ?>';


    $fabric_front_url = '<?php echo $fabric_front_url; ?>';
    $shadow_fabric_front_url = '<?php echo $shadow_fabric_front_url; ?>';

    $fabric_back_url = '<?php echo $fabric_back_url; ?>';
    $shadow_fabric_back_url = '<?php echo $shadow_fabric_back_url; ?>';

    $zipper_url = '<?php echo $zipper_url; ?>';
    $shadow_zipper_url = '<?php echo $shadow_zipper_url; ?>';

    $boton_url = '<?php echo $boton_url; ?>';
    $shadow_boton_url = '<?php echo $shadow_boton_url; ?>';

    $boton_hilo_url = '<?php echo $boton_hilo_url; ?>';
    $shadow_boton_hilo_url = '<?php echo $shadow_boton_hilo_url; ?>';

    $boton_ojal_url = '<?php echo $boton_ojal_url; ?>';
    $shadow_boton_ojal_url = '<?php echo $shadow_boton_ojal_url; ?>';

    $lining_url = '<?php echo $lining_url; ?>';
    $shadow_lining_url = '<?php echo $shadow_lining_url; ?>';

    $elbow_patch_url = '<?php echo $elbow_patch_url; ?>';
    $shadow_elbow_patch_url = '<?php echo $shadow_elbow_patch_url; ?>';

    $neck_lining_url = '<?php echo $neck_lining_url; ?>';
    $shadow_neck_lining_url = '<?php echo $shadow_neck_lining_url; ?>';


</script>

<div id="product_image">
    <div class="turn_arround">  
        <i class="fa fa-retweet"></i> <a id="change_position" class="change_position" data-rel="front" href="javascript:;">Turn around model</a>
    </div>
    <canvas id="front_main" width="400" height="600" class="man_trenchcoat front"></canvas>
    <canvas id="back_main" width="400" height="600" style="display:none"  class="man_trenchcoat back"></canvas>
</div>
