
<?php
  include("../database/connection.php");
 
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
  $sql="select * from stations_location";
  $results=mysqli_query($conn,$sql);
  $lat1=$_GET['lat'];
  $lon1=$_GET['log'];
  
  session_start();
  $_SESSION['x']=$lat1;
  $_SESSION['y']=$lon1;
  $latitudeFrom=floatval($lat1);
  $longitudeFrom=floatval($lon1);
  while($row=mysqli_fetch_assoc($results)){
	  
	  if(twopoints_on_earth( $latitudeFrom, $longitudeFrom,
                   $row['location_y'],  $row['location_x'])<=15){
             //echo $row['compnt_nm'];
				echo '
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">'.$row['compnt_nm'].' POLICE STATION</h5>
                <h3 class="card-title"><i class="tim-icons icon-square-pin text-primary"></i>('.$row['location_x'].') ('.$row['location_y'].')</h3>
              </div>
              <div class="card-body">
                <div class="chart-area ">
                    <input type="button" value="View Direction" class="btn btn-fill btn-primary"  onclick=run("'.$latitudeFrom.'","'.$longitudeFrom.'","'.$row['location_x'].'","'.$row['location_y'].'","'.$row['compnt_nm'].'")>
					
                </div>
              </div>
            </div>
          </div>
                   ';				
				   }

	  //echo $row['compnt_name'];

	  
  }
 
  
 }



?>
</div>

 <script>
 
 function run(lat1,long1,lat,log,compnt_nm){
	 
   

            window.location.href = "classess/view_map.php?lat1="+lat1+"&lot1="+long1+"&lat2="+lat+"&log2="+log+"&name="+compnt_nm;

} 


 </script>
 

