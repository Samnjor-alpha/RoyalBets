<?php

include("config.php");
?>
<!DOCTYPE html>
<html class="no-js"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Form</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">
     
        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
<?php
session_start();
$error = '';
if (isset($_POST['is_login'])) {
    if (empty($_POST['mail']) || empty($_POST['pwd'])) {
         $error = "complete fields!";
    } else {
          $username = $_POST['mail'];
          $password = $_POST['pwd'];
       
          $query = "select * from admin where ADM_MAIL='$username'";
          $result = $connection->query($query);
        if ($result->num_rows === 1) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if (password_verify($_POST['pwd'], $row['ADM_PWD'])) {

                // Password matches, so create the sessions
                $_SESSION['user'] = $row['ADM_MAIL'];
                $_SESSION['id']= $row['ADM_ID'];
                $_SESSION['fname']=$row['ADM_FNAME'];
                $_SESSION['lname']=$row['ADM_LNAME'];
                $_SESSION['role']=$row['ROLE'];
                if ($row['ROLE']=='ADMIN') {
                  $_SESSION['admin']=$row['ROLE'];
                }else{

                  $_SESSION['author']=$row['ROLE'];
                }


$sql = "UPDATE admin SET LAST_LOGIN = NOW() WHERE ADM_ID=".$_SESSION['id']."";

if ($connection->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $connection->error;
}

$connection->close();


                header("Location:../ADMIN/admin/dashboard.php");

                echo "Match";

            }else{
                $error="The username or password do not match";
            }
}

}}
?>
        

<div class="container">
    <div class="row">
      <div class="col-4 offset-md-4 form-div">
    <!--     <a href="profiles.php">View all profiles</a> -->
        <form  action="login.php" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-3 mt-3">LOGIN</h2>
           <div class="alert-danger">
         <?php if($error) { ?>
         	
	                <em>
						<label class="err" for="password" generated="true" style="display: block;"><?php echo $error ?></label>
					</em>
				<?php } ?>
			</div>
           
           <div class="form-group">
            <label>Email</label>
            <input type="email" name="mail" class="form-control" required="required">
          </div>
           <div class="form-group">
            <label>Password</label>
 <input type="password" name="pwd" class="form-control" required="required">
          </div>

          <div class="form-group">
            <button type="submit" name="is_login" class="btn btn-primary btn-block">login</button>
          </div>
        </form>
      </div>
    </div>
    
    </body>
</html>
