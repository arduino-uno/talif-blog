<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// Call functions library
require("../scripts/functions_lib.php");
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();
// get current user
$user = json_decode( current_user(), true );
// check request
if ( isset( $_POST ) ) {
    // get values
    $title = isset( $_POST['post_title'] ) ? filter_var( $_POST['post_title'], FILTER_SANITIZE_STRING ) : '';
    $body = isset( $_POST['post_body'] ) ? filter_var( $_POST['post_body'], FILTER_SANITIZE_STRING ) : '';
    $category = isset( $_POST['post_category'] ) ? filter_var( $_POST['post_category'], FILTER_SANITIZE_STRING ) : '';
    $tags = isset( $_POST['post_tags'] ) ? filter_var( $_POST['post_tags'], FILTER_SANITIZE_STRING ) : '';

    $arr_data = Array(
        "author"			=> $user['user_id'],
        "title"				=> htmlentities( $title ),
        "body"        => htmlentities( $body ),
        "cat_id"      => $category,
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
// Call insert log function
$insert_log = insert_table_log( "posts" );
// Call insert data function
$result = $conn->insert_table( "posts", $arr_data );
echo $result;
