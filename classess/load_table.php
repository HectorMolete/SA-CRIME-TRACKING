 <!--==============================LOADING REPORTED PANIC BUTTONS IN REAL TIME===========================================-->
 
 <div class='card-header'>
                <h4>PANIC BUTTON NOTIFICATIONS</h4>
              </div>
              <div class='card-body'>
                <div class='table-responsive'>
                  <table class='table tablesorter ' id=''>
                    <thead class='text-primary'>
                      <tr>
                        <th>
                          USER ID
                        </th>
                        <th>
                           COORDINATES
                        </th>
                        <th>
                          VIEW DIRECTION
                        </th>
                        <th class=''text-center'>
                          ACTION
                        </th>
                      </tr>
                    </thead>
					<div>
                    <tbody >
<?php
include("../database/connection.php");

	

       //CALCULATING THE DISTANCE BETWEEN TWO POSITIONS
      function twopoints_on_earth($latitudeFrom, $longitudeFrom,
                                    $latitudeTo,  $longitudeTo)
      {
           $long1 = deg2rad($longitudeFrom);
           $long2 = deg2rad($longitudeTo);
           $lat1 = deg2rad($latitudeFrom);
           $lat2 = deg2rad($latitudeTo);
             
           //Haversine Formula
           $dlong = $long2 - $long1;
           $dlati = $lat2 - $lat1;
             
           $val = pow(sin($dlati/2),2)+cos($lat1)*cos($lat2)*pow(sin($dlong/2),2);
             
           $res = 2 * asin(sqrt($val));
             
           $radius = 3958.756;
             
           return ($res*$radius);
      }
	if(isset($_GET['lat'])){
		
		$lat1=$_GET['lat'];
		$lon1=$_GET['log'];
        $latitudeFrom=floatval($lat1);
        $longitudeFrom=floatval($lon1);
	}
	  
   
    //SELECTING ALL SUBMITED/ACTIVE CASES
    $sql2="select * from panic_button where status='Submited'";
    $results=mysqli_query($conn,$sql2);
	if(mysqli_num_rows($results)>0){ 
    while($row=mysqli_fetch_assoc($results)){
	  if(twopoints_on_earth( $latitudeFrom, $longitudeFrom,
                   floatval($row['latitude']),  floatval($row['longitude']))<=15){
							 echo 
							 "  

 
							 <tr>
                                  <td>
                                    ".$row['id']."
                                  </td>
                                  <td>
                                    ".$row['latitude']." ".$row['longitude']."
                                  </td>
                                  <td>
                                    <a onclick=view_direction('".$row['latitude']."','".$row['longitude']."') style='cursor:pointer'>View Location</a>
                                  </td>
                                  <td>
                                    <a style='cursor:pointer' onclick=attend('".$row['id']."')>Attend</a>
                                  </td>
                                  </tr>
                   
							 ";					   
					   
					   
	       
		   }  
	   
		   
	}
	}else{
          echo "NO ACTIVE CASES FOUND";   //Display not Found
		
	}
	
	
?>
 </tbody>
					</div>
                  </table>
                </div>
              </div>
       </div>

<script>


</script>						 
