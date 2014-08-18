jQuery(document).ready(function() {

    jQuery(document).on('click', '.subshow', function() {
        $main_sub_class = jQuery('.' + jQuery(this).attr('name'));
        $main_sub_class.removeClass('hide');
        $main_sub_class.hide();
        $show_sub = jQuery('.' + jQuery(this).data('sh'));
        $show_sub.show();

    });


    jQuery(document).on('click', '#wca_trenchcoat_style_crossed', function() {
        $pocket_selector = jQuery('input[name=wca_trenchcoat_pockets][value=2]');
        jQuery('input[name=wca_trenchcoat_closure_type_boton][value=hide]').attr('disabled', '');
        jQuery('input[name=wca_trenchcoat_closure_type_boton][value=standard]').attr('checked', '');
        jQuery('input[name=wca_trenchcoat_chest_pocket][value!=0]').attr('disabled', '');
        jQuery('input[name=wca_trenchcoat_chest_pocket][value=0]').attr('checked', '');
        jQuery('input[name=wca_trenchcoat_pockets][value=3]').attr('disabled', '');
        jQuery('input[name=wca_trenchcoat_pockets][value=2]').attr('checked', '');
        jQuery(document).trigger("set-pos-3");
        jQuery(document).trigger('pockat-change');
    });

    jQuery(document).on('click', '#wca_trenchcoat_style_simple', function() {
        jQuery('input[name=wca_trenchcoat_chest_pocket][value!=0]').removeAttr('disabled');
        jQuery('input[name=wca_trenchcoat_closure_type_boton][value=hide]').removeAttr('disabled');
        jQuery('input[name=wca_trenchcoat_pockets][value=3]').removeAttr('disabled');
    });

    jQuery(document).on('click', '#trenchcoat_belt_loose', function() {
        $pocket_selector = jQuery('input[name=wca_trenchcoat_pockets][value=2]');
        jQuery('input[name=wca_trenchcoat_pockets][value=3]').attr('disabled', '');
        jQuery('input[name=wca_trenchcoat_pockets][value=2]').attr('checked', '');
        jQuery(document).trigger('pockat-change');
    });

    jQuery(document).on('click', '#trenchcoat_belt_sewing', function() {
        jQuery('input[name=wca_trenchcoat_pockets][value=3]').removeAttr('disabled');
    });



    jQuery(document).on('click', '.box_part img', function() {
        jQuery('.boxpart_active').removeClass('boxpart_active');
        jQuery(this).addClass('boxpart_active');
        jQuery('input[name=wca_trenchcoat_pockets_type]').val(
                jQuery(this).closest('.pocket_modal_main').data('rel')
                );
        jQuery(document).trigger("set-pos-2");
    });

    jQuery(document).on('click', 'input[name=wca_trenchcoat_pockets]', function() {
        $pocket_selector = jQuery(this);
        jQuery(document).trigger('pockat-change');
    });


    jQuery(document).on('click', '.pos1', function() {
        jQuery(document).trigger("set-pos-1");
        jQuery(document).trigger("set-pos-8");
        jQuery(document).trigger("count_price");
    });

    jQuery(document).on('click', '.pos2', function() {
        jQuery(document).trigger("set-pos-2");
        jQuery(document).trigger("count_price");
    });

    jQuery(document).on('click', '.pos3', function() {
        jQuery(document).trigger("set-pos-3");
        jQuery(document).trigger("count_price");
    });

    jQuery(document).on('click', '.pos5', function() {
        jQuery(document).trigger("set-pos-5");
        jQuery(document).trigger("count_price");
    });

    jQuery(document).on('click', '.pos6', function() {
        jQuery(document).trigger("set-pos-6");
        jQuery(document).trigger("count_price");
    });

    jQuery(document).on('click', '.pos7', function() {
        jQuery(document).trigger("set-pos-7");
        jQuery(document).trigger("count_price");
    });


    jQuery(document).on('click', '.bck_pos10', function() {
        jQuery(document).trigger("back-pos-10");
        jQuery(document).trigger("count_price");
    });



    jQuery(document).on('click', '#change_position', function() {
        if (jQuery(this).data('rel') == 'front') {
            jQuery(this).data('rel', 'back');
            jQuery('.front').hide();
            jQuery('.back').show();
        } else {
            jQuery(this).data('rel', 'front');
            jQuery('.back').hide();
            jQuery('.front').show();
        }

    });



    jQuery(document).on('click', '.attr-back input', function() {
        jQuery(document).trigger('back-show');
    });

    jQuery(document).on('click', '.attr-front input', function() {
        jQuery(document).trigger('front-show');
    });



    /**Bind triggers start**/

    jQuery(document).bind("front-show", function() {
        jQuery('.back').hide();
        jQuery('.front').show();
    });

    jQuery(document).bind("back-show", function() {
        jQuery('.back').show();
        jQuery('.front').hide();
    });



    jQuery(document).bind("pockat-change", function() {
        $pocket_type = jQuery("." + $pocket_selector.data('sh') + " .pocket_modal_main");
        $pocket_type.find('img').removeClass('boxpart_active');
        $pocket_type.first().find('img').addClass('boxpart_active');
        jQuery('input[name=wca_trenchcoat_pockets_type]').val($pocket_type.first().data('rel'));

        $main_sub_class = jQuery('.' + $pocket_selector.attr('name'));
        $main_sub_class.removeClass('hide');
        $main_sub_class.hide();
        $show_sub = jQuery('.' + $pocket_selector.data('sh'));
        $show_sub.show();

        jQuery(document).trigger("set-pos-2");
    });


    jQuery(document).bind("pockat-type-change", function() {
        //jQuery("." + $pocket_selector.data('sh') + " .pocket_modal_main").find('img').removeClass('boxpart_active');
        //jQuery("." + $pocket_selector.data('sh') + " .pocket_modal_main:first-child").find('img').addClass('boxpart_active');
    });


    jQuery(document).bind("set-pos-1", function() {
        var pos_style = jQuery('input[name=wca_trenchcoat_style]:checked').val();
        var pos_legth = jQuery('input[name=wca_trenchcoat_length]:checked').val();
        var pos_fit = jQuery('input[name=wca_trenchcoat_fit]:checked').val();
        var pos_closuer = jQuery('input[name=wca_trenchcoat_closure]:checked').val();
        var pos_clouser_type = jQuery('input[name=wca_trenchcoat_closure_type_boton]:checked').val();
        var pos_backcut = jQuery('input[name=wca_trenchcoat_backcut]:checked').val();

        var front_image = 'body_' + pos_style + '_' + pos_closuer + '_' + pos_clouser_type + '_fit' + pos_fit + '_' + pos_legth + '.png';
        var back_image = pos_backcut + '_cortes_fit' + pos_fit + '_' + pos_legth + '.png';
        jQuery('.front .layer[pos=1] img').attr('src', image_front_url + '/' + front_image);
        jQuery('.back .layer[pos=1] img').attr('src', image_back_url + '/' + back_image);
    });

    jQuery(document).bind("set-pos-2", function() {
        var type = jQuery('input[name=wca_trenchcoat_pockets_type]').val();
        var pockets = jQuery('input[name=wca_trenchcoat_pockets]:checked').val();
        var fit = jQuery('input[name=wca_trenchcoat_fit]:checked').val();
        if (pockets != 0) {
            var front_image = 'pockets_' + pockets + '_type' + type + '_fit' + fit + '.png';
            if (jQuery('.front .layer[pos=2]').html() == '') {
                jQuery('.front .layer[pos=2]').html(jQuery(document).data('pos2'));
            }
            jQuery('.front .layer[pos=2] img').attr('src', image_front_url + '/' + front_image);
        } else {
            jQuery('.front .layer[pos=2]').html('');
        }
        jQuery('.pocket_modal_main').remove('boxpart_active');
        jQuery('.pocket_modal_main [data-rel=' + type + ']').addClass('boxpart_active');
        jQuery(document).trigger('front-show');
    });

    jQuery(document).bind("set-pos-3", function() {
        var type = jQuery('input[name=wca_trenchcoat_chest_pocket]:checked').val();
        var front_image = 'pockets_chest_type_' + type + '.png'
        if (type != 0) {
            if (jQuery('.front .layer[pos=3]').html() == '') {
                jQuery('.front .layer[pos=3]').html(jQuery(document).data('pos3'));
            }
            jQuery('.front .layer[pos=3] img').attr('src', image_front_url + '/' + front_image);
        } else {
            jQuery('.front .layer[pos=3]').html('');
        }
    });


    jQuery(document).bind("set-pos-5", function() {
        var color = 1;
        var belt = jQuery('input[name=wca_trenchcoat_belt]:checked').val();
        var fit = jQuery('input[name=wca_trenchcoat_fit]:checked').val();
        var image_url = 'belt_' + belt + '_fit' + fit + '.png'
        var btn_url = color + '_boton_belt_' + belt + '_fit' + fit + '.png';
        if (belt != 0) {
            if (belt != 'sewing') {
                if (jQuery('.front .layer[pos=5]').html() == '') {
                    jQuery('.front .layer[pos=5]').html(jQuery(document).data('pos5'));
                }
                jQuery('.front .layer[pos=5] img').attr('src', image_front_url + '/' + image_url);
                jQuery('.back .layer[pos=6]').html('');
            } else {
                if (jQuery('.back .layer[pos=6]').html() == '') {
                    jQuery('.back .layer[pos=6]').html(jQuery(document).data('back_pos6'))
                }
                jQuery('.back .layer[pos=6] img').attr('src', button_url + '/' + btn_url);
                jQuery('.front .layer[pos=5]').html('');
            }
            if (jQuery('.back .layer[pos=5]').html() == '') {
                jQuery('.back .layer[pos=5]').html(jQuery(document).data('back_pos5'));
            }
            jQuery('.back .layer[pos=5] img').attr('src', image_back_url + '/' + image_url);

        } else {
            jQuery('.front .layer[pos=5]').html('');
            jQuery('.back .layer[pos=5]').html('');
            jQuery('.back .layer[pos=6]').html('');
        }

    });

    jQuery(document).bind("set-pos-6", function() {
        var color = '1';
        var shoulder = jQuery('input[name=wca_trenchcoat_shoulder]:checked').val();
        var front_image = 'shoulder.png';
        var but_img = color + '_boton_shoulder_tape.png';
        if (shoulder == 1) {
            if (jQuery('.front .layer[pos=6]').html() == '') {
                jQuery('.front .layer[pos=6]').html(jQuery(document).data('pos6'));
            }
            jQuery('.front .layer[pos=6] img').attr('src', image_front_url + '/' + front_image);
            if (jQuery('.ref_pos6').html() == '') {
                jQuery('.ref_pos6').html(jQuery(document).data('ref_pos6'));
            }
            jQuery('.ref_pos6 img').attr('src', button_url + '/' + but_img);
        } else {
            jQuery('.front .layer[pos=6]').html('');
            jQuery('.ref_pos6').html('')
        }
    });

    jQuery(document).bind("set-pos-7", function() {
        var color = '1';
        var sleev = jQuery('input[name=wca_trenchcoat_sleeve]:checked').val();
        var image_url = 'sleeve_' + sleev + '.png';
        if (sleev != 0) {
            if (sleev == 'tape') {
                if (jQuery('.back .layer[pos=7]').html() == '') {
                    jQuery('.back .layer[pos=7]').html(jQuery(document).data('pos5'));
                }
                jQuery('.back .layer[pos=7] img').attr('src', image_back_url + '/' + image_url);
            }

            if (jQuery('.front .layer[pos=7]').html() == '') {
                jQuery('.front .layer[pos=7]').html(jQuery(document).data('back_pos7'));
            }
            jQuery('.front .layer[pos=7] img').attr('src', image_front_url + '/' + image_url);

            if (sleev == 'button') {
                var but_img = color + '_boton_sleeve.png';
                jQuery('.ref_pos7').html(jQuery(document).data('ref_pos7'));
                jQuery('.ref_pos7 img').attr('src', button_url + '/' + but_img);
            } else {
                jQuery('.ref_pos7').html('');
            }

        } else {
            jQuery('.front .layer[pos=7]').html('');
            jQuery('.back .layer[pos=7]').html('');
            jQuery('.ref_pos7').html('');

        }



    });

    jQuery(document).bind("set-pos-8", function() {
        var color = '1';
        var btn_style = jQuery('input[name=wca_trenchcoat_style]:checked').val();
        var closuer = jQuery('input[name=wca_trenchcoat_closure]:checked').val();
        var coat_legth = jQuery('input[name=wca_trenchcoat_length]:checked').val();
        var clouser_type = 'standard';
        if (btn_style == 'simple') {
            clouser_type = jQuery('input[name=wca_trenchcoat_closure_type_boton]:checked').val();
        }
        if (closuer == 'boton') {
            var but_img = color + '_boton_body_' + btn_style + '_boton_' + clouser_type + '.png';
            jQuery('.front .layer[pos=8] img').attr('src', button_url + '/' + but_img);
        } else {
            var but_img = 'mi_' + btn_style + '_zipper_' + clouser_type + '_' + coat_legth + '.png';
            jQuery('.front .layer[pos=8] img').attr('src', zipper_url + '/' + but_img);
        }
    });






    jQuery(document).bind("back-pos-10", function() {
        var color = '1';
        var back_lapel = jQuery('input[name=wca_trenchcoat_back_lapel]:checked').val();
        var image_url = "back_lapel_1.png";
        var button_img = color + "_boton_belt_back_lapel_1.png";

        if (back_lapel == 1) {
            if (jQuery('.back .layer[pos=10]').html() == '') {
                jQuery('.back .layer[pos=10]').html(jQuery(document).data('back_pos10'));
            }
            jQuery('.back .layer[pos=10] img').attr('src', image_back_url + '/' + image_url);

            if (jQuery('.ref_pos_10').html() == '') {
                jQuery('.ref_pos_10').html(jQuery(document).data('back_ref_pos10'));
            }

            jQuery('.ref_pos_10 img').attr('src', button_url + '/' + button_img);
        } else {
            jQuery('.back .layer[pos=10]').html('');
            jQuery('.ref_pos_10').html('');
        }
    });


    jQuery(document).bind("count_price", function() {
        $prices=jQuery.parseJSON($price);
        var final_price=100;
        jQuery.each(jQuery.parseJSON($attribute_lugs), function(key, val) {
            var selector = GetValue(val);
            var temp =val+'**NIS**'+selector;
            final_price=parseFloat(final_price) + parseFloat($prices[temp]);
        });
        jQuery('#_wca_extra_price').val(final_price);
    });




    function GetValue(selector) {
        var tag = "input";
        $selector = jQuery('input[name='+selector+']');
        $chkedselector = jQuery('input[name='+selector+']:checked');
        var type = $selector.attr("type");

        if (tag == "input" && (type == "checkbox" || type == "radio")) {
           return $chkedselector.val();
        }

        return $selector.val();
    }


    /**Bind triggers End**/

    /*This is for change fabric :- Start*/
    //    jQuery('.layer img').each(function() {
    //        var replaced = jQuery(this).attr('src').replace('currnt_fabric', 'new_fabric');
    //        jQuery(this).attr('src', replaced);
    //    });
    /*This is for change fabric :- End*/
});
