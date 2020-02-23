<?php include('includes/auth.php ') ?>

<?php  


 
  $slug=$_GET['post-slug'];


$sql = mysqli_query($conn, "SELECT * FROM posts WHERE id='$slug'");
$row = $sql->fetch_assoc();
?>
<?php include('includes/header.php'); ?>
<title> <?php echo $row['title'] ?> | Youth Magazine</title>
</head>
<body>

<!-- admin navbar -->
	<?php include('includes/navbar.php') ?>
<div class="container content">		
		

		<!-- Page wrapper -->
		
			<?php 
					$sql = mysqli_query($conn, "SELECT * FROM posts WHERE id='$slug'");
					while ($row = $sql->fetch_assoc()){ ?>
						<div class="row">
							<div class="col-md-12" style="text-align:center;">
								<center>
	 <div class="panel panel-info">
      <div class="panel-heading"><h1><?php echo $row['title']; ?></h1></div>
      <div class="panel-body">
<div>
	<center>
	
<?php echo '<img class="img-responsive" alt="featured"  src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>'; ?>
</center>

	<div class="post-body-div">
					<?php echo html_entity_decode($row['body']); ?>
				</div>
</div>
  




  </div>
    </div>
    </center>
		</div>
		</div>
		</div>
		<?php  } ?>	


</body>
</html>
