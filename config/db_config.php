<?php
// Sets the PHP options
ini_set('memory_limit','256M');
ini_set('max_execution_time', '300');
ini_set('max_input_time', '-1');
ini_set('upload_max_filesize','25M');
ini_set('post_max_size','20M');
ini_set('max_input_vars','10000');
ini_set('file_uploads', 'On');
ini_set('suhosin.get.max_vars', '10000');
ini_set('suhosin.post.max_vars', '10000');
ini_set('suhosin.request.max_vars', '10000');
// Set Database Config
define( "DB_HOST", "localhost" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );
define( "DB_DATABASE_NAME", "blog_db" );
define( "MYSQL_CONN_ERROR", "Unable to connect to database." );
