<?php 

include 'config.php';
if (!isset($_SESSION['user'])) {

header('location:'.BASE_URL.'AUTH/login.php');
}
 


 ?>