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
    $user_login = isset( $_POST['username'] ) ? filter_var( $_POST['username'], FILTER_SANITIZE_STRING ) : '';
    $user_fullname = isset( $_POST['fullname'] ) ? filter_var( $_POST['fullname'], FILTER_SANITIZE_STRING ) : '';
    $user_email = isset( $_POST['email'] ) ? filter_var( $_POST['email'], FILTER_SANITIZE_STRING ) : '';
    $user_pass = isset( $_POST['password'] ) ? filter_var( $_POST['password'], FILTER_SANITIZE_STRING ) : '';
    // encrypt user password
    $enc_pass = md5( $user_pass );
    // set Array new Data
    $arr_data = Array(
        "user_login"		=> $user_login,
        "user_fullname" => $user_fullname,
        "user_email" 		=> $user_email,
        "user_pass"     => $enc_pass
    );

};

if ( isset( $_FILES ) ) {
    // Saving Image
    $temp_name = $_FILES['image_file']['name'];
    $pic_type = $_FILES['image_file']['type'];
    $pic_temp = $_FILES['image_file']['tmp_name'];
    $pic_path = "../images/";
    // add user image
    $arr_data += [ 'user_image' => $temp_name ];
    // upload the file
    $target_file = $pic_path . basename( $_FILES['image_file']['name'] );
    $extension = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );
    $allowed_extensions = array( "png", "jpg", "jpeg", "gif" );
    if ( in_array( $extension, $allowed_extensions ) ) {
        $upload = move_uploaded_file( $pic_temp, $pic_path.$temp_name );
    };

};
// Call insert data function
$result = $conn->insert_table( "users", $arr_data );
echo $result;
