<?php
$msg_p = "";
$msg_class = "";
$conn = mysqli_connect("localhost", "root", "", "dutar");
if (isset($_POST['ch_pass'])) {

    // for the database
$o_pass=$_POST['o_pass'];
$n_pass=$_POST['n_pass'];
    $c_npass=$_POST['c_npass'];
 $admin=$_SESSION['user'];
$hash_opass=password_hash($o_pass,PASSWORD_DEFAULT);


    $sql_e = "SELECT * FROM admin WHERE a_mail='$admin'";

//    $res_e = mysqli_query($conn, $sql_e);

    $res_e = $conn->query($sql_e);

    // check if passwords match
if ($res_e->num_rows == 1) {
$row = $res_e->fetch_array(MYSQLI_ASSOC);
if ($hash_opass==$row['a_pass']) {


    if($n_pass!== $c_npass) {
        $msg="Passwords mismatch";
        $msg_class="alert-danger";
    }elseif ($n_pass== $c_npass) {

        if (mysqli_num_rows($res_e) > 0) {
            $msg = "Wrong Old Password";
            $msg_class = "alert-danger";
        }else{
            $hash = password_hash($n_pass, PASSWORD_DEFAULT);




            // Upload image only if no errors
            if (empty($error)) {

                $sql = "UPDATE admin SET a_pass='$hash'";
                if(mysqli_query($conn, $sql)){
                    $msg = "Password changed Successfully";
                    $msg_class = "alert-success";
                } else {
                    $msg = "There was an error in the database";
                    $msg_class = "alert-danger";
                }
            } }}}}}

?>
