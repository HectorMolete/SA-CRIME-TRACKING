<?php
  include("../database/connection.php");
  session_start();
  if(isset($_GET['officer_no'])){
	  
  //Fetching the data ffrom the officer login inputs field
  $officer_no=$_GET['officer_no'];;
  $password=$_GET['password'];
  
  //Used for encrypting Password
  $encypass=md5($password);
  
  //Check if the Officer Entered Correct Login Details
  $sql="SELECT * from officer where officer_no='$officer_no' AND password='$encypass'";
  $results=mysqli_query($conn,$sql);
  
  if(mysqli_num_rows($results)>0){
	  //Login to officer Dashboard if passwords are correct
	  $_SESSION['officer_no']=$officer_no;
	  echo "<script> window.location.href = 'officer'</script>";
  }
  else{
	  //Display Error if wrong password or email address Entered
	  echo "<script>cxDialog('Failed <br>Wrong Officer No/Password');</script>"; 
  }
	  
  }
  

?>