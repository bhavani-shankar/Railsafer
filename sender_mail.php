<?php
session_start();

$From=$_POST['From'];
$To=$_POST['To'];
$Subject=$_POST['Subject'];
$Message=$_POST['Message'];

   ini_set("sendmail_from", "$From");  
   $header = "From: $From\r\n";  
   $result = mail ($To,$Subject,$num,$header);  
  
?>

<!DOCTYPE html>
<html>
<head>
	<title>MAIL</title>
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
      
      .form-signin input[type="text"], input[type="email"],textarea{
          margin-bottom: 25px;
      }
      
      .form-signin .form-control{
          padding: 10px;
      }
      
	</style>
</head>
<body>

<div class="wrapper">
<form class="form-signin" action="" method="post">
    
    <h2 class="form-signin-heading text-center">Mail</h2>
    <input type="email" class="form-control" id="i1" name="From" placeholder=" From" required="" autofocus="">
    <input type="email" class="form-control" id="i1" name="To" placeholder=" To" required="" autofocus="">
    <input type="text" class="form-control" id="i1" name="Subject" placeholder=" Subject" required="" autofocus="">
    <textarea class="form-control" name="Message" placeholder=" Message"></textarea>
    <button class="btn btn-lg btn-primary btn-block" id="d1" name="d1">Send</button><hr>
    <?php
      if(isset($_POST['d1']))
      {
      if( $result == true ){  
        echo "<h5>"."Message sent successfully..."."</h5>"; 
      }
      else{  
        echo "<h5>"."Sorry, unable to send mail..."."</h5>";  
      }
      }
    ?>
</form>    
</div>

</body>
</html>