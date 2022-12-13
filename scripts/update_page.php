<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// Call functions library
require("../scripts/functions_lib.php");
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();
// check request
if ( isset( $_POST ) ) {
    // get values
    $page_id = isset( $_POST['hid_page_id'] ) ? filter_var( $_POST['hid_page_id'], FILTER_SANITIZE_STRING ) : '';
    $title = isset( $_POST['upt_page_title'] ) ? filter_var( $_POST['upt_page_title'], FILTER_SANITIZE_STRING ) : '';
    $body = isset( $_POST['upt_page_body'] ) ? filter_var( $_POST['upt_page_body'], FILTER_SANITIZE_STRING ) : '';
    $tags = isset( $_POST['upt_page_tags'] ) ? filter_var( $_POST['upt_page_tags'], FILTER_SANITIZE_STRING ) : '';

    $arr_data = Array(
        "title"				=> htmlentities( $title ),
        "body"        => htmlentities( $body ),
        "tags" 			  => $tags
    );

};

if ( !empty( $_FILES['upt_img_file']['name'] ) ) {
    // Saving Image
    $temp_name = $_FILES['upt_img_file']['name'];
    $pic_type = $_FILES['upt_img_file']['type'];
    $pic_temp = $_FILES['upt_img_file']['tmp_name'];
    $pic_path = "../images/";
    // add user image
    $arr_data += [ 'image' => $temp_name ];
    // upload the file
    $target_file = $pic_path . basename( $_FILES['upt_img_file']['name'] );
    $extension = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );
    $allowed_extensions = array( "png", "jpg", "jpeg", "gif" );
    if ( in_array( $extension, $allowed_extensions ) ) {
        $upload = move_uploaded_file( $pic_temp, $pic_path.$temp_name );
    };

};
// Call update log function
$update_log = update_table_log( "pages" );
// Call update data function
$result = $conn->update_table( "pages", $arr_data, "page_id", $page_id );
echo $result;
