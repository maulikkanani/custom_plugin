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

<h3 class="main_titel_list">Custom Trench Coat / <span class="sub-titel">Step 3: Add your personal touch</span></h3><br>
<div class="form-group" id="main_interior">
    <div class="heading_main">
        <h2 toggle="Add_Interior" class="arrow_toggle">Customize Trench Coat Lining <span>(+12,95€)</span>
                    <a class="delete" href="javascript:;">Delete</a>
        </h2>
    </div>
    <div class="category_main_box clearfix Add_Interior">
    <div class="clearfix">
        <div class="radio">
            <label>
                <input type="radio" value="0" name="wca_trenchcoat_interior_type" > Color by default
            </label>
            <div class="clearfix"></div>
            <label>
                <input type="radio" value="1" name="wca_trenchcoat_interior_type" > Custom color (+12,95) 
            </label>		       
        </div>		      
    </div>
        <input type="hidden" name="wca_trenchcoat_interior" value="">
            <a href="#"><img src="<?php echo $man_url ?>/forros_interior.jpg"></a>
    </div>  
</div>
<div class="form-group">
</div>
<div class="form-group" id="main_embroidery">
    <div class="heading_main">
        <h2 toggle="Add_Embroidery" class="arrow_toggle">Add Embroidery<span>(+9,95€)</span>
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
<div class="form-group" id="main_neck_lapel">
    <div class="heading_main">
        <h2 toggle="Neck_Lining" class="arrow_toggle">Neck Lining<span>(+3,50€)</span>
        <a class="delete" href="javascript:;">Delete</a></h2>
        
    </div>
    <div class="category_main_box clearfix Neck_Lining">
        <div class="clearfix">
            <div class="radio attr-back">
                <label>
                    <input type="radio" value="0" name="wca_trenchcoat_neck_lapel" class="extra_item"> Color by default
                </label>
                <div class="clearfix"></div>
                <label>
                    <input type="radio" value="1" name="wca_trenchcoat_neck_lapel" class="extra_item"> Custom color (+3,50€) 
                </label>		       
            </div>		      
        </div>
        <div class="clearfix attr-back">
            <input type="hidden" name="neck_lining" value="">
            <div href="javascript:;" class="color_selecter neck_lining">
                <a img_index="0" href="javascript:;" class="box_color color_item" >
                    <div class="active"></div>
                    <img src="<?php echo $man_url ?>/neck_lining/1.jpg" class="color" data-rel="1" >
                </a>
            </div>
            <div  href="javascript:;" class="color_selecter neck_lining">
                <a img_index="1" href="javascript:;" class="box_color color_item" >			
                    <img src="<?php echo $man_url ?>/neck_lining/2.jpg" class="color" data-rel="2" >
                </a>
            </div>
            <div href="javascript:;" class="color_selecter neck_lining">
                <a img_index="2" href="javascript:;" class="box_color color_item" >
                    <img src="<?php echo $man_url ?>/neck_lining/3.jpg" class="color" data-rel="3" >
                </a>
            </div>
            <div href="javascript:;" class="color_selecter neck_lining">
                <a img_index="3" href="javascript:;" class="box_color color_item" >
                    <img src="<?php echo $man_url ?>/neck_lining/4.jpg" class="color" data-rel="4" >
                </a>
            </div>
            <div  href="javascript:;" class="color_selecter neck_lining">
                <a img_index="4" href="javascript:;" class="box_color color_item" >
                    <img src="<?php echo $man_url ?>/neck_lining/5.jpg" class="color" data-rel="5" >
                </a>
            </div>
            <div href="javascript:;" class="color_selecter neck_lining">
                <a img_index="5" href="javascript:;" class="box_color color_item" >
                    <img src="<?php echo $man_url ?>/neck_lining/6.jpg" class="color" data-rel="6" >
                </a>
            </div>
        </div>	
    </div>	
</div>
<div class="form-group" id="main_elbow_patch">
    <div class="heading_main">
        <h2 toggle="elbow_patches" class="arrow_toggle">Add elbow patches<span>(+12,95€)</span>
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
                    <input type="radio" value="1" name="wca_trenchcoat_elbow_patch" class="extra_item"> Add elbow patches (+12,95€)  
                </label>		       
            </div>		      
        </div>
        <div class="clearfix attr-back">
            <input type="hidden" name="elbow_patch" value="">
            <div  href="javascript:;" class="color_selecter back_lables elbow_patch">
                <a href="javascript:;" class="box_color color_item">
                    <div class="active"></div>
                    <img src="<?php echo $man_url ?>/patches/55.jpg" class="color" data-rel="1">
                </a>
            </div>
            <div  href="javascript:;" class="color_selecter back_lables elbow_patch">
                <a href="javascript:;" class="box_color color_item">			
                    <img src="<?php echo $man_url ?>/patches/56.jpg" class="color" data-rel="2">
                </a>
            </div>
            <div href="javascript:;" class="color_selecter back_lables elbow_patch">
                <a href="javascript:;" class="box_color color_item" >
                    <img src="<?php echo $man_url ?>/patches/57.jpg" class="color" data-rel="3">
                </a>
            </div>
            <div href="javascript:;" class="color_selecter back_lables elbow_patch">
                <a href="javascript:;" class="box_color color_item" >
                    <img src="<?php echo $man_url ?>/patches/58.jpg" class="color" data-rel="4">
                </a>
            </div>									
        </div>	
    </div>	
