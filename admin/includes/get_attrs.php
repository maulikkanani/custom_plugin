<?php

/*Start:- array for default value of each attribute*/
$default_values = array(
    'wca_trenchcoat_style' => array(
        'value' => 'simple'
    ),
    'wca_trenchcoat_length' => array(
        'value' => 'long'
    ),
    'wca_trenchcoat_fit' => array(
        'value' => '1'
    ),
    'wca_trenchcoat_closure' => array(
        'value' => 'boton'
    ),
    'wca_trenchcoat_closure_type_boton' => array(
        'value' => 'standard'
    ),
    'wca_trenchcoat_pockets' => array(
        'value' => '3'
    ),
    'wca_trenchcoat_pockets_type' => array(
        'value' => '7'
    ),
    'wca_trenchcoat_chest_pocket' => array(
        'value' => '0'
    ),
    'wca_trenchcoat_belt' => array(
        'value' => 'sewing'
    ),
    'wca_trenchcoat_backcut' => array(
        'value' => '1'
    ),
    'wca_trenchcoat_sleeve' => array(
        'value' => 'button'
    ),
    'wca_trenchcoat_shoulder' => array(
        'value' => '1'
    ),
    'wca_trenchcoat_back_lapel' => array(
        'value' => '1'
    ),
    'wca_trenchcoat_fabric_type' => array(
        'value' => '1'
    ),
    'wca_trenchcoat_interior_type' => array(
        'value' => '0'
    ),
    'wca_trenchcoat_interior' => array(
        'value' => '0'
    ),
    'wca_trenchcoat_embroidery_font' => array(
        'value' => '1'
    ),
    'wca_embroidary_color' => array(
        'value' => '1'
    ),
    'wca_trenchcoat_neck_lapel' => array(
        'value' => '1'
    ),
    'wca_trenchcoat_elbow_patch' => array(
        'value' => '1'
    ),
    'neck_lining' => array(
        'value' => '4'
    ),
    'elbow_patch' => array(
        'value' => '3'
    ),
    'wca_trenchcoat_btn_thread_apply' => array(
        'value' => 'all'
    ),
    'wca_buton_thread' => array(
        'value' => '5'
    ),
    'wca_buton_hole_thread' => array(
        'value' => '7'
    ),
);
/*End:- array for default value of each attribute*/

