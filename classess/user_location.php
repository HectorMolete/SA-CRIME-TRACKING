<?php

  session_start();
  
  
  if(isset($_GET['x'])){
	  
	  $x=$_GET['x'];
	  $y=$_GET['y'];
	  
	  
	  $_SESSION['x']=$x;
	  $_SESSION['y']=$y;
	  
  }




?>