<?php
session_start();
if(isset($_SESSION['UserName']))
{
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>REGISTER</title>
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
          margin: 4%;
      }
      
      .form-group{
          max-width: 1480px;
          margin: 0 auto;
          background-color: #fff;
          padding: 15px 15px 25px;
          border-radius: 10px;
      }
      
      .form-group-heading{
          margin-bottom: 10px;
          padding-bottom: 10px;
      }
      
      .form-group{
          padding: 10px;
      }
      
      .form-group textarea{
          margin-bottom: 10px;
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
         <li class="nav-item"><a class="nav-link text-dark" href="register.php">Register</a></li>
         <li class="nav-item"><a class="nav-link text-dark" href="login.php">Login</a></li>
    </ul>
  </div>
 </div>
</nav>

<div class="wrapper">
<form class="form-group" action="connection1.php" method="post" onsubmit="validate()">
    <h2 class="form-group-heading text-center">Registration</h2>
    
    <div class="form-group row">
           <label for="inputUsername3" class="col-sm-3 col-form-label"><h6>User Name:</h6></label> 
           <div class="col-md-3">
             <input type="text" class="form-control" id="i1" name="UserName" placeholder="User Name" required="">
           </div>
           
           <label for="inputPassword3" class="col-sm-3 col-form-label"><h6>Password:</h6></label>
           <div class="col-md-3">
            <input type="text" class="form-control" id="i2" name="Password" placeholder="Password" required="">
           </div>
         </div>
         
         <div class="form-group row">
         <label class="col-sm-12 col-form-label bg-success bg-block"><h5><em>Personal Details</em></h5></label>
         </div>
         
         <div class="form-group row">
             <label for="inputName3" class="col-sm-3 col-form-label"><h6>Name:</h6></label> 
           <div class="col-md-3">
             <input type="text" class="form-control" id="i3" name="FirstName" placeholder="First Name" style="margin-bottom: 8px;">
           </div>
           
           <div class="col-md-3">
             <input type="text" class="form-control" name="MiddleName" placeholder="Middle Name" style="margin-bottom: 8px;">
           </div>
           
           <div class="col-md-3">
             <input type="text" class="form-control"  id="i4" name="LastName" placeholder="Last Name" style="margin-bottom: 8px;">
           </div>
          </div>
          
          <div class="form-group row">
            <label for="inputGender3" class="col-sm-3 col-form-label"><h6>Gender:</h6></label> 
              <div class="col-md-3">
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="i5" name="Gender" value="Male">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                 </div>
               </div>
               
               <div class="col-md-3">
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="i5" name="Gender" value="Female">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                 </div>
                </div>
                
                <div class="col-md-3">
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="i5" name="Gender" value="Transgender">
                    <label class="form-check-label" for="inlineRadio2">Transgender</label>
                 </div>
                </div>
          </div>
          
          <div class="form-group row">
              <label for="inputDOB3" class="col-sm-3 col-form-label"><h6>Date of Birth:</h6></label> 
              <div class="col-md-3">
                 <input type="date" class="form-control" placeholder="dd-mm-yyyy" id="i6" name="DOB" required="">
              </div>
           
              <label for="inputEmail3" class="col-sm-3 col-form-label"><h6>Email:</h6></label>
              <div class="col-md-3">
                 <input type="email" class="form-control" placeholder="Email" id="i7" name="Email" required>
              </div>
          </div>
          
          <div class="form-group row">
              <label for="inputPhone3" class="col-sm-3 col-form-label"><h6>Phone:</h6></label> 
              <div class="col-md-3">
                 <input type="number" class="form-control" placeholder="Phone Number" id="i8" maxlength="10" name="Phone">
              </div>
           
              <label for="inputOccupation3" class="col-sm-3 col-form-label"><h6>Occupation:</h6></label>
              <div class="col-md-3">
              <select id="inputOccupation" class="form-control" id="i9" name="Occupation">
                  <option selected>Select-Occupation</option>
                  <option>Goverment</option>
			      <option>Private</option>
		   	      <option>Professional</option>
			      <option>Student</option>
			      <option>Other</option>
             </select>
             </div>
          </div>
          
          <div class="form-group row">
              <label for="inputAdhaar3" class="col-sm-3 col-form-label"><h6>Adhaar Card No:</h6></label> 
              <div class="col-md-3">
                 <input type="number" class="form-control" placeholder="Adhaar Number" id="i10" name="AdhaarNumber">
              </div>
           
              <label for="inputPan3" class="col-sm-3 col-form-label"><h6>Pan Card No:</h6></label>
              <div class="col-md-3">
                 <input type="number" class="form-control" placeholder="Pan Number" id="i11" name="PanNumber">
              </div>
          </div>
          
          <div class="form-group row">
         <label class="col-sm-12 col-form-label bg-success bg-block"><h5><em>Residential Address</em></h5></label>
         </div>
          
          <div class="form-group row">
              <label for="inputCity3" class="col-sm-3 col-form-label"><h6>City:</h6></label> 
              <div class="col-md-3">
                 <input type="text" class="form-control" placeholder="City" id="i12" name="City">
              </div>
           
              <label for="inputCountry3" class="col-sm-3 col-form-label"><h6>Country:</h6></label>
              <div class="col-md-3">
                 <input type="text" class="form-control" placeholder="Country" id="i13" name="Country">
              </div>
          </div>
          
          <div class="form-group row">
              <label for="inputCity3" class="col-sm-3 col-form-label"><h6>Address:</h6></label> 
              <div class="col-md-9">
                <textarea class="form-control" id="i14" name="Address"></textarea>
              </div>
          </div>
          
    
    <button class="btn btn-lg btn-primary btn-block" name="d1">Submit Form</button>

</form>    
</div>

<script type="text/javascript">
	function validate() {
		var a=document.getElementById('i1').value;
		var b=document.getElementById('i2').value;
		var c=document.getElementById('i3').value;
		var d=document.getElementById('i4').value;
		var e=document.getElementById('i5').value;
		var f=document.getElementById('i6').value;
		var g=document.getElementById('i7').value;
		var h=document.getElementById('i8').value;
		var i=document.getElementById('i9').value;
		var j=document.getElementById('i10').value;
		var k=document.getElementById('i11').value;
		var l=document.getElementById('i12').value;
		var m=document.getElementById('i13').value;
		var n=document.getElementById('i14').value;
		if(a==""||b==""||c==""||d==""||e==""||f==""||g==""||h==""||i==""||j==""||k==""||l==""||m==""||n=="")
		{
			alert('Fill All Values');
		}
		else
		{
			alert('You Successfully Registered On RailSafer!');
		}
	}
</script>


</body>
</html>