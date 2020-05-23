<?php

session_start();

$con=mysqli_connect('localhost','id11305926_ayush_jain','ayush@0747','id11305926_railway') or die(mysqli_error($con));

$Username=$_POST['UserName'];
$Password=$_POST['Password'];

$s="SELECT * FROM register WHERE UserName = '$Username' && Password = '$Password'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);

if($num == 1){
	$_SESSION['UserName'] = $Username;
    header('location:index.php');
}
else{
    header('location:login.php');
}
?>
