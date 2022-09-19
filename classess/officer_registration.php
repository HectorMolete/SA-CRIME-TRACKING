<?php
  include("../database/connection.php");
  if(isset($_GET['officer_id'])){
	
  //Fetch all inputs data from officer Registeration form	
  $officer_id=$_GET['officer_id'];
  $email=$_GET['email'];
  $phone_number=$_GET['phone_number'];
  $address=$_GET['address'];
  $password=$_GET['password'];
  
  //Encrypting Password before inserting to a Database
  $encypass=md5($password);
  $sql2="SELECT * from officer where officer_no='$officer_id' OR email='$email'";
  $results=mysqli_query($conn,$sql2);
  
  if(mysqli_num_rows($results)>0){
	  
	  echo "<script>cxDialog('Error : Officer Already Registered');</script>"; 
	  
  }
  else{
  
  //Insert Registeration Details inside the database
  //Fetch if officer no is available
  
  $sql3="SELECT * from police_officer where officer_no='$officer_id' ";
  $res3=mysqli_query($conn,$sql3);
  
  if(mysqli_num_rows($res3)){
  
  $sql="insert into officer(officer_no,province,home_address,email,phone_number,password,station_id) values('$officer_id','$province','$address','$email','$phone_number','$encypass','$station_id')";
  if(mysqli_query($conn,$sql)){
	  //Display a Success Meesgae
	  echo "<script>cxDialog('Successfully Registered');</script>";
  }
  else{
	  
	 //Display Error Message if something went wrong
	  echo "<script>cxDialog('Failed <br>Something went wrong');</script>"; 
  }
  }
  else{
	  
	  echo "<script>cxDialog('Failed <br>Officer No Not Found');</script>";  
  }
  
  
  }
  
  }
  
?>