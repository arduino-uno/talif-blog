<?php
error_reporting(0);
require("../config/db_config.php");
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
require("../scripts/class_simple_php_crud.php");
// Calling functions library
require("../scripts/functions_lib.php");
// Set Database Connection
$conn = new Simple_PHP_CRUD_Class();

$output = Array();
$rows = Array();

// Get activities_tbl Info
if ( is_admin() ) {

    $rowscnt = get_new_activities();
    $user_created_cnt = get_new_activities_by( "User Created" );
    $user_updated_cnt = get_new_activities_by( "User Updated" );
    $post_created_cnt = get_new_activities_by( "Post Created" );
    $post_updated_cnt = get_new_activities_by( "Post Updated" );
    $page_created_cnt = get_new_activities_by( "Page Created" );
    $page_updated_cnt = get_new_activities_by( "Page Updated" );

    $query = "SELECT COUNT(act_id) AS rowcount, icon, message, created
              FROM activities
              WHERE message LIKE '%User Created%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()
          UNION
          SELECT COUNT(act_id) AS rowcount, icon, message, created
              FROM activities
              WHERE message LIKE '%User Updated%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()
          UNION
          SELECT COUNT(act_id) AS rowcount, icon, message, created
              FROM activities
              WHERE message LIKE '%Post Created%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()
          UNION
          SELECT COUNT(act_id) AS rowcount, icon, message, created
              FROM activities
              WHERE message LIKE '%Post Updated%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()
          UNION
          SELECT COUNT(act_id) AS rowcount, icon, message, created
              FROM activities
              WHERE message LIKE '%Page Created%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()
          UNION
          SELECT COUNT(act_id) AS rowcount, icon, message, created
              FROM activities
              WHERE message LIKE '%Page Updated%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()
          GROUP BY icon DESC LIMIT 3";

} else {

    // get user detail
    $user = json_decode( current_user(), true );
    $user_id = $user['user_id'];

    $rowscnt = get_new_activities( $user_id );
    $user_created_cnt = get_new_activities_by( "User Created", $user_id );
    $user_updated_cnt = get_new_activities_by( "User Updated", $user_id );
    $post_created_cnt = get_new_activities_by( "Post Created", $user_id );
    $post_updated_cnt = get_new_activities_by( "Post Updated", $user_id );
    $page_created_cnt = get_new_activities_by( "Page Created", $user_id );
    $page_updated_cnt = get_new_activities_by( "Page Updated", $user_id );

    $query = "SELECT COUNT(act_id) AS rowcount, icon, message, created
              FROM activities
              WHERE message LIKE '%User Created%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()" . ( $user_id ? " AND user_id='$user_id' " : "" ) . " UNION
          SELECT COUNT(act_id) AS rowcount, icon, message, created
              FROM activities
              WHERE message LIKE '%User Updated%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()" . ( $user_id ? " AND user_id='$user_id' " : "" ) . " UNION
          SELECT COUNT(act_id) AS rowcount, icon, message, created
              FROM activities
              WHERE message LIKE '%Post Created%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()" . ( $user_id ? " AND user_id='$user_id' " : "" ) . " UNION
          SELECT COUNT(act_id) AS rowcount, icon, message, created
              FROM activities
              WHERE message LIKE '%Post Updated%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()" . ( $user_id ? " AND user_id='$user_id' " : "" ) . " UNION
          SELECT COUNT(act_id) AS rowcount, icon, message, created
              FROM activities
              WHERE message LIKE '%Page Created%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()" . ( $user_id ? " AND user_id='$user_id' " : "" ) . " UNION
          SELECT COUNT(act_id) AS rowcount, icon, message, created
              FROM activities
              WHERE message LIKE '%Page Updated%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()" . ( $user_id ? " AND user_id='$user_id' " : "" ) . " GROUP BY icon DESC LIMIT 3";

};

$result = $conn->run_query( $query );
$rows = json_decode( $result, true );

$counter = 0;
$notify_text = '<span class="dropdown-item dropdown-header">' . $rowscnt . '&nbsp;Notifications</span>';

foreach( $rows as $row ) {

		$sub_array = array();
    $icon = $row["icon"];
    $diff_time = ago( $row["created"] );
    switch ( $icon ) {
      case "fas fa-user-plus":
          $notify_text .= '<a href="#" class="dropdown-item">
              <i class="'. $icon . ' mr-2 border border-light rounded  p-1"></i>&nbsp;' . $user_created_cnt . '&nbsp;user creates
                <span class="float-right text-muted text-sm">' . $diff_time . '</span>
              </a>
              <div class="dropdown-divider"></div>';
          break;
      case "fas fa-user-edit":
          $notify_text .= '<a href="#" class="dropdown-item">
              <i class="' . $icon . ' mr-2 border border-light rounded  p-1"></i>&nbsp;' . $user_updated_cnt . '&nbsp;user updates
                <span class="float-right text-muted text-sm">' . $diff_time . '</span>
              </a>
              <div class="dropdown-divider"></div>';
          break;
      case "fas fa-plus":
          $notify_text .= '<a href="#" class="dropdown-item">
              <i class="' . $icon . ' mr-2 border border-light rounded  p-1"></i>&nbsp;' . $post_created_cnt . '&nbsp;post creates
                <span class="float-right text-muted text-sm">' . $diff_time . '</span>
              </a>
              <div class="dropdown-divider"></div>';
          break;
      case "fas fa-edit":
          $notify_text .= '<a href="#" class="dropdown-item">
              <i class="' . $icon . ' mr-2 border border-light rounded  p-1"></i>&nbsp;' . $post_updated_cnt . '&nbsp;post updates
                <span class="float-right text-muted text-sm">' . $diff_time . '</span>
              </a>
              <div class="dropdown-divider"></div>';
          break;
      case "fas fa-plus":
          $notify_text .= '<a href="#" class="dropdown-item">
              <i class="' . $icon . ' mr-2 border border-light rounded  p-1"></i>&nbsp;' . $page_created_cnt . '&nbsp;page creates
                <span class="float-right text-muted text-sm">' . $diff_time . '</span>
              </a>
              <div class="dropdown-divider"></div>';
          break;
      case "far fa-edit":
          $notify_text .= '<a href="#" class="dropdown-item">
              <i class="' . $icon . ' mr-2 border border-light rounded  p-1"></i>&nbsp;' . $page_updated_cnt . '&nbsp;page updates
                <span class="float-right text-muted text-sm">' . $diff_time . '</span>
              </a>
              <div class="dropdown-divider"></div>';
          break;
    };

    $sub_array["notifmsg"] = $notify_text;
    $counter ++;
};

if ( is_admin() ) {
    $sub_array["notifmsg"] .= '<a href="./media.php?module=manage-activities" class="dropdown-item dropdown-footer">See All Notifications</a>';
} else {
    $sub_array["notifmsg"] .= '<a href="./media.php?module=user-profile#activity" class="dropdown-item dropdown-footer">See All Notifications</a>';
};

$output[] = $sub_array;

echo json_encode( $output, JSON_PRETTY_PRINT );
