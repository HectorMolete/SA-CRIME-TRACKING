<?php
  include("../database/connection.php");
  session_start();
  $email=$_SESSION['user'];
  if(isset($_GET['mobile_no'])){

    $mobile_no=$_GET['mobile_no'];
    $address=$_GET['address'];
    $first_name=$_GET['first_name'];
    $last_name=$_GET['last_name'];
	



    $sql="UPDATE user SET first_name='$first_name',last_name='$last_name',address='$address',phone_number='$mobile_no' where email_address='$email'";
    if(mysqli_query($conn,$sql)){


      echo "<script>cxDialog('Profile Succefully updated');</script>"; 
	  
	  $sql2="SELECT * from user where email_address='$email'";
	  $results=mysqli_query($conn,$sql2);
	  
	  while($row=mysqli_fetch_assoc($results)){
		  
	    $first_name=strtoupper($row['first_name']);
	    $last_name=strtoupper($row['last_name']);
	    $id_no=$row['id_number'];
	    $email=$row['email_address'];
	    $phone_no=$row['phone_number'];
	    $province=$row['province'];
	    $date=$row['date_registered'];
	    $address=$row['address'];		  
		  
	  }
	  
	   echo $first_name." ".$last_name;
	  

	  
	}	

   else{
     echo "<script>cxDialog('Something went wrong (error:user_profile)');</script>"; 
   }	   
	  
	  
  }
  

  
?>

