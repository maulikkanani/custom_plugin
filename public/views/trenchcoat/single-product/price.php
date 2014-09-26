<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

global $post, $product;

$customize = get_post_meta($product->id, '_wca_attribute_data', true);
$wca_attributes = unserialize($customize);

if (count($wca_attributes) > 1):
    $price=wca_get_price_from_arttributes($wca_attributes);
    $price_html = wca_product_price($price, $product);
else:
    $price=$product->get_price();
    $price_html = $product->get_price_html();
endif;
?>

<div class="grtr_product_price_desktops mkk">

    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">


        <p class="price variable_price"><?php echo $price_html ?></p>

        <meta itemprop="price" content="<?php echo $price; ?>" />

        <meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />

        <link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

    </div>

</div>