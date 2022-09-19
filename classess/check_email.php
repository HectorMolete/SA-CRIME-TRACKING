<?php
   
   
   //Checking if user is registerd
   include("../database/connection.php");
   
   if(isset($_GET['email'])){
	   
	   $email=$_GET['email'];
	   
	   $sql="select * from user where email_address='$email'";
	   $results=mysqli_query($conn,$sql);
	   if(mysqli_num_rows($results)>0){
		   
		   echo "Already registered";
	   }
	   
	   
   }


?>