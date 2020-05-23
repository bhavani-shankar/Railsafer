<?php
session_start();

if(! isset($_SESSION['UserName']))
{
	header('location:logout.php');
}

$Username=$_SESSION['UserName'];

$con=mysqli_connect('localhost','id11305926_ayush_jain','ayush@0747','id11305926_railway') or die(mysqli_error($con));

$s="SELECT * FROM register WHERE UserName = '$Username'";
$result=mysqli_query($con,$s);

 while($row = mysqli_fetch_array($result))
  {
    $Password=$row['Password'];
    $Firstname=$row['FirstName'];
    $Middlename=$row['MiddleName'];
    $Lastname=$row['LastName'];
    $Dob=$row['DOB'];
    $Gender=$row['Gender'];
    $Occupation=$row['Occupation'];
    $Adhaar=$row['AdhaarNumber'];
    $Pan=$row['PanNumber'];
    $Email=$row['Email'];
    $Phone=$row['Phone'];
    $City=$row['City'];
    $Country=$row['Country'];
    $Address=$row['Address'];
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>UPADATE</title>
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
      <ul class="navbar-nav ml-auto animated slideInDown">
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
         <?php 
           if(isset($_SESSION['UserName']))
           {
          ?>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle text-dark" href="#" id="navbardrop" data-toggle="dropdown">
          My Account</a>
           <div class="dropdown-menu">
                 <a class="dropdown-item" href="update.php" class="btn-block">Update Profile</a>
                 <a class="dropdown-item" href="change_form.php" class="btn-block">Change Password</a>
           </div>
         </li>
		 <li class="nav-item"><a class="nav-link text-dark" href="logout.php">Logout</a></li>
         <?php
           }
           if(!isset($_SESSION['UserName']))
           {
           ?>
         <li class="nav-item"><a class="nav-link text-dark" href="register.php">Register</a></li>
         <li class="nav-item"><a class="nav-link text-dark" href="login.php">Login</a></li>
           <?php
           }
           ?>
    </ul>
  </div>
 </div>
</nav>

<div class="wrapper">
<form class="form-group" action="update_connection.php" method="POST">
    <h2 class="form-group-heading text-center">Update Profile</h2>
    
    <div class="form-group row">
           <label for="inputUserName3" class="col-sm-3 col-form-label"><h6>User Name:</h6></label> 
           <div class="col-md-3">
             <input type="text" class="form-control" name="UserName" placeholder="User Name" value="<?php echo $Username; ?>" disabled>
           </div>
           
           <label for="inputPassword3" class="col-sm-3 col-form-label"><h6>Password:</h6></label>
           <div class="col-md-3">
            <input type="text" class="form-control" name="Password" placeholder="Password" value="<?php echo $Password; ?>"disabled>
           </div>
         </div>
         
         <div class="form-group row">
             <label for="inputName3" class="col-sm-3 col-form-label"><h6>Name:</h6></label> 
           <div class="col-md-3">
             <input type="text" class="form-control" name="FirstName" placeholder="First Name" value="<?php echo $Firstname; ?>">
           </div>
           
           <div class="col-md-3">
             <input type="text" class="form-control" name="MiddleName" placeholder="Middle Name" value="<?php echo $Middlename; ?>">
           </div>
           
           <div class="col-md-3">
             <input type="text" class="form-control" name="LastName" placeholder="Last Name" value="<?php echo $Lastname; ?>">
           </div>
          </div>
          
          <div class="form-group row">
            <label for="inputGender3" class="col-sm-3 col-form-label"><h6>Gender:</h6></label> 
              <div class="col-md-3">
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Gender" value="male">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                 </div>
               </div>
               
               <div class="col-md-3">
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Gender" value="female">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                 </div>
                </div>
                
                <div class="col-md-3">
                 <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Gender" value="transgender">
                    <label class="form-check-label" for="inlineRadio2">Transgender</label>
                 </div>
                </div>
          </div>
          
          <div class="form-group row">
              <label for="inputDOB3" class="col-sm-3 col-form-label"><h6>Date of Birth:</h6></label> 
              <div class="col-md-3">
                 <input type="date" class="form-control" placeholder="dd-mm-yyyy" name="DOB" value="<?php echo $Dob; ?>">
              </div>
           
              <label for="inputEmail3" class="col-sm-3 col-form-label"><h6>Email:</h6></label>
              <div class="col-md-3">
                 <input type="email" class="form-control" placeholder="Email" name="Email" value="<?php echo $Email; ?>">
              </div>
          </div>
          
          <div class="form-group row">
              <label for="inputPhone3" class="col-sm-3 col-form-label"><h6>Phone:</h6></label> 
              <div class="col-md-3">
                 <input type="number" class="form-control" placeholder="Phone Number" maxlength="10" name="Phone" value="<?php echo $Phone; ?>">
              </div>
           
              <label for="inputOccupation3" class="col-sm-3 col-form-label"><h6>Occupation:</h6></label>
              <div class="col-md-3">
              <select id="inputOccupation" class="form-control" name="Occupation" value="<?php echo $Occupation; ?>">
                  <option>Select-Occupation</option>
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
                 <input type="number" class="form-control" placeholder="Adhaar Number" name="AdhaarNumber" value="<?php echo $Adhaar; ?>">
              </div>
           
              <label for="inputPan3" class="col-sm-3 col-form-label"><h6>Pan Card No:</h6></label>
              <div class="col-md-3">
                 <input type="number" class="form-control" placeholder="Pan Number" name="PanNumber" value="<?php echo $Pan; ?>">
              </div>
          </div>
          
          <div class="form-group row">
              <label for="inputCity3" class="col-sm-3 col-form-label"><h6>City:</h6></label> 
              <div class="col-md-3">
                 <input type="text" class="form-control" placeholder="City" name="City" value="<?php echo $City; ?>">
              </div>
           
              <label for="inputCountry3" class="col-sm-3 col-form-label"><h6>Country:</h6></label>
              <div class="col-md-3">
                 <input type="text" class="form-control" placeholder="Country" name="Country" value="<?php echo $Country; ?>">
              </div>
          </div>
          
          <div class="form-group row">
              <label for="inputCity3" class="col-sm-3 col-form-label"><h6>Address:</h6></label> 
              <div class="col-md-9">
                <textarea class="form-control" name="Address"><?php echo $Address; ?></textarea>
              </div>
          </div>
          
    
         <button class="btn btn-lg btn-primary btn-block">Update</button>
</form>    
</div>

</body>
</html>