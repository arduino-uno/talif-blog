<?php
error_reporting(0);
// destroy all session
session_destroy();
header('location: ../login.php');
die();
