<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

if ( isset( $_POST ) ) {
  // get contact id
	$contact_id = isset($_POST['contact_id']) ? filter_var( $_POST['contact_id'], FILTER_SANITIZE_STRING ) : '';
	// Call insert data function
	$result = $conn->delete_table( "contacts", "ct_id", $contact_id );
	echo $result;
};
