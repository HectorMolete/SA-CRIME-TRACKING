<html>
<head>
</head>
<body>
</body>
</html>
<?php
  include("database/connection.php");
  if(isset($_GET['code'])){
	  
	 $link=$_GET['code'];

    $sql="Select * from user where link='$link'";
    $results=mysqli_query($conn,$sql);
     
    if(mysqli_num_rows($results)>0){
  
        $sql2="update user set link='',status=1 where link='$link'";
		mysqli_query($conn,$sql2);
		 echo "<div style='width:100%;background:pink'><a style=''>Account Successfully activated</a></div>";
		echo    "<script> setTimeout(function() {
                    window.location.href='login.php';
                }, 2000);	</script>";
    }
   else{
       echo "<div style='width:100%;background:pink'><a style=''>ERROR:Url Not found</a></div>";

   }	   
	  
  }
  else{
	  
	   echo "<div style='width:100%;background:pink'><a style=''>ERROR:Url Not found</a></div>";
	  
  }



?>



