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
// Get Current User Info
$user = current_user();

$query = "SELECT a.chat_id,
                  a.user_id,
                  b.user_fullname,
                  b.user_image,
                  b.user_joined,
                  a.message,
                  date_format(a.chat_date, '%e %M %l.%i %p') as formatted_date
        FROM chats a, users b WHERE a.user_id = b.user_id ORDER BY a.chat_id ASC";

$result = $conn->run_query( $query );
$rows = json_decode( $result, true );

$counter = 0;
foreach( $rows as $row ) {
		$sub_array = array();

    if ( $user->user_id == $row["user_id"] ) {

        $msg_text .= '<div class="direct-chat-msg">
            <div class="direct-chat-infos clearfix">
              <span class="direct-chat-name float-left">' . $row["user_fullname"] . '</span>
              <span class="direct-chat-timestamp float-right">' . $row["formatted_date"] . '</span>
            </div>
            <img class="direct-chat-img" src="./images/' . $row["user_image"] . '" alt="' . $row["user_fullname"] . '">
            <div class="direct-chat-text">' . $row["message"] . '</div>
          </div>';

    } else {

       $msg_text .= '<div class="direct-chat-msg right">
          <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-right">' . $row["user_fullname"] . '</span>
            <span class="direct-chat-timestamp float-left">' . $row["formatted_date"] . '</span>
          </div>
          <img class="direct-chat-img" src="./images/' . $row["user_image"] . '" alt="' . $row["user_fullname"] . '">
          <div class="direct-chat-text">' . $row["message"] . '</div>
        </div>';

    };
    // Get shorten chat messages
    $short_msg = shorten( $row["message"], 100 );

    $contact .= '<li>
      <a href="./media.php?module=user-profile">
        <img class="contacts-list-img" src="./images/' . $row["user_image"] . '" alt="' . $row["user_fullname"] . '">
        <div class="contacts-list-info">
          <span class="contacts-list-name">' . $row["user_fullname"] . '<small class="contacts-list-date float-right">' . date('d-m-Y', strtotime( $row["chat_date"]) ) . '</small></span>
          <span class="contacts-list-msg">' . $short_msg . '</span>
        </div>
      </a>
    </li>';

    if ( $counter < 3 ) {

        $star_icon = ( is_admin() ? '<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>' : '<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>' );

        $notify_text .= '<span class="dropdown-item">
          <div class="media">
            <a href="./media.php?module=user-profile"><img src="./images/' . $row["user_image"] . '" alt="' . $row["user_fullname"] . '" class="img-size-50 mr-3 img-circle"></a>
            <div class="media-body">
              <a href="./media.php?module=user-profile">
                <h3 class="dropdown-item-title">' . $row["user_fullname"] . $star_icon . '</h3>
              </a>
              <p class="text-sm">' . $short_msg . '</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
        </span>
        <div class="dropdown-divider"></div>';
    };

    $sub_array["notifmsg"] = $notify_text;
    $sub_array["messages"] = $msg_text;
    $sub_array["contacts"] = $contact;

		$output[] = $sub_array;
    $counter ++;
};

$sub_array["notifmsg"] .= '<a href="./media.php?module=messaging" class="dropdown-item dropdown-footer">See All Messages</a>';
$output[] = $sub_array;

echo json_encode( $output, JSON_PRETTY_PRINT );
