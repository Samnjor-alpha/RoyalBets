<?php

include("config.php");
?>
<?php

$error = '';
if (isset($_POST['login'])) {
    if (empty($_POST['email']) || empty($_POST['pass'])) {
        $error = "complete fields!";
    } else {
        $username = $_POST['email'];
        $password = $_POST['pass'];

        $query = "select * from admin where a_mail='$username'";
        $result = $connection->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if (password_verify($_POST['pass'], $row['a_pass'])) {


                $_SESSION['id'] = $row['id'];// Password matches, so create the sessions
                $_SESSION['user'] = $row['a_mail'];
                $_SESSION['id']= $row['id'];
                $_SESSION['fname']=$row['a_fname'];
                $_SESSION['lname']=$row['a_lname'];




//                $sql = "UPDATE admin SET LAST_LOGIN = NOW() WHERE ADM_ID=".$_SESSION['id']."";

//                if ($connection->query($sql) === TRUE) {
//                    echo "Record updated successfully";
//                } else {
//                    echo "Error updating record: " . $connection->error;
//                }



                header('Location:home/index.php');



            }else{
                $error="The username or password do not match";
                $msg_class = "alert-danger";
            }
        }
        $connection->close();

    }}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/paper_img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Dutar</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

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
            <a class="navbar-brand" href="https://Dutar.co.ke">Dutar</a>
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
            <div class="row">
                <?php if (!empty($error)): ?>
                    <div class="alert <?php echo $msg_class ?>" role="alert">
                        <?php echo $error; ?>

                    </div>
                <?php endif; ?>
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                    <div class="register-card">

                        <h3 class="title">Welcome</h3>
                        <form action="" class="register-form" method="post">
                            <label>Email</label>
                            <input class="form-control" placeholder="Email" name="email" type="email">

                            <label>Password</label>
                            <input type="password"  name="pass" class="form-control" placeholder="Password">
                            <button  type="submit" name="login" class="btn btn-warning btn-block">Login</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="footer register-footer text-center">
            <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by
            <a href="https:/Dutar.co.ke" target="_blank">Dutar.co.ke</a>.<br>
             Powered by<a href="https://Dutar.co.ke" target="_blank">Dutar</a>.
          </div>
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

<script src="assets/js/ct-paper.js"></script>

</html>