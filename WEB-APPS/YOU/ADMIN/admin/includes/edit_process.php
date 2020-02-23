<?php

  $msg = "";
  $msg_class = "";
  $conn = mysqli_connect("localhost", "root", "", "YM");
 
if(isset($_POST['update_admin'])) {
  $role=$_POST['role'];
  $admin=$_GET['edit_id'];


     
  $sql = "UPDATE admin SET ROLE='$role' WHERE ADM_ID='$admin'";
        if(mysqli_query($conn, $sql)){
          $msg = "User Update successfully";
          $msg_class = "alert-success";
      
        } else {
          $msg = "An error occurred while editing user";
          $msg_class = "alert-danger";
        }
}

  ?>
