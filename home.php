
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Xpend</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
  }
  .bg-2 { 
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 { 
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 { 
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Me</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="run.php">Home</a></li>
        <li><a data-toggle="modal" href="#myModal">Spendings</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="#"><?php session_start(); if(isset($_SESSION['name'])){echo "Hi ".$_SESSION['name']."";}else {echo "no";} ?></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
    <br>
    <br>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <form action="spendrun.php" method="POST">
            <div class="form-group">
            <!--label for="item">Item</label-->
            <select class="form-control" id="month" name="month" required>
                <option value="">Select Month</option>
                <option value="1">Jan</option>
                <option value="2">Feb</option>
                <option value="3">Mar</option>
                <option value="4">Apr</option>
                <option value="5">May</option>
                <option value="6">Jun</option>
                <option value="7">Jul</option>
                <option value="8">Aug</option>
                <option value="9">Sep</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Dec</option>
            </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            </form>
            </div>
            <br>
            <br><br><br><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
    </div>
    <!--MODAL-->
    <div class="col-md-12">
    <div class="col-md-4"><h3>Amount Spent this Month: <?php if(isset($_SESSION['userrs'])){echo $_SESSION['userrs']."";}else {echo "no";} ?></h3></div>
    <div class="col-md-4"></div>
    <div class="col-md-4"><h3>Amount Spent by You: <?php echo $_SESSION['usermoney']; ?> </h3></div>
    </div>
    <br>
    <br>
    <div class="col-md-12">
    <p class="text-center">Enter Your Spending</p>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="insert.php" method="POST">
            <div class="form-group">
            <!--label for="item">Item</label-->
            <select class="form-control" id="item" name="item" required>
                <option value="">Select Item</option>
                <option value="oil">Oil</option>
                <option value="groceries">Groceries</option>
                <option value="wifi">WiFi</option>
                <option value="others">Others</option>
            </select>
            </div>
            <div class="form-group">
                <!--label for="cash">Cash Spent</label-->
                <input type="text" class="form-control" id="cash" placeholder="Amount spent" name="cash" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    </div>
    <br><br><br><br>
    <div class="col-md-12">
    <h3>You have to Pay</h3><h3> <?php echo $_SESSION['pay']. " to Sibi"; ?> </h3>
    </div>
    <br><br>
</div>




</body>
</html>
