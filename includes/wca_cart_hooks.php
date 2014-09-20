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
        add_action('woocommerce_checkout_process', array(&$this, 'wca_measurement_validation'), 10);
        add_action('woocommerce_checkout_update_user_meta', array(&$this, 'wca_add_user_measurements'), 10, 2);
        add_action('woocommerce_checkout_update_order_meta', array(&$this, 'wca_checkout_update_order_meta'), 10, 2);



        /* ----- Start admin hooks ------ */
        add_action('woocommerce_admin_order_data_after_order_details', array(&$this, 'wca_admin_order_data_after_order_details'), 10, 1);
        add_action('woocommerce_admin_order_item_headers', array(&$this, 'wca_admin_order_item_headers'), 10, 1);
        add_action('woocommerce_admin_order_item_values', array(&$this, 'wca_admin_order_item_values'), 11, 3);
        add_action('woocommerce_after_cart_table', array($this, 'wca_add_lightbox'), 11, 3);
        /* ----- End admin hooks ------ */
    }

    /* --- Start admin hooks ---- */

    function wca_admin_order_data_after_order_details($order) {
        $serialized_measurement = get_post_meta($order->id, '_wca_measurement', true);
        if ($serialized_measurement != '') {
            $default_measurement = unserialize($serialized_measurement);
            $file = ABS_VIEW.'measurement/wca-measurement.php';
            include $file;
        }
    }

    function wca_admin_order_item_headers($cart_item_key) {
        ?>
            <th class="tax_class"><?php _e('Details', 'woocommerce') ?></th><div class="light"><div class="under_light"></div></div>
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
        ?>
        <script type="text/javascript">
            var ajax_url = "<?php echo admin_url() . "admin-ajax.php" ?>";
        </script>
        <td class="tax_class" data-order_item_id="<?php echo $item_id ?>"><?php _e('Details', 'woocommerce') ?></td>
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

            if (is_user_logged_in()) {
                $customer_id = get_current_user_id();
                $default_measurement = unserialize(get_usermeta($customer_id, 'wca_measurement'));
            }

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
            //$other_data[] = array('name' => 'Custome Attributes', 'value' => '<a href="#">Details</a>');
            $other_data = array();
        }

        return $other_data;
    }

    function wca_in_cart_product_thumbnail($thumb, $cart_item, $cart_item_key) {

        if (isset($cart_item['wca_cart_data'])) {
            $thumb.='
                <script type = "text/javascript">
                    var ajax_url = "' . admin_url() . '" + "admin-ajax.php"; 
                </script>
            ';
            $thumb.='<br><center><a href="javascript:;" class="product_details" data-order_item_key="' . $cart_item_key . '">Show Details</a></center>';
        }
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

    function wca_measurement_validation() {
        global $woocommerce;
        $passed = true;


        if (isset($_POST['wca_measurment_height']) && !is_numeric($_POST['wca_measurment_height']) && $_POST['wca_measurment_height'] <= 0) {
            $woocommerce->add_error(__('<b>"Measurment height</b>" is a required field. Please enter valid value.', 'woocommerce-custom-attribute'));
            $passed = false;
        }

        if (isset($_POST['wca_measurment_weight']) && !is_numeric($_POST['wca_measurment_weight']) && $_POST['wca_measurment_weight'] <= 0) {
            $woocommerce->add_error(__('<b>"Measurment weight</b>" is a required field. Please enter valid value.', 'woocommerce-custom-attribute'));
            $passed = false;
        }

        if (isset($_POST['wca_constitution']) && !is_numeric($_POST['wca_constitution']) && $_POST['wca_constitution'] <= 0) {
            $woocommerce->add_error(__('<b>"Body shape</b>" is a required field. Please enter valid value.', 'woocommerce-custom-attribute'));
            $passed = false;
        }

        if (isset($_POST['wca_measurment_unit']) && !in_array($_POST['wca_measurment_unit'], array('cm', 'in'))) {
            $woocommerce->add_error(__('<b>"Measurment height unit</b>" is a required field. Please enter valid value.', 'woocommerce-custom-attribute'));
            $passed = false;
        }

        if (isset($_POST['wca_weight_unit']) && !in_array($_POST['wca_weight_unit'], array('kg', 'lb'))) {
            $woocommerce->add_error(__('<b>"Measurment weight unit</b>" is a required field. Please enter valid value.', 'woocommerce-custom-attribute'));
            $passed = false;
        }

        $leagth_unit = $_POST['wca_measurment_unit'];

        if (isset($_POST['wca_coat_length']) && (!is_numeric($_POST['wca_coat_length']) || $_POST['wca_coat_length'] <= 0)) {
            $woocommerce->add_error(__('<b>"Coat/ Trench Coat length </b>" is a required field. Please enter valid value.', 'woocommerce-custom-attribute'));
            $passed = false;
        }

        if (isset($_POST['wca_sleeves_length']) && (!is_numeric($_POST['wca_sleeves_length']) || $_POST['wca_sleeves_length'] <= 0)) {
            $woocommerce->add_error(__('<b>"Sleeves length</b>" is a required field. Please enter valid value.', 'woocommerce-custom-attribute'));
            $passed = false;
        }

        if (isset($_POST['wca_shoulders']) && (!is_numeric($_POST['wca_shoulders']) || $_POST['wca_shoulders'] <= 0)) {
            $woocommerce->add_error(__('<b>"Shoulder width</b>" is a required field. Please enter valid value.', 'woocommerce-custom-attribute'));
            $passed = false;
        }

        if (isset($_POST['wca_chest']) && (!is_numeric($_POST['wca_chest']) || $_POST['wca_chest'] <= 0)) {
            $woocommerce->add_error(__('<b>"Chest around</b>" is a required field. Please enter valid value.', 'woocommerce-custom-attribute'));
            $passed = false;
        }

        if (isset($_POST['wca_stomach']) && (!is_numeric($_POST['wca_stomach']) || $_POST['wca_stomach'] <= 0)) {
            $woocommerce->add_error(__('<b>"Stomach</b>" is a required field. Please enter valid value.', 'woocommerce-custom-attribute'));
            $passed = false;
        }

        if (isset($_POST['wca_hips']) && (!is_numeric($_POST['wca_hips']) || $_POST['wca_hips'] <= 0)) {
            $woocommerce->add_error(__('<b>"Hips</b>" is a required field. Please enter valid value.', 'woocommerce-custom-attribute'));
            $passed = false;
        }

        if (isset($_POST['wca_biceps']) && (!is_numeric($_POST['wca_biceps']) || $_POST['wca_biceps'] <= 0)) {
            $woocommerce->add_error(__('<b>"Bicep around</b>" is a required field. Please enter valid value.', 'woocommerce-custom-attribute'));
            $passed = false;
        }

        return $passed;
    }

    public function wca_sub_validation($key, $legth_value, $leagth_unit) {
        include ABS_MODEL . 'measurements.php';

        if (is_numeric($_POST['wca_' . $key]) || $_POST['wca_' . $key] <= 0)
            return false;

        if ($leagth_unit == 'cm')
            $mesurment = $measurments_cm;
        else
            $mesurment = $measurments_inech;


        if ($legth_value >= $mesurment['valid_min'] && $legth_value <= $mesurment['valid_max'])
            return true;
        else
            return false;
    }

    public function wca_add_user_measurements($customet_id, $posted_data) {
        $wca_measurments = array();
        $wca_measurments['wca_measurment_height'] = $_POST['wca_measurment_height'];
        $wca_measurments['wca_measurment_height_2'] = $_POST['wca_measurment_height_2'];
        $wca_measurments['wca_measurment_weight'] = $_POST['wca_measurment_weight'];
        $wca_measurments['wca_constitution'] = $_POST['wca_constitution'];
        $wca_measurments['wca_measurment_unit'] = $_POST['wca_measurment_unit'];
        $wca_measurments['wca_weight_unit'] = $_POST['wca_weight_unit'];
        $wca_measurments['wca_coat_length'] = $_POST['wca_coat_length'];
        $wca_measurments['wca_sleeves_length'] = $_POST['wca_sleeves_length'];
        $wca_measurments['wca_shoulders'] = $_POST['wca_shoulders'];
        $wca_measurments['wca_chest'] = $_POST['wca_chest'];
        $wca_measurments['wca_stomach'] = $_POST['wca_stomach'];
        $wca_measurments['wca_hips'] = $_POST['wca_hips'];
        $wca_measurments['wca_biceps'] = $_POST['wca_biceps'];
        $wca_measurments = serialize($wca_measurments);
        update_user_meta($customet_id, 'wca_measurement', $wca_measurments);
        return true;
    }

    public function wca_checkout_update_order_meta($order_id, $posted_data) {
        $wca_measurments = array();
        $wca_measurments['wca_measurment_height'] = $_POST['wca_measurment_height'];
        $wca_measurments['wca_measurment_height_2'] = $_POST['wca_measurment_height_2'];
        $wca_measurments['wca_measurment_weight'] = $_POST['wca_measurment_weight'];
        $wca_measurments['wca_constitution'] = $_POST['wca_constitution'];
        $wca_measurments['wca_measurment_unit'] = $_POST['wca_measurment_unit'];
        $wca_measurments['wca_weight_unit'] = $_POST['wca_weight_unit'];
        $wca_measurments['wca_coat_length'] = $_POST['wca_coat_length'];
        $wca_measurments['wca_sleeves_length'] = $_POST['wca_sleeves_length'];
        $wca_measurments['wca_shoulders'] = $_POST['wca_shoulders'];
        $wca_measurments['wca_chest'] = $_POST['wca_chest'];
        $wca_measurments['wca_stomach'] = $_POST['wca_stomach'];
        $wca_measurments['wca_hips'] = $_POST['wca_hips'];
        $wca_measurments['wca_biceps'] = $_POST['wca_biceps'];
        $wca_measurments = serialize($wca_measurments);

        update_post_meta($order_id, '_wca_measurement', $wca_measurments);

        return true;
    }

    public function wca_product_detail() {
        $current_item_key = mysql_real_escape_string($_POST['order_item_key']);
        $items = WC()->cart->get_cart();
        $curren_item = $items[$current_item_key];
        $current_items = unserialize($curren_item['wca_cart_data']['wca_attributes']);
        //pr($current_items);
        include ABS_MODEL . '/get_attrs.php';
        //pr($current_items);
        $wca_attributes = array();   //Custome attribute array
        $file = wca_get_template_path('wca_product_details.php');
        include $file;
        exit;
    }

    public function wca_add_lightbox() {
        echo '<div class="light"><div class="under_light"></div></div>';
    }

    public function wca_product_detail_admin() {
        $current_item_id = mysql_real_escape_string($_POST['order_item_id']);
        $current_items = unserialize(get_metadata('order_item', $current_item_id, 'wca_attributes', true));
        include ABS_MODEL . '/get_attrs.php';
        $file = ABS_VIEW . 'wca_product_details.php';
        include $file;
        exit;
    }

}

$wca_form = new wca_cart_hooks();
?>
