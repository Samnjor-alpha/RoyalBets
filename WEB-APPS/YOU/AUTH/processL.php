
 <?php
  $msg = "";
  $msg_class = "";
  $conn = mysqli_connect("localhost", "root", "", "YM");
if (isset($_POST['login_user'])) {

    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
  $password = mysqli_real_escape_string($conn, $_POST['pwd']);

if (empty($password)) {
           $msg="Password required";
      $msg_class="alert-danger";}

    if (empty($mail)) {
           $msg="Email required";
      $msg_class="alert-danger";
    }
  
    if (empty($error)) {
$passwordh = md5($password);

  $sql = "SELECT * FROM ADMIN WHERE ADM_MAIL='$mail' AND ADM_PWD='$passwordh' limit 1";
  $results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['fname'] = $fname;
      $_SESSION['success'] = "You are now logged in";
      header('location: ../index.php');
   } }else {
      $msg = "There was an error in the database";
          $msg_class = "alert-danger";
  }
}

  ?>
