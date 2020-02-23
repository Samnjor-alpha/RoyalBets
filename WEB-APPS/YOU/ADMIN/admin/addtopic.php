<?php  include('includes/admin_auth.php'); ?>
  <?php include('includes/header.php'); ?>
  <?php include 'includes/process_topic.php'; ?>
<!-- Get all topics from DB -->



	<title>Admin | Manage Topics</title>
</head>
<body>
	<!-- admin navbar -->
	<?php include('includes/navbar.php') ?>
	<div class="container content">
		<!-- Left side menu -->
		<?php include('includes/menu.php') ?>

		<!-- Middle form - to create and edit -->
		<div class="action">
		   <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
   
            </div>
          <?php endif; ?>

			<h1 class="page-title">Create Topics</h1>
			<form method="POST" action="<?php echo BASE_URL . 'ADMIN/admin/addtopic.php'; ?>" >
			<input type="text" name="topic_name" placeholder="Topic" required="required">
		<button type="submit" class="btn btn-block" name="create_topic">Save Topic</button>
		
			</form>
		</div>
		<div class="table-div">
		
			<!-- Display notification message -->
			<table class="table">
				<thead>
				<th>No.</th>
				<th>Topic Name</th>
				<th colspan="2">Action</th>
				</thead>
				<tbody>
		<?php 
$sql = mysqli_query($conn, "SELECT * FROM topics"); 

while ($row = $sql->fetch_assoc()){

				
					
						echo'<tr>';
							echo'<td>'.$row['T_ID'].'</td>';
							echo'<td>'.$row['T_NAME'].'</td>';
							echo'<td>';
	echo'<a class="fa fa-pencil btn edit"  href="topics.php?edit-topic=<?php echo $topic["id"] "?></a>';
								echo'</a>';
							echo'</td>';
							echo'<td>';
echo'<a class="fa fa-trash btn delete" href="topics.php?delete-topic=<?php echo $topic["id"] ?></a>';
								echo'</a>';
							echo'</td>';
						echo'</tr>';
			
					
  } ?>


		</tbody>
				</table>			
					
				
				
		
				
		</div>
		<!-- // Display records from DB -->
	</div>
</body>
</html>