<?php
error_reporting(0);
// Set Database Config
require("./config/db_config.php");
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
require("./scripts/class_simple_php_crud.php");
// Call functions library
require("./scripts/functions_lib.php");
// Set Database Connection
$conn = new Simple_PHP_CRUD_Class();

if ( !isset( $_SESSION['user_login'] ) ) header("location: ./login.php");
// Sanitize $_GET parameters to avoid XSS and other attacks
$module = isset( $_GET['module'] ) ? filter_var( $_GET['module'], FILTER_SANITIZE_STRING ) : '';

if ( is_admin() ) {

    $AVAILABLE_PAGES = array("dashboard",
                        "user-profile",
                        "contact-us",
                        "site-settings",
                        "site-templates",
                        "manage-activities",
                        "messaging",
                        "manage-pages",
                        "manage-posts",
                        "manage-categories",
                        "manage-contacts",
                        "manage-comments",
                        "manage-users");

} else {

    $AVAILABLE_PAGES = array("dashboard",
                        "user-profile",
                        "contact-us",
                        "messaging",
                        "manage-posts");

};

$AVAILABLE_PAGES = array_fill_keys($AVAILABLE_PAGES, 1);

// Redirect page 404 Not Found
if ( !$AVAILABLE_PAGES[$module] ) {
    header("HTTP/1.0 404 Not Found");
    readfile("404.html");
    die();
};
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
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="./dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  <!-- Day & night toggle button -->
  <div class="actions_btn-mode">
    <input type="checkbox" class="checkbox" id="checkbox">
    <label for="checkbox" class="checkbox-label">
      <i class="fas fa-moon"></i>
      <i class="fas fa-sun"></i>
      <span class="ball"></span>
    </label>
  </div>
  <!-- /.Day & night toggle button -->
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./media.php?module=dashboard" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./media.php?module=contact-us" class="nav-link">Contact</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">null</span>
        </a>
        <div id="chatbox" class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="./media.php?module=messaging" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">null</span>
        </a>
        <div id="notification" class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="./media.php?module=manage-activities" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./media.php?module=dashboard" class="brand-link">
      <img src="./dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./images/<?php echo $_SESSION['user_image']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="./media.php?module=user-profile" class="d-block"><?php echo $_SESSION['user_fullname']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
  <?php

  if ( is_admin() ) {
      echo '<li class="nav-item">
              <a href="./media.php?module=dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./media.php?module=user-profile" class="nav-link ">
                <i class="nav-icon fas fa-user"></i>
                <p>Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./media.php?module=manage-activities" class="nav-link ">
                <i class="nav-icon fas fa-history"></i>
                <p>Activity Logs
                  <span class="badge badge-warning right">' . rows_count("activities") . '</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./media.php?module=messaging" class="nav-link ">
                <i class="nav-icon fas fa-comments"></i>
                <p>Messaging
                  <span class="badge badge-danger right">' . rows_count("chats") . '</span>
                </p>
              </a>
            </li>
            <li class="nav-header">CONTENT MANAGER</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Web Contents
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./media.php?module=manage-pages" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pages
                      <span class="badge badge-info right">' . rows_count("pages") . '</span>
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./media.php?module=manage-posts" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Posts
                      <span class="badge badge-info right">' . rows_count("posts") . '</span>
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./media.php?module=manage-categories" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categories
                      <span class="badge badge-info right">' . rows_count("categories") . '</span>
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./media.php?module=manage-contacts" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contacts
                      <span class="badge badge-info right">' . rows_count("contacts") . '</span>
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./media.php?module=manage-comments" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Comments
                      <span class="badge badge-info right">' . rows_count("comments") . '</span>
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">USERS MANAGER</li>
            <li class="nav-item">
              <a href="./media.php?module=manage-users" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Users Table
                  <span class="badge badge-warning right">' . get_new_users() . '&nbsp;New</span>
                </p>
              </a>
            </li>
            <li class="nav-header">SETTINGS</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Site Manager
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./media.php?module=site-settings" class="nav-link">
                    <i class="nav-icon fas fa-info-circle"></i>
                    <p>
                      Site Info
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./media.php?module=site-templates" class="nav-link">
                    <i class="nav-icon fas fa-code"></i>
                    <p>
                      Site Templates
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">LOGOUT</li>
            <li class="nav-item">
              <a href="#" onclick="logoutModal()" class="nav-link">
                <i class="fas fa-arrow-circle-right nav-icon"></i>
                <p>
                  Log Out
              </p>
              </a>
            </li>';

  } else {

    $user = json_decode( current_user(), true );
    $user_id = $user['user_id'];

    $query = "SELECT a.*, b.post_id, b.author_id
							FROM comments a, posts b
							WHERE a.post_id = b.post_id AND b.author_id = $user_id";

    $result = $conn->run_query( $query );
    $rows = json_decode( $result, true );

    echo '<li class="nav-item">
            <a href="./media.php?module=dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./media.php?module=user-profile" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./media.php?module=messaging" class="nav-link ">
              <i class="nav-icon fas fa-comments"></i>
              <p>Messaging
                <span class="badge badge-danger right">' . rows_count( "chats" ) . '</span>
              </p>
            </a>
          </li>
          <li class="nav-header">CONTENT MANAGER</li>
          <li class="nav-item">
            <a href="./media.php?module=manage-posts" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Posts
                <span class="badge badge-info right">' . rows_count( "posts", "author_id", $user_id ) . '</span>
              </p>
            </a>
          </li>
          <li class="nav-header">LOGOUT</li>
          <li class="nav-item">
            <a href="#" onclick="logoutModal()" class="nav-link">
              <i class="fas fa-arrow-circle-right nav-icon"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>';

  };

  ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <?php
      // Administrator Contents
      switch ( $module ) {
        case "dashboard":
          require( "./pages/dashboard.php" );
          break;
        case "user-profile":
          require( "./pages/user-profile.php" );
          break;
        case "contact-us":
          require( "./pages/contact-us.php" );
          break;
        case "manage-pages":
          require( "./pages/pages.php" );
          break;
        case "manage-posts":
          require( "./pages/posts.php" );
          break;
        case "manage-categories":
          require( "./pages/categories.php" );
          break;
        case "manage-contacts":
          require( "./pages/contacts.php" );
          break;
        case "manage-activities":
          require( "./pages/activities.php" );
          break;
        case "manage-comments":
          require( "./pages/comments.php" );
          break;
        case "messaging":
          require( "./pages/messaging.php" );
          break;
        case "manage-users":
          require( "./pages/users.php" );
          break;
        case "site-settings":
          require( "./pages/site-settings.php" );
          break;
        case "site-templates":
          require( "./pages/site-templates.php" );
          break;
      };
  ?>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<!-- User profile modal -->
