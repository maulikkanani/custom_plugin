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
   
});
