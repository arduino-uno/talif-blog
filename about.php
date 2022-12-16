<?php
/**
 * Example Application
 *
 * @package Example-application
 **/
error_reporting(0);
// Set Database Config
require("./config/db_config.php");
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
require("./scripts/class_simple_php_crud.php");
// Call functions library
require("./scripts/functions_lib.php");
// Call smarty functions library
require("./scripts/smarty_lib.php");
// Set Database Connection
$conn = new Simple_PHP_CRUD_Class();
// Set Database Config
require("./smarty/Smarty.class.php");
$smarty = new Smarty;
// Call Assigning function
require("./scripts/smarty_render.php");
// display page
$smarty->display('about.tpl');
