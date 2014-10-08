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
            if ($image_name->type != '')
                $image[$image_name->type . '_' . $image_name->image_name] = $image_name->image_name;
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

function uploaded_images_section($master_id, $row_id, $data, $image_url, $type = '') {
    global $wpdb;
    $image_names = $wpdb->get_results("select image_name,id,type from " . IMAGES_TABLE . " 
                                                    where master_id=$master_id
                                                      and row_id=$row_id"
    );


    $image = array();
    if (count($image_names) > 0):
        foreach ($image_names as $image_name):
            $image[] = array(
                'image_src' => $image_url . '/' . $image_name->image_name,
                'imade_lable' => $data[$image_name->image_name],
                'image_id' => $image_name->id,
                'side' => $image_name->type,
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
    $files = array_diff(scandir($dir), array('.', '..'));
    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
}

/*
 * @ function image_upload
 * To upload image
 */

function image_upload($temp_path, $savepath, $renamed = '', $orignalname = '') {
    if (move_uploaded_file($temp_path, $savepath))
        return true;
    else
        return FALSE;
}

/* Start public functions */

function template_path() {
    $cateory = apply_filters('category', 'trenchcoat');
    return apply_filters('template_path_wca', "woocommerce-custom-attribute/$cateory/");
}

function plugin_template_path() {
    $cateory = apply_filters('category', 'trenchcoat');
    return apply_filters('plugin_template_path_wca', WCA_VIEW_PATH . "$cateory/");
}

function wca_get_template_part($name) {
    $file = $name;
    $template = plugin_template_path() . $file;
    $find[] = $file;
    $find[] = template_path() . $file;
    if ($file) {
        $template = locate_template($find);
        $status_options = get_option('woocommerce_status_options', array());
        if (!$template || (!empty($status_options['template_debug_mode']) && current_user_can('manage_options') ))
            $template = plugin_template_path() . $file;
    }
    include $template;
}

function wca_get_template_path($name) {
    $file = $name;
    $template = plugin_template_path() . $file;
    $find[] = $file;
    $find[] = template_path() . $file;
    if ($file) {
        $template = locate_template($find);
        $status_options = get_option('woocommerce_status_options', array());
        if (!$template || (!empty($status_options['template_debug_mode']) && current_user_can('manage_options') ))
            $template = plugin_template_path() . $file;
    }
    return $template;
}

if (!function_exists($function_name)) {

    function wca_price_formate($formate = 'static') {
        $currency_pos = get_option('woocommerce_currency_pos');
        if ($formate == 'static') {
            switch ($currency_pos) {
                case 'left' :
                    $format = '%1$s%2$s';
                    break;
                case 'right' :
                    $format = '%2$s%1$s';
                    break;
                case 'left_space' :
                    $format = '%1$s&nbsp;%2$s';
                    break;
                case 'right_space' :
                    $format = '%2$s&nbsp;%1$s';
                    break;
            }
        }else {
            switch ($currency_pos) {
                case 'left' :
                    $format = '<span class="wca_price_symbol">%1$s</span> <span class="wca_price">%2$s</span>';
                    break;
                case 'right' :
                    $format = '<span class="wca_price">%2$s</span> <span class="wca_price_symbol">%1$s</span>';
                    break;
                case 'left_space' :
                    $format = '<span class="wca_price_symbol">%1$s</span>&nbsp;<span class="wca_price">%2$s</span>';
                    break;
                case 'right_space' :
                    $format = '<span class="wca_price">%2$s</span>&nbsp;<span class="wca_price_symbol">%1$s</span>';
                    break;
            }
        }

        return $format;
    }

}

if (!function_exists($function_name)) {

    function wca_price($price, $formate = 'static') {
        $return = '';
        $num_decimals = absint(get_option('woocommerce_price_num_decimals'));
        $currency_symbol = get_woocommerce_currency_symbol();
        $decimal_sep = wp_specialchars_decode(stripslashes(get_option('woocommerce_price_decimal_sep')), ENT_QUOTES);
        $thousands_sep = wp_specialchars_decode(stripslashes(get_option('woocommerce_price_thousand_sep')), ENT_QUOTES);

        $price = apply_filters('raw_woocommerce_price', floatval($price));
        $price = apply_filters('formatted_woocommerce_price', number_format($price, $num_decimals, $decimal_sep, $thousands_sep), $price, $num_decimals, $decimal_sep, $thousands_sep);
        $formate = wca_price_formate($formate);
        if (apply_filters('woocommerce_price_trim_zeros', false) && $num_decimals > 0) {
            $price = wc_trim_zeros($price);
        }

        $return = '<span class="amount">' . sprintf($formate, $currency_symbol, $price) . '</span>';

        if ($ex_tax_label && get_option('woocommerce_calc_taxes') == 'yes') {
            $return .= ' <small>' . WC()->countries->ex_tax_or_vat() . '</small>';
        }

        return $return;
    }

}


if (!function_exists('wca_price_digits')) {

    function wca_price_digits($price) {
        $return = '';
        $num_decimals = absint(get_option('woocommerce_price_num_decimals'));
        $currency_symbol = get_woocommerce_currency_symbol();
        $decimal_sep = wp_specialchars_decode(stripslashes(get_option('woocommerce_price_decimal_sep')), ENT_QUOTES);
        $thousands_sep = wp_specialchars_decode(stripslashes(get_option('woocommerce_price_thousand_sep')), ENT_QUOTES);

        $price = apply_filters('raw_woocommerce_price', floatval($price));
        $price = apply_filters('formatted_woocommerce_price', number_format($price, $num_decimals, $decimal_sep, $thousands_sep), $price, $num_decimals, $decimal_sep, $thousands_sep);
        if (apply_filters('woocommerce_price_trim_zeros', false) && $num_decimals > 0) {
            $price = wc_trim_zeros($price);
        }
        return $price;
    }
}

if (!function_exists('retrieve_label')) {

    function retrieve_label($name, $value) {

        global $wpdb;
        $data = $wpdb->get_var("SELECT lable FROM " . ATTR_LABEL . " WHERE `attr_name` = '$name' AND `value` = '$value'");
        $data = "<span id='" . $name . "__nis__" . $value . "'>$data</span>";
        return $data;
    }

}
if (!function_exists('wca_retrieve_label')) {

    function wca_retrieve_label($name, $value) {

        global $wpdb;
        $attribute_data = $wpdb->get_row("SELECT lable,price FROM " . ATTR_LABEL . " WHERE `attr_name` = '$name' AND `value` = '$value'");
        $display= "display:none;";
        $data = "<span id='".$name."__nis__".$value ."'>$attribute_data->lable</span>";
         
        if($attribute_data->price > 0){
            $display= "display:inline-block;";
        }
        $price=wca_price($attribute_data->price,'formated_price');
        $data .="<span id='".$name."__nis__".$value ."_price' style='$display'>&nbsp;(+".$price.")</span>";
        return $data;
    }

}

if (!function_exists('wca_retrive_lable_price')) {

    function wca_retrive_lable_price($name, $value) {

        global $wpdb;
        $attribute_data = $wpdb->get_row("SELECT lable,price FROM " . ATTR_LABEL . " WHERE `attr_name` = '$name' AND `value` = '$value'");
        $display= "display:none;";
        $data = "";
        if($attribute_data->price > 0){
            $display= "display:inline-block;";
        }
        $price=wca_price($attribute_data->price,'formated_price');
        $data .="<span id='".$name."__nis__".$value ."_price' style='$display'>&nbsp;(+".$price.")</span>";
        return $data;
    }

}

if (!function_exists('retrive_price')) {

    function retrive_price($name, $value) {
        global $wpdb;
        $data = $wpdb->get_var("SELECT price FROM " . ATTR_LABEL . " WHERE `attr_name` = '$name' AND `value` = '$value'");
        if ($data > 0) {
            $data = wca_price($data);
            $data = "( + $data )";
        } else {
            $data = '';
        }
        return $data;
    }

}

?>
