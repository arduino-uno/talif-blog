<?php
/**
 * Example Application
 *
 * @package Example-application
 **/
error_reporting(0);
// Set Database Config
require("../config/db_config.php");
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
require("../scripts/class_simple_php_crud.php");
// Calling functions library
require("../scripts/functions_lib.php");
// Set Database Connection
$conn = new Class_DataTables_CRUD();
$conn->getConnection();
// Set Database Config
require("../smarty/Smarty.class.php");
$smarty = new Smarty;
// $smarty->force_compile = true;
// $smarty->debugging = true;
$smarty->template_dir = './simple/';
$smarty->compile_dir = './templates_c/';
$smarty->cache_dir = './cache/';
$smarty->configs_dir = './configs/';
$smarty->caching = true;
$smarty->cache_lifetime = 120;
// clear all assigned variables
$smarty->clearAllAssign();
// clear the entire cache
$smarty->clearAllCache();
// Call siteinfo Assign function
render_siteinfo();
// Assign siteinfo
function render_siteinfo() {
    global $conn, $smarty;
    // Assign siteinfo table
    $query = "SELECT * FROM siteinfo";
    $result = $conn->get_sql_exec( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
      		$sub_array = array();
      		$smarty->assign( "id", $row["id"] );
    			$smarty->assign( "title", $row["title"] );
          $smarty->assign( "description", $row["description"] );
          $smarty->assign( "address", $row["address"] );
          $smarty->assign( "phone", $row["phone"] );
          $smarty->assign( "fax", $row["fax"] );
          $smarty->assign( "email", $row["email"] );
          $smarty->assign( "logo", $row["logo"] );
          $smarty->assign( "facebook", $row["facebook"] );
          $smarty->assign( "twitter", $row["twitter"] );
          $smarty->assign( "google", $row["google"] );
          $smarty->assign( "linkedin", $row["linkedin"] );
          $smarty->assign( "youtube", $row["youtube"] );

      		$data[] = $sub_array;
    };

};

$smarty->display('index.tpl');

// Assign users table
$query = "SELECT * FROM users";
$result = $conn->run_query( $query );
$rows = json_decode( $result, true );

foreach( $rows as $row ) {
  		$sub_array = array();
  		$sub_array["user_id"] = $row["user_id"];
			$sub_array["user_login"] = $row["user_login"];
      $sub_array["user_fullname"] = $row["user_fullname"];
      $sub_array["user_email"] = $row["user_email"];
  		$sub_array["user_role"] = $row["user_role"];
			$sub_array["user_image"] = $row["user_image"];
			$sub_array["user_joined"] = $row["user_joined"];
			$sub_array["user_status"] = $row["user_status"];

  		$users[] = $sub_array;
};

$smarty->assign('users', $users);
// Assign pages table
$query = "SELECT * FROM pages";
$result = $conn->run_query( $query );
$rows = json_decode( $result, true );

foreach( $rows as $row ) {
  		$sub_array = array();
  		$sub_array["ID"] = $row["ID"];
      $sub_array["title"] = $row["title"];
      $sub_array["body"] = $row["body"];
      $sub_array["status"] = $row["status"];
  		$sub_array["published"] = $row["published"];
      $sub_array["tags"] = $row["tags"];
      $sub_array["description"] = $row["description"];

  		$pages[] = $sub_array;
};

$smarty->assign('pages', $pages);
// Assign posts table
$query = "SELECT * FROM posts";
$result = $conn->run_query( $query );
$rows = json_decode( $result, true );

foreach( $rows as $row ) {
  		$sub_array = array();
  		$sub_array["ID"] = $row["ID"];
      $sub_array["title"] = $row["title"];
      $sub_array["body"] = $row["body"];
      $sub_array["status"] = $row["status"];
  		$sub_array["published"] = $row["published"];
      $sub_array["tags"] = $row["tags"];
      $sub_array["description"] = $row["description"];

  		$posts[] = $sub_array;
};

$smarty->assign('posts', $posts);

if ( isset( $_GET['page_id'] ) ) {
    $page_id = isset( $_GET['page_id'] ) ? filter_var( $_GET['page_id'], FILTER_SANITIZE_STRING ) : '';
    render_page( $page_id );
} elseif ( $_GET['post_id'] ) {
    $post_id = isset( $_GET['post_id'] ) ? filter_var( $_GET['post_id'], FILTER_SANITIZE_STRING ) : '';
    render_post( $post_id );
} else {
    $smarty->display('index.tpl');
};

function render_page( $page_id ) {
    global $conn, $smarty;
    // clear all assigned variables
    $smarty->clearAllAssign();
    // clear the entire cache
    $smarty->clearAllCache();
    // Assign siteinfo table
    render_siteinfo();
    // Assign pages table
    $query = "SELECT * FROM pages WHERE ID = $page_id";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
          $sub_array = array();
          $sub_array["ID"] = $row["ID"];
          $sub_array["title"] = $row["title"];
          $sub_array["body"] = $row["body"];
          $sub_array["status"] = $row["status"];
          $sub_array["published"] = $row["published"];
          $sub_array["tags"] = $row["tags"];
          $sub_array["description"] = $row["description"];

          $posts[] = $sub_array;
    };

    $smarty->assign('page_line', $posts);
    $smarty->display('page.tpl');
};

function render_post( $post_id ) {
    global $conn, $smarty;
    // clear all assigned variables
    $smarty->clearAllAssign();
    // clear the entire cache
    $smarty->clearAllCache();
    // Assign siteinfo table
    render_siteinfo();
    // Assign pages table
    $query = "SELECT * FROM posts WHERE ID = $post_id";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
          $sub_array = array();
          $sub_array["ID"] = $row["ID"];
          $sub_array["title"] = $row["title"];
          $sub_array["body"] = $row["body"];
          $sub_array["status"] = $row["status"];
          $sub_array["published"] = $row["published"];
          $sub_array["tags"] = $row["tags"];
          $sub_array["description"] = $row["description"];

          $posts[] = $sub_array;
    };

    $smarty->assign('post_line', $posts);
    $smarty->display('post.tpl');
};
