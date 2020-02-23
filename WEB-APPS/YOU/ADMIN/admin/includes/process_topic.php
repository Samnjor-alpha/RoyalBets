<?php

  $msg = "";
  $msg_class = "";
  $conn = mysqli_connect("localhost", "root", "", "YM");
 
if(isset($_POST['create_topic'])) {
  $topic=$_POST['topic_name'];
  $admin=$_SESSION['user'];

 $sql_e = "SELECT * FROM topics WHERE T_NAME='$topic'";
   
    $res_e = mysqli_query($conn, $sql_e);

     if (mysqli_num_rows($res_e) > 0) {
      $msg = "The topic already exists";
      $msg_class = "alert-danger";
    }else{
   $sql = "INSERT INTO topics SET T_NAME='$topic', T_A_ADMIN='$admin'";

        if(mysqli_query($conn, $sql)){
          $msg = "Topic added successfully";
          $msg_class = "alert-success";
      
        } else {
          $msg = "An error occurred while adding a tpics";
          $msg_class = "alert-danger";
        }
}
}
 
  ?>
