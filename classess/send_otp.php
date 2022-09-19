<?php

 if(isset($_GET['otp'])){


$url = "https://www.winsms.co.za/api/batchmessage.asp?";

$userp = "user=";

$passwordp = "&password=";

$messagep = "&message=";

$numbersp = "&Numbers=";

// WinSMS username variable - Set your WinSMS username here.
$username = "ikesambo47@gmail.com";

// WinSMS password variable - Set your WinSMS password here.
$password = "Beanca47@@"; 
$message="Your SA CRIME TRACKER OTP is ".$_GET['otp'];
// WinSMS message variable - Set your WinSMS message here.

// URL encoding of your message.
$encmessage = urlencode(utf8_encode($message));

// WinSMS cellphone numbers variable - Set your cellphone numbers here separated with a ;
$numbers = $_GET['number'];

$all = $url.$userp.$username.$passwordp.$password.$messagep.$encmessage.$numbersp.$numbers;

// Opens the URL in read only mode
$fp = fopen($all, 'r');



fclose($fp);


 }

?>