<?php
/**
*	Author nath4n <hashcat80@gmail.com>
*	Functions Library ( 'functions_lib.php' )
*
* Distributed under 'GNU General Public License, Version 3'
* Everyone is permitted to copy and distribute verbatim copies of this license document, but changing it is not allowed.
*/

/**
* Check if the session is active or inactive
*/
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
};

/**
* To get current client / visitor IP Address
*
* @return string
*/
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
};

/**
* To insert / update visitors table
*
* @param string $user_ip, $page
* @return string
*/
function hit_counter( $user_ip, $page ) {
    global $conn;
    $query = "SELECT * FROM visitors WHERE user_ip = '$user_ip' AND page = '$page'";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );
    $visitors = count( $rows );
    // Update visitors counter
    if ( $visitors < 1 ) {
        $query = "INSERT INTO visitors (user_ip, page, views) VALUES ('$user_ip', '$page', '1')";
    } else {
        $query = "UPDATE visitors SET views = views + 1 WHERE user_ip = '$user_ip' AND page = '$page'";
    };
    // Call insert data function
    $result = $conn->run_query( $query );
    return $result;
};

/**
* To get the last ID or row from activities table
*
* @return array
*/
function get_last_id() {
    global $conn;
    $output = Array();
    $query = "SELECT act_id FROM activities ORDER BY act_id DESC LIMIT 1";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
        $output = [ 'act_id' => $row["act_id"] ];
    };

    return json_encode( $output, JSON_PRETTY_PRINT );
};

/**
* Check if the result is json array
*
* @return boolean
*/
function is_json($string) {
   json_decode($string);
   return json_last_error() === JSON_ERROR_NONE;
};

/**
* To get current user role detail from cookie
*
* @return boolean
*/
function is_admin() {
    $role = $_SESSION['user_role'];

    if ( $role != 'administrator' )
      return FALSE;
    return TRUE;
};

/**
* To get current user detail from database results
*
* @return array
*/
function current_user() {
    global $conn;
    $curr_user_id = $_SESSION['user_id'];   // make sure you hv login session
    $query = "SELECT * FROM users WHERE user_id = $curr_user_id";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
        $output = array(
            "user_id"				=> $row["user_id"],
            "user_login"		=> $row["user_login"],
            "user_fullname"	=> $row["user_fullname"],
            "user_email"		=> $row["user_email"],
            "user_role"     => $row["user_role"],
            "user_image"    => $row["user_image"],
            "user_joined"   => $row["user_joined"],
            "user_status"   => $row["user_status"]
        );
    };

    return json_encode( $output, JSON_PRETTY_PRINT );
};

/**
* To get current user detail from database results
*
* @param mixed $text, $len (string or integer)
* @return array
*/
function shorten( $text, $len = 10 ) {
    if( strlen( $text ) >= $len ) {
        $str = explode( "\n", wordwrap( $text, $len ) );
        $short_msg = $str[0] . '&nbsp;..';
    } else {
        $short_msg = $text;
    };
    return $short_msg;
};

/**
* To get users table from database results
*
* @param string $field, $value
* @return array
*/
function get_user_by( $field, $value ) {
    global $conn;
    $query = "SELECT * FROM users WHERE $field = $value";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
        $output = array(
            "user_id"				=> $row["user_id"],
            "user_login"		=> $row["user_login"],
            "user_fullname"	=> $row["user_fullname"],
            "user_email"		=> $row["user_email"],
            "user_role"     => $row["user_role"],
            "user_image"    => $row["user_image"],
            "user_joined"   => $row["user_joined"],
            "user_status"   => $row["user_status"]
        );
    };

    return json_encode( $output, JSON_PRETTY_PRINT );
};

/**
* To get categories table from database results
*
* @param string $field, $value
* @return array
*/
function get_category_by( $field, $value ) {
    global $conn;
    $query = "SELECT * FROM categories WHERE $field = $value";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
        $output = array(
            "cat_id"				=> $row["cat_id"],
            "name"		      => $row["name"],
            "description"   => $row["description"]
        );
    };

    return json_encode( $output, JSON_PRETTY_PRINT );
};

/**
* To get posts table from database results
*
* @param string $field, $value
* @return array
*/
function get_post_by( $field, $value ) {
    global $conn;
    $query = "SELECT * FROM posts WHERE $field = $value";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
        // get category detail
        $category = json_decode( get_category_by( "cat_id", $row["cat_id"] ), true );
        // get user detail
        $user = json_decode( get_user_by( "user_id", $row["author_id"] ), true );
        $short_text = shorten( $row["body"], 100 );
        $tags = explode( ',', $row["tags"] );
  			$txt_tags = "";
  			foreach ($tags as $tag) {
  					$txt_tags .= '<small class="badge badge-info">' . $tag . '</small>&nbsp;';
  			};

        $output = array(
            // fill data into array
            "post_id"        => $row["post_id"],
            "cat_id"         => $row["cat_id"],
            "category"       => $category["name"],
            "author_id"      => $user["user_id"],
            "author_name"    => $user["user_fullname"],
            "author_image"   => $user["user_image"],
            "title"          => $row["title"],
            "body"           => $short_text,
            "status"         => $row["status"],
            "cat_id"         => $row["cat_id"],
            "image"          => $row["image"],
            "published"      => date( "M j, Y", strtotime( $row["published"] ) ),
            "tags"           => $row["tags"],
            "tagslabeled"    => $txt_tags,
            "views"          => $row["views"],
            "likes"          => $row["likes"]
        );
    };

    return json_encode( $output, JSON_PRETTY_PRINT );
};

