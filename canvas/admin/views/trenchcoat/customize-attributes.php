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
global $post_id;
include ABS_MODEL . '/get_attrs.php';
$price = json_encode($attribute_price);                          // Array of default attribute price
$attr_default_values = json_encode($default_values);               // Array of default attribute values     
?>
<div id="default_value" class="hide"></div>
<script type="text/javascript">
    //define image url
    var static_man_url = '<?php echo $man_url ?>';
    $fabric = '<?php echo $fabric ?>';
    $extra_relationship = jQuery.parseJSON('<?php echo $extra_relationship ?>');
    $attribute_lugs = '<?php echo $atribute_slugs ?>';
    $price = '<?php echo $price ?>';
    $prices = jQuery.parseJSON($price);

    $extra_linings = jQuery.parseJSON('<?php echo $extra_linings ?>');
    $lining_fabrics = jQuery.parseJSON('<?php echo $lining_fabrics ?>');

    $embroidary_attributes = jQuery.parseJSON('<?php echo $embroidary_attributes ?>');
    $embroidary_fonts = $embroidary_attributes.fonts;
    $embroidary_color = $embroidary_attributes.color;

    /*Start:- create a model for change lining (Knockout js)*/
    var LiningModel = {
        lining: ko.observableArray($lining_fabrics[$fabric]),
        change_linings: function(data, event) {
            var fabric = jQuery(event.currentTarget).data('rel');
            var new_linigs = $lining_fabrics[fabric];
            LiningModel.lining([]);
            ko.utils.arrayPushAll(LiningModel.lining, new_linigs);
            //$new_fabric=jQuery(this).data('rel');
            jQuery('input[name=wca_trenchcoat_fabric_type]').val(fabric);
            jQuery('input[name=wca_trenchcoat_interior_type][value=0]').attr('checked', '');
            var tmp_linig = $fabric_data[fabric].lining;
            jQuery('input[name=wca_trenchcoat_interior]').val(tmp_linig);
            jQuery(document).trigger('set-fabric');
            jQuery(document).trigger('fabric_change');
            jQuery(document).trigger('extra-linings');

        },
    }
    /*End:- create a model for change lining(Knockout js)*/



    jQuery(document).ready(function() {

        /*Start:-  Binding model of knockout for a lining (Knockout js)*/
        ko.cleanNode(jQuery('#main_customization')[0]);
        LiningModel.lining();
        ko.applyBindings(LiningModel, jQuery('#main_customization')[0]);
        /*End:-  Binding model of knockout for a lining (Knockout js)*/

        jQuery("#tabs").tabs();



        /* Start:- function for selected attribute*/
        $default_vals = '<?php echo $attr_default_values ?>';    // JSON of default values of attrybutes
        var chk_array = [];
        chk_array.push('wca_embroidary_color');
        chk_array.push('wca_neck_lining');
        chk_array.push('wca_elbow_patch');
        chk_array.push('wca_buton_thread');
        chk_array.push('wca_buton_hole_thread');

        //$default_vals = default_data;
        jQuery.each(jQuery.parseJSON($default_vals), function(key, value) {
            if (key == 'wca_trenchcoat_pockets_type') {
                if (value >= 1 && value <= 5)
                    jQuery('.trenchcoat_pockets_2').show();
                if (value >= 6)
                    jQuery('.trenchcoat_pockets_3').show();
                jQuery('.pocket_modal_main[data-rel=' + value + '] img').addClass('boxpart_active');
                jQuery('input[name=wca_trenchcoat_pockets_type]').val(value);
            } else if (jQuery.inArray(key, chk_array) >= 0) {
                jQuery('.' + key + ' a img[data-rel=' + value + ']').addClass('boxpart_active');
            }
            var type = jQuery('input[name=' + key + ']').attr('type');
            if (type == "checkbox" || type == "radio")
                jQuery('input[name=' + key + '][value=' + value + ']').attr('checked', '');
            else
                jQuery('input[name=' + key + ']').val(value);
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
        jQuery(document).trigger('extra-linings');
        jQuery(document).trigger("back-pos-10");
        jQuery(document).trigger("set-pos-2");
        jQuery(document).trigger('back-pos-12');
        jQuery(document).trigger('back-pos-13');
        jQuery(document).trigger('embroidery_set');
        jQuery(document).trigger('change-button-thread');
        jQuery(document).trigger('change-button-hole-thread');

        var fabric_titel = $fabric_data[$fabric].titel + ', ' + $fabric_data[$new_fabric].composition;
        var fabric_ref = $fabric_data[$fabric].ref;
        jQuery('#fabric_name').html(fabric_titel);
        jQuery('#fabric_ref').html(fabric_ref);
        /* End:- Triggers for initialt create a image as per selcted attributes*/

        /* Start for count price*/
        //$price.base_price = 100;
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
                if (val.main_div == '#main_buton_thread')
                    jQuery('input[name=wca_button_hilo_ojal]').val(0);

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



        var name, value, label, price, eledpr;
        var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
        jQuery(document).on("click", ".wca_trenchcoat_attr_edit", function() {
            jQuery("#black_overlay").show();
            jQuery(".attr_loader").show();
            var flag = jQuery(this).data('flag');
            if (flag == "heading") {
                name = jQuery(this).data('name');
                value = jQuery(this).data('value');
            } else {
                eledpr = jQuery(this);
                var eleupr = jQuery(this).parent();
                name = eleupr.find('input').attr('name');
                value = eleupr.find('input').attr('value');
            }

            jQuery.ajax({
                url: ajax_url,
                type: "POST",
                data: {action: 'label_form', name: name, value: value, category_id: 1},
                success: function(data) {
                    jQuery('#edit_lable').html(data);
                    jQuery(".attr_loader").hide();
                }
            });
        });

        jQuery(document).on('click', '#white_content #cancel', function() {
            jQuery("#black_overlay").hide();
            jQuery('#edit_lable').html('');
        });

        jQuery(document).on('click', '#send_attr_form', function() {
            jQuery('.mask').show();
            jQuery('#send_attr_form').attr('disabled', '');
            label = jQuery("#label_edit").val();
            price = jQuery("#price_edit").val();
            //  alert(name + value + price + label);
            jQuery.ajax({
                url: ajax_url,
                type: "POST",
                data: {action: 'label_change', label: label, price: price, name: name, value: value, category_id: 1},
                success: function(data) {
                    jQuery('#send_attr_form').removeAttr('disabled');
                    var label_data = jQuery.parseJSON(data);
                    jQuery('#' + name + '__nis__' + value).html(label);
                    if (parseFloat(label_data.price) > 0) {
                        jQuery('#' + name + '__nis__' + value + '_price .wca_price').html(label_data.price);
                        jQuery('#' + name + '__nis__' + value + '_price').show();
                    } else {
                        jQuery('#' + name + '__nis__' + value + '_price .wca_price').html('');
                        jQuery('#' + name + '__nis__' + value + '_price').hide();
                    }
                    var tmp = name + '**NIS**' + value;
                    $prices[tmp] = label_data.price;
                    jQuery(document).trigger("count_price");
                    jQuery("#label_edit,#price_edit").val('');
                    jQuery('#edit_lable').html('');
                    jQuery("#black_overlay").css("display", "none");
                    jQuery('.mask').hide();
                }

            });
        });


    });
</script>


<div id="tabs" class="custom_tabs_main">

    <ul>
        <li><a href="#tabs-1"><div class="number">1</div>Style</a></li>
        <li><a href="#tabs-2"><div class="number">2</div>Fabric</a></li>
        <li><a href="#tabs-3"><div class="number">3</div>Accents</a></li>
    </ul>
    <div class="variable_price pull-right" style="font-weight:bold; margin-top:-61px;"> Price: <?php echo wca_price(1, 'dynamic') ?></div>
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
<div id="black_overlay" style="display:none">
    <div id="mask">
    </div>
    <i class="fa fa-refresh fa-spin loader attr_loader"></i>
    <div id="edit_lable">
        
   </div>
</div>    

