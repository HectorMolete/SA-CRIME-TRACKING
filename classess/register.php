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
	
	
  if(isset($_GET['id_number'])){
	  
  $id_number=$_GET['id_number'];
  $email=$_GET['email'];
  $first_name=$_GET['first_name'];
  $last_name=$_GET['last_name'];
  $phone_number=$_GET['phone_number'];
  $address=$_GET['address'];
  $province=$_GET['province'];
  $password=$_GET['password'];
  
  $email=strtolower($email);
  
  $encypass=md5($password);
  
  $sql2="select * from user where email_address='$email' || id_number='$id_number'";
  $results=mysqli_query($conn,$sql2);
  
  if(mysqli_num_rows($results)>0){
	  
	 echo "<script>cxDialog('Failed <br>User already Registered.');</script>";  
	  
  }
  else{
	  
    $code=RandomString();
    $sql="insert into user(id_number,first_name,last_name,address,email_address,phone_number,province,password,link) values('$id_number','$first_name','$last_name','$address','$email','$phone_number','$province','$encypass','$code')";
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
        $mail->Subject = "Confirm your account";
        $mail->Body    = "
                              Hi ".ucfirst($first_name)." ".ucfirst($last_name)."<br><br>
							  <b>Please confirm your email address.<b><br><br><br>
							  Welcome to SA CRIME TRACKER , Please confirm your email address by clicking this link below :<br>
							  http://localhost/SA%20TRACKER%20V1.0/activate_account.php?code=".$code."
							  <br><br><br>Kind Regards,<br>
							  <b>SA CRIME TRACKER</b>
							";

        $mail->send();
	    echo "<script>cxDialog('Successfully Registered<br>Please Check your Email to activate account');</script>";

		

    } catch (Exception $e) {
	   $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	   $_SESSION['status'] = 'error';
    }
	
				 
	  
	  
        
		
		
		
		}
     else{
	  
	      echo "<script>cxDialog('Failed <br>Something went wrong');</script>"; 
      }
  }
  
}
  
  

  
?>