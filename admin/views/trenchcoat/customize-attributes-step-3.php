<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style type="text/css">
    #img_ojal_hilo div.hilo{
        /*background: url("<?php echo $man_url ?>/extras/hilo_ojal/hilos.png") no-repeat left top ;*/
        z-index: 40;
    }
    #img_ojal_hilo div.ojal{
        /*background: url("<?php echo $man_url ?>/extras/hilo_ojal/ojales.png") no-repeat scroll left top rgba(0, 0, 0, 0);*/
        z-index: 20;
    }
</style>

<!-- Start for linings -->

<h3 class="main_titel_list">Custom Trench Coat / <span class="sub-titel">Step 3: Add your personal touch</span></h3><br>
<div class="form-group" id="main_interior">
    <div class="heading_main attr-front">
        <h2 toggle="Add_Interior" class="arrow_toggle">Customize Trench Coat Lining <span>(+12,95)</span>
            <a class="delete" href="javascript:;">Delete</a>
        </h2>
    </div>
    <div class="category_main_box clearfix Add_Interior">
        <div class="clearfix">
            <div class="radio attr-front">
                <label>
                    <input type="radio" value="0" name="wca_trenchcoat_interior_type" class="linings"> Color by default
                </label>
                <div class="clearfix"></div>
                <label>
                    <input type="radio" value="1" name="wca_trenchcoat_interior_type" class="linings"> Custom color (+12,95) 
                </label>		       
            </div>		      
        </div>

        <a href="javascript:;"><img src="<?php echo $man_url ?>/forros_interior.jpg" class="linings_img"></a>
        <div id="interriors" style="display:none"> 
            <input type="hidden" name="wca_trenchcoat_interior" value="">
            <div class="info_fabric" style="width:72%">
                <div class="pull-right" style="rgin-right:38px;">
                    <b>Material</b>: <span id="lining_material"></span>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="preview_fabric_3d_common">
                <div class="preview linig-background" style="width:73%; background: url(<?php echo $image_category . '/linings/' . $lining_fabric ?>/big.jpg) no-repeat scroll right top transparent;"> </div>
            </div>
            <div class="main_slider">
                <div class="bottom_all_patten_main">
                    <div class="customNavigation">
                        <a class="btn prev">Previous</a>
                        <a class="btn next">Next</a>                                        
                    </div>     
                    
                        <!-- Start :- this loop is with knockout js "LiningModel"    -->
                       <div id="owl-demo" class="owl-carousel owl-theme" data-bind="foreach:lining">
                            <div class="item">
                                <div class="fabric_box_3d lining_change attr-front" data-bind="attr: { 'data-rel': fabric_id }" >
                                    <div class="image trenchcoat_lining" data-bind="style: { background: backgroud_url}">
                                        <a href="javascript:;"></a>
                                    </div> 
                                    <div class="detail_of_fabric">
                                        <a href="#" data-bind="text: titel"></a>
                                        <span class="price" data-bind="text: price"></span>
                                    </div>                                       
                                </div>
                            </div>
                        </div>
                        <!-- End :- this loop is with knockout js "LiningModel"    --> 
                  
                </div>
            </div>

        </div>
    </div>


</div>
<!-- End  for linings -->

<!-- Start for Embroidery texts -->

