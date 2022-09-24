<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

$output = Array();
$rows = Array();

$query = "SELECT * FROM users ";

if ( isset( $_POST["search"]["value"] ) ) {
	 $query .= 'WHERE user_login OR user_fullname LIKE "%'.$_POST["search"]["value"].'%" ';
};

if ( isset( $_POST["order"] ) ) {
	 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
} else {
	 $query .= 'ORDER BY user_id ASC';
};

if ( isset( $_POST["length"] ) && $_POST["length"] != -1 ) {
	 $query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
};

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

  		$data[] = $sub_array;
	};

  $filtered_rows = count( $rows );
  $rows_cnt = $conn->get_total_all_records( "users" );

	$output = array(
  		"draw"						=>	( isset( $_POST["draw"] ) ? intval( $_POST["draw"] ) : 0 ),
  		"recordsTotal"		=> 	$filtered_rows,
  		"recordsFiltered"	=>	$rows_cnt,
  		"data"						=>	$data
	);

  echo json_encode( $output, JSON_PRETTY_PRINT );
