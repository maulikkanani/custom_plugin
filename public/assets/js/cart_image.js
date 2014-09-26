
jQuery(document).on('click', '#change_position_single', function() {
    if (jQuery(this).data('rel') == 'front') {
        jQuery(this).data('rel', 'back');
        jQuery(this).closest('#product_image').find('.front').hide();
        jQuery(this).closest('#product_image').find('.back').show();
    } else {
        jQuery(this).data('rel', 'front');
        jQuery(this).closest('#product_image').find('.back').hide();
        jQuery(this).closest('#product_image').find('.front').show();
    }

});


jQuery(document).bind("single-set-pos-1", function() {
    var pos_style = $default_attrs.wca_trenchcoat_style;
    var pos_legth = $default_attrs.wca_trenchcoat_length;
    var pos_fit = $default_attrs.wca_trenchcoat_fit;
    var pos_closuer = $default_attrs.wca_trenchcoat_closure;
    var pos_clouser_type = $default_attrs.wca_trenchcoat_closure_type_boton;
    var pos_backcut = $default_attrs.wca_trenchcoat_backcut;

    var front_image = 'body_' + pos_style + '_' + pos_closuer + '_' + pos_clouser_type + '_fit' + pos_fit + '_' + pos_legth + '.png';
    var back_image = pos_backcut + '_cortes_fit' + pos_fit + '_' + pos_legth + '.png';



    jQuery('.' + $unique_class + ' .front .layer[pos=1] img').attr('src', image_front_url + '/' + front_image);
    jQuery('.' + $unique_class + ' .back .layer[pos=1] img').attr('src', image_back_url + '/' + back_image);
});


/*Start :- This is for a Pockets change*/
jQuery(document).bind("single-set-pos-2", function() {
    var type = $default_attrs.wca_trenchcoat_pockets_type;
    var pockets = $default_attrs.wca_trenchcoat_pockets;
    jQuery('input[name=wca_trenchcoat_pockets]:checked').val();
    var fit = $default_attrs.wca_trenchcoat_fit;
    jQuery('input[name=wca_trenchcoat_fit]:checked').val();
    if (pockets != 0) {
        var front_image = 'pockets_' + pockets + '_type' + type + '_fit' + fit + '.png';
        var src = image_front_url + '/' + front_image;
    } else {
        var src = blank_image;
    }
    jQuery('.' + $unique_class + ' .front .layer[pos=2] img').attr('src', src);
    jQuery('.pocket_modal_main').remove('boxpart_active');
    jQuery('.pocket_modal_main [data-rel=' + type + ']').addClass('boxpart_active');
});
/*End :- This is for a Pockets change*/

/*Start :- This is for a Chest Pockets change*/
jQuery(document).bind("single-set-pos-3", function() {
    var type = $default_attrs.wca_trenchcoat_chest_pocket;
    var front_image = 'pockets_chest_type_' + type + '.png';
    if (type != 0) {
        jQuery('.' + $unique_class + ' .front .layer[pos=3] img').attr('src', image_front_url + '/' + front_image);
    } else {
        jQuery('.' + $unique_class + ' .front .layer[pos=3] img').attr('src', blank_image);
    }
});
/*End :- This is for a Chest Pockets change*/

/*Start :- This is for a change Belt*/
jQuery(document).bind("single-set-pos-5", function() {
    var belt = $default_attrs.wca_trenchcoat_belt;
    var fit = $default_attrs.wca_trenchcoat_fit;
    var image_url = 'belt_' + belt + '_fit' + fit + '.png'
    var btn_url = 'boton_belt_' + belt + '_fit' + fit + '.png';
    if (belt != 0) {
        if (belt != 'sewing') {
            jQuery('.' + $unique_class + ' .front .layer[pos=5] img').attr('src', image_front_url + '/' + image_url);
            jQuery('.' + $unique_class + ' .back .layer[pos=6] img').attr('src', blank_image);
        } else {
            jQuery('.' + $unique_class + ' .front .layer[pos=5] img').attr('src', blank_image);
            jQuery('.' + $unique_class + ' .back .layer[pos=6] img').attr('src', button_url + '/' + btn_url);
        }
        jQuery('.' + $unique_class + ' .back .layer[pos=5] img').attr('src', image_back_url + '/' + image_url);

    } else {
        jQuery('.' + $unique_class + ' .front .layer[pos=5] img').attr('src', blank_image);
        jQuery('.' + $unique_class + ' .back .layer[pos=5] img').attr('src', blank_image);
        jQuery('.' + $unique_class + ' .back .layer[pos=6] img').attr('src', blank_image);
    }

    jQuery(document).trigger('single-change-button-thread');                // for buton thread
    jQuery(document).trigger('single-change-button-hole-thread');           // for buton hole thread

});
/*End :- This is for a change Belt*/

