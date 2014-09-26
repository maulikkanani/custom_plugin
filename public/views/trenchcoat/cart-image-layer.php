<script type="text/javascript">
    $default_attrs = jQuery.parseJSON('<?php echo $default_attrs ?>');

    $unique_class = '<?php echo $unique_class ?>';
    $fabric = $default_attrs.wca_trenchcoat_fabric_type;


    $fabric_data = jQuery.parseJSON('<?php echo $fabric_data ?>');
    $fabric_color = $fabric_data[$fabric].color;
    $buttons = $fabric_data[$fabric].button;
    $zipper = $fabric_data[$fabric].zipper;

    var blank_image = '<?php echo $blank_image ?>';
    var cat_url = '<?php echo $image_category ?>';
    var image_front_url = cat_url + '/fabric_color/' + $fabric_color + '/front';
    var image_back_url = cat_url + '/fabric_color/' + $fabric_color + '/back';
    var button_url = cat_url + '/botones/' + $buttons;
    var zipper_url = cat_url + '/zipper/' + $zipper;
    var linig_url = cat_url + '/linings';
    var category = '<?php echo $category ?>';
</script>

<div id="product_image" class="<?php echo $unique_class ?>">
    <div class="turn_arround">  
        <i class="fa fa-retweet"></i> <a id="change_position_single" class="change_position_single" data-rel="front" href="javascript:;">Turn around model</a>
    </div>
    <div>
        <div class="man_trenchcoat front" id="model_3d_preview">    
            <!-- pos for front end base-->
            <div class="layer" pos="0">
                <img src="<?php echo $plugins_url ?>/assets/images/3d/man/<?php echo $category ?>/suit/suit_front.png" style="z-index: 0;">
            </div>    
            <!-- pos for front main image-->
            <div class="layer" pos="1">
                <img style="z-index: 1000;">
            </div>   
            <!-- pos for front end pocket-->
            <div class="layer" pos="2">
                <img style="z-index: 1500;">
            </div>        
            <!-- pos for front end chest pocket-->
            <div class="layer" pos="3">
                <img src="" style="z-index: 1500;">
            </div>
            <!-- pos for not in use -->
            <div class="layer all_lining_imgs" pos="4">
                <img class="fabric_lining_img" src="<?php echo $blank_image ?>" style="z-index: 3000;">
                <img class="lining_img"src="<?php echo $blank_image ?>" style="z-index: 3010;">
                <img class="lining_base" src="<?php echo $blank_image ?>" style="z-index: 3020;">
            </div> 
            <!-- pos for front end belt-->
            <div class="layer" pos="5">
                <img style="z-index: 1800;">
            </div>
            <!-- pos for front end shoulder -->
            <div class="layer" pos="6">
                <img style="z-index: 1850;">
            </div>
            <!-- pos front end sleeve-->
            <div class="layer" pos="7">
                <img style="z-index: 2600;">
            </div>

            <!-- pos for front end clouser type-->
            <div class="layer layer_button ref_pos1" pos="8">
                <img style="z-index: 1400;">               
            </div>

            <!-- pos for front end sleev button-->
            <div class="layer layer_button ref_pos7" pos="9">
                <img style="z-index: 2750;">
            </div>

            <!-- pos front end shoulder button-->
            <div class="layer layer_button ref_pos6" pos="10">
                <img style="z-index: 2770;">
            </div>
            <!-- pos for not in use --><div class="layer" pos="11"></div>
            <!-- pos for not in use --><div class="layer" pos="12"></div>
            <!-- pos for not in use --><div class="layer" pos="13"></div>

            <!-- pos is used for front buttons hilo -->
            <div class="layer btn_hilo" pos="14">
                <img class="body" style="z-index: 2770;">
                <img class="sleev" style="z-index: 2770;">
                <img class="shoulder" style="z-index: 2770;">
            </div>

            <!-- pos is used for front buttons  ojal --> 
            <div class="layer btn_ojal" pos="15">
                <img class="body" style="z-index: 2770;">
                <img class="sleev" style="z-index: 2770;">
                <img class="shoulder" style="z-index: 2770;">
            </div>
        </div>

        <div class="man_trenchcoat back" id="model_3d_preview" style="display:none">    

            <!-- pos for back end base-->
            <div class="layer" pos="0">
                <img src="<?php echo $plugins_url ?>/assets/images/3d/man/<?php echo $category ?>/suit/suit_back.png" style="z-index: 0;">
            </div>    

            <!-- pos for back end base-->
            <div class="layer" pos="1">
                <img src="" style="z-index: 1000;">
            </div>   

            <!-- pos not in use -->
            <div class="layer" pos="2">
<!--                <img src="" style="z-index: 1500;">-->
            </div>      

            <!-- pos not in use  -->
            <div class="layer" pos="3">
<!--                <img src="" style="z-index: 1600;">-->
            </div>

            <!-- pos not in use  -->
            <div class="layer" pos="4">
<!--                <img src="" style="z-index: 1700;">-->
            </div> 

            <!-- pos for back end belt-->
            <div class="layer" pos="5">
                <img src="" style="z-index: 1800;">
            </div>

            <!-- pos for back end belt button -->
            <div class="layer" pos="6">
                <img src="" style="z-index: 1900;">
            </div>

            <!-- pos for back end sleev tape-->
            <div class="layer" pos="7">
                <img src="" style="z-index: 2600;">
            </div>

            <!-- pos not in use  -->
            <div class="layer" pos="8"></div>

            <!-- pos not in use  -->
            <div class="layer" pos="9"></div>

            <!-- pos for back end back lable -->
            <div class="layer" pos="10">
                <img src="" style="z-index: 2700;">
            </div>


            <!-- pos for back end back lable button-->
            <div class="layer ref_pos_10" pos="11">
                <img src="" style="z-index: 2750;">
            </div>

            <!-- pos for back end neck lining-->
            <div class="layer" pos="12">
                <img src="" style="z-index: 2760;">
            </div>

            <!-- pos for back end elbow patches-->
            <div class="layer" pos="13">
                <img src="" style="z-index: 2770;">
            </div>

            <!-- pos is used for back buttons hilo -->
            <div class="layer btn_hilo" pos="14">
                <img class="back_lapel" src="" style="z-index: 2770;">
                <img class="belt" src="" style="z-index: 2770;">
            </div>

            <!-- pos is used for back buttons  ojal --> 
            <div class="layer btn_ojal" pos="15">
                <img class="belt" src="" style="z-index: 2770;">
            </div>

        </div>

    </div>

</div>
<script type="text/javascript">

    jQuery(document).trigger("single-set-pos-1");
    jQuery(document).trigger("single-set-pos-3");
    jQuery(document).trigger("single-set-pos-5");
    jQuery(document).trigger("single-set-pos-6");
    jQuery(document).trigger("single-set-pos-7");
    jQuery(document).trigger("single-set-pos-8");
    jQuery(document).trigger('single-extra-linings');
    jQuery(document).trigger("single-back-pos-10");
    jQuery(document).trigger("single-set-pos-2");
    jQuery(document).trigger('single-back-pos-12');
    jQuery(document).trigger('single-back-pos-13');
    jQuery(document).trigger('single-change-button-thread');
    jQuery(document).trigger('single-change-button-hole-thread');
    
</script>