/**
* To get comments table from database results
*
* @param string $field, $value
* @return array
*/
function get_comment_by( $field, $value ) {
    global $conn;
    $query = "SELECT * FROM comments WHERE $field = $value";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
        // get user detail
        $user = json_decode( get_user_by( "user_id", $row["author_id"] ), true );
        // get post detail
        $post = json_decode( get_post_by( "post_id", $row["post_id"] ), true );
        $short_text = shorten( $post["body"], 100 );

        $output = array(
            // fill data into array
            "comm_id"        => $row["comm_id"],
            "author_id"      => $user["user_id"],
            "author_name"    => $user["user_fullname"],
            "author_image"   => $user["user_image"],
            "post_id"        => $row["post_id"],
            "parent_id"      => $row["parent_id"],
            "fullname"       => $row["fullname"],
            "email"          => $row["email"],
            "website"        => $row["website"],
            "title"          => $post["title"],
            "body"           => $short_text,
            "status"         => $post["status"],
            "cat_id"         => $post["cat_id"],
            "category"       => $post["category"],
            "image"          => $post["image"],
            "published"      => date( "M j, Y", strtotime( $post["published"] ) ),
            "tags"           => $post["tags"],
            "likes"          => $post["likes"]
        );
    };

    return json_encode( $output, JSON_PRETTY_PRINT );
};

/**
* To get table rows count results
*
* @param string $tablename, $id_key, $id_val
* @return integer
*/
function rows_count( $tablename, $id_keyA=NULL, $id_valA=NULL, $id_keyB=NULL, $id_valB=NULL ) {
    global $conn;
    $query = "SELECT * FROM $tablename" . ( $id_keyA ? " WHERE $id_keyA='$id_valA'" : "" ) . ( $id_keyB ? " AND $id_keyB='$id_valB'" : "" );
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );
    $rowscnt = !empty( $rows ) ? count( $rows ) : 0;
    return $rowscnt;
};

/**
* To get the last users from database results (this week)
*
* @return integer
*/
function get_new_users() {
    global $conn;
    // Get the last registration users for this current week
    $query = "SELECT * FROM users WHERE user_joined BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );
    $rowscnt = count( $rows );
    return $rowscnt;
};

/**
* To insert a new activity log
*
* @param string $table
* @return string
*/
function insert_table_log($table = "posts") {
    global $conn;
    // Insert to activities table
    $curr_user = $_SESSION['user_id'];  // make sure you hv login session
    $user_ip = get_client_ip();
    // set array data
    $arr_data = Array(
        "user_id"			=> $curr_user,
        "ip_address"	=> $user_ip
    );

    switch ( $table ) {
      case "posts":
        // insert array data
        $arr_data += [
          "icon"        => "fas fa-plus",
          "message"     => "Post Created Successfully"
        ];
      case "pages":
        // insert array data
        $arr_data += [
          "icon"        => "far fa-plus",
          "message"     => "Page Created Successfully"
        ];
    };
    // Call insert data function
    $result = $conn->insert_table( "activities", $arr_data );
    return $result;
};

/**
* To update an activity log
*
* @param string $table
* @return string
*/
function update_table_log($table = "posts") {
    global $conn;
    // Insert to activities table
    $curr_user = $_SESSION['user_id'];  // make sure you hv login session
    $user_ip = get_client_ip();
    // set array data
    $arr_data = Array(
        "user_id"			=> $curr_user,
        "ip_address"	=> $user_ip
    );

    switch ( $table ) {
      case "posts":
        // insert array data
        $arr_data += [
          "icon"        => "fas fa-edit",
          "message"     => "Post Update Successfully"
        ];
      case "pages":
        // insert array data
        $arr_data += [
          "icon"        => "far fa-edit",
          "message"     => "Page Update Successfully"
        ];
    };
    // Call insert data function
    $result = $conn->insert_table( "activities", $arr_data );
    return $result;
};

