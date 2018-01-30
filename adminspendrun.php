<?php
session_start();
$_SESSION['month']=$_POST['month'];
header("Location:admin.php");
?>