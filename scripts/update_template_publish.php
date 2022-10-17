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
    $temp_id = isset( $_POST['temp_id'] ) ? filter_var( $_POST['temp_id'], FILTER_SANITIZE_STRING ) : '';
    // Call update data function
    $arr_data += [ 'status' => 1 ];
    $update_result = $conn->update_table( "templates", $arr_data, "temp_id", $temp_id );
    $toogle_result = $conn->run_query( "UPDATE templates SET status = 0 WHERE status = 1 AND temp_id != $temp_id" );
    echo $toogle_result;
};
