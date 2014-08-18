<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style type="text/css">
    #img_ojal_hilo div.hilo{
        background: url("<?php echo $man_url ?>/extras/hilo_ojal/hilos.png") no-repeat left top ;
        z-index: 40;
    }
    #img_ojal_hilo div.ojal{
      background: url("<?php echo $man_url ?>/extras/hilo_ojal/ojales.png") no-repeat scroll left top rgba(0, 0, 0, 0);
      z-index: 20;
    }
</style>
<h3 class="main_titel_list">Custom Trench Coat / <span class="sub-titel">Step 3: Add your personal touch</span></h3><br>
<div class="form-group">
    <label for="inputEmail3" class="control-label">Customize Trench Coat Lining <span>(+12,95€)</span></label>
    <div class="clearfix">
        <div class="radio">
            <label>
                <input type="radio" value="" name="wca_trenchcoat_back_lapel" > Color by default
            </label>
            <div class="clearfix"></div>
            <label>
                <input type="radio" value="" name="wca_trenchcoat_back_lapel" > Custom color (+12,95) 
            </label>		       
        </div>		      
    </div>
</div>
<div class="form-group">
    <a href="#"><img src="<?php echo $man_url ?>/forros_interior.jpg"></a>
</div>
<div class="form-group">
    <div class="heading_main">
        <h2 toggle="Add_Embroidery" class="arrow_toggle">Add Embroidery<span>(+9,95€)</span></h2>
        <a class="delete" href="#">Delete</a>
    </div>
    <div class="category_main_box clearfix Add_Embroidery">
        <div class="clearfix">
            <div class="radio">
                <label>
                    <input type="radio" value="" name="wca_trenchcoat_back_lapel" > Color by default
                </label>
                <div class="clearfix"></div>
                <label>
                    <input type="radio" value="" name="wca_trenchcoat_back_lapel" > Custom color (+12,95€) 
                </label>		       
            </div>		      
        </div>
        <div class="clearfix">
            <a href="#"><img src="<?php echo $man_url ?>/forros_interior.jpg"></a>
        </div>	
    </div>	
</div>
<div class="form-group">
    <div class="heading_main">
        <h2 toggle="Neck_Lining" class="arrow_toggle">Neck Lining<span>(+3,50€)</span></h2>
        <a class="delete" href="#">Delete</a>
    </div>
    <div class="category_main_box clearfix Neck_Lining">
        <div class="clearfix">
            <div class="radio">
                <label>
                    <input type="radio" value="0" name="wca_trenchcoat_neck_lapel" > Color by default
                </label>
                <div class="clearfix"></div>
                <label>
                    <input type="radio" value="1" name="wca_trenchcoat_neck_lapel" > Custom color (+3,50€) 
                </label>		       
            </div>		      
        </div>
        <div class="clearfix">
            <input type="hidden" name="neck_lining" value="">
            <div color="beige" rel="1" href="javascript:;" class="color_selecter">
                <a img_index="0" href="javascript:;" class="box_color color_item" layer="neck_lining">
                    <div class="active"></div>
                    <img src="<?php echo $man_url ?>/neck_lining/1.jpg" class="color">
                </a>
            </div>
            <div color="roja" rel="2" href="javascript:;" class="color_selecter">
                <a img_index="1" href="javascript:;" class="box_color color_item" layer="neck_lining">			
                    <img src="<?php echo $man_url ?>/neck_lining/2.jpg" class="color">
                </a>
            </div>
            <div color="gris" rel="3" href="javascript:;" class="color_selecter">
                <a img_index="2" href="javascript:;" class="box_color color_item" layer="neck_lining">
                    <img src="<?php echo $man_url ?>/neck_lining/3.jpg" class="color">
                </a>
            </div>
            <div color="azul" rel="4" href="javascript:;" class="color_selecter">
                <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                    <img src="<?php echo $man_url ?>/neck_lining/4.jpg" class="color">
                </a>
            </div>
            <div color="negro" rel="5" href="javascript:;" class="color_selecter">
                <a img_index="4" href="javascript:;" class="box_color color_item" layer="neck_lining">
                    <img src="<?php echo $man_url ?>/neck_lining/5.jpg" class="color">
                </a>
            </div>
            <div color="blanco" rel="6" href="javascript:;" class="color_selecter">
                <a img_index="5" href="javascript:;" class="box_color color_item" layer="neck_lining">
                    <img src="<?php echo $man_url ?>/neck_lining/6.jpg" class="color">
                </a>
            </div>
        </div>	
    </div>	
