<?php
 $connect=mysqli_connect('localhost','id11305926_ayush_jain','ayush@0747','id11305926_railway') or die(mysqli_error($con));
 if(isset($_POST["query"]))
 {
 	$output = '';
 	$query = "SELECT * FROM stations WHERE StationName LIKE '%".$_POST["query"]."%' OR StationCode LIKE '%".$_POST["query"]."%'";
 	$result = mysqli_query($connect, $query);
 	$output = '<ul class="list-unstyled">';
 	if(mysqli_num_rows($result) > 0)
 	{
 		while ($row = mysqli_fetch_array($result)) 
 		{
            $output .= '<li class="list-group-item">'.$row["StationName"]." "."(".$row["StationCode"].")".'</li>';			
 		}
 	}
 	else
 	{
 		$output .='<li>Station Not Found</li>';
 	}
 	$output .= '</ul>';
 	echo $output;
 }
 ?>