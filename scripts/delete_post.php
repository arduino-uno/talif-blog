<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

if ( isset( $_POST ) ) {
  // get post id
	$post_id = isset($_POST['post_id']) ? filter_var( $_POST['post_id'], FILTER_SANITIZE_STRING ) : '';
	// Call insert data function
	$result = $conn->delete_table( "posts", "post_id", $post_id );
	echo $result;
};
