<?php
include("../database/connection.php");
session_start();

$email=$_SESSION['user'];

$sql="Select * from  reported_case where user_id='$email'";
$results=mysqli_query($conn,$sql);

if(mysqli_num_rows($results)>0){
while($row=mysqli_fetch_assoc($results)){
       if($row['received']==0){
		   
			echo "<script>
	
			askForApproval();
			
            function askForApproval() {
                if(Notification.permission === 'granted') {
                    createNotification('CASE REPORTED STATUS', ' CASE ID: ".$row['case_id']." ".$row['case_status']."', 'https://www.studytonight.com/css/resource.v2/icons/studytonight/st-icon-dark.png');

                }
                else {
                    Notification.requestPermission(permission => {
                        if(permission === 'granted') {
                            createNotification('CASE REPORTED STATUS', 'CASE :".$row['case_id']." ".$row['case_status']."', 'https://www.studytonight.com/css/resource.v2/icons/studytonight/st-icon-dark.png');
                        }
                    });
                }
            }
            
            function createNotification(title, text, icon) {
                const noti = new Notification(title, {
                    body: text,
                    icon
                });
            }
		</script>";
		
	     $sql2="UPDATE reported_case SET received=1 where user_id='$email'";
		 mysqli_query($conn,$sql2);
		
	   }
		
}
}


?>
