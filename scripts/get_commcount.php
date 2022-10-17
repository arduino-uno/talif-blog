<?php
error_reporting(0);
// Set Database Config
require("../config/db_config.php");
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
require("../scripts/class_simple_php_crud.php");
// Call functions library
require("../scripts/functions_lib.php");
// Set Database Connection
$conn = new Simple_PHP_CRUD_Class();
// check request
if(isset($_POST)) {
    // get values
    $post_id = isset( $_POST['post_id'] ) ? filter_var( $_POST['post_id'], FILTER_SANITIZE_STRING ) : '';
    // Call rows_count function
    echo rows_count( "comments", "post_id", $post_id, "parent_id", 0 );
} else {
    echo 0;
}
