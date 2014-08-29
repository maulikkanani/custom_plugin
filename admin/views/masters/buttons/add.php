<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
include ABS_MODEL . 'master_attrs.php';
?>
<script type="text/javascript">
    
    //$default_vals = default_data;
    $default_values='<?php echo $default_values ?>';
    jQuery(document).ready(function(){
        jQuery.each(jQuery.parseJSON($default_values), function(key, value) {
            var type = jQuery('input[name=' + key + ']').attr('type');
            if (type == "checkbox" || type == "radio")
                jQuery('input[name=' + key + '][value=' + value + ']').attr('checked', '');
            else
                jQuery('input[name=' + key + ']').val(value);
        });
    });
        

</script>
<div class="container">
    <div class="main_content">
        <div class="col-sm-8">
            <form class="form-horizontal" method="POST">
                <div class="form-group">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Button Name:</label>
                        <div class="col-sm-3">
                            <input type="text" name="name" class="input_same" placeholder="Button name">
                        </div>         
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Button Color:</label>
                        <div class="col-sm-3">
                            <input type="text" name="color" class="input_same" placeholder="Button color">
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
