<?php
  include("../database/connection.php");
  session_start();
  if(isset($_GET['case_id'])){
      $case_id=$_GET['case_id'];
	  $officer_no=$_SESSION['officer_no'];
	  $sql="update reported_case set case_status='Attended',received=0,police_id='$officer_no' where case_id='$case_id'";
	  if(mysqli_query($conn,$sql)){
		  
		 echo "<script>alert('Docket Successfully Created.');</script>";  
		  
	  }
	  
	  
  }
  

?>