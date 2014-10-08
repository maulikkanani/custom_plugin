<?php

$front_pos_data = array();
$back_pos_data = array();

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

$a = $wca_attributes;
$coat_style = $a['wca_trenchcoat_style'];
$coat_clouser = $a['wca_trenchcoat_closure'];
$coat_clouser_type = $a['wca_trenchcoat_closure_type_boton'];
$coat_fit = $a['wca_trenchcoat_fit'];
$coat_length = $a['wca_trenchcoat_length'];
$coat_pocket = $a['wca_trenchcoat_pockets'];
$coat_pocket_type = $a['wca_trenchcoat_pockets_type'];
$coat_chest_pocket = $a['wca_trenchcoat_chest_pocket'];
$coat_belt = $a['wca_trenchcoat_belt'];
$coat_backcut = $a['wca_trenchcoat_backcut'];
$coat_sleeve = $a['wca_trenchcoat_sleeve'];
$coat_shoulder = $a['wca_trenchcoat_shoulder'];
$coat_back_lapel = $a['wca_trenchcoat_back_lapel'];
$coat_fabric_type = $a['wca_trenchcoat_fabric_type'];
$coat_interior_type = $a['wca_trenchcoat_interior_type'];
$coat_interior = $a['wca_trenchcoat_interior'];
$coat_embroidery_font = $a['wca_trenchcoat_embroidery_font'];
$coat_embroidery_cond = $a['wca_embroidery'];
$coat_embroidery_text = $a['wca_embroidery_text'];
$coat_embroidary_color = $a['wca_embroidary_color'];
$coat_neck_lining_cond = $a['wca_trenchcoat_neck_lapel'];
$coat_neck_lining = $a['wca_neck_lining'];
$coat_elbow_patch_cond = $a['wca_trenchcoat_elbow_patch'];
$coat_elbow_patch = $a['wca_elbow_patch'];
$coat_btn_thread_apply = $a['wca_trenchcoat_btn_thread_apply'];
$coat_button_hilo_ojal_cond = $a['wca_button_hilo_ojal'];
$coat_buton_thread = $a['wca_buton_thread'];
$coat_buton_hole_thread = $a['wca_buton_hole_thread'];

$front_pos_1 = 'body_' . $coat_style . '_' . $coat_clouser . '_' . $coat_clouser_type . '_fit' . $coat_fit . '_' . $coat_length . '.png';
$front_pos_data[1]['front_pos_1'] = array(
    'type' => 'fabric',
    'img_src' => $fabric_front_url . $front_pos_1,
);

$front_pos_data[2]['shadow_front_pos_1'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_fabric_front_url . $front_pos_1,
);

$back_pos_1 = $coat_backcut . '_cortes_fit' . $coat_fit . '_' . $coat_length . '.png';
$back_pos_data[1]['back_pos_1'] = array(
    'type' => 'fabric',
    'img_src' => $fabric_back_url . $back_pos_1,
);
$back_pos_data[2]['shadow_back_pos_1'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_fabric_back_url . $back_pos_1,
);


if ($coat_clouser == 'boton') {
    $front_pos_2 = 'boton_body_' . $coat_style . '_boton_' . $coat_clouser_type . '.png';
    $img_src = $boton_url;
    $shadow_url = $shadow_boton_url;
    $type = 'boton';
} else {
    //$front_pos_2 = 'boton_body_' . $coat_style . '_boton_' . $coat_clouser_type . '.png';
    $front_pos_2 =  $coat_style.'_zipper_'.$coat_clouser_type.'_'.$coat_length.'.png';
    $img_src = $zipper_url;
    $shadow_url = $shadow_zipper_url;
    $type = 'zipper';
}

$front_pos_data[3]['front_pos_2'] = array(
    'type' => $type,
    'img_src' => $img_src . $front_pos_2, //1400   (btn)
);
$front_pos_data[4]['shadow_front_pos_2'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_url . $front_pos_2, //1400   (btn)
);

