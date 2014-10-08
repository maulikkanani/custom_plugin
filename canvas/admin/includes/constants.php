<?php
/**
 * woocommerce-custom-attribute Contants
 *
 * Define contant variables
 *
 * @author      Nalola infotech (mk.narola@narolainfotech.com))
 * @package 	woocommerce-custom-attribute/admin/includes
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


define('ABS_MODEL',ABS_WCA.'admin/models/');                        //absolute path of models
define('ABS_CONTROLLER', ABS_WCA.'admin/controllers/');             //absolute path of contollers
define('ABS_VIEW', ABS_WCA.'admin/Views/');                   //absolute path of views
define('wca_url', plugins_url('woocommerce-custom-attribute'));     //url of plugin
define('wca_admin_asset_url', wca_url.'/admin/assets');             //url of admin assets
define('wca_admin_image_url', wca_url.'/admin/assets/images');      //url of admin images 
define('wca_asset_url', wca_url.'/assets');                         //url of public assets
define('wca_image_url', wca_url.'/assets/images');                  //url of public images


?>