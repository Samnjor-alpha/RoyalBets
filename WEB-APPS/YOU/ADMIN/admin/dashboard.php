  <?php include('includes/auth.php ') ?>
  <?php

  $results = mysqli_query($conn, "SELECT * FROM ADMIN WHERE ADM_ID='".$_SESSION['id']."'");

?>
  <?php include('includes/header.php'); ?>
  <title>Admin | Dashboard</title>
</head>
<style type="text/css">
.card-columns a:hover { cursor: pointer; color: #cc3300; }

</style>
<body>
  <div class="header">
    <div class="logo">
      <a href="<?php echo BASE_URL .'ADMIN/admin/dashboard.php' ?>">
        <h1>YOUTH MAGAZINE - <?php
        $adminn=$_SESSION['role'];
if ($adminn==1) {
    $role='ADMIN';
  }else{
$rolea='AUTHOR';
  }
  
    
 
 if (!isset($role)) {
    echo $rolea;
  }else{
    echo $role;
  } ?></h1>
      </a>
    </div>
    <?php if (isset($_SESSION['user'])): ?>
   <span> <div class="imgcontainer">
    <?php while ($row = $results->fetch_assoc()){

  echo '<img class="avatar" alt="dp" src="data:image/jpeg;base64,'.base64_encode( $row['ADM_DP'] ).'"/>';
   } ?>  <br> <div class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span><?php echo$_SESSION['fname']; ?></span>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Edit Profile</a></li>
          <li><a href="<?php echo BASE_URL . 'ADMIN/admin/includes/logout.php'; ?>" class="logout-btn">Log-Out</a></li>
    
        </ul>
      </div>
  </div></span>
    <?php endif ?>
  </div>
  <?php if (!empty($_SESSION['msg'])): ?>
            <div class="alert <?php echo $_SESSION['msg_class']; ?> text-center" role="alert">
              <?php echo $_SESSION['msg']; ?>
   
            </div>
      <?php endif; ?>
  <br><br><br><br>
  <div class="container">
    <center><h1>Welcome: <?php echo $_SESSION['fname']; echo'&nbsp'; echo $_SESSION['lname']; ?></h1></center>

  
  <div class="card-columns">
      <div class="card bg-light">
      <div class="card-body text-center">
        <p class="card-text"><a href="create_post.php">CREATE POST</a></p>
      </div>
    </div>
       <div class="card bg-light">
      <div class="card-body text-center">
        <p class="card-text"><a href="">PUBLISHED POSTS</a></p>
      </div>
    </div>
         <div class="card bg-light">
      <div class="card-body text-center">
        <p class="card-text"><a href="users.php">CREATE/EDIT ADMIN</a></p>
      </div>
    </div>
 
     <div class="card bg-light">
      <div class="card-body text-center">
        <p class="card-text"><a href="">PUBLISHED COMMENTS</a> </p>
      </div>
    </div>
       <div class="card bg-light">
      <div class="card-body text-center">
        <p class="card-text"><a href="addtopic.php">ADD TOPICS</a></p>
      </div>
    </div> 
      <div class="card bg-light">
      <div class="card-body text-center">
        <p class="card-text"><a href="">REGISTERED USERS</a></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