/*Start :- This is for a change sholder tap*/
jQuery(document).bind("single-set-pos-6", function() {
    var shoulder = $default_attrs.wca_trenchcoat_shoulder;
    var front_image = 'shoulder.png';
    var but_img = 'boton_shoulder_tape.png';
    if (shoulder == 1) {
        jQuery('.' + $unique_class + ' .front .layer[pos=6] img').attr('src', image_front_url + '/' + front_image);
        jQuery('.ref_pos6 img').attr('src', button_url + '/' + but_img);
    } else {
        jQuery('.' + $unique_class + ' .front .layer[pos=6] img').attr('src', blank_image);
        jQuery('.ref_pos6 img').attr('src', blank_image);
    }
    jQuery(document).trigger('single-change-button-thread');              // for buton thread
    jQuery(document).trigger('single-change-button-hole-thread');         // for buton hole thread
});
/*End:- This is for a change sholder tap*/

/*Start :- This is for a change sleev type*/
jQuery(document).bind("single-set-pos-7", function() {
    var sleev = $default_attrs.wca_trenchcoat_sleeve;
    var image_url = 'sleeve_' + sleev + '.png';
    if (sleev != 0) {
        jQuery('.' + $unique_class + ' .front .layer[pos=7] img').attr('src', image_front_url + '/' + image_url);
        if (sleev == 'tape') {
            jQuery('.ref_pos7 img').attr('src', blank_image);
            jQuery('.' + $unique_class + ' .back .layer[pos=7] img').attr('src', image_back_url + '/' + image_url);
            jQuery('#thread_appy').hide();
            jQuery('input[name=wca_trenchcoat_btn_thread_apply]').removeAttr('checked', '');
            jQuery('input[name=wca_trenchcoat_btn_thread_apply][value=all]').attr('checked', '');
        }
        if (sleev == 'button') {
            jQuery('.' + $unique_class + ' .back .layer[pos=7] img').attr('src', blank_image);
            var but_img = 'boton_sleeve.png';
            jQuery('.ref_pos7 img').attr('src', button_url + '/' + but_img);
            jQuery('#thread_appy').show();
        }
    } else {
        jQuery('input[name=wca_trenchcoat_btn_thread_apply]').removeAttr('checked', '');
        jQuery('.' + $unique_class + ' .front .layer[pos=7] img').attr('src', blank_image);
        jQuery('.' + $unique_class + ' .back .layer[pos=7] img').attr('src', blank_image);
        jQuery('.ref_pos7 img').attr('src', blank_image);
        jQuery('#thread_appy').hide();

    }

    jQuery(document).trigger('single-change-button-thread');              // for buton thread
    jQuery(document).trigger('single-change-button-hole-thread');         // for buton hole thread

});
/*End:- This is for a change sleev type*/

/*Start:- This is for a change sleev type*/
jQuery(document).bind("single-set-pos-8", function() {
    var btn_style = $default_attrs.wca_trenchcoat_style;
    var closuer = $default_attrs.wca_trenchcoat_closure;
    var coat_legth = $default_attrs.wca_trenchcoat_length;
    var clouser_type = 'standard';
    if (btn_style == 'simple') {
        clouser_type = $default_attrs.wca_trenchcoat_closure_type_boton;
    }
    if (closuer == 'boton') {
        var but_img = 'boton_body_' + btn_style + '_boton_' + clouser_type + '.png';
        jQuery('.' + $unique_class + ' .front .layer[pos=8] img').attr('src', button_url + '/' + but_img);
    } else {
        var but_img = btn_style + '_zipper_' + clouser_type + '_' + coat_legth + '.png';
        jQuery('.' + $unique_class + ' .front .layer[pos=8] img').attr('src', zipper_url + '/' + but_img);
    }
    jQuery(document).trigger('single-change-button-thread');              // for buton thread
    jQuery(document).trigger('single-change-button-hole-thread');         // for buton hole thread
});
/*End:- This is for a change sleev type*/

