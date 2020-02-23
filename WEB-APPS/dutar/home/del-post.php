<?php

$msg = "";
$msg_class = "";
$conn = mysqli_connect("localhost", "root", "", "Dutar");

$post=$_GET['delete-post'];

$sql = "DELETE FROM posts WHERE p_slug='$post'";


if(mysqli_query($conn, $sql)){
    $msg = "Post deleted successfully";
    $msg_class = "alert-success";

header("Location:viewPost.php");
} else {
    $msg = "An error occurred";
    $msg_class = "alert-danger";
    header("Location:viewPost.php");
}


?>