<?php
$con=mysqli_connect("localhost","root","","xpend");
//echo $sql="insert into fields set roll_no='$_POST[roll_no]',user_password='$_POST[user_password]'";
$date=date('m');
$select="select * from spending where month(sdate)='$date'";
$store=mysqli_query($con,$select);
$total=0;
while($log=mysqli_fetch_array($store))
{
    $total=$total+$log['amount'];
}
//echo "total". $total;
session_start();
$_SESSION['userrs']=$total;
$select="select * from spending where user='$_SESSION[name]' and month(sdate)='$date'";
$store=mysqli_query($con,$select);
$user=0;
while($log=mysqli_fetch_array($store))
{
    $user=$user+$log['amount'];
}
//echo "user".$user." ";
$_SESSION['usermoney']=$user;
$remain=($total/4)-$user;
//echo $remain;
$_SESSION['pay']=$remain;
header("Location:home.php");
?>