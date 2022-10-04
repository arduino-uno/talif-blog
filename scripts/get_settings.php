<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

// check request
if ( isset($_POST) ) {
    // Get Setting Details
    $result = $conn->select_table( "siteinfo", "ID", 1 );
    echo $result;
} else {
    $result = "Invalid Request!";
    echo $result;
};
