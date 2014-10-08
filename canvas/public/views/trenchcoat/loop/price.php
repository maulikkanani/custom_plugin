<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
global $product;
$customize = get_post_meta($product->id, '_wca_attribute_data', true);
$wca_attributes = unserialize($customize);
?>

<?php if (count($wca_attributes) > 1):?>
    <span class="price"><?php echo wca_product_price(wca_get_price_from_arttributes($wca_attributes), $product); ?></span>
<?php else: ?>
    <span class="price"><?php echo $product->get_price_html(); ?></span>
<?php
endif;
?>