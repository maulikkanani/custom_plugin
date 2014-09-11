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
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


/**
 * WC_Admin_Meta_Boxes
 */

class wca_custome_attributes {

    public static function attributes($post_id, $post) {
        global $post;
        $category = 'trenchcoat';                                         // Current category
        wca_load::view("$category/customize-attributes");
    }

    public static function save($post_id, $post) {
        global $wpdb;
        $save_data = array(
            'wca_trenchcoat_style' => $_POST['wca_trenchcoat_style'],
            'wca_trenchcoat_length' => $_POST['wca_trenchcoat_length'],
            'wca_trenchcoat_fit' => $_POST['wca_trenchcoat_fit'],
            'wca_trenchcoat_closure' => $_POST['wca_trenchcoat_closure'],
            'wca_trenchcoat_closure_type_boton' => $_POST['wca_trenchcoat_closure_type_boton'],
            'wca_trenchcoat_pockets' => $_POST['wca_trenchcoat_pockets'],
            'wca_trenchcoat_pockets_type' => $_POST['wca_trenchcoat_pockets_type'],
            'wca_trenchcoat_chest_pocket' => $_POST['wca_trenchcoat_chest_pocket'],
            'wca_trenchcoat_belt' => $_POST['wca_trenchcoat_belt'],
            'wca_trenchcoat_backcut' => $_POST['wca_trenchcoat_backcut'],
            'wca_trenchcoat_sleeve' => $_POST['wca_trenchcoat_sleeve'],
            'wca_trenchcoat_shoulder' => $_POST['wca_trenchcoat_shoulder'],
            'wca_trenchcoat_back_lapel' => $_POST['wca_trenchcoat_back_lapel'],
            'wca_trenchcoat_fabric_type' => $_POST['wca_trenchcoat_fabric_type'],
            'wca_trenchcoat_interior_type' => $_POST['wca_trenchcoat_interior_type'],
            'wca_trenchcoat_interior' => $_POST['wca_trenchcoat_interior'],
            'wca_trenchcoat_embroidery_font' => $_POST['wca_trenchcoat_embroidery_font'],
            'wca_embroidery' => $_POST['wca_embroidery'],
            'wca_embroidery_text' => $_POST['wca_embroidery_text'],
            'wca_embroidary_color' => $_POST['wca_embroidary_color'],
            'wca_trenchcoat_neck_lapel' => $_POST['wca_trenchcoat_neck_lapel'],
            'wca_neck_lining' => $_POST['wca_neck_lining'],
            'wca_trenchcoat_elbow_patch' => $_POST['wca_trenchcoat_elbow_patch'],
            'wca_elbow_patch' => $_POST['wca_elbow_patch'],
            'wca_trenchcoat_btn_thread_apply' => $_POST['wca_trenchcoat_btn_thread_apply'],
            'wca_button_hilo_ojal' => $_POST['wca_button_hilo_ojal'],
            'wca_buton_thread' => $_POST['wca_buton_thread'],
            'wca_buton_hole_thread' => $_POST['wca_buton_hole_thread'],
            'wca_category' => '1',
        );


        update_post_meta($post_id, '_wca_customise_product', $_POST['wca_customise_product']);
        if ($_POST['wca_customise_product'] == '1') {
            $data = serialize($save_data);
        } else {
            $data = '';
        }
        update_post_meta($post_id, '_wca_attribute_data', $data);
    }

    public static function label_change() {
        global $wpdb;
        $priceattr = 0;
        $name = $_POST['name'];
        $label = $_POST['label'];
        $value = $_POST['value'];
        $category_id = $_POST['category_id'];

        if ($_POST['price'] > 0 && is_numeric($_POST['price']))
            $priceattr = $_POST['price'];

        $data = array(
            'attr_name' => $name,
            'value' => $value,
            'lable' => $label,
            'price' => $priceattr,
            'category_id' => $category_id
        );

        $select = $wpdb->get_results("SELECT * FROM " . ATTR_LABEL . " WHERE `attr_name` = '$name' AND `value` = '$value'");

        if (count($select) > 0) {
            $where = array(
                'attr_name' => $name,
                'value' => $value
            );
            $wpdb->update(ATTR_LABEL, $data, $where, $format = null, $where_format = null);
        } else {
            $wpdb->insert(ATTR_LABEL, $data);
        }

        $return_data = array(
            'price' => wca_price_digits($priceattr),
        );

        echo json_encode($return_data);
        exit;
    }

    public static function create_attribute_label_form() {
        global $wpdb;
        extract($_POST);
        $category = 'trenchcoat';
        $attribute_data = $wpdb->get_row("SELECT * FROM " . ATTR_LABEL . " WHERE attr_name ='$name' and value='$value' and category_id='$category_id'");
        $data['attribute_data'] = $attribute_data;
        wca_load::view("$category/attribute-form", $data);
        exit;
    }

    public static function retrieve_attr() {
        global $wpdb;
        $name = $_POST['name'];
        $data = $wpdb->get_results("SELECT Lable,price FROM " . ATTR_LABEL . " WHERE name = $name");
        print_r($data);
    }

}

?>
