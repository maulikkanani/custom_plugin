<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function wca_template_loader($template) {
    $post_id = get_the_ID();
    $customize = get_post_meta($post_id, '_wca_customise_product', true);
    if (is_single() && get_post_type() == 'product' && $customize == 1 && $_GET['customize'] == 1) {
        /* global $post;
          $file = 'single-product.php';
          $template = plugin_template_path() . $file;
          $find[] = $file;
          $find[] = template_path() . $file;
          }
          if ($file) {
          $template = locate_template($find);
          $status_options = get_option('woocommerce_status_options', array());
          if (!$template || (!empty($status_options['template_debug_mode']) && current_user_can('manage_options') ))
          $template = plugin_template_path() . $file;
          } */
        $template = abs_wca_public_include . 'wca_set_template.php';
    }
    return $template;
}

function add_customize_butoon() {
    $post_id = get_the_ID();
    $customize = get_post_meta($post_id, '_wca_customise_product', true);
    if (is_single() && get_post_type() == 'product' && $customize == 1 && !isset($_GET['customize'])) {
        $link = get_permalink($post_id);
        $link = add_query_arg('customize', '1', $link);
        echo '<div class="gbtr_add_to_cart_simple" style="padding: 10px 0px; width: 100%;">
                <a href="' . $link . '" class="single_add_to_cart_button button alt" style="width:55%;padding-bottom: 30px !important;">Customization</a>
                </div>';
    }
}

function wca_price_format_wc($format, $currency_pos) {
    $post_id = get_the_ID();
    $customize = get_post_meta($post_id, '_wca_customise_product', true);
    $post = get_post($post_id);
    if (is_single() && $post->post_type == 'product' && $customize == 1 && isset($_GET['customize'])) {
        $format = wca_price_formate('dynamic');
    }
    return $format;
}

function wca_load_left_attribute() {
    $post_id = get_the_ID();
    $customize = get_post_meta($post_id, '_wca_customise_product', true);
    if (is_single() && get_post_type() == 'product' && $customize == 1 && isset($_GET['customize'])) {
        wca_get_template_part('customize-attributes.php');
        echo'<div class="clr"></div>';
    }
}

function wca_load_left_attribute_save() {
    if (isset($_POST) && !empty($_POST)) {
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
        $data=serialize($save_data);
    }else{
        $data = 'false';
    }
    wc_setcookie('product_info',$data,time() + 3600);
//    return $save_data;
    // echo "<pre>"; print_r($save_data);
}

function wca_sale_price($price, $product) {
    $post_id = get_the_ID();
    $customize = get_post_meta($post_id, '_wca_customise_product', true);
    $tax_display_mode = get_option('woocommerce_tax_display_shop');
    $display_price = $tax_display_mode == 'incl' ? $product->get_price_including_tax() : $product->get_price_excluding_tax();
    $display_regular_price = $tax_display_mode == 'incl' ? $product->get_price_including_tax(1, $product->get_regular_price()) : $product->get_price_excluding_tax(1, $product->get_regular_price());
    $display_sale_price = $tax_display_mode == 'incl' ? $product->get_price_including_tax(1, $product->get_sale_price()) : $product->get_price_excluding_tax(1, $product->get_sale_price());

    if ($product->is_on_sale() && is_single() && get_post_type() == 'product' && $customize == 1 && isset($_GET['customize'])) {
        $format = wca_price_formate();
        $price = '<del>' . ( ( is_numeric($display_regular_price) ) ? wca_price($display_regular_price) : $display_regular_price ) . '</del> <ins>' . ( ( is_numeric($display_sale_price) ) ? wc_price($display_sale_price) : $display_sale_price ) . '</ins>';

        $price = $price . $product->get_price_suffix();
    } else {
        $price = $product->get_price_html_from_to($display_regular_price, $display_price) . $product->get_price_suffix();
    }
    return $price;
}
?>
