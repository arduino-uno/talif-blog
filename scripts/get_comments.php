<?php
error_reporting(0);
// Set Database Config
require('../config/db_config.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
require('../scripts/class_simple_php_crud.php');
// Calling functions library
require('../scripts/functions_lib.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

// check request
if(isset($_POST)) {
    // get values
    $post_id = isset( $_POST['post_id'] ) ? filter_var( $_POST['post_id'], FILTER_SANITIZE_STRING ) : '';
    // Select All rows in 'comments' table
    $result = $conn->select_table( "comments", "post_id", $post_id );
    echo $result;
} else {
    $result = "Invalid Request!";
    echo $result;
};
