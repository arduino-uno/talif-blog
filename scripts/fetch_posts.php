<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// Call functions library
require("../scripts/functions_lib.php");
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

$user = json_decode( current_user(), true );
$user_id = $user["user_id"];

$output = Array();
$rows = Array();

if ( is_admin() ) {

		$query = "SELECT * FROM posts ";

		if ( isset( $_POST["search"]["value"] ) ) {
			 $query .= 'WHERE title LIKE "%'.$_POST["search"]["value"].'%" ';
		};

		if ( isset( $_POST["order"] ) ) {
			 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			 $query .= 'ORDER BY post_id ASC';
		};

		if ( isset( $_POST["length"] ) && $_POST["length"] != -1 ) {
			 $query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		};

} else {

		$query = "SELECT * FROM posts WHERE author_id = $user_id ";

		if ( isset( $_POST["search"]["value"] ) ) {
			 $query .= 'AND title LIKE "%'.$_POST["search"]["value"].'%" ';
		};

		if ( isset( $_POST["order"] ) ) {
			 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			 $query .= 'ORDER BY post_id ASC';
		};

		if ( isset( $_POST["length"] ) && $_POST["length"] != -1 ) {
			 $query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		};

};

$result = $conn->run_query( $query );
$rows = json_decode( $result, true );

	foreach( $rows as $row ) {
  		$sub_array = array();
			// get user detail
			$user = json_decode( get_user_by( "user_id", $row["author_id"] ), true );
			$short_text = shorten( $row["body"], 100 );
			$tags = explode( ',', $row["tags"] );
			$txt_tags = "";
			foreach ($tags as $tag) {
					$txt_tags .= '<small class="badge badge-info">' . $tag . '</small>&nbsp;';
			};
			// fill data into array
  		$sub_array["post_id"] = $row["post_id"];
			$sub_array["author_id"] = $user["user_id"];
			$sub_array["author_name"] = $user["user_fullname"];
			$sub_array["author_image"] = $user["user_image"];
      $sub_array["title"] = $row["title"];
			$sub_array["body"] = $short_text;
			$sub_array["image"] = $row["image"];
      $sub_array["status"] = $row["status"];
  		$sub_array["published"] = date( "F j, Y", strtotime( $row["published"] ) );
			$sub_array["tags"] = $txt_tags;
			$sub_array["likes"] = $row["likes"];

  		$data[] = $sub_array;
	};

  $filtered_rows = count( $rows );
  $rows_cnt = $conn->get_total_all_records( "posts" );

	$output = array(
  		"draw"						=>	( isset( $_POST["draw"] ) ? intval( $_POST["draw"] ) : 0 ),
  		"recordsTotal"		=> 	$filtered_rows,
  		"recordsFiltered"	=>	$rows_cnt,
  		"data"						=>	$data
	);

  echo json_encode( $output, JSON_PRETTY_PRINT );
