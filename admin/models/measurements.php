<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly



$length_units = 'cm';
$weight_units = 'lb';

$measurments_cm = array(
    'wca_coat_length' => array(
        'element' => 'wca_coat_length',
        'min' => 20,
        'max' => 100,
        'estimate' => 0,
        'valid_min' => 25,
        'valid_max' => 80,
    ),
    'wca_sleeves_length' => array(
        'element' => 'wca_sleeves_length',
        'min' => 20,
        'max' => 100,
        'estimate' => 0,
        'valid_min' => 26,
        'valid_max' => 80,
    ),
    'wca_shoulders' => array(
        'element' => 'wca_shoulders',
        'min' => 20,
        'max' => 100,
        'estimate' => 0,
        'valid_min' => 27,
        'valid_max' => 80,
    ),
    'wca_chest' => array(
        'element' => 'wca_chest',
        'min' => 20,
        'max' => 100,
        'estimate' => 0,
        'valid_min' => 28,
        'valid_max' => 80,
    ),
    'wca_stomach' => array(
        'element' => 'wca_stomach',
        'min' => 20,
        'max' => 100,
        'estimate' => 0,
        'valid_min' => 29,
        'valid_max' => 80,
    ),
    'wca_hips' => array(
        'element' => 'wca_hips',
        'min' => 20,
        'max' => 100,
        'estimate' => 0,
        'valid_min' => 30,
        'valid_max' => 80,
    ),
    'wca_biceps' => array(
        'element' => 'wca_biceps',
        'min' => 20,
        'max' => 100,
        'estimate' => 29,
        'valid_min' => 41,
        'valid_max' => 80,
    ),
);
$measurments_inech = array();

foreach ($measurments_cm as $key => $value) {
    $value['min'] = floor($value['min'] * 0.4);
    $value['max'] = ceil($value['max'] * 0.4);
    $value['estimate'] = round($value['estimate'] * 0.4, 2);
    $value['valid_min'] = floor($value['valid_min'] * 0.4);
    $value['valid_max'] = ceil($value['valid_max'] * 0.4);
    $measurments_inech[$key] = $value;
}

    $show_div='inline_01_measure';
    if (is_array($default_measurement) && !empty($default_measurement) ) {
        $show_div='inline_04_measure';
        $length_units = $default_measurement['wca_measurment_unit'];
        $body_shape = $default_measurement['wca_constitution'];

        if ($length_units == 'cm') {

            foreach ($measurments_cm as $key => $value) {
                $value['estimate'] = round($default_measurement[$key], 2);
                $measurments_cm[$key] = $value;
            }


            foreach ($measurments_inech as $key => $value) {
                $value['estimate'] = round($default_measurement[$key] * 0.4, 2);
                $measurments_inech[$key] = $value;
            }
        } else if ($length_units == 'in') {

            foreach ($measurments_inech as $key => $value) {
                $value['estimate'] = round($default_measurement[$key], 2);
                $measurments_inech[$key] = $value;
            }

            foreach ($measurments_cm as $key => $value) {
                $value['estimate'] = round($default_measurement[$key] / 0.4, 2);
                $measurments_cm[$key] = $value;
            }
        }
    }


if ($length_units == 'cm')
    $default_measurments = json_encode($measurments_cm);
else
    $default_measurments = json_encode($measurments_inech);

$default_measurments_cm = json_encode($measurments_cm);
$default_measurments_inch = json_encode($measurments_inech);
?>
