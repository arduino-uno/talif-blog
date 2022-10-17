<?php
error_reporting(0);
// Set Database Config
require("../config/db_config.php");
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
require("../scripts/class_simple_php_crud.php");
// Calling functions library
require("../scripts/functions_lib.php");
// Set Database Connection
$conn = new Simple_PHP_CRUD_Class();

if ( isset( $_POST ) ) {
    $user = json_decode( current_user(), true );
    $user_id = $user['user_id'];
    $message = isset( $_POST['message'] ) ? filter_var( $_POST['message'], FILTER_SANITIZE_STRING ) : '';
    // set Array new Data
    $arr_data = Array(
        "user_id"	=> $user_id,
        "message" => $message
    );
    // Call insert data function
    $result = $conn->insert_table( "chats", $arr_data );
    echo $result;
};
