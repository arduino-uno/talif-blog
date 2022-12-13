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
    $cat_id = isset( $_POST['hid_cat_id'] ) ? filter_var( $_POST['hid_cat_id'], FILTER_SANITIZE_STRING ) : '';
    $name = isset( $_POST['upt_cat_name'] ) ? filter_var( $_POST['upt_cat_name'], FILTER_SANITIZE_STRING ) : '';
    $description = isset( $_POST['upt_cat_desc'] ) ? filter_var( $_POST['upt_cat_desc'], FILTER_SANITIZE_STRING ) : '';
    // set Array new Data
    $arr_data = Array(
        "ID"				  => $cat_id,
        "name"        => $name,
        "description" => htmlentities( $description )
    );

    // Call update data function
    $result = $conn->update_table( "categories", $arr_data, "cat_id", $cat_id );
    echo $result;

};
