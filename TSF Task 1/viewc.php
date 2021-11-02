 <?php
    include 'connection.php';
if(isset($_POST['submit'])){
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];
  echo $to   ,    $from ,   $amount;
    $sql = "SELECT * from user where ID=$from";
    $query1 = mysqli_query($db,$sql);
    $sql1 = mysqli_fetch_array($query1); 

    $sql2 = "SELECT * from user where ID=$to";
    $query2 = mysqli_query($db,$sql2);
    $sql3 = mysqli_fetch_array($query2);



    
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }


  
    
    else if($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")'; 
        echo '</script>';
    }
    


   
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                
                $newbalance = $sql1["Balance"] - $amount;
                $sql4 = "UPDATE user set Balance='$newbalance' where ID=$from";
                mysqli_query($db,$sql4);
                
                $newbalance = $sql3["Balance"] + $amount;
                $sql5 = "UPDATE user set Balance='$newbalance' where ID=$to";
                mysqli_query($db,$sql5);
                
                $sender = $sql1['Name'];
                $receiver = $sql3['Name'];
                $sql6 = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($db,$sql6);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='viewcustomer.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
    }
    $query= "SELECT Name from user where ID=".$_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while ($row = mysqli_fetch_array($result)) {
        $m=$row['Name'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSF BANK | VIEW CUSTOMER</title>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
  <h4><center>Welcome</center></h4>
  <table class="table-responsive table"  style="background-color:linen; border-radius:10px; width:85%; margin-left:50px;">
    <thead>
      <tr>
      <th>ID</th>
        <th>Name</th>
        <th>Account No</th>
        <th>Balance</th>
        <th>Mobile No</th>
        <th>Email</th>
        <th>Password</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $fr2=$_GET['id'];
              $query = "SELECT * FROM user where ID= '$fr2'";
              $result = mysqli_query($db, $query) or die(mysqli_error($db));

              while ($row = mysqli_fetch_assoc($result)) {

                echo '<tr>';
                echo '<td>' . $row['ID'] . '</td>';

                echo '<td>' . $row['Name'] . '</td>';
                echo '<td>' . $row['Account_No'] . '</td>';
                echo '<td>' . $row['Balance'] . '</td>';
                echo '<td>' . $row['Mobile_no'] . '</td>';
                echo '<td>' . $row['Email'] . '</td>';
                echo '<td>' . $row['Password'] . '</td>';
                echo '</tr> ';
              }

              ?>
    </tbody>
  </table>
</div>
<div class="container px-4 px-lg-5" >
  <h3><center>Money Transfer</center></h3>
  <div class="row gx-4 gx-lg-5 align-items-center my-5">
  <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="assets/paydone.png" alt="..." /></div>
  <div class="col-lg-5">
  <form method="post">
  <!-- Email input -->
  <div class="form-group mb-4">
  <label class="form-label" for="name1">Sender's Name :</label>

    <input id="name1" name="name1" class="form-control" value="<?php echo $m; ?>" required/>
  </div>

  <!-- Password input -->
  <div class="form-group mb-2">
  <label class="form-label" for="name2">Receiver's Name :</label>
  <select class="form-control form-control-sm" name="to" id="to" required>
                                    <option value="" disabled selected></option><br><br>
                                    <?php
                                    $sid=$_GET['id'];
                                    $query = "SELECT * FROM user where ID!='$sid'";
                                    $result = mysqli_query($db, $query) or die(mysqli_error($db));

                                    while ($row = mysqli_fetch_assoc($result)) {

                                    ?>
                                        <option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?> </option>

                                    <?php
                                    }
                                    ?>
                         </select>
  </div>

  <div class="form-group mb-4">
  <label class="form-label" for="amt">Amount :</label>

    <input type="number" min="1" id="amount" name="amount" class="form-control" required/>
  </div>
  <button type="submit" name="submit" class="btn btn-primary btn-block">Send Money</button>
</form>
</div>
</div>
</div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
</body>
</html>