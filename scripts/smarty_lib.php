<?php
// Assign siteinfo
function render_siteinfo() {
    global $conn, $smarty;
    // Assign siteinfo table
    $query = "SELECT * FROM siteinfo";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
      		$smarty->assign( "ID", $row["ID"] );
    			$smarty->assign( "title", strip_tags($row["title"]) );
          $smarty->assign( "description", $row["description"] );
          $smarty->assign( "address", $row["address"] );
          $smarty->assign( "phone", $row["phone"] );
          $smarty->assign( "fax", $row["fax"] );
          $smarty->assign( "email", $row["email"] );
          $smarty->assign( "logo", $row["logo"] );
          $smarty->assign( "facebook", $row["facebook"] );
          $smarty->assign( "twitter", $row["twitter"] );
          $smarty->assign( "google", $row["google"] );
          $smarty->assign( "linkedin", $row["linkedin"] );
          $smarty->assign( "youtube", $row["youtube"] );
    };
    return true;
};

function render_users() {
    global $conn, $smarty;
    // Assign users table
    $query = "SELECT * FROM users";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
      		$sub_array = array();
      		$sub_array["user_id"] = $row["user_id"];
    			$sub_array["user_login"] = $row["user_login"];
          $sub_array["user_fullname"] = $row["user_fullname"];
          $sub_array["user_email"] = $row["user_email"];
      		$sub_array["user_role"] = $row["user_role"];
    			$sub_array["user_image"] = $row["user_image"];
    			$sub_array["user_joined"] = $row["user_joined"];
    			$sub_array["user_status"] = $row["user_status"];

      		$users[] = $sub_array;
    };

    $smarty->assign('users', $users);
    return true;
};

function render_pages() {
    global $conn, $smarty;
    // Assign pages table
    $query = "SELECT * FROM pages";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
      		$sub_array = array();
      		$sub_array["page_id"] = $row["page_id"];
          $sub_array["title"] = $row["title"];
          $sub_array["body"] = $row["body"];
          $sub_array["status"] = $row["status"];
      		$sub_array["published"] = $row["published"];
          $sub_array["tags"] = $row["tags"];

      		$pages[] = $sub_array;
    };

    $smarty->assign('pages', $pages);
    return true;
};

function render_categories() {
    global $conn, $smarty;
    // Assign pages table
    $query = "SELECT * FROM categories";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
      		$sub_array = array();
      		$sub_array["cat_id"] = $row["cat_id"];
          $sub_array["name"] = $row["name"];
          $sub_array["description"] = $row["description"];
          // 'rows_count' function need 'functions_lib' file
          $sub_array["count"] = rows_count( "posts", "cat_id", $row["cat_id"] );

      		$categories[] = $sub_array;
    };

    $smarty->assign('categories', $categories);
    return true;
};

function render_latest_posts($limit=NULL) {
    global $conn, $smarty;
    // Assign posts table
    $query = "SELECT a.*, b.* FROM posts a, categories b
              WHERE a.cat_id = b.cat_id AND a.published
              ORDER BY a.published DESC" . ( $limit ? " LIMIT $limit" : "" );

    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
      		$sub_array = array();
          // get user detail
    			$user = json_decode( get_user_by( "user_id", $row["author_id"] ), true );
          $category = json_decode( get_category_by( "cat_id", $row["cat_id"] ), true );
    			$short_text = shorten( $row["body"], 100 );
    			// fill data into array
      		$sub_array["post_id"] = $row["post_id"];
          $sub_array["author_id"] = $user["user_id"];
    			$sub_array["author_name"] = $user["user_fullname"];
    			$sub_array["author_image"] = $user["user_image"];
          $sub_array["title"] = $row["title"];
          $sub_array["body"] = $short_text;
          $sub_array["status"] = $row["status"];
          $sub_array["cat_id"] = $row["cat_id"];
          $sub_array["category"] = $category["name"];
          $sub_array["image"] = $row["image"];
      		$sub_array["published"] = date( "M j, Y", strtotime( $row["published"] ) );
          $sub_array["tags"] = $row["tags"];
          $sub_array["views"] = $row["views"];
          $sub_array["likes"] = $row["likes"];
          $sub_array["count"] = rows_count( "comments", "post_id", $row["post_id"], "parent_id", 0 );

      		$posts[] = $sub_array;
    };

    // $smarty->assign('latest_posts', $posts);
    $limit ? $smarty->assign('limit_posts', $posts) : $smarty->assign('latest_posts', $posts);
    return true;
};

