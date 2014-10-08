<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


    $post_id = get_the_ID();
    $customize = get_post_meta($post_id, '_wca_customise_product', true);
    if (is_single() && get_post_type() == 'product' && $customize == 1 && $_GET['customize'] == 1) {
        global $post;
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
    }
    
    include_once  $template;
?>
