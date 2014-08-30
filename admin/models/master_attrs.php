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
);


$master_images = array(
    '1' => array(// Master id and neccery imagege of master                     
        'boton_belt_back_lapel_1.png' => 'Back Laple',
        'boton_belt_sewing_fit0.png' => 'Belt Sewing Waisted',
        'boton_belt_sewing_fit1.png' => 'Belt Sewing straight',
        'boton_body_crossed_boton_standard.png' => 'Double breasted',
        'boton_body_simple_boton_hide.png' => 'Single breasted',
        'boton_body_simple_boton_standard.png' => 'Single breasted Hide',
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
        'body_simple_boton_hide.png' => 'Single breasted Butoon thread ',
        'body_simple_boton_standard.png' => 'Single breasted Hide Butoon thread ',
        'shoulder.png' => 'Epaulettes Butoon thread ',
        'sleev.png' => 'Sleeves Buttons Butoon thread ',
        'hilo.png' => 'Main image Butoon thread ',
        'hilo_icon.jpg' => 'Butoon thread icon',
    ),
    '4' => array(
        'belt_sewing_fit0.png' => 'Belt Sewing Waisted Ojal',
        'belt_sewing_fit1.png' => 'Belt Sewing straight Ojal',
        'body_crossed_boton_standard.png' => 'Double breasted Ojal',
        'body_simple_boton_hide.png' => 'Single breasted Ojal',
        'body_simple_boton_standard.png' => 'Single breasted Hide Ojal',
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
        'front_belt_loose_fit0.png' => 'Front belt_loose_fit0',
        'front_belt_loose_fit1.png' => 'Front belt_loose_fit1',
        'front_body_crossed_boton_standard_fit0_long.png' => 'Front body_crossed_boton_standard_fit0_long',
        'front_body_crossed_boton_standard_fit0_short.png' => 'Front body_crossed_boton_standard_fit0_short',
        'front_body_crossed_boton_standard_fit1_long.png' => 'Front body_crossed_boton_standard_fit1_long',
        'front_body_crossed_boton_standard_fit1_short.png' => 'Front body_crossed_boton_standard_fit1_short',
        'front_body_crossed_zipper_standard_fit0_long.png' => 'Front body_crossed_zipper_standard_fit0_long',
        'front_body_crossed_zipper_standard_fit0_short.png' => 'Front body_crossed_zipper_standard_fit0_short',
        'front_body_crossed_zipper_standard_fit1_long.png' => 'Front body_crossed_zipper_standard_fit1_long',
        'front_body_crossed_zipper_standard_fit1_short.png' => 'Front body_crossed_zipper_standard_fit1_short',
        'front_body_simple_boton_hide_fit0_long.png' => 'Front body_simple_boton_hide_fit0_long',
        'front_body_simple_boton_hide_fit0_short.png' => 'Front body_simple_boton_hide_fit0_short',
        'front_body_simple_boton_hide_fit1_long.png' => 'Front body_simple_boton_hide_fit1_long',
        'front_body_simple_boton_hide_fit1_short.png' => 'Front body_simple_boton_hide_fit1_short',
        'front_body_simple_boton_standard_fit0_long.png' => 'Front body_simple_boton_standard_fit0_long',
        'front_body_simple_boton_standard_fit0_short.png' => 'Front body_simple_boton_standard_fit0_short',
        'front_body_simple_boton_standard_fit1_long.png' => 'Front body_simple_boton_standard_fit1_long',
        'front_body_simple_boton_standard_fit1_short.png' => 'Front body_simple_boton_standard_fit1_short',
        'front_body_simple_zipper_hide_fit0_long.png' => 'Front body_simple_zipper_hide_fit0_long',
        'front_body_simple_zipper_hide_fit0_short.png' => 'Front body_simple_zipper_hide_fit0_short',
        'front_body_simple_zipper_hide_fit1_long.png' => 'vbody_simple_zipper_hide_fit1_long',
        'front_body_simple_zipper_hide_fit1_short.png' => 'Front body_simple_zipper_hide_fit1_short',
        'front_body_simple_zipper_standard_fit0_long.png' => 'Front body_simple_zipper_standard_fit0_long',
        'front_body_simple_zipper_standard_fit0_short.png' => 'Front body_simple_zipper_standard_fit0_short',
        'front_body_simple_zipper_standard_fit1_long.png' => 'Front body_simple_zipper_standard_fit1_long',
        'front_body_simple_zipper_standard_fit1_short.png' => 'Front body_simple_zipper_standard_fit1_short',
        'front_lupa_forro.png' => 'Front lupa_forro',
        'front_pockets_2_type1_fit0.png' => 'Front pockets_2_type1_fit0',
        'front_pockets_2_type1_fit1.png' => 'Front pockets_2_type1_fit1',
        'front_pockets_2_type2_fit0.png' => 'Front pockets_2_type2_fit0',
        'front_pockets_2_type2_fit1.png' => 'Front pockets_2_type2_fit1',
        'front_pockets_2_type3_fit0.png' => 'Front pockets_2_type3_fit0',
        'front_pockets_2_type3_fit1.png' => 'Front pockets_2_type3_fit1',
        'front_pockets_2_type4_fit0.png' => 'Front pockets_2_type4_fit0',
        'front_pockets_2_type4_fit1.png' => 'Front pockets_2_type4_fit1',
        'front_pockets_2_type5_fit0.png' => 'Front pockets_2_type5_fit0',
        'front_pockets_2_type5_fit1.png' => 'Front pockets_2_type5_fit1',
        'front_pockets_3_type6_fit0.png' => 'Front pockets_3_type6_fit0',
        'front_pockets_3_type6_fit1.png' => 'Front pockets_3_type6_fit1',
        'front_pockets_3_type7_fit0.png' => 'Front pockets_3_type7_fit0',
        'front_pockets_3_type7_fit1.png' => 'Front pockets_3_type7_fit1',
        'front_pockets_chest_type_patched.png' => 'Front pockets_chest_type_patched',
        'front_pockets_chest_type_vertical.png' => 'Front pockets_chest_type_vertical',
        'front_pockets_chest_type_welt.png' => 'Front pockets_chest_type_welt',
        'front_pockets_chest_type_zipper.png' => 'Front pockets_chest_type_zipper',
        'front_shoulder.png' => 'Front shoulder',
        'front_sleeve_button.png' => 'Front sleeve_button',
        'front_sleeve_tape.png' => 'Front sleeve_tape',
        'back_0_cortes_fit0_long.png' => 'Back 0_cortes_fit0_long',
        'back_0_cortes_fit0_short.png' => 'Back 0_cortes_fit0_short',
        'back_0_cortes_fit1_long.png' => 'Back 0_cortes_fit1_long',
        'back_0_cortes_fit1_short.png' => 'Back 0_cortes_fit1_short',
        'back_1_cortes_fit0_long.png' => 'Back 1_cortes_fit0_long',
        'back_1_cortes_fit0_short.png' => 'Back 1_cortes_fit0_short',
        'back_1_cortes_fit1_long.png' => 'Back 1_cortes_fit1_long',
        'back_1_cortes_fit1_short.png' => 'Back 1_cortes_fit1_short',
        'back_2_cortes_fit0_long.png' => 'Back 2_cortes_fit0_long',
        'back_2_cortes_fit0_short.png' => 'Back 2_cortes_fit0_short',
        'back_2_cortes_fit1_long.png' => 'Back 2_cortes_fit1_long',
        'back_2_cortes_fit1_short.png' => 'Back 2_cortes_fit1_short',
        'back_back_lapel_1.png' => 'Back back_lapel_1',
        'back_belt_loose_fit0.png' => 'Back belt_loose_fit0',
        'back_belt_loose_fit1.png' => 'Back belt_loose_fit1',
        'back_belt_sewing_fit0.png' => 'Back belt_sewing_fit0',
        'back_belt_sewing_fit1.png' => 'Back belt_sewing_fit1',
        'back_sleeve_tape.png' => 'Back sleeve_tape',
    ),
);


$category = 'trenchcoat';                                        // Current category      
$image_category = wca_image_url . "/3d/man/$category";           // category image url



$category_dir = ABS_WCA . "assets/images/3d/man/$category";
$category_url = wca_image_url . "/3d/man/$category";
?>
