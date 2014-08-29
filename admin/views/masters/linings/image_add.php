<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
include ABS_MODEL . 'master_attrs.php';

$row_id = mysql_real_escape_string($_GET['id']);
$uploded_images = uploaded_images($master_id, $row_id);
$images = array_diff_key($master_images[$master_id], $uploded_images);
$images = create_image_combo($images);
$images = json_encode($images);
$image_url=$category_url.'/linings/'.$row_id;
$uploded_image_section = uploaded_images_section($master_id, $row_id,$master_images[$master_id],$image_url);
$uploded_image_section = json_encode($uploded_image_section);

$butoon_url = $image_category . '/botones/6';
?>
<script>
    $options = jQuery.parseJSON('<?php echo $images ?>');
    $uploded_images = jQuery.parseJSON('<?php echo $uploded_image_section ?>');

    jQuery(document).ready(function() {
        'use strict';
        jQuery.noConflict();
        // Change this to the location of your server-side upload handler:
        var row_id = "<?php echo mysql_real_escape_string($_GET['id']); ?>";
        var master_id = "<?php echo mysql_real_escape_string($master_id); ?>";
        var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
        jQuery('#fileupload').bind('fileuploadsubmit', function(e, data) {
            if (jQuery('.image_name').val() == '') {
                alert('please select image name');
                return false;
            } else {
                jQuery('#progress').show();
            }
            data.formData = {action: 'upload_lining_image', id: row_id, image_name: jQuery('.image_name').val()};
        });

        jQuery('#fileupload').fileupload({
            url: ajax_url,
            dataType: 'json',
            done: function(e, data) {
                jQuery('#progress').hide();
                $options = data.result.remaing;
                jQuery('.image_name').html();
                jQuery(document).trigger('img-option');
                
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
                    data: {action:'delete_lining_image',img_id:img_id,master_id:master_id,row_id:row_id,side:side},
                    success:function(data){
                        var data=jQuery.parseJSON(data);
                        $options =data.remaing;
                        jQuery('.image_name').html();
                        jQuery(document).trigger('img-option');
                        $uploded_images = data.image_section;
                        jQuery(document).trigger('uploaded-images');
                    }
                });
        });

        jQuery(document).trigger('img-option');
        jQuery(document).trigger('uploaded-images');
        
    });


    

    jQuery(document).bind('img-option', function() {
        jQuery('.image_name').html('');
        jQuery('.image_uploder').hide();
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
            jQuery('#images').html('');
            jQuery('.images_hading').hide();
        if ($uploded_images.length > 0) {
            jQuery('.images_hading').show();
            jQuery.each($uploded_images, function(key, value) {
                var tmp_html = '<div class="data_main">'
                        + '<div class="image_main">'
                        + '<img width="70" height="70" src="' + value.image_src + '">'
                        + '</div>'
                        + '<div class="label_main">'
                        + '<span>' + value.imade_lable + '</span>'
                        + '</div>'
                        + '<div class="label_main">'
                        + '<span> <a href="javascript:;" class="delete_image fa fa-trash fa-2x" data-img_id="' + value.image_id + '" data-side="' + value.side + '"></a></span>'
                        + '</div>'
                        + '</div>';
                jQuery('#images').append(tmp_html);
            });
        }
    });

</script>      
<div class="wrap">
    <div class="shape-icon"></div>
    <h2 class="shape-wrap">Button Images <a class="add-new-h2" href="admin.php?page=<?php echo $CurrentPage; ?>">Back</a>
        </h2>
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
                        <div class="top_bar_headings">
				<label class="image_label">Images</label>
				<label>Label</label>
				<label>Action</label>
			</div>
                        <div id="images">
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
