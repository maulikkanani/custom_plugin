<?php
//Developed By Maulik B kanani

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

global $wpdb, $include, $pluginDir, $table, $current_page_url, $unique, $master_id, $cbid;

extract($_POST);

$master_id = '7';
$form_name = "Neck Lining";
$table = NECK_LINING;
$cbid = 'neck_lining_id';
$header_botton = 'Add Neck Lining';
$CurrentPage = $_REQUEST['page'];
$siteurl = get_bloginfo('siteurl');
$image_form_url = $siteurl . '/wp-admin/admin.php?page=' . $CurrentPage . '&action=image_add&id='.$_GET['id'];
$current_page_url = $siteurl . '/wp-admin/admin.php?page=' . $CurrentPage ;
$data['form_button_value'] = "Add";

include ABS_WCA . "admin/views/masters/neck_lining/grid.php";
require_once( ABS_WCA . 'admin/includes/wca_grid_data.php' );
$Buttons_grid = new Wca_Grid_Data($arg);
$Buttons_grid->registerMethod('CreateQuery');
$Buttons_grid->registerMethod('CreteList');
$Buttons_grid->registerMethod('BluckAction');
$Buttons_grid->prepare_items();
$unique = $Buttons_grid->UniqueKey;

/* Start:- In this you van INSERT your data to your table */
if (isset($_POST['submit']) && $_POST['submit'] == 'Add'):
    $id=wca_neck_lining::save();
    wp_redirect($image_form_url.$id);
endif;
/* End:- In this you van insert your data to your table */

/* Start:- In this you van UPDATE your data to your table */
if (isset($_POST['submit']) && $_POST['submit'] == 'Update'):
    $neck_lining_id = mysql_real_escape_string($_GET['id']);
    wca_neck_lining::save($neck_lining_id);
    wp_redirect($image_form_url);
endif;
/* END:- In this you van UPDATE your data to your table */


/* Start:- In this you can delete data to your table */
if ($Buttons_grid->current_action() == 'dodelete'):
     if($_POST['delete_option']=='delete'){
             $neck_lining_ids=array_map('mysql_real_escape_string', $_REQUEST[$cbid]);   
             wca_neck_lining::delete_multiple($neck_lining_ids);
     }
     wp_redirect($current_page_url);
endif;
/* end :- In this you can delete data to your table */


/* Start:- set varialbel for edit form */
if ($Buttons_grid->current_action() == 'edit'):
    $form_titel = "Edit neck lining";
    ?>
    <div class="wrap">
        <div class="shape-icon"></div>
        <h2 class="shape-wrap"><?php echo $form_titel; ?>
            <a class="add-new-h2" href="admin.php?page=<?php echo $CurrentPage; ?>&action=add"><?php echo $header_botton; ?></a>
        </h2>
    </div> 
    <?php
    $neck_lining_id = mysql_real_escape_string($_GET['id']);
    $data = wca_neck_lining::get_single_row($neck_lining_id);
    $form_button = 'Update';
    $default_values = json_encode($data);
    include ABS_WCA . "admin/views/masters/neck_lining/add.php";
    exit;
endif;
/* End:- set variable for edit form */

/* Start:- Start form for insert */
if ($Buttons_grid->current_action() == "add") {
    $form_titel = "Add New Neck Lining";
    $form_button = 'Add';
    $default_values = '[]';
    ?>
    <div class="wrap">
        <div class="shape-icon"></div>
        <h2 class="shape-wrap"><?php echo $form_titel; ?></h2>
    </div> 
    <?php
    include ABS_WCA . "admin/views/masters/neck_lining/add.php";
    exit;
}
/* end :- Start form for insert */

/* Start:- Start form for Image add*/
if ($Buttons_grid->current_action() == "image_add") {
    include ABS_WCA . "admin/views/masters/neck_lining/image_add.php";
    exit;
}
/* end:- Start form for Image add*/

/*start:- delete form */
if ($Buttons_grid->current_action()== 'delete'){
    include ABS_WCA . "admin/views/masters/neck_lining/delete.php";
    exit;
}
/*End:- delete form */
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
        <?php $_SESSION['msg'] = ''; ?>
    <?php endif; ?>

    <form id="Narola-List-filter" action="" method="get">
        <input type="hidden" name="page" value="<?php echo $CurrentPage ?>" />
        <?php $Buttons_grid->search_box('Search', 'search'); // this is for display search area  ?>
    </form>

    <form id="Narola-List-filter" method="post">
        <input type="hidden" name="page" value="<?php echo $CurrentPage; ?>" />
        <?php $Buttons_grid->display(); // this is for display Grid   ?>
    </form>
</div>