/*Start for pocket change*/
$shadow_front_pos_3 = $front_pos_3 = $blank_image;
if ($coat_pocket != 0) {
    $front_pos_3 = $fabric_front_url . 'pockets_' . $coat_pocket . '_type' . $coat_pocket_type . '_fit' . $coat_fit . '.png';
    $shadow_front_pos_3 = $shadow_fabric_front_url . 'pockets_' . $coat_pocket . '_type' . $coat_pocket_type . '_fit' . $coat_fit . '.png';
}
$front_pos_data[5]['front_pos_3'] = array(
    'type' => 'fabric',
    'img_src' => $front_pos_3, //1500
);

$front_pos_data[6]['shadow_front_pos_3'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_3, //1500
);
/*End for pocket change*/

$shadow_front_pos_4 = $front_pos_4 = $blank_image;
if (!is_numeric($coat_chest_pocket)) {
    $front_pos_4 = $fabric_front_url . 'pockets_chest_type_' . $coat_chest_pocket . '.png';
    $shadow_front_pos_4 = $shadow_fabric_front_url . 'pockets_chest_type_' . $coat_chest_pocket . '.png';
}
   
$front_pos_data[7]['front_pos_4'] = array(
    'type' => 'fabric',
    'img_src' => $front_pos_4, //1500
);

$front_pos_data[8]['shadow_front_pos_4'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_4, //1500
);



$front_pos_5 = $shadow_front_pos_5 = $back_pos_3 = $shadow_back_pos_3 = $back_pos_2 = $shadow_back_pos_2 = $blank_image;
if ($coat_belt != '0') {
    if ($coat_belt != 'sewing') {
        $front_pos_5 = $fabric_front_url . 'belt_' . $coat_belt . '_fit' . $coat_fit . '.png';
        $shadow_front_pos_5 = $shadow_fabric_front_url . 'belt_' . $coat_belt . '_fit' . $coat_fit . '.png';
    } else {
        $front_pos_5 = $shadow_front_pos_5 = $blank_image;
        $back_pos_3 = $boton_url . 'boton_belt_' . $coat_belt . '_fit' . $coat_fit . '.png';
        $shadow_back_pos_3 = $shadow_boton_url . 'boton_belt_' . $coat_belt . '_fit' . $coat_fit . '.png';
    }
    $back_pos_2 = $fabric_back_url . 'belt_' . $coat_belt . '_fit' . $coat_fit . '.png';
    $shadow_back_pos_2 = $shadow_fabric_back_url . 'belt_' . $coat_belt . '_fit' . $coat_fit . '.png';
}
$front_pos_data[9]['front_pos_5'] = array(
    'type' => 'fabric',
    'img_src' => $front_pos_5, //1800
);
$front_pos_data[10]['shadow_front_pos_5'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_5, //1800
);

$back_pos_data[3]['back_pos_2'] = array(
    'type' => 'fabric',
    'img_src' => $back_pos_2, //1500
);

$back_pos_data[4]['shadow_back_pos_2'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_back_pos_2, //1500
);

$back_pos_data[5]['back_pos_3'] = array(
    'type' => 'boton',
    'img_src' => $back_pos_3, //1500
);

$back_pos_data[6]['shadow_back_pos_3'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_back_pos_3, //1500
);


$shadow_front_pos_6 = $front_pos_6 = $blank_image;
if ($coat_shoulder == 1) {
    $front_pos_6 = $fabric_front_url . 'shoulder.png';
    $shadow_front_pos_6 = $shadow_fabric_front_url . 'shoulder.png';

    $front_pos_9 = $boton_url . 'boton_shoulder_tape.png';
    $shadow_front_pos_9 = $shadow_boton_url . 'boton_shoulder_tape.png';
}

$front_pos_data[11]['front_pos_6'] = array(
    'type' => 'fabric',
    'img_src' => $front_pos_6, //1500
);

