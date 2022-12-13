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
    $user_id = isset( $_POST['hid_user_id'] ) ? filter_var( $_POST['hid_user_id'], FILTER_SANITIZE_STRING ) : '';
    $user_login = isset( $_POST['upt_username'] ) ? filter_var( $_POST['upt_username'], FILTER_SANITIZE_STRING ) : '';
    $user_firstname = isset( $_POST['upt_firstname'] ) ? filter_var( $_POST['upt_firstname'], FILTER_SANITIZE_STRING ) : '';
    $user_lastname = isset( $_POST['upt_lastname'] ) ? filter_var( $_POST['upt_lastname'], FILTER_SANITIZE_STRING ) : '';
    $user_email = isset( $_POST['upt_email'] ) ? filter_var( $_POST['upt_email'], FILTER_SANITIZE_STRING ) : '';
    $user_phone = isset( $_POST['upt_phone'] ) ? filter_var( $_POST['upt_phone'], FILTER_SANITIZE_STRING ) : '';
    $user_orgname = isset( $_POST['upt_orgname'] ) ? filter_var( $_POST['upt_orgname'], FILTER_SANITIZE_STRING ) : '';
    $user_location = isset( $_POST['upt_location'] ) ? filter_var( $_POST['upt_location'], FILTER_SANITIZE_STRING ) : '';
    $user_birthday = isset( $_POST['upt_birthday'] ) ? filter_var( $_POST['upt_birthday'], FILTER_SANITIZE_STRING ) : '';
    $user_pass = isset( $_POST['upt_password'] ) ? filter_var( $_POST['upt_password'], FILTER_SANITIZE_STRING ) : '';
    $user_role = isset( $_POST['upt_role'] ) ? filter_var( $_POST['upt_role'], FILTER_SANITIZE_STRING ) : '';
    $user_status = isset( $_POST['upt_status'] ) ? filter_var( $_POST['upt_status'], FILTER_SANITIZE_STRING ) : '';
    // user_fullname
    $user_fullname = $user_firstname . " " . $user_lastname;
    // user status Active or Inactive
    $status = ( $user_status ? 1 : 0 );
    // encrypt user password
    $enc_pass = md5( $user_pass );
    // set Array new Data
    $arr_data = Array(
        "user_login"		=> $user_login,
        "user_fullname" => $user_fullname,
        "user_email" 		=> $user_email,
        "user_phone"    => $user_phone,
        "user_orgname"  => htmlentities( $user_orgname ),
        "user_location" => htmlentities( $user_location ),
        "user_birthday" => $user_birthday,
        "user_role"     => $user_role,
        "user_status"   => $status
    );

    if ( !empty( $user_pass ) ) $arr_data += [ 'user_pass' => $enc_pass ];

};

if ( isset( $_FILES ) ) {
    // Saving Image
    $temp_name = $_FILES['upt_image_file']['name'];
    $pic_type = $_FILES['upt_image_file']['type'];
    $pic_temp = $_FILES['upt_image_file']['tmp_name'];
    $pic_path = "../images/";
    // add user image
    $arr_data += [ 'user_image' => $temp_name ];
    // upload the file
    $target_file = $pic_path . basename( $_FILES['upt_image_file']['name'] );
    $extension = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );
    $allowed_extensions = array( "png", "jpg", "jpeg", "gif" );
    if ( in_array( $extension, $allowed_extensions ) ) {
        $upload = move_uploaded_file( $pic_temp, $pic_path.$temp_name );
    };

};

// Call update data function
$result = $conn->update_table( "users", $arr_data, "user_id", $user_id );
echo $result;
