<?php
error_reporting(0);
// Set Database Config
require("../config/db_config.php");
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
require("../scripts/class_simple_php_crud.php");
// Set Database Connection
$conn = new Simple_PHP_CRUD_Class();
// check request
if ( isset( $_POST ) ) {
    // get values
    $fullname = isset( $_POST['fullname'] ) ? filter_var( $_POST['fullname'], FILTER_SANITIZE_STRING ) : '';
    $email = isset( $_POST['email'] ) ? filter_var( $_POST['email'], FILTER_SANITIZE_STRING ) : '';
    $subject = isset( $_POST['subject'] ) ? filter_var( $_POST['subject'], FILTER_SANITIZE_STRING ) : '';
    $message = isset( $_POST['message'] ) ? filter_var( $_POST['message'], FILTER_SANITIZE_STRING ) : '';

    $arr_data = Array(
        "fullname"		=> $fullname,
        "email"       => $email,
        "subject"     => htmlentities( $subject ),
        "message"     => htmlentities( $message )
    );
    // Call insert data function
    $result = $conn->insert_table( "contacts", $arr_data );
    echo $result;
};
