 <!--==============================FETCH CASES IN REAL TIME===========================================-->
 
<?php
include("../database/connection.php");

$sql="select * from reported_case where case_status='Submited' or case_status='Viewed' order by date_submited DESC limit 5";
$results=mysqli_query($conn,$sql);

if(mysqli_num_rows($results)>0){
	
	while($row=mysqli_fetch_assoc($results)){
		
		
		echo         '<tr >
                        <td >
                          <p class="title">'.$row['case_id'].'</p>
                          <p class="text-muted">'.$row['case_type'].', '.$row['date_submited'].'</p>
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                            <i class="tim-icons icon-pencil" onclick=openCase("'.$row['case_id'].'")></i>
                          </button>
                        </td>
                      </tr>';
		
	}
	
}
else{
	
	echo "No Submited Cases";
}
	
?>
