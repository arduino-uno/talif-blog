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
// check request
if ( isset( $_POST ) ) {
    // get values
    $temp_id = isset( $_POST['temp_id'] ) ? filter_var( $_POST['temp_id'], FILTER_SANITIZE_STRING ) : '';
    // Get Templates Details
    $result = $conn->select_table( "templates", "temp_id", $temp_id );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
  			$short_text = shorten( $row["description"], 100 );
    		$sub_array = array();
    		$sub_array["temp_id"] = $row["temp_id"];
  			$sub_array["title"] = $row["title"];
  			$sub_array["description"] = $short_text;
        $sub_array["author_name"] = $row["author_name"];
        $sub_array["author_url"] = $row["author_url"];
  			$sub_array["image"] = $row["image"];
  			$sub_array["status"] = $row["status"];
  			$sub_array["created"] = date( "M j, Y", strtotime( $row["created"] ) );

    		$data[] = $sub_array;
  	};
    echo json_encode( $data, JSON_PRETTY_PRINT );
} else {
    $result = "Invalid Request!";
    echo $result;
};
