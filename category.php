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
// $smarty->force_compile = true;
// $smarty->debugging = true;
$smarty->template_dir = './templates/wordify/';  // clean-blog
$smarty->compile_dir = './templates/templates_c/';
$smarty->cache_dir = './templates/cache/';
$smarty->configs_dir = './templates/configs/';
$smarty->caching = true;
$smarty->cache_lifetime = 120;
// clear all assigned variables
$smarty->clearAllAssign();
// clear the entire cache
$smarty->clearAllCache();
// Get user ip address
$user_ip = get_client_ip();
// Get page name
$page = $_SERVER['QUERY_STRING'];
// Call Assigning function
$assign_siteinfo = render_siteinfo();
$assign_categories = render_categories();
$assign_posts = render_posts();
// get values
$cat_id = isset( $_GET['cid'] ) ? filter_var( $_GET['cid'], FILTER_SANITIZE_STRING ) : '0';
// Call page hit counter function
if ( isset( $page ) ) $pagecnt = hit_counter( $user_ip, $page );
$assign_category = render_category( $cat_id );
$assign_post_category = render_posts_category( $cat_id );
// display page
$smarty->display('category.tpl');
