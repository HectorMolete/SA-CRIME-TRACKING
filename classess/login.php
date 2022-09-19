<?php
  include("../database/connection.php");
  session_start();
  if(isset($_GET['email'])){
	  
  //Fetching the User Inputs submitted
  $email=$_GET['email'];
  $password=$_GET['password'];
  
  $email=strtolower($email);
  $encypass=md5($password);
  
  $sql="SELECT status from user where email_address='$email' AND password='$encypass'";
  $results=mysqli_query($conn,$sql);
  
  //Checking if User Exits
  if(mysqli_num_rows($results)>0){
	  
	  $row=mysqli_fetch_array($results);
	  $status=$row['status'];
	  //Checking if the account is activated or not
	  if($status==0){
		  
		  //Display An Error Message
		  echo "<script>cxDialog('Failed <br>Account is not activated. Please check your email in order to activate your account.');</script>"; 
		  
	  }
	  else{
		//Login to the user Dashboard if account is activated  
	    $_SESSION['user']=$email;
	    echo "<script> window.location.href = 'user'</script>";
	  
	  }
  }
  else{
	  //Display An Error Message
	  echo "<script>cxDialog('Failed <br>Wrong Password/Email');</script>"; 
  }
	  
}
  

?>