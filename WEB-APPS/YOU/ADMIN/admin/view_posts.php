<?php include('includes/auth.php ') ?>
  <?php include('includes/header.php'); ?>
   <?php include('includes/post_process.php'); ?>

<!-- Get all admin posts from DB -->
<?php 

$sql = mysqli_query($conn, "SELECT * FROM posts");






 ?>

	<title>Admin | Manage Posts</title>
</head>
<body>
	<?php include('includes/navbar.php') ?>
	
	<div class="container content">
		<!-- Left side menu -->
		<?php  include('includes/menu.php'); ?>

		<!-- Display records from DB-->
		<div class="table-div table-responsive">

			

			
			
			
				<table class="table-responsive">
						<thead>
						<th>N</th>
						<th>Title</th>
						<th>Author</th>
						<th>Views</th>
						<th>Featured picture</th>
						<th>content</th>
						<!-- Only Admin can publish/unpublish post -->
						
							<th><small>Publish</small></th>
					
						<th><small>Edit</small></th>
						<th><small>Delete</small></th>
					</thead>
					<tbody>
					<?php while ($row = $sql->fetch_assoc()){ ?>
						<tr>
							<td><?php echo$row['id']; ?></td>
							<td><a 	target="_blank"
								href="<?php echo BASE_URL . 'ADMIN/admin/single_post.php?post-slug=' . $row ['id'] ?>">
									<?php echo $row['title']; ?>	
								</a></td>
							<td>
								<?php echo$row['user_id']; ?>	
								
							</td>
							<td><?php echo$row['views']; ?></td>
							<td><?php echo '<img width="150" height="150" alt="dp" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>'; ?></td>
							
							<!-- Only Admin can publish/unpublish post -->
							<td><?php echo html_entity_decode($row['body']); ?></td>
								<td>
								</a>
									<a class="fa fa-times btn publish"
										href="posts.php?publish=<?php echo $post['id'] ?>">
									</a>
								
								</td>
							

							<td>
								<a class="fa fa-pencil btn edit"
									href="create_post.php?edit-post=<?php echo $post['id'] ?>">
								</a>
							</td>
							<td>
								<a  class="fa fa-trash btn delete" 
									href="create_post.php?delete-post=<?php echo $post['id'] ?>">
								</a>
							</td>
						</tr>
					<?php  } ?>	
					</tbody>
				</table>
		
		</div>
		<!-- // Display records from DB -->
	</div>
</body>
</html>
