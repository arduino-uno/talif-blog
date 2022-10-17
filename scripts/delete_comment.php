<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

if ( isset( $_POST ) ) {
  // get comment id
	$comm_id = isset($_POST['comm_id']) ? filter_var( $_POST['comm_id'], FILTER_SANITIZE_STRING ) : '';
	// Call insert data function
	$result = $conn->delete_table( "comments", "comm_id", $comm_id );
	echo $result;
};
