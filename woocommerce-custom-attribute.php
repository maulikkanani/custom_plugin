<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   woocommerce custome attributes
 * @author    Narola infotech <mk.narola@narolainfotech.com>
 * @license   GPL-2.0+
 * @link      http://www.narolainfotech.org/
 * @copyright 2014 Your Name or Company Name
 *
 * @wordpress-plugin
 * Plugin Name:       woocommerce custom attributes
 * Plugin URI:        http://www.narolainfotech.org/
 * Description:       For Client requirements
 * Version:           1.0.0
 * Author:            Narola infotech <mk.narola@narolainfotech.com>
 * Author URI:        http://www.narolainfotech.org/
 * Text Domain:       plugin-name-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/<owner>/<repo>
 * WordPress-Plugin-Boilerplate: v2.6.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-plugin-name.php` with the name of the plugin's class file
 *
 */
                          //absolute path of plugin
require_once( plugin_dir_path( __FILE__ ) . 'admin/includes/global_functions.php');
require_once( plugin_dir_path( __FILE__ ) . 'admin/includes/wca_load.php');
require_once( plugin_dir_path( __FILE__ ) . 'public/class-woocommerce-custom-attribute.php' );
/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * @TODO:
 *
 * - replace Plugin_Name with the name of the class defined in
 *   `class-plugin-name.php`
 */
register_activation_hook( __FILE__, array( 'woocommerce_custom_attribute', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'woocommerce_custom_attribute', 'deactivate' ) );

/*
 * @TODO:
 *
 * - replace Plugin_Name with the name of the class defined in
 *   `class-plugin-name.php`
 */
add_action( 'plugins_loaded', array( 'woocommerce_custom_attribute', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-plugin-name-admin.php` with the name of the plugin's admin file
 * - replace Plugin_Name_Admin with the name of the class defined in
 *   `class-plugin-name-admin.php`
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-admin.php' );
        /*Include file for a save a attribute data*/
        add_action( 'plugins_loaded', array( 'woocommerce_custom_attribute_admin', 'get_instance' ) );

}


define('ABS_WCA', plugin_dir_path( __FILE__ ));  
define('ABS_MODEL',ABS_WCA.'admin/models/');                        //absolute path of models
define('ABS_CONTROLLER', ABS_WCA.'admin/controllers/');             //absolute path of contollers
define('ABS_VIEW', ABS_WCA.'admin/Views/');                   //absolute path of views
define('wca_url', plugins_url('woocommerce-custom-attribute'));     //url of plugin
define('wca_admin_asset_url', wca_url.'/admin/assets');             //url of admin assets
define('wca_admin_image_url', wca_url.'/admin/assets/images');      //url of admin images 
define('wca_asset_url', wca_url.'/assets');                         //url of public assets
define('wca_image_url', wca_url.'/assets/images');                  //url of public images

/*Start :- define master tables*/

define('IMAGES_TABLE', $wpdb->prefix.'wca_images');             //Butoon master
define('BUTTONS', $wpdb->prefix.'wca_buttons');                 //Butoon master
define('ZIPPER', $wpdb->prefix.'wca_zippers');                  //zipper master
define('LINING', $wpdb->prefix.'wca_linings');                  //Lining master
define('BUTTON_HILO', $wpdb->prefix.'wca_button_hilo');         //Button hilo master
define('BUTTON_OJAL', $wpdb->prefix.'wca_button_ojal');         //Button ojal master
define('NECK_LINING', $wpdb->prefix.'wca_neck_lining');         // Neck lining master
define('ELBOW_PATCHES', $wpdb->prefix.'wca_elbow_patches');     // Elbow patches master
define('FABRICS', $wpdb->prefix.'wca_fabrics');                // Elbow Fabric master
/*end :- define master tables*/

wca_load::controller('wca_fabric');

wca_load::controller('wca_buttons');
add_action( 'wp_ajax_upload_button', 'wca_buttons::upload_buttons'); 
add_action( 'wp_ajax_delete_button_image', 'wca_buttons::delete_images'); 
add_action( 'wp_ajax_active_button', 'wca_buttons::active_button'); 

wca_load::controller('wca_zippers');
add_action( 'wp_ajax_upload_zipper_image', 'wca_zippers::upload_image'); 
add_action( 'wp_ajax_delete_zipper_image', 'wca_zippers::delete_images'); 
add_action( 'wp_ajax_active_zipper', 'wca_zippers::active_inactive'); 
 
wca_load::controller('wca_lining');
add_action( 'wp_ajax_upload_lining_image', 'wca_lining::upload_image'); 
add_action( 'wp_ajax_delete_lining_image', 'wca_lining::delete_images'); 
add_action( 'wp_ajax_active_lining', 'wca_lining::active_inactive'); 

wca_load::controller('wca_button_hilo');
add_action( 'wp_ajax_upload_button_hilo_image', 'wca_button_hilo::upload_image'); 
add_action( 'wp_ajax_delete_button_hilo_image', 'wca_button_hilo::delete_images'); 
add_action( 'wp_ajax_active_button_hilo', 'wca_button_hilo::active_inactive'); 

wca_load::controller('wca_button_ojal');
add_action( 'wp_ajax_upload_button_ojal_image', 'wca_button_ojal::upload_image'); 
add_action( 'wp_ajax_delete_button_ojal_image', 'wca_button_ojal::delete_images'); 
add_action( 'wp_ajax_active_button_ojal', 'wca_button_ojal::active_inactive'); 

wca_load::controller('wca_neck_lining');
add_action( 'wp_ajax_upload_neck_lining_image', 'wca_neck_lining::upload_image'); 
add_action( 'wp_ajax_delete_neck_lining_image', 'wca_neck_lining::delete_images'); 
add_action( 'wp_ajax_active_neck_lining', 'wca_neck_lining::active_inactive'); 

wca_load::controller('wca_elbow_patches');
add_action( 'wp_ajax_upload_elbow_patches_image', 'wca_elbow_patches::upload_image'); 
add_action( 'wp_ajax_delete_elbow_patches_image', 'wca_elbow_patches::delete_images'); 
add_action( 'wp_ajax_active_elbow_patches', 'wca_elbow_patches::active_inactive');  

 
//add_action( 'wp_ajax_upload_button', 'upload_buttons');
function upload_buttons(){
    //$dir_name=get_next_id('wp_wca_buttons');
    include ABS_WCA.'admin/includes/UploadHandler.php';
    $upload_handler = new UploadHandler();
    $dirname='1';
    //pr($_POST);
    //pr($_FILES,true);
}