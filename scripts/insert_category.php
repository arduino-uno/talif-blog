<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// Calling functions library
require("../scripts/functions_lib.php");
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

// check request
if ( isset( $_POST ) ) {
    // get values
    $name = isset( $_POST['cat_name'] ) ? filter_var( $_POST['cat_name'], FILTER_SANITIZE_STRING ) : '';
    $description = isset( $_POST['cat_desc'] ) ? filter_var( $_POST['cat_desc'], FILTER_SANITIZE_STRING ) : '';
    // set Array new Data
    $arr_data = Array(
        "name"				=> $name,
        "description" => htmlentities( $description )
    );

    // Call insert data function
    $result = $conn->insert_table( "categories", $arr_data );
    echo $result;
};
