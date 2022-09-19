<?php
  include("../database/connection.php");
  if(isset($_GET['province'])){
	  

  $province=$_GET['province'];
  
  $sql="SELECT * from police_stations where Province='$province' ORDER BY Name ASC";
  $results=mysqli_query($conn,$sql);
  
 while($row=mysqli_fetch_assoc($results)){
	  
           echo '                          
						<option  class="form-control" style="color:black" value="'.$row['station_id'].'" >'.$row['Name'].' Police Station
	
						</option>
					';
  }
	  
}
  

?>