<?php
    session_start();
	
	   $end_lat=$_SESSION['end_lat'];
	   $end_lot=$_SESSION['end_lot'];
	   
	  

?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    SA CRIME TRACKING
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <style>
     .chart-area input{
	    width:100%;
		height:100px;
	 }
  
  </style>
</head>

<input type="text" id="latitude" style="">
<input type="text" id="longitude" style="">

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


<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
            <img src="../assets/img/logo.png">
        </div>
        <ul class="nav">
         <li class="">
            <a href="../index.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>HOME</p>
            </a>
          </li>

          <li>
            <a href="./icons.html">
              <i class="tim-icons icon-bell-55"></i>
              <p>ATTEND</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)"></a>
          </div>
  
         
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      <div class="content">
<head>
	<meta name="viewport" id="vp" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width" />

	<link rel="stylesheet" href="https://api.mazemap.com/js/v2.0.73/mazemap.min.css">
	<script type='text/javascript' src='https://api.mazemap.com/js/v2.0.73/mazemap.min.js'></script>

	<style>
		body { margin:0px; padding:0px; width: 100%; height:100%; font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif }
		#controls{
			position: absolute;
			box-sizing: border-box;
			padding: 10px;
			top: 10px;
			left: 60px;
			width: auto;
			height: auto;
			right: 60px;
			display: flex;
		}
		#controls button{
			margin-top: 0px;
			background-color: rgb(31, 175, 252);
			padding: 0px 10px;
			border-radius: 4px;
			color: rgb(255, 255, 255);
			width: auto;
			border: 0;
			flex-grow: 1;
			margin: 0px 10px;
		}
	</style>
</head>
<body>
	<div id="map" class="mazemap"></div>

	<script>
var lati = -25.9752;
var lot = 28.1188
//alert(lati)
		var myMap = new Mazemap.Map({
			// container id specified in the HTML
			container: 'map',
			campuses: 50,
			center: {lng: lot, lat: lati},
			zoom: 20.2,
			zLevel: 1,
			scrollZoom: true,
			doubleClickZoom: false,
			touchZoomRotate: false
		});

		// Some hardcoded route example start and destinations
		var start1 = { lngLat: {lng: lot, lat: lati}, zLevel: 0};
		var start2 = { poiId: 194915 };
		var dest1 = { lngLat: {lng: <?php echo $end_lot;?>, lat: <?php echo $end_lat;?>}, zLevel: 2};
		var dest2 = { poiId: 195096 };
		var dest3 = { poiId: 195118};


		var routeController;

		myMap.on('load', function(){

			routeController = new Mazemap.RouteController(myMap, {
				routeLineColorPrimary: '#0099EA',
				routeLineColorSecondary: '#888888'
			});
			setRoute(start1, dest1);
		});

		function setRoute( start, dest ){
			routeController.clear(); // Clear existing route, if any

			Mazemap.Data.getRouteJSON(start, dest)
			.then(function(geojson){
				console.log('@ geojson', geojson);
				routeController.setPath(geojson);
				var bounds = Mazemap.Util.Turf.bbox(geojson);
				myMap.fitBounds( bounds, {padding: 100} );
			});
		}

	</script>
</body>      

      </div>
     
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
  
</body>

</html>





