<?php include_once("process.php") ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/paper_img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Dutar</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="assets/css/examples.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300&display=swap" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-ct-transparent navbar-fixed-top" role="navigation-demo" id="register-navbar">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Dutar.co.ke">Dutar</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
            <ul class="nav navbar-nav navbar-right">

                <li>
                    <a href="#" target="_blank" class="btn btn-simple"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#" target="_blank" class="btn btn-simple"><i class="fa fa-facebook"></i></a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-->
</nav>

<div class="wrapper">
    <div class="register-background">
        <div class="filter-black"></div>
        <div class="container">
            <?php if (!empty($msg)): ?>
                <div class="alert <?php echo $msg_class ?>" role="alert">
                    <?php echo $msg; ?>

                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                    <div class="register-card">
                        <h3 class="title">Register</h3>
                        <form class="register-form" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Upload dp </h4>
              </div>
              <img src="assets/img/avatar.png" onClick="triggerClick()" id="profileDisplay">
            </span>
                                <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" required="required">
                                <label>Profile Image</label>
                            </div>
                            <label>First Name</label>
                            <input type="text"  name="fname" class="form-control" placeholder="First Name">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control" placeholder="Last Name">
                            <label>Email</label>
                            <input type="Email" name="email" class="form-control" placeholder="Email">
                            <label>Password</label>
                            <input type="password"  name="pass" class="form-control" placeholder="Password">
                            <label>Confirm Password </label>
                            <input type="password" name="cpass" class="form-control" placeholder="Confirm Password">
                            <button type="submit" name="reg" class="btn btn-warning btn-block">Sign Up</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="footer register-footer text-center">
            <h6>&copy;2020 <br>&copysr;Dutar<i class="fa fa-laptop"></i></h6>
        </div>
    </div>
</div>

</body>

<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="assets/js/ct-paper-checkbox.js"></script>
<script src="assets/js/ct-paper-radio.js"></script>
<script src="assets/js/bootstrap-select.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/ct-paper.js"></script>


