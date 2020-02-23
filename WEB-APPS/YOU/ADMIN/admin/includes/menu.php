<?php 
$adminn=$_SESSION['role'];
if ($adminn==1) {
		$admin='ADMIN';
	}elseif ($adminn==2) {
		$auth='AUTHOR';
	}

 ?>
	
<div class="menu">
	<div class="card">
		<div class="card-header">
			<h2>Actions</h2>
		</div>
		<div class="card-content">
			<a href="<?php echo BASE_URL . 'ADMIN/admin/create_post.php' ?>">Create Posts</a>
			<a href="<?php echo BASE_URL . 'ADMIN/admin/view_posts.php' ?>">Manage Posts</a>
			<?php if (isset($admin)): ?>
		<a href="<?php echo BASE_URL . 'ADMIN/admin/users.php' ?>">Manage Users</a>
			<a href="<?php echo BASE_URL . 'ADMIN/admin/addtopic.php' ?>">Manage Topics</a>
<?php endif ?>
		</div>
	</div>
</div>