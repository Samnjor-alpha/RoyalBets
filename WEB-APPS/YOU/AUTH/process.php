<?php
  $msg = "";
  $msg_class = "";
  $conn = mysqli_connect("localhost", "root", "", "YM");
  if (isset($_POST['save_profile'])) {

    // for the database
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $mail=$_POST['mail'];
    $password=$_POST['pwd'];
    $cpassword = $_POST['cpwd'];

    $bio = stripslashes($_POST['bio']);
    
$imgData = addslashes(file_get_contents($_FILES['profileImage']['tmp_name']));
 $imageProperties = getimageSize($_FILES['profileImage']['tmp_name']);
 
    
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 2000000) {
      $msg = "Image size should not be greater than 2mb";
      $msg_class = "alert-danger";
    }
    $sql_e = "SELECT * FROM ADMIN WHERE ADM_MAIL='$mail'";
   
    $res_e = mysqli_query($conn, $sql_e);
 

   
    // check if passwords match
    if($password!== $cpassword) {
           $msg="Passwords mismatch";
      $msg_class="alert-danger";
    }elseif ($password== $cpassword) {

      if (mysqli_num_rows($res_e) > 0) {
      $msg = "Email is already associated with an account";
      $msg_class = "alert-danger";
    }else{
       $hash = password_hash($password, PASSWORD_DEFAULT);
     
   
 
    
    // Upload image only if no errors
    if (empty($error)) {

  $sql = "INSERT INTO admin SET ADM_DP='$imgData', ADM_FNAME='$fname', ADM_LNAME='$lname', ADM_MAIL='$mail', ADM_BIO='$bio', ADM_PWD='$hash'";
        if(mysqli_query($conn, $sql)){
          $msg = "Registration success";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } else {
        $error = "There was an erro uploading the file";
        $msg = "alert-danger";
      }
    }
  }}
  ?>
