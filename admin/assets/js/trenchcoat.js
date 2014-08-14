jQuery(document).ready(function(){
  
    jQuery(document).on('click','.subshow',function(){
       $main_sub_class=jQuery('.'+ jQuery(this).attr('name'));
       $main_sub_class.removeClass('hide');
       $main_sub_class.hide();
       $show_sub=jQuery('.'+ jQuery(this).data('sh'));
       $show_sub.show();
    });
   
    jQuery(document).on('click','.box_part img',function(){
       jQuery('.boxpart_active').removeClass('boxpart_active');
       jQuery(this).addClass('boxpart_active');
   });
   
 
   jQuery(document).on('click','#wca_trenchcoat_style_crossed', function(){
      jQuery('input[name=wca_trenchcoat_closure_type_boton][value=hide]').attr('disabled','');
      jQuery('input[name=wca_trenchcoat_closure_type_boton][value=standard]').attr('checked','');
      jQuery('input[name=wca_trenchcoat_chest_pocket][value!=0]').attr('disabled','');
      jQuery('input[name=wca_trenchcoat_chest_pocket][value=0]').attr('checked','');
     
   });
   
   jQuery(document).on('click','#wca_trenchcoat_style_simple', function(){
      jQuery('input[name=wca_trenchcoat_chest_pocket][value!=0]').removeAttr('disabled');
      jQuery('input[name=wca_trenchcoat_closure_type_boton][value=hide]').removeAttr('disabled');
   });
   
   
   jQuery(document).on('click','.pos1',function(){
          jQuery(document).trigger("set-pos-1");
          jQuery(document).trigger("set-pos-4");
   });
   
   
   
   
   
    jQuery(document).on('click','#change_position',function(){
        if(jQuery(this).data('rel')=='front'){
            jQuery(this).data('rel','back');
            jQuery('.front').hide();
            jQuery('.back').show();
        }else{
            jQuery(this).data('rel','front');
            jQuery('.back').hide();
            jQuery('.front').show();
        }
        
    });
   
    jQuery(document).bind("set-pos-1", function() {
        var pos_style = jQuery('input[name=wca_trenchcoat_style]:checked').val();
        var pos_legth = jQuery('input[name=wca_trenchcoat_length]:checked').val();
        var pos_fit = jQuery('input[name=wca_trenchcoat_fit]:checked').val();
        var pos_closuer = jQuery('input[name=wca_trenchcoat_closure]:checked').val();
        var pos_clouser_type = jQuery('input[name=wca_trenchcoat_closure_type_boton]:checked').val();
        var pos_backcut = jQuery('input[name=wca_trenchcoat_backcut]:checked').val();
                        
        var front_image='body_'+pos_style+'_'+pos_closuer+'_'+pos_clouser_type+'_fit'+pos_fit+'_'+pos_legth+'.png';
        var back_image=pos_backcut+'_cortes_fit'+pos_fit+'_'+pos_legth+'.png';
        jQuery('.front .layer[pos=1] img').attr('src',image_front_url+'/'+front_image);
        jQuery('.back .layer[pos=1] img').attr('src',image_back_url+'/'+back_image);
    });
    
    jQuery(document).bind("set-pos-4", function() {
        var color = '1';
        var btn_style = jQuery('input[name=wca_trenchcoat_style]:checked').val();
        var closuer = jQuery('input[name=wca_trenchcoat_closure]:checked').val();
        var coat_legth = jQuery('input[name=wca_trenchcoat_length]:checked').val();
        var clouser_type='standard';
        if(btn_style=='simple'){
          clouser_type = jQuery('input[name=wca_trenchcoat_closure_type_boton]:checked').val();
        }  
       if(closuer=='boton'){
            var but_img=color+'_boton_body_'+btn_style+'_boton_'+clouser_type+'.png';
         }else{
            var but_img='mi_'+btn_style+'_zipper_'+clouser_type+'_'+coat_legth+'.png'; 
         }
         
        jQuery('.front .layer[pos=4] img').attr('src', button_url+'/'+but_img);
    
    });
   
    /*This is for change fabric :- Start*/
    jQuery('.layer img').each(function(){
           var replaced =  jQuery(this).attr('src').replace('currnt_fabric','new_fabric');
           jQuery(this).attr('src',replaced);
    });
     /*This is for change fabric :- End*/
});
