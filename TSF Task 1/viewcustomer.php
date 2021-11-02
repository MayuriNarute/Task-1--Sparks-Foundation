<?php

include('connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TSF BANK | VIEW CUSTOMERS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  </head>

  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body style="background-color:skyblue">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="#!">TSF Bank</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="viewcustomer.php">View Customers</a></li>
                        <li class="nav-item"><a class="nav-link" href="transacHistory.php">History</a></li>
                    </ul>
                </div>
            </div>
        </nav> 
<br><br>
<div class="container">
  <h3><center>All Customers</center></h3>
  <table class="table-hover table-responsive table-bordered table"  style="background-color:linen;border-radius:10px;width:100%;">
    <thead>
      <tr>
      <th>ID</th>
        <th>Name</th>
        <th>Account No</th>
        <th>Balance</th>
        <th>Mobile No</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
              $query = 'SELECT * FROM user';
              $result = mysqli_query($db, $query) or die(mysqli_error($db));

              while ($row = mysqli_fetch_assoc($result)) {

                echo '<tr>';
                echo '<td>' . $row['ID'] . '</td>';

                echo '<td>' . $row['Name'] . '</td>';
                echo '<td>' . $row['Account_No'] . '</td>';
                echo '<td>' . $row['Balance'] . '</td>';
                echo '<td>' . $row['Mobile_no'] . '</td>';
                echo '<td>' . $row['Email'] . '</td>';

                echo ' <td><a  type="button" class="btn btn-sm py-1  btn-primary" href="viewc.php? id='.$row['ID'] . '"> VIEW / SEND MONEY</a> ';
                echo '</tr> ';
              }

              ?>
    </tbody>
  </table>
</div>
<footer class="py-5" style="background-color: black;">
      <div class="container px-4 px-lg-5">
        <p class="m-0 text-center text-white">
          Copyright &copy; TSF Bank Website 2021<br><br>
          Designed By : <a>Mayuri Narute</a><br><br>
          <div class="col-xs-12 text-center">
            <div class="social-media-icons col-xs-12">
                    <ul class="list-inline col-xs-12">
                      <a style="color:white;" href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                      <a style="color:white;" href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                      <a style="color:white;" href="#"><i class="fa fa-youtube-square fa-2x"></i></a>
                      <a style="color:white;" href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>   
                      <a style="color:white;" href="#"><i class="fa fa-facebook-square fa-2x"></i></a>              
                    </ul>
                  </div>
         
        </p>
        
    </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
</body>
</html>