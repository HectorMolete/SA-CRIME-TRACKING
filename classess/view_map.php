<?php
 
   if(isset($_GET['lat2'])){
	   
	   $lat=$_GET['lat2'];
	   $lot=$_GET['log2'];
	   
	   $startlat=$_GET['lat1'];
	   $startlog=$_GET['lot1'];
	   $name="SAPS ".$_GET['name']." POLICE STATION";
	   
   }
   
   session_start();
   



?>
<script src="../jquery.min.js"></script>
<script src="../jquery.js"></script>
<div class="location" id="loca"></div>
   <input type="text" id="latitude" style="display:none" >
   <input type="text" id="longitude" style="display:none">

   <input type="text" id="lati" value="<?php echo $lat;?>" style="display:none">
   <input type="text" id="longi" value="<?php echo $lot;?>" style="display:none">

 <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
 
 
<script>
var x = document.getElementById("latitude");
var y = document.getElementById("longitude");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.value =position.coords.latitude ; 
  y.value =position.coords.longitude ; 
  
}

getLocation();
</script>

<script>

</script>
<html>
  <head>
    <title>SA CRIME TRACKER</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script >
	
	/**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
// [START maps_directions_waypoints]

function initMap() {

  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer();
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 6,
   center: { lat:-26.2041028 , lng: 28.0473051 },
  });

  directionsRenderer.setMap(map);
  document.getElementById("submit").addEventListener("click", () => {
	  //alert(document.getElementById("end").value);
	document.getElementById('paths').style.display="none";
    calculateAndDisplayRoute(directionsService, directionsRenderer);

    function get_location(){    

         $.ajax({
          url: "user_location.php",
          cache: false,
		  data:{x:x,y:y},
          success: function(html){       
            $("#loca").html(html); 
	
               setInterval(calculateAndDisplayRoute(directionsService, directionsRenderer),2000);				
        },
      });
    } 
	

    setInterval (get_location, 10000); 	
	

	document.getElementById("button_btn").style.display="none";
	document.getElementById("back_menu").style.display="block";
	
  });
  
    document.getElementById("startbtn").addEventListener("click", () => {
	  //alert(document.getElementById("end").value);
	document.getElementById('paths').style.display="none";
    //calculateAndDisplayRoute(directionsService, directionsRenderer);
	
	function getLocation() {
      if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(showPosition);
      } else { 
         x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

     function showPosition(position) {
        var x=position.coords.latitude ; 
        var y =position.coords.longitude ; 
		

         $.ajax({
          url: "user_location.php",
          cache: false,
		  data:{x:x,y:y},
          success: function(html){       
            $("#loca").html(html); 

                setInterval(calculateAndDisplayRoute(directionsService, directionsRenderer),2000);				
				
        },
        });
  
     }

      //getLocation();

    setInterval (getLocation, 10000); 	
	
	
  });
  
}

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
  const waypts = [];
  const checkboxArray = document.getElementById("waypoints");

  for (let i = 0; i < checkboxArray.length; i++) {
    if (checkboxArray.options[i].selected) {
      waypts.push({
        location: checkboxArray[i].value,
        stopover: true,
      });
    }
  }
  //var =document.getElementById('longitude).value;
  //var start_lat='<?php echo $_SESSION['x'];?>';
  //var start_lot='<?php echo $_SESSION['y'];?>';
  
  var lat=document.getElementById('lati').value;
  var lot=document.getElementById('longi').value;
  
  
  //alert(parseInt(start_lat));
  directionsService
    .route({
	  origin: 
         {
        lat:parseFloat('<?php echo $_SESSION['x'];?>'), lng:parseFloat('<?php echo $_SESSION['y'];?>'),
		
      },
	   //zoom: 15,
   
      //origin: document.getElementById('latitude').value+","+document.getElementById('longitude').value,
      destination: {
         lat:parseFloat(lot) , lng:parseFloat(lat),
      },
      waypoints: waypts,
      optimizeWaypoints: true,
      travelMode: google.maps.TravelMode.DRIVING,
	
	 
    })
    .then((response) => {
      directionsRenderer.setDirections(response);

      const route = response.routes[0];
      const summaryPanel = document.getElementById("directions-panel");
      const summaryPanel2 = document.getElementById("directions-panel_");
      summaryPanel.innerHTML = "";
      summaryPanel2.innerHTML = "";
      // For each route, display summary information.
      for (let i = 0; i < route.legs.length; i++) {
        const routeSegment = i + 1;

        summaryPanel.innerHTML +=
          "<b>Route Segment: " + routeSegment + "</b><br>";
        summaryPanel.innerHTML += route.legs[i].start_address + " to ";
        summaryPanel.innerHTML += route.legs[i].end_address + "<br>";
        summaryPanel.innerHTML += route.legs[i].distance.text + "<br><br>";
		
        summaryPanel2.innerHTML +=
          "<b>Route Segment: " + routeSegment + "</b><br>";
        summaryPanel2.innerHTML += route.legs[i].start_address + " to ";
        summaryPanel2.innerHTML += route.legs[i].end_address + "<br>";
        summaryPanel2.innerHTML += route.legs[i].distance.text + "<br><br>";
      }
    })
    .catch((e) => window.alert("Directions request failed due to " + status+"<?php echo "Hello"?>"));
}

window.initMap = initMap;
// [END maps_directions_waypoints]

	
	</script>
  </head>
  <body>
  <div style="position:fixed;z-index:9999;bottom:2%;display:none;margin-left:2%" id="back_menu"><input type="submit" value="BACK" onclick="window.location.href='../user'" style="width:80px;height:40px;border-radius:20px;border:1px solid blue;color:blue;cursor:pointer"/>
</div>
    <div id="container">
	 <div style="width:100%;position:fixed;z-index:200;top:0;overflow:hidden;border-bottom:1px solid #898989;background:#fff;opacity:0.8;"  class="paths" id="paths" >
	 
	 
	      <div style="width:95%;margin:0 auto;display:flex;margin-top:2%">
		     <div style="width:8%;margin-top:10px">
		        <a href="../nearby_stations.php"><i class="tim-icons icon-minimal-left"></i></a>
			 </div>
			 
		     <div style="width:16%;margin-top:10px">
		        <a   style=""><b>Start :</b></a>
			 </div>
			 <div style="width:78%">
              <input type="text" placeholder="Your Location"  style="width:100%;height:40px;border-radius:8px;border:0.5px solid #898989" readonly>
             </div>			  
		  
		  </div>
	      <div style="width:95%;margin:0 auto;display:flex;margin-top:2%;margin-bottom:2%">
		     <div style="width:8%;margin-top:10px">
		        <a   style=""><b></i></b></a>
			 </div>
		     <div style="width:16%;margin-top:10px">
		        <a  ><b>End :</b></a>
			 </div>
			 <div style="width:78%">
              <input type="text" placeholder="<?php echo $name;?>"  style="width:100%;height:40px;border-radius:8px;border:0.5px solid #898989" readonly>
             </div>			  
		  
		  </div>
          
	  
	  
	  </div>
	  <div style="position:fixed;bottom:0;width:100%;z-index:400;border-top:1px solid #898989;background:#fff;opacity:0.8;" class="button_btn" id="button_btn" >
	      <div style="width:95%;margin:0 auto;color:#585858;margin-top:5px;color:blue">
		     
			   <a id="directions-panel"><b></b></a>
		  
		  </div>
	      <div style="width:95%;margin:0 auto;margin-top:10px;margin-bottom:10px">
		     
			   <input type="submit" id="submit"  value="Start" style="width:25%;height:40px;border-radius:20px;border:1px solid blue;color:blue;cursor:pointer">
		  
		  </div>
	      
	  </div>
      <div id="map"></div>
      <div id="sidebar">
        <div>
           <input type="text" placeholder="YOUR LOCATION"  style="width:100%;height:40px;border-radius:8px;border:0.5px solid #898989" readonly>
          <select id="start" style="display:none">
            <option value="Halifax, NS">Halifax, NS</option>
            <option value="Boston, MA">Boston, MA</option>
            <option value="New York, NY">New York, NY</option>
            <option value="Miami, FL">Miami, FL</option>
          </select>
          <br />
     
          <select multiple id="waypoints" style="display:none">
            <option value="montreal, quebec">Montreal, QBC</option>
            <option value="toronto, ont">Toronto, ONT</option>
            <option value="chicago, il">Chicago</option>
            <option value="winnipeg, mb">Winnipeg</option>
            <option value="fargo, nd">Fargo</option>
            <option value="calgary, ab">Calgary</option>
            <option value="spokane, wa">Spokane</option>
          </select>
          <br />
          <input type="text" placeholder="<?php echo $name;?>"  style="width:100%;height:40px;border-radius:8px;border:0.5px solid #898989" readonly>
          <select id="end" style="display:none">
            <option value="Vancouver, BC">Vancouver, BC</option>
            <option value="Seattle, WA">Seattle, WA</option>
            <option value="San Francisco, CA">San Francisco, CA</option>
            <option value="Los Angeles, CA">Los Angeles, CA</option>
          </select>
          <br />
		  <br>
		  
          <input type="submit" value="START" id="startbtn" style="width:25%;height:40px;border-radius:20px;border:1px solid blue;color:blue;cursor:pointer"/>
		  <input type="submit" value="BACK" onclick="window.location.href='../nearby_stations.php'" style="width:25%;height:40px;border-radius:20px;border:1px solid blue;color:blue;cursor:pointer"/>
        </div>
        <div id=""></div><br><br>
		<a id="directions-panel_"><b></b></a>
      </div>
	  

    </div>

    <!-- 
     The `defer` attribute causes the callback to execute after the full HTML
     document has been parsed. For non-blocking uses, avoiding race conditions,
     and consistent behavior across browsers, consider loading using Promises
     with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuw4qeS4BtTykfMCMyZC26IoNxJAo6ZF8&callback=initMap&v=weekly"
      defer
    ></script>
  </body>
</html>
<!-- [END maps_directions_waypoints] -->
<script>