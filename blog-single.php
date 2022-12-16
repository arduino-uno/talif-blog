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
$post_id = isset( $_GET['pid'] ) ? filter_var( $_GET['pid'], FILTER_SANITIZE_STRING ) : '1';
$smarty->assign( 'post_id', $post_id );
$assign_post_id = render_posts_id( $post_id );
$assign_popular_posts = render_popular_posts();
// display page
$smarty->display('blog-single.tpl');
