<?php  include('includes/admin_auth.php'); ?>
<?php include_once('includes/edit_process.php') ?>

<?php include('includes/header.php'); ?>

	<title>Admin | Edit user</title>
</head>
<body>
	<!-- admin navbar -->
	<?php include('includes/navbar.php') ?>
	<div class="container content">
		<!-- Left side menu -->
		<?php include('includes/menu.php') ?>
		<!-- Middle form - to create and edit  -->
		<div>
			  <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
   
            </div>
          <?php endif; ?> 
			<h1 class="page-title">Edit Admin User</h1>

			<form method="post" action="" >
	<?php 
$id=$_GET['edit_id'];
 $result = mysqli_query($conn, "SELECT * FROM admin WHERE ADM_ID='$id' limit 1");
$row = $result->fetch_assoc();

 ?>
			

				<!-- if editing user, the id is required to identify that user -->
		
					<input type="hidden" name="admin_id" value="">
			

				
				<input type="email" name="email" value="<?php echo $row['ADM_MAIL']; ?>" placeholder="<?php echo $row['ADM_MAIL']; ?>" disabled>
				
				<select name="role"  required="required">
					<option selected disabled>Assign role</option>
					<?php 
$sql = mysqli_query($conn, "SELECT * FROM roles");
while ($row = $sql->fetch_assoc()){
 if ($row['Role']==1) {
		$admin='ADMIN';
	}elseif ($row['Role']==2) {
		$admin='AUTHOR';
	}
 echo '<option value=" '.$row['Role'].' "> '.$admin.' </option>';
?>
					
					
					<?php  } ?>
				</select>

				<!-- if editing user, display the update button instead of create button -->
		
		<button type="submit" class="btn btn-block" name="update_admin">UPDATE</button>
				
				
			</form>
		</div>
		</div>
</body>
</html>

