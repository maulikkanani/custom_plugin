<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
include ABS_MODEL . 'master_attrs.php';
$buttons = json_encode(wca_fabric::get_active_buttons());
$zippers = json_encode(wca_fabric::get_active_zippers());
$linings = json_encode(wca_fabric::get_active_linings());

$colors = array();
foreach ($fabric_colors as $key => $value) {
    $colors[] = array(
        'id' => $key,
        'name' => $value,
    );
}

if ($_GET['action'] == 'edit') {

    $default_color = json_encode(array(
        array(
            'id' => $data[color],
            'name' => $fabric_colors[$data[color]],
        )
            )
    );

    $default_button_data = wca_buttons::get_button($data[button_id]);
    $default_button = json_encode(array(
        array(
            'id' => $data[button_id],
            'name' => $default_button_data[name],
        )
            )
    );

    $default_zipper_data = wca_zippers::get_single_row($data[zipper_id]);
    $default_zipper = json_encode(array(
        array(
            'id' => $data[zipper_id],
            'name' => $default_zipper_data[name],
        )
            )
    );

    $default_lining_data = wca_lining::get_single_row($data[lining_id]);
    if (count($default_lining_data) > 0) {
        $default_lining = json_encode(array(
            array(
                'id' => $data[lining_id],
                'name' => $default_lining_data[titel],
            )
                )
        );
    } else {
        $default_lining = [];
    }

    $default_avalable_linings = array();
    $selected_linigs = explode(',', $data['total_linings']);
    foreach ($selected_linigs as $tmp_lining) {
        $default_lining_data = wca_lining::get_single_row($tmp_lining);
        $default_avalable_linings[] = array(
            'id' => $tmp_lining,
            'name' => $default_lining_data[titel],
        );
    }
    $default_avalable_linings = json_encode($default_avalable_linings);
}
?>
<script type="text/javascript">

    //$default_vals = default_data;
    $default_values = '<?php echo $default_values ?>';
    $buttons = jQuery.parseJSON('<?php echo $buttons ?>');
    $zippers = jQuery.parseJSON('<?php echo $zippers ?>');
    $linings = jQuery.parseJSON('<?php echo $linings ?>');
    $colors = jQuery.parseJSON('<?php echo json_encode($colors) ?>');
    $default_color = jQuery.parseJSON('<?php echo $default_color ?>');
    $default_button = jQuery.parseJSON('<?php echo $default_button ?>');
    $default_zipper = jQuery.parseJSON('<?php echo $default_zipper ?>');
    $default_lining = jQuery.parseJSON('<?php echo $default_lining ?>');
    $default_avalable_linings = jQuery.parseJSON('<?php echo $default_avalable_linings ?>');

    jQuery(document).ready(function() {
        jQuery.each(jQuery.parseJSON($default_values), function(key, value) {
            var type = jQuery('input[name=' + key + ']').attr('type');
            if (type == "checkbox" || type == "radio")
                jQuery('input[name=' + key + '][value=' + value + ']').attr('checked', '');
            else
                jQuery('input[name=' + key + ']').val(value);
        });


        jQuery("input[name=color]").tokenInput($colors, {
            prePopulate: $default_color,
            tokenLimit: 1,
        });
        jQuery("input[name=button_id]").tokenInput($buttons, {
            prePopulate: $default_button,
            tokenLimit: 1,
        });
        jQuery("input[name=zipper_id]").tokenInput($zippers, {
            prePopulate: $default_zipper,
            tokenLimit: 1,
        });

        jQuery("input[name=lining_id]").tokenInput($linings, {
            prePopulate: $default_lining,
            tokenLimit: 1,
        });

        jQuery("input[name=total_linings]").tokenInput($linings, {
            prePopulate: $default_avalable_linings,
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
