  <?php

  $conn = mysqli_connect("localhost", "root", "", "YM");
  $results = mysqli_query($conn, "SELECT * FROM ADMIN WHERE ADM_ID='".$_SESSION['id']."'");

?>
<div class="header">
	<div class="logo">
		<a href="<?php echo BASE_URL .'ADMIN/admin/dashboard.php' ?>">
		  <h1>YOUTH MAGAZINE - <?php echo $_SESSION['role'] ?></h1>
		</a>
	</div>
	<span> <div class="imgcontainer">
    <?php while ($row = $results->fetch_assoc()){

  echo '<img class="avatar" alt="dp" src="data:image/jpeg;base64,'.base64_encode( $row['ADM_DP'] ).'"/>';
   } ?><br>
   <div class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span><?php echo$_SESSION['fname']; ?></span>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Edit Profile</a></li>
          <li><a href="<?php echo BASE_URL . 'ADMIN/admin/includes/logout.php'; ?>" class="logout-btn">Log-Out</a></li>
    
        </ul>
      </div>

  </div>
</div>