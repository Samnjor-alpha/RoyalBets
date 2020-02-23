<?php 

include 'config.php';

$adminn=$_SESSION['role'];
if ($adminn==1) {
		$admin='ADMIN';
	}elseif ($adminn==2) {
		$auth='AUTHOR';
	}

	if (!isset($admin)) {
		$_SESSION['msg']="You can not access the page cause youre not an admin";
		$_SESSION['msg_class']="alert-danger";

		header('location:'.BASE_URL.'ADMIN/admin/dashboard.php');

	}










 ?>








