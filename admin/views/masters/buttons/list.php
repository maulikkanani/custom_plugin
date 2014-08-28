<?php
//Developed By Maulik B kanani

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

global $wpdb, $include, $pluginDir, $table, $current_tab_url, $unique, $master_id;

extract($_POST);

$master_id = '1';
$form_name = "Buttons";
$table = BUTTONS;
$cbid = 'button_id';
$header_botton = 'Add Button';
$CurrentPage = $_REQUEST['page'];
$siteurl = get_bloginfo('siteurl');
$current_tab_url = $siteurl . '/wp-admin/admin.php?page=' . $CurrentPage . '&action=image_add';
$data['form_button_value'] = "Add";

function redirect() {
    global $current_tab_url;
    echo '<script type="text/javascript">
            window.location="' . $current_tab_url . '";
    </script>';
    exit;
}

/* Start:- In this you van INSERT your data to your table */
if (isset($_POST['submit']) && $_POST['submit'] == 'Add'):
    wca_buttons::save_buttons();
    redirect();
endif;
/* End:- In this you van insert your data to your table */

/* Start:- In this you van UPDATE your data to your table */
if (isset($_POST['submit']) && $_POST['submit'] == 'Update'):
    $button_id = mysql_real_escape_string($_GET['id']);
    wca_buttons::save_buttons($button_id);
    redirect();
endif;
/* END:- In this you van UPDATE your data to your table */

/* Start:- set varialbel for eit form */
if (isset($_GET['action']) && $_GET['action'] == 'edit'):
    $form_titel = "Edit button";
    ?>
    <div class="wrap">
        <div class="shape-icon"></div>
        <h2 class="shape-wrap"><?php echo $form_titel; ?>
            <a class="add-new-h2" href="admin.php?page=<?php echo $CurrentPage; ?>&action=add"><?php echo $header_botton; ?></a>
        </h2>
    </div> 
    <?php
    $button_id = mysql_real_escape_string($_GET['id']);
    $data = wca_buttons::get_button($button_id);
    $form_button = 'Update';
    $default_values = json_encode($data);
    include ABS_WCA . "admin/views/masters/buttons/add.php";
    exit;
endif;
/* End:- set varialbel for edit form */

/* Form:- Start form for insert */
if ($_GET['action'] == "add") {
    $form_titel = "Add new button";
    $form_button = 'Add';
    $default_values = '[]';
    ?>
    <div class="wrap">
        <div class="shape-icon"></div>
        <h2 class="shape-wrap"><?php echo $form_titel; ?></h2>
    </div> 
    <?php
    include ABS_WCA . "admin/views/masters/buttons/add.php";
    exit;
}

if ($_GET['action'] == "image_add") {
    include ABS_WCA . "admin/views/masters/buttons/image_add.php";
    exit;
}
/* End:- Start form for insert and update */

include ABS_WCA . "admin/views/masters/buttons/grid.php";
require_once( ABS_WCA . 'admin/includes/wca_grid_data.php' );
$ListTable = new Wca_Grid_Data($arg);
$ListTable->registerMethod('CreateQuery');
$ListTable->registerMethod('CreteList');
$ListTable->registerMethod('BluckAction');
$ListTable->prepare_items();
$unique = $ListTable->UniqueKey;
getview($ListTable);
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
        <?php $ListTable->search_box('Search', 'search'); // this is for display search area  ?>
    </form>

    <form id="Narola-List-filter" method="post">
        <input type="hidden" name="page" value="<?php echo $CurrentPage; ?>" />
        <?php $ListTable->display(); // this is for display Grid   ?>
    </form>
</div>


