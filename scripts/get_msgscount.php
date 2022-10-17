<?php
error_reporting(0);
// Set Database Config
require("../config/db_config.php");
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
require("../scripts/class_simple_php_crud.php");
// Call functions library
require("../scripts/functions_lib.php");
// Set Database Connection
$conn = new Simple_PHP_CRUD_Class();
// Call rows_count function
echo rows_count( "chats" );
