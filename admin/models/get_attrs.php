<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $post, $wpdb, $product;
$post_id = $post->ID;
if($post_id=='') $post_id=$product->id;
/* Start:- array for default value of each attribute */
$attrs=get_post_meta($post_id, '_wca_attribute_data', true);

$category_id=1;
$categories=array(
    '1'=>'trenchcoat',
);

if ($attrs != '') {
    $default_values = unserialize($attrs);
} else {
    $default_values = array(
        'wca_trenchcoat_style' => 'simple',
        'wca_trenchcoat_length' => 'long',
        'wca_trenchcoat_fit' => '1',
        'wca_trenchcoat_closure' => 'boton',
        'wca_trenchcoat_closure_type_boton' => 'standard',
        'wca_trenchcoat_pockets' => '3',
        'wca_trenchcoat_pockets_type' => '7',
        'wca_trenchcoat_chest_pocket' => 'vertical',
        'wca_trenchcoat_belt' => 'sewing',
        'wca_trenchcoat_backcut' => '1',
        'wca_trenchcoat_sleeve' => 'button',
        'wca_trenchcoat_shoulder' => '1',
        'wca_trenchcoat_back_lapel' => '1',
        'wca_trenchcoat_fabric_type' => '2',
        'wca_trenchcoat_interior_type' => '1',
        'wca_trenchcoat_interior' => '2',
        'wca_trenchcoat_embroidery_font' => '1',
        'wca_embroidery' => '1',
        'wca_embroidery_text'=>'Maulik b kanani',
        'wca_embroidary_color' => '2',
        'wca_trenchcoat_neck_lapel' => '1',
        'wca_neck_lining' => '1',
        'wca_trenchcoat_elbow_patch' => '1',
        'wca_elbow_patch' => '1',
        'wca_trenchcoat_btn_thread_apply' => 'all',
        'wca_button_hilo_ojal' => '1',
        'wca_buton_thread' => '1',
        'wca_buton_hole_thread' => '1',
        'wca_category' => 'trenchcote',
    );
}
/* End:- array for default value of each attribute */

/* Start:- array for set price of all attributes */
$attributes_old = array(
    'wca_embroidery' => array(
        '0' => array(
            'price' => '0'
        ),
        '1' => array(
            'price' => '9.95'
        ),
    ),
    'wca_neck_lining' => array(
        '0' => array(
            'price' => '0'
        ),
        '1' => array(
            'price' => '3.50'
        ),
        '2' => array(
            'price' => '3.50'
        ),
        '3' => array(
            'price' => '3.50'
        ),
        '4' => array(
            'price' => '3.50'
        ),
        '5' => array(
            'price' => '3.50'
        ),
        '6' => array(
            'price' => '3.50'
        ),
    ),
    'wca_elbow_patch' => array(
        '0' => array(
            'price' => '0'
        ),
        '1' => array(
            'price' => '12.95'
        ),
        '2' => array(
            'price' => '12.95'
        ),
        '3' => array(
            'price' => '12.95'
        ),
        '4' => array(
            'price' => '12.95'
        ),
    ),
    'wca_buton_thread' => array(
        '0' => array(
            'price' => '0'
        ),
        '1' => array(
            'price' => '1.75'
        ),
        '2' => array(
            'price' => '1.75'
        ),
        '3' => array(
            'price' => '1.75'
        ),
        '4' => array(
            'price' => '1.75'
        ),
        '5' => array(
            'price' => '1.75'
        ),
        '6' => array(
            'price' => '1.75'
        ),
        '7' => array(
            'price' => '1.75'
        ),
        '8' => array(
            'price' => '1.75'
        ),
        '9' => array(
            'price' => '1.75'
        ),
        '10' => array(
            'price' => '1.75'
        ),
    ),
    'wca_buton_hole_thread' => array(
        '0' => array(
            'price' => '0'
        ),
        '1' => array(
            'price' => '1.75'
        ),
        '2' => array(
            'price' => '1.75'
        ),
        '3' => array(
            'price' => '1.75'
        ),
        '4' => array(
            'price' => '1.75'
        ),
        '5' => array(
            'price' => '1.75'
        ),
        '6' => array(
            'price' => '1.75'
        ),
        '7' => array(
            'price' => '1.75'
        ),
        '8' => array(
            'price' => '1.75'
        ),
        '9' => array(
            'price' => '1.75'
        ),
        '10' => array(
            'price' => '1.75'
        ),
    ),
);

/* END :- array for set price of all attributes */



/* start:- array for facric related butoons and zippers and linings */
$fabrics=$wpdb->get_results("select * from ".FABRICS." where status='1' ");
$all_extra_linings=array();
$all_fabric_data=array();
$attributes['wca_trenchcoat_interior']=array();

