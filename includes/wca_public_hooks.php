<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include abs_wca_include . '/wca_public_function.php';

add_filter('template_include', 'wca_template_loader', 11, 1);                               // For include wca template in woocommerce product
add_action('woocommerce_after_add_to_cart_form', 'add_customize_butoon');                   // For add customixe product
add_filter('woocommerce_price_format', 'wca_price_format_wc', 11, 2);                       // for price
add_filter('woocommerce_sale_price_html', 'wca_sale_price', 11, 2);                          // For sale price.

include abs_wca_include.'wca_cart_hooks.php';
?>
