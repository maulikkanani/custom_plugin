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
$plugins_url = plugins_url('woocommerce-custom-attribute');

include_once ABS_WCA . 'admin/includes/get_attrs.php';

$default_values = array(
   'wca_trenchcoat_style'=>array(
        'name' => 'wca_trenchcoat_style',
        'value' => 'simple'
    ),
    'wca_trenchcoat_length'=>array(
        'name' => 'wca_trenchcoat_length',
        'value' => 'long'
    ),
    'wca_trenchcoat_fit'=>array(
        'name' => 'wca_trenchcoat_fit',
        'value' => '1'
    ),
    'wca_trenchcoat_closure'=>array(
        'name' => 'wca_trenchcoat_closure',
        'value' => 'boton'
    ),
    'wca_trenchcoat_closure_type_boton'=>array(
        'name' => 'wca_trenchcoat_closure_type_boton',
        'value' => 'standard'
    ),
    'wca_trenchcoat_pockets'=>array(
        'name' => 'wca_trenchcoat_pockets',
        'value' => '3'
    ),
    'wca_trenchcoat_pockets_type'=>array(
        'name' => 'wca_trenchcoat_pockets_type',
        'value' => '7'
    ),
    'wca_trenchcoat_chest_pocket'=>array(
        'name' => 'wca_trenchcoat_chest_pocket',
        'value' => '0'
    ),
    'wca_trenchcoat_belt'=>array(
        'name' => 'wca_trenchcoat_belt',
        'value' => 'sewing'
    ),
    'wca_trenchcoat_backcut'=>array(
        'name' => 'wca_trenchcoat_backcut',
        'value' => '1'
    ),
    'wca_trenchcoat_sleeve'=>array(
        'name' => 'wca_trenchcoat_sleeve',
        'value' => 'button'
    ),
    'wca_trenchcoat_shoulder'=>array(
        'name' => 'wca_trenchcoat_shoulder',
        'value' => '1'
    ),
    'wca_trenchcoat_back_lapel'=>array(
        'name' => 'wca_trenchcoat_back_lapel',
        'value' => '1'
    ),
    'wca_trenchcoat_neck_lapel'=>array(
        'name' => 'wca_trenchcoat_neck_lapel',
        'value' => '1'
    ),
    'wca_trenchcoat_elbow_patch'=>array(
        'name' => 'wca_trenchcoat_elbow_patch',
        'value' => '1'
    ),
    'neck_lining'=>array(
        'name' => 'neck_lining',
        'value' => '4'
    ),
    'elbow_patch'=>array(
        'name' => 'elbow_patch',
        'value' => '3'
    ),
    'wca_trenchcoat_btn_thread_apply'=>array(
        'value' => 'all'
    ),
    'wca_buton_thread'=>array(
        'value' => '5'
    ),
    'wca_buton_hole_thread'=>array(
        'value' => '7'
    ),
    
);



$price = json_encode($attribute_price);                         // Array of default attribute price

$default_values = json_encode($default_values);                // Array of default attribute values
$category = 'trenchcoat';                                         // Current category
$fabric = '813_fabric';                                           // Current fabric
$image_category = wca_image_url . "/3d/man/$category";  // category image url
$image_fabric_url = "$image_category/$fabric";                // category fabric image url
$image_front_url = "$image_fabric_url/front";                // category image url for front side
$image_back_url = "$image_fabric_url/back";                  // category image url for back side 
// category image url for back side 
$button_url = "$image_category/botones";                           // category image url for buttons
$zipper_url = "$image_category/zipper";                            // category image url for zippers
$man_url = wca_image_url . "/man/$category";

