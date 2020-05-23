<?php
session_start();
header('location:login.php');
$con=mysqli_connect('localhost','id11305926_ayush_jain','ayush@0747','id11305926_railway') or die(mysqli_error($con));

$Username=$_POST['UserName'];
$Password=$_POST['Password'];
$Firstname=$_POST['FirstName'];
$Middlename=$_POST['MiddleName'];
$Lastname=$_POST['LastName'];
$Dob=$_POST['DOB'];
$Gender=$_POST['Gender'];
$Occupation=$_POST['Occupation'];
$Adhaar=$_POST['AdhaarNumber'];
$Pan=$_POST['PanNumber'];
$Email=$_POST['Email'];
$Phone=$_POST['Phone'];
$City=$_POST['City'];
$Country=$_POST['Country'];
$Address=$_POST['Address'];

$s="SELECT * FROM register WHERE UserName='$Username'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);

if($num == 1){
	header('location:register.php');
	$_SESSION['num']=$num;
}
else{

$sql="INSERT INTO register (UserName,Password,FirstName,MiddleName,LastName,Gender,DOB,Email,Phone,Occupation,AdhaarNumber,PanNumber,City,Country,Address) values ('$Username','$Password','$Firstname','$Middlename','$Lastname','$Gender','$Dob','$Email','$Phone','$Occupation','$Adhaar','$Pan','$City','$Country','$Address')";

$result=mysqli_query($con,$sql);

}
?>