$front_pos_data[12]['shadow_front_pos_6'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_6, //1500
);

$front_pos_data[17]['front_pos_9'] = array(
    'type' => 'boton',
    'img_src' => $front_pos_9, //1500
);

$front_pos_data[18]['shadow_front_pos_9'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_9, //1500
);


$shadow_front_pos_8 = $front_pos_8 = $shadow_front_pos_7 = $front_pos_7 = $back_pos_4 = $shadow_back_pos_4 = $blank_image;
if ($coat_sleeve != '0') {
    $front_pos_7 = $fabric_front_url . 'sleeve_' . $coat_sleeve . '.png';
    $shadow_front_pos_7 = $shadow_fabric_front_url . 'sleeve_' . $coat_sleeve . '.png';
    if ($coat_sleeve == 'tape') {
        $type = 'fabric';
        $shadow_front_pos_8 = $front_pos_8 = $blank_image;
        $back_pos_4 = $fabric_front_url . 'sleeve_' . $coat_sleeve . '.png';
        $shadow_back_pos_4 = $shadow_fabric_front_url . 'sleeve_' . $coat_sleeve . '.png';
    } else if ($coat_sleeve == 'button') {
        $type = 'boton';
        $front_pos_8 = $boton_url . 'boton_sleeve.png';
        $shadow_front_pos_8 = $shadow_boton_url . 'boton_sleeve.png';
        $back_pos_4 = $shadow_back_pos_4 = $blank_image;
    }
}
 
$front_pos_data[13]['front_pos_7'] = array(
    'type' => $type,
    'img_src' => $front_pos_7, //1500
);

$front_pos_data[14]['shadow_front_pos_7'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_7, //1500
);

$front_pos_data[15]['front_pos_8'] = array(
    'type' => 'boton',
    'img_src' => $front_pos_8, //1500
);

$front_pos_data[16]['shadow_front_pos_8'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_8, //1500
);

$back_pos_data[7]['back_pos_4'] = array(
    'type' => 'fabric',
    'img_src' => $back_pos_4, //1500
);

$back_pos_data[8]['shadow_back_pos_4'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_back_pos_4, //1500
);


$back_pos_5=$shadow_back_pos_5=$back_pos_6=$shadow_back_pos_6=$blank_image;
if($coat_back_lapel == 1){
    $back_pos_5=$fabric_back_url.'back_lapel_1.png';
    $shadow_back_pos_5=$shadow_fabric_back_url.'back_lapel_1.png';
    $back_pos_6=$boton_url.'boton_belt_back_lapel_1.png';
    $shadow_back_pos_6=$shadow_boton_url.'boton_belt_back_lapel_1.png';
}
 
$back_pos_data[9]['back_pos_5'] = array(
    'type' => 'fabric',
    'img_src' => $back_pos_5, //1500
);

$back_pos_data[10]['shadow_back_pos_5'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_back_pos_5, //1500
);


$back_pos_data[11]['back_pos_6'] = array(
    'type' => 'boton',
    'img_src' => $back_pos_6, //1500
);

$back_pos_data[12]['shadow_back_pos_6'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_back_pos_6, //1500
);


$front_pos_16 = $shadow_front_pos_16 = $front_pos_17 = $shadow_front_pos_17 = $front_pos_18 = $shadow_front_pos_18 = $blank_image;
if($coat_interior > 0 && $coat_interior_type > 0){
    $front_pos_16=$lining_url.'linings.png';
    $shadow_front_pos_16=$shadow_lining_url. 'linings.png';
    $front_pos_17=$fabric_front_url.'lupa_forro.png';
    $shadow_front_pos_17=$shadow_fabric_front_url.'lupa_forro.png';
    $front_pos_18=$lining_url.'superior.png';
    $shadow_front_pos_18=$shadow_lining_url.'superior.png';
}

$front_pos_data[31]['front_pos_16'] = array(
    'type' => 'lining',
    'img_src' => $front_pos_16, //1500
);