/* Start:- array for set price of all attributes */
$attributes=array(
                'wca_trenchcoat_style'=>array(
                                           'simple'=>array(
                                                     'price'=>'0'
                                                     ),   
                                            'crossed'=>array(
                                                     'price'=>'10'
                                                     ),   
                                        ),
                'wca_trenchcoat_length'=>array(
                                           'long'=>array(
                                                     'price'=>'0'
                                                     ),   
                                            'short'=>array(
                                                     'price'=>'10'
                                                     ),   
                                        ),
                'wca_trenchcoat_fit'=>array(
                                           '1'=>array(
                                                     'price'=>'0'
                                                     ),   
                                            '0'=>array(
                                                     'price'=>'10'
                                                     ),   
                                        ),
                'wca_trenchcoat_closure'=>array(
                                           'zipper'=>array(
                                                     'price'=>'0'
                                                     ),   
                                            'boton'=>array(
                                                     'price'=>'12'
                                                     ),   
                                        ),
                'wca_trenchcoat_closure_type_boton'=>array(
                                                        'hide'=>array(
                                                                  'price'=>'0'
                                                                  ),   
                                                         'standard'=>array(
                                                                  'price'=>'12'
                                                                  ),   
                                                     ),
               'wca_trenchcoat_pockets_type'=>array(
                                                 '0'=>array(
                                                          'price'=>'0'
                                                          ),   
                                                 '1'=>array(
                                                          'price'=>'10'
                                                          ),   
                                                 '2'=>array(
                                                          'price'=>'10'
                                                          ),   
                                                 '3'=>array(
                                                          'price'=>'10'
                                                          ),   
                                                 '4'=>array(
                                                          'price'=>'10'
                                                          ),   
                                                 '5'=>array(
                                                          'price'=>'10'
                                                          ),   
                                                 '6'=>array(
                                                          'price'=>'15'
                                                          ),   
                                                 '7'=>array(
                                                          'price'=>'15'
                                                          ),   
                                             ),                         
               'wca_trenchcoat_chest_pocket'=>array(
                                                 '0'=>array(
                                                          'price'=>'0'
                                                          ),   
                                                 'welt'=>array(
                                                          'price'=>'5'
                                                          ),   
                                                 'vertical'=>array(
                                                          'price'=>'5'
                                                          ),   
                                                 'zipper'=>array(
                                                          'price'=>'5'
                                                          ),   
                                                 'patched'=>array(
                                                          'price'=>'6'
                                                          ),   
                                             ), 
             'wca_trenchcoat_belt'=>array(
                                            '0'=>array(
                                                      'price'=>'0'
                                                      ),   
                                             'sewing'=>array(
                                                      'price'=>'5'
                                                      ),   
                                             'loose'=>array(
                                                      'price'=>'10'
                                                      ),   
                                         ),                                   
             'wca_trenchcoat_backcut'=>array(
                                         '0'=>array(
                                                  'price'=>'0'
                                                  ),   
                                         '1'=>array(
                                                  'price'=>'1'
                                                  ),   
                                         '2'=>array(
                                                  'price'=>'2'
                                                  ),   
                                         ),                                   
             'wca_trenchcoat_sleeve'=>array(
                                        '0'=>array(
                                                  'price'=>'0'
                                                  ),   
                                         'tape'=>array(
                                                  'price'=>'2'
                                                  ),   
                                         'button'=>array(
                                                  'price'=>'2'
                                                  ),   
                                         ),                                   
             'wca_trenchcoat_shoulder'=>array(
                                        '0'=>array(
                                                  'price'=>'0'
                                                  ),   
                                         '1'=>array(
                                                  'price'=>'2'
                                                  ),  
                                         ),                                   
             'wca_trenchcoat_back_lapel'=>array(
                                        '0'=>array(
                                                  'price'=>'0'
                                                  ),   
                                         '1'=>array(
                                                  'price'=>'2'
                                                  ),  
                                         ),
             'wca_trenchcoat_fabric_type'=>array(
                                        '1'=>array(
                                                  'price'=>'217'
                                                  ),   
                                         '2'=>array(
                                                  'price'=>'218'
                                                  ),  
                                         '3'=>array(
                                                  'price'=>'219'
                                                  ),  
                                         '4'=>array(
                                                  'price'=>'220'
                                                  ),  
                                         '5'=>array(
                                                  'price'=>'221'
                                                  ),  
                                         '6'=>array(
                                                  'price'=>'222'
                                                  ),  
                                         '7'=>array(
                                                  'price'=>'223'
                                                  ),  
                                         '8'=>array(
                                                  'price'=>'224'
                                                  ),  
                                         ),
               'wca_embroidery'=>array(
                                        '0'=>array(
                                                  'price'=>'0'
                                                  ),   
                                         '1'=>array(
                                                  'price'=>'9.95'
                                                  ),  
                                         ),
                        'neck_lining'=>array(
                                              '0'=>array(
                                                       'price'=>'0'
                                                       ),   
                                              '1'=>array(
                                                       'price'=>'3.50'
                                                       ),   
                                              '2'=>array(
                                                       'price'=>'3.50'
                                                       ),   
                                              '3'=>array(
                                                       'price'=>'3.50'
                                                       ),   
                                              '4'=>array(
                                                       'price'=>'3.50'
                                                       ),   
                                              '5'=>array(
                                                       'price'=>'3.50'
                                                       ),   
                                              '6'=>array(
                                                       'price'=>'3.50'
                                                       ),   

                                          ),                               
                       'elbow_patch'=>array(
                                              '0'=>array(
                                                       'price'=>'0'
                                                       ),   
                                              '1'=>array(
                                                       'price'=>'12.95'
                                                       ),   
                                              '2'=>array(
                                                       'price'=>'12.95'
                                                       ),   
                                              '3'=>array(
                                                       'price'=>'12.95'
                                                       ),   
                                              '4'=>array(
                                                       'price'=>'12.95'
                                               ), 
                                          ),  
            'wca_buton_thread' =>array(
                                              '0'=>array(
                                                       'price'=>'0'
                                                       ),   
                                              '1'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '2'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '3'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '4'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '5'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '6'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '7'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '8'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '9'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '10'=>array(
                                                       'price'=>'1.75'
                                                       ),   

                                          ), 
                'wca_buton_hole_thread' =>array(
                                              '0'=>array(
                                                       'price'=>'0'
                                                       ),   
                                              '1'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '2'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '3'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '4'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '5'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '6'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '7'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '8'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '9'=>array(
                                                       'price'=>'1.75'
                                                       ),   
                                              '10'=>array(
                                                       'price'=>'1.75'
                                                       ),   

                                          ),     
            );

