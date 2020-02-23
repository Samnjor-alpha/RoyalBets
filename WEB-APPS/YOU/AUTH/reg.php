<?php include_once('process.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>log/sign in</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">
 
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-4 offset-md-4 form-div">
    <!--     <a href="profiles.php">View all profiles</a> -->
        <form  action="reg.php" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-3 mt-3">Register</h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
   
            </div>
          <?php endif; ?>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Upload dp </h4>
              </div>
              <img src="images/avatar.jpg" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" required="required">
            <label>Profile Image</label>
          </div>
            <div class="form-group">
            <label>First Name</label>
            <input type="text" name="fname" class="form-control" required="required">
          </div>
           <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lname" class="form-control" required="required">
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
            <label>Confirm Password</label>
            <input type="password" name="cpwd" class="form-control" required="required"> 
          </div>
          <div class="form-group">
            <label>Bio</label>
      <textarea name="bio"  placeholder="Introduce your self" class="form-control" required="required"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" name="save_profile" class="btn btn-primary btn-block">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<script src="script.js"></script>