<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function wca_template_loader($template) {
    $post_id = get_the_ID();
    $customize = get_post_meta($post_id, '_wca_customise_product', true);
    if (is_single() && get_post_type() == 'product' && $customize == 1 && $_GET['customize'] == 1) {
        /*global $post;
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
    }*/
        $template=abs_wca_public_include.'wca_set_template.php';
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
                <a href="' . $link . '" class="single_add_to_cart_button button alt" style="width:55%">Customization</a>
                </div>';
    }
}

function wca_price_format($format, $currency_pos){
    $post_id = get_the_ID();
    $customize = get_post_meta($post_id, '_wca_customise_product', true);
    if (is_single() && get_post_type() == 'product' && $customize == 1 && isset($_GET['customize'])) {
    switch ( $currency_pos ) {
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

?>
