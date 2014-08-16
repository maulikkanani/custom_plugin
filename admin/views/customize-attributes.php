<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
global $post;
// Add an nonce field so we can check for it later.
wp_nonce_field('myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce');

// Use get_post_meta to retrieve an existing value from the database.
$value = get_post_meta($post->ID, '_my_meta_value_key', true);
$plugins_url = plugins_url('woocommerce-custom-attribute');

$default_values = array(
    array(
        'name' => 'wca_trenchcoat_style',
        'value' => 'simple'
    ),
    array(
        'name' => 'wca_trenchcoat_length',
        'value' => 'long'
    ),
    array(
        'name' => 'wca_trenchcoat_fit',
        'value' => '1'
    ),
    array(
        'name' => 'wca_trenchcoat_closure',
        'value' => 'zipper'
    ),
    array(
        'name' => 'wca_trenchcoat_closure_type_boton',
        'value' => 'standard'
    ),
    array(
        'name' => 'wca_trenchcoat_pockets',
        'value' => '2'
    ),
    array(
        'name' => 'wca_trenchcoat_pockets_type',
        'value' => '5'
    ),
    array(
        'name' => 'wca_trenchcoat_chest_pocket',
        'value' => '0'
    ),
    array(
        'name' => 'wca_trenchcoat_belt',
        'value' => 'sewing'
    ),
    array(
        'name' => 'wca_trenchcoat_backcut',
        'value' => '1'
    ),
    array(
        'name' => 'wca_trenchcoat_sleeve',
        'value' => 'tape'
    ),
    array(
        'name' => 'wca_trenchcoat_shoulder',
        'value' => '0'
    ),
    array(
        'name' => 'wca_trenchcoat_back_lapel',
        'value' => '0'
    )
);
$default_values = json_encode($default_values);
?>
<div id="default_value" class="hide"></div>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery( "#tabs" ).tabs();
        
        var default_data = '<?php echo $default_values ?>';
        jQuery.each(jQuery.parseJSON(default_data), function(key, val) {
            if (val.name == 'wca_trenchcoat_pockets_type') {
                if (val.value >= 1 && val.value <= 5)
                    jQuery('.trenchcoat_pockets_2').show();
                if (val.value >= 6)
                    jQuery('.trenchcoat_pockets_3').show();

                jQuery('.pocket_modal_main[data-rel=' + val.value + '] img').addClass('boxpart_active');
            }
            jQuery('input[name=' + val.name + '][value=' + val.value + ']').attr('checked', '');
        });


        jQuery(document).trigger("set-pos-1");
        jQuery(document).trigger("set-pos-3");
        jQuery(document).trigger("set-pos-5");
        jQuery(document).trigger("set-pos-6");
        jQuery(document).trigger("set-pos-7");
        jQuery(document).trigger("set-pos-8");
        jQuery(document).trigger("set-pos-1");
        jQuery(document).trigger("set-pos-1");
        jQuery(document).trigger("back-pos-10");

        $pocket_selector = jQuery('input[name=wca_trenchcoat_pockets]:checked');
        jQuery(document).trigger("pockat-change");

    });


    jQuery(document).data({
        wca_trenchcoat_style_crossed: {
            diseable_type: 'input',
            diseable_name: 'wca_trenchcoat_closure_type_boton',
            diseable_value: 'hide',
            default_value: 'standard',
        },
        wca_trenchcoat_style_simple: {
            enable_type: 'input',
            enable_name: 'wca_trenchcoat_closure_type_boton',
            enable_value: 'hide',
        }
    });



</script>


