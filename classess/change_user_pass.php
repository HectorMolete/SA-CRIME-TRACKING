<?php
   include("../database/connection.php");
   session_start();
   
   $email=$_SESSION['user'];
   if($_GET['old_password']&&$_GET['new_password']&&$_GET['confirm']){
	   
	   $old_password=$_GET['old_password'];
	   $old=md5($old_password);
	   
	   $new=$_GET['new_password'];
       $encrypted_pass=md5($new);
	   
	   

	   
	      $sql="select * from user where email_address='$email' and password='$old'";
	      $results=mysqli_query($conn,$sql);
	      if(mysqli_num_rows($results)>0){
		      
	             $sql2="update user set password='$encrypted_pass' where email_address='$email'";
				 if(mysqli_query($conn,$sql2)){
					 
					  echo "<script>cxDialog('Password Updated');</script>";   
				 }
			  
		     
	         }else{
		   
		         echo "<script>cxDialog('Wrong old Password Entered');</script>";   
	        }
	   
   }else{
	   
	   echo "<script>cxDialog('Please fill all required fields');</script>";  
   }

?>