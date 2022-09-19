<?php
  session_start();
  include("../database/connection.php");
  if(isset($_GET['id'])){
	  
	  $id=$_GET['id'];
	  $officer_no=$_SESSION['officer_no'];
	  
	  $sql="UPDATE panic_button set police_id='$officer_no',status='onprogress' where id='$id'";
	  mysqli_query($conn,$sql);
	  
  }

?>