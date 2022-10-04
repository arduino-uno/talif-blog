<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// Calling functions library
require('../scripts/functions_lib.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

$output = Array();
$rows = Array();

$query = "SELECT * FROM templates ";

if ( isset( $_POST["search"]["value"] ) ) {
	 $query .= 'WHERE title OR description LIKE "%'.$_POST["search"]["value"].'%" ';
};

if ( isset( $_POST["order"] ) ) {
	 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
} else {
	 $query .= 'ORDER BY temp_id ASC';
};

if ( isset( $_POST["length"] ) && $_POST["length"] != -1 ) {
	 $query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
};

$result = $conn->run_query( $query );
$rows = json_decode( $result, true );

	foreach( $rows as $row ) {
			$short_text = shorten( $row["description"], 100 );
  		$sub_array = array();
  		$sub_array["temp_id"] = $row["temp_id"];
			$sub_array["title"] = $row["title"];
			$sub_array["description"] = $short_text;
			$sub_array["image"] = $row["image"];
			$sub_array["status"] = $row["status"];
			$sub_array["created"] = date( "M j, Y", strtotime( $row["created"] ) );

  		$data[] = $sub_array;
	};

  $filtered_rows = count( $rows );
  $rows_cnt = $conn->get_total_all_records( "templates" );

	$output = array(
  		"draw"						=>	( isset( $_POST["draw"] ) ? intval( $_POST["draw"] ) : 0 ),
  		"recordsTotal"		=> 	$filtered_rows,
  		"recordsFiltered"	=>	$rows_cnt,
  		"data"						=>	$data
	);

  echo json_encode( $output, JSON_PRETTY_PRINT );