/* END :- array for set price of all attributes */

/*Start:- Craetea a arry for calculation of price in js of each attributes*/
$attribute_price=array();
foreach($attributes as $attr_slug=>$subattributes):
    if(is_array($subattributes)):
     $attribute_price['base_price']=0;      // For bacse price of the product 
     foreach($subattributes as $value=>$sub_data):
             $k=$attr_slug.'**NIS**'.$value;
             $attribute_price[$k]=$sub_data['price'];
     endforeach; 
   endif;
endforeach;
/*END:- Craetea a arry for calculation of price in js of each attributes*/

/*Start:- Array for get attribute key in price calulation*/
$atribute_slugs=array_keys($attributes);

$atribute_slugs= json_encode($atribute_slugs);
/*End :-  Array for get attribute key in price calulation*/


/*start:- array for facric related butoons and zippers */
$all_fabric_data=array(
             '1'=>array(
                    'button'=>'1',
                    'zipper'=>'1',
                    'titel'=>'Elandia',
                    'price'=>'217',
                    'lining'=>'1',
                    ),   
             '2'=>array(
                    'button'=>'2',
                    'zipper'=>'2',
                    'titel'=>'Newport',
                    'price'=>'218',
                    'lining'=>'1',
                    ),   
             '3'=>array(
                    'button'=>'4',
                    'zipper'=>'3',
                    'titel'=>'Seeland',
                    'price'=>'219',
                    'lining'=>'1',
                    ),   
             '4'=>array(
                    'button'=>'3',
                    'zipper'=>'1',
                    'titel'=>'Izaro',
                    'price'=>'220',
                    'lining'=>'1',
                    ),   
             '5'=>array(
                    'button'=>'4',
                    'zipper'=>'1',
                    'titel'=>'Newington',
                    'price'=>'221',
                    'lining'=>'1',
                    ),   
             '6'=>array(
                    'button'=>'3',
                    'zipper'=>'1',
                    'titel'=>'Bloomsbury',
                    'price'=>'222',
                    'lining'=>'1',
                    ),   
             '7'=>array(
                    'button'=>'4',
                    'zipper'=>'1',
                    'titel'=>'Lambeth',
                    'price'=>'223',
                    'lining'=>'1',
                    ),   
             '8'=>array(
                    'button'=>'2',
                    'zipper'=>'1',
                    'titel'=>'Clapham',
                    'price'=>'224',
                    'lining'=>'1',
                    ),   
    
                  );

$fabric_data=json_encode($all_fabric_data);
/*End:- array for facric related butoons and zippers */


$all_extra_linings=array(
           '1'=>array(                                              //This ia a key for fabric ids
                 '1'=>array(                                        //This ia a key for fabric's lining ids
                      'titel'=>'Beauvans',  // tile of lining fabric               
                      'price'=>'19.95',    // price of lining fabric
                      'color'=>'red',       // color of lining fabric
                      'pattern'=>'squared', // pattern of lining fabric  
                     ), 
                ), 
);

$extra_linings=json_encode($all_extra_linings); 


