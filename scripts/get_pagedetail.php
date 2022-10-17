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
    $page_id = isset( $_POST['page_id'] ) ? filter_var( $_POST['page_id'], FILTER_SANITIZE_STRING ) : '';
    // Get Pages Details
    $result = $conn->select_table( "pages", "page_id", $page_id );
    echo $result;
} else {
    $result = "Invalid Request!";
    echo $result;
};
