<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();
// create an array
$arr_data = Array();
// check request
if ( isset( $_POST ) ) {
    // get values
    $page_id = isset( $_POST['page_id'] ) ? filter_var( $_POST['page_id'], FILTER_SANITIZE_STRING ) : '';
    // Get page status
    $result = $conn->run_query( "SELECT page_id, status FROM pages WHERE page_id = $page_id" );
    $rows = json_decode( $result, true );
    $status = $rows[0]['status'];
    ( $status == true ) ? $arr_data += [ 'status' => 0 ] : $arr_data += [ 'status' => 1 ];
    // Call update data function
    $result = $conn->update_table( "pages", $arr_data, "page_id", $page_id );
    echo $result;
};
