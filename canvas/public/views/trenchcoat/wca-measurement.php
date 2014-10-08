<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
include ABS_MODEL . 'measurements.php';
?>
<script type="text/javascript">
    $default_cm_measurments = jQuery.parseJSON('<?php echo $default_measurments_cm ?>');
    $default_in_measurments = jQuery.parseJSON('<?php echo $default_measurments_inch ?>');

    $show_div = '<?php echo $show_div ?>';
    $length_units = '<?php echo $length_units ?>';
    $weight_units = '<?php echo $weight_units ?>';
    $body_shape = '<?php echo $body_shape ?>';
    $default_vals = '<?php echo json_encode($default_measurement) ?>';

    $edit_measurment = true;
    jQuery(document).ready(function() {

        //$default_vals = default_data;
        if ($default_vals != 'null') {
            jQuery.each(jQuery.parseJSON($default_vals), function(key, value) {
                var type = jQuery('input[name=' + key + ']').attr('type');
                if (type == "checkbox" || type == "radio")
                    jQuery('input[name=' + key + '][value=' + value + ']').attr('checked', '');
                else
                    jQuery('input[name=' + key + ']').val(value);
            });
        }

        var g = jQuery("#body_shape").val();

        if (!g) {
            g = 3
        }

        var slider = jQuery("#slider").slider({
            value: g,
            min: 1,
            max: 6,
            step: 0.05,
            slide: function(h, i) {
                //change_body_shape(i.value)
                jQuery(document).trigger('change_body_shape', [i.value]);
            }
        })
        
        jQuery(document).on('click', '#all_shape img', function() {
            var h = parseInt(jQuery(this).data("rel"));
            slider.slider("value", h);
            //change_body_shape(h)
            jQuery(document).trigger('change_body_shape', [h]);
        });

        jQuery(document).trigger('change_body_shape', [g]);
        jQuery(document).trigger('change_measurement_data');
        jQuery(document).trigger('change-height-unit', [$length_units]);
        jQuery(document).trigger('change-weight-unit', [$weight_units]);

        jQuery('span.profile_height').text(jQuery('#measurment_height').val());
        jQuery('span.profile_height_2').text(jQuery('#measurment_height_2').val());
        jQuery('span.profile_weight').text(jQuery('#measurment_weight').val());

        if ($show_div == 'inline_04_measure') {
            jQuery.each($default_measurments, function(key, value) {
                jQuery(document).trigger('show_measure', [key]);
            });
        }
        jQuery(document).trigger('show_step', [$show_div]);


    });
</script>

