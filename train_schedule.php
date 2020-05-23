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
        <?php
           
        $con=mysqli_connect('localhost','id11305926_ayush_jain','ayush@0747','id11305926_railway') or die(mysqli_error($con));
        $number = $_POST['number'];
        
         $sql = "SELECT * FROM train_details WHERE TrainNo = '$number'";
         $result = mysqli_query($con,$sql);
         ?>
            <div class="container" style="margin-top: 20px;">
         <?php
             while($row = mysqli_fetch_assoc($result))
             { ?>
                     <div class="row text-center">
                        <div class="col-lg-12"><h2><?php echo $row['TrainName']."(".$row['TrainNo'].")"; ?></h2></div>
                    </div>
                     <div class="row" style="border: solid 1px black; border-radius: 8px; margin-bottom: 10px;">
                         <div class="col-lg-4">
                             <h3><?php echo $row['TrainName']; ?></h3>
                             <h4><?php echo $row['TrainNo']; ?></h4>
                         </div>
                         <div class="col-lg-2">
                             <h3><?php echo $row['ArrivalTime']; ?></h3>
                             <h3><?php echo $row['SourceStationCode']; ?></h3>
                             <p><?php echo $row['SourceStationName']; ?></p>
                        </div>
                        <div class="col-lg-4 text-center">
                            <br>
                            <h4><?php echo $row['Distance']." KM"; ?></h4>
                            <p>o-------------------------------------o</p>
                        </div>
                         <div class="col-lg-2">
                             <h3><?php echo $row['DepartureTime']; ?></h3>
                             <h3><?php echo $row['DestinationStationCode']; ?></h3>
                             <p><?php echo $row['DestinationStationName']; ?></p>
                         </div>
                     </div>
            <?php }
             ?>
             </div>
    </body>
</html>

