<?php
session_start();
if(! isset($_SESSION['UserName']))
{
	header('location:logout.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CHANGE PASSWORD</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
	<style type="text/css">
      
      .nav-item{
          margin-right: 10px;
      }
      
      body{
          background-color: #eee;
      }
      
      .wrapper{
          margin: 8%;
      }
      
      .form-signin{
          max-width: 380px;
          margin: 0 auto;
          background-color: #fff;
          padding: 15px 20px 30px;
          border: 1px solid #e5e5e5;
          border-radius: 10px;
      }
      
      .form-signin, .form-signin-heading, .ab{
          margin-bottom: 35px;
      }
      
      .form-signin input[type="text"], .form-signin input[type="password"],.form-signin input[type="date"]{
          margin-bottom: 25px;
      }
      
      .form-signin .form-control{
          padding: 10px;
      }
      
	</style>
</head>
<body>
    
	<nav class="navbar navbar-expand-md navbar-light bg-white sticky-top">
	    <div class="container-fluid">
       <a class="navbar-brand" href="#"><img src="logo1.png" width="90" height="30"></a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
         <li class="nav-item"><a class="nav-link text-dark" href="index.php">Home</a></li>
         <li class="nav-item"><a class="nav-link text-dark" href="pnr.php">PNR Enquiry</a></li>
         <li class="nav-item"><a class="nav-link text-dark" href="running.php">Running Status</a></li>
         <li class="nav-item"><a class="nav-link text-dark" href="schedule.php">Train Schedule</a></li>
         <li class="nav-item"><a class="nav-link text-dark" href="seat.php">Seat Availablity</a></li>
          <?php 
           if(isset($_SESSION['UserName']))
           {
          ?>
         <li class="nav-item"><a class="nav-link text-dark" href="#">Welcome, <b style="color: blue;"><?php echo $_SESSION['UserName']; ?></b></a></li>
         <?php
           }
         ?>
          <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle text-dark" href="#" id="navbardrop" data-toggle="dropdown">
          More</a>
           <div class="dropdown-menu">
                 <a class="dropdown-item" href="#" class="btn-block">Fare Enquiry</a>
                 <a class="dropdown-item" href="cancelled.php" class="btn-block">Trains Cancelled</a>
                 <a class="dropdown-item" href="live_station.php" class="btn-block">Live Station</a>
                 <a class="dropdown-item" href="reschedule.php" class="btn-block">Rescheduled Trains</a>
           </div>
         </li>  
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle text-dark" href="#" id="navbardrop" data-toggle="dropdown">
          My Account</a>
           <div class="dropdown-menu">
                 <a class="dropdown-item" href="update.php" class="btn-block">Update Profile</a>
           </div>
        </li>
		 
		 <li class="nav-item"><a class="nav-link text-dark" href="logout.php">Logout</a></li>
    </ul>
  </div>
 </div>
</nav>

<div class="wrapper">
<form class="form-signin" action="change.php" method="post" onsubmit="validate()">
    
    <h2 class="form-signin-heading text-center">Change Password</h2>
    <input type="text" class="form-control" name="Password" placeholder=" Old Password" required="" autofocus="">
    <input type="text" class="form-control" name="NewPassword" id="p1" placeholder=" New Password" required="" autofocus="">
    <input type="text" class="form-control" name="ConfirmPassword" id="p2" placeholder=" Confirm Password" required="" autofocus="">
    
    <button class="btn btn-lg btn-primary btn-block">Change</button>
    
</form>    

<script type="text/javascript">
	function validate() {
		var x=document.getElementById('p1').value;
		var y=document.getElementById('p2').value;
		if(x!=y)
		{
			alert('Confirm Password does not match');
		}
		else
		{
			alert('You Password is Sucessfully Changed!');
		}
	}
</script>

</div>

</body>
</html>