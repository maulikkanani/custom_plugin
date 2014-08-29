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
class wca_buttons{
    
    
    /*
     * @function get_button      $id= button id
     * Get data of single buttons
     */
     function get_button($id){
            global $wpdb;
            $data=array();
            $row = $wpdb->get_row("SELECT * from ".BUTTONS." where id='$id'");
            $data['name']=$row->name;
            $data['color']=$row->color;
            $data['status']=$row->status;
            return $data;
     }
     
     
    /*
     * @function delete_multi_buttons 
     * $button_ids =  array of button ids 
     * delete multiple buttons
     */
     function delete_multi_buttons($button_ids){
            global $wpdb;
            foreach($button_ids as $button_id){
                wca_buttons::delete_button($button_id);
            }
            return true;
     }
     
     
     /*
     * @function delete_multi_buttons 
     * $button_id =   button id 
     * delete multiple buttons
     */
     function delete_button($button_id){
         global $wpdb;
         include ABS_MODEL . 'master_attrs.php';
         $dir_name=$row_id=mysql_real_escape_string($_POST['id']);
         $master_id=$masters['buttons'];
         $image_dir=$category_dir.'/botones/'.$button_id;
         if(delete_dir($image_dir)){
              $result=$wpdb->query("DELETE FROM ".BUTTONS." 
                                        WHERE id='$button_id' 
                                    ");
              
               $result=$wpdb->query("DELETE FROM ".IMAGES_TABLE." 
                                     WHERE master_id=$master_id
                                       and row_id=$button_id
                            ");
         }
         
         return true;
     }
     
     
    /*
     * @function save_buttons
     * to add and update buttons
     */
     public static function save_buttons($id=''){
         global $wpdb;
         include ABS_MODEL . 'master_attrs.php';
         extract($_POST);  
         
             $category=1;
             
             $data=array(
                        'name'=>$name,
                        'color'=>$color,
                        'category_id'=>$category,
                       );
           if($id==''){
                $wpdb->insert(BUTTONS,$data);
                $dir_id=$wpdb->insert_id;
                $image_dir=$category_dir.'/botones/'.$dir_id;
                if (!is_dir($image_dir)) {
                     mkdir($image_dir,777, true);
                }
                $_SESSION['msg']="Color Added successfully";
            }else{
                $where=array('id'=>$id);
                $wpdb->update(BUTTONS,$data,$where);
                $_SESSION['msg']="Color Updated successfully";
            }
     }
     
     
     
     /*
     * @function upload_buttons      $id= button id
     * upload images for button
     */
     function upload_buttons(){
         global $wpdb;
         include ABS_MODEL . 'master_attrs.php';
         
         $dir_name=$row_id=mysql_real_escape_string($_POST['id']);
         $master_id=$masters['buttons'];
        
         $image_dir=$category_dir.'/botones/'.$dir_name;
         $image_url= $category_url.'/botones/'.$dir_name;
         
         if (!is_dir($image_dir)) {
                mkdir($image_dir,777, true);
         }
         $upload=$_FILES['files'];
         
         $image_name=$_POST['image_name'];
         $savepath=$image_dir.'/'.$image_name;
         
         if(file_exists($savepath)){
             
                $wpdb->query("DELETE FROM ".IMAGES_TABLE." 
                                     WHERE image_name='$_POST[image_name]' 
                                       and master_id=$master_id
                                       and row_id=$row_id
                            ");
                unlink($savepath);
         }
        
         if(image_upload($upload['tmp_name'],$savepath,$image_name,$upload['name'])){
                
                
                $ins=array(
                        'image_name'=>$image_name,  
                        'master_id'=>$master_id,  
                        'row_id'=>$row_id,  
                        'type'=>'',  
                        'image_extension'=>$upload['name'],  
                        'current_image_extension'=>$image_name,  
                 );
                
                $wpdb->insert(IMAGES_TABLE,$ins);
                
                
                $uploded_images=uploaded_images($master_id,$row_id);
                $remaing_images=array_diff_key($master_images[$master_id],$uploded_images);
                $remaing_images=create_image_combo($remaing_images);
                $uploded_image_section = uploaded_images_section($master_id, $row_id, $master_images[$master_id],$image_url);
                
                $image_lable=$master_images[$master_id][$image_name];
                
                $return=array();
                $img=new stdClass();
                $img->name=$image_lable;
                $img->url="$image_url/$image_name";
                $img->remaing=$remaing_images;
                $img->image_section=$uploded_image_section;
                //$img->size="53793";
                //$img->type="image/jpeg";
               // $img->deleteUrl="http://192.168.1.35/kochandhill/wp-admin/?file=boton_belt_sewing_fit0%20%283%29.jpeg";
               // $img->deleteType="DELETE";
                $return=$img;
                
                echo json_encode($return);
                exit;      
         }
     }
     
     /*
     * @function delete_images     
     * delete images for button
     */
      function delete_images(){
        global $wpdb;
        include ABS_MODEL . 'master_attrs.php';
        $id=  mysql_real_escape_string($_POST[img_id]);
        $master_id=  mysql_real_escape_string($_POST[master_id]);
        $row_id=  mysql_real_escape_string($_POST[button_id]);
                 
        $image_dir=$category_dir.'/botones/'.$row_id;
        $image_url=$category_url.'/botones/'.$row_id;
        $images_data=images_data($id); 
         $image_path="$image_dir/$images_data->image_name";
         
        if(unlink($image_path)){
                $update=array('status'=>0);
                $where=array('id'=>$row_id);
                $wpdb->update(ZIPPER,$update,$where);
                $result=$wpdb->query("DELETE FROM ".IMAGES_TABLE." 
                                     WHERE id='$id' 
                                       and master_id=$master_id
                                       and row_id=$row_id
                            ");
                $uploded_images=uploaded_images($master_id,$row_id);
                $remaing_images=array_diff_key($master_images[$master_id],$uploded_images);
                $remaing_images=create_image_combo($remaing_images);
                
                $uploded_image_section = uploaded_images_section($master_id, $row_id, $master_images[$master_id],$image_url);
                
                $data=array();
                $data['remaing']=$remaing_images;
                $data['image_section']=$uploded_image_section;
                echo json_encode($data);
        }else{
            echo '1';
        }
        exit;
        
    }
    
    /*
     * @function active_button     
     * Active button whose have all images
     */
    function active_button(){
         global $wpdb;
         include ABS_MODEL . 'master_attrs.php';
         $master_id=  mysql_real_escape_string($_POST[master_id]);
         $row_id=  mysql_real_escape_string($_POST[button_id]);
         $uploded_image=uploaded_images_count($master_id, $row_id);
         $total_images = count($master_images[$master_id]);
         
         
         $button = $wpdb->get_row("SELECT * from ".BUTTONS." where id='$row_id'");
         if($button->status==0){
             if($uploded_image==$total_images):
                 wca_buttons::do_active_button($row_id);
                echo 0; 
             else:   
                echo "Please upload all images for active button"; 
             endif; 
         }else{
             wca_buttons::do_active_button($row_id);
             echo 1;
         }
         exit;
    }
    
    
    /*
     * @function do_active_button     
     * used in active_button
     */
    function do_active_button($id){
        global $wpdb;
        $button = $wpdb->get_row("SELECT * from ".BUTTONS." where id='$id'");
        if($button->status==0){
            $update=array('status'=>1);
        }else{
            $update=array('status'=>0);
        }
        
        $where=array('id'=>$id);
        $wpdb->update(BUTTONS,$update,$where);
    }
     
}

?>