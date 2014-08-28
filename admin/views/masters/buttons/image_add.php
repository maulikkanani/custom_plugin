<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
include ABS_MODEL . 'master_attrs.php';

$row_id = mysql_real_escape_string($_GET['id']);
$uploded_images = uploaded_images($master_id, $row_id);
$images = array_diff_key($master_images[$master_id], $uploded_images);
$images = create_image_combo($images);
$images = json_encode($images);

$uploded_image_section = uploaded_images_section($master_id, $row_id, $master_images[$master_id]);
$uploded_image_section = json_encode($uploded_image_section);

$butoon_url = $image_category . '/botones/6';
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
    $uploded_images = jQuery.parseJSON('<?php echo $uploded_image_section ?>');

    jQuery(document).ready(function() {
        'use strict';
        jQuery.noConflict();
        // Change this to the location of your server-side upload handler:
        var button_id = "<?php echo mysql_real_escape_string($_GET['id']); ?>";
        var master_id = "<?php echo mysql_real_escape_string($master_id); ?>";
        var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
        jQuery('#fileupload').bind('fileuploadsubmit', function(e, data) {
            if (jQuery('.image_name').val() == '') {
                alert('please select image name');
                return false;
            } else {
                jQuery('#progress').show();
            }
            data.formData = {action: 'upload_button', id: button_id, image_name: jQuery('.image_name').val()};
        });

        jQuery('#fileupload').fileupload({
            url: ajax_url,
            dataType: 'json',
            done: function(e, data) {
                console.log(data.result);
                /*jQuery.each(data.result.files, function(index, data) {
                 jQuery('<p/>').text(file.name).appendTo('#files');
                 });*/

                jQuery('#progress').hide();
                $options = data.result.remaing;
                jQuery('.image_name').html();
                jQuery(document).trigger('button-img-option');
                
                $uploded_images = data.result.image_section;
                jQuery(document).trigger('uploaded-images');
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

        jQuery(document).on('click', '.delete_image', function() {
            var img_id = jQuery(this).data('img_id');
            var side = jQuery(this).data('side');
                jQuery.ajax({
                    url: ajax_url,
                    type: "POST",
                    data: {action:'delete_image',img_id:img_id,master_id:master_id,button_id:button_id,side:side},
                    success:function(data){
                        var data=jQuery.parseJSON(data);
                        $options =data.remaing;
                        jQuery('.image_name').html();
                        jQuery(document).trigger('button-img-option');
                        $uploded_images = data.image_section;
                        jQuery(document).trigger('uploaded-images');
                    }
                });
        });

        jQuery(document).trigger('button-img-option');
        jQuery(document).trigger('uploaded-images');
        
    });


    

    jQuery(document).bind('button-img-option', function() {
        jQuery('.image_name').html('');
        if ($options.length > 0) {
            jQuery('.image_uploder').show();
            jQuery('.image_name').append('<option value="">select image name</option>');
            jQuery.each($options, function(key, value) {
                var tmp_html = '<option value="' + value.value + '">' + value.name + '</option>';
                jQuery('.image_name').append(tmp_html);
            });
        }
    });

    jQuery(document).bind('uploaded-images', function() {
        if ($uploded_images.length > 0) {
            jQuery('#images').html('');
            jQuery('.images_hading').show();
            jQuery.each($uploded_images, function(key, value) {
                var tmp_html = '<div class="row">'
                        + '<div class="col-sm-3">'
                        + '<img width="100" height="100" src="' + value.image_src + '">'
                        + '</div>'
                        + '<div class="col-sm-3">'
                        + '<span>' + value.imade_lable + '</span>'
                        + '</div>'
                        + '<div class="col-sm-3">'
                        + '<span> <a href="javascript:;" class="delete_image" data-img_id="' + value.image_id + '" data-side="' + value.side + '"> Delete </a></span>'
                        + '</div>'
                        + '</div>';
                jQuery('#images').append(tmp_html);
            });
        }
    });

</script>      
<div class="wrap">
    <div class="shape-icon"></div>
    <h2 class="shape-wrap">Button Images</h2>
</div>
<div class="container">
    <div class="main_content">
        <div class="col-sm-8">
            <form class="form-horizontal">
                <div class="form-group">
                    <div class="form-group image_uploder" style="display:none">
                        <label for="inputEmail3" class="col-sm-3 control-label">Images:</label>
                        <div class="col-sm-3">
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

                    <div class="col-sm-12 images_hading" style="display:none;">
                        <div class="row">
                            <div class="col-sm-3">
                                <span> Image </span>
                            </div> 

                            <div class="col-sm-3">
                                <span> Lable </span>
                            </div> 

                            <div class="col-sm-3">
                                <span> Action </span>
                            </div> 
                        </div>
                        <div id="images">
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