<div class="modal fade" id="modal_userprofile" tabindex="-1" role="dialog" aria-labelledby="modal_userprofile">
  <div class="modal-dialog" role="document">
  	<div class="modal-content bg-dark">
      <div class="modal-header">
          <h4 class="modal-title">User Profile</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <center>
              <img src="./images/AdminLTELogo.png" name="aboutme" id="aboutme" width="140" height="140" border="0" class="img-circle"></a>
              <h3 class="media-heading">Joe Sixpack</h3>
              <strong>E-mail: </strong><a href="#" id="email">&nbsp;</a>
          </center>
          <hr>
          <center>
              <p class="text-left"><strong>Bio: </strong><br>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.</p>
              <br>
          </center>
      </div>
      <div class="modal-footer justify-content-end">
  				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
  		</div>
  	</div>
  </div>
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="logout_modal">
	<div class="modal-dialog">
		<div class="modal-content bg-dark">
			<div class="modal-header">
				<h4 class="modal-title">Logout Confirmation</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Are you sure want to Quit?</p>
			</div>
			<div class="modal-footer justify-content-end">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger" onclick="confirmLogout()">Quit</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<audio id="startup" src="./sounds/KDE_Startup_1.ogg"></audio>
<audio id="notify" src="./sounds/KDE_Notify.ogg"></audio>
<audio id="error" src="./sounds/KDE_Error_2.ogg"></audio>
<audio id="success" src="./sounds/KDE_Chimes_2.ogg"></audio>
<audio id="dialog_appear" src="./sounds/KDE_Window_Open.ogg"></audio>
<audio id="dialog_disappear" src="./sounds/KDE_Window_Close.ogg"></audio>
<audio id="logout" src="./sounds/KDE_Logout_1.ogg"></audio>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="./plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="./plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./plugins/jszip/jszip.min.js"></script>
<script src="./plugins/pdfmake/pdfmake.min.js"></script>
<script src="./plugins/pdfmake/vfs_fonts.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Toastr -->
<script src="./plugins/toastr/toastr.min.js"></script>
<!-- tagsInput -->
<script src="./plugins/tags-input/jquery.tagsinput-revisited.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="./plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="./plugins/raphael/raphael.min.js"></script>
<script src="./plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="./plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="./plugins/chart.js/Chart.min.js"></script>
<script src="./plugins/ckeditor/ckeditor.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="./dist/js/pages/dashboard2.js"></script>
<script type="text/javascript" language="javascript">
// jQuery document ready
$(function () {

    const checkbox = document.getElementById("checkbox");

    checkbox.addEventListener("change", () => {
        $("body").toggleClass("dark-mode");
        $("nav.main-header").toggleClass("navbar-dark navbar-light");
        $("aside.main-sidebar").toggleClass("sidebar-dark-primary sidebar-light-primary");
        $("div.modal-content").toggleClass("bg-dark bg-light");
    });

    let queryString = ( new URL( location.href ) ).searchParams.get( 'module' );
    let found = toogle_active( queryString );

    function toogle_active( requiredText ) {
        let found = false;

    		$("ul.nav.nav-pills.nav-sidebar.flex-column li.nav-item").each(function(e) {
    		    let txt_url = $(this).find("a").attr("href")
    				let txt_mod = txt_url.split("=")[1];

    		    if (txt_mod == requiredText) {
    		        found = true;
    						$(this).find("a.nav-link").addClass("active");
    		    }
    		});

    		return found;
    };

    // For Demonstration Only
    $(document).Toasts('create', {
          class: 'bg-info',
          title: '[ DEMO ] AdminLTE - Talif',
          subtitle: 'Just now ..',
          body: '<center><img src="./images/ninja-logo.png" class="img-thumbnail" style="border:0;background:transparent;" alt="Talif-Blog Logo"><span class="arabic-font text-center" style="font-size: 4em;text-shadow: 6px 6px 6px #000;">تأليف</span></center><h4 class="text-center mt-2" style="text-shadow: 6px 6px 6px #000;">Simple WebBlog CMS</h4>',
          image: './images/AdminLTELogo.png',
          imageAlt: 'Application Logo',
          position: 'topRight',
          autohide: true,
          delay: 4000
    })

});

