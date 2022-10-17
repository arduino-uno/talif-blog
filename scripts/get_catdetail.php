<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

// check request
if(isset($_POST)) {
    // get values
    $cat_id = isset( $_POST['cat_id'] ) ? filter_var( $_POST['cat_id'], FILTER_SANITIZE_STRING ) : '';
    // Get Setting Details
    $result = $conn->select_table( "categories", "cat_id", $cat_id );
    echo $result;
} else {
    $result = "Invalid Request!";
    echo $result;
};
