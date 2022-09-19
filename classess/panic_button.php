<?php
include("../database/connection.php");
session_start();

$_SESSION['id'];



if(isset($_GET['log'])){

  //Innserting data if panic button is pressed
  if(substr($_SESSION['id'],0,1)!='U'){
  $lattitude=$_GET['lat'];
  $longitude=$_GET['log'];
  $user_id=rand(1000,9999);
  $id="USER-".$user_id;
    echo $id;
 
  
  $_SESSION['id']=$id;
  $sql="insert into panic_button(id,latitude,longitude) values('$id','$lattitude','$longitude')";
  $results=mysqli_query($conn,$sql);
  if($results){
	 //Alert Success message 
	 echo "<script>cxDialog('Panic Button Successfully Activated<br>');

	 </script>";
	 
  }

}else{
	
  $lattitude=$_GET['lat'];
  $longitude=$_GET['log'];	
  $id=$_SESSION['id'];



  //If the device or browser already activated panic button pls update it
  $sql="UPDATE panic_button SET latitude='$lattitude',longitude='$longitude' where id='$id'";
  if(mysqli_query($conn,$sql)){
	  
	  $sql2="select * from panic_button where id='$id'";
	  $results2=mysqli_query($conn,$sql2);
	  
	  while($row2=mysqli_fetch_assoc($results2)){
		  //Success message
		  
		  if($row2['police_id']!=""){
		   echo "<script>cxDialog('The Case is being attended by<br>Police officer ID is: ".$row2['police_id']."');
		   	 	  
		   </script>"; 			  
		  }
		  else{
		   echo "<script>cxDialog('Panic Button Activated..Please Do Not Close the Page<br>".$row2['status']."');
		   	 	  
		   </script>"; 
		  }
		   
	  }

  }
}
  
}else{
	  //Error Alert message displayed
	  echo "<script>cxDialog('Failed <br>Something went wrong');</script>"; 
	  
 }
  
  

?>