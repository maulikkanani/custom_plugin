<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


$masters = array(
    'buttons' => '1',
    'zipper' => '2',
    'button_hilo' => '3',
    'button_ojal' => '4',
    'lining' => '5',
    'fabric' => '6',
    'neck_lining' => '7',
    'elbow_patches' => '8',
    'fabric_color' => '9',
);


$master_images = array(
    '1' => array(// Master id and neccery imagege of master                     
        'boton_belt_back_lapel_1.png' => 'Back Laple',
        'boton_belt_sewing_fit0.png' => 'Belt Sewing Waisted',
        'boton_belt_sewing_fit1.png' => 'Belt Sewing straight',
        'boton_body_crossed_boton_standard.png' => 'Double breasted',
        'boton_body_simple_boton_hide.png' =>'Single breasted Hide',
        'boton_body_simple_boton_standard.png' => 'Single breasted',
        'boton_shoulder_tape.png' => 'Epaulettes',
        'boton_sleeve.png' => 'Sleeves Buttons',
        'big.jpg' => 'Main image',
    ),
    '2' => array(
        'crossed_zipper_standard_long.png' => 'Double breasted Long',
        'crossed_zipper_standard_short.png' => 'Double breasted short',
        'simple_zipper_hide_long.png' => 'Single breasted long hide',
        'simple_zipper_hide_short.png' => 'Single breasted short hide',
        'simple_zipper_standard_long.png' => 'Single breasted long standard',
        'simple_zipper_standard_short.png' => 'Single breasted short standard',
    ),
    '3' => array(
        'back_lapel.png' => 'Back Laple Butoon thread ',
        'belt_sewing_fit0.png' => 'Belt Sewing Waisted Butoon thread ',
        'belt_sewing_fit1.png' => 'Belt Sewing straight Butoon thread ',
        'body_crossed_boton_standard.png' => 'Double breasted Butoon thread ',
        'body_simple_boton_standard.png' => 'Single breasted Butoon thread ',
        'body_simple_boton_hide.png' => 'Single breasted Hide Butoon thread ',
        'shoulder.png' => 'Epaulettes Butoon thread ',
        'sleev.png' => 'Sleeves Buttons Butoon thread ',
        'hilo.png' => 'Main image Butoon thread ',
        'hilo_icon.jpg' => 'Butoon thread icon',
    ),
    '4' => array(
        'belt_sewing_fit0.png' => 'Belt Sewing Waisted Ojal',
        'belt_sewing_fit1.png' => 'Belt Sewing straight Ojal',
        'body_crossed_boton_standard.png' => 'Double breasted Ojal',
        'body_simple_boton_standard.png' => 'Single breasted Ojal',
        'body_simple_boton_hide.png' => 'Single breasted Hide Ojal',
        'shoulder.png' => 'Epaulettes Ojal',
        'sleev.png' => 'Sleeves Buttons Ojal',
        'ojal.png' => 'Main image Ojal',
        'ojal_icon.jpg' => 'Button hole icon',
    ),
    '5' => array(
        'linings.png' => 'Coat linings image',
        'thumb.jpg' => 'Lining fabric  thumb',
        'big.jpg' => 'Lining fabric image',
    ),
    '6' => array(
        'big.jpg' => 'Main image',
        'thumb.jpg' => 'Thumb image',
     ),
    '7' => array(
        'neck_lining.png' => 'Neck Lining',
        'neck_lining_icon.jpg' => 'Neck Lining Icon',
    ),
    '8' => array(
        'elbow_patches.png' => 'Elbow patches',
        'elbow_patches_icon.jpg' => 'Elbow Patches Icon',
    ),
    '9' => array(
        'front_belt_loose_fit0.png' => 'Front belt loose straight',
        'front_belt_loose_fit1.png' => 'Front belt loose waisted',
        
        'front_body_crossed_boton_standard_fit0_long.png' => 'Front body double brested button standard straight long ',
        'front_body_crossed_boton_standard_fit0_short.png' => 'Front body double brested button standard straight short',
        'front_body_crossed_boton_standard_fit1_long.png' => 'Front body double brested button standard waisted long',
        'front_body_crossed_boton_standard_fit1_short.png' => 'Front body double brested button standard waisted short',
        
        'front_body_crossed_zipper_standard_fit0_long.png' => 'Front body double brested Zipper standard straight long',
        'front_body_crossed_zipper_standard_fit0_short.png' => 'Front body double brested Zipper standard straight short',
        'front_body_crossed_zipper_standard_fit1_long.png' => 'Front body double brested Zipper standard waisted long',
        'front_body_crossed_zipper_standard_fit1_short.png' => 'Front body double brested Zipper standard waisted Short',
        
        'front_body_simple_boton_hide_fit0_long.png' => 'Front body Single brested button hide straight long ',
        'front_body_simple_boton_hide_fit0_short.png' => 'Front body Single brested button hide straight short',
        'front_body_simple_boton_hide_fit1_long.png' => 'Front body Single brested button hide waisted long',
        'front_body_simple_boton_hide_fit1_short.png' => 'Front body Single brested button hide waisted short',
        'front_body_simple_boton_standard_fit0_long.png' => 'Front body Single brested button standard straight long',
        'front_body_simple_boton_standard_fit0_short.png' => 'Front body Single brested button standard straight short',
        'front_body_simple_boton_standard_fit1_long.png' => 'Front body Single brested button standard waisted long',
        'front_body_simple_boton_standard_fit1_short.png' => 'Front body Single brested button standard waisted short',
        
       
        'front_body_simple_zipper_hide_fit0_long.png' => 'Front body Single brested Zipper hide straight long ',
        'front_body_simple_zipper_hide_fit0_short.png' => 'Front body Single brested Zipper hide straight short',
        'front_body_simple_zipper_hide_fit1_long.png' => 'Front body Single brested Zipper hide waisted long',
        'front_body_simple_zipper_hide_fit1_short.png' => 'Front body Single brested Zipper hide waisted short',
        'front_body_simple_zipper_standard_fit0_long.png' => 'Front body Single brested Zipper standard straight long',
        'front_body_simple_zipper_standard_fit0_short.png' => 'Front body Single brested Zipper standard straight short',
        'front_body_simple_zipper_standard_fit1_long.png' => 'Front body Single brested Zipper standard waisted long',
        'front_body_simple_zipper_standard_fit1_short.png' => 'Front body Single brested Zipper standard waisted short',
       
        'front_lupa_forro.png' => 'Front lupa_forro',
        
        'front_pockets_2_type1_fit0.png' => 'Front 2 pockets straight Flaps',
        'front_pockets_2_type1_fit1.png' => 'Front 2 pockets waisted Flaps',
        'front_pockets_2_type2_fit0.png' => 'Front 2 pockets straight Double Welt',
        'front_pockets_2_type2_fit1.png' => 'Front 2 pockets waisted Double Welt',
        'front_pockets_2_type3_fit0.png' => 'Front 2 pockets straight Patched',
        'front_pockets_2_type3_fit1.png' => 'Front 2 pockets waisted Patched',
        'front_pockets_2_type4_fit0.png' => 'Front 2 pockets straight Diagonal',
        'front_pockets_2_type4_fit1.png' => 'Front 2 pockets waisted Diagonal',
        'front_pockets_2_type5_fit0.png' => 'Front 2 pockets straight Diag. zipper',
        'front_pockets_2_type5_fit1.png' => 'Front 2 pockets waisted Diag. zipper',
        'front_pockets_3_type6_fit0.png' => 'Front 3 pockets straight Flaps',
        'front_pockets_3_type6_fit1.png' => 'Front 3 pockets waisted Flaps',
        'front_pockets_3_type7_fit0.png' => 'Front 3 pockets straight Double Welt',
        'front_pockets_3_type7_fit1.png' => 'Front 3 pockets waisted Double Welt',
        
        'front_pockets_chest_type_patched.png' => 'Front chest pocket Patched',
        'front_pockets_chest_type_vertical.png' => 'Front chest pocket vertical',
        'front_pockets_chest_type_welt.png' => 'Front chest pocket welt',
        'front_pockets_chest_type_zipper.png' => 'Front chest pocket zipper',
        
        'front_shoulder.png' => 'Front shoulder',
        'front_sleeve_button.png' => 'Front sleeve button',
        'front_sleeve_tape.png' => 'Front sleeve tape',
        
        'back_0_cortes_fit0_long.png' => 'Back ventless straight long',
        'back_0_cortes_fit0_short.png' => 'Back ventless straight short',
        'back_0_cortes_fit1_long.png' => 'Back  ventless waisted long',
        'back_0_cortes_fit1_short.png' => 'Back  ventless waisted short',
        
        'back_1_cortes_fit0_long.png' => 'Back  Center vent straight long',
        'back_1_cortes_fit0_short.png' => 'Back  Center vent straight short',
        'back_1_cortes_fit1_long.png' => 'Back  Center vent waisted long',
        'back_1_cortes_fit1_short.png' => 'Back  Center vent waisted short',
        
        'back_2_cortes_fit0_long.png' => 'Back  Side vents straight long',
        'back_2_cortes_fit0_short.png' => 'Back  Side vents straight short',
        'back_2_cortes_fit1_long.png' => 'Back  Side vents waisted long',
        'back_2_cortes_fit1_short.png' => 'Back  Side vents waisted short',
        
        'back_back_lapel_1.png' => 'Back laple',
        'back_belt_loose_fit0.png' => 'Back belt loose straight',
        'back_belt_loose_fit1.png' => 'Back belt loose waisted',
        'back_belt_sewing_fit0.png' => 'Back belt sewed straight',
        'back_belt_sewing_fit1.png' => 'Back belt sewed waisted',
        'back_sleeve_tape.png' => 'Back sleeve tape',
    ),
);


$fabric_colors_old=array(
    '1'=>'first color',
    '2'=>'second color',
    '3'=>'third color',
    '4'=>'fourth color',
    '5'=>'fifeth color',
    '6'=>'sixth color',
    '7'=>'seventh color',
    '8'=>'eighth color',
);

$fabric_colors=array();
$fabric_color_datas=$wpdb->get_results("select * From ". FABRIC_COLORS ." where status='1'");

foreach($fabric_color_datas as $fabric_color_data){
    $fabric_colors[$fabric_color_data->id]=$fabric_color_data->name;
}

$category = 'trenchcoat';                                        // Current category      
$image_category = wca_image_url . "/3d/man/$category";           // category image url



$category_dir = ABS_WCA . "assets/images/3d/man/$category";
$category_url = wca_image_url . "/3d/man/$category";
?>
