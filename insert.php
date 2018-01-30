<?php
$con=mysqli_connect("sql208.byethost3.com","b3_21502205","girigiri","b3_21502205_xpend");
//echo $_POST['item'];
//echo $sql="insert into fields set roll_no='$_POST[roll_no]',user_password='$_POST[user_password]'";
session_start();
$date=date('Y-m-d');
$select="INSERT INTO spending VALUES ('$date','$_SESSION[name]', '$_POST[item]', $_POST[cash]);";
if($store=mysqli_query($con,$select))
{
    echo "<script> window.location.href='run.php'; alert('Spending Added'); </script>";
}
else {
    echo "insertion error bro";
}

?>
