<?php
include '../config.php';

session_unset($_SESSION['user']);
session_destroy();
 header('location:..\index.php');

?>