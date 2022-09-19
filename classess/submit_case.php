<?php
  include("../database/connection.php");
  if(isset($_GET['user'])){
	  

  $user=$_GET['user'];
  $crime_type=$_GET['crime_type'];
  $station_name=$_GET['station_name'];
  $description=$_GET['description'];
  $case_id=rand(1000,9999);
  $id="CASE-".$case_id;
  $location=$_GET['location'];
  $incident_date=$_GET['incident_date'];
  
  $sql="insert into reported_case(case_id,user_id,police_stationID,case_type,description,incident_date,location) values('$id','$user','$station_name','$crime_type','$description','$incident_date','$location')";
  $results=mysqli_query($conn,$sql);
  if($results){
	  
	 echo "<script>cxDialog('Successfully Submited<br>Case ID is : ".$id."');

	 
	 </script>";
	 
  }
  else{
	  
	  echo "<script>cxDialog('Failed <br>Something went wrong');</script>"; 
	  
  }
  
  
}
  

?>