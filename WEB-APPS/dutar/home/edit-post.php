
<?php
include 'auth.php';
?>
<?php


$results = mysqli_query($connection, "SELECT * FROM admin WHERE id='" . $_SESSION['id'] . "'");

$post_results = mysqli_query($connection, "SELECT * FROM posts order by p_date desc LIMIT 3");
$post = $_GET['edit-post'];

$sql = mysqli_query($connection, "SELECT * FROM posts WHERE p_slug='$post'");
$e_prow = $sql->fetch_assoc();

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
                $msg = "Failed to connect to MySQL: " ;
//                    $msg = "There was an error in the database";
                $msg_class = "alert-danger";

            }}
    } else {
        $msg = "There was an error updating the Article";
        $msg_class = "alert-danger";

    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Dutar Admin
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
    <link href="assets/demo/demo.css" rel="stylesheet" />
    <style>
        .image {
            position: relative;
            text-align: center;
            color: #2e679c;
        }
        .centered {
            position: absolute;
            bottom: 8px;
            text-align: center;
        }

        /* Avatar image */
        .avatar {
            width: 60%;
            border-radius: 50%;
            align: center;
        }

        html, body, .sidebar {
            height: 100%;
            overflow: hidden;
        }
    </style>
</head>

<body>
<div class="wrapper ">
    <div class="sidebar" data-color="blue">

        <div class="logo">
            <!--        <a href="http://Dutar.co.ke" class="simple-text logo-mini">-->
            <!--         DN-->
            <!--        </a>-->
            <!--        <a href="http://Dutar.co.ke" class="simple-text logo-normal">-->
            <!--          Dutar-->
            <!--        </a>-->


            <div class="image">
                <?php while ($row = $results->fetch_assoc()){

                    echo '<img  alt="dp" src="data:image/jpeg;base64,'.base64_encode( $row['a_dp'] ).'"/>';

                } ?>
                <div class="centered typography-line">
                    <blockquote>
                        <p class="blockquote blockquote-primary"><?php echo$_SESSION['fname']; ?>
                        </p>
                    </blockquote></div>
            </div>




        </div>

        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href="./index.php">
                        <i class="now-ui-icons media-2_sound-wave"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active ">
                    <a href="./createPost.php">
                        <i class="now-ui-icons files_paper"></i>
                        <p>Create Post</p>
                    </a>
                </li>
                <li>
                    <a href="viewPost.php">
                        <i class="now-ui-icons location_map-big"></i>
                        <p>View Posts</p>
                    </a>
                </li>

                <li>
                    <a href="E_account.php">
                        <i class="now-ui-icons users_single-02"></i>
                        <p>Edit Profile</p>
                    </a>
                </li>
                <li>
                    <a href="managetopics.php">
                        <i class="now-ui-icons design_vector"></i>
                        <p>Manage Topics</p>
                    </a>
                </li>
                <li>
                    <a href="manageDur.php">
                        <i class="now-ui-icons business_globe"></i>
                        <p>Manage Site</p>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                        <p>Sign Out</p>
                    </a>
                </li>
                <li>

            </ul>
        </div>
    </div>

    <div class="main-panel" id="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#DN">EDIT POST</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <form>
                    <div class="input-group no-border">
                        <input type="text" value="" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="now-ui-icons ui-1_zoom-bold"></i>
                            </div>
                        </div>
                    </div>
                </form>


        </nav>
        <!-- End Navbar -->
        <!-- End Navbar -->
        <div class="panel-header panel-header-sm">
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">EDIT  POST</h5>
                        </div>
                        <?php if (!empty($msg)): ?>
                            <div class="alert <?php echo $msg_class ?>" role="alert">
                                <?php echo $msg; ?>

                            </div>
                        <?php endif; ?>

                        <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 pr-1">
                                        <div class="form-group">
                                            <label>Post  Category</label>
                                            <select   name="categ" class="form-control">
                                                <option value="" selected disabled>Choose topic</option>

                                                <?php
                                                $sql_t = mysqli_query($connection, "SELECT * FROM topics");
                                                while ($t_row = $sql_t->fetch_assoc()){
                                                    echo '<option value=" '.$t_row['topic'].' "> '.$t_row['topic'].' </option>';

                                                    ?>


                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 px-1">
                                        <div class="form-group">
                                            <label>Post Title</label>

                                            <input type="text"  value="<?php echo $e_prow['p_title'];?>" class="form-control" name="pTitle" placeholder="Title" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 pl-1">
                                        <label>Featured Image</label>
                                        <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">

              </div>
              <?php  echo '<img  alt="dp" src="data:image/jpeg;base64,'.base64_encode( $e_prow['p_img'] ).'" onClick="triggerClick()" id="profileDisplay"/>';?>

            </span>
                                        <input type="file" name="header" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" required="required">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 pr-lg-2">
                                        <div class="form-group">
                                            <label>Content</label>
<textarea name="body" id="body" cols="30" rows="10" ><?php echo html_entity_decode($e_prow['p_body']); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 pl-1">
                                        <div class="form-group">

                                            <button  type="submit" name="update" class="btn btn-warning btn-block">Update</button>
                                        </div>
                                    </div>
                                </div>




                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Latest Posts</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Header</th>
                                <th>Title</th>
                                <th>Body</th>
                                </thead>
                                <tbody>
                                <?php while ($p_row = $post_results->fetch_assoc()){ ?>
                                    <tr>
                                        <td><?php echo '<img class="image" alt="header" src="data:image/jpeg;base64,'.base64_encode( $p_row['p_img'] ).'"/>'; ?></td>

                                        <td class="blockquote blockquote-primary">
                                            <?php echo $p_row['p_title']; ?>

                                        </td>




                                        <td><?php
                                            $string=$p_row['p_body'];
                                            $string = strip_tags($string);
                                            if (strlen($string) >150) {

                                                // truncate string
                                                $stringCut = substr($string, 0, 150);
                                                $endPoint = strrpos($stringCut, ' ');

                                                //if the string doesn't contain any space then it will cut without word basis.
                                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                $string .= '... <a href="">Read More</a>';
                                            }


                                            echo html_entity_decode($string); ?></td>
                                    </tr>

                                <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
      
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
    <script src="../assets/js/script.js"></script>
    <script src="assets/demo/demo.js"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
</body>
</html>