<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
?>
<script type="text/javascript">
    function change_body_shape(h) {
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
    }
    jQuery(document).ready(function() {

        jQuery("#all_shape img").css("cursor", "pointer").click(function() {
            var h = parseInt(this.getAttribute("rel"));
            slider.slider("value", h);
            change_body_shape(h)
        });
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
                change_body_shape(i.value)
            }
        })


        change_body_shape(g);

    });
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<style type="text/css">
    .ui-widget-content {
        border: 1px solid #aaaaaa !important;
        margin-left: 29px;
        width: 84%;
    }
</style>
<div class="col2-set" id="customer_details">
    <div class="col-1">
        <h3><?php _e('Measurements', 'woocommerce'); ?></h3>
    </div>
    <div id="inline_01_base_form">
        <input type="hidden" name="constitution" id="body_shape" value="">
        <table id="all_shape" class="new" width="100%">
            <tr>
                <td><img src="https://tailor4lessl.r.worldssl.net/images/man/measure/man/slider/1.jpg" class="icon" alt="Slender" rel="1" style="cursor: pointer; opacity: 0.85;"></td>
                <td><img src="https://tailor4lessl.r.worldssl.net/images/man/measure/man/slider/2.jpg" class="icon" alt="Average" rel="2" style="cursor: pointer; opacity: 0.65;"></td>
                <td><img src="https://tailor4lessl.r.worldssl.net/images/man/measure/man/slider/3.jpg" class="icon" alt="Fit" rel="3" style="cursor: pointer; opacity: 0.5;"></td>
                <td><img src="https://tailor4lessl.r.worldssl.net/images/man/measure/man/slider/4.jpg" class="icon" alt="Muscular" rel="4" style="cursor: pointer; opacity: 0.5;"></td>
                <td><img src="https://tailor4lessl.r.worldssl.net/images/man/measure/man/slider/5.jpg" class="icon" alt="Husky" rel="5" style="cursor: pointer; opacity: 0.5;"></td>
                <td><img src="https://tailor4lessl.r.worldssl.net/images/man/measure/man/slider/6.jpg" class="icon" alt="Husky" rel="6" style="cursor: pointer; opacity: 0.5;"></td>
            </tr>
        </table>
    </div>
    <div id="slider"></div>
</div>