function logoutModal() {
    $("#logout_modal").modal("show");

    $('#logout_modal').on('show.bs.modal', function () {
  			$('#dialog_appear').trigger("play");
  	});

    $('#logout_modal').on('hidden.bs.modal', function () {
  			$('#dialog_disappear').trigger("play");
  	});
};

function confirmLogout() {
    $('#logout').trigger("play");
    window.setTimeout(function(){ window.location.href = "./scripts/logout.php"; },5000);
};

//Load the file containing the chat log
function load_chats(){
    $.ajax({
        method: 'POST',
        url: "./scripts/fetch_chats.php",
        datatype: 'JSON',
        success: function ( myData ) {
            $.each( JSON.parse( myData ), function( index, value ) {
                //Insert chat log into the #chatbox div
                $( "div.direct-chat-messages" ).html( value.messages );
                $( "ul.contacts-list" ).html( value.contacts );
                $( "div#chatbox.dropdown-menu.dropdown-menu-lg.dropdown-menu-right" ).html( value.notifmsg );
                $( "div.direct-chat-messages").scrollTop( $("div.direct-chat-messages")[0].scrollHeight );
            });
        }
    });
};

function chat_notify() {

    var msgs_count = $("a.nav-link span.badge.badge-danger.navbar-badge").html();

    $.post( "./scripts/get_msgscount.php", function( data ) {

        if ( msgs_count !== data ) {
            // Update messages count info
            $( "div.card-header div.card-tools span.badge.badge-warning" ).attr( "title", data + "&nbsp;New Messages" ).html( data );
            $( "a.nav-link span.badge.badge-danger.navbar-badge" ).html( data );
            if (msgs_count !== "null") $('#notify').trigger("play");
        }

    });

};

