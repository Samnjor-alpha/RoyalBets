<?php
include 'auth.php ';
 include 'e_process.php' ;
 include 'ch_pass.php';
?>
<?php

$results = mysqli_query($connection, "SELECT * FROM admin WHERE id='".$_SESSION['id']."'");
$row = $results->fetch_assoc();

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
            left: 16px;
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

<body class="">
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
                <?php

                    echo '<img  alt="dp" src="data:image/jpeg;base64,'.base64_encode( $row['a_dp'] ).'"/>';
 ?>
                <div class="centered typography-line">
                    <blockquote>
                        <p class="blockquote blockquote-primary"><?php echo$_SESSION['fname']; ?>
                        </p>
                    </blockquote></div>
            </div>




        </div>

        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li \>
                    <a href="./index.php">
                        <i class="now-ui-icons media-2_sound-wave"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li >
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

                <li class="active ">
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
                    <a class="navbar-brand" href="#DN">Edit Profile</a>
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
        <div class="panel-header panel-header-sm">
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Edit Profile</h5>
                            <?php if (!empty($msg)): ?>
                                <div class="alert <?php echo $msg_class ?>" role="alert">
                                    <?php echo $msg; ?>

                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Upload dp </h4>
              </div>
              <img src="../assets/img/avatar.png" onClick="triggerClick()" id="profileDisplay">
            </span>
                                        <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" required="required">
                                        <label>Profile Image</label>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-12 pl-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmai1">Email address</label>
                                            <input type="email" name="email" class="form-control"  value="<?php echo $row['a_mail'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="fname" placeholder="Company" value="<?php echo $_SESSION['fname'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo $_SESSION['lname'];?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input  disabled type="text" class="form-control" placeholder="City" value="Web">
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input  disabled type="text" class="form-control" placeholder="Country" value="Kenya">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>About Me</label>
                                            <textarea rows="4" cols="80" name="desc" class="form-control" placeholder="Here can be your description" ><?php echo $row['a_about']?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 pl-1">
                                        <div class="form-group">

                                            <button  type="submit" name="update" class="btn btn-outline-warning btn-block">Update Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="image">
                            <img src="assets/img/bg5.jpg" alt="...">
                        </div>
                        <div class="card-body">
                            <div class="author">
                                <a href="#">
                                    <?php

                                    echo '<img  class="avatar border-gray" alt="dp" src="data:image/jpeg;base64,'.base64_encode( $row['a_dp'] ).'"/>';
                                    ?>

                                    <h5 class="title"><?php echo $_SESSION['fname']; echo'&nbsp'; echo $_SESSION['lname']; ?></h5>
                                </a>

                            </div>
                            <p class="description text-center">
                            <?php echo $row['a_about']?>
                            </p>
                        </div>
                        <hr>
                                           </div>
                </div>

</div>
            <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-user">
                        <div class="card-header">
                            <h5 class="title">Change Password</h5>
                            <?php if (!empty($msg_p)): ?>
                                <div class="alert <?php echo $msg_class ?>" role="alert">
                                    <?php echo $msg_p; ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <form method="post" action="">
                                <label>Old Password</label>
                                <input type="password"  name="o_pass" class="form-control" placeholder="Old Password">
                            <label>New Password</label>
                            <input type="password"  name="n_pass" class="form-control" placeholder="New Password">
                            <label>Confirm New Password </label>
                            <input type="password" name="c_npass" class="form-control" placeholder="Confirm New Password">
                            <button type="submit" name="ch_pass" class="btn btn-outline-info btn-block">Change Password</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

            </div>
<footer class="footer">
    <div class="container-fluid">
        <nav>
            <ul>
                <li>
                    <a href="https://Dutar.co.ke">
                        Dutar
                    </a>
                </li>
                <li>
                    <a href="http://presentation.Dutar.co.ke">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="http://blog.Dutar.co.ke">
                        Blog
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright" id="copyright">
            &copy;
            <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by
            <a href="https:/Dutar.co.ke" target="_blank">Dutar.co.ke</a>. Powered by
            <a href="https://Dutar.co.ke" target="_blank">Dutar</a>.
        </div>
    </div>
</footer>
</div>
</div>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/script.js"></script>
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
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/demo/demo.js"></script>
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>
</body>

</html>