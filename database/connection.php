<?php

  $dbhost="localhost";
  $dbuser="root";
  $dbname="crime_tracking";
  $dbpass="";
  
  $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
  if(!$conn){
	  echo "connection failed";
  }


?>