if(count($fabrics)>0){
    foreach($fabrics as $fabric){
        $all_fabric_data[$fabric->id]=array(
            'titel' => $fabric->titel,
            'ref' => $fabric->reference,
            'composition' => $fabric->material,
            'price' =>  $fabric->price,
            'button' => $fabric->button_id,
            'zipper' => $fabric->zipper_id,
            'lining' => $fabric->lining_id,
            'color' =>  $fabric->color
        );
        
        $fabric_linigs=array();
        $tmplinigs=$fabric->lining_id.','.$fabric->total_linings;
        $linings=$wpdb->get_results("select * from ".LINING." where status='1' and id IN($tmplinigs)");
        foreach($linings as $lining){
            $fabric_linigs[$lining->id]=array(
                                        'titel' => $lining->titel,      // tile of lining fabric               
                                        'price' => $lining->price,         // price of lining fabric
                                        'color' => $lining->color,           // color of lining fabric
                                        'pattern' => $lining->pattern,     // pattern of lining fabric  
                                        'material' => $lining->material // material of linig   
                                        );
            $attributes['wca_trenchcoat_interior'][$lining->id]=array('price' => $lining->price);
        }
        $all_extra_linings[$fabric->id]=$fabric_linigs;
    }
}
$attributes['wca_trenchcoat_fabric_type']=$all_fabric_data;
$fabric_data = json_encode($all_fabric_data);
/* End:- array for facric related butoons  and zippers and linings */


/* Start:- array for lning related fbrics */
$extra_linings = json_encode($all_extra_linings);
/* End:- array for lning related fbrics */



/* Start:- Craetea a arry for calculation of price in js of each attributes */
$attribute_price = array();
foreach ($attributes as $attr_slug => $subattributes):
    if (is_array($subattributes)):
        $attribute_price['base_price'] = 0;      // For bacse price of the product 
        foreach ($subattributes as $value => $sub_data):
            $k = $attr_slug . '**NIS**' . $value;
            $attribute_price[$k] = $sub_data['price'];
        endforeach;
    endif;
endforeach;
/* END:- Craetea a arry for calculation of price in js of each attributes */

$tmp_attribute_datas=$wpdb->get_results("SELECT CONCAT( `attr_name` , '**NIS**', `value` ) AS attr_key, wp_wca_attr_lable . * from ".ATTR_LABEL." where category_id=$category_id and cart_variable='1'");
$total_arrtibutes=array();
$attribute_all_data=array();
$atribute_slugs=array();
foreach($tmp_attribute_datas as $tmp_attribute_data){
    if($tmp_attribute_data->value != '')
         $attribute_price[$tmp_attribute_data->attr_key]=$tmp_attribute_data->price;
    
    $attribute_all_data[$tmp_attribute_data->attr_key]=$tmp_attribute_data;
    $atribute_slugs[$tmp_attribute_data->attr_name]='';
}

$attribute_price['wca_embroidery**NIS**0']=0;
$attribute_price['wca_neck_lining**NIS**0']=0;
$attribute_price['wca_elbow_patch**NIS**0']=0;
$attribute_price['wca_button_hilo_ojal**NIS**0']=0;

/* Start:- Array for get attribute key in price calulation */
$atribute_slugs = array_keys($atribute_slugs);
$atribute_slugs[]='wca_trenchcoat_fabric_type';
$atribute_slugs[]='wca_trenchcoat_interior';
$atribute_slugs = json_encode($atribute_slugs);
/* End :-  Array for get attribute key in price calulation */



/* Start :- create  array for lining as pre knockout JSON format */
$knockout_extralinigs = array();
foreach ($all_extra_linings as $fabric_id => $linigs) {
    $lining = array();
    foreach ($linigs as $lining_id => $values) {
        $values['fabric_id'] = $lining_id;
        $values['backgroud_url'] = "url(" . wca_image_url . "/3d/man/trenchcoat/linings/$lining_id/thumb.jpg) top center no-repeat";
        $lining[] = $values;
    }
    $knockout_extralinigs[$fabric_id] = $lining;
}
/* End:- create  array for lining as pre knockout JSON format */

