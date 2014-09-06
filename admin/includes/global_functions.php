<?php

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/*
 * @ function pr
 * For debugging 
 */
function pr($data, $exit = false) {
    echo '<pre>';
    print_r($data);
    echo'</pre>';
    if ($exit) {
        exit;
    }
}

/*
 * @ function uploaded_images
 * To get file types
 */
function get_next_id($table) {
    $result = mysql_query("SHOW TABLE STATUS LIKE '" . $table . "'");
    $row = mysql_fetch_array($result);
    $nextId = $row['Auto_increment'];
    return $nextId;
}

/*
 * @ function get_file_type
 * To get file types
 */
function get_file_type($file_path) {
    switch (strtolower(pathinfo($file_path, PATHINFO_EXTENSION))) {
        case 'jpeg':
        case 'jpg':
            return 'image/jpeg';
        case 'png':
            return 'image/png';
        case 'gif':
            return 'image/gif';
        default:
            return '';
    }
}

/*
 * @ function getExtension
 * To get file extensions
 */
function getExtension($str) {
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

/*
 * @ function create_image_combo
 * To create select box of images
 */
function create_image_combo($images) {
    $data = array();
    if (count($images) > 0) {
        foreach ($images as $option_value => $option_name) {
            $data[] = array(
                'name' => $option_name,
                'value' => $option_value,
            );
        }
    }
    return $data;
}


/*
 * @ function uploaded_images
 * To Get uploaded images array
 */
function uploaded_images($master_id, $row_id, $type = '') {
    global $wpdb;
    $image_names = $wpdb->get_results("select image_name,type from " . IMAGES_TABLE . " 
                                                    where master_id=$master_id
                                                      and row_id=$row_id"
    );

    $image = array();
    if (count($image_names) > 0):
        foreach ($image_names as $image_name):
        if($image_name->type!='')
            $image[$image_name->type.'_'.$image_name->image_name] = $image_name->image_name;
        else    
            $image[$image_name->image_name] = $image_name->image_name;
        endforeach;
    endif;
    return $image;
}


/*
 * @uploaded_images_section
 * To create a html for uploded image using javascript
 */

function uploaded_images_section($master_id, $row_id, $data, $image_url,$type = '') {
    global $wpdb;
    $image_names = $wpdb->get_results("select image_name,id,type from " . IMAGES_TABLE . " 
                                                    where master_id=$master_id
                                                      and row_id=$row_id"
    );
    
    
    $image = array();
    if (count($image_names) > 0):
        foreach ($image_names as $image_name):
            $image[]=array(
                            'image_src'=>$image_url.'/'.$image_name->image_name,  
                            'imade_lable'=>$data[$image_name->image_name],  
                            'image_id'=>$image_name->id,  
                            'side'=>$image_name->type,  
                          );
        endforeach;
    endif;
    return $image;
}


/*
 * @function uploaded_images_count
 * To get total uploded image count
 */
function uploaded_images_count($master_id, $row_id, $type = '') {
    global $wpdb;
    $images = $wpdb->get_row("select COUNT(id) as count from " . IMAGES_TABLE . " 
                                                    where master_id=$master_id
                                                      and row_id=$row_id"
    );
    
    return $images->count;
}

/*
 * @function images_data
 * To get single image data
 */
function images_data($id) {
    global $wpdb;
    $image_names = $wpdb->get_row("select * from " . IMAGES_TABLE . " 
                                                    where id=$id"
    );

    return $image_names;
}

/*
 * @delete_dir
 * To delete files and folder recursively
 */
function delete_dir($dir) {
   $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
} 


/*
 * @ function image_upload
 * To upload image
 */
function image_upload($temp_path,$savepath,$renamed='',$orignalname='') {
    if(move_uploaded_file($temp_path,$savepath))
        return true;
    else
        return FALSE;
}



/*Start public functions*/

function template_path(){
                $cateory =apply_filters( 'category', 'trenchcoat' );
		return apply_filters( 'template_path_wca', "woocommerce-custom-attribute/$cateory/");
}

function plugin_template_path(){
                $cateory =apply_filters( 'category', 'trenchcoat' );
		return apply_filters( 'plugin_template_path_wca', WCA_VIEW_PATH."$cateory/");
}



function wca_get_template_part( $slug, $name = '' ) {
	$template = '';
	// Look in yourtheme/slug-name.php and yourtheme/woocommerce/slug-name.php
        
	if ( $name ) {
		$template = locate_template( array( "{$slug}-{$name}.php", template_path() . "{$slug}-{$name}.php" ) );
	}
        echo $template;
        echo '<br>';
	// Get default slug-name.php
	if ( ! $template && $name && file_exists( plugin_template_path()."{$slug}-{$name}.php" ) ) {
		$template =  plugin_template_path()."{$slug}-{$name}.php";
	}
        
	// Allow 3rd party plugin filter template file from their plugin
	$template = apply_filters( 'wca_get_template_part', $template, $slug, $name );

	if ( $template ) {
                echo $template;
		load_template( $template, false );
	}
}
?>
