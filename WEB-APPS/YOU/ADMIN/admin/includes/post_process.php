<?php 
 $errors = "";
  $errors_class = "";
  $pub= 0;
$tittle = "";
$post_slug = "";
$body = "";
$imgData = "";
$post_topic = "";
$admi=$_SESSION['user'];
if (isset($_POST['create_post'])) {

$tittle=$_POST['title'];
$body = htmlentities($_POST['body']);
$post_slug =$tittle;
$topic= $_POST['categ'];
$pub = $_POST['publish'];
$featuredimg=addslashes(file_get_contents($_FILES['pImage']['tmp_name']));
$featuredprop=getimagesize($_FILES['pImage']['tmp_name']);
// $imgData = addslashes(file_get_contents($_FILES['pImage']['tmp_name']));
//  $imageProperties = getimageSize($_FILES['pImage']['tmp_name']);
 
    
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['pImage']['size'] > 2000000) {
      $errors = "Image size should not be greater than 2mb";
      $errors_class = "alert-danger";
    }



if (empty($tittle)) 
	{ 
		$errors= "Post title is required";
	$errors_class="alert-danger"; }
		if (empty($body)) { $errors= "Post content is required";
	$errors_class="alert-danger";  }
		if (empty($topic)) { 
	$errors= "topic  is required";
	$errors_class="alert-danger";  }


$imgData = $_FILES['pImage']['tmp_name'];
	  	if (empty($imgData)) { $errors= "featured  image is  required";
	$errors_class="alert-danger";  } 



	$post_check_query = "SELECT * FROM posts WHERE slug='$post_slug' LIMIT 1";
		$result = mysqli_query($conn, $post_check_query);

		if (mysqli_num_rows($result) > 0) { // if post exists
	$errors="A post already exists with that title.";
	$errors_class="alert-danger";
		}

			if (empty($error)) {
$query = "INSERT INTO posts (user_id, title,topic, slug, image, body, published, created_at, updated_at) VALUES('$admi', '$tittle','$topic', '$post_slug', '$featuredimg', '$body', $pub, now(), now())";
			if(mysqli_query($conn, $query)){ // if post created successfully
				$inserted_post_id = mysqli_insert_id($conn);
				// create relationship between post and topic
				$sql = "INSERT INTO post_topic (post_id, topic_id) VALUES($inserted_post_id, $topic)";
				mysqli_query($conn, $sql);

$errors = "Post created successfully";
$errors_class="alert-success";
				
			
			
		}




}

}






 ?>