$front_pos_data[32]['shadow_front_pos_16'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_16, //1500
);

$front_pos_data[33]['front_pos_17'] = array(
    'type' => 'fabric',
    'img_src' => $front_pos_17, //1500
);

$front_pos_data[34]['shadow_front_pos_17'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_17, //1500
);

$front_pos_data[35]['front_pos_18'] = array(
    'type' => 'dont_change',
    'img_src' => $front_pos_18, //1500
);

$front_pos_data[36]['shadow_front_pos_18'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_18, //1500
);


$front_pos_11=$shadow_from_pos_11=$back_pos_9=$shadow_back_pos_9=$back_pos_10=$shadow_back_pos_10=$front_pos_12=$shadow_from_pos_12=$front_pos_10=$shadow_from_pos_10=$blank_image;
if($coat_button_hilo_ojal_cond >0){
    if($coat_buton_thread >0){
        if($coat_sleeve == 'button'){
            $front_pos_11=$boton_hilo_url . 'sleev.png';
            $shadow_from_pos_11=$shadow_boton_hilo_url . 'sleev.png';
        }
        
        if($coat_btn_thread_apply=='all'){
             
            $back_pos_9=$boton_hilo_url . 'back_lapel.png';
            $shadow_back_pos_9=$shadow_boton_hilo_url . 'back_lapel.png';
            
            $back_pos_10=$boton_hilo_url . 'belt_sewing_fit'.$coat_fit.'.png';
            $shadow_back_pos_10=$shadow_boton_hilo_url . 'belt_sewing_fit'.$coat_fit.'.png';
           
             $front_pos_12=$boton_hilo_url . 'shoulder.png';
            $shadow_from_pos_12=$shadow_boton_hilo_url . 'shoulder.png';
            
             $front_pos_10=$boton_hilo_url . 'body_'.$coat_style.'_boton_'.$coat_clouser_type.'.png';
            $shadow_from_pos_10=$shadow_boton_hilo_url . 'body_'.$coat_style.'_boton_'.$coat_clouser_type.'.png';
            
        }
    }
}

$front_pos_data[19]['front_pos_10'] = array(
    'type' => 'hilo',
    'img_src' => $front_pos_10, //1500
);

$front_pos_data[20]['shadow_front_pos_10'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_10, //1500
);

$front_pos_data[21]['$front_pos_11'] = array(
    'type' => 'hilo',
    'img_src' => $front_pos_11, //1500
);

$front_pos_data[22]['shadow_front_pos_11'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_11, //1500
);

$front_pos_data[23]['front_pos_12'] = array(
    'type' => 'hilo',
    'img_src' => $front_pos_12, //1500
);

$front_pos_data[24]['shadow_front_pos_12'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_12, //1500
);


$back_pos_data[17]['back_pos_9'] = array(
    'type' => 'hilo',
    'img_src' => $back_pos_9, //1500
);

$back_pos_data[18]['shadow_back_pos_9'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_back_pos_9, //1500
);


$back_pos_data[19]['back_pos_10'] = array(
    'type' => 'hilo',
    'img_src' => $back_pos_10, //1500
);

$back_pos_data[20]['shadow_back_pos_10'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_back_pos_10, //1500
);




$front_pos_13=$shadow_from_pos_13=$back_pos_11=$shadow_back_pos_11=$front_pos_14==$shadow_from_pos_14=$front_pos_15=$shadow_from_pos_15=$blank_image;
if($coat_button_hilo_ojal_cond >0){
    if($coat_buton_thread >0){
        if($coat_sleeve == 'button'){
            $front_pos_14=$boton_ojal_url . 'sleev.png';
            $shadow_from_pos_14=$boton_ojal_url . 'sleev.png';
        }
        
        if($coat_btn_thread_apply=='all'){
            
            $back_pos_11=$boton_ojal_url . 'belt_sewing_fit'.$coat_fit.'.png';
            $shadow_back_pos_11=$boton_ojal_url . 'belt_sewing_fit'.$coat_fit.'.png';
           
             $front_pos_12=$boton_ojal_url . 'shoulder.png';
            $shadow_from_pos_12=$boton_ojal_url . 'shoulder.png';
            
             $front_pos_13=$boton_ojal_url . 'body_'.$coat_style.'_boton_'.$coat_clouser_type.'.png';
            $shadow_from_pos_13=$shadow_boton_ojal_url . 'body_'.$coat_style.'_boton_'.$coat_clouser_type.'.png';
            
        }
    }
}