/*Start:- This is for a change Back laple*/
jQuery(document).bind("single-back-pos-10", function() {
    var back_lapel = $default_attrs.wca_trenchcoat_back_lapel;
    var image_url = "back_lapel_1.png";
    var button_img = "boton_belt_back_lapel_1.png";
    if (back_lapel == 1) {
        jQuery('.' + $unique_class + ' .back .layer[pos=10] img').attr('src', image_back_url + '/' + image_url);
        jQuery('.ref_pos_10 img').attr('src', button_url + '/' + button_img);
    } else {
        jQuery('.' + $unique_class + ' .back .layer[pos=10] img').attr('src', blank_image);
        jQuery('.ref_pos_10 img').attr('src', blank_image);
    }
    jQuery(document).trigger('single-change-button-thread');              // for buton thread
    jQuery(document).trigger('single-change-button-hole-thread');         // for buton hole thread
});
/*End:- This is for a change Back laple*/



/* Start:- Start for extra linig */
jQuery(document).bind('single-extra-linings', function() {
    var trenchcoat_interior_type = $default_attrs.wca_trenchcoat_interior_type;
    if (trenchcoat_interior_type > 0) {
        jQuery('#interriors').show();
    } else {
        jQuery('#interriors').hide();
    }
    jQuery(document).trigger('single-extra-linings-images');
});

jQuery(document).bind('single-extra-linings-images', function() {
    var trenchcoat_interior_type = $default_attrs.wca_trenchcoat_interior_type;
    var trenchcoat_interior = $default_attrs.wca_trenchcoat_interior;
    jQuery('.lining_change .image').removeClass('fabric-active');
    jQuery('.lining_change[data-rel=' + trenchcoat_interior + '] .image').addClass('fabric-active');
    if (trenchcoat_interior > 0 && trenchcoat_interior_type > 0) {
        var fabric_lining_img = image_front_url + '/lupa_forro.png';
        var lining_img = linig_url + '/' + trenchcoat_interior + '/linings.png';
        var lining_base = linig_url + '/superior.png'
        var lining_background = 'url(' + linig_url + '/' + trenchcoat_interior + '/big.jpg)'
    } else {
        fabric_lining_img = lining_img = lining_base = lining_background = blank_image;
    }
    jQuery('.preview_fabric_3d_common .linig-background').css('background', lining_background)
    jQuery('.' + $unique_class + ' .fabric_lining_img').attr('src', fabric_lining_img);
    jQuery('.' + $unique_class + ' .lining_img').attr('src', lining_img);
    jQuery('.' + $unique_class + ' .lining_base').attr('src', lining_base);
    jQuery('#model_3d_preview .all_lining_imgs').show();
    jQuery(document).trigger('single-set-linig-slider');
});


/* End:- Start for extra linig */

/* Start:- this is for neck lining and elbow */
jQuery(document).bind('single-extra_items', function() {
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
    jQuery(document).trigger('single-back-pos-12');
    jQuery(document).trigger('single-back-pos-13');
});
/* End:- this is for neck lining and elbow */

/* Start:- this is for neck lining */
jQuery(document).bind('single-back-pos-12', function() {
    var img = $default_attrs.wca_neck_lining;
    var img_url = cat_url + '/neck_lining/' + img + '/neck_lining.png';
    if (img != 0) {
        jQuery('.' + $unique_class + ' .back .layer[pos=12] img').attr('src', img_url);
    } else {
        jQuery('.' + $unique_class + ' .back .layer[pos=12] img').attr('src', blank_image);
    }

});
/* END:- this is for neck lining  */

/* Start:- this is for elbow patch */
jQuery(document).bind('single-back-pos-13', function() {
    var img = $default_attrs.wca_elbow_patch;
    var img_url = cat_url + '/patches/' + img + '/elbow_patches.png';
    if (img != 0) {
        jQuery('.' + $unique_class + ' .back .layer[pos=13] img').attr('src', img_url);
    } else {
        jQuery('.' + $unique_class + ' .back .layer[pos=13] img').attr('src', blank_image);
    }

});
/* End:- this is for elbow patch */



