  <?php include('includes/auth.php ') ?>
  <?php include('includes/header.php'); ?>
   <?php include('includes/post_process.php'); ?>
 <title>Admin | Create Post</title>
</head>
<body>
<?php include('includes/navbar.php') ?>


	<div class="container content">
		<?php  include('includes/menu.php'); ?>
				<div class="action create-post-div">
			<h1 class="page-title">Create Post</h1>
	<form method="post" enctype="multipart/form-data" action="create_post.php" >
				<!-- validation errors for the form -->
				  <?php if (!empty($errors)): ?>
            <div class="alert <?php echo $errors_class ?>" role="alert">
              <?php echo $errors; ?>
   
            </div>
          <?php endif; ?>
		
		
			

				<input type="text" name="title" value="" placeholder="Title">
				<label style="float: left; margin: 5px auto 5px;">Featured image</label>
				<input type="file" name="pImage"    required="required">
				<textarea name="body" id="body" cols="30" rows="10"></textarea>
				<select name="categ" required="required">
					<option value="" selected disabled>Choose topic</option>
				
					<?php 
$sql = mysqli_query($conn, "SELECT * FROM topics");
while ($row = $sql->fetch_assoc()){
 echo '<option value=" '.$row['T_NAME'].' "> '.$row['T_NAME'].' </option>';

?>
					
					
					<?php  } ?>	
				
				</select>
				
		
					<!-- display checkbox according to whether post has been published or not -->
				
						<label for="publish">
							Publish
							<input type="checkbox" value="1" name="publish" checked="checked">&nbsp;
						</label>
				
						
					
				
				<!-- if editing post, display the update button instead of create button -->
			
			
					<button type="submit" class="btn btn-block" name="create_post">Save Post</button>
			

			</form>
		</div>
		<!-- // Middle form - to create and edit -->
	</div>
</body>
</html>

<script>
	CKEDITOR.replace('body');
</script>