/**
* To get the last activities log from database results (this week)
*
* @return integer
*/
function get_new_activities( $user_id=NULL ) {
    global $conn;
    // Get the last registration users for this current week
    $query = "SELECT ip_address, icon, message, created
              FROM activities
              WHERE created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY)
              AND CURRENT_DATE()" . ( $user_id ? " AND user_id='$user_id'" : "" ) . " ORDER BY act_id";

    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );
    $rowscnt = count( $rows );
    return $rowscnt;
};

/**
* To get the last activities log from database results (this week)
* Search by keyword
*
* @param string $keyword
* @return integer
*/
function get_new_activities_by( $keyword="Post Created",  $user_id=NULL ) {
    global $conn;
    // Get the last registration users for this current week
    $query = "SELECT ip_address, icon, message, date_format(created, '%e %M %l.%i %p') as formatted_date
              FROM activities
              WHERE message LIKE '%{$keyword}%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY)
              AND CURRENT_DATE()" . ( $user_id ? " AND user_id='$user_id'" : "" ) . " ORDER BY act_id";

    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );
    $rowscnt = count( $rows );
    return $rowscnt;
};
/**
* Usage:
* $pubDate = "17-09-2020"; // e.g. this could be like 'Sun, 10 Nov 2013 14:26:00 GMT'
* $diff = ago($pubDate);    // output: 23 hrs ago
* echo $diff;
* Return the value of time different in "xx times ago" format
*
* @param timestamp $timestamp
* @return string
*/
function ago($timestamp)
{

    $today = new DateTime(date('y-m-d h:i:s')); // [2]
    //$thatDay = new DateTime('Sun, 10 Nov 2013 14:26:00 GMT');
    $thatDay = new DateTime($timestamp);
    $dt = $today->diff($thatDay);

    if ($dt->y > 0){
        $number = $dt->y;
        $unit = "year";
    } else if ($dt->m > 0) {
        $number = $dt->m;
        $unit = "month";
    } else if ($dt->d > 0) {
        $number = $dt->d;
        $unit = "day";
    } else if ($dt->h > 0) {
        $number = $dt->h;
        $unit = "hour";
    } else if ($dt->i > 0) {
        $number = $dt->i;
        $unit = "minute";
    } else if ($dt->s > 0) {
        $number = $dt->s;
        $unit = "second";
    }

    $unit .= $number  > 1 ? "s" : "";

    $ret = $number." ".$unit." "."ago";
    return $ret;
};


/**
* Get human readable time difference between 2 dates
*
* Return difference between 2 dates in year, month, hour, minute or second
* The $precision caps the number of time units used: for instance if
* $time1 - $time2 = 3 days, 4 hours, 12 minutes, 5 seconds
* - with precision = 1 : 3 days
* - with precision = 2 : 3 days, 4 hours
* - with precision = 3 : 3 days, 4 hours, 12 minutes
*
* From: http://www.if-not-true-then-false.com/2010/php-calculate-real-differences-between-two-dates-or-timestamps/
*
* @param mixed $time1 a time (string or timestamp)
* @param mixed $time2 a time (string or timestamp)
* @param integer $precision Optional precision
* @return string time difference
*/
function get_date_diff( $time1, $time2, $precision = 2 ) {
    // If not numeric then convert timestamps
    if( !is_int( $time1 ) ) {
        $time1 = strtotime( $time1 );
    }
    if( !is_int( $time2 ) ) {
        $time2 = strtotime( $time2 );
    }

    // By default, assume past
    $past = true;

    // If time1 > time2 then swap the 2 values
    if( $time1 > $time2 ) {
        list( $time1, $time2 ) = array( $time2, $time1 );
        $past = false;
    }

    // Set up intervals and diffs arrays
    $intervals = array( 'year', 'month', 'day', 'hour', 'minute', 'second' );
    $diffs = array();

    foreach( $intervals as $interval ) {
        // Create temp time from time1 and interval
        $ttime = strtotime( '+1 ' . $interval, $time1 );
        // Set initial values
        $add = 1;
        $looped = 0;
        // Loop until temp time is smaller than time2
        while ( $time2 >= $ttime ) {
            // Create new temp time from time1 and interval
            $add++;
            $ttime = strtotime( "+" . $add . " " . $interval, $time1 );
            $looped++;
        }

        $time1 = strtotime( "+" . $looped . " " . $interval, $time1 );
        $diffs[ $interval ] = $looped;
    }

    $count = 0;
    $times = array();
    foreach( $diffs as $interval => $value ) {
        // Break if we have needed precission
        if( $count >= $precision ) {
            break;
        }
        // Add value and interval if value is bigger than 0
        if( $value > 0 ) {
            if( $value != 1 ){
                $interval .= "s";
            }
            // Add value and interval to times array
            $times[] = $value . " " . $interval;
            $count++;
        }
    }

    // Build text for past/future
    $suffix = ' ago';

    /*
    if($past == true){
        $suffix = ' ago';
    } else {
        $suffix = ' from now';
    }
    */
    // Return string with times
    return implode( ", ", $times ).$suffix;
};
