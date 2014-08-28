<?php

/* * *************************************************************************
  // Author : Maulik B Kanani
 * *************************************************************************** */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (!class_exists('WP_List_Table')) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-links-list-table.php' );
}

class Wca_Grid_Data extends WP_List_Table {

    /**     * ***********************************************************************
     * REQUIRED. Set up a constructor that references the parent constructor. We 
     * use the parent reference to set some default configs.
     * ************************************************************************* */
   static protected $methods = array();
    var $UniqueKey;
    var $OrderBy;
    var $Order;  
    
    public static function registerMethod($method) {
      self::$methods[] = $method;
      
    }

    public function __call($method, $args) {
      if (in_array($method, self::$methods)) {
        return call_user_func_array($method, $args);
      }
    }
  
    function __construct($arg) {
        global $status, $page, $wpdb;
        
        $this->_arg=$arg;
        $this->columns=$this->_arg['columns'];
        $this->table = $this->_arg['table'];
        $this->UniqueKey=$this->_arg['uniquekey'];
        $this->titel=$this->_arg['titel'];
        $this->table=$this->_arg['table'];
            
        
     
        parent::__construct(array(
            'singular' => $this->_arg['CheckBox_name'],     //Check box name name of the listed records
            'plural' => $this->_arg['plural'],              //table class name of the listed records
            'ajax' => true                                  //does this table support ajax?
        ));
        
    }

    
    function column_default($item, $column_name) {
         switch ($column_name) :
             case $this->titel:
                return $this->column_title($item);
                break;
              
             default:  
                 return $this->CreteList($item, $column_name);
                break;
            
         endswitch;
        
    }

    function get_uniquekey(){
        global $wpdb;
        $uniquekey=$wpdb->get_row("SHOW COLUMNS FROM wp_test WHERE `Key` = 'PRI' AND `Extra`='auto_increment'");
        return $uniquekey->Field;
    }

    function get_columns() {
        
        $columns['cb']='<input type="checkbox" />';
        foreach ($this->columns as $dbfield=>$attrs):
        $columns[$dbfield]=$attrs['lable'];    
        endforeach;
        return $columns;
    }
    
    function get_sortable_columns() {
        $sortable_columns=array();
         foreach ($this->columns as $dbfield=>$attrs):
           if($attrs['sort']):
               $sortable_columns[$dbfield]=array($dbfield);
           endif;
           if($attrs['DefaultShort']):
               $this->OrderBy=$dbfield;
               $this->Order=$attrs['Sort_order'];
           endif;
        endforeach;
        if($this->OrderBy==''):
            $this->OrderBy=$this->UniqueKey;
            $this->Order='DESC';
        endif;
        return $sortable_columns;
    }

    function column_cb($item) {
        return sprintf(
                '<input type="checkbox" name="%1$s[]" value="%2$s" />',
                /* $1%s */ $this->_args['singular'],        //name of check boxes
                /* $2%s */ $item[$this->UniqueKey]                //value-of-check boxes
        );
    }
    
    function column_title($item) {
        //Build row actions
        $actions = array(
            'edit' => sprintf('<a href="?page=%s&action=%s&id=%s">Edit</a>', $_REQUEST['page'], 'edit', $item[$this->UniqueKey]),
            'delete' => sprintf('<a href="?page=%s&action=%s&%s=%s">Delete</a>', $_REQUEST['page'], 'delete', $this->_args['singular'], $item[$this->UniqueKey]),
        );


        //Return the title contents
        return sprintf('%1$s %2$s', '<span>' . $item[$this->titel] . '</span>', $this->row_actions($actions)
        );
    }
    
    // For adding bulk deletion option to list.
    function get_bulk_actions() {
        return $this-> BluckAction();
    }
    
    
    // Fetch datas from database
    function fetch_data($sql) {
        global $total_result;
        if (trim($sql) != "") {
            $fnlarr = array();
             $fsql = $sql;
            $fresults = mysql_query($fsql);
            if($fresults){ 
                for ($i = 0; $i < mysql_num_rows($fresults); $i++) {
                    $farr = mysql_fetch_assoc($fresults);
                    array_push($fnlarr, $farr);
                }
             }
                $total_result = sizeof($fnlarr);
                return $fnlarr;
        }
    }

    

    function prepare_items() {
        global $wpdb;
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();

        $this->_column_headers = array($columns, $hidden, $sortable);
        
        $sql=$this->CreateQuery();
        $total_items=count($wpdb->get_results($sql));
        $current_page = $this->get_pagenum();
        
         $this->OrderBy = (!empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : $this->OrderBy;  
         $this->Order = (!empty($_REQUEST['order'])) ? $_REQUEST['order'] : $this->Order;  
         $sql.=" ORDER BY $this->OrderBy $this->Order ";
         $sql.=" LIMIT ".$this->_arg['per_page']." OFFSET ".(($current_page - 1) * $this->_arg['per_page']);
        
        $data = $this->fetch_data($sql);
        
        $this->items = $data;

        $this->set_pagination_args(array(
            'total_items' => $total_items,                                   //WE have to calculate the total number of items
            'per_page' => $this->_arg['per_page'],                            //WE have to determine how many items to show on a page
            'total_pages' => ceil($total_items / $this->_arg['per_page'])     //WE have to calculate the total number of pages
        ));
    }

}

// End class
?>