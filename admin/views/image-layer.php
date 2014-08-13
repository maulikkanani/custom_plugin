<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
        global $post;
        // Add an nonce field so we can check for it later.
        wp_nonce_field('myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce');

        // Use get_post_meta to retrieve an existing value from the database.
        $value = get_post_meta($post->ID, '_my_meta_value_key', true);

        // Display the form, using the current value.
        echo '<label for="myplugin_new_field">';
        _e('Description for this field', 'woocommerce-custom-attribute');
        echo '</label> ';
        echo '<input type="text" id="myplugin_new_field" name="myplugin_new_field"';
        echo ' value="' . esc_attr($value) . '" size="25" />';
?>