<div class="form-group" id="main_embroidery">
    <div class="heading_main">
        <h2 toggle="Add_Embroidery" class="arrow_toggle">Add Embroidery<span>(+9,95)</span>
            <a class="delete" href="javascript:;">Delete</a>
        </h2>
    </div>




    <div class="category_main_box clearfix Add_Embroidery">
        <div class="side_main_img" style="background:url(<?php echo $man_url ?>/initials/interior_coat.jpg) no-repeat;">
            <div class="text_uper"></div>
        </div>
        <div class="side_radio">
            <label class="label_normal">Font</label>
            <div class="main_font-seletor wca_embroidary_fonts">
                <label>
                    <input type="radio" value="1" name="wca_trenchcoat_embroidery_font" data-rel="1"><img src="<?php echo $man_url ?>/initials/19.png">
                </label>
                <div class="clearfix"></div>
                <label>
                    <input type="radio" value="2" name="wca_trenchcoat_embroidery_font" data-rel="2"> <img src="<?php echo $man_url ?>/initials/24.png"> 
                </label>
                <div class="clearfix"></div>
                <label>
                    <input type="radio" value="3" name="wca_trenchcoat_embroidery_font" data-rel="3"> <img src="<?php echo $man_url ?>/initials/74.png"> 
                </label>
                <div class="clearfix"></div>
                <label>
                    <input type="radio" value="4" name="wca_trenchcoat_embroidery_font" data-rel="4"> <img src="<?php echo $man_url ?>/initials/77.png"> 
                </label>		       
            </div>		      
        </div>	
        <div class="clearfix"></div>
        <div class="custom_bottom_part">
            <div class="text_type_part">
                <label>Type Your Initials</label>
                <input type="hidden" name="wca_embroidery" value="0">
                <input type="text" name="wca_embroidery_text" value=""  class="form-group">
            </div>
            <div class="clearfix"></div>
            <label class="label_normal">Monogram Thread Color</label>
            <div class="clearfix monogram_thread">
                <input type="hidden" name="wca_embroidary_color" value="">
                <div class="color_selecter wca_embroidary_color" href="javascript:;">
                    <div class="active_arrow"></div>
                    <a  class="box_color color_item" href="javascript:;">
                        <img class="color" src="<?php echo $man_url ?>/extras/colors/9.jpg" data-rel="1">
                    </a>
                </div>
                <div class="color_selecter wca_embroidary_color" href="javascript:;">
                    <a  class="box_color color_item" href="javascript:;">			
                        <img class="color" src="<?php echo $man_url ?>/extras/colors/11.jpg" data-rel="2">
                    </a>
                </div>
                <div class="color_selecter wca_embroidary_color" href="javascript:;">
                    <a  class="box_color color_item" href="javascript:;">
                        <img class="color" src="<?php echo $man_url ?>/extras/colors/12.jpg" data-rel="3">
                    </a>
                </div>
                <div class="color_selecter wca_embroidary_color" href="javascript:;">
                    <a  class="box_color color_item" href="javascript:;">
                        <img class="color" src="<?php echo $man_url ?>/extras/colors/13.jpg" data-rel="4">
                    </a>
                </div>	
                <div class="color_selecter wca_embroidary_color" href="javascript:;">
                    <a  class="box_color color_item" href="javascript:;">
                        <img class="color" src="<?php echo $man_url ?>/extras/colors/14.jpg" data-rel="5">
                    </a>
                </div>	
                <div class="color_selecter wca_embroidary_color" href="javascript:;">
                    <a  class="box_color color_item" href="javascript:;">
                        <img class="color" src="<?php echo $man_url ?>/extras/colors/16.jpg" data-rel="6">
                    </a>
                </div>
                <div class="color_selecter wca_embroidary_color" href="javascript:;">
                    <a  class="box_color color_item" href="javascript:;">
                        <img class="color" src="<?php echo $man_url ?>/extras/colors/17.jpg" data-rel="7">
                    </a>
                </div>
                <div class="color_selecter wca_embroidary_color" href="javascript:;">
                    <a  class="box_color color_item" href="javascript:;">
                        <img class="color" src="<?php echo $man_url ?>/extras/colors/18.jpg" data-rel="8">
                    </a>
                </div>
                <div class="color_selecter wca_embroidary_color" href="javascript:;">
                    <a  class="box_color color_item" href="javascript:;">
                        <img class="color" src="<?php echo $man_url ?>/extras/colors/19.jpg"  data-rel="9">
                    </a>
                </div>
                <div class="color_selecter wca_embroidary_color" href="javascript:;">
                    <a  class="box_color color_item" href="javascript:;">
                        <img class="color" src="<?php echo $man_url ?>/extras/colors/25.jpg" data-rel="10">
                    </a>
                </div>														
            </div>
        </div> 
    </div>


</div>
<!-- End for Embroidery texts -->

<!-- Start for neck linig -->
<div class="form-group" id="main_neck_lapel">
    <div class="heading_main">
        <h2 toggle="Neck_Lining" class="arrow_toggle">Neck Lining<span>(+3,50)</span>
            <a class="delete" href="javascript:;">Delete</a></h2>

    </div>
    <div class="category_main_box clearfix Neck_Lining wca_Neck_Lining">
        <div class="clearfix">
            <div class="radio attr-back">
                <label>
                    <input type="radio" value="0" name="wca_trenchcoat_neck_lapel" class="extra_item"> Color by default
                </label>
                <div class="clearfix"></div>
                <label>
                    <input type="radio" value="1" name="wca_trenchcoat_neck_lapel" class="extra_item"> Custom color (+3,50) 
                </label>		       
            </div>		      
        </div>
        <div class="clearfix attr-back">
            <input type="hidden" name="wca_neck_lining" value="">
            <?php foreach($neck_linings as $neck_lining){ ?>
                <div href="javascript:;" class="color_selecter wca_neck_lining">
                    <a href="javascript:;" class="box_color color_item">			
                        <img src="<?php echo $image_category.'/neck_lining/'.$neck_lining->id.'/neck_lining_icon.jpg' ?>" class="color" data-rel="<?php echo $neck_lining->id; ?>">
                    </a>
                </div>
            <?php  } ?>
        </div>	
    </div>	
