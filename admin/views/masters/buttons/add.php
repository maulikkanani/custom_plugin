<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
include ABS_MODEL . 'master_attrs.php';

$images = array();
foreach ($master_images[$master_id] as $option_value => $option_name) {
    $images[] = array(
        'name' => $option_name,
        'value' => $option_value,
    );
}
$images = json_encode($images);
?>
<script>
    /*Start:- create a model for change lining (Knockout js)*/

//    $options = [
//        {name: 'Item 1', value: 1},
//        {name: 'Item 3', value: 3},
//        {name: 'Item 4', value: 4}
//    ];


    /*End:- create a model for change lining(Knockout js)*/
    $options = jQuery.parseJSON('<?php echo $images ?>');
    jQuery(document).ready(function() {
        'use strict';
        jQuery.noConflict();
        // Change this to the location of your server-side upload handler:
        var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
        jQuery('#fileupload').bind('fileuploadsubmit', function(e, data) {
            if (jQuery('.image_name').val() == '') {
                alert('please select image name');
                return false;
            }else{
                jQuery('#progress').show();
            }
                data.formData = {action: 'upload_button', image_name: jQuery('.image_name').val()};
        });
        jQuery('#fileupload').fileupload({
            url: ajax_url,
            dataType: 'json',
            done: function(e, data) {
                jQuery.each(data.result.files, function(index, file) {
                    jQuery('<p/>').text(file.name).appendTo('#files');
                });
                jQuery('#progress').hide();
                $options = [];
//                 /jQuery('.image_name').html();
                //jQuery(document).trigger('button-img-option');
            },
            progressall: function(e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                jQuery('#progress .progress-bar').css(
                        'width',
                        progress + '%'
                        );
                if (progress == '100') {
                    $options = [];
                    //jQuery(document).trigger('button-img-option');
                }
            }
        }).prop('disabled', !jQuery.support.fileInput)
                .parent().addClass(jQuery.support.fileInput ? undefined : 'disabled');


        jQuery(document).trigger('button-img-option');
    });




    jQuery(document).bind('button-img-option', function() {
        jQuery('.image_name').html('');
        if ($options.length > 0) {
            jQuery('.image_name').append('<option value="">select image name</option>');
            jQuery.each($options, function(key, value) {
                var tmp_html = '<option value="'+value.value +'">' + value.name + '</option>';
                jQuery('.image_name').append(tmp_html);
            });
        }
    });

</script>
<div class="container">
    <div class="main_content">
        <div class="col-sm-8">
            <form class="form-horizontal">
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
                            <input type="text" name="name" class="input_same" placeholder="Button color">
                        </div>         
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Images:</label>
                        <div class="col-sm-3">
<!--                            <select name="image_name" class="image_name">
                                <option value="">Select image</option>
                            <?php
                            foreach ($master_images[$master_id] as $option_value => $option_lable):
                                ?>
                                                    <option value="<?php echo $option_value ?>"><?php echo $option_lable ?></option>
                                <?php
                            endforeach;
                            ?>  
                            </select>-->
                            <select class="image_name">
                            </select>
                        </div> 
                        <div class="col-sm-3">
                            <span class="btn btn-success fileinput-button">
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>Select files...</span>
                                <input id="fileupload" type="file" name="files" data-bind="event:{change:update_image}" >
                            </span>
                        </div>    
                         <div class="col-sm-3">
                            <!-- The global progress bar -->
                            <div id="progress" class="progress" style="display:none;">
                                <div class="progress-bar progress-bar-success"></div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div id="files" class="files"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input class="button button-primary button-large" type="submit" value="<?= $data['form_button_value'] ?>" name="create_new">
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
