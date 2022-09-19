
<?php
  include("../database/connection.php");
  session_start();
  $email=$_SESSION['user'];
  if(isset($_GET['case_no'])){

    $case_no=$_GET['case_no'];
	



    $sql="UPDATE reported_case SET case_status='Canceled' where case_id='$case_no'";
    if(mysqli_query($conn,$sql)){


     
	  
  }
  
  }
  

  
?>

