<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';


function RandomString($length=50)
{
		 $characters='0123456789QWERTYUIOPASDFGHJKLZXCVBNMqwertyuioasdfghklzxcvbnm';
		 $randString='';
		 $characterslength=strlen($characters);
		 for($i=0;$i<$length;$i++){
			 
			 $randString.=$characters[rand(0,$characterslength-1)];
			 
		 }
		 
		
	  	return $randString;
}


  include("../database/connection.php");
  if($_GET['email']){
	  
	  $id_num=$_GET['id_number'];
	  $email=$_GET['email'];
	  
	  $sql="select * from user where email_address='$email' and id_number='$id_num'";
	  $results=mysqli_query($conn,$sql);
	  
	  if(mysqli_num_rows($results)>0){
		  
		  
		   $code=RandomString();
           $sql="update user SET link='$code' where email_address='$email'";
           if(mysqli_query($conn,$sql)){
	
               $mail = new PHPMailer(true);                            
           try {
             //Server settings
             $mail->isSMTP();                                     
             $mail->Host = 'lim108.truehost.cloud';                      
             $mail->SMTPAuth = true;                             
             $mail->Username = 'info@cgfuneral.co.za';     
             $mail->Password = 'Funeral47@@';             
             $mail->SMTPOptions = array(
               'ssl' => array(
               'verify_peer' => false,
               'verify_peer_name' => false,
               'allow_self_signed' => true
               )
            );                         
             $mail->SMTPSecure = 'ssl';                           
             $mail->Port = 465;                                   

             //Send Email
             $mail->setFrom('noreply@cgfuneral.co.za','SA CRIME TRACKER');
        
             //Recipients
             $mail->addAddress($email);              
        
             //Content
             $mail->isHTML(true);                                  
             $mail->Subject = "Reset Password";
             $mail->Body    = "
							   Please Click on the link below in order to reset Password :<br>
							  http://localhost/SA%20TRACKER%20V1.0/new_password.php?code=".$code."
							  <br><br><br>Kind Regards,<br>
							  <b>SA CRIME TRACKER</b>
							";

              $mail->send();
              echo "<script>cxDialog('Reset Link sent. Please Check your Email Address');</script>"; 
		

    } catch (Exception $e) {
	   $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	   $_SESSION['status'] = 'error';
    }
	
		  
	
		   }  
		  
	  }else{
		  
		  echo "<script>cxDialog('User Details not found');</script>"; 
		  
	  }
	  
  
  
  }



?>