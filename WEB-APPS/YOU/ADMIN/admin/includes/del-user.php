<?php 

 $msg1 = "";
  $msg1_class = "";
  $conn = mysqli_connect("localhost", "root", "", "YM");
                  			
$admin=$_GET['delete-admin'];

$sql = "DELETE FROM admin WHERE ADM_ID='$admin'";


        if(mysqli_query($conn, $sql)){
          $msg1 = "User deleted successfully";
          $msg1_class = "alert-success";
          
       
        } else {
          $msg1 = "An error occurred while editing user";
          $msg1_class = "alert-danger";
       
        }

 ?>