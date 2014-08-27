<?php
//Developed By Maulik B kanani

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $wpdb, $include, $pluginDir, $table, $current_tab_url, $unique;

require_once( ABS_WCA.'admin/includes/wca_grid_data.php' );

extract($_POST);
session_start();

$master_id='1';
$form_name = "Buttons";
$table = 'wp_wca_buttons';
$cbid = 'button_id';
$header_botton = 'Add Button';
$CurrentPage = $_REQUEST['page'];
$siteurl = get_bloginfo('siteurl');
$current_tab_url=$siteurl.'/wp-admin/admin.php?page='.$CurrentPage;
$data['form_button_value']="Add";

function redirect(){
  global $current_tab_url;
    echo '<script type="text/javascript">
            window.location="'.$current_tab_url.'";
    </script>';
  exit;
}


/* Start:- In this you van INSERT your data to your table*/
if(isset($_POST['create_new']) && $_POST['create_new']=='Add'):
    
  extract($_POST);
  $ins=array(
            'name'=>$name,
            'color'=>$color,
            'category_id'=>$category_id,
            );
   $wpdb->insert($table,$ins);
   
   $_SESSION['msg']="Color Added successfully";
   redirect();
endif;
/* End:- In this you van insert your data to your table*/

/* Start:- In this you van UPDATE your data to your table*/
if(isset($_POST['create_new']) && $_POST['create_new']=='Update'):
        $getid=  mysql_real_escape_string($_GET['id']);
         $upd=array(
            'name'=>$name,
            'color'=>$color,
            'category_id'=>$category_id,
            );
        $wh=array(
           'id'=>$getid, 
        );
        
        $wpdb->update($table,$upd,$wh);
        $_SESSION['msg']="Test updated successfully";
   
    redirect();
endif;
/* END:- In this you van UPDATE your data to your table*/

/* Start:- set varialbel for eit form*/
if(isset($_GET['action']) && $_GET['action']=='edit'):
   $data=array();
  $get_id=  mysql_real_escape_string($_GET['id']);
  $row = $wpdb->get_row("SELECT * from $table where id='$get_id'");
  
  $data['name']=$row->name;
  $data['color']=$row->color;
  $data['email']=$row->email;
  $data['form_button_value']="Update";
endif;
/* End:- set varialbel for edit form*/

/*Form:- Start form for insert and update*/
if($_GET['action']=="add"){
    $form_titel="Add new button";
    ?>
        <div class="wrap">
        <div class="shape-icon"></div>
            <h2 class="shape-wrap"><?php echo $form_titel; ?></h2>
        </div> 
    <?php
    include ABS_WCA."admin/views/masters/buttons/add.php";
exit;
}
/*End:- Start form for insert and update*/


/*Start:- Columns with DB table fields */
$columns=array(
    'firstname'=>array('lable'=>'First Name', 'sort'=>true,  'DefaultShort'=>true ,'Sort_order'=>'ASC'), 
    'lastname'=>array('lable'=>'Last Name', 'sort'=>true,),
    'email'=>array('lable'=>'email', 'sort'=>true),
);
/*END:- Columns with DB table fields */

$arg=array(                   
  'table'=>$table,              //For check box name attribute.
  'CheckBox_name'=>$cbid,       //For check box name attribute.
  'per_page'=>5,                // Number of records per page.
  'plural'=>$table,             // Give class to table
  'titel'=>'name',              //Titel of Gride For Edit and delete 
  'columns'=>$columns,          // Array of cloumns
);


$ListTable = new Wca_Grid_Data($arg);
$ListTable ->registerMethod('CreateQuery');
$ListTable ->registerMethod('CreteList');
$ListTable ->registerMethod('BluckAction');
$ListTable ->prepare_items();
$unique=$ListTable->UniqueKey;

function getconformation($id) {
    global $wpdb,$table, $unique;
        $row = $wpdb->get_row("SELECT * from $table where $unique='$id'");
    return $row ->firstname.' '.$row ->lastname;
}


function CreteList($item, $column_name){
    switch ($column_name):
            /*case 'lastname':
                ?>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="firstname" placeholder="First name" value="<?=$item[$column_name]?>" >
                </div>
            <?php
            break;*/
        
            default:
                return $item[$column_name]; //This is for if you want simple texts  
       endswitch;
}

