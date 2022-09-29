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
$rowscnt = get_new_activities();
$user_login_cnt = get_new_activities_by( "User Login" );
$user_created_cnt = get_new_activities_by( "User Created" );
$user_updated_cnt = get_new_activities_by( "User Updated" );

$query = "SELECT COUNT(act_id) AS rowcount, icon, message, created
          FROM activities
          WHERE message LIKE '%User Login%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()
      UNION
      SELECT COUNT(act_id) AS rowcount, icon, message, created
          FROM activities
          WHERE message LIKE '%User Created%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()
      UNION
      SELECT COUNT(act_id) AS rowcount, icon, message, created
          FROM activities
          WHERE message LIKE '%User Updated%' AND created BETWEEN SUBDATE(CURRENT_DATE(), INTERVAL WEEKDAY(CURRENT_DATE()) DAY) AND CURRENT_DATE()
      GROUP BY icon DESC";

$result = $conn->run_query( $query );
$rows = json_decode( $result, true );

$counter = 0;
$notify_text = '<span class="dropdown-item dropdown-header">' . $rowscnt . '&nbsp;Notifications</span>';

foreach( $rows as $row ) {

		$sub_array = array();
    $icon = $row["icon"];
    $diff_time = ago( $row["created"] );
    switch ( $icon ) {
      case "fa-sign-in-alt":
          $notify_text .= '<a href="#" class="dropdown-item">
              <i class="fas ' . $icon . ' mr-2"></i>&nbsp;' . $user_login_cnt . '&nbsp;new user login
                <span class="float-right text-muted text-sm">' . $diff_time . '</span>
              </a>
              <div class="dropdown-divider"></div>';
          break;
      case "fa-user-plus":
          $notify_text .= '<a href="#" class="dropdown-item">
              <i class="fas ' . $icon . ' mr-2"></i>&nbsp;' . $user_created_cnt . '&nbsp;user created
                <span class="float-right text-muted text-sm">' . $diff_time . '</span>
              </a>
              <div class="dropdown-divider"></div>';
          break;
      case "fa-user-edit":
          $notify_text .= '<a href="#" class="dropdown-item">
              <i class="fas ' . $icon . ' mr-2"></i>&nbsp;' . $user_updated_cnt . '&nbsp;user updated
                <span class="float-right text-muted text-sm">' . $diff_time . '</span>
              </a>
              <div class="dropdown-divider"></div>';
          break;
    };

    $sub_array["notifmsg"] = $notify_text;
    $counter ++;
};

$sub_array["notifmsg"] .= '<a href="./media.php?module=manage-activities" class="dropdown-item dropdown-footer">See All Notifications</a>';
$output[] = $sub_array;

echo json_encode( $output, JSON_PRETTY_PRINT );
