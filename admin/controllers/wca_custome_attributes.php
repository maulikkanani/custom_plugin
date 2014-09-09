<?php
/**
 * woocommerce-custom-attribute Meta Boxes
 *
 * Sets up the write panels used by products and orders (custom post types)
 *
 * @author      Nalola infotech
 * @category 	Trench coat
 * @package 	woocommerce-custom-attribute/admin/custome_attribute
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * WC_Admin_Meta_Boxes
 */
class wca_custome_attributes {
    
    public static function attributes( $post_id, $post ){
         global $post;
        $category='trenchcoat';                                         // Current category
        wca_load::view($category,'customize-attributes');
    }
    
    public static function save( $post_id, $post ){
        global $wpdb;
        $save_data=array(
                'wca_trenchcoat_style'=>$_POST['wca_trenchcoat_style'],
                'wca_trenchcoat_length'=>$_POST['wca_trenchcoat_length'],
                'wca_trenchcoat_fit'=>$_POST['wca_trenchcoat_fit'],
                'wca_trenchcoat_closure'=>$_POST['wca_trenchcoat_closure'],
                'wca_trenchcoat_closure_type_boton'=>$_POST['wca_trenchcoat_closure_type_boton'],
                'wca_trenchcoat_pockets'=>$_POST['wca_trenchcoat_pockets'],
                'wca_trenchcoat_pockets_type'=>$_POST['wca_trenchcoat_pockets_type'],
                'wca_trenchcoat_chest_pocket'=>$_POST['wca_trenchcoat_chest_pocket'],
                'wca_trenchcoat_belt'=>$_POST['wca_trenchcoat_belt'],
                'wca_trenchcoat_backcut'=>$_POST['wca_trenchcoat_backcut'],
                'wca_trenchcoat_sleeve'=>$_POST['wca_trenchcoat_sleeve'],
                'wca_trenchcoat_shoulder'=>$_POST['wca_trenchcoat_shoulder'],
                'wca_trenchcoat_back_lapel'=>$_POST['wca_trenchcoat_back_lapel'],
                'wca_trenchcoat_fabric_type'=>$_POST['wca_trenchcoat_fabric_type'],
                'wca_trenchcoat_interior_type'=>$_POST['wca_trenchcoat_interior_type'],
                'wca_trenchcoat_interior'=>$_POST['wca_trenchcoat_interior'],
                'wca_trenchcoat_embroidery_font'=>$_POST['wca_trenchcoat_embroidery_font'],
                'wca_embroidery'=>$_POST['wca_embroidery'],
                'wca_embroidery_text'=>$_POST['wca_embroidery_text'],
                'wca_embroidary_color'=>$_POST['wca_embroidary_color'],
                'wca_trenchcoat_neck_lapel'=>$_POST['wca_trenchcoat_neck_lapel'],
                'wca_neck_lining'=>$_POST['wca_neck_lining'],
                'wca_trenchcoat_elbow_patch'=>$_POST['wca_trenchcoat_elbow_patch'],
                'wca_elbow_patch'=>$_POST['wca_elbow_patch'],
                'wca_trenchcoat_btn_thread_apply'=>$_POST['wca_trenchcoat_btn_thread_apply'],
                'wca_buton_thread'=>$_POST['wca_buton_thread'],
                'wca_buton_hole_thread'=>$_POST['wca_buton_hole_thread'],
                'wca_category'=>'1',
            );
            
            
            update_post_meta($post_id,'_wca_customise_product', $_POST['wca_customise_product']);
            if($_POST['wca_customise_product']=='1'){
                $data=serialize($save_data);
            }else{
                 $data='';
            }
            update_post_meta($post_id,'_wca_attribute_data', $data);
    }
    
     public static function label_change(){
         global $wpdb;
         $name = $_POST['name'];
         $label = $_POST['label'];
         $priceattr = $_POST['price'];
         $value = $_POST['value'];
         $category_id = $_POST['category_id'];
         
          $data=array(
                        'attr_name'=>$name,
                        'value'=>$value, 
                        'lable'=>$label,
                        'price'=>$priceattr,
                        'category_id'=>$category_id
                        
                        );
        // print_r($data);
          $where=array(
              'attr_name'=>$name,
              'value'=>$value 
          );
         $select = $wpdb->get_results("SELECT * FROM `wp_wca_attr_lable` WHERE `attr_name` = '$name' AND `value` = '$value'");
         // $select = $wpdb->get_results('SELECT attr_name, value FROM `wp_wca_attr_lable`',ARRAY_A);
        echo count($select);
         if(count($select)){
             $wpdb->update('wp_wca_attr_lable',$data,$where, $format = null, $where_format = null);
         }
         else {
              $wpdb->insert('wp_wca_attr_lable',$data);
         }
         exit;
         }
          /*$count == 0;
          foreach($select as $select1){
              if($select1['attr_name'] == $name && $select1['value'] == $value){
                  $wpdb->update('wp_wca_attr_lable',$data,$where, $format = null, $where_format = null);
                  $count++;
                  }
              }
              if($count==0){
              $wpdb->insert('wp_wca_attr_lable',$data);
             $count==0;
              }
         exit;
         }
     */
     public static function retrieve_attr(){
         global $wpdb;
         $name = $_POST['name'];
         $data = $wpdb->get_results("SELECT Lable,price FROM wp_wca_attr_lable WHERE name = $name");
         print_r($data);
     }
     
   
  
}
?>
