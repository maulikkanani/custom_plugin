<?php

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

function pr($data, $exit = false) {
    echo '<pre>';
    print_r($data);
    echo'</pre>';
    if ($exit) {
        exit;
    }
}

function get_next_id($table) {
    $result = mysql_query("SHOW TABLE STATUS LIKE '" . $table . "'");
    $row = mysql_fetch_array($result);
    $nextId = $row['Auto_increment'];
    return $nextId;
}

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

function getExtension($str) {
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

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

function uploaded_images($master_id, $row_id, $type = '') {
    global $wpdb;
    $image_names = $wpdb->get_results("select image_name from " . IMAGES_TABLE . " 
                                                    where master_id=$master_id
                                                      and row_id=$row_id
                                                      and type='$type'"
    );

    $image = array();
    if (count($image_names) > 0):
        foreach ($image_names as $image_name):
            $image[$image_name->image_name] = $image_name->image_name;
        endforeach;
    endif;
    return $image;
}

function uploaded_images_section($master_id, $row_id, $data, $type = '') {
    global $wpdb;
    $image_names = $wpdb->get_results("select image_name,id from " . IMAGES_TABLE . " 
                                                    where master_id=$master_id
                                                      and row_id=$row_id
                                                      and type='$type'"
    );
    
    $image_url=wca_image_url.'/3d/man/trenchcoat/botones/'.$row_id;
    $image = array();
    if (count($image_names) > 0):
        foreach ($image_names as $image_name):
            $image[]=array(
                            'image_src'=>$image_url.'/'.$image_name->image_name,  
                            'imade_lable'=>$data[$image_name->image_name],  
                            'image_id'=>$image_name->id,  
                            'side'=>$type,  
                          );
        endforeach;
    endif;
    return $image;
}

function images_data($id) {
    global $wpdb;
    $image_names = $wpdb->get_row("select image_name from " . IMAGES_TABLE . " 
                                                    where id=$id"
    );

    return $image_names;
}




?>
