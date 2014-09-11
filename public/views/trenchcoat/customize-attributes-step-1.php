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
                    <span class="wca_trenchcoat_style_simple">
                        <label>
                            <input type="radio" name="wca_trenchcoat_style" value="simple" data-imgpos="1" id="wca_trenchcoat_style_simple" class="rel_enable">  <?php echo wca_retrieve_label('wca_trenchcoat_style', 'simple'); ?> 
                        </label>

                    </span>
                    <span class="wca_trenchcoat_style_crossed">
                        <label>
                            <input type="radio" name="wca_trenchcoat_style" value="crossed" data-imgpos="1" id="wca_trenchcoat_style_crossed"  class="rel_deseable"><?php echo wca_retrieve_label('wca_trenchcoat_style', 'crossed'); ?>
                            <!--<input type="button" name="wca_trenchcoat_style_crossed" class="wca_trenchcoat_attr_edit" value="edit"/>-->
                        </label>

                    </span>
                </div>		      
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Coat length:</label>
            <div class="col-sm-10">
                <div class="radio attr-front pos1">
                    <span class="wca_trenchcoat_length_short">
                        <label>
                            <input id="wca_trenchcoat_length_short" type="radio" value="long" data-imgpos="1" name="wca_trenchcoat_length"><?php echo wca_retrieve_label('wca_trenchcoat_length', 'long'); ?>
                        </label>

                    </span>
                    <span class="wca_trenchcoat_length_long">
                        <label>
                            <input id="wca_trenchcoat_length_long" type="radio" value="short" data-imgpos="1" name="wca_trenchcoat_length"><?php echo wca_retrieve_label('wca_trenchcoat_length', 'short'); ?>
                        </label>

                    </span>
                </div>		      
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Fit:</label>
            <div class="col-sm-10">
                <div class="radio attr-front pos1 pos2 pos5">
                    <span class="wca_trenchcoat_fit_waisted">
                        <label>
                            <input type="radio" value="1" name="wca_trenchcoat_fit"><?php echo wca_retrieve_label('wca_trenchcoat_fit', '1'); ?>
                        </label>

                    </span>
                    <span class="wca_trenchcoat_fit_straight">
                        <label>
                            <input type="radio" value="0" name="wca_trenchcoat_fit"><?php echo wca_retrieve_label('wca_trenchcoat_fit', '0'); ?>
                        </label>

                    </span>
                </div>		      
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Fastening:</label>
            <div class="col-sm-10">
                <div class="radio attr-front pos1">
                    <span class="wca_trenchcoat_closure_zipper">
                        <label>
                            <input type="radio" value="zipper" name="wca_trenchcoat_closure"><?php echo wca_retrieve_label('wca_trenchcoat_closure', 'zipper'); ?>
                        </label>

                    </span>
                    <span class="wca_trenchcoat_closure_button">
                        <label>
                            <input type="radio" value="boton" name="wca_trenchcoat_closure"><?php echo wca_retrieve_label('wca_trenchcoat_closure', 'boton'); ?>
                        </label>

                    </span>
                </div>		      
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Fastening type:</label>
            <div class="col-sm-10">
                <div class="radio attr-front pos1">
                    <span class="wca_trenchcoat_closure_type_button">
                        <label>
                            <input type="radio" name="wca_trenchcoat_closure_type_boton" value="hide"><?php echo wca_retrieve_label('wca_trenchcoat_closure_type_boton', 'hide'); ?>
                        </label>

                    </span>
                    <span class="wca_trenchcoat_Fasteningtype_button">
                        <label>
                            <input type="radio"  name="wca_trenchcoat_closure_type_boton" value="standard"><?php echo wca_retrieve_label('wca_trenchcoat_closure_type_boton', 'standard'); ?>
                        </label>

                    </span>
                </div>		      
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Pockets:</label>
            <div class="col-sm-10">
                <div class="radio attr-front ">
                    <span class="wca_trenchcoat_pockets_0">
                        <label>
                            <input type="radio" value="0" name="wca_trenchcoat_pockets" class="subshow" data-sh="trenchcoat_pockets_0"><?php echo wca_retrieve_label('wca_trenchcoat_pockets', '0'); ?>
                        </label>

                    </span>
                    <span class="wca_trenchcoat_pockets_1">
                        <label>
                            <input type="radio" value="2" name="wca_trenchcoat_pockets" class="subshow" data-sh="trenchcoat_pockets_2"><?php echo wca_retrieve_label('wca_trenchcoat_pockets', '2'); ?>
                        </label>

                    </span>
                    <span class="wca_trenchcoat_pockets_2">
                        <label>
                            <input type="radio" value="3" name="wca_trenchcoat_pockets" class="subshow" data-sh="trenchcoat_pockets_3"><?php echo wca_retrieve_label('wca_trenchcoat_pockets', '3'); ?>
                        </label>

                    </span>
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
                    <span class="wca_trenchcoat_chest_pocket_0">
                        <label>
                            <input type="radio" value="0"  name="wca_trenchcoat_chest_pocket"> <?php echo wca_retrieve_label('wca_trenchcoat_chest_pocket', '0'); ?>
                        </label>

                        <span>
                            <span class="wca_trenchcoat_chest_pocket_welt">
                                <label>
                                    <input type="radio" value="welt"  name="wca_trenchcoat_chest_pocket"><?php echo wca_retrieve_label('wca_trenchcoat_chest_pocket', 'welt'); ?>
                                </label>

                            </span>
                            <span class="wca_trenchcoat_chest_pocket_vertical">
                                <label>
                                    <input type="radio" value="vertical" name="wca_trenchcoat_chest_pocket" ><?php echo wca_retrieve_label('wca_trenchcoat_chest_pocket', 'vertical'); ?>
                                </label>

                            </span>
                            <span class="wca_trenchcoat_chest_pocket_zipper">
                                <label>
                                    <input type="radio" value="zipper" name="wca_trenchcoat_chest_pocket" ><?php echo wca_retrieve_label('wca_trenchcoat_chest_pocket', 'zipper'); ?>
                                </label>

                            </span>
                            <span class="wca_trenchcoat_chest_pocket_patched">
                                <label>
                                    <input type="radio" value="patched" name="wca_trenchcoat_chest_pocket" ><?php echo wca_retrieve_label('wca_trenchcoat_chest_pocket', 'patched'); ?>
                                </label>

                            </span>
                            </div>		      
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Belt:</label>
                                <div class="col-sm-10">
                                    <div class="radio  attr-back pos5">
                                        <span class="wca_trenchcoat_belt_no">
                                            <label>
                                                <input type="radio" value="0"  name="wca_trenchcoat_belt" ><?php echo wca_retrieve_label('wca_trenchcoat_belt', '0'); ?>
                                            </label>

                                        </span>
                                        <span class="wca_trenchcoat_belt_sewing">
                                            <label>
                                                <input type="radio" value="sewing"  name="wca_trenchcoat_belt" id="trenchcoat_belt_sewing"><?php echo wca_retrieve_label('wca_trenchcoat_belt', 'sewing'); ?>
                                            </label>

                                        </span>
                                        <span class="wca_trenchcoat_belt_loose">
                                            <label>
                                                <input type="radio" value="loose" name="wca_trenchcoat_belt" id="trenchcoat_belt_loose"><?php echo wca_retrieve_label('wca_trenchcoat_belt', 'loose'); ?>
                                            </label>

                                        </span>
                                    </div>		      
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Back side:</label>
                                <div class="col-sm-10">
                                    <div class="radio  attr-back pos1">
                                        <span class="wca_trenchcoat_backcut_Ventless">
                                            <label>
                                                <input type="radio" value="0" name="wca_trenchcoat_backcut" ><?php echo wca_retrieve_label('wca_trenchcoat_backcut', '0'); ?>
                                            </label>

                                        </span>
                                        <span class="wca_trenchcoat_backcut_Centervent">
                                            <label>
                                                <input type="radio" value="1" name="wca_trenchcoat_backcut" ><?php echo wca_retrieve_label('wca_trenchcoat_backcut', '1'); ?>
                                            </label>

                                        </span>
                                        <span class="wca_trenchcoat_backcut_Sidevents">
                                            <label>
                                                <input type="radio" value="2" name="wca_trenchcoat_backcut" ><?php echo wca_retrieve_label('wca_trenchcoat_backcut', '2'); ?>
                                            </label>

                                        </span>
                                    </div>		      
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Sleeves:</label>
                                <div class="col-sm-10">
                                    <div class="radio attr-front pos7">
                                        <span class="wca_trenchcoat_sleeve_no">
                                            <label>
                                                <input type="radio" value="0" name="wca_trenchcoat_sleeve" ><?php echo wca_retrieve_label('wca_trenchcoat_sleeve', '0'); ?>
                                            </label>

                                        </span>
                                        <span class="wca_trenchcoat_sleeve_tape">
                                            <label>
                                                <input type="radio" value="tape" name="wca_trenchcoat_sleeve" ><?php echo wca_retrieve_label('wca_trenchcoat_sleeve', 'tape'); ?>
                                            </label>

                                        </span>
                                        <span class="wca_trenchcoat_sleeve_button">
                                            <label>
                                                <input type="radio" value="button" name="wca_trenchcoat_sleeve" ><?php echo wca_retrieve_label('wca_trenchcoat_sleeve', 'button'); ?>
                                            </label>

                                        </span>
                                    </div>		      
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Epaulettes:</label>
                                <div class="col-sm-10">
                                    <div class="radio attr-front pos6">
                                        <span class="wca_trenchcoat_shoulder_0">
                                            <label>
                                                <input type="radio" value="0" name="wca_trenchcoat_shoulder" ><?php echo wca_retrieve_label('wca_trenchcoat_shoulder', '0'); ?>
                                            </label>

                                        </span>
                                        <span class="wca_trenchcoat_shoulder_1">
                                            <label>
                                                <input type="radio" value="1" name="wca_trenchcoat_shoulder" ><?php echo wca_retrieve_label('wca_trenchcoat_shoulder', '1'); ?>
                                            </label>

                                        </span>		       
                                    </div>		      
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Back piece:</label>
                                <div class="col-sm-10">
                                    <div class="radio attr-back bck_pos10">
                                        <span class="wca_trenchcoat_back_lapel_0">
                                            <label>
                                                <input type="radio" value="0" name="wca_trenchcoat_back_lapel" ><?php echo wca_retrieve_label('wca_trenchcoat_back_lapel', '0'); ?>
                                            </label>

                                        </span>
                                        <span class="wca_trenchcoat_back_lapel_1">
                                            <label>
                                                <input type="radio" value="1" name="wca_trenchcoat_back_lapel" ><?php echo wca_retrieve_label('wca_trenchcoat_back_lapel', '1'); ?>
                                            </label>

                                        </span>
                                    </div>		      
                                </div>
                            </div>
                            </div>
                            </div>
