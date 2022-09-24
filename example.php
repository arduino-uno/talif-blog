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
$logout_log = logout_time();
echo $logout_log;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bootstrap Tags Input</title>
    <meta name="robots" content="index, follow" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="./plugins/tags-input/jquery.tagsinput-revisited.min.css">
    <!-- Custom style -->
    <style>
    .blog-icon {
      display: inline-block;
      width: 1rem;
      background: url('./images/AdminLTELogo.svg');
    }

    .blog-icont::before {
      content: "";
      display: block;
      padding-top: 100%;
    }
    </style>
  </head>
  <body>
    <div id="fb-root"></div>
    <?xml version="1.0" standalone="no"?>
    <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN"
     "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
     width="25" height="25" viewBox="0 0 128.000000 128.000000"
     preserveAspectRatio="xMidYMid meet">

    <g transform="translate(0.000000,128.000000) scale(0.100000,-0.100000)"
    fill="#000000" stroke="none">
    <path d="M410 927 c-19 -7 -44 -27 -57 -46 -23 -33 -23 -39 -23 -302 l0 -269
    65 0 65 0 0 100 0 100 180 0 180 0 0 -100 0 -100 65 0 65 0 0 268 c0 287 -2
    298 -53 336 -26 20 -43 21 -240 23 -148 2 -223 -1 -247 -10z m410 -197 l0 -80
    -180 0 -180 0 0 80 0 80 180 0 180 0 0 -80z"/>
    </g>
    </svg>
    <div class="jumbotron">
      <div class="container">
        <div class="row">
          <i class="blog-icon"></i>
          <i class="blog-icon" style="width:2rem"></i>
          <i class="blog-icon" style="width:4rem"></i>
          <h1>Bootstrap Tags Input</h1>
          <p>jQuery plugin providing a Twitter Bootstrap user interface for managing tags</p>
          <input id="filters" name="filters" type="text" value="tag1,tag2,tag3">
        </div>
      </div>
    </div>
  </body>
  <!-- jQuery -->
  <script src="./plugins/jquery/jquery.min.js"></script>
  <script src="./plugins/tags-input/jquery.tagsinput-revisited.min.js"></script>
  <script type="text/javascript" language="javascript">
	$(function() {
	   $('input#filters').tagsInput({
        interactive: true,
        placeholder: 'Add a tag',
        minChars: 2,
        maxChars: 20, // if not provided there is no limit
        limit: 5, // if not provided there is no limit
        unique: true
     });

     $('input#filters').importTags('foo, bar, baz');
	});
	</script>
</html>
