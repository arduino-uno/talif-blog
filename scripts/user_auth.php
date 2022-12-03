<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// Call functions library
require("../scripts/functions_lib.php");
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();
// Use filter_var to prevent from SQL injection attack
$username = isset($_POST['username']) ? filter_var( $_POST['username'], FILTER_SANITIZE_STRING ) : '';
$password = isset($_POST['password']) ? filter_var( $_POST['password'], FILTER_SANITIZE_STRING ) : '';

if ( !empty($username) && !empty($password) ) {
		$result = $conn->run_query( "SELECT * FROM users WHERE user_login = '$username' AND user_pass = md5('$password') AND user_status = 1" );
		$rows = json_decode( $result, JSON_PRETTY_PRINT );
		
		if ( count($rows) > 0 ) {
			session_start();
			$_SESSION['user_id'] = $rows[0][user_id];
			$_SESSION['user_login'] = $rows[0][user_login];
			$_SESSION['user_fullname'] = $rows[0][user_fullname];
			$_SESSION['user_role'] = $rows[0][user_role];
			$_SESSION['user_image'] = $rows[0][user_image];
			// return
			echo "TRUE";
		} else {
      echo "FALSE";
    };

};
exit();
