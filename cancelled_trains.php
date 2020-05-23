<html>
    <head>
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        
    </body>
</html>
<?php
   
   $date = $_POST['date'];

	$get_data = callAPI('GET','https://api.railwayapi.com/v2/cancelled/date/'.date("d-m-Y", strtotime($date)) .'/apikey/mbhiyqtj9i/', false);
	$response = json_decode($get_data, true); ?>

   
     <h2 align="center" style="margin-bottom: 35px;">Trains Cancelled (<?php echo date("d-m-Y", strtotime($date)) ?>)</h2>
     <div class="container" style="overflow-y: scroll; height: 600px;">
      <table class="table table-bordered" align="center">     
         <tr><th>Train Number</th><th>Train Name</th><th>Train Type</th><th>Source</th><th>Start Time</th><th>Destination</th></tr>

      <?php
      for($j=0; $j<sizeof($response['trains']); $j++)
      { ?>
       <tr>
	   <td><?php echo $response['trains'][$j]['number'] ?></td>
	   <td><?php echo $response['trains'][$j]['name'] ?></td>
	   <td><?php echo $response['trains'][$j]['type'] ?></td>
	   <td><?php echo $response['trains'][$j]['source']['name'] ?></td>
	   <td><?php echo $response['trains'][$j]['start_time'] ?></td>
	   <td><?php echo $response['trains'][$j]['dest']['name'] ?></td>
	   </tr>
      <?php
      } ?>
      </table >
      </div>

    <?php

   function callAPI($method, $url, $data){
   $curl = curl_init();
   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }
   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'APIKEY: 111111111111111111111',
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}
 
?>
