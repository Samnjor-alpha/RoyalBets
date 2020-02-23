<?php  include('includes/auth.php'); ?>

<?php include('includes/header.php'); ?>

	<title>Admin | Manage users</title>
</head>
<body>
	<!-- admin navbar -->
	<?php include('includes/navbar.php') ?>
	<div class="container content">
		<!-- Left side menu -->
		<?php include('includes/menu.php') ?>
		<!-- Middle form - to create and edit  -->
		<div class="action">
			<h1 class="page-title">Create Admin User</h1>
 <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
   
            </div>
      <?php endif; ?>
			<form method="post" action="" >

				<!-- validation errors for the form -->
			

				<!-- if editing user, the id is required to identify that user -->
		
					<input type="hidden" name="admin_id" value="">
			

				
				<input type="email" name="email" value="" placeholder="Email">
				<input type="password" name="password" placeholder="Password">
				<input type="password" name="passwordConfirmation" placeholder="Password confirmation">
				<select name="role">
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

					<button type="submit" class="btn btn-block" name="create_admin">Save User</button>
				
			</form>
		</div>
		<!-- // Middle form - to create and edit -->

		<!-- Display records from DB-->
		<div class="table-div">
			<!-- Display notification message -->
			
	
				
		
				<table class="table">
					<thead>
						<th>N</th>
						<th>Admin</th>
						<th>Role</th>
						<th colspan="2">Action</th>
					</thead>
					<tbody>
						<?php 
$sql = mysqli_query($conn, "SELECT * FROM admin");
while ($row = $sql->fetch_assoc()){
?>
						<tr>
							<td><?php echo $row['ADM_ID']; ?></td>
							<td>
							<?php echo $row['ADM_FNAME']; echo $row['ADM_LNAME']; ?>	
							
							</td>
							<td><?php
							$adminn="";
if ($row['ROLE']==1) {
		$adminn="ADMIN";
	} elseif ($row['ROLE']==2) {
		$adminn="AUTHOR";
	}
		echo $adminn;

							  ?></td>


							<td>
								<a href="edit-user.php?edit_id=<?php echo $row['ADM_ID']; ?>" class="fa fa-pencil btn btn-block edit""></a>
							</td>
							<td>
								<a class="fa fa-trash btn delete" 
								    href="includes/del-user.php?delete-admin=<?php echo $row['ADM_ID']; ?>">
								</a>
							</td>
						</tr>
				
					</tbody>
			<?php } ?>
		</div>
		<?php if (!empty($msg1)): ?>
            <div class="alert <?php echo $msg1_class ?>" role="alert">
              <?php echo $msg1; ?>
   
            </div>
      <?php endif; ?>
	</div>
</body>
</html>
