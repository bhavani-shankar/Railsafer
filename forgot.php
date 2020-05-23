<?php
session_start();
$con=mysqli_connect('localhost','id11305926_ayush_jain','ayush@0747','id11305926_railway') or die(mysqli_error($con));

$otp=$_POST['otp'];

$Username=$_SESSION['Username'];
$NewPassword=$_SESSION['NewPassword'];
$Dob=$_SESSION['Dob'];

if($otp == $_SESSION['number']){
  $s = "UPDATE register SET Password='$NewPassword' WHERE UserName='$Username' && Dob='$Dob'";
  $result=mysqli_query($con,$s);
  header('location:login.php');
}
else
{
  header('location:forgot_otp.php');
}
?>

