<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<h3 class="main_titel_list">Custom Trench Coat / <span class="sub-titel">Step 2: Select a fabric</span></h3> <br>

<div class="clearfix">
    <!--    <div class="radio">
            <label>
                <input class="fabric_change" type="radio" value="1" name="wca_trenchcoat_fabric_type" > Cream
            </label>
            <div class="clearfix"></div>
            <label>
                <input class="fabric_change" type="radio" value="2" name="wca_trenchcoat_fabric_type" > Gray 
            </label>		       
            <div class="clearfix"></div>
            <label>
                <input class="fabric_change" type="radio" value="3" name="wca_trenchcoat_fabric_type" > Green 
            </label>		       
        </div>		      -->
</div>
<div class="bottom_all_patten_main">
     <div class="info_fabric">
        <div class="pull-right"><b>Ref</b>: <span id="fabric_ref"></span></div>
        <div class="pull-left">
            <b id="fabric_name"></b>
        </div>
    </div>
    <div class="preview_fabric_3d_common">
        <div class="preview fabric-background" style="background: url(<?php echo $image_category . '/fabric/' . $fabric ?>/big.jpg) no-repeat scroll right top transparent;"> </div>
    </div>
    <input type="hidden" value="" name="wca_trenchcoat_fabric_type" >
   
    <div id="slider_fabrics">
        <?php foreach ($all_fabric_data as $fabric_id => $fabic_single): ?>
            <div class="fabric_box_3d fabric_change"  data-rel="<?php echo $fabric_id ?>"  data-bind="click:change_linings">
                <div class="image trenchcoat_lining" style="background: url(<?php echo $image_category . '/fabric/' . $fabric_id ?>/big.jpg) top center no-repeat;">
                    <a href="javascript:;"></a>
                </div> 
                <div class="detail_of_fabric">
                    <a href="#"><?php echo $fabic_single['titel'] ?></a>
                    <span class="price"><?php echo $fabic_single['price'] ?></span>
                </div>                                       
            </div>
        <?php endforeach; ?>
    </div>    
</div>