$front_pos_data[25]['front_pos_13'] = array(
    'type' => 'ojal',
    'img_src' => $front_pos_13, //1500
);

$front_pos_data[26]['shadow_front_pos_13'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_13, //1500
);

$front_pos_data[27]['$front_pos_14'] = array(
    'type' => 'ojal',
    'img_src' => $front_pos_14, //1500
);

$front_pos_data[28]['shadow_front_pos_14'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_14, //1500
);

$front_pos_data[29]['front_pos_15'] = array(
    'type' => 'ojal',
    'img_src' => $front_pos_15, //1500
);

$front_pos_data[30]['shadow_front_pos_15'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_front_pos_15, //1500
);

$back_pos_data[21]['back_pos_11'] = array(
    'type' => 'ojal',
    'img_src' => $back_pos_11, //1500
);

$back_pos_data[22]['shadow_back_pos_11'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_back_pos_11, //1500
);

$back_pos_7=$shadow_back_pos_7=$blank_image;
if($coat_neck_lining_cond!=0){
      $back_pos_7=$neck_lining_url . 'neck_lining.png';
      $shadow_back_pos_7=$shadow_neck_lining_url . 'neck_lining.png';
}

$back_pos_data[13]['back_pos_7'] = array(
    'type' => 'neck_lining',
    'img_src' => $back_pos_7, //1500
);

$back_pos_data[14]['shadow_back_pos_7'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_back_pos_7, //1500
);


$back_pos_8=$shadow_back_pos_8=$blank_image;
if($coat_neck_lining_cond!=0){
      $back_pos_8=$elbow_patch_url. 'elbow_patches.png';
      $shadow_back_pos_8=$shadow_elbow_patch_url . 'elbow_patches.png';
}

$back_pos_data[15]['back_pos_8'] = array(
    'type' => 'elbow_patch',
    'img_src' => $back_pos_8, //1500
);

$back_pos_data[16]['shadow_back_pos_8'] = array(
    'type' => 'shadow',
    'img_src' => $shadow_back_pos_8, //1500
);

$front_pos=array();
$back_pos=array();

for($i=0; $i<=count($front_pos_data); $i++){
    if(is_array($front_pos_data[$i])){
        foreach($front_pos_data[$i] as $pos=>$img)
            $front_pos[$pos]=$img;
    }
}

for($i=0; $i<=count($back_pos_data); $i++){
    if(is_array($back_pos_data[$i])){
        foreach($back_pos_data[$i] as $pos=>$img)
            $back_pos[$pos]=$img;
    }
}


$layer_type_data = array(
    'fabric' => array(
        'color' => '#5DCAC2',
    ),
    'boton' => array(
        'color' => '',
    ),
    'zipper' => array(
        'color' => '',
    ),
    'hilo' => array(
        'color' => '',
    ),
    'ojal' => array(
        'color' => '',
    ),
    'lining' => array(
        'color' => '',
    ),
    'neck_lining' => array(
        'color' => '',
    ),
    'elbow_patch' => array(
        'color' => '',
    ),
    'shadow' => array(
        'color' => '',
    ),
    'dont_change' => array(
        'color' => '',
    ),
);
$layer_type_data = json_encode($layer_type_data);
$front_pos = json_encode($front_pos);
$back_pos = json_encode($back_pos);
?>
