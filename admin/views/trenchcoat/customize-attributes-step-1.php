<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="clearfix">
            <div class="col-sm-12">
                <h3>Custom Trench Coat</h3>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Style:</label>
                        <div class="col-sm-10">
                            <div class="radio attr-front pos1 pos4">
                                <label>
                                    <input type="radio" name="wca_trenchcoat_style" value="simple" data-imgpos="1" id="wca_trenchcoat_style_simple" class="rel_enable"> Single breasted
                                     <input type="button" name="wca_trenchcoat_style_simple" class="wca_trenchcoat_attr_edit" value="edit"/>      
                                </label>
                                <label>
                                    <input type="radio" name="wca_trenchcoat_style" value="crossed" data-imgpos="1" id="wca_trenchcoat_style_crossed"  class="rel_deseable"> Double breasted
                                    <input type="button" name="wca_trenchcoat_style_crossed" class="wca_trenchcoat_attr_edit" value="edit"/>
                                </label>
                            </div>		      
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Coat length:</label>
                        <div class="col-sm-10">
                            <div class="radio attr-front pos1">
                                <label>
                                    <input id="wca_trenchcoat_length_short" type="radio" value="long" data-imgpos="1" name="wca_trenchcoat_length"> Long
                                </label>
                                <label>
                                    <input id="wca_trenchcoat_length_long" type="radio" value="short" data-imgpos="1" name="wca_trenchcoat_length"> Short
                                </label>
                            </div>		      
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Fit:</label>
                        <div class="col-sm-10">
                            <div class="radio attr-front pos1 pos2 pos5">
                                <label>
                                    <input type="radio" value="1" name="wca_trenchcoat_fit"> Waisted
                                </label>
                                <label>
                                    <input type="radio" value="0" name="wca_trenchcoat_fit"> Straight
                                </label>
                            </div>		      
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Fastening:</label>
                        <div class="col-sm-10">
                            <div class="radio attr-front pos1">
                                <label>
                                    <input type="radio" value="zipper" name="wca_trenchcoat_closure"> Zipper
                                </label>
                                <label>
                                    <input type="radio" value="boton" name="wca_trenchcoat_closure"> Buttons *
                                </label>
                            </div>		      
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Fastening type:</label>
                        <div class="col-sm-10">
                            <div class="radio attr-front pos1">
                                <label>
                                    <input type="radio" name="wca_trenchcoat_closure_type_boton" value="hide"> Hidden
                                </label>
                                <label>
                                    <input type="radio"  name="wca_trenchcoat_closure_type_boton" value="standard"> Standard *
                                </label>
                            </div>		      
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Pockets:</label>
                        <div class="col-sm-10">
                            <div class="radio attr-front ">
                                <label>
                                    <input type="radio" value="0" name="wca_trenchcoat_pockets" class="subshow" data-sh="trenchcoat_pockets_0"> No pockets
                                </label>
                                <label>
                                    <input type="radio" value="2" name="wca_trenchcoat_pockets" class="subshow" data-sh="trenchcoat_pockets_2"> 2 pockets
                                </label>
                                <label>
                                    <input type="radio" value="3" name="wca_trenchcoat_pockets" class="subshow" data-sh="trenchcoat_pockets_3"> 3 pockets
                                </label>
                            </div>
                            <div class="pocket_selected_main row col-sm-12">
                                <input id="hidden_trenchcoat_pockets" class="option_input" type="hidden" value="0" name="wca_trenchcoat_pockets_type">

                                <div class="trenchcoat_pockets_0 wca_trenchcoat_pockets" style="display: none"> 

                                </div>    

                                <div class="trenchcoat_pockets_2 wca_trenchcoat_pockets " style="display:none">   
                                    <div class="col-sm-3 pocket_modal_main" data-rel="1">
                                        <div class="box_part">
                                            <img src="<?php echo $man_url ?>/estilo/trenchcoat_pockets_1.png">
                                        </div>
                                        <div class="box_title"><p>Flaps</p></div>
                                    </div>

                                    <div class="col-sm-3 pocket_modal_main" data-rel="2">
                                        <div class="box_part">
                                            <img src="<?php echo $man_url ?>/estilo/trenchcoat_pockets_2.png">
                                        </div>
                                        <div class="box_title"><p>Double Welt</p></div>
                                    </div>
                                    <div class="col-sm-4 pocket_modal_main" data-rel="3">
                                        <div class="box_part">
                                            <img src="<?php echo $man_url ?>/estilo/trenchcoat_pockets_3.png">
                                        </div>
                                        <div class="box_title"><p>Patched</p></div>
                                    </div>
                                    <div class="col-sm-3 pocket_modal_main" data-rel="4">
                                        <div class="box_part">
                                            <img src="<?php echo $man_url ?>/estilo/trenchcoat_pockets_4.png">
                                        </div>
                                        <div class="box_title"><p>Diagonal</p></div>
                                    </div>
                                    <div class="col-sm-3 pocket_modal_main" data-rel="5">
                                        <div class="box_part">
                                            <img src="<?php echo $man_url ?>/estilo/trenchcoat_pockets_5.png">
                                        </div>
                                        <div class="box_title"><p>Diag. zipper</p></div>
                                    </div>
                                </div>
                                <div class="trenchcoat_pockets_3 wca_trenchcoat_pockets" style="display:none">   
                                    <div class="col-sm-3 pocket_modal_main" data-rel="6">
                                        <div class="box_part">
                                            <img src="<?php echo $man_url ?>/estilo/trenchcoat_pockets_1.png">
                                        </div>
                                        <div class="box_title"><p>Flaps</p></div>
                                    </div>
                                    <div class="col-sm-3 pocket_modal_main" data-rel="7">
                                        <div class="box_part">
                                            <img src="<?php echo $man_url ?>/estilo/trenchcoat_pockets_2.png">
                                        </div>
                                        <div class="box_title"><p>Double Welt</p></div>
                                    </div>
                                </div>
                            </div>		      
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Chest pocket:</label>
                        <div class="col-sm-10">
                            <div class="radio attr-front pos3">
                                <label>
                                    <input type="radio" value="0"  name="wca_trenchcoat_chest_pocket"> No
                                </label>
                                <label>
                                    <input type="radio" value="welt"  name="wca_trenchcoat_chest_pocket"> Welt
                                </label>
                                <label>
                                    <input type="radio" value="vertical" name="wca_trenchcoat_chest_pocket" > Vertical
                                </label>
                                <label>
                                    <input type="radio" value="zipper" name="wca_trenchcoat_chest_pocket" > Zipper
                                </label>
                                <label>
                                    <input type="radio" value="patched" name="wca_trenchcoat_chest_pocket" > Patched
                                </label>
                            </div>		      
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Belt:</label>
                        <div class="col-sm-10">
                            <div class="radio  attr-back pos5">
                                <label>
                                    <input type="radio" value="0"  name="wca_trenchcoat_belt" > No
                                </label>
                                <label>
                                    <input type="radio" value="sewing"  name="wca_trenchcoat_belt" id="trenchcoat_belt_sewing"> Sewed
                                </label>
                                <label>
                                    <input type="radio" value="loose" name="wca_trenchcoat_belt" id="trenchcoat_belt_loose"> Loose
                                </label>
                            </div>		      
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Back side:</label>
                        <div class="col-sm-10">
                            <div class="radio  attr-back pos1">
                                <label>
                                    <input type="radio" value="0" name="wca_trenchcoat_backcut" > Ventless
                                </label>
                                <label>
                                    <input type="radio" value="1" name="wca_trenchcoat_backcut" > Center vent
                                </label>
                                <label>
                                    <input type="radio" value="2" name="wca_trenchcoat_backcut" > Side vents
                                </label>
                            </div>		      
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Sleeves:</label>
                        <div class="col-sm-10">
                            <div class="radio attr-front pos7">
                                <label>
                                    <input type="radio" value="0" name="wca_trenchcoat_sleeve" > No
                                </label>
                                <label>
                                    <input type="radio" value="tape" name="wca_trenchcoat_sleeve" > Tape
                                </label>
                                <label>
                                    <input type="radio" value="button" name="wca_trenchcoat_sleeve" > Buttons
                                </label>
                            </div>		      
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Epaulettes:</label>
                        <div class="col-sm-10">
                            <div class="radio attr-front pos6">
                                <label>
                                    <input type="radio" value="0" name="wca_trenchcoat_shoulder" > No
                                </label>
                                <label>
                                    <input type="radio" value="1" name="wca_trenchcoat_shoulder" > With ribbon
                                </label>		       
                            </div>		      
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Back piece:</label>
                        <div class="col-sm-10">
                            <div class="radio attr-back bck_pos10">
                                <label>
                                    <input type="radio" value="0" name="wca_trenchcoat_back_lapel" > No
                                </label>
                                <label>
                                    <input type="radio" value="1" name="wca_trenchcoat_back_lapel" > Yes
                                </label>		       
                            </div>		      
                        </div>
                    </div>
            </div>
            <div class="col-sm-4">

            </div>
        </div>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('.wca_trenchcoat_attr_edit').on('click',function(){
       alert('hello');
    
    
    
});
});
</script>