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
        <li><a data-toggle="modal" href="#myModalsettle">Settle</a></li>
        <li><a data-toggle="modal" href="#myModal">Spendings</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="#"><?php session_start(); if(isset($_SESSION['name'])){echo "Hi ".$_SESSION['name']."";}else {echo "no";} ?></li>
      </ul>
    </div>
  </div>
</nav>
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
            <form action="clearrun.php" method="POST">
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
    <!-- Modal -->
    <div class="modal fade" id="myModalsettle" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <form action="clearrun.php" method="POST">
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
            <button type="submit" class="btn btn-success">Settle</button>
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

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
    <div class="col-md-12">
        <?php
            $con=mysqli_connect("localhost","root","","xpend");
            $month=$_SESSION['month'];
            $query="select * from spending where month(sdate)='$month'";
            $result=mysqli_query($con,$query);
            echo "<div class='table-responsive'>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th class='text-center'>Date</th>
                                <th class='text-center'>Name</th>
                                <th class='text-center'>Item</th>
                                <th class='text-center'>Amount</th>
                            </tr>
                        </thead>
                        <tbody>";
                        $total=0;
                        $giri=0;
                        $arun=0;
                        $sibi=0;
                        $mano=0;
                        $oil=0;
                        while($row=mysqli_fetch_array($result))
                        {
                            $total=$total+$row['amount'];
                            if($row['user']=="giri")
                            {
                                $giri=$giri+$row['amount'];
                            }
                            if($row['user']=="sibi")
                            {
                                $sibi=$sibi+$row['amount'];
                            }
                            if($row['user']=="mano")
                            {
                                $mano=$mano+$row['amount'];
                            }
                            if($row['user']=="arun")
                            {
                                $arun=$arun+$row['amount'];
                            }
                            if($row['item']=="oil")
                            {
                                $oil=$oil+1;
                            }
                            echo "<tr>";
                            echo "<td>".$row['sdate']."</td>";
                            echo "<td>".$row['user']."</td>";
                            echo "<td>".$row['item']."</td>";
                            echo "<td>".$row['amount']."</td>";
                            echo "</tr>";
                        }
                        echo"</tbody>
                    </table>";
        ?>
    </div>
    <div class="col-md-12">
    <h3>Total <?php echo $total;?> </h3>
    <br>
    <h3>Total Oil Packets <?php echo $oil;?> </h3>
    <h3>Giri's Spending <?php echo "  -".$giri;?> </h3>
    <h3>Sibi's Spending <?php echo "  -".$sibi;?> </h3>
    <h3>Arun's Spending <?php echo "  -".$arun;?> </h3>
    <h3>Mano's Spending <?php echo "  -".$mano;?> </h3>
    </div>
    <br><br>
</div>




</body>
</html>