<div id="tabs" class="custom_tabs_main">
    <ul>
        <li><a href="#tabs-1"><div class="number">1</div>Style</a></li>
        <li><a href="#tabs-2"><div class="number">2</div>Fabric</a></li>
        <li><a href="#tabs-3"><div class="number">3</div>Accents</a></li>
    </ul>
    <div id="tabs-1">
        <div class="clearfix">
            <div class="col-sm-12">
                <h3>Custom Trench Coat</h3>   	
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Style:</label>
                        <div class="col-sm-10">
                            <div class="radio attr-front pos1 pos4">
                                <label>
                                    <input type="radio" name="wca_trenchcoat_style" value="simple" data-imgpos="1" id="wca_trenchcoat_style_simple" class="rel_enable"> Single breasted
                                </label>
                                <label>
                                    <input type="radio" name="wca_trenchcoat_style" value="crossed" data-imgpos="1" id="wca_trenchcoat_style_crossed"  class="rel_deseable"> Double breasted
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
                                <input id="hidden_trenchcoat_pockets" class="option_input" type="hidden" value="1" name="wca_trenchcoat_pockets_type">

                                <div class="trenchcoat_pockets_0 wca_trenchcoat_pockets" style="display: none"> 

                                </div>    

                                <div class="trenchcoat_pockets_2 wca_trenchcoat_pockets " style="display:none">   
                                    <div class="col-sm-3 pocket_modal_main" data-rel="1">
                                        <div class="box_part">
                                            <img src="<?php echo $plugins_url ?>/admin/assets/images/man/trenchcoat/estilo/trenchcoat_pockets_1.png">
                                        </div>
                                        <div class="box_title"><p>Flaps</p></div>
                                    </div>

                                    <div class="col-sm-3 pocket_modal_main" data-rel="2">
                                        <div class="box_part">
                                            <img src="<?php echo $plugins_url ?>/admin/assets/images/man/trenchcoat/estilo/trenchcoat_pockets_2.png">
                                        </div>
                                        <div class="box_title"><p>Double Welt</p></div>
                                    </div>
                                    <div class="col-sm-4 pocket_modal_main" data-rel="3">
                                        <div class="box_part">
                                            <img src="<?php echo $plugins_url ?>/admin/assets/images/man/trenchcoat/estilo/trenchcoat_pockets_3.png">
                                        </div>
                                        <div class="box_title"><p>Patched</p></div>
                                    </div>
                                    <div class="col-sm-3 pocket_modal_main" data-rel="4">
                                        <div class="box_part">
                                            <img src="<?php echo $plugins_url ?>/admin/assets/images/man/trenchcoat/estilo/trenchcoat_pockets_4.png">
                                        </div>
                                        <div class="box_title"><p>Diagonal</p></div>
                                    </div>
                                    <div class="col-sm-3 pocket_modal_main" data-rel="5">
                                        <div class="box_part">
                                            <img src="<?php echo $plugins_url ?>/admin/assets/images/man/trenchcoat/estilo/trenchcoat_pockets_5.png">
                                        </div>
                                        <div class="box_title"><p>Diag. zipper</p></div>
                                    </div>
                                </div>
                                <div class="trenchcoat_pockets_3 wca_trenchcoat_pockets" style="display:none">   
                                    <div class="col-sm-3 pocket_modal_main" data-rel="6">
                                        <div class="box_part">
                                            <img src="<?php echo $plugins_url ?>/admin/assets/images/man/trenchcoat/estilo/trenchcoat_pockets_1.png">
                                        </div>
                                        <div class="box_title"><p>Flaps</p></div>
                                    </div>
                                    <div class="col-sm-3 pocket_modal_main" data-rel="7">
                                        <div class="box_part">
                                            <img src="<?php echo $plugins_url ?>/admin/assets/images/man/trenchcoat/estilo/trenchcoat_pockets_2.png">
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
                </form>
            </div>
            <div class="col-sm-4">

            </div>
        </div>
    </div>
    <div id="tabs-2">
        <h3 class="main_titel_list">Custom Trench Coat / <span class="sub-titel">Step 2: Select a fabric</span></h3> <br>  
    </div>
    <div id="tabs-3">
        <h3 class="main_titel_list">Custom Trench Coat / <span class="sub-titel">Step 3: Add your personal touch</span></h3><br>
        <div class="form-group">
            <label for="inputEmail3" class="control-label">Customize Trench Coat Lining <span>(+12,95â‚¬)</span></label>
            <div class="clearfix">
                <div class="radio">
                    <label>
                        <input type="radio" value="" name="wca_trenchcoat_back_lapel" > Color by default
                    </label>
                    <div class="clearfix"></div>
                    <label>
                        <input type="radio" value="" name="wca_trenchcoat_back_lapel" > Custom color (+12,95â‚¬) 
                    </label>		       
                </div>		      
            </div>
        </div>
        <div class="form-group">
            <a href="#"><img src="images/man/trenchcoat/forros_interior.jpg"></a>
        </div>		   
    </div>
</div>    
