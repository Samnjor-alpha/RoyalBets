<?php 
include('config.php');

	session_unset($_SESSION['user']);
	session_destroy();
	// header('location:..\login.php');
	header('location:'.BASE_URL.'AUTH/login.php');
?>