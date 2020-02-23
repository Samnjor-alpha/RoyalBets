<?php

$error = "";
$msg_class = "";
$conn = mysqli_connect("localhost", "root", "", "Dutar");

$topic=$_GET['delete-t'];

$sql = "DELETE  FROM topics WHERE t_id='$topic'";


if(mysqli_query($conn, $sql)){
    $error = "Topic deleted successfully";
    $msg_class = "alert-success";

    header("Location:managetopics.php");
} else {
    $error= "An error occurred";
    $msg_class = "alert-danger";
    header("Location:managetopics.php");
}


?>