?>
<div id="default_value" class="hide"></div>
<script type="text/javascript">
/**/
//define image url
var static_man_url='<?php echo $man_url ?>';
/**/


        $extra_relationship = jQuery.parseJSON('<?php echo $extra_relationship ?>');
        $attribute_lugs = '<?php echo $atribute_slugs ?>';
        $price = '<?php echo $price ?>';
        $embroidary_attributes = jQuery.parseJSON('<?php echo $embroidary_attributes ?>');
        $embroidary_fonts=$embroidary_attributes.fonts;
        $embroidary_color=$embroidary_attributes.color;
        
    jQuery(document).ready(function() {
        jQuery("#tabs").tabs();

        jQuery(document).on('click', '.arrow_toggle', function() {
            var tdata = jQuery(this).attr('toggle');
            jQuery(this).toggleClass('arrow_toggle_close');
            jQuery('.' + tdata).slideToggle();
            if (tdata == 'advance_option') {
                jQuery('.advanced-attribute').toggle();
            }
        });

        /* Start:- function for selected attribute*/
        var default_data = '<?php echo $default_values ?>';
        var chk_array=[];
        chk_array.push('abc');
        chk_array.push('elbow_patch');
        chk_array.push('neck_lining');
        chk_array.push('wca_buton_thread');
        chk_array.push('wca_buton_hole_thread');
        
        $default_vals=default_data;
        jQuery.each(jQuery.parseJSON(default_data), function(key, val) {
            if (key == 'wca_trenchcoat_pockets_type') {
                if (val.value >= 1 && val.value <= 5)
                    jQuery('.trenchcoat_pockets_2').show();
                if (val.value >= 6)
                    jQuery('.trenchcoat_pockets_3').show();
                jQuery('.pocket_modal_main[data-rel=' + val.value + '] img').addClass('boxpart_active');
                jQuery('input[name=wca_trenchcoat_pockets_type]').val(val.value);
            }else if(jQuery.inArray(key,chk_array)) {
                jQuery('.'+key+' a img[data-rel='+val.value+']').addClass('boxpart_active');
            }
            var type=jQuery('input[name=' + key + ']').attr('type');
            if(type == "checkbox" || type == "radio")
                jQuery('input[name=' + key + '][value=' + val.value + ']').attr('checked', '');
            else
                jQuery('input[name=' + key + ']').val(val.value);   
    }); 
    
    
        /* Start:- function for selected attribute*/

        /* Start:- Triggers for create a image as per selcted attributes*/
        jQuery(document).trigger("set-pos-1");
        jQuery(document).trigger("set-pos-3");
        jQuery(document).trigger("set-pos-5");
        jQuery(document).trigger("set-pos-6");
        jQuery(document).trigger("set-pos-7");
        jQuery(document).trigger("set-pos-8");
        jQuery(document).trigger("set-pos-1");
        jQuery(document).trigger("set-pos-1");
        jQuery(document).trigger("back-pos-10");
        jQuery(document).trigger("set-pos-2");
        jQuery(document).trigger('back-pos-12');
        jQuery(document).trigger('back-pos-13');
        jQuery(document).trigger('change-button-thread');
        jQuery(document).trigger('change-button-hole-thread');
        /* End:- Triggers for create a image as per selcted attributes*/

        /* Start for count price*/
      
        $price.base_price = 100;
        jQuery(document).trigger("count_price");
        /* End for count price*/

        
       
        jQuery.each($extra_relationship, function(key, val) {
                jQuery(document).on('click', '.'+ val.class + ' a img', function() {
                    jQuery('.'+ val.class + ' a img').removeClass('boxpart_active');
                    jQuery(this).addClass('boxpart_active');
                    jQuery('input[name='+key+']').removeAttr('checked');
                    jQuery('input[name='+key+'][value=1]').attr('checked','');
                    var value=jQuery(this).data('rel');
                    jQuery('input[name='+val.hidden_name+']').val(value);
                    jQuery(document).trigger('back-pos-12');
                    jQuery(document).trigger('back-pos-13');
                    jQuery(document).trigger('change-button-thread');
                    jQuery(document).trigger('change-button-hole-thread');
                });
        });
        
        
        
        
        
    });

    
    jQuery(document).data({
        wca_trenchcoat_style_crossed: {
            diseable_type: 'input',
            diseable_name: 'wca_trenchcoat_closure_type_boton',
            diseable_value: 'hide',
            default_value: 'standard',
        },
        wca_trenchcoat_style_simple: {
            enable_type: 'input',
            enable_name: 'wca_trenchcoat_closure_type_boton',
            enable_value: 'hide',
        }
    });



</script>


<div id="tabs" class="custom_tabs_main">
    <ul>
        <li><a href="#tabs-1"><div class="number">1</div>Style</a></li>
        <li><a href="#tabs-2"><div class="number">2</div>Fabric</a></li>
        <li><a href="#tabs-3"><div class="number">3</div>Accents</a></li>
    </ul>
    <div id="tabs-1">
        <?php
        include_once ABS_WCA . "admin/views/$category/customize-attributes-step-1.php";
        ?>
    </div>
    <div id="tabs-2">
        <?php
        include_once ABS_WCA . "admin/views/$category/customize-attributes-step-2.php";
        ?>
    </div>
    <div id="tabs-3">
        <?php
        include_once ABS_WCA . "admin/views/$category/customize-attributes-step-3.php";
        ?>
    </div>
</div>    
