<?php
$con=mysqli_connect("localhost","root","","xpend");
//echo $sql="insert into fields set roll_no='$_POST[roll_no]',user_password='$_POST[user_password]'";
$name=$_POST['name'];
$pass=$_POST['pass'];
$select="select * from user where name='$_POST[name]' and pass='$_POST[pass]'";
$store=mysqli_query($con,$select);
$log=mysqli_fetch_array($store);
if($name==$log['name']&&($pass==$log['pass']))
{
	
	session_start();
	$_SESSION['name']=$name;
	echo "<script> window.location.href='run.php'; alert('Welcome to Xpend'); </script>";
}
if($name=="admin"&&($pass=="admin"))
{
	header("Location:clear.php");
}
else 
{
	session_start();
	$_SESSION["error"]=1;
	echo "<script> window.location.href='index.html'; alert('Illegal Acess dude'); </script>";
	
}

?>
