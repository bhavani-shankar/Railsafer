<?php
$From=$_POST['From'];
$To=$_POST['To'];
$Subject=$_POST['Subject'];
$Message=$_POST['Message'];

   ini_set("sendmail_from", "$From");  
   $header = "From: $From\r\n";  
  
   $result = mail ($To,$Subject,$Message,$header);  
  
   if( $result == true ){  
      echo "Message sent successfully..."; 
   }else{  
      echo "Sorry, unable to send mail...";  
   }  
?>