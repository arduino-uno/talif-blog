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
if ( isset( $_POST ) ) {
    // get values
    $post_id = isset( $_POST['post_id'] ) ? filter_var( $_POST['post_id'], FILTER_SANITIZE_STRING ) : '';
    $parent_id = isset( $_POST['parent_id'] ) ? filter_var( $_POST['parent_id'], FILTER_SANITIZE_STRING ) : '';
    $fullname = isset( $_POST['fullname'] ) ? filter_var( $_POST['fullname'], FILTER_SANITIZE_STRING ) : '';
    $email = isset( $_POST['email'] ) ? filter_var( $_POST['email'], FILTER_SANITIZE_STRING ) : '';
    $website = isset( $_POST['website'] ) ? filter_var( $_POST['website'], FILTER_SANITIZE_STRING ) : '';
    $message = isset( $_POST['message'] ) ? filter_var( $_POST['message'], FILTER_SANITIZE_STRING ) : '';

    $arr_data = Array(
        "post_id"     => $post_id,
        "parent_id"   => $parent_id,
        "fullname"		=> $fullname,
        "email"       => $email,
        "website"     => $website,
        "message"     => htmlentities( $message )
    );
    // Call insert data function
    $result = $conn->insert_table( "comments", $arr_data );
    echo $result;
};