</div>
<div class="form-group" id="main_buton_thread">
    <div class="heading_main">
        <h2 toggle="button_holes" class="arrow_toggle">Add colored button holes / threads<span>(+3,50€)</span>
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
            <div style="background: url(<?php echo $image_fabric_url ?>/big.jpg) no-repeat left top" class="fabric"></div>
            <div class="hilo" style="background: url(<?php echo $man_url ?>/extras/hilos/1.png)"></div>
            <div style="background: url(<?php echo $man_url ?>/extras/hilo_ojal/btn_1.png) no-repeat scroll left top" class="boton"></div>
            <div class="ojal" style="background: url(<?php echo $man_url ?>/extras/ojales/4.png)"></div>
        </div>
        <div class="side_hoel_seletor attr-front">
            <label class="label_normal">Button threads</label>
            <div class="clearfix">
                <div href="javascript:;" class="color_selecter wca_buton_thread">
                    <a img_index="0" href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/9.jpg" data-rel="1" class="color">
                    </a>
                </div>
                <div href="javascript:;" class="color_selecter wca_buton_thread">
                    <a img_index="1" href="javascript:;" class="box_color color_item" >			
                        <img src="<?php echo $man_url ?>/extras/colors/11.jpg" data-rel="2" class="color">
                    </a>
                </div>
                <div href="javascript:;" class="color_selecter wca_buton_thread">
                    <a img_index="2" href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/12.jpg" data-rel="3" class="color">
                    </a>
                </div>
                <div href="javascript:;" class="color_selecter wca_buton_thread">
                    <a img_index="3" href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/13.jpg" data-rel="4" class="color">
                    </a>
                </div>	
                <div href="javascript:;" class="color_selecter wca_buton_thread">
                    <a img_index="3" href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/14.jpg" data-rel="5" class="color">
                    </a>
                </div>	
                <div href="javascript:;" class="color_selecter wca_buton_thread">
                    <a img_index="3" href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/16.jpg" data-rel="6" class="color">
                    </a>
                </div>
                <div href="javascript:;" class="color_selecter wca_buton_thread">
                    <a img_index="3" href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/17.jpg" data-rel="7" class="color">
                    </a>
                </div>
                <div href="javascript:;" class="color_selecter wca_buton_thread">
                    <a img_index="3" href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/18.jpg" data-rel="8" class="color">
                    </a>
                </div>
                <div href="javascript:;" class="color_selecter wca_buton_thread">
                    <a img_index="3" href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/19.jpg" data-rel="9" class="color">
                    </a>
                </div>
                <div href="javascript:;" class="color_selecter wca_buton_thread">
                    <a href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/25.jpg" data-rel="10" class="color">
                    </a>
                </div>														
            </div>
            <label class="label_normal">Button hoels</label>
            <div class="clearfix">
                <div href="javascript:;" class="color_selecter wca_buton_hole_thread">
                    <a href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/9.jpg" data-rel="1" class="color">
                    </a>
                </div>
                <div href="javascript:;" class="color_selecter  wca_buton_hole_thread">
                    <a href="javascript:;" class="box_color color_item" >			
                        <img src="<?php echo $man_url ?>/extras/colors/11.jpg" data-rel="2" class="color">
                    </a>
                </div>
                <div href="javascript:;" class="color_selecter  wca_buton_hole_thread">
                    <a href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/12.jpg" data-rel="3" class="color">
                    </a>
                </div>
                <div href="javascript:;" class="color_selecter wca_buton_hole_thread">
                    <a href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/13.jpg" data-rel="4" class="color">
                    </a>
                </div>	
                <div href="javascript:;" class="color_selecter wca_buton_hole_thread">
                    <a href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/14.jpg" data-rel="5" class="color">
                    </a>
                </div>	
                <div href="javascript:;" class="color_selecter wca_buton_hole_thread">
                    <a href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/16.jpg" data-rel="6" class="color">
                    </a>
                </div>
                <div href="javascript:;" class="color_selecter wca_buton_hole_thread">
                    <a href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/17.jpg" data-rel="7" class="color">
                    </a>
                </div>
                <div href="javascript:;" class="color_selecter wca_buton_hole_thread">
                    <a href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/18.jpg" data-rel="8" class="color">
                    </a>
                </div>
                <div href="javascript:;" class="color_selecter wca_buton_hole_thread">
                    <a href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/19.jpg" data-rel="9" class="color">
                    </a>
                </div>
                <div href="javascript:;" class="color_selecter wca_buton_hole_thread">
                    <a href="javascript:;" class="box_color color_item" >
                        <img src="<?php echo $man_url ?>/extras/colors/25.jpg" data-rel="10" class="color">
                    </a>
                </div>														
            </div>
        </div>	
    </div>	
</div>
