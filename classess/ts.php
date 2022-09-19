<?php
  include("../database/connection.php");
  
  
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
  $code=RandomString();
	
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
        $mail->addAddress('ikesambo47@gmail.com');              
        
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = "Confirm your account";
        $mail->Body    = "
                              Hi <br><br>
							  <b>Please confirm your email address.</b><br><br><br>
							  Welcome to SA CRIME TRACKER , Please confirm your email address by clicking this link below :<br>
							  http://localhost/SA%20TRACKER%20V1.0/activate_account.php?code=".$code."
							  <br><br><br>Kind Regards,<br>
							  <b>SA CRIME TRACKER</b>
							";

        $mail->send();

		echo "sent";

    } catch (Exception $e) {
	   $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	   $_SESSION['status'] = 'error';
	   echo $_SESSION['result'];
    }
	
				 

  
?>