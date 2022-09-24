<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

// check request
if ( isset( $_POST ) ) {
    // get values
    $user_id = isset( $_POST['user_id'] ) ? filter_var( $_POST['user_id'], FILTER_SANITIZE_STRING ) : '';
    // Get Setting Details
    $result = $conn->select_table( "users", "user_id", $user_id );
    echo $result;
} else {
    $result = "Invalid Request!";
    echo $result;
};
