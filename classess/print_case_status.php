<?php
  include("../database/connection.php");
  session_start();
  include("../user/sessions.php");
  
  if(isset($_GET['case_no'])){
	  
	  $case_no=$_GET['case_no'];
	  
	  $sql="Select * from reported_case where case_id='$case_no'";
	  $results=mysqli_query($conn,$sql);
	  
	  if($row=mysqli_fetch_assoc($results)){
		  
		   $email=$row['user_id'];
		   $case_type=$row['case_type'];
		   $description=$row['description'];
		   $date=$row['date_submited'];
		   $status=$row['case_status'];
		   $incident_date=$row['incident_date'];
		   $location=$row['location'];
		   
		   if(strtolower($status)!='closed'){
			   
		   }
		   else{
			   $status="Closed";
		   }
		  
	  }
	  
	  $sql2="SELECT * from user where email_address='$email'";
	  $res=mysqli_query($conn,$sql2);
	  
	  while($row2=mysqli_fetch_assoc($res)){
		  
		  $full_name=$row2['first_name']." ".$row2['last_name'];
		  $id_no=$row2['id_number'];
		  
		  $id_no=substr($id_no,0,6)."****".substr($id_no,10,12);
		  
		  
	  }
	  
  }


?>

<!DOCTYPE html>
<html >
  
<head>
    <title>Report</title>
	<style>
       table, th, td {
       border:1px solid black;
     }
    </style>
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
</head>
  
<body>

  <div style="width:100%" id="pr">
    <div style="width:25%;margin:0 auto">
	   <img src="logo.png" style="width:100%">
	</div>
	<div style="display:flex;width:100%">
	     <div style="width:100%;text-align:left">
		    <a>Reported By : <b><?php echo $full_name;?></b></a><br>
			<a>ID Number : <b><?php echo $id_no;?></b></a><br>
		 </div>
	     <div style="width:100%;text-align:right">
		    <a>Date of Report : <b><?php echo $date;?></b></a><br>
			<a>Case No : <b><?php echo $case_no;?></b></a><br>		
            <a>Status : <b><?php echo $status;?></b></a><br>					
		 </div>	
	</div>
	<div>
	   <div style="width:100%;text-align:center;border:1px solid black;margin-top:8%;margin-bottom:20px">
	       <h5>INCIDENT INFORMATION</h5>
	   </div>
	   <div style="width:100%;display:flex">
	      <div style="width:50%">
	        <a>Case Type : <b><?php echo $case_type;?></b></a> 
		  </div>
		  <div style="width:50%;text-align:right">
			<a>Date of Incident <b><?php echo $incident_date;?></b></a><br>
		  </div>
	   </div>  
	   
		 <a>Location : <b><?php echo $location;?></b></a> <br>
		  <a>Description : <b><?php echo $description;?></b></a>
	   
	</div>
	
	<div>
	   <div style="width:100%;text-align:center;border:1px solid black;margin-top:8%;margin-bottom:20px">
	       <h5>ACTION TAKEN</h5>
	   </div>
	   <div style="width:100%">
         <table style="width:100%"> 		
		   <tr>
		     <th>Date</th>
		     <th>Action Taken</th>
			 <th>By</th>
		   </tr>
         </table>	
        </div>		
	</div>
  </div>   

    <script>
        function printpage() {
            window.print();
			
        }
		
		printpage();
    </script>
</body>
  
</html>