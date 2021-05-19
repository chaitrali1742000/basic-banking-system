<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Bank Of Sparks</title>

    <link rel="stylesheet" href="style.css">
  </head>
  <body class="bg-dark"> 

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Bank Of Sparks</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
    
    
    <div class="buttonimg">
        <h1 class="title"><span> Welcome to Bank Of Sparks</span></h1>
        <img src="allef-vinicius-fJTqyZMOh18-unsplash.jpg" height="50%" width="100%">
        
        <div class="btnd d-grid gap-4">
           <a href="viewcustomers.php">
            <button class="btn btn-dark btn-lg" type="button" >View Customers</button>
           </a> 
           <a href="transactionhistory.php">
            <button class="btn btn-dark btn-lg" type="button" >Transfer history</button>
           </a>
        </div>
    </div>
    
    <footer class="text-center mt-5 py-2 bg-dark text-light">
        <p>&copy 2021. A GRIP Project by <b>Chaitrali Mirashi</b> <br> The Sparks Foundation</p>
    </footer>
  </body>
</html>