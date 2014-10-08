<?php
$fabric_front_url = $image_category . '/fabric/front/';
$shadow_fabric_front_url = $image_category . '/fabric/front/shadow/';

$fabric_back_url = $image_category . '/fabric/back/';
$shadow_fabric_back_url = $image_category . '/fabric/back/shadow/';

$zipper_url = $image_category . '/zipper/zipper/';
$shadow_zipper_url = $image_category . '/zipper/zipper/shadow/';

$boton_url = $image_category . '/botones/boton/';
$shadow_boton_url = $image_category . '/botones/boton/shadow/';

$boton_hilo_url = $image_category . '/hilo/hilo/';
$shadow_boton_hilo_url = $image_category . '/hilo/hilo/shadow/';

$boton_ojal_url = $image_category . '/ojal/ojal/';
$shadow_boton_ojal_url = $image_category . '/ojal/ojal/shadow/';

$lining_url = $image_category . '/linings/lining/';
$shadow_lining_url = $image_category . '/linings/lining/shadow/';

$elbow_patch_url = $image_category . '/patches/elbow/';
$shadow_elbow_patch_url = $image_category . '/patches/elbow/shadow/';

$neck_lining_url = $image_category . '/neck_lining/neck_lining/';
$shadow_neck_lining_url = $image_category . '/neck_lining/neck_lining/shadow/';

?>

<div style="width:100%">
    <canvas id="<?php echo $front_id ?>" width="<?php echo $canvas_width ?>" height="<?php echo $canvas_height ?>" class="man_trenchcoat front"></canvas>
    <canvas id="<?php echo $back_id ?>" width="<?php echo $canvas_width ?>" height="<?php echo $canvas_height ?>" class="man_trenchcoat back" style="display:none"></canvas>
</div>
<script id="main">

    (function() {
        $front_pos = jQuery.parseJSON('<?php echo $front_pos ?>');
        $back_pos = jQuery.parseJSON('<?php echo $back_pos ?>');
        $layer_type_data = jQuery.parseJSON('<?php echo $layer_type_data ?>');
        $fabric_color = $layer_type_data['fabric'].color;
        $size='<?php echo $size ?>';
       
            //var canvas_front = window._canvas = new fabric.StaticCanvas('<?php echo $unique_class ?>_front_main');
           var canvas_front='';
            var canvas_front = window._canvas = new fabric.StaticCanvas('<?php echo $front_id ?>');
            $front_layes = new Object();

            //var canvas_back = window._canvas = new fabric.StaticCanvas('<?php echo $unique_class ?>_back_main');
            var canvas_back = '';
            var canvas_back = window._canvas = new fabric.StaticCanvas('<?php echo $back_id ?>');
            $back_layes = new Object();

             set_static_layers($front_pos, canvas_front);
             set_static_layers($back_pos, canvas_back);
     
    })();
</script>