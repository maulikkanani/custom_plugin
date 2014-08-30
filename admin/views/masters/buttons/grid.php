<script type="text/javascript">
    
    var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
    var master_id = "<?php echo mysql_real_escape_string($master_id); ?>";
    
    jQuery(document).on('click', '.process_status', function() {
        $this=jQuery(this);
        var button_id = $this.data('buttonid');
        jQuery.ajax({
            url: ajax_url,
            type: "POST",
            data: {action:'active_button', button_id: button_id,master_id: master_id},
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
    'name' => array('lable' => 'Button Name', 'sort' => true, 'DefaultShort' => true, 'Sort_order' => 'ASC'),
    'color' => array('lable' => 'color', 'sort' => true,),
    'active' => array('lable' => 'Active', 'sort' => false),
    'images' => array('lable' => 'Images', 'sort' => false),
);
/* END:- Columns with DB table fields */

$arg = array(
    'table' => $table, //For check box name attribute.
    'CheckBox_name' => $cbid, //For check box name attribute.
    'per_page' => 5, // Number of records per page.
    'plural' => $table, // Give class to table
    'titel' => 'name', //Titel of Gride For Edit and delete 
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
            $data=  wca_buttons::get_button($item['id']);
            if ($total_images == $upload_count && $data['status']==1)
                $status = 'active_img';
            ?>
            <div class="process_status col-sm-5"  data-buttonid="<?php echo $item['id'] ?>">
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
        $where.=" AND ( name like '%$search_keyword%' )";

    $sqlFetch .= "select * from $table WHERE 1 $where";

    return $sqlFetch;
}

function getview($ListTable) {

    switch ($ListTable->current_action()):

        

        case 'dodelete':
            $ids = array_map('mysql_real_escape_string', $_REQUEST[$cbid]);
            $update = 'del_many';
            $delete_count = 0;

            switch ($_REQUEST['delete_option']) :
                case 'delete':
                    $deleteids = implode(',', $ids);
                    $wpdb->query("DELETE FROM $table WHERE $unique IN ($deleteids)");
                    $_SESSION['msg'] = "Delete successfully";
                    redirect();
                    break;
                case 'cancel':
                    $_SESSION['msg'] = "Delete canceled successfully";
                    redirect();
                    break;
            endswitch;
            break;

        case 'active':
            // this is the case of active all here do what ever you want to do
            echo 'plase your code for active';
            echo '<pre>';
            print_r($_POST);

            break;

        default:

    endswitch;
}