function render_popular_posts() {
    global $conn, $smarty;
    // Assign posts table
    $query = "SELECT * FROM posts ORDER BY views DESC LIMIT 3";

    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
      		$sub_array = array();
          // get user detail
    			$user = json_decode( get_user_by( "user_id", $row["author_id"] ), true );
          $category = json_decode( get_category_by( "cat_id", $row["cat_id"] ), true );
    			$short_text = shorten( $row["body"], 100 );
    			// fill data into array
      		$sub_array["post_id"] = $row["post_id"];
          $sub_array["author_id"] = $user["user_id"];
    			$sub_array["author_name"] = $user["user_fullname"];
    			$sub_array["author_image"] = $user["user_image"];
          $sub_array["title"] = $row["title"];
          $sub_array["body"] = $short_text;
          $sub_array["status"] = $row["status"];
          $sub_array["cat_id"] = $row["cat_id"];
          $sub_array["category"] = $category["name"];
          $sub_array["image"] = $row["image"];
      		$sub_array["published"] = date( "M j, Y", strtotime( $row["published"] ) );
          $sub_array["tags"] = $row["tags"];
          $sub_array["views"] = $row["views"];
          $sub_array["likes"] = $row["likes"];
          $sub_array["count"] = rows_count( "comments", "post_id", $row["post_id"], "parent_id", 0 );

      		$posts[] = $sub_array;
    };

    $smarty->assign('popular_posts', $posts);
    // $limit ? $smarty->assign('limit_posts', $posts) : $smarty->assign('latest_posts', $posts);
    return true;
};

function render_posts() {
    global $conn, $smarty;
    // Assign posts table
    $query = "SELECT a.*, b.* FROM posts a, categories b
              WHERE a.cat_id = b.cat_id ORDER BY a.published DESC";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
      		$sub_array = array();
          // get user detail
    			$user = json_decode( get_user_by( "user_id", $row["author_id"] ), true );
          $category = json_decode( get_category_by( "cat_id", $row["cat_id"] ), true );
    			$short_text = shorten( $row["body"], 100 );
    			// fill data into array
      		$sub_array["post_id"] = $row["post_id"];
          $sub_array["author_id"] = $user["user_id"];
    			$sub_array["author_name"] = $user["user_fullname"];
    			$sub_array["author_image"] = $user["user_image"];
          $sub_array["title"] = $row["title"];
          $sub_array["body"] = $short_text;
          $sub_array["status"] = $row["status"];
          $sub_array["cat_id"] = $row["cat_id"];
          $sub_array["category"] = $category["name"];
          $sub_array["image"] = $row["image"];
      		$sub_array["published"] = date( "M j, Y", strtotime( $row["published"] ) );
          $sub_array["tags"] = $row["tags"];
          $sub_array["views"] = $row["views"];
          $sub_array["likes"] = $row["likes"];
          $sub_array["count"] = rows_count( "comments", "post_id", $row["post_id"], "parent_id", 0 );

      		$posts[] = $sub_array;
    };

    $smarty->assign('posts', $posts);
    return true;
};