</div>
<!-- End for neck linig -->

<!-- Start for neck elbow pacthes -->
<div class="form-group" id="main_elbow_patch">
    <div class="heading_main">
        <h2 toggle="elbow_patches" class="arrow_toggle">Add elbow patches<span>(+12,95)</span>
            <a class="delete" href="javascript:;">Delete</a></h2>
    </div>
    <div class="category_main_box clearfix elbow_patches">
        <div class="clearfix">
            <div class="radio attr-back">
                <label>
                    <input type="radio" value="0" name="wca_trenchcoat_elbow_patch" class="extra_item"> No elbow patches 
                </label>
                <div class="clearfix"></div>
                <label>
                    <input type="radio" value="1" name="wca_trenchcoat_elbow_patch" class="extra_item"> Add elbow patches (+12,95)  
                </label>		       
            </div>		      
        </div>
        <div class="clearfix attr-back">
            <input type="hidden" name="wca_elbow_patch" value="">
            <?php foreach($elbow_patches as $elbow_patche){ ?>
                <div  href="javascript:;" class="color_selecter back_lables wca_elbow_patch">
                    <a href="javascript:;" class="box_color color_item">			
                        <img src="<?php echo $image_category.'/patches/'.$elbow_patche->id.'/elbow_patches_icon.jpg' ?>" class="color" data-rel="<?php echo $elbow_patche->id; ?>">
                    </a>
                </div>
            <?php  } ?>									
        </div>	
    </div>	
</div>
<!-- End for neck elbow pacthes -->

<!-- Start for button thread and button hole  -->
<div class="form-group" id="main_buton_thread">
    <div class="heading_main">
        <h2 toggle="button_holes" class="arrow_toggle">Add colored button holes / threads<span>(+3,50)</span>
            <a class="delete" href="javascript:;">Delete</a></h2>
    </div>

    <div class="category_main_box clearfix button_holes">
        <div id="thread_appy" class="attr-fron" style="display:none">
            <label>
                <input name="wca_trenchcoat_btn_thread_apply" value="all" type="radio">
                All
            </label>
            <label>
                <input name="wca_trenchcoat_btn_thread_apply" value="cuff"  type="radio">
                Cuffs only
            </label>
        </div>
        <input type="hidden" value="0" name="wca_buton_thread">
        <input type="hidden" value="0" name="wca_buton_hole_thread">
        <div id="img_ojal_hilo">
            <div style="background: url(<?php echo $image_fabric_url ?>/big.jpg) no-repeat left top" class="fabric fabric-background"></div>
            <div class="hilo" style="background: url(<?php echo $image_category ?>/hilo/0/hilo.png)"></div>
            <div style="background: url(<?php echo $button_url ?>/big.jpg) no-repeat scroll left top" class="boton boton-background"></div>
            <div class="ojal" style="background: url(<?php echo $image_category ?>/ojal/0/ojal.png)"></div>
        </div>
        <div class="side_hoel_seletor attr-front">
            
            <label class="label_normal">Button threads</label>
            <div class="clearfix">
                <?php foreach($button_threads as $button_thread){?>
                <div href="javascript:;" class="color_selecter wca_buton_thread">
                    <a img_index="0" href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $image_category.'/hilo/'.$button_thread->id ?>/hilo_icon.jpg" data-rel="<?php echo $button_thread->id ?>" class="color">
                    </a>
                </div>
                <?php }?>														
            </div>
            
            <label class="label_normal">Button hoels</label>
            <div class="clearfix">
                
                <?php foreach($button_holes as $button_hole){?>
                <div href="javascript:;" class="color_selecter wca_buton_hole_thread">
                    <a img_index="0" href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $image_category.'/ojal/'.$button_hole->id ?>/ojal_icon.jpg" data-rel="<?php echo $button_hole->id ?>" class="color">
                    </a>
                </div>
                <?php }?>
                												
            </div>
        </div>	
    </div>	
</div>

<!-- End for button thread and button hole  -->
