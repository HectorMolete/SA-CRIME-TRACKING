<?php
include("../database/connection.php");
session_start();


//If Statement To update the Office Live Locations
$officer_no=$_SESSION['officer_no'];

if(isset($_GET['log'])){

  //Getting the Current Office Location
  $lattitude=$_GET['lat'];
  $longitude=$_GET['log'];

  //Updating the officer Locations In a Database
  $sql="UPDATE officer SET latitude='$lattitude',longitude='$longitude' where officer_no='$officer_no'";
  mysqli_query($conn,$sql);
  
  $latitudeFrom=floatval($lattitude);
  $longitudeFrom=floatval($longitude);
   
  //Calculating the distance between two points Function
  
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
	  

    $sql2="select * from panic_button";
    $results=mysqli_query($conn,$sql2);
	  
    while($row=mysqli_fetch_assoc($results)){
	  //Display a Notification if the Officer is near the reported Crime
	  if(twopoints_on_earth( $latitudeFrom, $longitudeFrom,
                   $row['latitude'],  $row['longitude'])<=15){
			         echo "<script>
	
			askForApproval();
			
            function askForApproval() {
                if(Notification.permission === 'granted') {
                    createNotification('Case Reported', ' USER ID: ".$row['id']."', 'https://www.studytonight.com/css/resource.v2/icons/studytonight/st-icon-dark.png');

                }
                else {
                    Notification.requestPermission(permission => {
                        if(permission === 'granted') {
                            createNotification('Case Reported', 'USER ID :".$row['id']."', 'https://www.studytonight.com/css/resource.v2/icons/studytonight/st-icon-dark.png');
                        }
                    });
                }
            }
            
            function createNotification(title, text, icon) {
                const noti = new Notification(title, {
                    body: text,
                    icon
                });
            }
		</script>";
				  }

	  
    }

  
}else{
	  //Display Message if error Message Found
	  echo "<script>cxDialog('Failed <br>Something went wrong');</script>"; 
	  
 }
  
  

?>
