<?php
error_reporting(0);
// Set Database Config
require("./config/db_config.php");
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
require("./scripts/class_simple_php_crud.php");
// Calling functions library
require("./scripts/functions_lib.php");
// Set Database Connection
$conn = new Simple_PHP_CRUD_Class();
// Get user ip address
$user_ip = get_client_ip();
/*
$login_log = login_time();
echo $login_log;
echo "<br>";
$last_id = $conn->get_last_id();
echo $last_id;
echo "<br>";
*/

// $result = insert_table_log("posts");
// echo $result;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- jQuery UI -->
  <link rel="stylesheet" href="./plugins/jquery-ui/jquery-ui.min.css">
  <!-- DataTables -->
	<link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="./plugins/toastr/toastr.min.css">
  <!-- tagsInput -->
  <link rel="stylesheet" href="./plugins/tags-input/jquery.tagsinput-revisited.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- Custom style -->
  <link rel="stylesheet" href="./dist/css/style.css">
  <link href="http://cdn.datatables.net/1.10.5/css/jquery.dataTables.css" rel="stylesheet"/>
</head>
  <body>
    <div class="jumbotron">
      <div class="container">
        <div class="row">
          <table id="example" class="display" cellspacing="0" width="100%"></table>
        </div>
      </div>
    </div>
  </body>
  <!-- jQuery -->
  <script src="./plugins/jquery/jquery.min.js"></script>
  <script src="http://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript">
  $('#example').dataTable({
    "ajax":{
        url:"./scripts/fetch_templates.php",
        type:"POST"
    },
    "columnDefs": [
      {data: {temp_id:'temp_id', title:'title', description:'description', image:'image', created:'created'}, className: 'text-center', name: 'temp_id', targets:0, orderable: true, searchable: true},
    ],
    "rowCallback": function( row, data ) {
        // on each row callback
        var div_row = $("div.row");
        div_row.append('<div class="col-md-4">' +
          '<div class="card mb-4 shadow-sm">' +
          '<img src="./images/' + data['image'] + '" class="bd-placeholder-img card-img-top" width="100%" height="225"/>' +
          '<div class="card-body">' +
          '<p class="card-text">' + data['description'] + '</p>' +
          '<div class="d-flex justify-content-between align-items-center">' +
          '<div class="btn-group">' +
          '<button type="button" class="btn btn-sm btn-outline-secondary">View</button>' +
          '<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>' +
          '</div>' +
          '<small class="text-muted">' + data['created'] + '</small>' +
          '</div>' +
          '</div>' +
          '</div>' +
        '</div>');
        /*
        for(var i=0;i<data.length;i++) {
          li.append('<p>' + data[i] + '</p>');
        }
        */

      },
      "preDrawCallback": function( settings ) {
        // clear list before draw
        $("div.row").empty();
      }
  });
  </script>
</html>
