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
// get values
$cat_id = isset( $_GET['cid'] ) ? filter_var( $_GET['cid'], FILTER_SANITIZE_STRING ) : '0';
$assign_category = render_category( $cat_id );
$assign_post_category = render_posts_category( $cat_id );
$assign_categories = render_categories();
$assign_popular_posts = render_popular_posts();
// display page
$smarty->display('category.tpl');
