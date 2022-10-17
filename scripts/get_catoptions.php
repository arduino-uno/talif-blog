<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

$result = $conn->select_table( "categories" );
$rows = json_decode( $result, true );

foreach( $rows as $row ) {
    $data[] = array("id" => $row["cat_id"], "name" => $row["name"]);
};

echo json_encode( $data, JSON_PRETTY_PRINT );
