<?php

$msg = "";
$msg_class = "";
$connection = mysqli_connect("localhost", "root", "", "Dutar");

if(isset($_POST['update'])) {

    $ed_post_id=$_GET['edit-post'];
    $post_category=$_POST['categ'];
    $post_title=$_POST['pTitle'];
    $status=0;
    $slug=$post_title;
    $body = htmlentities($_POST['body']);
    $admin=$_SESSION['user'];
    $imgData = addslashes(file_get_contents($_FILES["header"]["tmp_name"]));
    $imageProperties = getimageSize($_FILES["header"]["tmp_name"]);


    function slugify($string){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
    }




    $slug=slugify($post_title);















    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['header']['size'] > 2000000) {
        $msg = "Image size should not be greater than 2mb";
        $msg_class = "alert-danger";
    }
    $post_check_query = "SELECT * FROM posts WHERE p_slug='$slug'";
    $result = mysqli_query($connection, $post_check_query);



    if (mysqli_num_rows($result) > 0) { // if post exists$res_e = mysqli_query($conn, $sql_e);
        $msg="A post already exists with that title.";
        $msg_class="alert-danger";
    }        // Upload image only if no errors
    if (empty($msg)) {

        $sql = "UPDATE posts SET user_id='$admin', category='$post_category', p_title='$post_title', p_slug='$slug', p_img='$imgData' ,p_body='$body',p_status='$status',Update_date=NOW() where p_id='$ed_post_id'";
        if(mysqli_query($connection, $sql)){
            $msg = "Post updated Successfully";
            $msg_class = "alert-success";

        } else {
            if ($connection -> connect_errno) {
                $msg = "Failed to connect to MySQL: " . $mysqli->connect_error;
//                    $msg = "There was an error in the database";
                $msg_class = "alert-danger";

            }}
    } else {
        $msg = "There was an error updating the Article";
        $msg_class = "alert-danger";

    }
}

?>
