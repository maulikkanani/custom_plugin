<script type="text/javascript">
    var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
    var master_id = "<?php echo mysql_real_escape_string($master_id); ?>";
    
    jQuery(document).on('click', '.process_status', function() {
        $this=jQuery(this);
        var row_id = $this.data('row_id');
        jQuery.ajax({
            url: ajax_url,
            type: "POST",
            data: {action:'active_lining', row_id: row_id,master_id: master_id},
            success: function(data) {
                if(data==0){
                     $this.html('<i class="fa fa-circle fa-lg active_img"></i>');
                }else if(data==1){
                    $this.html('<i class="fa fa-circle fa-lg inactive_img"></i>');
                }else{
                    alert(data);
                }
                
            }
        });
    });
</script>

<?php
/* Start:- Columns with DB table fields */
$columns = array(
                'titel' => array('lable' => 'Title', 'sort' => true, 'DefaultShort' => true, 'Sort_order' => 'ASC'),
                'color' => array('lable' => 'Color', 'sort' => true),
                'pattern' => array('lable' => 'Pattern', 'sort' => true),
                'material' => array('lable' => 'Material', 'sort' => true),
                'price' => array('lable' => 'Price', 'sort' => true),
                'active' => array('lable' => 'Active', 'sort' => false),
                'images' => array('lable' => 'Images', 'sort' => false),
            );
/* END:- Columns with DB table fields */

$arg = array(
    'table' => $table, //For check box name attribute.
    'CheckBox_name' => $cbid, //For check box name attribute.
    'per_page' => 5, // Number of records per page.
    'plural' => $table, // Give class to table
    'titel' => 'titel', //Titel of Gride For Edit and delete 
    'columns' => $columns, // Array of cloumns
    'uniquekey' => 'id', // primery key of table for edit and delete
);

function getconformation($id) {
    global $wpdb, $table, $unique;
    $row = $wpdb->get_row("SELECT * from $table where $unique='$id'");
    return $row->name;
}

function CreteList($item, $column_name) {
    global $current_page_url, $master_id, $wpdb;
    include ABS_MODEL . 'master_attrs.php';
    switch ($column_name):
        case 'active':
            $total_images = count($master_images[$master_id]);
            $status = 'inactive_img';
            $upload_count = uploaded_images_count($master_id,$item['id']);
            $data= wca_lining::get_single_row($item['id']);
            if ($total_images == $upload_count && $data['status']==1)
                $status = 'active_img';
            ?>
            <div class="process_status col-sm-5"  data-row_id="<?php echo $item['id'] ?>">
                <i class="fa fa-circle fa-lg <?php echo $status ?>"></i>
            </div>
            <?php
            break;

        case 'images':
            ?>
            <div class="col-sm-5">
                <a href="<?php echo $current_page_url .'&action=image_add&id=' . $item['id'] ?>" ><i class="fa fa-image fa-3x"></i></a> 
            </div>

            <?php
            break;

        default:
            return $item[$column_name]; //This is for if you want simple texts  
    endswitch;
}

function BluckAction() {
    $actions = array(
            //'delete' => 'Delete All', // delete is a name of combo && Delete ALL is a lable of combo
            //'active' => 'Active All',    // please uncomment this and get code for active section
    );
    return $actions;
}

function CreateQuery() {
    global $table;
    $sqlFetch = "";
    $wh = '';
    $search_keyword = str_replace("|", '&', $_REQUEST['s']);

    if ($search_keyword != '')
        $where.=" AND ( titel like '%$search_keyword%' 
                        OR color like '%$search_keyword%'
                        OR pattern like '%$search_keyword%'
                        OR material like '%$search_keyword%'
                        OR price like '%$search_keyword%'
                      )";

    $sqlFetch .= "select * from $table WHERE 1 $where";

    return $sqlFetch;
}
