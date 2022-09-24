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
    $post_id = isset( $_POST['post_id'] ) ? filter_var( $_POST['post_id'], FILTER_SANITIZE_STRING ) : '';
    // Get post status
    $result = $conn->run_query( "SELECT post_id, status FROM posts WHERE post_id = $post_id" );
    $rows = json_decode( $result, true );
    $status = $rows[0]['status'];
    ( $status == true ) ? $arr_data += [ 'status' => 0 ] : $arr_data += [ 'status' => 1 ];
    // Call update data function
    $result = $conn->update_table( "posts", $arr_data, "post_id", $post_id );
    echo $result;
};