<div class="col2-set" id="customer_details">
    <div class="col-1">
        <h3><?php _e('Measurements', 'woocommerce'); ?></h3>
    </div>
    <div class="man inline_box" id="inline_01_measure" style="display: none;">
        <div class="grid_12">
            <p id="measurment_height_field" class="form-row form-row-first validate-required">
                <label>HEIGHT: 
                    <abbr class="required" title="required">*</abbr>
                </label>
                <input id="measurment_height" class="input-text wca_required decimal_only profile_height" type="text" value="" placeholder="" name="wca_measurment_height">
                <span class="unit_cm unt">cm</span>
                <span class="unit_in unt" style="display: inline;">
                    <span>feet</span>
                    <input id="measurment_height_2" class="input-text decimal_only profile_height" type="text" value="" placeholder="" name="wca_measurment_height_2">
                    <span>inches</span>
                </span>
                <span class="change_height_unit unit_cm unt"> <a href="javascript:;" data-rel="in"> change to inches </a></span>
                <span class="change_height_unit unit_in unt" style="display:none"> <a href="javascript:;" data-rel="cm"> change to cm </a></span>
            </p>
            <div class="clr"></div>
            <p id="measurment_weight_field" class="form-row form-row-first validate-required">
                <label>WEIGHT: 
                    <abbr class="required" title="required">*</abbr>
                </label>
                <input id="measurment_weight" class="input-text wca_required decimal_only profile_weight" type="text" value="" placeholder="" name="wca_measurment_weight">
                <span class="weight_units_kg weight_unt">Kg</span>
                <span class="weight_units_lb weight_unt" style="display:none">lb</span>
                <span class="change_weight_unit weight_units_kg weight_unt"> <a href="javascript:;" data-rel="lb"> change to lb </a></span>
                <span class="change_weight_unit weight_units_lb weight_unt" style="display:none"> <a href="javascript:;" data-rel="kg"> change to Kg </a></span>
            </p>
        </div>
        <div class="clr"></div>
        <div id="inline_01_base_form">
            <input type="hidden" class="wca_required" name="wca_constitution" id="body_shape" value="">
            <input type="hidden" class="wca_required" name="wca_measurment_unit" value="">
            <input type="hidden" class="wca_required" name="wca_weight_unit" value="">

            <p class="form-row form-row-first">
                <label>
                    BODY SHAPE:
                </label>
            </p>
            <div class="clr"></div>
            <div id="all_shape" class="col-sm-12">
                <div class="col-sm-2"><img src="<?php echo wca_image_url ?>/man/measure/slider/1.jpg" class="icon" alt="Slender"  data-rel="1"  style="cursor: pointer; opacity: 0.5;"></div>
                <div class="col-sm-2"><img src="<?php echo wca_image_url ?>/man/measure/slider/2.jpg" class="icon" alt="Average"  data-rel="2"   style="cursor: pointer; opacity: 0.5;"></div>
                <div class="col-sm-2"><img src="<?php echo wca_image_url ?>/man/measure/slider/3.jpg" class="icon" alt="Fit"      data-rel="3"   style="cursor: pointer; opacity: 0.5;"></div>
                <div class="col-sm-2"><img src="<?php echo wca_image_url ?>/man/measure/slider/4.jpg" class="icon" alt="Muscular" data-rel="4"   style="cursor: pointer; opacity: 0.5;"></div>
                <div class="col-sm-2"><img src="<?php echo wca_image_url ?>/man/measure/slider/5.jpg" class="icon" alt="Husky"    data-rel="5"   style="cursor: pointer; opacity: 0.5;"></div>
                <div class="col-sm-2"><img src="<?php echo wca_image_url ?>/man/measure/slider/6.jpg" class="icon" alt="Husky"    data-rel="6"   style="cursor: pointer; opacity: 0.5;"></div>
            </div>
            <div class="clr"></div>
            <div id="slider"></div>
        </div>
        
        <div class="clr"></div>
        <div class="controls">
            <a class="add_measurments button gbtr_minicart_checkout_but" href="javascript:;">
                <span>Add measurements</span>
            </a>
        </div>
    </div>


    <div class="man inline_box" id="inline_03_measure" style="display: none;">

        <div id="first_time_info" class="grid_12">
            <div class="measure">
                <div class="content">
                    <a href="javascript:;" id="close_first_time_info">
                        <span class="fa-stack fa-lg step_number">
                            <i class="fa fa-circle fa-stack-1x"></i>
                            <i class="fa fa-stack-1x num">X</i>
                        </span>
                    </a>
                    <p class="title">MEASURING GUIDE. Estimated time: 10 minutes.</p>
                    <p class="upper">To take the measurements you will need</p>                        
                    <ul>
                        <li>For some measurements the help of another person is recommended</li>
                        <li>Use a measurement tape </li>
                        <!--                        <li>If you don't have time now, you can print the instruction <a href="/files/measures/manual_measures_en.pdf" target="_blank"> here</a> and complete the process later</li>-->
                    </ul> 
                    <p class="upper">Recommendations</p>
                    <ul>
                        <li>Measurements are taken better if dressed in a shirt, pants and shoes</li>
                        <!--                        <li>Initial suggested measurements are for guidance purposes only and are based on your submitted height and weight. Please follow the written and video instructions below for the most accurate measurement.</li>-->
                    </ul>
                </div>
            </div>
        </div>


        <!-- REQUIRED measures -->		
        <div data-range="15" data-rel="wca_coat_length" class="inline_03_measure  required row" id="measure_wca_coat_length" style="display: none;">
            <div class="grid_6">
                <div class="step_heading">
                    <h3>
                        Coat/ Trench Coat length.
                        <span>
                            Step
                            <span class="num_measure">1</span>
                            of
                            <span class="total_measures">7</span>
                            .
                        </span>
                </div>
                <div class="steps_description">
                    <p class="form-row form-row-wide">
                        <span class="fa-stack fa-lg step_number">
                            <i class="fa fa-circle fa-stack-1x"></i>
                            <i class="fa fa-stack-1x num">1</i>
                        </span>
                        <span class="step_des">Lift the shirt collar.</span>

                    </p>
                    <p class="form-row form-row-wide">
                        <span class="fa-stack fa-lg step_number">
                            <i class="fa fa-circle fa-stack-1x"></i>
                            <i class="fa fa-stack-1x num">2</i>
                        </span>
                        <span class="step_des">Place the measuring tape where the shoulder seams meet the neck.</span>
                    </p>
                    <p class="form-row form-row-wide">
                        <span class="fa-stack fa-lg step_number">
                            <i class="fa fa-circle fa-stack-1x"></i>
                            <i class="fa fa-stack-1x num">3</i>
                        </span>
                        <span class="step_des">Measure vertically until where you are would like the coat to end (over the stomach).</span>
                    </p>
                </div>
                <div class="measure_box grid_12">
                    <div class="relbox">
                        <span class="slider-min"><span rel="" class="mvalue"></span><span class="units"></span></span>
                        <span class="slider-max"><span rel="" class="mvalue"></span><span class="units"></span></span>

                        <div class="ui-slider-box">
                            <div class="ui-slider"></div>
                        </div>

                        <a href="javascript:;" class="ico_less"></a>
                        <a href="javascript:;" class="ico_more"></a>

                        <div class="form_single_measure" method="post"> 
                            <label class="input">
                                <input type="text" value="" maxlength="5" size="2" params="" name="wca_coat_length" class="required measure text number" id="variable_sleeves_length"> <span class="units"></span>
                            </label>
                        </div>

                    </div>				
                </div>
            </div>
            <div class="grid_6">
                <img src="<?php echo wca_image_url ?>/man/measure/howto/coat_length.jpg">
            </div>

        </div>

        <div data-rel="wca_sleeves_length" class="inline_03_measure  required row" id="measure_wca_sleeves_length" style="display: none;">
            <div class="grid_6">
                <div class="step_heading">
                    <h3>
                        Sleeves length.
                        <span>
                            Step
                            <span class="num_measure">2</span>
                            of
                            <span class="total_measures">7</span>
                            .
                        </span>
                </div>
                <div class="steps_description">
                    <p class="form-row form-row-wide">
                        <span class="fa-stack fa-lg step_number">
                            <i class="fa fa-circle fa-stack-1x"></i>
                            <i class="fa fa-stack-1x num">1</i>
                        </span>
                        <span class="step_des">Place one end of the measuring tape where the shoulder seam meets the sleeve. </span>

                    </p>
                    <p class="form-row form-row-wide">
                        <span class="fa-stack fa-lg step_number">
                            <i class="fa fa-circle fa-stack-1x"></i>
                            <i class="fa fa-stack-1x num">2</i>
                        </span>
                        <span class="step_des">Measure along the arm down to the point where the thumb webbing meets the hand.</span>
                    </p>
                </div>
                <div class="measure_box grid_12">
                    <div class="relbox">
                        <span class="slider-min"><span rel="" class="mvalue"></span><span class="units"></span></span>
                        <span class="slider-max"><span rel="" class="mvalue"></span><span class="units"></span></span>

                        <div class="ui-slider-box">
                            <div class="ui-slider"></div>
                        </div>

                        <a href="javascript:;" class="ico_less"></a>
                        <a href="javascript:;" class="ico_more"></a>

                        <div class="form_single_measure" method="post"> 
                            <label class="input">
                                <input type="text" value="" maxlength="5" size="2" params="" name="wca_sleeves_length" class="required measure text number" id="variable_sleeves_length"> <span class="units"></span>
                            </label>
                        </div>

                    </div>				
                </div>
            </div>
            <div class="grid_6">
                <img src="<?php echo wca_image_url ?>/man/measure/howto/sleeves_length.jpg">
            </div>

        </div>
        <div data-rel="wca_shoulders" class="inline_03_measure  required row" id="measure_wca_shoulders" style="display: none;">
            <div class="grid_6">
                <div class="step_heading">
                    <h3>
                        Shoulder width. 
                        <span>
                            Step
                            <span class="num_measure">3</span>
                            of
                            <span class="total_measures">7</span>
                            .
                        </span>
                </div>
                <div class="steps_description">
                    <p class="form-row form-row-wide">
                        <span class="fa-stack fa-lg step_number">
                            <i class="fa fa-circle fa-stack-1x"></i>
                            <i class="fa fa-stack-1x num">1</i>
                        </span>
                        <span class="step_des">Place the measuring tape where the shoulder seam meets one of the sleeves.</span>

                    </p>
                    <p class="form-row form-row-wide">
                        <span class="fa-stack fa-lg step_number">
                            <i class="fa fa-circle fa-stack-1x"></i>
                            <i class="fa fa-stack-1x num">2</i>
                        </span>
                        <span class="step_des">Measure up over the curve of the shoulders, until the other shoulder seam meets the sleeve.</span>
                    </p>
                    <p class="form-row form-row-wide">
                        <span class="fa-stack fa-lg step_number">
                            <i class="fa fa-circle fa-stack-1x"></i>
                            <i class="fa fa-stack-1x num">3</i>
                        </span>
                        <span class="step_des">The measuring tape should touch the lowest part of the shirt collar.</span>
                    </p>
                </div>
                <div class="measure_box grid_12">
                    <div class="relbox">
                        <span class="slider-min"><span rel="" class="mvalue"></span><span class="units"></span></span>
                        <span class="slider-max"><span rel="" class="mvalue"></span><span class="units"></span></span>

                        <div class="ui-slider-box">
                            <div class="ui-slider"></div>
                        </div>

                        <a href="javascript:;" class="ico_less"></a>
                        <a href="javascript:;" class="ico_more"></a>

                        <div class="form_single_measure" method="post"> 
                            <label class="input">
                                <input type="text" value="" maxlength="5" size="2" params="" name="wca_shoulders" class="required measure text number" id="variable_sleeves_length"> <span class="units"></span>
                            </label>
                        </div>

                    </div>				
                </div>
            </div>
            <div class="grid_6">
                <img src="<?php echo wca_image_url ?>/man/measure/howto/shoulders.jpg">
            </div>

        </div>
        <div data-rel="wca_chest" class="inline_03_measure  required row" id="measure_wca_chest" style="display: none;">
            <div class="grid_6">
                <div class="step_heading">
                    <h3>
                        Chest around.
                        <span>
                            Step
                            <span class="num_measure">4</span>
                            of
                            <span class="total_measures">7</span>
                            .
                        </span>
                </div>
                <div class="steps_description">
                    <p class="form-row form-row-wide">
                        <span class="fa-stack fa-lg step_number">
                            <i class="fa fa-circle fa-stack-1x"></i>
                            <i class="fa fa-stack-1x num">1</i>
                        </span>
                        <span class="step_des">Run the measuring tape around the fullest part of your chest, tight up under your armpits and over the shoulder blades, just in line with your nipples.</span>

                    </p>

                </div>
                <div class="measure_box grid_12">
                    <div class="relbox">
                        <span class="slider-min"><span rel="" class="mvalue"></span><span class="units"></span></span>
                        <span class="slider-max"><span rel="" class="mvalue"></span><span class="units"></span></span>

                        <div class="ui-slider-box">
                            <div class="ui-slider"></div>
                        </div>

                        <a href="javascript:;" class="ico_less"></a>
                        <a href="javascript:;" class="ico_more"></a>

                        <div class="form_single_measure" method="post"> 
                            <label class="input">
                                <input type="text" value="" maxlength="5" size="2" params="" name="wca_chest" class="required measure text number" id="variable_sleeves_length"> <span class="units"></span>
                            </label>
                        </div>

                    </div>				
                </div>
            </div>
            <div class="grid_6">
                <img src="<?php echo wca_image_url ?>/man/measure/howto/chest.jpg">
            </div>

        </div>
        <div data-rel="wca_stomach" class="inline_03_measure  required row" id="measure_wca_stomach" style="display: none;">
            <div class="grid_6">
                <div class="step_heading">
                    <h3>
                        Stomach.
                        <span>
                            Step
                            <span class="num_measure">5</span>
                            of
                            <span class="total_measures">7</span>
                            .
                        </span>
                </div>
                <div class="steps_description">
                    <p class="form-row form-row-wide">
                        <span class="fa-stack fa-lg step_number">
                            <i class="fa fa-circle fa-stack-1x"></i>
                            <i class="fa fa-stack-1x num">1</i>
                        </span>
                        <span class="step_des">Measure around the widest part of the abdomen, in line with the navel.</span>
                    </p>
                </div>
                <div class="measure_box grid_12">
                    <div class="relbox">
                        <span class="slider-min"><span rel="" class="mvalue"></span><span class="units"></span></span>
                        <span class="slider-max"><span rel="" class="mvalue"></span><span class="units"></span></span>

                        <div class="ui-slider-box">
                            <div class="ui-slider"></div>
                        </div>

                        <a href="javascript:;" class="ico_less"></a>
                        <a href="javascript:;" class="ico_more"></a>

                        <div class="form_single_measure" method="post"> 
                            <label class="input">
                                <input type="text" value="" maxlength="5" size="2" params="" name="wca_stomach" class="required measure text number" id="variable_sleeves_length"> <span class="units"></span>
                            </label>
                        </div>

                    </div>				
                </div>
            </div>
            <div class="grid_6">
                <img src="<?php echo wca_image_url ?>/man/measure/howto/stomach.jpg">
            </div>

        </div>
        <div data-rel="wca_hips" class="inline_03_measure  required row" id="measure_wca_hips" style="display: none;">
            <div class="grid_6">
                <div class="step_heading">
                    <h3>
                        Hips.
                        <span>
                            Step
                            <span class="num_measure">6</span>
                            of
                            <span class="total_measures">7</span>
                            .
                        </span>
                </div>
                <div class="steps_description">
                    <p class="form-row form-row-wide">
                        <span class="fa-stack fa-lg step_number">
                            <i class="fa fa-circle fa-stack-1x"></i>
                            <i class="fa fa-stack-1x num">1</i>
                        </span>
                        <span class="step_des">Stand with legs slightly apart and measure around the fullest part of the hips.</span>
                    </p>
                </div>
                <div class="measure_box grid_12">
                    <div class="relbox">
                        <span class="slider-min"><span rel="" class="mvalue"></span><span class="units"></span></span>
                        <span class="slider-max"><span rel="" class="mvalue"></span><span class="units"></span></span>

                        <div class="ui-slider-box">
                            <div class="ui-slider"></div>
                        </div>

                        <a href="javascript:;" class="ico_less"></a>
                        <a href="javascript:;" class="ico_more"></a>

                        <div class="form_single_measure" method="post"> 
                            <label class="input">
                                <input type="text" value="" maxlength="5" size="2" params="" name="wca_hips" class="required measure text number" id="variable_sleeves_length"> <span class="units"></span>
                            </label>
                        </div>

                    </div>				
                </div>
            </div>
            <div class="grid_6">
                <img src="<?php echo wca_image_url ?>/man/measure/howto/hips.jpg">
            </div>

        </div>
        <div data-rel="wca_biceps" class="inline_03_measure  required row" id="measure_wca_biceps" style="display: none;">
            <div class="grid_6">
                <div class="step_heading">
                    <h3>
                        Bicep around.
                        <span>
                            Step
                            <span class="num_measure">7</span>
                            of
                            <span class="total_measures">7</span>
                            .
                        </span>
                </div>
                <div class="steps_description">
                    <p class="form-row form-row-wide">
                        <span class="fa-stack fa-lg step_number">
                            <i class="fa fa-circle fa-stack-1x"></i>
                            <i class="fa fa-stack-1x num">1</i>
                        </span>
                        <span class="step_des">With your arm hanging at your side and relaxed, measure around your bicep at its fullest point.</span>

                    </p>
                </div>
                <div class="measure_box grid_12">
                    <div class="relbox">
                        <span class="slider-min"><span rel="" class="mvalue"></span><span class="units"></span></span>
                        <span class="slider-max"><span rel="" class="mvalue"></span><span class="units"></span></span>

                        <div class="ui-slider-box">
                            <div class="ui-slider"></div>
                        </div>

                        <a href="javascript:;" class="ico_less"></a>
                        <a href="javascript:;" class="ico_more"></a>

                        <div class="form_single_measure" method="post"> 
                            <label class="input">
                                <input type="text" value="" maxlength="5" size="2" params="" name="wca_biceps" class="required measure text number" id="variable_sleeves_length"> <span class="units"></span>
                            </label>
                        </div>

                    </div>				
                </div>
            </div>
            <div class="grid_6">
                <img src="<?php echo wca_image_url ?>/man/measure/howto/biceps.jpg">
            </div>

        </div>

        <div class="clr"></div>

        <div id="box_steps">
            <a data-rel="wca_coat_length" class="wca_coat_length required ko" href="javascript:;"><img src="<?php echo wca_image_url ?>/man/measure/howto/thumb_coat_length.jpg"><span class="ok"></span></a>
            <a data-rel="wca_sleeves_length" class="wca_sleeves_length required ko" href="javascript:;"><img src="<?php echo wca_image_url ?>/man/measure/howto/thumb_sleeves_length.jpg"><span class="ok"></span></a>
            <a data-rel="wca_shoulders" class="wca_shoulders required ko" href="javascript:;"><img src="<?php echo wca_image_url ?>/man/measure/howto/thumb_shoulders.jpg"><span class="ok"></span></a>
            <a data-rel="wca_chest" class="wca_chest required ko" href="javascript:;"><img src="<?php echo wca_image_url ?>/man/measure/howto/thumb_chest.jpg"><span class="ok"></span></a>
            <a data-rel="wca_stomach" class="wca_stomach required ko" href="javascript:;"><img src="<?php echo wca_image_url ?>/man/measure/howto/thumb_stomach.jpg"><span class="ok"></span></a>
            <a data-rel="wca_hips" class="wca_hips required ko" href="javascript:;"><img src="<?php echo wca_image_url ?>/man/measure/howto/thumb_hips.jpg"><span class="ok"></span></a>
            <a data-rel="wca_biceps" class="wca_biceps required ko last current" href="javascript:;"><img src="<?php echo wca_image_url ?>/man/measure/howto/thumb_biceps.jpg"><span class="ok"></span></a>
        </div>

        <div class="controls">
            <a class="continue button gbtr_minicart_checkout_but" tabindex="9" href="javascript:;">
                <span>continue</span>
            </a>

        </div>

    </div>

    <div class="man inline_box row" id="inline_04_measure" style="display: none;">
        <div class="grid_6">
            <p class="title">YOUR PROFILE DATA</p>
            <div class="row">
                <div class="col-xs-5">
                    <img id="constitution_confirm" src="<?php echo wca_image_url ?>/man/measure/slider/3.jpg">
                </div>
                <div class="col-xs-7 row">
                    <div class="col-xs-4">Height</div>
                    <div class="col-xs-8">
                        <span class="profile_height"></span>
                        <span class="unit_cm unt">cm</span>
                        <span class="unit_in unt" style="display: inline;">
                            <span>feet</span>
                            <span class="profile_height_2"></span>
                            <span>inches</span>
                        </span>
                    </div> 
                    <div class="col-xs-4">Weight</div>
                    <div class="col-xs-8"><span class="profile_weight">12</span> <span class="weight_units">kg</span></div> 
                </div>
            </div>
            <div class="controls">
                <a class="edit_profile_data button gbtr_minicart_checkout_but" href="javascript:;">
                    <span>Edit profile data</span>
                </a>
            </div>
        </div>
        <div class="grid_6">
            <p class="title">YOUR PROFILE MEASUREMENTS</p>
            <div  class="wca_display_measurments row">
                <div class="col-sm-12">
                    <div class="col-sm-7">Coat/ Trench Coat length</div>
                    <div class="col-sm-3"><span class="wca_coat_length_txt"></span></div>
                    <div class="col-sm-2"><span class="units">cm</span></div> 
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-7">Sleeves length</div>
                    <div class="col-sm-3"><span class="wca_sleeves_length_txt"></span></div>
                    <div class="col-sm-2"><span class="units">cm</span></div> 
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-7">Shoulder width</div>
                    <div class="col-sm-3"><span class="wca_shoulders_txt"></span></div>
                    <div class="col-sm-2"><span class="units">cm</span></div> 
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-7">Chest around</div>
                    <div class="col-sm-3"><span class="wca_chest_txt"></span></div>
                    <div class="col-sm-2"><span class="units">cm</span></div> 
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-7">Stomach</div>
                    <div class="col-sm-3"><span class="wca_stomach_txt"></span></div>
                    <div class="col-sm-2"><span class="units">cm</span></div> 
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-7">wca_hips</div>
                    <div class="col-sm-3"><span class="wca_hips_txt"></span></div>
                    <div class="col-sm-2"><span class="units">cm</span></div> 
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-7">Bicep around</div>
                    <div class="col-sm-3"><span class="wca_biceps_txt"></span></div>
                    <div class="col-sm-2"><span class="units">cm</span></div> 
                </div>
            </div>
            <div class="controls">
                <a class="edit_meaurements button gbtr_minicart_checkout_but" href="javascript:;">
                    <span>Edit measurements</span>
                </a>
            </div>
        </div>
        <!--    <div class="hidden_inputs">
                <input type="hidden" name="wca_coat_length" value="0">
                <input type="hidden" name="wca_sleeves_length" value="0">
                <input type="hidden" name="wca_shoulders" value="0">
                <input type="hidden" name="wca_chest" value="0">
                <input type="hidden" name="wca_stomach" value="0">
                <input type="hidden" name="wca_hips" value="0">
                <input type="hidden" name="wca_biceps" value="0">
            </div>-->

    </div>