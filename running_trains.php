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
   
   $train = $_POST['train'];
   $station = $_POST['station'];
   $date = $_POST['date'];

	$get_data = callAPI('GET','https://api.railwayapi.com/v2/live/train/'.$train.'/station/'.$station.'/date/'.date("d-m-Y", strtotime($date)) .'/apikey/mbhiyqtj9i/', false);
	$response = json_decode($get_data, true); ?>
   
     <h2 align="center" style="margin-bottom: 35px;">Live Running Status</h2>
     <div class="container" style="overflow-y: scroll; height: 600px;">
      <table class="table table-bordered" align="center">     
         <tr><th>Journey Station</th><th>Schedule Arrival</th><th>Schedule Departure</th><th>Expected Arrival</th><th>Expected Departure</th><th>Delay</th><th>Status</th></tr>

      <tr>
	   <td><?php echo $response['station']['name']." "."(".$response['station']['code'].")"; ?></td>
	   <td><?php echo $response['status']['scharr']; ?></td>
	   <td><?php echo $response['status']['schdep']; ?></td>
	   <td><?php echo $response['status']['actarr']; ?></td>
	   <td><?php echo $response['status']['actdep']; ?></td>
       <td><?php echo $response['status']['latemin']." "."min"." "."late"; ?></td>
      <?php
      if($response['status']['has_departed'] == 'true')
      { ?>
          <td><?php echo "has departed"; ?></td>
      <?php
      }
      else if($response['status']['has_arrived'] == 'true')
      { ?>
          <td><?php echo "has arrive"; ?></td>
      <?php 
      }
      else
      { ?>
          <td><?php echo "yet to arrive"; ?></td>
      <?php 
      }
      ?>
      </table>

      <table class="table table-bordered" align="center">     
         <tr><th>Last Updated Status</th></tr>
      <tr>
          <td><?php echo $response['position']; ?></td>
      </tr>
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
