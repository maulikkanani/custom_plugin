<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
include ABS_MODEL . 'master_attrs.php';
$buttons= json_encode(wca_fabric::get_active_buttons());
$zippers= json_encode(wca_fabric::get_active_zippers());
$linings= json_encode(wca_fabric::get_active_linings());

?>
<script type="text/javascript">
    
    //$default_vals = default_data;
    $default_values='<?php echo $default_values ?>';
    $buttons=jQuery.parseJSON('<?php echo $buttons ?>');
    $zippers=jQuery.parseJSON('<?php echo $zippers ?>');
    $linings=jQuery.parseJSON('<?php echo $linings ?>');
    
    jQuery(document).ready(function(){
        jQuery.each(jQuery.parseJSON($default_values), function(key, value) {
            var type = jQuery('input[name=' + key + ']').attr('type');
            if (type == "checkbox" || type == "radio")
                jQuery('input[name=' + key + '][value=' + value + ']').attr('checked', '');
            else
                jQuery('input[name=' + key + ']').val(value);
        });
        
        
        jQuery("input[name=button_id]").tokenInput($buttons,{
             tokenLimit:1,
            });
        jQuery("input[name=zipper_id]").tokenInput($zippers,{
             tokenLimit:1,
            });
            
        jQuery("input[name=lining_id]").tokenInput($linings,{
             tokenLimit:1,
            });
            
        jQuery("input[name=total_linings]").tokenInput($linings,{
            preventDuplicates: true,
            });
    });
        

</script>
<div class="container">
    <div class="main_content">
        <div class="col-sm-8">
            <form class="form-horizontal" method="POST">
                <div class="form-group">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Titel:</label>
                        <div class="col-sm-3">
                            <input type="text" name="titel" class="input_same" placeholder="tilel">
                        </div>         
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Color:</label>
                        <div class="col-sm-3">
                            <input type="text" name="color" class="input_same" placeholder="Color">
                        </div>         
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Reference:</label>
                        <div class="col-sm-3">
                            <input type="text" name="reference" class="input_same" placeholder="Reference">
                        </div>         
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Material:</label>
                        <div class="col-sm-3">
                            <input type="text" name="material" class="input_same" placeholder="Material">
                        </div>         
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">price:</label>
                        <div class="col-sm-3">
                            <input type="text" name="price" class="input_same" placeholder="Price">
                        </div>         
                    </div>
                    	
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Default Button:</label>
                        <div class="col-sm-3">
                            <input type="text" name="button_id" class="input_same" placeholder="Default Button">
                        </div>         
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Default zipper:</label>
                        <div class="col-sm-3">
                            <input type="text" name="zipper_id" class="input_same" placeholder="Default zipper">
                        </div>         
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Default Lining:</label>
                        <div class="col-sm-3">
                            <input type="text" name="lining_id" class="input_same" placeholder="Default Lining">
                        </div>         
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Available Lining:</label>
                        <div class="col-sm-3">
                            <input type="text" name="total_linings" class="input_same" placeholder="Available Lining">
                        </div>         
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="action" value="insert">
                        <div class="col-sm-offset-2 col-sm-5">
                            <input class="button button-primary button-large pull-right" type="submit" value="<?= $form_button ?>" name="submit">
                        </div>
                   </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>
