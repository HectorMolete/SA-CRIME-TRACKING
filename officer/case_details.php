<?php

    include_once('../database/connection.php');
    session_start();
	
    $case_id = $_POST['case_id'];
	$officer_no=$_SESSION['officer_no'];
	
	$sql="UPDATE reported_case SET case_status='Viewed',received=0,police_id='$officer_no' where case_id='$case_id' ";
	mysqli_query($conn,$sql);
    
    $sqlResult = mysqli_query($conn, "select * from reported_case where case_id  = '$case_id'");
    
    while($row = mysqli_fetch_array($sqlResult)){
		
		$id=$row['user_id'];
		$sql="select * from user where email_address='$id'";
		$results=mysqli_query($conn,$sql);
		while($name=mysqli_fetch_assoc($results)){
			
			$full_name=$name['first_name']." ".$name['last_name'];
			
		}
        
        ?>
		   <div class="modal-body">
             <table class="modal-table" cellspacing="0" cellpadding="0">
                <tr>
                    <th>CASE ID:&nbsp;&nbsp;</th>
                    <td><?php echo $row['case_id'] ?></td>
                </tr>
                <tr>
                  <th>DATE SUBMITED:&nbsp;&nbsp;</th>
                  <td><?php echo $row['date_submited'] ?></td>
                </tr>
                <tr>
                  <th>FULL NAMES:&nbsp;&nbsp;</th>
                  <td><?php echo strtoupper($full_name); ?></td>
                </tr>
                <tr>
                  <th>LOCATION:&nbsp;&nbsp;</th>
                  <td><?php echo $row['location'] ?></td>
                </tr>
                <tr>
                  <th>CASE TYPE:&nbsp;&nbsp;</th>
                  <td><?php echo $row['case_type'] ?></td>
                <tr>
                  <th>DESCRIPTION:&nbsp;&nbsp;</th>
                  <td><?php echo $row['description'] ?></td>
                </tr>
            </table>   
          </div>			
           
        
        <?php
        
    }

?>

          <div class="modal-footer">
            <button type="button" class="btn btn-fill btn-primary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-fill btn-primary"  data-dismiss="modal" onclick="create_docket('<?php echo $case_id;?>')">Create A Docket</button>
          </div>