<?php
session_start();
  $conn = mysqli_connect("localhost", "root", "", "YM");
  $results = mysqli_query($conn, "SELECT * FROM ADMIN WHERE ADM_ID='".$_SESSION['id']."'");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>profile</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-4 offset-md-4" style="margin-top: 30px;">
        <a href="" class="btn btn-success" disabled>Edit profile</a>
        <br>
        <br>
        <table class="table table-bordered">
          <thead>
            <th>Image</th>
            <th>Bio</th>
          </thead>
          <tbody>
            <?php foreach ($users as $user): ?>
              <tr>
  <tr>
                <td> 
  
                  <?php 
  echo '<img width="150" height="150" alt="dp" src="data:image/jpeg;base64,'.base64_encode( $user['ADM_DP'] ).'"/>';
  '</td>';
  ?>

                <td> <?php echo $user['ADM_BIO']; ?> </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>