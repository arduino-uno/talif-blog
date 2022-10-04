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
    $act_id = isset( $_POST['act_id'] ) ? filter_var( $_POST['act_id'], FILTER_SANITIZE_STRING ) : '';
    // Get Setting Details
    $query = "SELECT a.*,
    							b.user_id,
    							b.user_login,
    							b.user_fullname,
    							b.user_role,
    							b.user_image
    					FROM activities a, users b
    					WHERE a.user_id = b.user_id";

    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
        $sub_array = array();
        $sub_array["act_id"] = $row["act_id"];
        $sub_array["user_login"] = $row["user_login"];
        $sub_array["user_fullname"] = $row["user_fullname"];
        $sub_array["ip_address"] = $row["ip_address"];
        $sub_array["user_role"] = $row["user_role"];
        $sub_array["icon"] = $row["icon"];
        $sub_array["message"] = $row["message"];
        $sub_array["created"] = get_date_diff( strtotime("now"), strtotime( $row["created"] ) );

        $data[] = $sub_array;
    };
    echo json_encode( $data, JSON_PRETTY_PRINT );
} else {
    $result = "Invalid Request!";
    echo $result;
};
