<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include abs_wca_include.'/wca_public_function.php';

add_filter('template_include', 'wca_template_loader', 11, 1);
add_action('woocommerce_after_add_to_cart_form', 'add_customize_butoon');
add_filter('woocommerce_price_format', 'wca_price_format', 11, 2);
?>
