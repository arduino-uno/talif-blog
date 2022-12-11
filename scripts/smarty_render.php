<?php
/**
 * Smarty Assigning function
 *
 * require files:
 *  - "./config/db_config.php"
 *  - "./scripts/class_simple_php_crud.php"
 *  - "./scripts/functions_lib.php"
 *  - "./scripts/smarty_lib.php"
 *
 * @package Example-application
 **/
error_reporting(0);
// Select site template
$result = $conn->run_query( "SELECT temp_id, temp_dir FROM templates WHERE status = 1" );
$rows = json_decode( $result, true );
$temp_dir = $rows[0]['temp_dir'];
$smarty->template_dir = "./templates/{$temp_dir}/";
$smarty->compile_dir = "./templates/templates_c/";
$smarty->cache_dir = "./templates/cache/";
$smarty->configs_dir = "./templates/configs/";
$smarty->caching = true;
$smarty->cache_lifetime = 120;
// clear all assigned variables
$smarty->clearAllAssign();
// clear the entire cache
$smarty->clearAllCache();
// Call Assigning function
$assign_siteinfo = render_siteinfo();
$assign_users = render_users();
$assign_categories = render_categories();
$assign_posts = render_posts();
$assign_latest_posts = render_latest_posts();
$assign_limit_posts = render_latest_posts(4);
$assign_popular_posts = render_popular_posts();
