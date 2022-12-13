<?php
error_reporting(0);
require('../config/db_config.php');
// Set Database Config
require('../scripts/class_simple_php_crud.php');
// CRUD Methods: "GET", "PUT", "POST" & "DELETE"
$conn = new Simple_PHP_CRUD_Class();

// check request
if ( isset( $_POST ) ) {
    // get values
		$title = isset($_POST['title']) ? filter_var( $_POST['title'], FILTER_SANITIZE_STRING ) : '';
		$description = isset($_POST['description']) ? filter_var( $_POST['description'], FILTER_SANITIZE_STRING ) : '';
		$address = isset($_POST['address']) ? filter_var( $_POST['address'], FILTER_SANITIZE_STRING ) : '';
		$phone = isset($_POST['phone']) ? filter_var( $_POST['phone'], FILTER_SANITIZE_STRING ) : '';
		$fax = isset($_POST['fax']) ? filter_var( $_POST['fax'], FILTER_SANITIZE_STRING ) : '';
		$email = isset($_POST['email']) ? filter_var( $_POST['email'], FILTER_SANITIZE_STRING ) : '';
		$facebook = isset($_POST['facebook']) ? filter_var( $_POST['facebook'], FILTER_SANITIZE_STRING ) : '';
		$twitter = isset($_POST['twitter']) ? filter_var( $_POST['twitter'], FILTER_SANITIZE_STRING ) : '';
		$google = isset($_POST['google']) ? filter_var( $_POST['google'], FILTER_SANITIZE_STRING ) : '';
		$linkedin = isset($_POST['linkedin']) ? filter_var( $_POST['linkedin'], FILTER_SANITIZE_STRING ) : '';
		$youtube = isset($_POST['youtube']) ? filter_var( $_POST['youtube'], FILTER_SANITIZE_STRING ) : '';

		$temp_name = $_FILES['file']['name'];
    $pic_type = $_FILES['file']['type'];

    $pic_temp = $_FILES['file']['tmp_name'];
    $pic_path = "../images/";

	  if ($_FILES['file']['size'] == 0 && $_FILES['file']['error'] == 0) {

				// set Array new Data
				$arr_data = Array(
						"title"				=> htmlentities( $title ),
						"description" => htmlentities( $description ),
						"address" 		=> htmlentities( $address ),
						"phone" 			=> htmlentities( $phone ),
						"fax" 				=> $fax,
						"email" 			=> $email,
						"logo" 				=> $temp_name,
						"facebook" 		=> $facebook,
						"twitter" 		=> $twitter,
						"google" 			=> $google,
						"linkedin" 		=> $linkedin,
						"youtube" 		=> $youtube
				);

				$target_file = $pic_path . basename($_FILES['file']['name']);
				$ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				if($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif" ) {
						exit("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
				}
				move_uploaded_file($pic_temp, $pic_path.$temp_name);

		} else {

				// set Array new Data
				$arr_data = Array(
						"title"				=> $title,
						"description" => $description,
						"address" 		=> $address,
						"phone" 			=> $phone,
						"fax" 				=> $fax,
						"email" 			=> $email,
						"facebook" 		=> $facebook,
						"twitter" 		=> $twitter,
						"google" 			=> $google,
						"linkedin" 		=> $linkedin,
						"youtube" 		=> $youtube
				);

		};

		// Call update data function
		$result = $conn->update_table( "siteinfo", $arr_data, "ID", 1 );
		echo $result;

};
