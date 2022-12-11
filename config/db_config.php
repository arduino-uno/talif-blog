<?php
// Sets the PHP options
ini_set('memory_limit','256M');
ini_set('upload_max_filesize','12M');
ini_set('post_max_size','12M');
ini_set('file_uploads', 'On');
ini_set('max_execution_time', '180');
// Set Database Config
define( "DB_HOST", "localhost" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );
define( "DB_DATABASE_NAME", "blog_db" );
define( "MYSQL_CONN_ERROR", "Unable to connect to database." );
