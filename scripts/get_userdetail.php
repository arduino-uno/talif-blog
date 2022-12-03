<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// Call functions library
require('../scripts/functions_lib.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

// check request
if ( isset( $_POST ) ) {
    // get values
    $user = json_decode( current_user(), true );
    // Get Setting Details
    $result = $conn->select_table( "users", "user_id", $user['user_id'] );
    echo $result;
} else {
    $result = "Invalid Request!";
    echo $result;
};
