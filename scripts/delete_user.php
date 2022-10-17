<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

if ( isset( $_POST ) ) {
  // get user id
	$user_id = isset($_POST['user_id']) ? filter_var( $_POST['user_id'], FILTER_SANITIZE_STRING ) : '';
	// Call insert data function
	$result = $conn->delete_table( "users", "user_id", $user_id );
	echo $result;
};