/* Start :- Array for ste3 configration patch, nech, button thread& hole thread and embroidery */
$extra_relationship=array(
    'wca_trenchcoat_neck_lapel'=>array(
                                    'default'=>'0',                        // Default Value for item
                                    'hidden_name'=>'neck_lining',          // hidden input name for item
                                    'class'=>'neck_lining',                // item image parent div class -> a -> img  
                                    'first_rel'=>'1',                      // First div rel 
                                    'main_div'=>'#main_neck_lapel'    
                                  ),
    'wca_trenchcoat_elbow_patch'=>array(
                                    'default'=>'0',                          // Default Value for item
                                    'hidden_name'=>'elbow_patch',            // hidden input name for item
                                    'class'=>'elbow_patch',                  // item image parent div class -> a -> img  
                                    'first_rel'=>'1',                        // First div rel  
                                    'main_div'=>'#main_elbow_patch'   
                                  ),
   'wca_buton_thread'=>array('default'=>'0',                               // Default Value for item
                                    'hidden_name'=>'wca_buton_thread',     // hidden input name for item
                                    'class'=>'wca_buton_thread',           // item image parent div class -> a -> img  
                                    'first_rel'=>'1',                      // First div rel  
                                    'main_div'=>'#main_buton_thread'   
                            ),
    'wca_buton_hole_thread'=>array(
                                    'default'=>'0',                             // Default Value for item
                                    'hidden_name'=>'wca_buton_hole_thread',     // hidden input name for item
                                    'class'=>'wca_buton_hole_thread',           // item image parent div class -> a -> img  
                                    'first_rel'=>'1',                           // First div rel  
                                    'main_div'=>'#main_buton_thread'
                                  ),
    'wca_embroidary_color'=>array(
                                    'default'=>'0',                            // Default Value for item
                                    'hidden_name'=>'wca_embroidary_color',     // hidden input name for item
                                    'class'=>'wca_embroidary_color',           // item image parent div class -> a -> img  
                                    'first_rel'=>'1',                          // First div rel
                                    'main_div'=>'#main_embroidery'
                                  ),
    'wca_embroidery_text'=>array(
                                    'default'=>'0',                           // Default Value for item
                                    'hidden_name'=>'wca_embroidery_text',     // hidden input name for item
                                    'class'=>'not_define',                    // item image parent div class -> a -> img  
                                    'first_rel'=>'1',                         // First div rel
                                    'main_div'=>'#main_embroidery'
                                  ),
    'wca_trenchcoat_interior_type'=>array(
                                    'default'=>'0',                                // Default Value for item
                                    'hidden_name'=>'wca_trenchcoat_interior',      // hidden input name for item
                                    'class'=>'wca_trenchcoat_interior',            // item image parent div class -> a -> img  
                                    'first_rel'=>'1',                              // First div rel
                                    'main_div'=>'#main_interior'                   // Main parent div  of H2 
                                  ),
);

$extra_relationship=json_encode($extra_relationship);
/* end :- Array for ste3 configration patch, nech, button thread& hole thread and embroidery */

/* Start :- Array for ste3 configration embroidery  fonts and colors*/
$embroidary_attributes=array(
    'fonts'=>array(
                '1'=>'Arial',
                '2'=>'Monotype Corsiva',
                '3'=>'Times New Roman',
                '4'=>'Rockwell',
            ),
    'color'=>array(
        '1'=>'#ffcf10',
        '2'=>'#022061',
        '3'=>'#ffffff',
        '4'=>'#a48239',
        '5'=>'#4d020d',
        '6'=>'#331b00',
        '7'=>'#000000',
        '8'=>'#b80e58',
        '9'=>'#0ba133',
        '10'=>'#c20000',
    )
);      
$embroidary_attributes =  json_encode($embroidary_attributes);
/*End :- Array for ste3 configration embroidery  fonts and colors*/




$plugins_url = plugins_url('woocommerce-custom-attribute');
$category = 'trenchcoat';    // Current category                                    
$fabric = $default_values['wca_trenchcoat_fabric_type']['value'];// Current fabric
$button = $all_fabric_data[$fabric]['button'];                   // Button for current fabric 
$button = $all_fabric_data[$fabric]['zipper'];                   // Zipper for current fabric 

$image_category = wca_image_url . "/3d/man/$category";           // category image url
$image_fabric_url = "$image_category/fabric/$fabric";            // category fabric image url
$image_front_url = "$image_fabric_url/front";                    // category image url for front side
$image_back_url = "$image_fabric_url/back";                      // category image url for back side 
$button_url = "$image_category/botones/$button";                 // category image url for buttons
$zipper_url = "$image_category/zipper/$zipper";                  // category image url for zippers
$man_url = wca_image_url . "/man/$category";                     // category image url for satatic man       
$blank_image = $plugins_url . '/assets/images/blank.png';        // image url for Blankk image   

$lining_fabrics=$all_extra_linings[$fabric];
$lining_fabric=1;

?>