</div>
<div class="form-group">
    <div class="heading_main">
        <h2 toggle="elbow_patches" class="arrow_toggle">Add elbow patches<span>(+12,95€)</span></h2>
        <a class="delete" href="#">Delete</a>
    </div>
    <div class="category_main_box clearfix elbow_patches">
        <div class="clearfix">
            <div class="radio">
                <label>
                    <input type="radio" value="" name="wca_trenchcoat_back_lapel" > No elbow patches 
                </label>
                <div class="clearfix"></div>
                <label>
                    <input type="radio" value="" name="wca_trenchcoat_back_lapel" > Add elbow patches (+12,95€)  
                </label>		       
            </div>		      
        </div>
        <div class="clearfix">
            <div rel="1" href="javascript:;" class="color_selecter">
                <a img_index="0" href="javascript:;" class="box_color color_item" layer="neck_lining">
                    <div class="active"></div>
                    <img src="<?php echo $man_url ?>/patches/55.jpg" class="color">
                </a>
            </div>
            <div rel="2" href="javascript:;" class="color_selecter">
                <a img_index="1" href="javascript:;" class="box_color color_item" layer="neck_lining">			
                    <img src="<?php echo $man_url ?>/patches/56.jpg" class="color">
                </a>
            </div>
            <div rel="3" href="javascript:;" class="color_selecter">
                <a img_index="2" href="javascript:;" class="box_color color_item" layer="neck_lining">
                    <img src="<?php echo $man_url ?>/patches/57.jpg" class="color">
                </a>
            </div>
            <div rel="4" href="javascript:;" class="color_selecter">
                <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                    <img src="<?php echo $man_url ?>/patches/58.jpg" class="color">
                </a>
            </div>									
        </div>	
    </div>	
</div>
<div class="form-group">
    <div class="heading_main">
        <h2 toggle="button_holes" class="arrow_toggle">Add colored button holes / threads<span>(+3,50€)</span></h2>
        <a class="delete" href="#">Delete</a>
    </div>
    <div class="category_main_box clearfix button_holes">
        <div id="img_ojal_hilo">
            <div style="background: url(<?php echo $image_fabric_url ?>/extra/btn_back.jpg) no-repeat left top" class="fabric"></div>
            <div class="ojal"></div>
            <div style="background: url(<?php echo $man_url ?>/extras/hilo_ojal/btn_1.png) no-repeat scroll left top" class="boton"></div>
            <div class="hilo "></div>
        </div>
        <div class="side_hoel_seletor">
            <label class="label_normal">Button threads</label>
            <div class="clearfix">
                <div rel="1" href="javascript:;" class="color_selecter">
                    <a img_index="0" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/9.jpg" class="color">
                    </a>
                </div>
                <div rel="2" href="javascript:;" class="color_selecter">
                    <a img_index="1" href="javascript:;" class="box_color color_item" layer="neck_lining">			
                        <img src="<?php echo $man_url ?>/extras/colors/11.jpg" class="color">
                    </a>
                </div>
                <div rel="3" href="javascript:;" class="color_selecter">
                    <a img_index="2" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/12.jpg" class="color">
                    </a>
                </div>
                <div rel="4" href="javascript:;" class="color_selecter">
                    <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/13.jpg" class="color">
                    </a>
                </div>	
                <div rel="4" href="javascript:;" class="color_selecter">
                    <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/14.jpg" class="color">
                    </a>
                </div>	
                <div rel="4" href="javascript:;" class="color_selecter">
                    <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/16.jpg" class="color">
                    </a>
                </div>
                <div rel="4" href="javascript:;" class="color_selecter">
                    <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/17.jpg" class="color">
                    </a>
                </div>
                <div rel="4" href="javascript:;" class="color_selecter">
                    <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/18.jpg" class="color">
                    </a>
                </div>
                <div rel="4" href="javascript:;" class="color_selecter">
                    <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/19.jpg" class="color">
                    </a>
                </div>
                <div rel="4" href="javascript:;" class="color_selecter">
                    <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/25.jpg" class="color">
                    </a>
                </div>														
            </div>
            <label class="label_normal">Button hoels</label>
            <div class="clearfix">
                <div rel="1" href="javascript:;" class="color_selecter">
                    <a img_index="0" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/9.jpg" class="color">
                    </a>
                </div>
                <div rel="2" href="javascript:;" class="color_selecter">
                    <a img_index="1" href="javascript:;" class="box_color color_item" layer="neck_lining">			
                        <img src="<?php echo $man_url ?>/extras/colors/11.jpg" class="color">
                    </a>
                </div>
                <div rel="3" href="javascript:;" class="color_selecter">
                    <a img_index="2" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/12.jpg" class="color">
                    </a>
                </div>
                <div rel="4" href="javascript:;" class="color_selecter">
                    <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/13.jpg" class="color">
                    </a>
                </div>	
                <div rel="4" href="javascript:;" class="color_selecter">
                    <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/14.jpg" class="color">
                    </a>
                </div>	
                <div rel="4" href="javascript:;" class="color_selecter">
                    <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/16.jpg" class="color">
                    </a>
                </div>
                <div rel="4" href="javascript:;" class="color_selecter">
                    <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/17.jpg" class="color">
                    </a>
                </div>
                <div rel="4" href="javascript:;" class="color_selecter">
                    <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/18.jpg" class="color">
                    </a>
                </div>
                <div rel="4" href="javascript:;" class="color_selecter">
                    <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/19.jpg" class="color">
                    </a>
                </div>
                <div rel="4" href="javascript:;" class="color_selecter">
                    <a img_index="3" href="javascript:;" class="box_color color_item" layer="neck_lining">
                        <img src="<?php echo $man_url ?>/extras/colors/25.jpg" class="color">
                    </a>
                </div>														
            </div>
        </div>	
    </div>	
</div>
