<?php

$msg = "";
$msg_class = "";
$conn = mysqli_connect("localhost", "root", "", "Dutar");

if(isset($_POST['add_t'])) {
    $topic=$_POST['topic'];
    $topic_desc=$_POST['desc'];
    $admin=$_SESSION['id'];

    $sql_e = "SELECT * FROM topics WHERE topic='$topic'";

    $res_e = mysqli_query($conn, $sql_e);

    if (mysqli_num_rows($res_e) > 0) {
        $msg = "The topic already exists";
        $msg_class = "alert-danger";
    }else{
        $sql = "INSERT INTO topics SET topic='$topic',t_desc='$topic_desc', t_admin='$admin'";

        if(mysqli_query($conn, $sql)){
            $msg = "Topic added successfully";
            $msg_class = "alert-success";

        } else {
            $msg = "An error occurred while adding a tpics";
            $msg_class = "alert-danger";
        }
    }
}

?>
