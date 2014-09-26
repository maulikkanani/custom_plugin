<?php

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
global $post, $wpdb;

$single_fabrics = $wpdb->get_row("select * from " . FABRICS . " where status='1' and id= $wca_attributes[wca_trenchcoat_fabric_type] ");
$single_fabrics_data[$single_fabrics->id] = array(
    'titel' => $single_fabrics->titel,
    'ref' => $single_fabrics->reference,
    'composition' => $single_fabrics->material,
    'price' => $single_fabrics->price,
    'button' => $single_fabrics->button_id,
    'zipper' => $single_fabrics->zipper_id,
    'lining' => $single_fabrics->lining_id,
    'color' => $single_fabrics->color
);
$fabric_data = json_encode($single_fabrics_data);
$category = $categories[$wca_attributes['wca_category']];
$image_category = wca_image_url . "/3d/man/$category";           // category image url
?>
