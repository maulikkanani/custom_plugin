<?php
/**
 * woocommerce-custom-attribute MVC
 *
 * Sets up  for load models and contollers
 *
 * @author      Nalola infotech (mk.narola@narolainfotech.com))
 * @package 	woocommerce-custom-attribute/admin/includes
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * wca_load
 */
class wca_load{
    
    public static function model($model){
        return include ABS_MODEL.$model.'.php';
    }
    
    public static function controller($controller){
        return include ABS_CONTROLLER.$controller.'.php';
    }
    
    public static function view($view,$data=array()){
        extract($data);
        return include_once  ABS_VIEW.$view.'.php';
    }
    
    public static function view_old($category,$view,$data=array()){
        if(count($data)==0)
            $data=  get_defined_vars ();
        
        pr($data);
        $data=  extract($data);
        return include_once  ABS_VIEW.$category.'/'.$view.'.php';
    }
    
    public static function load_constants(){
        include ABS_WCA.'admin/includes/constants.php';
    }
    
}

?>