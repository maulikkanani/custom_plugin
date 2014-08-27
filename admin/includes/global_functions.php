<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



function pr($data,$exit=false){
    echo '<pre>'; print_r($data); echo'</pre>';
    if($exit){
        exit;
    }
}


function get_next_id($table) {
        $result = mysql_query("SHOW TABLE STATUS LIKE '" . $table . "'");
        $row = mysql_fetch_array($result);
        $nextId = $row['Auto_increment'];
        return $nextId;
}
?>