function load_notifications(){
    $.ajax({
        method: 'POST',
        url: "./scripts/fetch_notifications.php",
        datatype: 'JSON',
        success: function ( myData ) {
            $.each( JSON.parse( myData ), function( index, value ) {
                // Insert chat log into the #chatbox div
                $( "div#notification.dropdown-menu.dropdown-menu-lg.dropdown-menu-right" ).html( value.notifmsg );
                $('div.direct-chat-messages').scrollTop( $('div.direct-chat-messages')[0].scrollHeight );
            });
        }
    });
};

function activity_notify() {

    var activity_count = $("a.nav-link span.badge.badge-warning.navbar-badge").html();

    $.post( "./scripts/get_actscount.php", function( data ) {

        if ( activity_count !== data ) {
            // Update messages count info
            $( "a.nav-link span.badge.badge-warning.navbar-badge" ).html( data );
        }

    });

};

$("button#btn_submitmsg").on("click", function (e) {
    var clientmsg = $("input#message").val();
    if ( clientmsg.length > 0 ) {
        $.post( "./scripts/post_chats.php", { "message": clientmsg } );
        $("input#message").val("");
    };

});

$("input#message").on("keypress",function(e) {
    if ( e.which == 13 ) {
        $("button#btn_submitmsg").trigger("click");
        return false;
    };
});

$("input#message").on("keypress",function(e) {
    if ( e.which == 13 ) {
        $("button#btn_submitmsg").trigger("click");
        return false;
    };
});

// Reload file every 2500 ms
setInterval( function () {
    load_chats();
    chat_notify();
    load_notifications();
    activity_notify();
}, 2500 );
</script>
<?php
if ( $module == "dashboard" ) {
    echo '<script src="./scripts/js/dashboard.js"></script>';
} elseif ( $module == "user-profile" ) {
    echo '<script src="./scripts/js/user_profile.js"></script>';
} elseif ( $module == "contact-us" ) {
    echo '<script src="./scripts/js/contact_us.js"></script>';
} elseif ( $module == "site-settings" ) {
    echo '<script src="./scripts/js/site_settings.js"></script>';
} elseif ( $module == "site-templates" ) {
    echo '<script src="./scripts/js/site_templates.js"></script>';
} elseif ( $module == "manage-activities" ) {
    echo '<script src="./scripts/js/activities_tbl.js"></script>';
} elseif ( $module == "manage-pages" ) {
    echo '<script src="./scripts/js/pages_tbl.js"></script>';
} elseif ( $module == "manage-posts" ) {
    echo '<script src="./scripts/js/posts_tbl.js"></script>';
} elseif ( $module == "manage-categories" ) {
    echo '<script src="./scripts/js/categories_tbl.js"></script>';
} elseif ( $module == "manage-contacts" ) {
    echo '<script src="./scripts/js/contacts_tbl.js"></script>';
} elseif ( $module == "manage-comments" ) {
    echo '<script src="./scripts/js/comments_tbl.js"></script>';
} elseif ( $module == "manage-users" ) {
    echo '<script src="./scripts/js/users_tbl.js"></script>';
};
?>
</body>
</html>
