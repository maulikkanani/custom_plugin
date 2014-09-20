/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function change_body_shape(h) {


}

jQuery(document).bind('change_body_shape', function(event, h) {
    jQuery("#body_shape").val(h);
    var shape_img = jQuery("#all_shape img").css("opacity", 0.5);
    var first = Math.floor(h);
    var next = Math.ceil(h);
    if (first == next) {
        shape_img.eq(first - 1).css("opacity", 1)
    } else {
        shape_img.eq(first - 1).css("opacity", 1 - 0.5 * (h - first));
        shape_img.eq(next - 1).css("opacity", 1 - 0.5 * (next - h));
    }
});

jQuery(document).bind('show_step', function(event, h) {
    jQuery(".man.inline_box").hide(300);
    jQuery('#'+h).slideDown(500);
});


jQuery(document).ready(function() {


    jQuery(document).on('change', 'input.profile_height', function() {
        jQuery('span.profile_height').text(jQuery('#measurment_height').val());
        jQuery('span.profile_height_2').text(jQuery('#measurment_height_2').val());
    });

    jQuery(document).on('change', 'input.profile_weight', function() {
        jQuery('span.profile_weight').text(jQuery(this).val());
    });


    jQuery(document).on('click', '.change_height_unit a', function() {
        var tem_unt = jQuery(this).data('rel');
        jQuery(document).trigger('change-height-unit', [tem_unt]);

    });
    jQuery(document).on('click', '.change_height_unit a', function() {
        var tem_unt = jQuery(this).data('rel');
        jQuery(document).trigger('change-height-unit', [tem_unt]);

    });

    jQuery(document).on('click', '.change_weight_unit a', function() {
        var tem_unt = jQuery(this).data('rel');
        jQuery(document).trigger('change-weight-unit', [tem_unt]);

    });

    jQuery(document).on('click', '.controls a.add_measurments', function() {
        if (jQuery('#inline_01_measure').wca_validate()) {
            jQuery('.man.inline_box').slideUp();
            jQuery(document).trigger('show_measure', ['wca_coat_length']);
            jQuery('#inline_03_measure').slideDown(500);

        }

    });

    jQuery(document).on('keydown', '.decimal_only', function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A
                        (e.keyCode == 65 && e.ctrlKey === true) ||
                        // Allow: home, end, left, right
                                (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }

            });

    jQuery(document).bind('change-height-unit', function(evert, unit) {
        jQuery('.unt').hide();

        jQuery('.unit_' + unit).show();
        $length_units = unit;
        if ($edit_measurment) {
            jQuery(document).trigger('change_measurement_data');
        }
        jQuery('input[name=wca_measurment_unit]').val(unit);
        jQuery('span.units').text(unit);

    });

    jQuery(document).bind('change-weight-unit', function(evert, unit) {
        jQuery('.weight_unt').hide();
        jQuery('.weight_units_' + unit).show();
        $weight_units = unit;
        jQuery('input[name=wca_weight_unit]').val(unit);
        jQuery('span.weight_units').text(unit);
    });

    jQuery("#all_shape img").css("cursor", "pointer").click(function() {
        var h = parseInt(this.getAttribute("rel"));
        slider.slider("value", h);
        //change_body_shape(h)
        jQuery(document).trigger('change_body_shape',[h]);
    });


    jQuery(document).on('click', '#close_first_time_info', function() {
        jQuery('#first_time_info').slideUp();
    });

    jQuery(document).on('click', '#box_steps a', function() {
        var d = jQuery(this).data("rel");
        jQuery(document).trigger('show_measure', [d]);
    });

    jQuery(document).on('click', '#inline_03_measure a.continue', function() {
        var a = jQuery('#measure_' + $wizard_measure);
        var g = a.find("input.measure");
        var hidden = jQuery('input[name=' + $wizard_measure + ']').val();
        
        jQuery('#box_steps a.' + $wizard_measure).removeClass('ok').addClass('ko');
        if (parseFloat(hidden) < parseFloat($measurement.valid_min) || parseFloat(hidden) > parseFloat($measurement.valid_max)) {
            alert('This measurement must be between ' + $measurement.valid_min + ' ' + $length_units + ' to ' + $measurement.valid_max + ' ' + $length_units);
            return false;
        }
        
        jQuery('#box_steps a.' + $wizard_measure).removeClass('ko').addClass('ok');
        if (jQuery('#box_steps a').not(".ok").length > 0) {
            var d = jQuery('#box_steps a').not(".ok").eq(0).data('rel');
            jQuery(document).trigger('show_measure', [d]);
        } else {
            jQuery('.man.inline_box').hide();
            jQuery('#inline_04_measure').show();
        }
    });

    jQuery(document).on('click', '.controls a.edit_meaurements', function() {
        jQuery('.man.inline_box').slideUp();
        jQuery('#inline_03_measure').slideDown(500);
        $edit_measurment = true;
    });
    
    jQuery(document).on('click', '.controls a.edit_profile_data', function() {
        jQuery('.man.inline_box').slideUp();
        jQuery('#inline_01_measure').slideDown(500);
        $edit_measurment = true;
    });



});
jQuery(document).bind('show_measure', function(event, d) {
    $wizard_measure = d;
    var d_id = 'measure_' + d;
    jQuery(".inline_03_measure").hide();
    jQuery("#" + d_id).show();
    jQuery("#box_steps a").removeClass("current")
    jQuery("." + d).addClass("current");
    $measurement = $default_measurments[d];
    jQuery(document).trigger('activate_slider', [jQuery('#' + d_id), $measurement]);
});

