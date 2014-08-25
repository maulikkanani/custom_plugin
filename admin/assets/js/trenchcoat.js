jQuery(document).ready(function() {

    /*Start:- hide show pockets*/
    jQuery(document).on('click', '.subshow', function() {
        $main_sub_class = jQuery('.' + jQuery(this).attr('name'));
        $main_sub_class.removeClass('hide');
        $main_sub_class.hide();
        $show_sub = jQuery('.' + jQuery(this).data('sh'));
        $show_sub.show();
    });
    /*End:- hide show pockets*/

    /*Start - select style crossed */
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
    /*END - select style crossed */

    /*Start - select style Simple */
    jQuery(document).on('click', '#wca_trenchcoat_style_simple', function() {
        jQuery('input[name=wca_trenchcoat_chest_pocket][value!=0]').removeAttr('disabled');
        jQuery('input[name=wca_trenchcoat_closure_type_boton][value=hide]').removeAttr('disabled');
        jQuery('input[name=wca_trenchcoat_pockets][value=3]').removeAttr('disabled');
    });
    /*End - select style Simple */

    /*Start - select belt -> loose */
    jQuery(document).on('click', '#trenchcoat_belt_loose', function() {
        $pocket_selector = jQuery('input[name=wca_trenchcoat_pockets][value=2]');
        jQuery('input[name=wca_trenchcoat_pockets][value=3]').attr('disabled', '');
        jQuery('input[name=wca_trenchcoat_pockets][value=2]').attr('checked', '');
        jQuery(document).trigger('pockat-change');
    });
    /*End - select belt -> loose */

    /*Start - select belt -> sewing */
    jQuery(document).on('click', '#trenchcoat_belt_sewing', function() {
        jQuery('input[name=wca_trenchcoat_pockets][value=3]').removeAttr('disabled');
    });
    /*End - select belt -> sewing */

    /*Start - select pocket image*/
    jQuery(document).on('click', '.box_part img', function() {
        jQuery('.boxpart_active').removeClass('boxpart_active');
        jQuery(this).addClass('boxpart_active');
        jQuery('input[name=wca_trenchcoat_pockets_type]').val(
                jQuery(this).closest('.pocket_modal_main').data('rel')
                );
        jQuery(document).trigger("set-pos-2");
    });
    /*End - end pocket image*/

    /*Start - select pocket Type*/
    jQuery(document).on('click', 'input[name=wca_trenchcoat_pockets]', function() {
        $pocket_selector = jQuery(this);
        jQuery(document).trigger('pockat-change');
    });
    /*End - select pocket Type*/


    jQuery(document).on('click', '.pos1', function() {
        jQuery(document).trigger("set-pos-1");
        jQuery(document).trigger("set-pos-8");

    });

    jQuery(document).on('click', '.pos2', function() {
        jQuery(document).trigger("set-pos-2");
    });

    jQuery(document).on('click', '.pos3', function() {
        jQuery(document).trigger("set-pos-3");
    });

    jQuery(document).on('click', '.pos5', function() {
        jQuery(document).trigger("set-pos-5");
    });

    jQuery(document).on('click', '.pos6', function() {
        jQuery(document).trigger("set-pos-6");
    });

    jQuery(document).on('click', '.pos7', function() {
        jQuery(document).trigger("set-pos-7");
    });


    jQuery(document).on('click', '.bck_pos10', function() {
        jQuery(document).trigger("back-pos-10");
    });


    /*Start -> turn arround*/
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
    /*End -> turn arround*/

    /*Start -> Show back part*/
    jQuery(document).on('click', '.attr-back input,.attr-back .color,.attr-back', function() {
        jQuery(document).trigger('back-show');
    });
    /*End -> Show back part*/

    /*Start -> Show front part*/
    jQuery(document).on('click', '.attr-front input, .attr-front .color, .attr-front', function() {
        jQuery(document).trigger('front-show');
    });
    /*End  -> Show front part*/

    /*Start -> click on Thread type All & cuff only in step 3*/
    jQuery(document).on('click', '#thread_appy', function() {
        jQuery(document).trigger('change-button-thread');
        jQuery(document).trigger('change-button-hole-thread');
    });
    /*End -> click on Thread type All & cuff only in step 3*/



    /**Bind triggers start**/

    /*Start:- show front side*/
    jQuery(document).bind("front-show", function() {
        jQuery('.back').hide();
        jQuery('.front').show();
        jQuery(document).trigger("count_price");
    });
    /*End:- show Front side*/

    /*Start:- show back side*/
    jQuery(document).bind("back-show", function() {
        jQuery('.back').show();
        jQuery('.front').hide();
        jQuery(document).trigger("count_price");
    });
    /*End:- show Front side*/


    /*Start :- This is for a Pockets change*/
    jQuery(document).bind("pockat-change", function() {
        /*Start:- set attribute value and html for set-pos-2 trigger*/

        $pocket_type = jQuery("." + $pocket_selector.data('sh') + " .pocket_modal_main");
        $pocket_type.find('img').removeClass('boxpart_active');
        $pocket_type.first().find('img').addClass('boxpart_active');
        jQuery('input[name=wca_trenchcoat_pockets_type]').val($pocket_type.first().data('rel'));
        $main_sub_class = jQuery('.' + $pocket_selector.attr('name'));
        $main_sub_class.removeClass('hide');
        $main_sub_class.hide();
        $show_sub = jQuery('.' + $pocket_selector.data('sh'));
        $show_sub.show();

        /*End:- set attribute value and html for set-pos-2 trigger*/

        jQuery(document).trigger("set-pos-2");
    });
    /*End :- This is for a Pockets change*/

    /*Start :- This is fo combination of Style, Coat length, Fit, Fastening and Fastening type:, */
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
    /*End :- This is fo combination of Style, Coat length, Fit, Fastening and Fastening type:, */

    /*Start :- This is for a Pockets change*/
    jQuery(document).bind("set-pos-2", function() {
        var type = jQuery('input[name=wca_trenchcoat_pockets_type]').val();
        var pockets = jQuery('input[name=wca_trenchcoat_pockets]:checked').val();
        var fit = jQuery('input[name=wca_trenchcoat_fit]:checked').val();
        if (pockets != 0) {
            var front_image = 'pockets_' + pockets + '_type' + type + '_fit' + fit + '.png';
            jQuery('.front .layer[pos=2] img').attr('src', image_front_url + '/' + front_image);
        } else {
            jQuery('.front .layer[pos=2] img').attr('src', blank_image);
        }
        jQuery('.pocket_modal_main').remove('boxpart_active');
        jQuery('.pocket_modal_main [data-rel=' + type + ']').addClass('boxpart_active');
        jQuery(document).trigger('front-show');
    });
    /*End :- This is for a Pockets change*/

    /*Start :- This is for a Chest Pockets change*/
    jQuery(document).bind("set-pos-3", function() {
        var type = jQuery('input[name=wca_trenchcoat_chest_pocket]:checked').val();
        var front_image = 'pockets_chest_type_' + type + '.png';
        if (type != 0) {
            jQuery('.front .layer[pos=3] img').attr('src', image_front_url + '/' + front_image);
        } else {
            jQuery('.front .layer[pos=3] img').attr('src', blank_image);
        }
    });
    /*End :- This is for a Chest Pockets change*/

    /*Start :- This is for a change Belt*/
    jQuery(document).bind("set-pos-5", function() {
        var belt = jQuery('input[name=wca_trenchcoat_belt]:checked').val();
        var fit = jQuery('input[name=wca_trenchcoat_fit]:checked').val();
        var image_url = 'belt_' + belt + '_fit' + fit + '.png'
        var btn_url = 'boton_belt_' + belt + '_fit' + fit + '.png';
        if (belt != 0) {
            if (belt != 'sewing') {
                jQuery('.front .layer[pos=5] img').attr('src', image_front_url + '/' + image_url);
                jQuery('.back .layer[pos=6] img').attr('src', blank_image);
            } else {
                jQuery('.back .layer[pos=6] img').attr('src', button_url + '/' + btn_url);
                jQuery('.front .layer[pos=5] img').attr('src', blank_image);
            }
            jQuery('.back .layer[pos=5] img').attr('src', image_back_url + '/' + image_url);

        } else {
            jQuery('.front .layer[pos=5] img').attr('src', blank_image);
            jQuery('.back .layer[pos=5] img').attr('src', blank_image);
            jQuery('.back .layer[pos=6] img').attr('src', blank_image);
        }

        jQuery(document).trigger('change-button-thread');                // for buton thread
        jQuery(document).trigger('change-button-hole-thread');           // for buton hole thread

    });
    /*End :- This is for a change Belt*/

    /*Start :- This is for a change sholder tap*/
    jQuery(document).bind("set-pos-6", function() {
        var shoulder = jQuery('input[name=wca_trenchcoat_shoulder]:checked').val();
        var front_image = 'shoulder.png';
        var but_img = 'boton_shoulder_tape.png';
        if (shoulder == 1) {
            jQuery('.front .layer[pos=6] img').attr('src', image_front_url + '/' + front_image);
            jQuery('.ref_pos6 img').attr('src', button_url + '/' + but_img);
        } else {
            jQuery('.front .layer[pos=6] img').attr('src', blank_image);
            jQuery('.ref_pos6 img').attr('src', blank_image);
        }
        jQuery(document).trigger('change-button-thread');              // for buton thread
        jQuery(document).trigger('change-button-hole-thread');         // for buton hole thread
    });
    /*End:- This is for a change sholder tap*/

    /*Start :- This is for a change sleev type*/
    jQuery(document).bind("set-pos-7", function() {
        var sleev = jQuery('input[name=wca_trenchcoat_sleeve]:checked').val();
        var image_url = 'sleeve_' + sleev + '.png';
        if (sleev != 0) {
            jQuery('.front .layer[pos=7] img').attr('src', image_front_url + '/' + image_url);
            if (sleev == 'tape') {
                jQuery('.ref_pos7 img').attr('src', blank_image);
                jQuery('.back .layer[pos=7] img').attr('src', image_back_url + '/' + image_url);
                jQuery('#thread_appy').hide();
                jQuery('input[name=wca_trenchcoat_btn_thread_apply]').removeAttr('checked', '');
            }
            if (sleev == 'button') {
                jQuery('.back .layer[pos=7] img').attr('src', blank_image);
                var but_img = 'boton_sleeve.png';
                jQuery('.ref_pos7 img').attr('src', button_url + '/' + but_img);
                jQuery('#thread_appy').show();
            }
        } else {
            jQuery('input[name=wca_trenchcoat_btn_thread_apply]').removeAttr('checked', '');
            jQuery('.front .layer[pos=7] img').attr('src', blank_image);
            jQuery('.back .layer[pos=7] img').attr('src', blank_image);
            jQuery('.ref_pos7 img').attr('src', blank_image);
            jQuery('#thread_appy').hide();

        }

        jQuery(document).trigger('change-button-thread');              // for buton thread
        jQuery(document).trigger('change-button-hole-thread');         // for buton hole thread

    });
    /*End:- This is for a change sleev type*/

    /*Start:- This is for a change sleev type*/
    jQuery(document).bind("set-pos-8", function() {
        var btn_style = jQuery('input[name=wca_trenchcoat_style]:checked').val();
        var closuer = jQuery('input[name=wca_trenchcoat_closure]:checked').val();
        var coat_legth = jQuery('input[name=wca_trenchcoat_length]:checked').val();
        var clouser_type = 'standard';
        if (btn_style == 'simple') {
            clouser_type = jQuery('input[name=wca_trenchcoat_closure_type_boton]:checked').val();
        }
        if (closuer == 'boton') {
            var but_img = 'boton_body_' + btn_style + '_boton_' + clouser_type + '.png';
            jQuery('.front .layer[pos=8] img').attr('src', button_url + '/' + but_img);
        } else {
            var but_img = btn_style + '_zipper_' + clouser_type + '_' + coat_legth + '.png';
            jQuery('.front .layer[pos=8] img').attr('src', zipper_url + '/' + but_img);
        }
        jQuery(document).trigger('change-button-thread');              // for buton thread
        jQuery(document).trigger('change-button-hole-thread');         // for buton hole thread
    });
    /*End:- This is for a change sleev type*/

    /*Start:- This is for a change Back laple*/
    jQuery(document).bind("back-pos-10", function() {
        var back_lapel = jQuery('input[name=wca_trenchcoat_back_lapel]:checked').val();
        var image_url = "back_lapel_1.png";
        var button_img = "boton_belt_back_lapel_1.png";
        if (back_lapel == 1) {
            jQuery('.back .layer[pos=10] img').attr('src', image_back_url + '/' + image_url);
            jQuery('.ref_pos_10 img').attr('src', button_url + '/' + button_img);
        } else {
            jQuery('.back .layer[pos=10] img').attr('src', blank_image);
            jQuery('.ref_pos_10 img').attr('src', blank_image);
        }
        jQuery(document).trigger('change-button-thread');              // for buton thread
        jQuery(document).trigger('change-button-hole-thread');         // for buton hole thread
    });
    /*End:- This is for a change Back laple*/


    /* Start coding for change price */
    jQuery(document).bind("count_price", function() {
        $prices = jQuery.parseJSON($price);
        var final_price = $prices.base_price;
        jQuery.each(jQuery.parseJSON($attribute_lugs), function(key, val) {
            var selector = GetValue(val);
            var temp = val + '**NIS**' + selector;
            final_price = parseFloat(final_price) + parseFloat($prices[temp]);
        });
        jQuery('#_wca_extra_price').val(final_price);
    });

    /*Start:- Fuinction for get value ouf attributes*/
    function GetValue(selector) {
        var tag = "input";
        $selector = jQuery('input[name=' + selector + ']');
        $chkedselector = jQuery('input[name=' + selector + ']:checked');
        var type = $selector.attr("type");

        if (tag == "input" && (type == "checkbox" || type == "radio")) {
            return $chkedselector.val();
        }
        return $selector.val();
    }
    /*End:- Fuinction for get value ouf attributes*/

    /*  End coding for change price  */

    /**Bind triggers End**/

    /*This is for change fabric :- Start*/

    /*jQuery(document).on('click','.fabric_change',function(){
     $new_fabric=jQuery(this).data('rel');
     jQuery('input[name=wca_trenchcoat_fabric_type]').val($new_fabric);
     jQuery(document).trigger('set-fabric');
     jQuery(document).trigger('fabric_change');
     });*/

    jQuery(document).bind('set-fabric', function() {
        $new_fabric = jQuery('input[name=wca_trenchcoat_fabric_type]').val();
        jQuery('.fabric_change .image').removeClass('fabric-active');
        jQuery('.fabric_change[data-rel=' + $new_fabric + '] .image').addClass('fabric-active');
    });

    jQuery(document).bind('fabric_change', function() {
        $old_fabric_dir = '/fabric/' + $fabric + '/';         //OLD fabric
        $new_fabric_dir = '/fabric/' + $new_fabric + '/';     // New fabric

        $old_button_dir = '/botones/' + $buttons + '/';       //Old button 
        $buttons = $fabric_data[$new_fabric].button;    //New button id 
        $new_button_dir = '/botones/' + $buttons + '/';       // new button

        $old_zipper_dir = '/zipper/' + $zipper + '/';         // old zipper
        $zipper = $fabric_data[$new_fabric].zipper;     // new zipper id
        $new_zipper_dir = '/zipper/' + $zipper + '/';         // new zipper     

        jQuery('.layer img').each(function() {
            var replace_fabric = jQuery(this).attr('src').replace($old_fabric_dir, $new_fabric_dir);
            jQuery(this).attr('src', replace_fabric);

            var replace_button = jQuery(this).attr('src').replace($old_button_dir, $new_button_dir);
            jQuery(this).attr('src', replace_button);

            var replace_zipper = jQuery(this).attr('src').replace($old_zipper_dir, $new_zipper_dir);
            jQuery(this).attr('src', replace_zipper);
        });

        jQuery('.fabric-background').each(function() {
            var replaced = jQuery(this).css('background-image').replace($old_fabric_dir, $new_fabric_dir);
            jQuery(this).css('background', replaced);
        });

        jQuery('.boton-background').each(function() {
            var replaced = jQuery(this).css('background-image').replace($old_button_dir, $new_button_dir);
            jQuery(this).css('background', replaced);
        });
        var fabric_titel = $fabric_data[$new_fabric].titel + ', ' + $fabric_data[$new_fabric].composition;
        var fabric_ref = $fabric_data[$new_fabric].ref;
        jQuery('#fabric_name').html(fabric_titel);
        jQuery('#fabric_ref').html(fabric_ref);

        $fabric = $new_fabric;
        image_front_url = cat_url + '/fabric/' + $fabric + '/front';
        image_back_url = cat_url + '/fabric/' + $fabric + '/back';
        button_url = cat_url + '/botones/' + $buttons;
        zipper_url = cat_url + '/zipper/' + $zipper;

        jQuery(document).trigger("count_price");
    });

    /*This is for change fabric :- End*/



    /*Start step 3 JS*/

    //Start for extra item click like neck and ellbow
    jQuery(document).on('click', '.linings', function() {
        jQuery(document).trigger('extra-linings');
    });

    jQuery(document).on('click', '.linings_img', function() {
        jQuery('input[name=wca_trenchcoat_interior_type][value=1]').attr('checked', '');
        jQuery(document).trigger('extra-linings');
    });


    jQuery(document).on('click', '.lining_change', function() {
        jQuery('input[name=wca_trenchcoat_interior_type][value=1]').attr('checked', '');
        jQuery('input[name=wca_trenchcoat_interior]').val(jQuery(this).data('rel'));
        jQuery(document).trigger('extra-linings-images');
    });

    jQuery(document).on('click', '#main_interior .heading_main', function() {
        jQuery('input[name=wca_trenchcoat_interior_type][value=0]').attr('checked', '');
        var tmp_linig = $fabric_data[$fabric].lining;
        jQuery('input[name=wca_trenchcoat_interior]').val(tmp_linig);
        jQuery(document).trigger('extra-linings');
    });



    jQuery(document).on('click', '.extra_item', function() {
        $extra_name = jQuery(this).attr('name');
        jQuery(document).trigger('extra_items');
    });

    jQuery(document).on('change', 'input[name=wca_embroidery_text]', function() {
        jQuery(document).trigger('embroidery_set');
    });

    jQuery(document).on('click', '.wca_embroidary_color a img', function() {
        jQuery(document).trigger('embroidery_set');
    });

    jQuery(document).on('click', '.wca_embroidary_fonts input', function() {
        jQuery(document).trigger('embroidery_set');
    });

    //end: for extra item click like neck and ellbow

    /* Start:- Start for extra linig */
    jQuery(document).bind('extra-linings', function() {
        var trenchcoat_interior_type = jQuery('input[name=wca_trenchcoat_interior_type]:checked').val();
        if (trenchcoat_interior_type > 0) {
            jQuery('#interriors').show();
        } else {
            jQuery('#interriors').hide();
        }
        var tmp_linig = $fabric_data[$fabric].lining;
        jQuery('input[name=wca_trenchcoat_interior]').val(tmp_linig);
        jQuery(document).trigger('extra-linings-images');
    });

    jQuery(document).bind('extra-linings-images', function() {
        var trenchcoat_interior_type = jQuery('input[name=wca_trenchcoat_interior_type]:checked').val();
        var trenchcoat_interior = jQuery('input[name=wca_trenchcoat_interior]').val();
        jQuery('.lining_change .image').removeClass('fabric-active');
        jQuery('.lining_change[data-rel=' + trenchcoat_interior + '] .image').addClass('fabric-active');
        jQuery('#lining_material').html($extra_linings[$fabric][trenchcoat_interior].material);
        if (trenchcoat_interior > 0 && trenchcoat_interior_type > 0) {
            var fabric_lining_img = image_front_url + '/lupa_forro.png';
            var lining_img = linig_url + '/' + trenchcoat_interior + '/linings.png';
            var lining_base = linig_url + '/superior.png'
            var lining_background = 'url(' + linig_url + '/' + trenchcoat_interior + '/big.jpg)'
        } else {
            fabric_lining_img = lining_img = lining_base = lining_background = blank_image;
        }
        jQuery('.preview_fabric_3d_common .linig-background').css('background', lining_background)
        jQuery('.fabric_lining_img').attr('src', fabric_lining_img);
        jQuery('.lining_img').attr('src', lining_img);
        jQuery('.lining_base').attr('src', lining_base);
        jQuery(document).trigger('set-linig-slider');
    });
   
    jQuery(document).bind('set-linig-slider', function() {
        var owl = jQuery("#owl-demo");
        owl.owlCarousel({
            items: 4, //10 items above 1000px browser width
            itemsDesktop: [1000, 5], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 3], // betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0
            itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
        });

        // Custom Navigation Events
        jQuery(".next").click(function() {
            owl.trigger('owl.next');
        })

        jQuery(".prev").click(function() {
            owl.trigger('owl.prev');
        })
    });
    /* End:- Start for extra linig */

    /* Start:- this is for neck lining and elbow */
    jQuery(document).bind('extra_items', function() {
        var tmp_data = $extra_relationship[$extra_name];
        var rel_class = '.' + tmp_data.class;
        var hidden_name = tmp_data.hidden_name;
        $extra_name = jQuery('input[name=' + $extra_name + ']:checked');
        $extra_subattrs = jQuery(rel_class + ' a img[data-rel=' + tmp_data.first_rel + ']');
        $extra_subattrs_all = jQuery(rel_class + ' img');
        $extra_hidden = jQuery('input[name=' + hidden_name + ']');
        $extra_default = tmp_data.default;

        if ($extra_name.val() != 0) {
            $extra_subattrs_all.removeClass('boxpart_active');
            $extra_subattrs.addClass('boxpart_active');
            $extra_hidden.val(tmp_data.first_rel);
        } else {
            $extra_hidden.val($extra_default)
            $extra_subattrs_all.removeClass('boxpart_active');
        }
        jQuery(document).trigger('back-pos-12');
        jQuery(document).trigger('back-pos-13');
        jQuery(document).trigger('back-show');
    });
    /* End:- this is for neck lining and elbow */

    /* Start:- this is for neck lining */
    jQuery(document).bind('back-pos-12', function() {
        var img = jQuery('input[name=wca_neck_lining]').val();
        var img_url = cat_url + '/neck_lining/' + img + '.png';
        if (img != 0) {
            jQuery('.back .layer[pos=12] img').attr('src', img_url);
        } else {
            jQuery('.back .layer[pos=12] img').attr('src', blank_image);
        }

    });
    /* END:- this is for neck lining  */

    /* Start:- this is for elbow patch */
    jQuery(document).bind('back-pos-13', function() {
        var img = jQuery('input[name=wca_elbow_patch]').val();
        var img_url = cat_url + '/patches/' + img + '.png';
        if (img != 0) {
            jQuery('.back .layer[pos=13] img').attr('src', img_url);
        } else {
            jQuery('.back .layer[pos=13] img').attr('src', blank_image);
        }

    });
    /* End:- this is for elbow patch */



    /* Start:- this is for Change all button thread*/
    jQuery(document).bind('change-button-thread', function() {
        var thread_id = jQuery('input[name=wca_buton_thread]').val();
        var imagename = thread_id + '.png';
        var hilo_imgs = cat_url + '/hilo/' + thread_id;
        var img_url = hilo_imgs + '/hilo.png'
        jQuery('.hilo').css('background', 'url(' + img_url + ')');
        var sleev = jQuery('input[name=wca_trenchcoat_sleeve]:checked').val();            //butoon
        var belt = jQuery('input[name=wca_trenchcoat_belt]:checked').val();   //sewing
        var back_lapel = jQuery('input[name=wca_trenchcoat_back_lapel]:checked').val(); //1
        var shoulder = jQuery('input[name=wca_trenchcoat_shoulder]:checked').val();   //1

        var pos_style = jQuery('input[name=wca_trenchcoat_style]:checked').val();
        var pos_legth = jQuery('input[name=wca_trenchcoat_length]:checked').val();
        var fit = jQuery('input[name=wca_trenchcoat_fit]:checked').val();
        var pos_closuer = jQuery('input[name=wca_trenchcoat_closure]:checked').val();
        var pos_clouser_type = jQuery('input[name=wca_trenchcoat_closure_type_boton]:checked').val();


        jQuery('.front .btn_hilo img').attr('src', blank_image);
        jQuery('.back .btn_hilo img').attr('src', blank_image);

        if (thread_id > 0) {
            if (sleev == 'button') {
                var img = hilo_imgs + '/sleev.png';
                jQuery('.front .btn_hilo .sleev').attr('src', img);
            }

            if (jQuery('input[name=wca_trenchcoat_btn_thread_apply]:checked').val() == 'all') {
                if (back_lapel == 1) {
                    var img = hilo_imgs + '/back_lapel.png';
                    jQuery('.back .btn_hilo .back_lapel').attr('src', img);
                }

                if (belt == 'sewing') {
                    var img = hilo_imgs + '/belt_sewing_fit' + fit + '.png';
                    jQuery('.back .btn_hilo .belt').attr('src', img);
                }

                if (shoulder == 1) {
                    var img = hilo_imgs + '/shoulder.png';
                    jQuery('.front .btn_hilo .shoulder').attr('src', img);
                }

                if (pos_closuer == 'boton') {
                    var img = hilo_imgs + '/body_' + pos_style + '_boton_' + pos_clouser_type + '.png';
                    jQuery('.front .btn_hilo .body').attr('src', img);
                }
            }
        }

    });
    /* End:- this is for Change all button thread*/

    /* Start :- this is for Change all button hole thread*/
    jQuery(document).bind('change-button-hole-thread', function() {
        var thread_id = jQuery('input[name=wca_buton_hole_thread]').val();
        var imagename = thread_id + '.png';
        var ojal_imgs = cat_url + '/ojal/' + thread_id;
        var img_url = ojal_imgs + '/ojal.png';
        jQuery('.ojal').css('background', 'url(' + img_url + ')');

        var sleev = jQuery('input[name=wca_trenchcoat_sleeve]:checked').val();         //butoon
        var belt = jQuery('input[name=wca_trenchcoat_belt]:checked').val();   //sewing
        var back_lapel = jQuery('input[name=wca_trenchcoat_back_lapel]:checked').val();  //1
        var shoulder = jQuery('input[name=wca_trenchcoat_shoulder]:checked').val();  //1


        var pos_style = jQuery('input[name=wca_trenchcoat_style]:checked').val();
        var pos_legth = jQuery('input[name=wca_trenchcoat_length]:checked').val();
        var fit = jQuery('input[name=wca_trenchcoat_fit]:checked').val();
        var pos_closuer = jQuery('input[name=wca_trenchcoat_closure]:checked').val();
        var pos_clouser_type = jQuery('input[name=wca_trenchcoat_closure_type_boton]:checked').val();



        jQuery('.front .btn_ojal img').attr('src', blank_image);
        jQuery('.back .btn_ojal img').attr('src', blank_image);
        if (thread_id > 0) {
            if (sleev == 'button') {
                var img = ojal_imgs + '/sleev.png';
                jQuery('.front .btn_ojal .sleev').attr('src', img);
            }

            if (jQuery('input[name=wca_trenchcoat_btn_thread_apply]:checked').val() == 'all') {

                if (belt == 'sewing') {
                    var img = ojal_imgs + '/belt_sewing_fit' + fit + '.png';
                    jQuery('.back .btn_ojal .belt').attr('src', img);
                }
                if (shoulder == 1) {
                    var img = ojal_imgs + '/shoulder.png';
                    jQuery('.front .btn_ojal .shoulder').attr('src', img);
                }
                if (pos_closuer == 'boton') {
                    var img = ojal_imgs + '/body_' + pos_style + '_boton_' + pos_clouser_type + '.png';
                    jQuery('.front .btn_ojal .body').attr('src', img);
                }
            }
        }
    });
    /* End :- this is for Change all button hole thread*/

    /* Start :- this is for add text for embroidery work*/
    jQuery(document).bind('embroidery_set', function() {
        jQuery('.text_uper').html(jQuery('input[name=wca_embroidery_text]').val());
        jQuery('input[name=wca_embroidery]').val(0);
        if (jQuery('input[name=wca_embroidery_text]').val() != '')
            jQuery('input[name=wca_embroidery]').val(1);

        var embrodary_color = jQuery('.wca_embroidary_color a img.boxpart_active').data('rel');

        jQuery('.text_uper').css('color', $embroidary_color[embrodary_color]);

        var embrodary_font = jQuery('input[name=wca_trenchcoat_embroidery_font]:checked').val();
        jQuery('.text_uper').css('font-family', $embroidary_fonts[embrodary_font]);

        jQuery(document).trigger("count_price");
    });
    /* End :- this is for add text for embroidery work*/

    /*END step 3 JS*/






});
