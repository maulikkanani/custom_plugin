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
include ABS_WCA . 'admin/includes/get_attrs.php';
$price = json_encode($attribute_price);                          // Array of default attribute price
$attr_default_values = json_encode($default_values);               // Array of default attribute values     

?>
<div id="default_value" class="hide"></div>
<script type="text/javascript">
    //define image url
    var static_man_url = '<?php echo $man_url ?>';
    $fabric='<?php echo $fabric ?>';
    $extra_relationship = jQuery.parseJSON('<?php echo $extra_relationship ?>');
    $attribute_lugs = '<?php echo $atribute_slugs ?>';
    $price = '<?php echo $price ?>';
    $embroidary_attributes = jQuery.parseJSON('<?php echo $embroidary_attributes ?>');
    $embroidary_fonts = $embroidary_attributes.fonts;
    $embroidary_color = $embroidary_attributes.color;

    jQuery(document).ready(function() {
        jQuery("#tabs").tabs();
       /* Start:- step 3---> toggle h2   */ 
        jQuery(document).on('click', '.arrow_toggle', function() {
            var tdata = jQuery(this).attr('toggle');
            jQuery(this).toggleClass('arrow_toggle_close');
            jQuery('.' + tdata).slideToggle();
            if (tdata == 'advance_option') {
                jQuery('.advanced-attribute').toggle();
            }
        });
        /* END:- step 3---> toggle h2   */ 

        /* Start:- function for selected attribute*/
        var default_data = '<?php echo $attr_default_values ?>';    // JSON of default values of attrybutes
        var chk_array = [];
        chk_array.push('abc');
        chk_array.push('elbow_patch');
        chk_array.push('neck_lining');
        chk_array.push('wca_buton_thread');
        chk_array.push('wca_buton_hole_thread');

        $default_vals = default_data;
        jQuery.each(jQuery.parseJSON(default_data), function(key, val) {
            if (key == 'wca_trenchcoat_pockets_type') {
                if (val.value >= 1 && val.value <= 5)
                    jQuery('.trenchcoat_pockets_2').show();
                if (val.value >= 6)
                    jQuery('.trenchcoat_pockets_3').show();
                jQuery('.pocket_modal_main[data-rel=' + val.value + '] img').addClass('boxpart_active');
                jQuery('input[name=wca_trenchcoat_pockets_type]').val(val.value);
            } else if (jQuery.inArray(key, chk_array)) {
                jQuery('.' + key + ' a img[data-rel=' + val.value + ']').addClass('boxpart_active');
            }
            var type = jQuery('input[name=' + key + ']').attr('type');
            if (type == "checkbox" || type == "radio")
                jQuery('input[name=' + key + '][value=' + val.value + ']').attr('checked', '');
            else
                jQuery('input[name=' + key + ']').val(val.value);
        });


        /* END:- function for selected attribute*/

        /* Start:- Triggers for initialt create a image as per selcted attributes*/
        jQuery(document).trigger("set-pos-1");
        jQuery(document).trigger("set-pos-3");
        jQuery(document).trigger("set-pos-5");
        jQuery(document).trigger("set-pos-6");
        jQuery(document).trigger("set-pos-7");
        jQuery(document).trigger("set-pos-8");
        //jQuery(document).trigger("set-pos-1");
        //jQuery(document).trigger("set-pos-1");
        jQuery(document).trigger('set-fabric');
        jQuery(document).trigger("back-pos-10");
        jQuery(document).trigger("set-pos-2");
        jQuery(document).trigger('back-pos-12');
        jQuery(document).trigger('back-pos-13');
        jQuery(document).trigger('change-button-thread');
        jQuery(document).trigger('change-button-hole-thread');
        /* End:- Triggers for initialt create a image as per selcted attributes*/

        /* Start for count price*/
        $price.base_price = 100;
        jQuery(document).trigger("count_price");
        /* End for count price*/

            
        //$extra_relationship --> a JSON of all extra ettributes of step 3   
        /*Start:-binding events of  step 3 for embroidery , neck and elbow button threads and hole*/
        jQuery.each($extra_relationship, function(key, val) {
           /*Start:- this is for on click color */ 
            jQuery(document).on('click', '.' + val.class + ' a img', function() {
                jQuery('.' + val.class + ' a img').removeClass('boxpart_active');
                jQuery(this).addClass('boxpart_active');
                jQuery('input[name=' + key + ']').removeAttr('checked');
                jQuery('input[name=' + key + '][value=1]').attr('checked', '');
                var value = jQuery(this).data('rel');
                jQuery('input[name=' + val.hidden_name + ']').val(value);
                jQuery(document).trigger('back-pos-12');
                jQuery(document).trigger('back-pos-13');
                jQuery(document).trigger('embroidery_set');
                jQuery(document).trigger('change-button-thread');
                jQuery(document).trigger('change-button-hole-thread');
            });
            /*end:- this is for on click color */
            /*Start:- this is for on click on main h2 */ 
            jQuery(document).on('click', val.main_div + ' h2', function() {
                jQuery('.' + val.class + ' a img').removeClass('boxpart_active');
                jQuery('input[name=' + key + ']').removeAttr('checked');
                jQuery('input[name=' + key + '][value=0]').attr('checked', '');
                jQuery('input[name=' + val.hidden_name + ']').val(0);
                if (jQuery('input[name=' + val.hidden_name + ']').attr('type') == 'text')
                    jQuery('input[name=' + val.hidden_name + ']').val('');
                jQuery(document).trigger('back-pos-12');
                jQuery(document).trigger('back-pos-13');
                jQuery(document).trigger('embroidery_set');
                jQuery(document).trigger('change-button-thread');
                jQuery(document).trigger('change-button-hole-thread');
            });
            /*Start:- this is for click on main h2*/ 
        });
        
        /*END:-binding events of  step 3 for embroidery , neck and elbow button threads and hole*/

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
