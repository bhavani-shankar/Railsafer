<?php
$con=mysqli_connect('localhost','id11305926_ayush_jain','ayush@0747','id11305926_railway') or die(mysqli_error($con));

$Password=$_POST['Password'];
$NewPassword=$_POST['NewPassword'];

$s="SELECT * FROM register WHERE Password='$Password'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);

if($num == 0){
	header('location:change_form.php');
}
else
{
  $s = "UPDATE register SET Password='$NewPassword' WHERE Password='$Password'";
  $result=mysqli_query($con,$s);
  header('location:login.php');
}
?>