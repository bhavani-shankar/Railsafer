<?php
session_start();
header('location:contact.php');
$con=mysqli_connect('localhost','id11305926_ayush_jain','ayush@0747','id11305926_railway') or die(mysqli_error($con));

$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Message=$_POST['Message'];

$sql="INSERT INTO contact (Name,Email,Message) values ('$Name','$Email','$Message')";

$result=mysqli_query($con,$sql);
echo "User Registration Sucessfully";


?>