function BluckAction(){
    $actions = array(
            'delete' => 'Delete All',     // delete is a name of combo && Delete ALL is a lable of combo
            //'active' => 'Active All',    // please uncomment this and get code for active section
        );
    return $actions;
}

function CreateQuery(){
    global $table;
        $sqlFetch = "";
        $wh = '';
        $search_keyword = str_replace("|", '&', $_REQUEST['s']);
       
        if ($search_keyword != '')
            $where.=" AND ( name like '%$search_keyword%' )";
        
        $sqlFetch .= "select * from $table WHERE 1 $where";
        
        return $sqlFetch;
}

switch ($ListTable ->current_action()):
    
    case 'delete':
        if(is_array($_REQUEST[$cbid])):
        $ids = array_map('mysql_real_escape_string',$_REQUEST[$cbid]);
        else:
        $ids=array(mysql_real_escape_string($_REQUEST[$cbid]));    
        endif;
        ?>
        <form action="" method="post" name="deletesingle" id="deletesingle">
            <div class="wrap">
                <div id="icon-users" class="icon32"><br/></div>
                <h2><?php _e('Delete Test'); ?></h2>
                <p><?php echo _n('You have specified this Test for deletion:', 'Please check the user:', count($id)); ?></p>
                <ul>
                    <?php
                    foreach($ids as $id):
                        $id = (int) $id;
                        echo "<li><input type=\"hidden\" id=\"Narola-List\" name=\"".$cbid."[]\" value=\"" . esc_attr($id) . "\" />" . "<strong>ID</strong>:" . $id . "-><strong>Name</strong>:".getconformation($id)."</li>\n";
                    endforeach;
                    ?>
                </ul>
                <?php if ($id) : ?>
                    <fieldset><p><legend><?php echo _n('Are you sure to delete this Test?', 'Are you sure to delete this Test?', $go_delete); ?></legend></p>
                        <ul style="list-style:none;">
                            <li>
                                <label>
                                    <input type="radio" id="delete_option0" name="delete_option" value="delete" />
                                    <?php _e('Delete Test.'); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" id="delete_option0" name="delete_option" value="cancel" checked="checked" />
                                    <?php _e('cancel.'); ?>
                                </label>
                            </li>
                        </ul>
                    </fieldset>
                    <input type="hidden" name="action" value="dodelete" />
                    <?php
                    submit_button(__('Confirm all Process'), 'secondary');
                else :
                    ?>
                    <p><?php _e('There are no valid Test selected for deletion.'); ?></p>
                <?php endif; ?>
            </div>
        </form>
        <?php
        break;

    case 'dodelete':
        $ids = array_map('mysql_real_escape_string',$_REQUEST[$cbid]);
        $update = 'del_many';
        $delete_count = 0;
        
            switch ($_REQUEST['delete_option']) :
                case 'delete':
                    $deleteids=  implode(',', $ids);
                    $wpdb->query("DELETE FROM $table WHERE $unique IN ($deleteids)");
                    $_SESSION['msg']="Delete successfully";
                    redirect();
                    break;
                case 'cancel':
                    $_SESSION['msg']="Delete canceled successfully";
                    redirect();
                    break;
            endswitch;
        break;
    
    case  'active':
        // this is the case of active all here do what ever you want to do
       echo 'plase your code for active';
        echo '<pre>'; print_r($_POST);
        
    break;

    default:
        ?>
        
        <div class="wrap"> 

            <div id="icon-users" class="icon32"><br/>
            </div>

            <h2><?php echo $form_name ?>
                <a class="add-new-h2" href="admin.php?page=<?php echo $CurrentPage; ?>&action=add"><?php echo $header_botton; ?></a>
            </h2>
            
            <?php if ($_SESSION['msg'] != ''): ?>
                <div id="message" class="updated below-h2">
                    <p><?= $_SESSION['msg']; ?></p>
                </div>
                <?php  $_SESSION['msg']=''; ?>
            <?php endif; ?>
            
            <form id="Narola-List-filter" action="" method="get">
                <input type="hidden" name="page" value="<?php echo $CurrentPage ?>" />
                <?php $ListTable ->search_box('Search','search'); // this is for display search area ?>
            </form>
            
            <form id="Narola-List-filter" method="post">
                <input type="hidden" name="page" value="<?php echo $CurrentPage; ?>" />
                <?php $ListTable ->display(); // this is for display Grid  ?>
            </form>

        </div>

    <?php
 endswitch;
?>