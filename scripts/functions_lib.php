<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
};

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

function login_time() {
    global $conn;
    // Insert to activities table
    $curr_user = $_SESSION['user_id'];  // make sure you hv login session
    $user_ip = get_client_ip();
    $curr_time = date('Y-m-d H:i:s');
    // set array data
    $arr_data = Array(
        "user_id"			=> $curr_user,
        "ip_address"	=> $user_ip,
        "icon"        => "fa-sign-in-alt",
        "message"     => "User Login Successfully",
        "login_time" 	=> $curr_time
    );
    // Call insert data function
    $result = $conn->insert_table( "activities", $arr_data );
    return $result;
};

function logout_time() {
    global $conn;
    $arr_data = Array();
    // Insert to activities table
    $curr_user = $_SESSION['user_id'];  // make sure you hv login session
    $user_ip = get_client_ip();
    $curr_time = date('Y-m-d H:i:s');
    // set array data
    $arr_data = [ 'logout_time' => $curr_time ];
    // get last insert id
    $result = json_decode( get_last_id( "activities", "act_id" ), true );
    $last_id =$result["act_id"];
    // Call insert data function
    $result = $conn->update_table( "activities", $arr_data, "act_id", $last_id );
    return $result;
};

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

function is_json($string) {
   json_decode($string);
   return json_last_error() === JSON_ERROR_NONE;
};

function is_admin() {
    $role = $_SESSION['user_role'];

    if ( $role != 'administrator' )
      return FALSE;
    return TRUE;
};

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

function shorten( $text, $len = 10 ) {
    if( strlen( $text ) >= $len ) {
        $str = explode( "\n", wordwrap( $text, $len ) );
        $short_msg = $str[0] . '&nbsp;..';
    } else {
        $short_msg = $text;
    };
    return $short_msg;
};

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
            "tagslabeled"   => $txt_tags
        );
    };

    return json_encode( $output, JSON_PRETTY_PRINT );
};

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
            "title"          => $post["title"],
            "body"           => $short_text,
            "status"         => $post["status"],
            "cat_id"         => $post["cat_id"],
            "category"       => $post["category"],
            "image"          => $post["image"],
            "published"      => date( "M j, Y", strtotime( $post["published"] ) ),
            "tags"           => $post["tags"]
        );
    };

    return json_encode( $output, JSON_PRETTY_PRINT );
};

function rows_count( $tablename, $id_key=NULL, $id_val=NULL ) {
    global $conn;
    $query = "SELECT * FROM $tablename" . ( $id_key ? " WHERE $id_key='$id_val'" : "" );
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );
    $rowscnt = count( $rows );
    return $rowscnt;
};

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
