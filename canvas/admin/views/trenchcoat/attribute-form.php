<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>


    <div id="white_content">  
        <h3>Attribute Edit Form</h3>
        <hr/><br/>
        <label>label:</label>
        <br/>
        <input type="text" id="label_edit" class="input_same" value="<?php echo $attribute_data->lable ?>" placeholder="Label"/><br/>
        <br/>
        <?php if ($attribute_data->cart_variable == 1) { ?>
            <label>Price:</label>
            <br/>
            <input type="text" id="price_edit" class="input_same" value="<?php echo wca_price_digits($attribute_data->price) ?>" placeholder="Price"/><br/>
        <?php } ?>
        <br/>
        <input type="button" id="send_attr_form" value="Save"/>
        <input type="button" id="cancel" value="Cancel"/>
    </div>