/* Start:- this is for Change all button thread*/
jQuery(document).bind('single-change-button-thread', function() {
    var thread_id = $default_attrs.wca_buton_thread;
    var imagename = thread_id + '.png';
    var hilo_imgs = cat_url + '/hilo/' + thread_id;
    var img_url = hilo_imgs + '/hilo.png'
    jQuery('.hilo').css('background', 'url(' + img_url + ')');
    var sleev = $default_attrs.wca_trenchcoat_sleeve;            //butoon
    var belt = $default_attrs.wca_trenchcoat_belt;   //sewing
    var back_lapel = $default_attrs.wca_trenchcoat_back_lapel; //1
    var shoulder = $default_attrs.wca_trenchcoat_shoulder;   //1

    var pos_style = $default_attrs.wca_trenchcoat_style;
    var pos_legth = $default_attrs.wca_trenchcoat_length;
    var fit = $default_attrs.wca_trenchcoat_fit;
    var pos_closuer = $default_attrs.wca_trenchcoat_closure;
    var pos_clouser_type = $default_attrs.wca_trenchcoat_closure_type_boton;


    jQuery('.' + $unique_class + ' .front .btn_hilo img').attr('src', blank_image);
    jQuery('.' + $unique_class + ' .back .btn_hilo img').attr('src', blank_image);

    if (thread_id > 0) {
        jQuery('input[name=wca_button_hilo_ojal]').val('1');
        if (sleev == 'button') {
            var img = hilo_imgs + '/sleev.png';
            jQuery('.' + $unique_class + ' .front .btn_hilo .sleev').attr('src', img);
        }

        if ($default_attrs.wca_trenchcoat_btn_thread_apply == 'all') {
            if (back_lapel == 1) {
                var img = hilo_imgs + '/back_lapel.png';
                jQuery('.' + $unique_class + ' .back .btn_hilo .back_lapel').attr('src', img);
            }

            if (belt == 'sewing') {
                var img = hilo_imgs + '/belt_sewing_fit' + fit + '.png';
                jQuery('.' + $unique_class + ' .back .btn_hilo .belt').attr('src', img);
            }

            if (shoulder == 1) {
                var img = hilo_imgs + '/shoulder.png';
                jQuery('.' + $unique_class + ' .front .btn_hilo .shoulder').attr('src', img);
            }

            if (pos_closuer == 'boton') {
                var img = hilo_imgs + '/body_' + pos_style + '_boton_' + pos_clouser_type + '.png';
                jQuery('.' + $unique_class + ' .front .btn_hilo .body').attr('src', img);
            }
        }
    }

});
/* End:- this is for Change all button thread*/

/* Start :- this is for Change all button hole thread*/
jQuery(document).bind('single-change-button-hole-thread', function() {
    var thread_id = $default_attrs.wca_buton_hole_thread;
    var imagename = thread_id + '.png';
    var ojal_imgs = cat_url + '/ojal/' + thread_id;
    var img_url = ojal_imgs + '/ojal.png';
    jQuery('.ojal').css('background', 'url(' + img_url + ')');

    var sleev = $default_attrs.wca_trenchcoat_sleeve;            //butoon
    var belt = $default_attrs.wca_trenchcoat_belt;   //sewing
    var back_lapel = $default_attrs.wca_trenchcoat_back_lapel; //1
    var shoulder = $default_attrs.wca_trenchcoat_shoulder;   //1

    var pos_style = $default_attrs.wca_trenchcoat_style;
    var pos_legth = $default_attrs.wca_trenchcoat_length;
    var fit = $default_attrs.wca_trenchcoat_fit;
    var pos_closuer = $default_attrs.wca_trenchcoat_closure;
    var pos_clouser_type = $default_attrs.wca_trenchcoat_closure_type_boton;



    jQuery('.' + $unique_class + ' .front .btn_ojal img').attr('src', blank_image);
    jQuery('.' + $unique_class + ' .back .btn_ojal img').attr('src', blank_image);
    if (thread_id > 0) {
        jQuery('input[name=wca_button_hilo_ojal]').val('1');
        if (sleev == 'button') {
            var img = ojal_imgs + '/sleev.png';
            jQuery('.' + $unique_class + ' .front .btn_ojal .sleev').attr('src', img);
        }

        if ($default_attrs.wca_trenchcoat_btn_thread_apply == 'all') {

            if (belt == 'sewing') {
                var img = ojal_imgs + '/belt_sewing_fit' + fit + '.png';
                jQuery('.' + $unique_class + ' .back .btn_ojal .belt').attr('src', img);
            }
            if (shoulder == 1) {
                var img = ojal_imgs + '/shoulder.png';
                jQuery('.' + $unique_class + ' .front .btn_ojal .shoulder').attr('src', img);
            }
            if (pos_closuer == 'boton') {
                var img = ojal_imgs + '/body_' + pos_style + '_boton_' + pos_clouser_type + '.png';
                jQuery('.' + $unique_class + ' .front .btn_ojal .body').attr('src', img);
            }
        }
    }
});
/* End :- this is for Change all button hole thread*/

   