function render_posts_category( $cat_id ) {
    global $conn, $smarty;
    // Assign posts table
    $query = "SELECT a.*, b.* FROM posts a, categories b
              WHERE a.cat_id = b.cat_id AND a.cat_id = {$cat_id}
              GROUP BY a.post_id
              ORDER BY a.published DESC;";

    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
      		$sub_array = array();
          // get user detail
    			$user = json_decode( get_user_by( "user_id", $row["author_id"] ), true );
          $category = json_decode( get_category_by( "cat_id", $row["cat_id"] ), true );
    			$short_text = shorten( $row["body"], 100 );
    			// fill data into array
      		$sub_array["post_id"] = $row["post_id"];
          $sub_array["author_id"] = $user["user_id"];
    			$sub_array["author_name"] = $user["user_fullname"];
    			$sub_array["author_image"] = $user["user_image"];
          $sub_array["title"] = $row["title"];
          $sub_array["body"] = $short_text;
          $sub_array["status"] = $row["status"];
          $sub_array["cat_id"] = $row["cat_id"];
          $sub_array["category"] = $category["name"];
          $sub_array["image"] = $row["image"];
      		$sub_array["published"] = date( "M j, Y", strtotime( $row["published"] ) );
          $sub_array["tags"] = $row["tags"];
          $sub_array["views"] = $row["views"];
          $sub_array["likes"] = $row["likes"];
          $sub_array["count"] = rows_count( "comments", "post_id", $row["post_id"], "parent_id", 0 );

      		$posts[] = $sub_array;
    };

    $smarty->assign('post_line', $posts);
    return true;
};

function render_posts_id( $post_id ) {
    global $conn, $smarty;
    // Assign posts table
    $query = "SELECT a.*, b.* FROM posts a, categories b
              WHERE a.cat_id = b.cat_id AND a.post_id = {$post_id}
              GROUP BY a.post_id
              ORDER BY a.published DESC";

    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
      		$sub_array = array();
          // get user detail
    			$user = json_decode( get_user_by( "user_id", $row["author_id"] ), true );
          $category = json_decode( get_category_by( "cat_id", $row["cat_id"] ), true );
    			$short_text = shorten( $row["body"], 100 );
    			// fill data into array
      		$sub_array["post_id"] = $row["post_id"];
          $sub_array["author_id"] = $user["user_id"];
    			$sub_array["author_name"] = $user["user_fullname"];
    			$sub_array["author_image"] = $user["user_image"];
          $sub_array["title"] = $row["title"];
          $sub_array["body"] = $short_text;
          $sub_array["status"] = $row["status"];
          $sub_array["cat_id"] = $row["cat_id"];
          $sub_array["category"] = $category["name"];
          $sub_array["image"] = $row["image"];
      		$sub_array["published"] = date( "M j, Y", strtotime( $row["published"] ) );
          $sub_array["tags"] = $row["tags"];
          $sub_array["views"] = $row["views"];
          $sub_array["likes"] = $row["likes"];
          $sub_array["count"] = rows_count( "comments", "post_id", $row["post_id"], "parent_id", 0 );

      		$posts[] = $sub_array;
    };

    $smarty->assign('post_line', $posts);
    return true;
};

function render_page( $page_id ) {
    global $conn, $smarty;
    // clear all assigned variables
    $smarty->clearAllAssign();
    // clear the entire cache
    $smarty->clearAllCache();
    // Assign pages table
    $query = "SELECT * FROM pages WHERE page_id = $page_id";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
        $sub_array = array();
  			// get user detail
  			$user = json_decode( get_user_by( "user_id", $row["author_id"] ), true );
  			$short_text = shorten( $row["body"], 100 );
  			// fill data into array
    		$sub_array["page_id"] = $row["page_id"];
  			$sub_array["author_id"] = $user["user_id"];
  			$sub_array["author_name"] = $user["user_fullname"];
  			$sub_array["author_image"] = $user["user_image"];
        $sub_array["title"] = $row["title"];
  			$sub_array["body"] = $short_text;
  			$sub_array["image"] = $row["image"];
        $sub_array["status"] = $row["status"];
    		$sub_array["published"] = date( "F j, Y", strtotime( $row["published"] ) );

        $pages[] = $sub_array;
  	};

    $smarty->assign('page_line', $pages);
    return true;
};

function render_category( $cat_id ) {
    global $conn, $smarty;
    // clear all assigned variables
    $smarty->clearAllAssign();
    // clear the entire cache
    $smarty->clearAllCache();
    // Assign pages table
    $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    foreach( $rows as $row ) {
        $sub_array = array();
  			// fill data into array
    		$sub_array["cat_id"] = $row["cat_id"];
  			$sub_array["name"] = $row["name"];
  			$sub_array["description"] = $row["description"];

        $categories[] = $sub_array;
  	};

    $smarty->assign('category_line', $categories);
    return true;
};
