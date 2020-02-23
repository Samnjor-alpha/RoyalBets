<?php

include '../config.php';
if (!isset($_SESSION['user'])) {

    header('location:../index.php');
}



?>