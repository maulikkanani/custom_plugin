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



    jQuery(document).on('click', '.attr-back input,.attr-back .color', function() {
        jQuery(document).trigger('back-show');
    });

    jQuery(document).on('click', '.attr-front input, .attr-front .color', function() {
        jQuery(document).trigger('front-show');
    });
    
    jQuery(document).on('click', '#thread_appy', function() {
        jQuery(document).trigger('change-button-thread');
        jQuery(document).trigger('change-button-hole-thread');
    });



    /**Bind triggers start**/

    jQuery(document).bind("front-show", function() {
        jQuery('.back').hide();
        jQuery('.front').show();
        jQuery(document).trigger("count_price");
    });

    jQuery(document).bind("back-show", function() {
        jQuery('.back').show();
        jQuery('.front').hide();
        jQuery(document).trigger("count_price");
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
            
        jQuery(document).trigger('change-button-thread');
        jQuery(document).trigger('change-button-hole-thread');
        
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
        jQuery(document).trigger('change-button-thread');
        jQuery(document).trigger('change-button-hole-thread');
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
                jQuery('#thread_appy').hide();
            }

            if (jQuery('.front .layer[pos=7]').html() == '') {
                jQuery('.front .layer[pos=7]').html(jQuery(document).data('back_pos7'));
            }
            jQuery('.front .layer[pos=7] img').attr('src', image_front_url + '/' + image_url);

            if (sleev == 'button') {
                var but_img = color + '_boton_sleeve.png';
                jQuery('.ref_pos7').html(jQuery(document).data('ref_pos7'));
                jQuery('.ref_pos7 img').attr('src', button_url + '/' + but_img);
                jQuery('#thread_appy').show();
            } else {
                jQuery('.ref_pos7').html('');
            }

        } else {
            jQuery('.front .layer[pos=7]').html('');
            jQuery('.back .layer[pos=7]').html('');
            jQuery('.ref_pos7').html('');
            jQuery('#thread_appy').hide();

        }

        jQuery(document).trigger('change-button-thread');
        jQuery(document).trigger('change-button-hole-thread');

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
        jQuery(document).trigger('change-button-thread');
        jQuery(document).trigger('change-button-hole-thread');
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
                jQuery('.ref_pos_10').html(jQuery(document).data('back_pos11'));
            }

            jQuery('.ref_pos_10 img').attr('src', button_url + '/' + button_img);
        } else {
            jQuery('.back .layer[pos=10]').html('');
            jQuery('.ref_pos_10').html('');
        }
        jQuery(document).trigger('change-button-thread'); 
        jQuery(document).trigger('change-button-hole-thread'); 
    });


   // Start coding for change price
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
    // End coding for change price

    /**Bind triggers End**/

    /*This is for change fabric :- Start*/
    //    jQuery('.layer img').each(function() {
    //        var replaced = jQuery(this).attr('src').replace('currnt_fabric', 'new_fabric');
    //        jQuery(this).attr('src', replaced);
    //    });
    /*This is for change fabric :- End*/
    
    
    
    /*Start step 3 JS*/
    
    //Start for extra item click like neck and ellbow
     jQuery(document).on('click', '.extra_item', function() {
          $extra_name =jQuery(this).attr('name');         
          jQuery(document).trigger('extra_items');
     });
    //END for extra item click like neck and ellbow
    
     jQuery(document).bind('extra_items',function(){
            var tmp_data=$extra_relationship[$extra_name];
            var rel_class='.'+tmp_data.class;       
            var hidden_name=tmp_data.hidden_name; 
            $extra_name=jQuery('input[name='+$extra_name+']:checked');
            $extra_subattrs=jQuery(rel_class+' a img[data-rel='+tmp_data.first_rel+']');
            $extra_subattrs_all=jQuery(rel_class+' img');
            $extra_hidden=jQuery('input[name='+hidden_name+']');
            $extra_default=tmp_data.default;   
                
            if($extra_name.val()!=0){
                    $extra_subattrs_all.removeClass('boxpart_active');
                    $extra_subattrs.addClass('boxpart_active');
                    $extra_hidden.val(tmp_data.first_rel);
            }else{
                  $extra_hidden.val($extra_default)
                  $extra_subattrs_all.removeClass('boxpart_active');
            }
             jQuery(document).trigger('back-pos-12');
             jQuery(document).trigger('back-pos-13');
              jQuery(document).trigger('back-show');
    });
     
    
     jQuery(document).bind('back-pos-12',function(){
         var img=jQuery('input[name=neck_lining]').val();
         var img_url=cat_url+'/neck_lining/'+img+'.png';
         if(img!=0){
             jQuery('.back .layer[pos=12] img').attr('src',img_url);
         }else{
              jQuery('.back .layer[pos=13] img').attr('src',blank_image);
         }
         
     });
     
     
     jQuery(document).bind('back-pos-13',function(){
            var img=jQuery('input[name=elbow_patch]').val();
            var img_url=cat_url+'/patches/'+img+'.png';
            if(img!=0){
                    jQuery('.back .layer[pos=13] img').attr('src',img_url);
            }else{
                    jQuery('.back .layer[pos=13] img').attr('src',blank_image);
            }
            
     });
     
     
     
     
     jQuery(document).bind('change-button-thread',function(){
          var thread_id=jQuery('input[name=wca_buton_thread]').val();
           var imagename=thread_id+'.png';
           var img_url=static_man_url+'/extras/hilos/'+imagename;
            jQuery('.hilo').css('background','url('+img_url+')');
            var sleev = jQuery('input[name=wca_trenchcoat_sleeve]:checked').val();            //butoon
            var belt = jQuery('input[name=wca_trenchcoat_belt]:checked').val();   //sewing
            var back_lapel = jQuery('input[name=wca_trenchcoat_back_lapel]:checked').val(); //1
            var shoulder = jQuery('input[name=wca_trenchcoat_shoulder]:checked').val();   //1
           
            var pos_style = jQuery('input[name=wca_trenchcoat_style]:checked').val();
            var pos_legth = jQuery('input[name=wca_trenchcoat_length]:checked').val();
            var fit = jQuery('input[name=wca_trenchcoat_fit]:checked').val();
            var pos_closuer = jQuery('input[name=wca_trenchcoat_closure]:checked').val();
            var pos_clouser_type = jQuery('input[name=wca_trenchcoat_closure_type_boton]:checked').val();
            var hilo_imgs=cat_url+'/hilo';
            if(sleev=='button'){
                jQuery('.front .btn_hilo img').attr('src',blank_image);
                var img=hilo_imgs+'/sleev/'+thread_id+'_sleeve.png';
                jQuery('.front .btn_hilo .sleev').attr('src',img);
            }
            
            if(jQuery('input[name=wca_trenchcoat_btn_thread_apply]:checked').val()=='all'){
                if(back_lapel==1){
                    var img=hilo_imgs+'/back_lapel/'+thread_id+'.png';
                    jQuery('.back .btn_hilo .back_lapel').attr('src',img);
                }else{
                    jQuery('.back .btn_hilo .back_lapel').attr('src',blank_image);
                }
                
                if(belt=='sewing'){
                    var img=hilo_imgs+'/belt/'+thread_id+'_sewing_fit'+fit+'.png';
                    jQuery('.back .btn_hilo .belt').attr('src',img);
                }else{
                    jQuery('.back .btn_hilo .belt').attr('src',blank_image);
                }
                
                if(shoulder==1){
                    var img=hilo_imgs+'/shoulder/'+thread_id+'.png';
                    jQuery('.front .btn_hilo .shoulder').attr('src',img);
                }else{
                    jQuery('.front .btn_hilo .shoulder').attr('src',blank_image);
                }
                
                if(pos_closuer=='boton'){
                    var img=hilo_imgs+'/body/'+thread_id+'_'+pos_style+'_boton_'+pos_clouser_type+'.png';
                    jQuery('.front .btn_hilo .body').attr('src',img);
                }else{
                    jQuery('.front .btn_hilo .body').attr('src',blank_image);
                }
            }
            
     });
     
     jQuery(document).bind('change-button-hole-thread',function(){
           var thread_id=jQuery('input[name=wca_buton_hole_thread]').val();
           var imagename=thread_id+'.png';
           var img_url=static_man_url+'/extras/ojales/'+imagename;
           jQuery('.ojal').css('background','url('+img_url+')');
           
            var sleev = jQuery('input[name=wca_trenchcoat_sleeve]:checked').val();         //butoon
            var belt = jQuery('input[name=wca_trenchcoat_belt]:checked').val();   //sewing
            var back_lapel = jQuery('input[name=wca_trenchcoat_back_lapel]:checked').val();  //1
            var shoulder = jQuery('input[name=wca_trenchcoat_shoulder]:checked').val();  //1
            
           
            var pos_style = jQuery('input[name=wca_trenchcoat_style]:checked').val();
            var pos_legth = jQuery('input[name=wca_trenchcoat_length]:checked').val();
            var fit = jQuery('input[name=wca_trenchcoat_fit]:checked').val();
            var pos_closuer = jQuery('input[name=wca_trenchcoat_closure]:checked').val();
            var pos_clouser_type = jQuery('input[name=wca_trenchcoat_closure_type_boton]:checked').val();
            
            var ojal_imgs=cat_url+'/ojal';
            if(sleev=='button'){
                jQuery('.front .btn_ojal img').attr('src',blank_image);
                var img=ojal_imgs+'/sleev/'+thread_id+'_sleeve.png';
                jQuery('.front .btn_ojal .sleev').attr('src',img);
            }else{
                jQuery('.front .btn_ojal .sleev').attr('src',blank_image);
            }
            if(jQuery('input[name=wca_trenchcoat_btn_thread_apply]:checked').val()=='all'){
                
                    if(belt=='sewing'){
                         var img=ojal_imgs+'/belt/'+thread_id+'_sewing_fit'+fit+'.png';
                          jQuery('.back .btn_ojal .belt').attr('src',img);
                    }else{
                        jQuery('.back .btn_ojal .belt').attr('src',blank_image);
                    }
                    if(shoulder==1){
                        var img=ojal_imgs+'/shoulder/'+thread_id+'.png';
                        jQuery('.front .btn_ojal .shoulder').attr('src',img);
                    }else{
                        jQuery('.front .btn_ojal .body').attr('src',blank_image);
                    }
                    if(pos_closuer=='boton'){
                        var img=ojal_imgs+'/body/'+thread_id+'_'+pos_style+'_boton_'+pos_clouser_type+'.png';
                        jQuery('.front .btn_ojal .body').attr('src',img);
                    }else{
                        jQuery('.front .btn_ojal .body').attr('src',blank_image);
                    }
            } 
     });
    
    
    jQuery(document).on('change','input[name=wca_embroidery_text]',function(){
        jQuery('.text_uper').html(jQuery(this).val());
    });
            
    jQuery(document).on('click','.wca_embroidary_color a img',function(){
         var embrodary_color=jQuery(this).data('rel');
         jQuery('.text_uper').css('color',$embroidary_color[embrodary_color]);
        
    });
    
    jQuery(document).on('click','.wca_embroidary_fonts input',function(){
         var embrodary_font=jQuery('input[name=wca_trenchcoat_embroidery_fornt]:checked').val();
         jQuery('.text_uper').css('font-family',$embroidary_fonts[embrodary_font]);
        
    });
    /*END step 3 JS*/
    
    
    
    
    
    
});