/* Start :- Array for ste3 configration patch, nech, button thread& hole thread and embroidery */
$extra_relationship = array(
    'wca_trenchcoat_neck_lapel' => array(
        'default' => '0', // Default Value for item
        'hidden_name' => 'wca_neck_lining', // hidden input name for item
        'class' => 'wca_neck_lining', // item image parent div class -> a -> img  
        'first_rel' => '1', // First div rel 
        'main_div' => '#main_neck_lapel'
    ),
    'wca_trenchcoat_elbow_patch' => array(
        'default' => '0', // Default Value for item
        'hidden_name' => 'wca_elbow_patch', // hidden input name for item
        'class' => 'wca_elbow_patch', // item image parent div class -> a -> img  
        'first_rel' => '1', // First div rel  
        'main_div' => '#main_elbow_patch'
    ),
    'wca_buton_thread' => array('default' => '0', // Default Value for item
        'hidden_name' => 'wca_buton_thread', // hidden input name for item
        'class' => 'wca_buton_thread', // item image parent div class -> a -> img  
        'first_rel' => '1', // First div rel  
        'main_div' => '#main_buton_thread'
    ),
    'wca_buton_hole_thread' => array(
        'default' => '0', // Default Value for item
        'hidden_name' => 'wca_buton_hole_thread', // hidden input name for item
        'class' => 'wca_buton_hole_thread', // item image parent div class -> a -> img  
        'first_rel' => '1', // First div rel  
        'main_div' => '#main_buton_thread'
    ),
    'wca_embroidary_color' => array(
        'default' => '0', // Default Value for item
        'hidden_name' => 'wca_embroidary_color', // hidden input name for item
        'class' => 'wca_embroidary_color', // item image parent div class -> a -> img  
        'first_rel' => '1', // First div rel
        'main_div' => '#main_embroidery'
    ),
    'wca_embroidery_text' => array(
        'default' => '0',                               // Default Value for item
        'hidden_name' => 'wca_embroidery_text',         // hidden input name for item
        'class' => 'not_define',                        // item image parent div class -> a -> img  
        'first_rel' => '1',                             // First div rel
        'main_div' => '#main_embroidery'
    ),
    'wca_trenchcoat_interior_type' => array(
        'default' => '0', // Default Value for item
        'hidden_name' => 'wca_trenchcoat_interior', // hidden input name for item
        'class' => 'wca_trenchcoat_interior', // item image parent div class -> a -> img  
        'first_rel' => '1', // First div rel
        'main_div' => '#main_interior'                   // Main parent div  of H2 
    ),
);

$extra_relationship = json_encode($extra_relationship);
/* end :- Array for ste3 configration patch, nech, button thread& hole thread and embroidery */

/* Start :- Array for ste3 configration embroidery  fonts and colors */
$embroidary_attributes = array(
    'fonts' => array(
        '1' => 'Arial',
        '2' => 'Monotype Corsiva',
        '3' => 'Times New Roman',
        '4' => 'Rockwell',
    ),
    'color' => array(
        '1' => '#ffcf10',
        '2' => '#022061',
        '3' => '#ffffff',
        '4' => '#a48239',
        '5' => '#4d020d',
        '6' => '#331b00',
        '7' => '#000000',
        '8' => '#b80e58',
        '9' => '#0ba133',
        '10' => '#c20000',
    )
);
$embroidary_attributes = json_encode($embroidary_attributes);
/* End :- Array for ste3 configration embroidery  fonts and colors */

$button_threads=$wpdb->get_results("select * from ".BUTTON_HILO." where status='1'");
$button_holes=$wpdb->get_results("select * from ".BUTTON_OJAL." where status='1'");
$neck_linings=$wpdb->get_results("select * from ".NECK_LINING." where status='1'");
$elbow_patches=$wpdb->get_results("select * from ".ELBOW_PATCHES." where status='1'");

$plugins_url = plugins_url('woocommerce-custom-attribute');



$category = $categories[$category_id];                            // Current category                                    
$fabric = $default_values['wca_trenchcoat_fabric_type'];          // Current fabric

$fabric_datas=wca_fabric::get_single_row($fabric);
$fabric_color=$fabric_datas[color];

$button = $all_fabric_data[$fabric]['button'];                   // Button for current fabric 
$zipper = $all_fabric_data[$fabric]['zipper'];                   // Zipper for current fabric 

$image_category = wca_image_url . "/3d/man/$category";           // category image url
$image_fabric_url = "$image_category/fabric/$fabric";            // category fabric image url
$image_front_url = "$image_fabric_url/front";                    // category image url for front side
$image_back_url = "$image_fabric_url/back";                      // category image url for back side 
$button_url = "$image_category/botones/$button";                 // category image url for buttons
$zipper_url = "$image_category/zipper/$zipper";                  // category image url for zippers
$man_url = wca_image_url . "/man/$category";                     // category image url for satatic man       
$blank_image = $plugins_url . '/assets/images/blank.png';        // image url for Blankk image   

$lining_fabrics = json_encode($knockout_extralinigs);              // aall lining realted to fabrics for knock out js     
$lining_fabric = 1;
?>