jQuery(document).bind('change_measurement_data', function(event, d) {
    $default_measurments = $default_cm_measurments;
    if ($length_units == 'in') {
        $default_measurments = $default_in_measurments;
    }
});

jQuery(document).bind('activate_slider', function(event, a, b) {
    var g = a.find("input.measure");
    var hidden = jQuery('input[name=' + b.element + ']')
    var element = b.element;
    jQuery(document).trigger('set_measurement', [element, b.estimate]);
    if (!g.length) {
        return false
    }

    
    var f = b.estimate;


    var i = parseFloat(g.val());


    if (!i) {
        i = f;
        jQuery(document).trigger('set_measurement', [element, f]);
    }

    var c = ($length_units == "cm") ? 0.5 : 0.2;

    if (b.valid_min > b.min)
        b.min = b.valid_min;


    if (b.valid_max < b.max)
        b.max = b.valid_max;

    a.find("span.slider-min span.mvalue").text(b.min);
    a.find("span.slider-max span.mvalue").text(b.max);

    var d = a.find("div.ui-slider").slider({
        value: i,
        min: b.min,
        max: b.max,
        step: c,
        slide: function(j, k) {
            jQuery(document).trigger('set_measurement', [element, k.value]);
        },
        stop: function(j, k) {
            g.keyup()
        }
    });


    g.change(function() {
        d.slider("value", this.value)
        jQuery(document).trigger('set_measurement', [element, this.value]);
    });

    jQuery(g).keypress(function(j) {
        if (j.which == 13) {
            d.slider("value", this.value);
            return false
        }
    });

    var h = a.find(".ico_less");
    var e = a.find(".ico_more");

    jQuery(h).click(function() {
        var j = g.val();
        j = parseFloat(j) - 0.5;
        if (j < b.min) {
            j = b.min
        }
        d.slider("value", j);
        jQuery(document).trigger('set_measurement', [element, j]);
    });
    jQuery(e).click(function() {
        var j = g.val();
        j = parseFloat(j) + 0.5;
        if (j > b.max) {
            j = b.max
        }
        d.slider("value", j);
        jQuery(document).trigger('set_measurement', [element, j]);
    })
});

jQuery(document).bind('set_measurement', function(event, b, v) {
    var g = jQuery('#measure_' + b).find("input.measure");
    var h = jQuery('input[name=' + b + ']');
    var h_txt = jQuery('span.' + b + '_txt');
    g.val(v);
    h.val(v);
    h_txt.text(v);
});


(function($) {
    $.fn.wca_validate = function(options) {
        var perams = $.extend({
        }, options);

        var return_data = true;
        var inputs = jQuery(this).find('input.wca_required');
        inputs.each(function() {
            jQuery(this).next('span.wca_error').remove();
            if (jQuery(this).val() == '') {
                jQuery(this).after('<span class="wca_error">This field is a required. </span>');
                jQuery(this).focusin();
                return_data = false;
                return false;
            }
        });
        return return_data
    };
}(jQuery));


