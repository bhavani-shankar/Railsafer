<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Railway Reservation</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style type="text/css">

		.a{
			height: 100%;
			width: auto;
			background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url("rail1.jpg");
			background-position: center;
			background-size: cover;
			animation:slider 10s infinite linear;
		}

		@keyframes slider{
			0%{
			  background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url("rail1.jpg");	
			}
			33%{
				background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url("rail4.jpg");
			}
			67%{
				background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url("rail5.jpg");
			}
		}
		
		.nav-item{
          margin-right: 10px;
      }

       .name{
        font-weight: lighter;
       	font-size: 60px;
       	font-family: arial;
       	color: white;
       	text-align: center;
       	padding: 18% 0% 18% 0%;
       }
       
       .container .row .col{
           padding-bottom: 20px;
       }
       
       .book input[type="text"], input[type="date"], select
       {
       	padding: auto;
       }
       
       .form-group label{
           font-size: 18px;
           font-weight: lighter;
           font-family: arial;
       }
       #StationList2 ul{
           height: 50px;
           z-index: 1000;
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

	<section class="a">
		<div class="name">
		<h1 style="font-family:arial;">Welcome To</h1>
		<h4>"Indian Railways"</h4>
	    </div>
	</section>
	
	<section class="b border border-primary" style="margin: 0% 0% 3% 0%; padding: 1% 0% 2% 0%;">
	     <div class="container bg-white">
	    <form action="trainsbetweenstation.php" method="post">
	        <div class="form-group row" style="margin-bottom: 3%;;">
	        <h3 class="col" align="center" style="font-family: cursive;">Book Your Journey Ticket</h3>
	        </div>
	        
         <div class="form-group row">
           <label for="inputCity3" class="col-sm-3 col-form-label">From City:</label> 
           <div class="col-md-3">
             <input type="text" class="form-control" id="Station1" name="FromName" placeholder="From" autocomplete="off">
           </div>
           
           <label for="inputCity3" class="col-sm-3 col-form-label">To City:</label>
           <div class="col-md-3">
            <input type="text" class="form-control" id="Station2" name="ToName" placeholder="To" autocomplete="off">
           </div>
         </div>
         
         <div class="form-group row">
             <label for="inputDate3" class="col-sm-3 col-form-label">Journey Date:</label> 
           <div class="col-md-3">
             <input type="date" class="form-control"  placeholder="" value="<?php echo date('Y-m-d'); ?>">
           </div>
           
           <label for="inputClass3" class="col-sm-3 col-form-label">Journey Class:</label> 
           <div class="col-md-3">
            <select id="inputState" class="form-control">
               <option selected>Sleeper Class</option>
			   <option>Executive Class</option>
		   	   <option>Second AC</option>
			   <option>Third AC</option>
			   <option>3 AC Economy</option>
			   <option>First AC</option>
			   <option>AC Chair Car</option>
			   <option>Second Seating</option>
            </select>
           </div>
          </div>
           
           <div class="form-group row">
           <label for="inputPassenger3" class="col-sm-3 col-form-label">Number of Passengers:</label> 
           <div class="col-md-3">
             <select id="inputAdult" class="form-control" style="margin-bottom: 8px;">
                <option selected>Adults</option>
              	<option>1</option>
              	<option>2</option>
              	<option>3</option>
              	<option>4</option>
              	<option>5</option>
              	<option>6</option>
             </select>
           </div>
           
           <div class="col-md-3">
             <select id="inputChild" class="form-control" style="margin-bottom: 8px;">
                <option selected>Childs</option>
              	<option>1</option>
              	<option>2</option>
              	<option>3</option>
              	<option>4</option>
              	<option>5</option>
              	<option>6</option>
             </select>
           </div>
           
           <div class="col-md-3">
             <select id="inputInfant" class="form-control" style="margin-bottom: 8px;">
                <option selected>Infants</option>
              	<option>1</option>
              	<option>2</option>
              	<option>3</option>
              	<option>4</option>
              	<option>5</option>
              	<option>6</option>
             </select>
           </div>
           
         </div>
         <button type="submit" class="btn btn-primary btn-block">Search Ticket</button>
        </form>
        </div>
	</section>

	<section>
	  <div class="form-group row" style="margin: 3% 0% 3% 0%;">
	        <h3 class="col-12" align="center" style="font-family: cursive;">Tours and Packages</h3>
	  </div>
	        
	<div class="container">
	    <div class="row">
	        <div class="col-md-6 col-lg-4 mb-3">
	            <div class="card">
	                <img class="card-img-top" src="t3.jpg" height="170">
	                <div class="card-body">
	                    <h4 class="card-title">Manali Mountains Tour</h4>
	                    <p class="card-text" align="justify">Manali is a picturesque hillstation situated along the banks of the river beas and close to the snows of Himalayas. The scenery at Manali is picture perfect: glacier topped Himalayas looking down on lush, grassy valleys and forests of the valley. For long, Manali was a well hidden hippie Shangri-La ignored by mainstream tourists. All that changed when insurgency rendered Kashmir Valley inaccessible to tourists. Manali replaced Kashmir as the most popular destination for honeymooners and for those wanting to indulge in snow play.</p>
	                </div>
	            </div>
	        </div>
	         <div class="col-md-6 col-lg-4 mb-3">
	            <div class="card">
	                <img class="card-img-top" src="t8.jpg" height="170">
	                <div class="card-body">
	                    <h4 class="card-title">International Tour</h4>
	                    <p class="card-text" align="justify">The 35,000-square-metre Nan Lian Garden built in the Tang dynasty (618–907) style is made beautiful by its characteristic timber structures, water ponds, unusually shaped rocks and valuable old trees. The whole park has been artfully arranged to imitate nature and by following its one-way circular route, visitors will find new splendours unfold with every step. You can time this trip with lunch too if you like, as there is also a vegetarian restaurant here with delicious fare provided by the adjacent Chi Lin Nunnery.</p>
	                </div>
	            </div>
	        </div>
	         <div class="col-md-6 col-lg-4 mb-3">
	            <div class="card">
	                <img class="card-img-top" src="t7.jpg" height="170">
	                <div class="card-body">
	                    <h4 class="card-title">Buddhist Tourist Tour</h4>
	                    <p class="card-text" align="justify">Bodhgaya is the famous sites situated in eastern India associated with birth of Buddhism around 2500 years ago. The Maha Bodhi Temple was originally built more than 250 years ago, but it has been restored many times since then. Images of Buddha can be found in the niche carvings of walls and numerous shrines and stupa that surround the temple. These images manifest the Buddhist presence and communicate his teachings. The spiritual and artistic legacy of Buddhism has spread through east and south East Asia.</p>
	                </div>
	            </div>
	        </div>
	    </div>
	  </div>
	  
	  <div class="container">  
	    <div class="row">
	        <div class="col-md-6 col-lg-4 mb-3">
	            <div class="card">
	                <img class="card-img-top" src="t2.jpg" height="170">
	                <div class="card-body">
	                    <h4 class="card-title">Vaishno Devi Tour</h4>
	                    <p class="card-text" align="justify">A famous cave shrine situated in the Trikuta Mountains; Vaishno Devi is one of the sacred shrines devoted to Goddess Shakti. Devotees have to get off at Katra, from where the journey to the temple starts. On Vaishno Devi yatra constant reciting of “Jai Mata Di” creates picturesque atmosphere with refreshing energies among pilgrims. It is believed that one’s desires get fulfilled by visiting the temple of Goddess Vaishno Devi. The main attraction of the tour is ardh Kuwari where Mata Vaishno Devi is said to have worshipped Lord Shiva in Garbha joon cave for about nine months.</p>
	                </div>
	            </div>
	        </div>
	         <div class="col-md-6 col-lg-4 mb-3">
	            <div class="card">
	                <img class="card-img-top" src="t5.jpg" height="170">
	                <div class="card-body">
	                    <h4 class="card-title">Luxury Train Express</h4>
	                    <p class="card-text" align="justify">Luxury trains are designed to offer a very comfortable ride and evoke an association with history and heritage. Operating in several countries, they are a premium travel option. Although some luxury trains promote tourism in destinations across a continent, others (such as the Maharajas' Express) take passengers on a long. Luxury train travel has become popular, and its proponents cite several advantages over air travel. Although air travel can be monotonous, passengers on a luxury train can see the local environment, and a myriad of colors during their travels.</p>
	                </div>
	            </div>
	        </div>
	         <div class="col-md-6 col-lg-4 mb-3">
	            <div class="card">
	                <img class="card-img-top" src="t6.jpg" height="170">
	                <div class="card-body">
	                    <h4 class="card-title">Tirupati Balaji Tour</h4>
	                    <p class="card-text" align="justify">The hill of Tirumala opens a gateway to the famous Tirupati Balaji temple. Also known as Sri Venkateshwara Swami temple is the richest temple and gets donation from the pilgrims. People have donated a lot of money here out of their sheer devotion for their god. Mythology says that Lord Vishnu manifested himself in this temple in order to guide people in Kalyuga. Hence another name for this temple is Bholuka Vaikuntam, which means the abode of Vishnu on the earth, and Lord Balaji is also called Kaliyuga Pratyaksha Daivam, literal meaning of which the manifestation of Lord of Kali age.</p>
	                </div>
	            </div>
	        </div>
	    </div>
	  </div>
	</section>

<section>
    <div class="embed-responsive embed-responsive-21by9">
    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30711058.692950357!2d64.4487244350266!3d20.012353286203783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1572617867330!5m2!1sen!2sin" width="200" height="200" frameborder="0" style="border:0;"></iframe>
</div>
</section>

<footer>
    <div class="jumbotron bg-dark text-center" style="margin-bottom:0; border-radius: 0px;">
     <h4 class="col-12" align="center" style="font-family: cursive; color: white;">Developed By @Poornimites</h4>
     <div class="container text-white">
         <div class="d-inline"><a href="index.php" class="text-white" style="text-decoration: none;">Home</a></div>
         <div class="d-inline">|</div>
         <div class="d-inline"><a href="pnr.php" class="text-white" style="text-decoration: none;">PNR Enquiry</a></div>
         <div class="d-inline">|</div>
         <div class="d-inline"><a href="running.php" class="text-white" style="text-decoration: none;">Running Status</a></div>
         <div class="d-inline">|</div>
         <div class="d-inline"><a href="schedule.php" class="text-white" style="text-decoration: none;">Train Schedule</a></div>
         <div class="d-inline">|</div>
         <div class="d-inline"><a href="seat.php" class="text-white" style="text-decoration: none;">Seat Availability</a></div>
         <div class="d-inline">|</div>
         <div class="d-inline"><a href="contact.php" class="text-white" style="text-decoration: none;">Contact Us</a></div>
         
         <p>
         <div class="d-inline"><a href="#"><img src="facebook.png" height="40" width="40" style="border-radius: 50px;"></a></div>
         <div class="d-inline"><a href="#"><img src="twitter.png" height="40" width="40" style="border-radius: 50px;"></a></div>
         </p>
         
         <p>
         Copyright © RailSafer. All Rights Reserved | Contact Us: +91 8949887210,+91 7623914617
         </p>
     </div>
    </div>
</footer>
</body>
</html>
