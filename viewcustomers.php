<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
              <a class="nav-link " aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="viewcustomers.php">View customers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transactionhistory.php">Transfer History</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <?php
        $user = 'root';
        $password = 'Teja@1234';
        $database = 'CUSTOMER_INFO';

        $hostname = 'localhost';
        $mysqli = new mysqli($hostname, $user, $password, $database);

        if($mysqli->connect_error){
            die('Connect Error (' . $mysqli->connect_errno .')'. $mysqli->connect_error);
        }

        $sql = "SELECT * FROM viewcustomers";
        $result = mysqli_query($mysqli,$sql);
    ?>

    <div class="container">
        <h2 class="text-center pt-4">Transfer Money</h2>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                        <table class="table table-hover table-sm table-striped table-condensed table-bordered ">
                            <thead class="bg-dark">
                                <tr>
                                <th scope="col" class="text-center py-2 text-light">Id</th>
                                <th scope="col" class="text-center py-2 text-light">Name</th>
                                <th scope="col" class="text-center py-2 text-light">E-Mail</th>
                                <th scope="col" class="text-center py-2 text-light">Balance</th>
                                <th scope="col" class="text-center py-2 text-light">-</th>
                                </tr>
                            </thead>
                        <tbody class="customertable">
                            <?php 
                                while($rows=mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td class="py-2 text-light"><?php echo $rows['Id'] ?></td>
                                <td class="py-2 text-light"><?php echo $rows['Customer_name']?></td>
                                <td class="py-2 text-light"><?php echo $rows['Email_Id']?></td>
                                <td class="py-2 text-light"><?php echo $rows['Balance']?></td>
                                <td class="text-center"><a href="transaction.php?Id= <?php echo $rows['Id'] ;?>"> <button type="button" class="btn1 btn-lg text-dark">Select</button></a></td> 
                            </tr>
                            <?php
                                }
                            ?>
            
                        </tbody>
                        </table>
                    </div>
                </div>
            </div> 
    </div>
    <footer class="text-center mt-5 py-2">
        <p>&copy 2021. A GRIP Project by <b>Chaitrali Mirashi</b> <br> The Sparks Foundation</p>
    </footer>    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 

    

  </body>
</html>
