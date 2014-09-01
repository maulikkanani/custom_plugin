<?php
//Developed By Maulik B kanani

if (!defined('ABSPATH'))
            global $cbid;
            if (is_array($_REQUEST[$cbid])){
                $ids = array_map('mysql_real_escape_string', $_REQUEST[$cbid]);
            }else{
                $ids = array(mysql_real_escape_string($_REQUEST[$cbid]));
            }
            ?>
            <form action="" method="post" name="deletesingle" id="deletesingle">
                <div class="wrap">
                    <div id="icon-users" class="icon32"><br/></div>
                    <h2><?php _e('Delete Fabric'); ?></h2>
                    <p><?php echo _n('You have specified this Fabric for deletion:', 'Please check the Fabric:', count($id)); ?></p>
                    <ul>
                        <?php
                        foreach ($ids as $id):
                            $id = (int) $id;
                            echo "<li><input type=\"hidden\" id=\"Narola-List\" name=\"" . $cbid . "[]\" value=\"" . esc_attr($id) . "\" />" . "<strong>ID</strong>:" . $id . "-><strong>Name</strong>:" . getconformation($id) . "</li>\n";
                        endforeach;
                        ?>
                    </ul>
                    <?php if ($id) : ?>
                        <fieldset><p><legend><?php echo _n('Are you sure to delete this Fabric?', 'Are you sure to delete this Fabric?', $go_delete); ?></legend></p>
                            <ul style="list-style:none;">
                                <li>
                                    <label>
                                        <input type="radio" id="delete_option0" name="delete_option" value="delete" />
                                        <?php _e('Delete Button.'); ?>
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
                        <p><?php _e('There are no valid Fabric selected for deletion.'); ?></p>
                    <?php endif; ?>
                </div>
            </form>
            <?php
    exit; // Exit if accessed directly