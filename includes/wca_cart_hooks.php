<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class wca_cart_hooks {

    public function __construct() {
        add_action('woocommerce_before_add_to_cart_button', array(&$this, 'wca_load_left_attribute'));

        add_filter('woocommerce_add_cart_item_data', array(&$this, 'wca_add_cart_item_data'), 10, 2);
        add_filter('woocommerce_get_cart_item_from_session', array(&$this, 'wca_get_cart_item_from_session'), 10, 2);
        add_filter('woocommerce_get_item_data', array(&$this, 'wca_get_item_data'), 10, 2);
        add_filter('woocommerce_add_cart_item', array(&$this, 'wca_add_cart_item'), 10, 1);
        add_action('woocommerce_add_order_item_meta', array(&$this, 'wca_order_item_meta'), 10, 2);


        add_action('woocommerce_in_cart_product_thumbnail', array(&$this, 'wca_in_cart_product_thumbnail'), 10, 3);

        add_action('woocommerce_checkout_before_customer_details', array(&$this, 'wca_add_measurments'), 10);
        add_filter( 'woocommerce_checkout_process', array(&$this,'wca_measurement_validation'), 10, 3 );



        /* ----- Start admin hooks ------ */
        add_action('woocommerce_admin_order_item_headers', array(&$this, 'wca_admin_order_item_headers'), 10);
        add_action('woocommerce_admin_order_item_values', array(&$this, 'wca_admin_order_item_values'), 11, 3);
        /* ----- End admin hooks ------ */
    }

    /* --- Start admin hooks ---- */

    function wca_admin_order_item_headers() {
        ?>
        <th class="tax_class"><?php _e('Details', 'woocommerce') ?></th>
        <?php
    }

    /* --- Start admin hooks ---- */

    function wca_load_left_attribute() {
        global $post;
        $post_id = get_the_ID();
        $customize = get_post_meta($post_id, '_wca_customise_product', true);
        if (is_single() && get_post_type() == 'product' && $customize == 1 && isset($_GET['customize'])) {
            wca_get_template_part('customize-attributes.php');
            echo'<div class="clr"></div>';
        }
    }

    function wca_admin_order_item_values($_product, $item, $item_id) {
        global $theorder;
        //pr(get_class_methods($theorder));
        ?>
        <td class="tax_class"><?php _e('Details', 'woocommerce') ?></td>
        <?php
    }

    function wca_add_measurments() {
        global $order_id;
        $check_wca = FALSE;
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            if (isset($cart_item['wca_cart_data'])) {
                $check_wca = TRUE;
            }
        }
        if ($check_wca) {
            $file = wca_get_template_path('wca-measurement.php');
            include $file;
        }
    }

    function wca_add_cart_item_data($cart_item_meta, $product_id) {
        global $woocommerce;
        if (isset($_POST) && $_POST['wca_trenchcoat_style'] != '') {
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
            $price = wca_get_price_from_arttributes($save_data);
            $cart_item_meta['wca_cart_data']['wca_attributes'] = serialize($save_data);
            $cart_item_meta['wca_cart_data']['wca_attributes_price'] = $price;
        }

        return $cart_item_meta;
    }

    function wca_get_cart_item_from_session($cart_item, $values) {

        // Add the attrtibutes to the cart
        if (isset($values['wca_cart_data'])) {
            $cart_item['wca_cart_data'] = $values['wca_cart_data'];
        }

        if (isset($cart_item['wca_cart_data'])) {
            $this->wca_add_cart_item($cart_item);
        }
        return $cart_item;
    }

    function wca_get_item_data($other_data, $cart_item) {

        if (isset($cart_item['wca_cart_data'])) {

            $data = $cart_item['wca_cart_data'];

            // Add custom data to product data
            //pr(unserialize($data['wca_attributes'])))
            $other_data[] = array('name' => 'Custome Attributes', 'value' => '<a href="#">Details</a>');
        }

        return $other_data;
    }

    function wca_in_cart_product_thumbnail($thumb, $cart_item, $cart_item_key) {

        if (isset($cart_item['wca_cart_data']))
            $thumb.='<br><center><a href="javascript:;">Show Details</a></center>';

        return $thumb;
    }

    function wca_add_cart_item($cart_item) {
        global $woocommerce;

        if (isset($cart_item['wca_cart_data'])) {
            $cart_item['data']->set_price($cart_item['wca_cart_data']['wca_attributes_price']);
        }

        return $cart_item;
    }

    function wca_order_item_meta($item_id, $cart_item) {
        if (isset($cart_item['wca_cart_data'])) {
            $data = $cart_item['wca_cart_data'];
            woocommerce_add_order_item_meta($item_id, 'wca_attributes', $data['wca_attributes']);
        }
    }

    function wca_measurement_validation($passed, $product_id, $qty) {
        global $woocommerce;

        $person_name = 'person_name';
        $message_to_person = 'message_to_person';
        $e_deliverydate = 'e_deliverydate';

        $occasion_type = 'occasion_type';
        $occasion_date = 'occasion_date';
        $shipping_address = 'shipping_address';

        $woocommerce->add_error(sprintf(__('<b>"All measurments</b>" is a required field.', 'woocommerce'), $option));
        $passed=FALSE;
        return $passed;
    }

}

$wca_form = new wca_cart_hooks();
?>
