<!DOCTYPE html>    
<head>
    <meta charset="utf-8">
    <title>fabric.js-simple text display</title>

    <script type='text/javascript' src='http://192.168.1.35/kochandhill/wp-includes/js/jquery/jquery.js?ver=1.11.0'></script>
    <script src="dist/fabric.min.js" ></script>


<body>
    <!-- A canvas tag is required or 
             Fabric.js doesn't know where to draw. -->
    <canvas id="c" width="600" height="600" class="lower-canvas" style="position: absolute; width: 600px; height: 600px; left: 0px; top: 0px; -webkit-user-select: none;"></canvas><canvas class="upper-canvas " width="600" height="600" style="position: absolute; width: 600px; height: 600px; left: 0px; top: 0px; -webkit-user-select: none;"></canvas>
    <input id="blend" type="checkbox">
</body>
<?php
$front_pos = array(
    'font_pos_1' => 'img/body_crossed_boton_standard_fit0_long.png',
    'font_pos_2' => 'img/pockets_chest_type_welt.png',
    'font_pos_3' => 'img/pockets_2_type1_fit0.png',
);
$front_pos = json_encode($front_pos);
?>
<script id="main">

    (function() {

        //var fabric_color="#00f900";
        $fabric_color = "#5DCAC2";

        var $ = function(id) {
            return document.getElementById(id)
        };

        function applyFilter(index, filter) {
            var obj = canvas.getActiveObject();
            obj.filters[index] = filter;
            obj.applyFilters(canvas.renderAll.bind(canvas));
        }

        function applyFilterValue(index, prop, value) {
            var obj = canvas.getActiveObject();
            if (obj.filters[index]) {
                obj.filters[index][prop] = value;
                obj.applyFilters(canvas.renderAll.bind(canvas));
            }
        }


        //  function add_image(index,img){
        //   var filters[index]
        function add_image(img, obj, i) {
            var tmp = fabric.Image.fromURL(img, function(img) {
                img.filters.push(new fabric.Image.filters.Blend({
                    color: $fabric_color,
                    mode: 'darken'
                }));
                img.applyFilters(obj.renderAll.bind(obj));
                var oImg = img.set({left: 50, top: 0}).scale(0.9);
                obj.add(oImg);
            });
        }

        var canvas = new fabric.Canvas('c');


        $front_pos = jQuery.parseJSON('<?php echo $front_pos ?>');
        
        
        function set_layers(layers,canvas_obj){
            canvas_obj.clear();
            var i=0;
            jQuery.each(layers, function(key, img) {
                add_image(img,canvas_obj,i);
                i++;
            });
        }

        jQuery(document).ready(function() {
                //add_image('img/body_crossed_boton_standard_fit0_long.png', canvas);
                //add_image('img/pockets_chest_type_welt.png', canvas);
                //add_image('img/pockets_2_type1_fit0.png', canvas);
                set_layers($front_pos,canvas);
                jQuery(document).on('click', '#blend', function() {
                    if (jQuery(this).is(':checked')) {
                        $fabric_color = "#00f900";
                        $front_pos['font_pos_1']='img/body_crossed_boton_standard_fit0_short.png';
                    } else {
                        $fabric_color = "#5DCAC2";
                        $front_pos['font_pos_1']='img/body_crossed_boton_standard_fit0_long.png';
                    }
                    console.log($front_pos);
                    set_layers($front_pos,canvas);

                });
                
        });

//        fabric.Object.prototype.transparentCorners = false;
//        var $ = function(id) {
//            return document.getElementById(id)
//        };
//
//        function applyFilter(index, filter) {
//            var obj = canvas.getActiveObject();
//            obj.filters[index] = filter;
//            obj.applyFilters(canvas.renderAll.bind(canvas));
//        }
//
//        function applyFilterValue(index, prop, value) {
//            var obj = canvas.getActiveObject();
//            if (obj.filters[index]) {
//                obj.filters[index][prop] = value;
//                obj.applyFilters(canvas.renderAll.bind(canvas));
//            }
//        }
//
//        fabric.Object.prototype.padding = 5;
//        fabric.Object.prototype.transparentCorners = false;

//        var canvas = this.__canvas = new fabric.Canvas('c'),
//                f = fabric.Image.filters;
//
//        fabric.Image.fromURL('bg.png', function(img) {
//            canvas.backgroundImage = img;
//            canvas.backgroundImage.width = 600;
//            canvas.backgroundImage.height = 600;
//        });


//        canvas.on({
//            'object:selected': function() {
//                fabric.util.toArray(document.getElementsByTagName('input'))
//                        .forEach(function(el) {
//                    el.disabled = false;
//                })
//
//                var filters = ['grayscale', 'invert', 'remove-white', 'sepia', 'sepia2',
//                    'brightness', 'noise', 'gradient-transparency', 'pixelate',
//                    'blur', 'sharpen', 'emboss', 'tint', 'multiply', 'blend'];
//
//                for (var i = 0; i < filters.length; i++) {
//                    $(filters[i]).checked = !!canvas.getActiveObject().filters[i];
//                }
//            },
//            'selection:cleared': function() {
//                fabric.util.toArray(document.getElementsByTagName('input'))
//                        .forEach(function(el) {
//                    el.disabled = true;
//                })
//            }
//        });

//        fabric.Image.fromURL('printio.png', function(img) {
//            var oImg = img.set({left: 50, top: 100, angle: -15}).scale(0.9);
//            canvas.add(oImg).renderAll();
//            canvas.setActiveObject(oImg);
//        });

//        $('test').onclick = function() {
//            applyFilter(14, this.checked && new f.Blend({
//                color: '#00f900',
//                mode: 'darken'
//            }));
//        };


    })();
</script>

</head>


</html>