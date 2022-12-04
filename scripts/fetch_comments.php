<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// Calling functions library
require('../scripts/functions_lib.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

$user = json_decode( current_user(), true );
$user_id = $user["user_id"];

$output = Array();
$rows = Array();

$parent_id = isset( $_POST['parent_id'] ) ? filter_var( $_POST['parent_id'], FILTER_SANITIZE_STRING ) : '';
$query = "SELECT * FROM comments WHERE parent_id = $parent_id ";

if ( isset( $_POST["search"]["value"] ) ) {
	 $query .= 'AND message LIKE "%'.$_POST["search"]["value"].'%" ';
};

if ( isset( $_POST["order"] ) ) {
	 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
} else {
	 $query .= 'ORDER BY comm_id ASC';
};

if ( isset( $_POST["length"] ) && $_POST["length"] != -1 ) {
	 $query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
};

$result = $conn->run_query( $query );
$rows = json_decode( $result, true );

	foreach( $rows as $row ) {
  		$sub_array = array();
  		$sub_array["comm_id"] = $row["comm_id"];
			// get post detail
			$post = json_decode( get_post_by( "post_id", $row["post_id"] ), true );
			$short_post = shorten( $post["body"], 150 );
			$short_msg = shorten( $row["message"], 150 );
			// fill data into array
			$sub_array["comm_id"] = $row["comm_id"];
			$sub_array["parent_id"] = $row["parent_id"];
			$sub_array["post_id"] = $post["post_id"];
			$sub_array["author_id"] = $user["user_id"];
			$sub_array["author_name"] = $user["user_fullname"];
			$sub_array["author_image"] = $user["user_image"];
			$sub_array["title"] = $post["title"];
			$sub_array["body"] = $short_post;
			$sub_array["post_status"] = $post["status"];
			$sub_array["cat_id"] = $post["cat_id"];
			$sub_array["category"] = $post["category"];
			$sub_array["image"] = $post["image"];
			// fill comments data into array
			$sub_array["fullname"] = $row["fullname"];
			$sub_array["email"] = $row["email"];
			$sub_array["website"] = $row["website"];
			$sub_array["message"] = $short_msg;
			$sub_array["likes"] = $row["likes"];
			$sub_array["status"] = $row["status"];
			$sub_array["created"] = date( "M j, Y", strtotime( $post["created"] ) );

  		$data[] = $sub_array;
	};

  $filtered_rows = count( $rows );
  $rows_cnt = $conn->get_total_all_records( "comments" );

	$output = array(
  		"draw"						=>	( isset( $_POST["draw"] ) ? intval( $_POST["draw"] ) : 0 ),
  		"recordsTotal"		=> 	$filtered_rows,
  		"recordsFiltered"	=>	$rows_cnt,
  		"data"						=>	$data
	);

  echo json_encode( $output, JSON_PRETTY_PRINT );
