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
    $user_id = isset( $_POST['user_id'] ) ? filter_var( $_POST['user_id'], FILTER_SANITIZE_STRING ) : '';
    $ip_address = isset( $_POST['ip_address'] ) ? filter_var( $_POST['ip_address'], FILTER_SANITIZE_STRING ) : '';

    switch ( $activity ) {
      case 'insert_user' :
        $icon = "fa-plus";
        $message = "Add new user"
        break;
      case 'update_user' :
        $icon = "fa-edit";
        $message = "Update user";
        break;
      case 'delete_user' :
        $icon = "fa-trash";
        $message = "Delete user";
        break;
      case 'insert_page' :
        $icon = "fa-plus";
        $message = "Add new page"
        break;
      case 'update_page' :
        $icon = "fa-edit";
        $message = "Update page";
        break;
      case 'delete_page' :
        $icon = "fa-trash";
        $message = "Delete page";
        break;
      case 'insert_post' :
        $icon = "fa-plus";
        $message = "Add new page"
        break;
      case 'update_post' :
        $icon = "fa-edit";
        $message = "Update page";
        break;
      case 'delete_post' :
        $icon = "fa-trash";
        $message = "Delete page";
        break;
    };

    // set Array new Data
    $arr_data = Array(
        "user_id"    => $user_id,
        "ip_address" => $ip_address,
        "icon"			 => $name,
        "message"    => $message
    );

    // Call insert data function
    $result = $conn->insert_table( "activities", $arr_data );
    echo $result;
};
