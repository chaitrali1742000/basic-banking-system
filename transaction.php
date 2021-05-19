<?php
    $user = 'root';
    $password = 'Teja@1234';
    $database = 'CUSTOMER_INFO';

    $hostname = 'localhost';
    $mysqli = new mysqli($hostname, $user, $password, $database);

    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno .')'. $mysqli->connect_error);
    }
?>

<?php
    if(isset($_POST['submit']))
    {
        $from = $_GET['Id'];
        $to = $_POST['to'];
        $amount = $_POST['amount'];

        $sql = "SELECT * from viewcustomers where Id=$from";
        $query = mysqli_query($mysqli,$sql);
        $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

        $sql = "SELECT * from viewcustomers where Id=$to";
        $query = mysqli_query($mysqli,$sql);
        $sql2 = mysqli_fetch_array($query);

        // constraint to check input of negative value by user
        if (($amount)<0)
        {
            echo '<script type="text/javascript">';
            echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
            echo '</script>';
        }

        // constraint to check insufficient Balance.
        else if($amount > $sql1['Balance']) 
        {
            echo '<script type="text/javascript">';
            echo ' alert("Sorry! Insufficient Balance")';  // showing an alert box.
            echo '</script>';
        }
    
        // constraint to check zero values
        else if($amount == 0)
        {
            echo "<script type='text/javascript'>";
            echo "alert('Oops! Zero money cannot be transferred')";
            echo "</script>";
        }

        else {
        
            // deducting amount from sender's account
            $newBalance = $sql1['Balance'] - $amount;
            $sql = "UPDATE viewcustomers set Balance=$newBalance where Id=$from";
            mysqli_query($mysqli,$sql);
             
            // adding amount to reciever's account
            $newBalance = $sql2['Balance'] + $amount;
            $sql = "UPDATE viewcustomers set Balance=$newBalance where Id=$to";
            mysqli_query($mysqli,$sql);
            

        
            $sender = $sql1['Customer_name'];
            $receiver = $sql2['Customer_name'];
            $sql = "INSERT INTO transactiontable (sender, receiver, balance) VALUES ('$sender','$receiver','$amount')";
            $query=mysqli_query($mysqli,$sql);

            if($query){
                echo "<script> alert('Transaction Successful');
                        window.location='transactionhistory.php';
                    </script>";
            }

            $newBalance= 0;
            $amount =0;
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/dd9069cf88.js" crossorigin="anonymous"></script>
    <title>Bank Of Sparks</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Bank Of Sparks</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewcustomers.php">View customers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transactionhistory.php">Transfer History</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="details">
       <i class="fas fa-user fa-10x"></i>
       <div class="user">
    <?php

        $user = 'root';
        $password = 'Teja@1234';
        $database = 'CUSTOMER_INFO';

        $hostname = 'localhost';
        $mysqli = new mysqli($hostname, $user, $password, $database);

        if($mysqli->connect_error){
            die('Connect Error (' . $mysqli->connect_errno .')'. $mysqli->connect_error);
        }

        $user=$_GET['Id'];
        $data=mysqli_query($mysqli,"SELECT * FROM viewcustomers WHERE Id='$user'") or die("Query Not Executed");
        while($row = $data->fetch_assoc())
          {
            echo "<p><b class='font-weight-bold'>User ID</b> &nbsp;: ".$row['Id']."</p><br>";
            echo "<p name='sender'><b class='font-weight-bold'>Name&nbsp;&nbsp;</b>&nbsp;&nbsp;: ".$row['Customer_name']."</p><br>";
            echo "<p><b class='font-weight-bold'>Email ID</b> : ".$row['Email_Id']."</p><br>";
            echo "<p><b class='font-weight-bold'>Balance</b>&nbsp; :&nbsp;<b>&#8377;</b> ".$row['Balance']."</p>";
            
          }      
        
      ?>
      </div>
      <br>
     
    </div>
    <hr>
   
    <div class="tr">
            
         
         <form method="post" name="tcredit" class="tabletext" ><br>
         <div class="transferblock text-light">

            <br><br><br>
        

            <label class="text">Transfer To:</label>
            <select name="to" class="form-control" required>
                <option value="" disabled selected>Choose</option>
                <?php
                    $user = 'root';
                    $password = 'Teja@1234';
                    $database = 'CUSTOMER_INFO';
            
                    $hostname = 'localhost';
                    $mysqli = new mysqli($hostname, $user, $password, $database);
            
                    if($mysqli->connect_error){
                        die('Connect Error (' . $mysqli->connect_errno .')'. $mysqli->connect_error);
                    }

                    $sid=$_GET['Id'];
                    $sql = "SELECT * FROM viewcustomers where Id!=$sid";
                    $result=mysqli_query($mysqli,$sql);
                    if(!$result)
                    {
                        echo "Error ".$sql."<br>".mysqli_error($mysqli);
                    }
                    while($rows = mysqli_fetch_assoc($result)) {
                ?>
                <option class="table" value="<?php echo $rows['Id'];?>">
                    <?php echo $rows['Customer_name'] ;?> 
                    (Balance: <?php echo $rows['Balance'] ;?> ) 
                </option>
                <?php 
                    } 
                ?>
            </select>

        
            <br><br>
            <label class="text">Amount:</label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
                    <button class="btn btn-dark btn-lg " name="submit" type="submit" id="myBtn">Transfer</button>
                </div>
            <br><br>
                </div>
                
            <hr>
                
         </form>
        </div>
        <?php
                $user = 'root';
                $password = 'Teja@1234';
                $database = 'CUSTOMER_INFO';
        
                $hostname = 'localhost';
                $mysqli = new mysqli($hostname, $user, $password, $database);
        
                if($mysqli->connect_error){
                    die('Connect Error (' . $mysqli->connect_errno .')'. $mysqli->connect_error);
                }
                if(isset($_POST['submit']))
                {
                    $sid=$_GET['Id'];
                    $sql = "SELECT * FROM  viewcustomers where Id=$sid";
                    $result=mysqli_query($mysqli,$sql);
                    if(!$result)
                    {
                        echo "Error : ".$sql."<br>".mysqli_error($mysqli);
                    }
                    $rows=mysqli_fetch_assoc($result);
                }
            ?>
    </div>
    <footer class="text-center mt-5 py-2 bg-dark text-light">
        <p>&copy 2021. A GRIP Project by <b>Chaitrali Mirashi</b> <br> The Sparks Foundation</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
  </body>
</html>